<?php
/**
 * @package Stock
 * @version 1
 */
/*
Plugin Name: Stock
Description: This plugin adds the Stock custom post type.
Author: Michael Ferger
Version: 1
*/

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( class_exists('ACF') ) :

class Stock {

  function __construct() {
    add_action('init', [$this, 'register_post_type']);
  }

  public function register_post_type() {
    register_post_type('stock', [
      'labels' => [
        'name' => _x('Stock', 'post type general name'),
        'singular_name' => _x('Stock', 'post type singular name'),
        'menu_name' => _x('Stock', 'admin menu'),
        'name_admin_bar' => _x('Stock', 'add new on admin bar'),
        'add_new' => _x('Add New Stock', 'stock'),
        'add_new_item' => __('Add New Stock'),
        'new_item' => __('New Stock'),
        'edit_item' => __('Edit Stock'),
        'view_item' => __('View Stock'),
        'all_items' => __('All Stocks'),
        'search_items' => __('Search Stocks'),
        'parent_item_colon' => __('Parent Stock:'),
        'not_found' => __('No Stocks found.'),
        'not_found_in_trash' => __('No Stocks found in Trash.')
      ],
      'public' => false,
      'show_ui' => true,
      'capability_type' => 'post',
      'hierarchical' => false,
      'has_archive' => false,
      'rewrite' => ['slug' => 'stock'],
      'show_in_rest' => true,
      'menu_icon' => 'dashicons-cart'
    ]);
    if(!preg_match('/(local)/', $_SERVER['HTTP_HOST'])) {
      require __DIR__ . '/fields.php';
    }
  }

  public function get_stock_info($symbol) {
    set_time_limit(0);
    $url_info = "https://financialmodelingprep.com/api/v3/company/profile/$symbol";
    $channel = curl_init();
    curl_setopt($channel, CURLOPT_AUTOREFERER, TRUE);
    curl_setopt($channel, CURLOPT_HEADER, 0);
    curl_setopt($channel, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($channel, CURLOPT_URL, $url_info);
    curl_setopt($channel, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($channel, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    curl_setopt($channel, CURLOPT_TIMEOUT, 0);
    curl_setopt($channel, CURLOPT_CONNECTTIMEOUT, 0);
    curl_setopt($channel, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($channel, CURLOPT_SSL_VERIFYPEER, FALSE);
    $output = curl_exec($channel);
    if (curl_error($channel)) {
        return 'error:' . curl_error($channel);
    } else {
      $outputJSON = json_decode($output);
      $price = money_format('$%i',$outputJSON->profile->price);
      $changes = $outputJSON->profile->changes;
      $changesPercentage = $outputJSON->profile->changesPercentage;
      $range = $outputJSON->profile->range;
      $beta = $outputJSON->profile->beta;
      $volAvg = $outputJSON->profile->volAvg;
      $mktCap = $outputJSON->profile->mktCap;
      $lastDiv = $outputJSON->profile->lastDiv;
      if(!empty($lastDiv) || $lastDiv == 0) {
        $lastDiv = "N/A";
      }
      $html = "
        <div class='stock_info'>
          <p>Price: $price</p>
          <p>Price Change: $changes</p>
          <p>Price Change in Percentage: $changesPercentage</p>
          <p>52 Week Range: $range</p>
          <p>Beta: $beta</p>
          <p>Volume Average: $volAvg</p>
          <p>Market Capitalization: $mktCap</p>
          <p>Last Dividend: $lastDiv</p>
        </div>
      ";
      return $html;
    }
  }

}

new Stock();

endif;
