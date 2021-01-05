<?php
function read_assets() {
  wp_enqueue_style(
    'reset-style',
    get_stylesheet_directory_uri().'/assets/css/reset.css'
  );
  wp_enqueue_style(
    'main-style',
    get_stylesheet_directory_uri().'/assets/css/style.css'
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

  wp_enqueue_script(
    'jquery',
    'https://unpkg.com/scrollreveal',
    array(),true
  );
}

function delete_local_jquery() {
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

function wp_menu_optimization($menu) {
  return preg_replace(array( '#^<ul[^>]*>#', '#</ul>$#' ), '', $menu);
}

function cancel_auto_paragraph() {
  remove_filter('the_content', 'wpautop');
  remove_filter('the_excerpt', 'wpautop');
}

function wp_active_function() {
  register_nav_menus(
    array(
    'global' => 'グローバル'
    )
  );
}

function userinfo_global() {
    global $users_info;
    $users_info = wp_get_current_user();
}
add_action( 'init', 'userinfo_global' );

function hooks() {
  add_action('wp_enqueue_scripts', 'read_assets', 'delete_local_jquery');
  add_filter('wp_nav_menu', 'wp_menu_optimization');
}

function init() {
  delete_local_jquery();
  display_thumbnails();
  wp_active_function();
  hooks();
  cancel_auto_paragraph();
}

init();
