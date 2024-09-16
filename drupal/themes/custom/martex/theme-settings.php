<?php
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Theme\ThemeSettings;
use Drupal\system\Form\ThemeSettingsForm;
use Drupal\Core\Form;

function martex_form_system_theme_settings_alter(&$form, Drupal\Core\Form\FormStateInterface $form_state) {
  $form['st_settings'] = array(
        '#type' => 'fieldset',
        '#title' => t('Sandbox Theme Settings'),
        '#collapsible' => true,
        '#collapsed' => true,
    );
    
  // Menu style options
  /*$form['st_settings']['tabs']['theme_menu_config'] = array(
    '#type' => 'fieldset',
    '#title' => t('Menu setting'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  
  $form['st_settings']['tabs']['theme_menu_config']['theme_menu'] = array(
    '#type' => 'select',
    '#title' => t('Menu Type'),
    '#default_value' => theme_get_setting('theme_menu','sandbox'),
    '#options'  => array(
        'menudefault'	=> t('White - Default'),
        'menu_light'	=> t('Light'),
        'menu_dark' 	=> t('Dark')
    ),
  );*/
  
  // Footer options
  $form['st_settings']['tabs']['theme_footer_config'] = array(
    '#type' => 'fieldset',
    '#title' => t('Footer setting'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['st_settings']['tabs']['theme_footer_config']['footer_classes'] = [
	'#type' => 'textfield',
	'#title' => t('Footer class'),
	'#default_value' => theme_get_setting('footer_classes','sandbox'),
	'#required' => FALSE, 
	'#description' => t('Enter CSS classes for footer, such as bg-dark...'), 
  ];
	
  // Color options
  $form['st_settings']['tabs']['theme_color_config'] = array(
    '#type' => 'fieldset',
    '#title' => t('Color setting'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  
  $form['st_settings']['tabs']['theme_color_config']['theme_color'] = array(
    '#type' => 'select',
    '#title' => t('Color'),
    '#default_value' => theme_get_setting('theme_color'),
    '#options'  => array(
        'default'           => t('Default - Blue'),
        'crocus'             => t('Crocus'),
        'green'       => t('Green'),
        'magenta'            => t('Magenta'),
        'pink'           => t('Pink'),
        'purple'           => t('Purple'),
        'red'           => t('Red'),
        'skyblue'           => t('Sky Blue'),
        'violet'           => t('Violet')                               
    ),
  );
  // Fonts options
  $form['st_settings']['tabs']['theme_font_config'] = array(
    '#type' => 'fieldset',
    '#title' => t('Font setting'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  
  $form['st_settings']['tabs']['theme_font_config']['theme_font'] = array(
    '#type' => 'select',
    '#title' => t('Font'),
    '#default_value' => theme_get_setting('theme_font'),
    '#options'  => array(
        'fontjakarta'           => t('Plus Jakarta Sans'),
        'fontinter'              => t('Inter')                               
    ),
  );  
}

