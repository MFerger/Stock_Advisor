<?php
/**
 * @package Company
 * @version 1
 */
/*
Plugin Name: Company
Description: This plugin adds the Company custom post type.
Author: Michael Ferger
Version: 1
*/

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( class_exists('ACF') ) :

class Company {

  function __construct() {
    add_action('init', [$this, 'register_post_type']);
  }

  public function register_post_type() {
    register_post_type('company', [
      'labels' => [
        'name' => _x('Company', 'post type general name'),
        'singular_name' => _x('Company', 'post type singular name'),
        'menu_name' => _x('Company', 'admin menu'),
        'name_admin_bar' => _x('Company', 'add new on admin bar'),
        'add_new' => _x('Add New Company', 'company'),
        'add_new_item' => __('Add New Company'),
        'new_item' => __('New Company'),
        'edit_item' => __('Edit Company'),
        'view_item' => __('View Company'),
        'all_items' => __('All Companies'),
        'search_items' => __('Search Companies'),
        'parent_item_colon' => __('Parent Company:'),
        'not_found' => __('No Companies found.'),
        'not_found_in_trash' => __('No Companies found in Trash.')
      ],
      'public' => true,
      'show_ui' => true,
      'capability_type' => 'post',
      'hierarchical' => false,
      'supports' => array(
        'thumbnail',
        'editor',
        'title'
      ),
      'has_archive' => true,
      'rewrite' => ['slug' => 'company', 'with_front' => false],
      'show_in_rest' => true,
      'menu_icon' => 'dashicons-admin-multisite'
    ]);
    if(!preg_match('/(local)/', $_SERVER['HTTP_HOST'])) {
      require __DIR__ . '/fields.php';
    }
  }

  public function get_company_info($symbol) {
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
      $logo = $outputJSON->profile->image;
      $companyName = $outputJSON->profile->companyName;
      $exchange = $outputJSON->profile->exchange;
      $description = $outputJSON->profile->description;
      $industry = $outputJSON->profile->industry;
      $sector = $outputJSON->profile->sector;
      $ceo = $outputJSON->profile->ceo;
      $website = $outputJSON->profile->website;
      $html = "
        <div class='logo_name'>
          <img src='$logo' alt='$companyName' />
          <p>$companyName</p>
        </div>
        <div class='company_info'>
          <p>Exchange: $exchange</p>
          <p>Description: $description</p>
          <p>Industry: $industry</p>
          <p>Sector: $sector</p>
          <p>CEO: $ceo</p>
          <p>Website URL: <a href='$website' target='_blank'>$website</a></p>
        </div>
      ";
      return $html;
    }
  }
}

new Company();

endif;
