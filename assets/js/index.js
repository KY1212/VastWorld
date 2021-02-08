jQuery(function($){

  function toggleNav() {
    const $hamburger = $(".hamburger");
    const $menu = $(".menu");

    function toggleAction() {
      $hamburger.toggleClass("active");
      $menu.toggleClass("open");
    }
    $hamburger.on("click", toggleAction);
  }

  function scroll() {
    const $window = $(window);
    const $header = $('header');
    const $nav = $header.find('.p-header__nav');

    const headerHeight = $header.height(); //headerの高さ
    const navHeight = $nav.height(); //navの高さ



    $window.scroll(function() {
        const currentPos = $window.scrollTop();

        if(currentPos >= headerHeight - navHeight) {
            $header.addClass('is-sticky');
            $nav.addClass('is-sticky');
        } else {
            $header.removeClass('is-sticky');
            $nav.removeClass('is-sticky');
        }
    });
  }

  function init() {
    toggleNav();
    scroll();
  }

  init();

});
