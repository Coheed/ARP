<?php

namespace Drupal\media_bulk_upload\Form;

use Drupal;
use Drupal\Component\Utility\Bytes;
use Drupal\Component\Utility\Environment;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\File\FileSystemInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerInterface;
use Drupal\Core\Session\AccountProxyInterface;
use Drupal\file\Entity\File;
use Drupal\file\FileInterface;
use Drupal\file\FileRepositoryInterface;
use Drupal\media\MediaInterface;
use Drupal\media\MediaTypeInterface;
use Drupal\media_bulk_upload\Entity\MediaBulkConfigInterface;
use Drupal\media_bulk_upload\MediaSubFormManager;
use Exception;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class BulkMediaUploadForm.
 *
 * @package Drupal\media_upload\Form
 */
class MediaBulkUploadForm extends FormBase {

  /**
   * Media Type storage.
   *
   * @var \Drupal\Core\Entity\EntityStorageInterface
   */
  protected $mediaTypeStorage;

  /**
   * Media Bulk Config storage.
   *
   * @var \Drupal\Core\Entity\EntityStorageInterface
   */
  protected $mediaBulkConfigStorage;

  /**
   * Media entity storage.
   *
   * @var \Drupal\Core\Entity\EntityStorageInterface
   */
  protected $mediaStorage;

  /**
   * File entity storage.
   *
   * @var \Drupal\file\FileStorageInterface
   */
  protected $fileStorage;

  /**
   * Media SubForm Manager.
   *
   * @var \Drupal\media_bulk_upload\MediaSubFormManager
   */
  protected $mediaSubFormManager;

  /**
   * The max file size for the media bulk form.
   *
   * @var string
   */
  protected $maxFileSizeForm;

  /**
   * The allowed extensions for the media bulk form.
   *
   * @var array
   */
  protected $allowed_extensions = [];

  /**
   * The current user.
   *
   * @var \Drupal\Core\Session\AccountProxyInterface
   */
  protected $currentUser;

  /**
   * The file repository.
   *
   * @var \Drupal\file\FileRepositoryInterface
   */
  protected $fileRepository;

  /**
   * BulkMediaUploadForm constructor.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entityTypeManager
   *   Entity type manager.
   * @param \Drupal\media_bulk_upload\MediaSubFormManager $mediaSubFormManager
   *   Media Sub Form Manager.
   * @param \Drupal\Core\Session\AccountProxyInterface $currentUser
   *   Current User.
   * @param \Drupal\Core\Messenger\MessengerInterface $messenger
   *   The messenger.
   *
   * @throws \Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException
   * @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
   */
  public function __construct(EntityTypeManagerInterface $entityTypeManager, MediaSubFormManager $mediaSubFormManager, AccountProxyInterface $currentUser, MessengerInterface $messenger, FileRepositoryInterface $fileRepository) {
    $this->mediaTypeStorage = $entityTypeManager->getStorage('media_type');
    $this->mediaBulkConfigStorage = $entityTypeManager->getStorage('media_bulk_config');
    $this->mediaStorage = $entityTypeManager->getStorage('media');
    $this->fileStorage = $entityTypeManager->getStorage('file');
    $this->mediaSubFormManager = $mediaSubFormManager;
    $this->currentUser = $currentUser;
    $this->messenger = $messenger;
    $this->fileRepository = $fileRepository;
    $this->maxFileSizeForm = '';
  }

  /**
   * {@inheritdoc}
   *
   * @throws \Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException
   * @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity_type.manager'),
      $container->get('media_bulk_upload.subform_manager'),
      $container->get('current_user'),
      $container->get('messenger'),
      $container->get('file.repository')
    );
  }

  /**
   * Returns a unique string identifying the form.
   *
   * @return string
   *   The unique string identifying the form.
   */
  public function getFormId() {
    return 'media_bulk_upload_form';
  }

  /**
   * Form constructor.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   * @param \Drupal\media_bulk_upload\Entity\MediaBulkConfigInterface|null $media_bulk_config
   *   The media bulk configuration entity.
   *
   * @return array
   *   The form structure.
   *
   * @throws \Exception
   */
  public function buildForm(array $form, FormStateInterface $form_state, MediaBulkConfigInterface $media_bulk_config = NULL) {
    $mediaBulkConfig = $media_bulk_config;

    if ($mediaBulkConfig === NULL) {
      return $form;
    }

    $mediaTypeManager = $this->mediaSubFormManager->getMediaTypeManager();
    $mediaTypes = $this->mediaSubFormManager->getMediaTypeManager()->getBulkMediaTypes($mediaBulkConfig);
    $mediaTypeLabels = [];

    foreach ($mediaTypes as $mediaType) {
      $extensions = $mediaTypeManager->getMediaTypeExtensions($mediaType);
      natsort($extensions);
      $this->addAllowedExtensions($extensions);

      $maxFileSize = $mediaTypeManager->getTargetFieldMaxSize($mediaType);
      $mediaTypeLabels[] = $mediaType->label() . ' (max ' . $maxFileSize . '): ' . implode(', ', $extensions);
      if (!empty($maxFileSize) && $this->isMaxFileSizeLarger($maxFileSize)) {
        $this->setMaxFileSizeForm($maxFileSize);
      }
    }

    if (empty($this->maxFileSizeForm)) {
      $this->maxFileSizeForm = $this->mediaSubFormManager->getDefaultMaxFileSize();
    }

    $form['#tree'] = TRUE;
    $form['information_wrapper'] = [
      '#type' => 'container',
      '#attributes' => [
        'class' => [
          'media-bulk-upload-information-wrapper',
        ],
      ],
    ];
    $form['information_wrapper']['information_label'] = [
      '#type' => 'html_tag',
      '#tag' => 'label',
      '#value' => $this->t('Information'),
      '#attributes' => [
        'class' => [
          'form-control-label',
        ],
        'for' => 'media_bulk_upload_information',
      ],
    ];

    $form['information_wrapper']['information'] = [
      '#theme' => 'item_list',
      '#title' => $this->t('Media Types:'),
      '#items' => $mediaTypeLabels,
    ];

    if (count($mediaTypes) > 1) {
      $form['information_wrapper']['warning'] = [
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#id' => 'media_bulk_upload_information',
        '#name' => 'media_bulk_upload_information',
        '#value' => $this->t('Please be aware that if file extensions overlap between the media types that are available in this upload form, that the media entity will be assigned automatically to one of these types.'),
      ];
    }

    $validators = array(
      'file_validate_extensions' => [implode(' ', $this->allowed_extensions)],
      'file_validate_size' => [Bytes::toNumber($this->maxFileSizeForm)],
    );

    $form['file_upload'] = [
      '#type' => 'managed_file',
      '#multiple' => TRUE,
      '#title' => $this->t('File Upload'),
      '#required' => TRUE,
      '#description' => $this->t('Click or drop your files here. You can upload up to <strong>@limit</strong> files at once.', ['@limit' => ini_get('max_file_uploads')]),
      '#upload_validators' => $validators,
      '#upload_location' => $mediaBulkConfig->get('upload_location'),
    ];

    if ($this->mediaSubFormManager->validateMediaFormDisplayUse($mediaBulkConfig)) {
      $form['fields'] = [
        '#type' => 'fieldset',
        '#title' => $this->t('Fields'),
        'shared' => [
          '#field_parents' => ['fields', 'shared'],
          '#parents' => ['fields', 'shared'],
        ],
      ];
      $this->mediaSubFormManager->buildMediaSubForm($form['fields']['shared'], $form_state, $mediaBulkConfig);
    }

    $form['media_bundle_config'] = [
      '#type' => 'value',
      '#value' => $mediaBulkConfig->id(),
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * Add allowed extensions.
   *
   * @param array $extensions
   *   Allowed Extensions.
   *
   * @return $this
   *   MediaBulkUploadForm.
   */
  protected function addAllowedExtensions(array $extensions) {
    $this->allowed_extensions = array_unique(array_merge($this->allowed_extensions, $extensions));

    return $this;
  }

  /**
   * Validate if a max file size is bigger then the current max file size.
   *
   * @param string $MaxFileSize
   *   File Size.
   *
   * @return bool
   *  TRUE if the given size is larger than the one that is set.
   */
  protected function isMaxFileSizeLarger($MaxFileSize) {
    $size = Bytes::toNumber($MaxFileSize);
    $currentSize = Bytes::toNumber($this->maxFileSizeForm);

    return ($size > $currentSize);
  }

  /**
   * Set the max File size for the form.
   *
   * @param string $newMaxFileSize
   *   File Size.
   *
   * @return $this
   *   MediaBulkUploadForm.
   */
  protected function setMaxFileSizeForm($newMaxFileSize) {
    $this->maxFileSizeForm = $newMaxFileSize;

    return $this;
  }

  /**
   * Submit handler to create the file entities and media entities.
   *
   * @param array $form
   *   The form render array.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The form state.
   *
   * @throws \Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException
   * @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
    $mediaBundleConfigId = $values['media_bundle_config'];

    /** @var MediaBulkConfigInterface $mediaBulkConfig */
    $mediaBulkConfig = $this->mediaBulkConfigStorage->load($mediaBundleConfigId);
    $fileIds = $values['file_upload'];

    \Drupal::moduleHandler()->alter('media_bulk_upload_file_ids', $fileIds, $mediaBundleConfigId);

    if (empty($fileIds)) {
      return;
    }

    /** @var \Drupal\file\FileInterface[] $files */
    $files = $this->fileStorage->loadMultiple($fileIds);

    $mediaTypes = $this->mediaSubFormManager->getMediaTypeManager()->getBulkMediaTypes($mediaBulkConfig);
    $mediaType = reset($mediaTypes);
    $mediaFormDisplay = $this->mediaSubFormManager->getMediaFormDisplay($mediaBulkConfig, $mediaType);

    $this->prepareFormValues($form_state);

    $batchOperations = [];
    $operationId = 1;
    foreach ($files as $file) {
      $batchOperations[] = [
        [$this, 'batchOperation'],
        [
          $operationId,
          [
            'media_bulk_config' => $mediaBulkConfig,
            'media_form_display' => $mediaFormDisplay,
            'file' => $file,
            'form' => $form,
            'form_state' => $form_state,
          ],
        ],
      ];
      $operationId++;
    }
    $operationsCount = count($batchOperations);
    $batch = [
      'title' => $this->formatPlural(
        $operationsCount,
        'Preparing 1 media item',
        'Preparing @count media items', ['@count' => $operationsCount]
      ),
      'operations' => $batchOperations,
      'finished' => [$this, 'batchFinished'],
    ];
    batch_set($batch);
  }

  /**
   * Batch operation callback.
   *
   * @param string $id
   *   Batch operation id.
   * @param array $operation_details
   *   Batch operation details.
   * @param array $context
   *   Batch context.
   */
  public function batchOperation($id, array $operation_details, array &$context) {
    $mediaBulkConfig = $operation_details['media_bulk_config'];
    $mediaFormDisplay = $operation_details['media_form_display'];
    $file = $operation_details['file'];
    $form = $operation_details['form'];
    $form_state = $operation_details['form_state'];
    try {
      $media = $this->processFile($mediaBulkConfig, $file);
      if ($this->mediaSubFormManager->validateMediaFormDisplayUse($operation_details['media_bulk_config'])) {
        $extracted = $mediaFormDisplay->extractFormValues($media, $form['fields']['shared'], $form_state);
        $this->copyFormValuesToEntity($media, $extracted, $form_state);
      }
      $media->save();
      $context['results'][] = $id;

      $context['message'] = $this->t('Proccesing file @id.',
        [
          '@id' => $id,
        ]
      );
    } catch (Exception $e) {
      watchdog_exception('media_bulk_upload', $e);
    }
  }

  /**
   * Batch finished callback.
   *
   * @param boolean $success
   *   Batch success.
   * @param array $results
   *   Batch results.
   * @param array $operations
   *   Batch operations.
   */
  public function batchFinished($success, array $results, array $operations) {
    if ($success) {
      $this->messenger()->addMessage($this->t('@count media have been created.', ['@count' => count($results)]));
    }
    else {
      $errorOperation = reset($operations);
      $this->messenger()->addError(
        $this->t('An error occurred while processing @operation with arguments : @args',
          [
            '@operation' => $errorOperation[0],
            '@args' => print_r($errorOperation[0], TRUE),
          ]
        )
      );
    }
  }

  /**
   * Process a file upload.
   *
   * Will create a file entity and prepare a media entity with data.
   *
   * @param \Drupal\media_bulk_upload\Entity\MediaBulkConfigInterface $mediaBulkConfig
   *   Media Bulk Config.
   * @param \Drupal\file\FileInterface $file
   *   File entity.
   *
   * @return \Drupal\media\MediaInterface
   *   The unsaved media entity that is created.
   *
   * @throws \Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException
   * @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
   * @throws \Drupal\Core\Entity\EntityStorageException
   * @throws \Exception
   */
  protected function processFile(MediaBulkConfigInterface $mediaBulkConfig, FileInterface $file) {
    $filename = $file->getFilename();

    if (!$this->validateFile($file)) {
      $this->messenger()->addError($this->t('File :filename does not have a valid extension or filename.', [':filename' => $filename]));
      throw new Exception("File $filename does not have a valid extension or filename.");
    }

    $allowedMediaTypes = $this->mediaSubFormManager->getMediaTypeManager()
      ->getBulkMediaTypes($mediaBulkConfig);
    $extension = pathinfo($file->getFilename(), PATHINFO_EXTENSION);
    $matchingMediaTypes = $this->mediaSubFormManager->getMediaTypeManager()
      ->getMediaTypeIdsByFileExtension($extension);

    $mediaTypes = array_intersect_key($matchingMediaTypes, $allowedMediaTypes);
    $mediaType = reset($mediaTypes);

    if (!$this->validateFileSize($mediaType, $file)) {
      $fileSizeSetting = $this->mediaSubFormManager->getMediaTypeManager()
        ->getTargetFieldMaxSize($mediaType);
      $mediaTypeLabel = $mediaType->label();
      $this->messenger()
        ->addError($this->t('File :filename exceeds the maximum file size of :file_size for media type :media_type exceeded.', [
          ':filename' => $filename,
          ':file_size' => $fileSizeSetting,
          ':media_type' => $mediaTypeLabel,
        ]));
      throw new Exception("File $filename exceeds the maximum file size of $fileSizeSetting for media type $mediaTypeLabel exceeded.");
    }

    if ($mediaType->getSource()->getPluginId() == 'image') {
      $errors = $this->validateImageResolution($mediaType, $file);
      if (!empty($errors)) {
        $this->messenger()->addError($this->t('File :filename has image resolution errors. Check the logs for more details.', [':filename' => $filename]));
        throw new \Exception('File image resolution errors: ' . implode(', ', $errors));
      }
    }

    $uri_scheme = $this->mediaSubFormManager->getTargetFieldDirectory($mediaType);
    $destination = $uri_scheme . '/' . $file->getFilename();
    $file_default_scheme = Drupal::config('system.file')->get('default_scheme') . '://';
    if ($uri_scheme === $file_default_scheme) {
      $destination = $uri_scheme . $file->getFilename();
    }

    if (!$this->fileRepository->move($file, $destination, FileSystemInterface::EXISTS_RENAME)) {
      $this->messenger()->addError($this->t('File :filename could not be moved.', [':filename' => $filename]), 'error');
      throw new Exception('File entity could not be moved.');
    }

    $values = $this->getNewMediaValues($mediaType, $file);
    /** @var \Drupal\media\MediaInterface $media */

    return $this->mediaStorage->create($values);
  }

  /**
   * Validate if the filename and extension are valid in the provided file info.
   *
   * @param \Drupal\file\FileInterface $file
   *
   * @return bool
   *   If the file info validates, returns true.
   */
  protected function validateFile(FileInterface $file) {
    return !(empty($file->getFilename()) || empty($file->getMimeType()));
  }

  /**
   * Check the size of a file.
   *
   * @param \Drupal\media\MediaTypeInterface $mediaType
   *   Media Type.
   * @param \Drupal\file\FileInterface $file
   *
   * @return bool
   *   True if max size for a given file do not exceeds max size for its type.
   */
  protected function validateFileSize(MediaTypeInterface $mediaType, FileInterface $file) {
    $fileSizeSetting = $this->mediaSubFormManager->getMediaTypeManager()->getTargetFieldMaxSize($mediaType);
    $fileSize = $file->getSize();
    $maxFileSize = !empty($fileSizeSetting)
      ? Bytes::toNumber($fileSizeSetting)
      : Environment::getUploadMaxSize();

    if ((int) $maxFileSize === 0) {
      return true;
    }

    return $fileSize <= $maxFileSize;
  }

  /**
   * Validates the resolution of an image.
   *
   * @param \Drupal\media\MediaTypeInterface $mediaType
   *   The media type entity.
   * @param \Drupal\file\FileInterface $file
   *   The file entity.
   *
   * @return array
   *   Array of errors provided by file_validate_image_resolution.
   */
  protected function validateImageResolution(MediaTypeInterface $mediaType, FileInterface $file) : array {
    $field_settings = $this->mediaSubFormManager
      ->getMediaTypeManager()
      ->getTargetFieldSettings($mediaType);
    $errors = file_validate_image_resolution(
      File::create(['uri' => $file->getFileUri()]),
      $field_settings['max_resolution'] ?? 0,
      $field_settings['min_resolution'] ?? 0
    );

    return $errors;
  }

  /**
   * Builds the array of all necessary info for the new media entity.
   *
   * @param \Drupal\media\MediaTypeInterface $mediaType
   *   Media Type ID.
   * @param \Drupal\file\FileInterface $file
   *   File entity.
   *
   * @return array
   *   Return an array describing the new media entity.
   */
  protected function getNewMediaValues(MediaTypeInterface $mediaType, FileInterface $file) {
    $targetFieldName = $this->mediaSubFormManager->getMediaTypeManager()
      ->getTargetFieldName($mediaType);
    return [
      'bundle' => $mediaType->id(),
      'name' => $file->getFilename(),
      $targetFieldName => [
        'target_id' => $file->id(),
        'title' => $file->getFilename(),
      ],
    ];
  }

  /**
   * Copy the submitted values for the media subform to the media entity.
   *
   * @param \Drupal\media\MediaInterface $media
   *   Media Entity.
   * @param array $extracted
   *   Extracted entity values.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   Form State.
   */
  protected function copyFormValuesToEntity(MediaInterface $media, array $extracted, FormStateInterface $form_state) {
    foreach ($form_state->getValues() as $name => $values) {
      if (isset($extracted[$name]) || !$media->hasField($name)) {
        continue;
      }
      $media->set($name, $values);
    }
  }

  /**
   * Prepare form submitted values.
   *
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   Form State.
   *
   * @return $this
   *   Media Bulk Upload Form.
   */
  protected function prepareFormValues(FormStateInterface $form_state) {
    // If the shared name is empty, remove it from the form state.
    // Otherwise the extractFormValues function will override with an empty value.
    $shared = $form_state->getValue(['fields', 'shared']);
    if (empty($shared['name'][0]['value'])) {
      unset($shared['name']);
      $form_state->setValue(['fields', 'shared'], $shared);
    }
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    // Validate all uploaded files.
    $uploaded_files = $form_state->getValue(['file_upload', 'uploaded_files']);
    if (empty($uploaded_files)) {
      $form_state->setErrorByName('file_upload', $this->t('No media files have been provided.'));
    }
    else {
      foreach ($uploaded_files as $uploaded_file) {
        // Create a new file entity since some modules only validate new files.
        $file = $this->fileStorage->create([
          'uri' => $uploaded_file['path']
        ]);

        // Let other modules perform validation on the new file.
        $errors = \Drupal::moduleHandler()->invokeAll('file_validate', [
          $file
        ]);

        // Process any reported errors.
        if (!empty($errors)) {
          $form_state->setErrorByName('file_upload', 'Errors for file ' . $file->getFilename() . ': ' . implode(', ', $errors));

          try {
            // Delete the uploaded file if it has validation errors.
            $file_system = \Drupal::service('file_system');
            $file_system->delete($uploaded_file['path']);
          }
          catch (Exception $e) {
            watchdog_exception('media_bulk_upload', $e);
          }
        }
      }
    }
  }

}
