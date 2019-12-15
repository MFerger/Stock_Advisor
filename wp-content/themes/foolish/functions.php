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
register_nav_menus( array(
  'main'    => __( 'Main Menu', 'foolish' ),
) );
///Custom Homepage
function custom_homepage($query) {
  if ( !is_admin() && $query->is_main_query() && is_home() ) {
    $query->set('post_type', array( 'recommendation' ) );
  }
}
add_action('pre_get_posts','custom_homepage');

//Article image size
add_image_size( 'article_thumbnail', 290, 290, false );

//Custom Pagination
function custom_pagination($numpages = '', $pagerange = '', $paged='') {
  if (empty($pagerange)) {
   $pagerange = 9999;
  }
  global $paged;
  if (empty($paged)) {
   $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
       $numpages = 1;
    }
  }
  $pagination_args = array(
   'base'            => get_pagenum_link(1) . '%_%',
   'format'          => 'page/%#%/',
   'total'           => $numpages,
   'current'         => $paged,
   'show_all'        => false,
   'end_size'        => 1,
   'mid_size'        => $pagerange,
   'prev_next'       => True,
   'prev_text'       => __('&laquo;'),
   'next_text'       => __('&raquo;'),
   'type'            => 'plain',
   'add_args'        => false,
   'add_fragment'    => ''
  );
  $paginate_links = paginate_links($pagination_args);
  if ($paginate_links) {
   echo "<nav class='custom_pagination'>";
     echo "<span class='page_numbers'>Page " . $paged . " of " . $numpages . "</span> ";
     echo "<div class='links'>$paginate_links</div>";
   echo "</nav>";
  }
}

//Theme Option Pages
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Options',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-options',
    'parent_slug'	=> '',
		'capability'	=> 'edit_posts',
    'position'    => false,
    'icon_url'    => false,
		'redirect'		=> true
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header Settings',
    'menu_slug' 	=> 'theme-options-header',
    'capability'	=> 'edit_posts',
		'parent_slug'	=> 'theme-options',
    'position'    => false,
    'icon_url'    => false
	));
}

//Header Custom fields
if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array(
  	'key' => 'group_5df51a0bb103e',
  	'title' => 'Header Fields',
  	'fields' => array(
  		array(
  			'key' => 'field_5df51a17a73c5',
  			'label' => 'Logo',
  			'name' => 'logo',
  			'type' => 'image',
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  			'return_format' => 'array',
  			'preview_size' => 'medium',
  			'library' => 'all',
  			'min_width' => '',
  			'min_height' => '',
  			'min_size' => '',
  			'max_width' => '',
  			'max_height' => '',
  			'max_size' => '',
  			'mime_types' => '',
  		),
  	),
  	'location' => array(
  		array(
  			array(
  				'param' => 'options_page',
  				'operator' => '==',
  				'value' => 'theme-options-header',
  			),
  		),
  	),
  	'menu_order' => 0,
  	'position' => 'normal',
  	'style' => 'default',
  	'label_placement' => 'top',
  	'instruction_placement' => 'label',
  	'hide_on_screen' => '',
  	'active' => true,
  	'description' => '',
  ));

endif;

//Post Custom fields
if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array(
  	'key' => 'group_5df3c2cb419b2',
  	'title' => 'News Fields',
  	'fields' => array(
  		array(
  			'key' => 'field_5df3c2de12b69',
  			'label' => 'Associated Stock',
  			'name' => 'associated_stock',
  			'type' => 'post_object',
  			'instructions' => 'Please select the associated stock, if any.',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  			'post_type' => array(
  				0 => 'stock',
  			),
  			'taxonomy' => '',
  			'allow_null' => 0,
  			'multiple' => 0,
  			'return_format' => 'object',
  			'ui' => 1,
  		),
  	),
  	'location' => array(
  		array(
  			array(
  				'param' => 'post_type',
  				'operator' => '==',
  				'value' => 'post',
  			),
  		),
  	),
  	'menu_order' => 0,
  	'position' => 'normal',
  	'style' => 'default',
  	'label_placement' => 'top',
  	'instruction_placement' => 'label',
  	'hide_on_screen' => '',
  	'active' => true,
  	'description' => '',
  ));

endif;
