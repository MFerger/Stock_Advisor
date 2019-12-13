<?php
if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array(
  	'key' => 'group_5df3c1ce3fd02',
  	'title' => 'Recommendation Fields',
  	'fields' => array(
  		array(
  			'key' => 'field_5df3d431f5ba6',
  			'label' => 'Associated Stock',
  			'name' => 'associated_stock',
  			'type' => 'post_object',
  			'instructions' => 'Please select the associated stock.',
  			'required' => 1,
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
  				'value' => 'recommendation',
  			),
  		),
  	),
  	'menu_order' => 0,
  	'position' => 'normal',
  	'style' => 'default',
  	'label_placement' => 'top',
  	'instruction_placement' => 'label',
  	'hide_on_screen' => array(
  		0 => 'discussion',
  		1 => 'comments',
  		2 => 'revisions',
  		3 => 'slug',
  		4 => 'format',
  		5 => 'categories',
  		6 => 'tags',
  		7 => 'send-trackbacks',
  	),
  	'active' => true,
  	'description' => '',
  ));

endif;
 ?>
