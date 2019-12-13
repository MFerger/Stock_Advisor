<?php
if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array(
  	'key' => 'group_5df3d3788e081',
  	'title' => 'Stock Fields',
  	'fields' => array(
  		array(
  			'key' => 'field_5df3d3a54f23a',
  			'label' => 'Associated Company',
  			'name' => 'associated_company',
  			'type' => 'post_object',
  			'instructions' => 'Please select the company who owns the stock.',
  			'required' => 1,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  			'post_type' => array(
  				0 => 'company',
  			),
  			'taxonomy' => '',
  			'allow_null' => 0,
  			'multiple' => 0,
  			'return_format' => 'id',
  			'ui' => 1,
  		),
  		array(
  			'key' => 'field_5df3d3ee4f23b',
  			'label' => 'Ticker Symbol',
  			'name' => 'ticker_symbol',
  			'type' => 'text',
  			'instructions' => 'Please do not add spaces before or after the ":".',
  			'required' => 1,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  			'default_value' => '',
  			'placeholder' => 'NASDAQ:SBUX',
  			'prepend' => '',
  			'append' => '',
  			'maxlength' => '',
  		),
  	),
  	'location' => array(
  		array(
  			array(
  				'param' => 'post_type',
  				'operator' => '==',
  				'value' => 'stock',
  			),
  		),
  	),
  	'menu_order' => 0,
  	'position' => 'normal',
  	'style' => 'default',
  	'label_placement' => 'top',
  	'instruction_placement' => 'label',
  	'hide_on_screen' => array(
  		0 => 'permalink',
  		1 => 'the_content',
  		2 => 'excerpt',
  		3 => 'discussion',
  		4 => 'comments',
  		5 => 'revisions',
  		6 => 'slug',
  		7 => 'author',
  		8 => 'format',
  		9 => 'featured_image',
  		10 => 'categories',
  		11 => 'tags',
  		12 => 'send-trackbacks',
  	),
  	'active' => true,
  	'description' => '',
  ));

endif;
 ?>
