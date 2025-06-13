// preloader
jQuery(window).on('load', function() {
  jQuery('#status').fadeOut();
  jQuery('#preloader').delay(350).fadeOut('slow');
  jQuery('body').delay(350).css({'overflow':'visible'});
})

// toggle button
jQuery(function($){
  $( '.toggle-nav button' ).click( function(e){
    $( 'body' ).toggleClass( 'show-main-menu' );
    var element = $( '.sidenav' );
    weight_loss_club_trapFocus( element );
  });

  $( '.close-button' ).click( function(e){
    $( '.toggle-nav button' ).click();
    $( '.toggle-nav button' ).focus();
  });
  $( document ).on( 'keyup',function(evt) {
    if ( $( 'body' ).hasClass( 'show-main-menu' ) && evt.keyCode == 27 ) {
      $( '.toggle-nav button' ).click();
      $( '.toggle-nav button' ).focus();
    }
  });
});

function weight_loss_club_trapFocus(element) {
  var focusableElementsSelector = 'a, button, input, textarea, select, [tabindex]:not([tabindex="-1"])';
  var focusableEls = element.find(focusableElementsSelector).filter(':visible');
  var firstFocusableEl = focusableEls[0];
  var lastFocusableEl = focusableEls[focusableEls.length - 1];
  var KEYCODE_TAB = 9;

  element.on('keydown', function(e) {
    var isTabPressed = (e.key === 'Tab' || e.keyCode === KEYCODE_TAB);
    if (!isTabPressed) {
      return;
    }

    if (e.shiftKey) {
      // Shift + Tab
      if (document.activeElement === firstFocusableEl) {
        lastFocusableEl.focus();
        e.preventDefault();
      }
    } else {
      // Tab
      if (document.activeElement === lastFocusableEl) {
        firstFocusableEl.focus();
        e.preventDefault();
      }
    }
  });
}

// scroll to top
jQuery(document).ready(function () {
  jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 0) {
      jQuery('#button').fadeIn();
    } else {
      jQuery('#button').fadeOut();
    }
  });
  jQuery('#button').click(function () {
    jQuery("html, body").animate({
      scrollTop: 0
    }, 600);
    return false;
  });

  weight_loss_club_search_focus();
});

// Sticky Header
jQuery('document').ready(function($){
  $(window).scroll(function(){
    var sticky = $('.is-sticky-on'),
      scroll = $(window).scrollTop();

    if (scroll >= 100) sticky.addClass('header-sticky');
    else sticky.removeClass('header-sticky');
  });
});

// search
function weight_loss_club_search_focus() {

  /* First and last elements in the menu */
  var weight_loss_club_search_firstTab = jQuery('.serach_inner input[type="search"]');
  var weight_loss_club_search_lastTab  = jQuery('button.search-close'); /* Cancel button will always be last */

  jQuery(".search-open").click(function(e){
    e.preventDefault();
    e.stopPropagation();
    jQuery('body').addClass("search-focus");
    weight_loss_club_search_firstTab.focus();
  });

  jQuery("button.search-close").click(function(e){
    e.preventDefault();
    e.stopPropagation();
    jQuery('body').removeClass("search-focus");
    jQuery(".search-open").focus();
  });

  /* Redirect last tab to first input */
  weight_loss_club_search_lastTab.on('keydown', function (e) {
    if (jQuery('body').hasClass('search-focus'))
    if ((e.which === 9 && !e.shiftKey)) {
      e.preventDefault();
      weight_loss_club_search_firstTab.focus();
    }
  });

  /* Redirect first shift+tab to last input*/
  weight_loss_club_search_firstTab.on('keydown', function (e) {
    if (jQuery('body').hasClass('search-focus'))
    if ((e.which === 9 && e.shiftKey)) {
      e.preventDefault();
      weight_loss_club_search_lastTab.focus();
    }
  });

  /* Allow escape key to close menu */
  jQuery('.serach_inner').on('keyup', function(e){
    if (jQuery('body').hasClass('search-focus'))
    if (e.keyCode === 27 ) {
      jQuery('body').removeClass('search-focus');
      weight_loss_club_search_lastTab.focus();
    };
  });
}

// Slider
jQuery(document).ready(function($) {
  jQuery('#slider-cat .owl-carousel').owlCarousel({
    loop: true,
    margin: 0,
    nav: true,
    navText: ["<i class='fa-solid fa-angle-left'></i>", "<i class='fa-solid fa-angle-right'></i>"], 
    dots: true,
    rtl: false,
    items: 1,
    autoplay: true,
  });
});

// Trainer Slider
jQuery(document).ready(function($) {
  jQuery('#trainers-section .owl-carousel').owlCarousel({
    loop: true,
    margin: 0,
    nav: true,
    navText: ["<i class='fa-solid fa-angle-left'></i>", "<i class='fa-solid fa-angle-right'></i>"], 
    dots: false,
    rtl: false,
    items: 1,
    autoplay: true,
  });
});