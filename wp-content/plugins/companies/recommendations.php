<?php
/**
 * @package Companies
 * @version 1
 */
/*
Plugin Name: Companies
Description: This plugin adds the companies custom post type.
Author: Michael Ferger
Version: 1
*/

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( class_exists('ACF') ) :

class Companies {

  function __construct() {
    add_action('init', [$this, 'register_post_type']);
  }

  public function register_post_type() {
    register_post_type('company', [
      'labels' => [
        'name' => _x('Companies', 'post type general name'),
        'singular_name' => _x('Company', 'post type singular name'),
        'menu_name' => _x('Companies', 'admin menu'),
        'name_admin_bar' => _x('Companies', 'add new on admin bar'),
        'add_new' => _x('Add New Company', 'company'),
        'add_new_item' => __('Add New Company'),
        'new_item' => __('New Company'),
        'edit_item' => __('Edit Company'),
        'view_item' => __('View Company'),
        'all_items' => __('All Companies'),
        'search_items' => __('Search Companies'),
        'parent_item_colon' => __('Parent Companies:'),
        'not_found' => __('No Companies found.'),
        'not_found_in_trash' => __('No Companies found in Trash.')
      ],
      'public' => true,
      'show_ui' => true,
      'capability_type' => 'post',
      'hierarchical' => false,
      'has_archive' => false,
      'rewrite' => ['slug' => 'company'],
      'show_in_rest' => true,
      'menu_icon' => 'dashicons-thumbs-up',
      'with_front' => false
    ]);
    if(!preg_match('/(local)/', $_SERVER['HTTP_HOST'])) {
      require __DIR__ . '/fields.php';
    }
  }
}

new Companies();

endif;
