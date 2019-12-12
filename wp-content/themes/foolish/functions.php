<?php
add_action('init', function () {
  add_theme_support( 'post-thumbnails' );
  add_filter( 'meta_content', 'wptexturize' );
  add_filter( 'meta_content', 'convert_smilies' );
  add_filter( 'meta_content', 'convert_chars' );
  add_filter( 'meta_content', 'wpautop' );
  add_filter( 'meta_content', 'prepend_attachment' );
  add_filter('acf_the_content', 'wpautop');
  if( !is_admin() ) {
    //CSS
    wp_enqueue_style( 'main_style', get_template_directory_uri() . '/stylesheets/style.css', array(), filemtime(get_stylesheet_directory() . '/stylesheets/style.css') );
    //JS
    wp_enqueue_script( 'custom_js', get_template_directory_uri() . '/js/custom.js', array(), filemtime(get_stylesheet_directory() . '/js/custom.js') );
  }
});
/* Custom Functions */
