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
    classic_plumbing_services_trapFocus( element );
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

function classic_plumbing_services_trapFocus(element) {
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

// Banner Heading
jQuery(document).ready(function() {
  jQuery("#banner-cat .banner-main-box .banner-title").each(function() {
    var t = jQuery(this).text().trim();
    var splitT = t.split(" ");
    var newText = "";
    var secondLastIndex = splitT.length - 2;
    var fourthLastIndex = splitT.length - 4;

    for (var i = 0; i < splitT.length; i++) {
      if (i === secondLastIndex || i === fourthLastIndex) {
        newText += "<span class='title-text'>" + splitT[i] + "</span> ";
      } else {
        newText += splitT[i] + " ";
      }
    }
    jQuery(this).html(newText.trim());
  });
});
