<?php
function read_assets() {
  wp_enqueue_style(
    'reset-style',
    get_stylesheet_directory_uri().'/assets/Foundation/reset.css'
  );
  wp_enqueue_style(
    'main-style',
    get_stylesheet_directory_uri().'/assets/Foundation/style.css'
  );
  wp_enqueue_script(
    'jquery',
    '//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js',
    array(),'3.4.1',true
  );
  wp_enqueue_script(
    'main-style',
    get_theme_file_uri().'/assets/js/index.js',
    array('jquery'),true
  );

}

//WPの不要なクラスを除去
function remove_menu_id( $id ){
	return $id = array();
}
add_filter('nav_menu_item_id', 'remove_menu_id', 10);

function remove_menu_class( $classes ){
	return $classes = array();
}
add_filter('nav_menu_css_class', 'remove_menu_class', 10, 2);

function remove_menu_aria_current( $atts, $item, $args ){
	unset ( $atts['aria-current'] );
	return $atts;
}
add_filter('nav_menu_link_attributes', 'remove_menu_aria_current', 11, 5);

//カスタムメニューに任意のli要素を付与
function add_slug_nav_menu_css( $classes, $item ) {
  $classes[] = esc_attr( 'p-header__item' . $item->attr_title );
  return $classes;
}
add_filter( 'nav_menu_css_class', 'add_slug_nav_menu_css', 10, 2 );

//ピックアップ記事の設定
register_nav_menus( array(
	'pickup' => 'ピックアップ',
) );

function my_delete_local_jquery() {
  wp_deregister_script('jquery');
}

function display_thumbnails() {
  add_theme_support('post-thumbnails');
}

function sub_loop($number = -1, $paged = "") {
  $args = array(
    'post_type' => 'post',
    'posts_per_page' => $number,
    'no_found_rows' => false,
    'paged' => $paged,
  );
  $the_query = new WP_Query($args);

  return $the_query;
}

function sidebar_tag() {
  $term_list = get_terms('post_tag');
  foreach ($term_list as $term) {
    $tags = (get_term_link( $term, 'post_tag' ));
    echo '<li class="tag"><a href="'.$tags.'">'.$term->name.'</a></li>';
  }
}

function tag_loop() {
  $tags = get_the_tags();
  $tagCounter = "";
  if ($tags) {
    foreach ($tags as $tag) {
      ++$tagCounter;
      $tagLink = get_tag_link($tag->term_id);
      if ($tagCounter > 3) {
        break;
      }
      echo '<li class="tag"><a href="'.$tagLink.'">' . $tag->name . '</a></li>';
    }
  }
}

function pagination($pages = '', $range = 2) {
  $showItems = ($range * 2)+1;
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($pages == '') {
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if (!$pages) {
        $pages = 1;
    }
  }
  if (1 != $pages) {
    echo '<ul class="list">';
    if ($paged > 1) {
      echo "<a href='".get_pagenum_link($paged - 1)."'><li><i class='fas fa-angle-left arrow'></i></a>";
    }
    for ($i=1; $i <= $pages; $i++) {
      if (1 != $pages &&(!($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showItems)) {
        echo ($paged == $i)?
        "<li class='page active'><a href='".get_pagenum_link($i)."'>".$i."</a></li>":
        "<li class='page'><a href='".get_pagenum_link($i)."'>".$i."</a></li>";
      }
    }
    if ($paged < $pages) {
      echo "<a href='".get_pagenum_link($paged + 1)."'><li><i class='fas fa-angle-right arrow'></i></a>";
    }
    echo '</ul>';
    }
  }

function wp_menu_optimization($menu) {
  return preg_replace(array( '#^<ul[^>]*>#', '#</ul>$#' ), '', $menu);
}

// サイドバーウィジェット
function widget() {
register_sidebar( array(
  'name' => __( 'Side Widget' ),
  'id' => 'side-widget',
  'before_widget' => '<li class="widget-container">',
  'after_widget' => '</li>',
  'before_title' => '<h3>',
  'after_title' => '</h3>',
) );
}


function cancel_auto_paragraph() {
  remove_filter('the_title', 'wptexturize');
  remove_filter('the_content', 'wptexturize');
  remove_filter('the_excerpt', 'wptexturize');
  remove_filter('the_title', 'wpautop');
  remove_filter('the_content', 'wpautop');
  remove_filter('the_excerpt', 'wpautop');
  remove_filter('the_editor_content', 'wp_richedit_pre');
}

function wp_active_function() {
  register_nav_menus(
    array(
    'global' => 'グローバル'
    )
  );
}

function hooks() {
  add_action('wp_enqueue_scripts', 'read_assets', 'my_delete_local_jquery');
  add_filter('wp_nav_menu', 'wp_menu_optimization');
}

function init() {
  my_delete_local_jquery();
  display_thumbnails();
  wp_active_function();
  hooks();
  cancel_auto_paragraph();
  widget();
}

init();
