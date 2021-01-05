$(function(){

  function toggleNav() {
    const $hamburger = $(".hamburger");
    const $menu = $("header").find(".menu");

    function toggleAction() {
      $hamburger.toggleClass("open");
      $menu.toggleClass("open");
    }
    $hamburger.on("click", toggleAction);
  }

  function init() {
    toggleNav();
  }

  init();

});
