<?php
/**
 * @package Recommendations
 * @version 1
 */
/*
Plugin Name: Recommendations
Description: This plugin adds the recommendations custom post type.
Author: Michael Ferger
Version: 1
*/

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( class_exists('ACF') ) :

class Recommendations {

  function __construct() {
    add_action('init', [$this, 'register_post_type']);
  }

  public function register_post_type() {
    register_post_type('recommendation', [
      'labels' => [
        'name' => _x('Recommendations', 'post type general name'),
        'singular_name' => _x('Recommendation', 'post type singular name'),
        'menu_name' => _x('Recommendations', 'admin menu'),
        'name_admin_bar' => _x('Recommendations', 'add new on admin bar'),
        'add_new' => _x('Add New Recommendation', 'recommendation'),
        'add_new_item' => __('Add New Recommendation'),
        'new_item' => __('New Recommendation'),
        'edit_item' => __('Edit Recommendation'),
        'view_item' => __('View Recommendation'),
        'all_items' => __('All Recommendations'),
        'search_items' => __('Search Recommendations'),
        'parent_item_colon' => __('Parent Recommendations:'),
        'not_found' => __('No Recommendations found.'),
        'not_found_in_trash' => __('No Recommendations found in Trash.')
      ],
      'public' => true,
      'show_ui' => true,
      'capability_type' => 'post',
      'hierarchical' => false,
      'has_archive' => false,
      'rewrite' => ['slug' => 'recommendation'],
      'show_in_rest' => true,
      'menu_icon' => 'dashicons-thumbs-up',
      'with_front' => false
    ]);
    if(!preg_match('/(local)/', $_SERVER['HTTP_HOST'])) {
      require __DIR__ . '/fields.php';
    }
  }
}

new Recommendations();

endif;
