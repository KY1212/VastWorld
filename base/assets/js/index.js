$(function(){

  function toggleNav() {
    const $hamburger = $(".hamburger");
    const $menu = $(".menu");

    function toggleAction() {
      $hamburger.toggleClass("active");
      $menu.toggleClass("open");
    }
    $hamburger.on("click", toggleAction);
  }



  function init() {
    toggleNav();
    scroll();
  }

  init();

});
