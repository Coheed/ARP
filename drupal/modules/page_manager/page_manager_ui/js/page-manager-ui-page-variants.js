/**
 * @file
 * Add open/close behavior to Page Manager page variants admin page.
 */
(function ($, Drupal, once) {
  Drupal.behaviors.pageManagerVariantsAdmin = {
    attach(context, settings) {
      // When the page loads find the Current Variant and activate its label and content.
      $(once('page-manager-current-variant', '.current_variant', context)).each(
        function () {
          $(this).parents('.page__section__2').addClass('active');
          $(this)
            .parents('.page__section__2')
            .siblings('.page__section__label')
            .addClass('active current_variant');
        },
      );

      // When the label is clicked show the variant settings.
      $(
        once(
          'page-manager-settings',
          '.page__section_item__1 > .page__section__label',
          context,
        ),
      ).click(function () {
        if ($(this).hasClass('active')) {
          $(this).removeClass('active');
          $(this).siblings('.page__section__2').removeClass('active');
        } else {
          $('.page__section_item__1 > label').removeClass('active');
          $('.page__section__2').removeClass('active');
          $(this).addClass('active');
          $(this).siblings('.page__section__2').addClass('active');
        }
      });
    },
  };
})(window.jQuery, window.Drupal, once);
