function film_studio_menu_open() {
  jQuery(".sidenav").addClass('open');
}
function film_studio_menu_close() {
  jQuery(".sidenav").removeClass('open');
}

( function( window, document ) {
  function film_studio_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const film_studio_nav = document.querySelector( '.sidenav' );
      if ( ! film_studio_nav || ! film_studio_nav.classList.contains( 'open' ) ) {
        return;
      }
      const elements = [...film_studio_nav.querySelectorAll( 'input, a, button' )],
        film_studio_lastEl = elements[ elements.length - 1 ],
        film_studio_firstEl = elements[0],
        film_studio_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;
      if ( ! shiftKey && tabKey && film_studio_lastEl === film_studio_activeEl ) {
        e.preventDefault();
        film_studio_firstEl.focus();
      }
      if ( shiftKey && tabKey && film_studio_firstEl === film_studio_activeEl ) {
        e.preventDefault();
        film_studio_lastEl.focus();
      }
    } );
  }
  film_studio_keepFocusInMenu();
} )( window, document );

var film_studio_btn = jQuery('#scrolltop');

jQuery(window).scroll(function() {
  if (jQuery(window).scrollTop() > 300) {
    film_studio_btn.addClass('scroll');
  } else {
    film_studio_btn.removeClass('scroll');
  }
});

film_studio_btn.on('click', function(e) {
  e.preventDefault();
  jQuery('html, body').animate({scrollTop:0}, '300');
});

window.addEventListener('load', (event) => {
    jQuery(".loading").delay(2000).fadeOut("slow");
});

//sticy header js

jQuery(window).scroll(function () {
    var sticky = jQuery('.main-header'),
    scroll = jQuery(window).scrollTop();

    if (scroll >= 100) sticky.addClass('fixed-header');
    else sticky.removeClass('fixed-header');
});