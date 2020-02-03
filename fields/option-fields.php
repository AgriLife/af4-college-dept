<?php
/**
 * The file that defines extra fields for the AgriFlex4 theme options page
 *
 * @link       https://github.com/agrilife/af4-college-dept/blob/master/fields/option-fields.php
 * @since      0.1.0
 * @package    af4-college-dept
 * @subpackage af4-college-dept/fields
 */

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5e346038910d9',
	'title' => 'College Options',
	'fields' => array(
		array(
			'key' => 'field_5e346051c681e',
			'label' => 'Site Title',
			'name' => 'site_title',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'agriflex4-options',
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
