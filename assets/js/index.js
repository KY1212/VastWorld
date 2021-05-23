jQuery(function ($) {

  function toggleAction() {
    const $hamburger = $(".hamburger");
    const $list = $('.p-header__list');
    const $headerItem = $list.find($('.p-header__item'));
    const $subMenu = $('.sub-menu');
    const $win = $(window);

    function toggleActionHamburger() {
      $hamburger.toggleClass("active");
      $list.toggleClass("open");
    }
    function toggleSubMenu() {
      $(!(this)).find($subMenu).removeClass("is-active");
      $(this).find($subMenu).toggleClass("is-active");
    }
    function removeSubMenu() {
      $subMenu.removeClass("is-active");
    }

    function mouseenterSubMenu() {
      $(this).find($subMenu).addClass('is-active');
    }
    function mouseleaveSubMenu() {
      $(this).find($subMenu).removeClass('is-active');
    }

    $hamburger.on("click", toggleActionHamburger);

    $win.on('load resize', function () {
      if (window.matchMedia('(min-width: 767px)').matches) {
        $headerItem.on("mouseenter", mouseenterSubMenu);
        $headerItem.on("mouseleave", mouseleaveSubMenu);
      } else {
        $headerItem.on("click", toggleSubMenu);
        //いるかこれ？？
        $(!($headerItem)).on("click", removeSubMenu);
      }
    });
  }

  function addFontawesomeToMenuItems() {
    const subMenu = $('.p-header__list > .p-header__item > .sub-menu');
    subMenu.each(function () {
      $(this).parent().find('a').append('<i class="fas fa-angle-down"></i>');
    });
    subMenu.find('a > i').remove('i');
  }

  jQuery(function ($) {
    const tocWrap = jQuery(".p-toc__tocWrap");
    let idcount = 1;
    let toc = '';
    let currentlevel = 0;
    const tocCount = jQuery("h2").length;
    if (tocCount >= 2) {
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
    var headerHight = $("header").height();
    $('a[href^=#]').click(function () {
      const speed = 300;
      const href = $(this).attr("href");
      const target = $(href == "#" || href == "" ? 'html' : href);
      const position = target.offset().top - headerHight;
      $("html, body").animate({ scrollTop: position }, speed, "swing");
      return false;
    });
  }




  function init() {
    toggleAction();
    scroll();
    index();
    addFontawesomeToMenuItems();
  }

  init();

});
