jQuery(function ($) {

  function toggleNav() {
    const $hamburger = $(".hamburger");
    const $list = $(".p-header__list");
    const $headerItem = $(".p-header_item");
    const $subMenu = $(".sub-menu");

    function toggleActionHamburger() {
      $hamburger.toggleClass("active");
      $list.toggleClass("open");


      $("html").toggleClass("is-fixed");  // 背景固定解除！
      $('body').scrollTop();

    }

    // function toggleActionDropDownMenu() {
    //   $subMenu.toggleClass("open");

    // }
    $hamburger.on("click", toggleActionHamburger);
    // $headerItem.on("click", toggleActionDropDownMenu);

  }


  jQuery(function ($) {
    const tocWrap = jQuery(".p-toc__tocWrap");
    let idcount = 1;
    let toc = '';
    let currentlevel = 0;
    const tocCount = jQuery("h2").length;
    if (tocCount >= 3) {
      jQuery(".p-container__postWrap h2,.p-container__postWrap h3", this).each(function () {
        this.id = "toc-" + idcount;
        idcount++;
        let level = 0;
        if (this.nodeName.toLowerCase() == "h2") {
          level = 1;
        } else if (this.nodeName.toLowerCase() == "h3") {
          level = 2;
        }
        while (currentlevel < level) {
          toc += "<ol>";
          currentlevel++;
        }
        while (currentlevel > level) {
          toc += "</ol>";
          currentlevel--;
        }
        toc += '<li class="p-toc__item"><a href="#' + this.id + '">' + jQuery(this).html() + "</a></li>\n";
      });
      while (currentlevel > 0) {
        toc += "</ol>";
        currentlevel--;
      }
      if (jQuery("h2")[0]) {
        tocWrap.html('<div class="p-index">' + '<i class="fas fa-graduation-cap"></i>' + 'この記事に関する目次</div>' + toc);
      }
    } else if (tocCount < 3) {
      tocWrap.css({
        display: "none"
      })
    }
  });

  function scroll() {
    const $window = $(window);
    const $header = $('header');
    const $nav = $header.find('.p-header__nav');
    const headerHeight = $header.height(); //headerの高さ
    const navHeight = $nav.height(); //navの高さ
    $window.scroll(function () {
      const currentPos = $window.scrollTop();

      if (currentPos >= headerHeight - navHeight) {
        $header.addClass('is-sticky');
        $nav.addClass('is-sticky');
      } else {
        $header.removeClass('is-sticky');
        $nav.removeClass('is-sticky');
      }
    });
  }


  function index() {
    //ページ内リンク#非表示。加速スクロール
    $('a[href^=#]').click(function () {
      const speed = 300,
        href = $(this).attr("href"),
        target = $(href == "#" || href == "" ? 'html' : href),
        position = target.offset().top;
      $("html, body").animate({ scrollTop: position }, speed, "swing");
      return false;
    });
  }


  function addFontawesomeToMenuItems() {
    const item = $('.p-header__list > .p-header__item > a');
    const item2 = $('.p-header__list > .p-header__item');

    item2.find('.sub-menu').each(function () {
      // if(item2.find('.sub-menu')) {
        $(this).parent().find('a').append('<i class="fas fa-angle-down"></i>');
      // }
    });

  }

  function init() {
    toggleNav();
    scroll();
  }

  index();
  addFontawesomeToMenuItems();
  init();

});
