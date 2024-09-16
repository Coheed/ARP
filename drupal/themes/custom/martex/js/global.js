/**
 * @file
 * Global utilities.
 *
 */
(function ($, Drupal) {

  'use strict';

  //////////////// CKEditor settings
  Drupal.behaviors.martexCkeditor = {
    attach: function (context, settings) {
      // Alter CKEditor config to allow empty tags
      if (typeof CKEDITOR !== "undefined") {
        CKEDITOR.dtd.$removeEmpty['i'] = false;
        CKEDITOR.dtd.$removeEmpty['span'] = false;
        console.log('Ckeditor log', CKEDITOR.dtd);
      }
    }
  };

  //////////////// Sticky header
  Drupal.behaviors.martexStickyHeader = {
    attach: function (context, settings) {
      // If in node landing page edit form, exit
      if ($('body.user-logged-in form.node-landing-page-edit-form').length) return;

      var navbar = document.querySelector(".navbar");
      if (navbar == null) return;
      var options = {
        offset: 350,
        offsetSide: 'top',
        classes: {
          clone: 'navbar-clone fixed',
          stick: 'navbar-stick',
          unstick: 'navbar-unstick',
        },
        onStick: function() {
          var navbarClonedClass = this.clonedElem.classList;
          if (navbarClonedClass.contains('transparent') && navbarClonedClass.contains('navbar-dark')) {
            this.clonedElem.className = this.clonedElem.className.replace("navbar-dark","navbar-light");
          }
        }
      };
      var banner = new Headhesive('.navbar', options);
    }
  };

  //////////////// Submenu: enable multi level menu
  Drupal.behaviors.martexSubmenu = {
    attach: function (context, settings) {
      (function($bs) {
        const CLASS_NAME = 'has-child-dropdown-show';
        $bs.Dropdown.prototype.toggle = function(_original) {
            return function() {
                document.querySelectorAll('.' + CLASS_NAME).forEach(function(e) {
                    e.classList.remove(CLASS_NAME);
                });
                let dd = this._element.closest('.dropdown').parentNode.closest('.dropdown');
                for (; dd && dd !== document; dd = dd.parentNode.closest('.dropdown')) {
                    dd.classList.add(CLASS_NAME);
                }
                return _original.call(this);
            }
        }($bs.Dropdown.prototype.toggle);
        document.querySelectorAll('.dropdown').forEach(function(dd) {
            dd.addEventListener('hide.bs.dropdown', function(e) {
                if (this.classList.contains(CLASS_NAME)) {
                    this.classList.remove(CLASS_NAME);
                    e.preventDefault();
                }
                e.stopPropagation();
            });
        });
      })(bootstrap);
    }
  };

  //////////////// Offcanvas: enable offcanvas nav
  Drupal.behaviors.martexOffCanvas = {
    attach: function (context, settings) {
      var navbar = document.querySelector(".navbar");
      if (navbar == null) return;
      const navOffCanvasBtn = document.querySelectorAll(".offcanvas-nav-btn");
      const navOffCanvas = document.querySelector('.navbar:not(.navbar-clone) .offcanvas-nav');
      const bsOffCanvas = new bootstrap.Offcanvas(navOffCanvas, {scroll: true});
      const scrollLink = document.querySelectorAll('.onepage .navbar li a.scroll');
      const searchOffcanvas = document.getElementById('offcanvas-search');
      navOffCanvasBtn.forEach(e => {
        e.addEventListener('click', event => {
          bsOffCanvas.show();
        })
      });
      scrollLink.forEach(e => {
        e.addEventListener('click', event => {
          bsOffCanvas.hide();    
        })
      });
      if(searchOffcanvas != null) {
        searchOffcanvas.addEventListener('shown.bs.offcanvas', function () {
          document.getElementById("search-form").focus();
        });
      }
    }
  };

  /**
   * Background Image
   * Adds a background image link via data attribute "data-image-src"
   */
  Drupal.behaviors.martexBackgroundImage = { 
    attach: function (context, settings) {
      var bg = document.querySelectorAll(".bg-image");
      for(var i = 0; i < bg.length; i++) {
        var url = bg[i].getAttribute('data-image-src');
        bg[i].style.backgroundImage = "url('" + url + "')";
      }
    }
  };

  /**
   * Background Image Mobile
   * Adds .mobile class to background images on mobile devices for styling purposes
   */
  Drupal.behaviors.martexBackgroundImageMobile = { 
    attach: function (context, settings) {
      var isMobile = (navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || (navigator.platform === 'MacIntel' && navigator.maxTouchPoints > 1) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i)) ? true : false;
      if(isMobile) {
        document.querySelectorAll(".image-wrapper").forEach(e => {
          e.classList.add("mobile")
        })
      }
    }
  };

  //////////////// Page progress when scrolling
  Drupal.behaviors.martexPageProgress = {
    attach: function (context, settings) {
      var progressWrap = document.querySelector('.progress-wrap');
      if(progressWrap != null) {
        var progressPath = document.querySelector('.progress-wrap path');
        var pathLength = progressPath.getTotalLength();
        var offset = 50;
        progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
        progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
        progressPath.style.strokeDashoffset = pathLength;
        progressPath.getBoundingClientRect();
        progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
        window.addEventListener("scroll", function(event) {
          var scroll = document.body.scrollTop || document.documentElement.scrollTop;
          var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
          var progress = pathLength - (scroll * pathLength / height);
          progressPath.style.strokeDashoffset = progress;
          var scrollElementPos = document.body.scrollTop || document.documentElement.scrollTop;
          if(scrollElementPos >= offset) {
            progressWrap.classList.add("active-progress")
          } else {
            progressWrap.classList.remove("active-progress")
          }
        });
        progressWrap.addEventListener('click', function(e) {
          e.preventDefault();
          window.scroll({
            top: 0, 
            left: 0,
            behavior: 'smooth'
          });
        });
      }
    }
  };

  //////////////// Disable input on Layout Paragraph Builder
  Drupal.behaviors.martexLPB = {
    attach: function (context, settings) {      
      $('.js-lpb-component .block-contact textarea, .js-lpb-component .block-contact input, .js-lpb-component .block-simplenews input, .js-lpb-component .block-user input').each(function() {
        var thisElement = $(this);
        thisElement.attr('disabled', 'disabled');
    });
    }
  };

  //////////////// Section - Put gutter classes to row
  Drupal.behaviors.martexSection = {
    attach: function (context, settings) {      
      $('section').each(function(index, element) {
        var thisSection = $(this),
            gutterClass = thisSection.attr('data-gutter-class') || '', 
            contentAlignClass = thisSection.attr('data-content-align') || '',
            marginClass = thisSection.attr('data-margin') || '';
        thisSection.find('div[class*="container"] > .row').addClass([gutterClass, contentAlignClass, marginClass]);
      });
      $('div.paragraph--type--paragraph-layout').each(function(index, element) {
        var thisParagraph = $(this),
            gutterClass = thisParagraph.attr('data-gutter-class') || '', 
            contentAlignClass = thisParagraph.attr('data-content-align') || '';
        
        // Remove old gutter classes
        if (gutterClass) thisParagraph.find('.row').removeClass().addClass('row');

        // Add new gutter and content align classes
        thisParagraph.find('.row').addClass([gutterClass, contentAlignClass]);
      });
    }
  };

  //////////////// Accordion - Click to open/collapse
  Drupal.behaviors.martexAccordion = {
    attach: function (context, settings) {      
      $('.accordion-title').on('click', function(){
        var accordion = $(this).closest('.accordion');
        var li = $(this).closest('li');
        if (li.hasClass('active')) {
          li.removeClass('active');      
        } else {
          if (accordion.hasClass('accordion-oneopen')){
            var wasActive = accordion.find('li.active');
            wasActive.removeClass('active');
            li.addClass('active');
          } else {
            li.addClass('active');
          }
        } 
      });        
    }
  };

  //////////////// Tabs
  Drupal.behaviors.martexTabs = {
    attach: function (context, settings) {      
      $('.tabs').each(function(){
        var tabs = $(this);
        tabs.after('<ul class="tabs-content">');
        tabs.find('li').each(function(){
            var currentTab      = $(this),
                tabContent      = currentTab.find('.tab__content').wrap('<li></li>').parent(),
                tabContentClone = tabContent.clone(true,true);
            tabContent.remove();
            currentTab.closest('.tabs-container').find('.tabs-content').append(tabContentClone);
        });
      });
    
      $('.tabs li').on('click', function(){
        var clickedTab    = $(this),
            tabContainer  = clickedTab.closest('.tabs-container'),
            activeIndex   = (clickedTab.index()*1)+(1),
            activeContent = tabContainer.find('> .tabs-content > li:nth-of-type('+activeIndex+')'),
            iframe, radial;
      
        tabContainer.find('> .tabs > li').removeClass('active');
        tabContainer.find('> .tabs-content > li').removeClass('active');
          
        clickedTab.addClass('active');
        activeContent.addClass('active');
          
      
        // If there is an <iframe> element in the tab, reload its content when the tab is made active.
        iframe = activeContent.find('iframe');
        if(iframe.length){
          iframe.attr('src', iframe.attr('src'));
        }
      
      });
      
      $('.tabs li.active').trigger('click');       
    }
  };
  
  //////////////// Project List 1 - Odd and even rows
  Drupal.behaviors.sandboxProjectList1 = {
    attach: function (context, settings) {      
      $('#projects-list-1 .project.item').each(function(index, element) {
        var thisItem = $(this),
            thisItemImage = thisItem.find('figure'),
            thisItemDetail = thisItem.find('.project-details');
        thisItemDetail.css('bottom', '25%');      
        if (index % 2 == 0) {
          thisItemImage.addClass('offset-xl-1'); 
          thisItemDetail.css('right', '10%');           
        } else {
          thisItemImage.addClass('offset-xl-4'); 
          thisItemDetail.css('left', '18%'); 
        } 
      });        
    }
  };
  
  /**
   * Swiper Slider
   * Enables carousels and sliders
   * Requires assets/js/vendor/swiper-bundle.min.js
   */
  Drupal.behaviors.martexSwiperSlider= {
    attach: function (context, settings) { 
      var carousel = document.querySelectorAll('.swiper-container');
      for(var i = 0; i < carousel.length; i++) {
        var slider1 = carousel[i];
        slider1.classList.add('swiper-container-' + i);
        var controls = document.createElement('div');
        controls.className = "swiper-controls";
        var pagi = document.createElement('div');
        pagi.className = "swiper-pagination";
        var navi = document.createElement('div');
        navi.className = "swiper-navigation";
        var prev = document.createElement('div');
        prev.className = "swiper-button swiper-button-prev";
        var next = document.createElement('div');
        next.className = "swiper-button swiper-button-next";
        slider1.appendChild(controls);
        controls.appendChild(navi);
        navi.appendChild(prev);
        navi.appendChild(next);
        controls.appendChild(pagi);
        var sliderEffect = slider1.getAttribute('data-effect') ? slider1.getAttribute('data-effect') : 'slide';
        if (slider1.getAttribute('data-items-auto') === 'true') {
          var slidesPerViewInit = "auto";
          var breakpointsInit = null;
        } else {
          var sliderItems = slider1.getAttribute('data-items') ? slider1.getAttribute('data-items') : 3; // items in all devices
          var sliderItemsXs = slider1.getAttribute('data-items-xs') ? slider1.getAttribute('data-items-xs') : 1; // start - 575
          var sliderItemsSm = slider1.getAttribute('data-items-sm') ? slider1.getAttribute('data-items-sm') : Number(sliderItemsXs); // 576 - 767
          var sliderItemsMd = slider1.getAttribute('data-items-md') ? slider1.getAttribute('data-items-md') : Number(sliderItemsSm); // 768 - 991
          var sliderItemsLg = slider1.getAttribute('data-items-lg') ? slider1.getAttribute('data-items-lg') : Number(sliderItemsMd); // 992 - 1199
          var sliderItemsXl = slider1.getAttribute('data-items-xl') ? slider1.getAttribute('data-items-xl') : Number(sliderItemsLg); // 1200 - end
          var sliderItemsXxl = slider1.getAttribute('data-items-xxl') ? slider1.getAttribute('data-items-xxl') : Number(sliderItemsXl); // 1500 - end
          var slidesPerViewInit = sliderItems;
          var breakpointsInit = {
            0: {
              slidesPerView: Number(sliderItemsXs)
            },
            576: {
              slidesPerView: Number(sliderItemsSm)
            },
            768: {
              slidesPerView: Number(sliderItemsMd)
            },
            992: {
              slidesPerView: Number(sliderItemsLg)
            },
            1200: {
              slidesPerView: Number(sliderItemsXl)
            },
            1400: {
              slidesPerView: Number(sliderItemsXxl)
            }
          }
        }
        var sliderSpeed = slider1.getAttribute('data-speed') ? slider1.getAttribute('data-speed') : 500;
        var sliderAutoPlay = slider1.getAttribute('data-autoplay') !== 'false';
        var sliderAutoPlayTime = slider1.getAttribute('data-autoplaytime') ? slider1.getAttribute('data-autoplaytime') : 5000;
        var sliderAutoHeight = slider1.getAttribute('data-autoheight') === 'true';
        var sliderResizeUpdate = slider1.getAttribute('data-resizeupdate') !== 'false';
        var sliderAllowTouchMove = slider1.getAttribute('data-drag') !== 'false';
        var sliderReverseDirection = slider1.getAttribute('data-reverse') === 'true';
        var sliderMargin = slider1.getAttribute('data-margin') ? slider1.getAttribute('data-margin') : 30;
        var sliderLoop = slider1.getAttribute('data-loop') === 'true';
        var sliderCentered = slider1.getAttribute('data-centered') === 'true';
        var swiper = slider1.querySelector('.swiper:not(.swiper-thumbs)');
        var swiperTh = slider1.querySelector('.swiper-thumbs');
        var sliderTh = new Swiper(swiperTh, {
          slidesPerView: 5,
          spaceBetween: 10,
          loop: false,
          threshold: 2,
          slideToClickedSlide: true
        });
        if (slider1.getAttribute('data-thumbs') === 'true') {
          var thumbsInit = sliderTh;
          var swiperMain = document.createElement('div');
          swiperMain.className = "swiper-main";
          swiper.parentNode.insertBefore(swiperMain, swiper);
          swiperMain.appendChild(swiper);
          slider1.removeChild(controls);
          swiperMain.appendChild(controls);
        } else {
          var thumbsInit = null;
        }
        var slider = new Swiper(swiper, {
          on: {
            beforeInit: function() {
              if(slider1.getAttribute('data-nav') !== 'true' && slider1.getAttribute('data-dots') !== 'true') {
                controls.remove();
              }
              if(slider1.getAttribute('data-dots') !== 'true') {
                pagi.remove();
              }
              if(slider1.getAttribute('data-nav') !== 'true') {
                navi.remove();
              }
            },
            init: function() {
              if(slider1.getAttribute('data-autoplay') !== 'true') {
                this.autoplay.stop();
              }
              this.update();
            }
          },
          autoplay: {
            delay: sliderAutoPlayTime,
            disableOnInteraction: false,
            reverseDirection: sliderReverseDirection,
            pauseOnMouseEnter: false
          },
          allowTouchMove: sliderAllowTouchMove,
          speed: parseInt(sliderSpeed),
          slidesPerView: slidesPerViewInit,
          loop: sliderLoop,
          centeredSlides: sliderCentered,
          spaceBetween: Number(sliderMargin),
          effect: sliderEffect,
          autoHeight: sliderAutoHeight,
          grabCursor: true,
          resizeObserver: false,
          updateOnWindowResize: sliderResizeUpdate,
          breakpoints: breakpointsInit,
          pagination: {
            el: carousel[i].querySelector('.swiper-pagination'),
            clickable: true
          },
          navigation: {
            prevEl: slider1.querySelector('.swiper-button-prev'),
            nextEl: slider1.querySelector('.swiper-button-next'),
          },
          thumbs: {
            swiper: thumbsInit,
          },
        });
      }
    }
  };

  //////////////// Move form labels to placeholders
  Drupal.behaviors.martexForms = {
    attach: function (context, settings) {   
      $("form#contact-message-feedback-form :input, form.user-form :input, form.user-login-form :input, form.user-pass :input, .block-simplenews form :input").each(function(index, elem) {
        var eId = $(elem).attr("id");
        var label = null;
        if (eId && (label = $(elem).parents("form").find("label[for="+eId+"]")).length == 1) {
            $(elem).attr("placeholder", $(label).html());
            $(label).remove();
        }      
      });
    }
  };

})(jQuery, Drupal);
