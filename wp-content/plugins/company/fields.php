<?php
if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array(
  	'key' => 'group_5df3c19a5c777',
  	'title' => 'Company Fields',
  	'fields' => array(
  		array(
  			'key' => 'field_5df3d5d4f6f6e',
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
  				'param' => 'post_type',
  				'operator' => '==',
  				'value' => 'company',
  			),
  		),
  	),
  	'menu_order' => 0,
  	'position' => 'normal',
  	'style' => 'default',
  	'label_placement' => 'top',
  	'instruction_placement' => 'label',
  	'hide_on_screen' => array(
  		0 => 'the_content',
  		1 => 'excerpt',
  		2 => 'discussion',
  		3 => 'comments',
  		4 => 'revisions',
  		5 => 'slug',
  		6 => 'author',
  		7 => 'format',
  		8 => 'categories',
  		9 => 'tags',
  		10 => 'send-trackbacks',
  	),
  	'active' => true,
  	'description' => '',
  ));

endif;
 ?>
