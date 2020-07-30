<?php
/**
 * Load ACF fields.
 *
 * @link       https://github.com/AgriLife/af4-college-dept/blob/master/src/class-custom-fields.php
 * @since      1.0.5
 * @package    af4-college-dept
 * @subpackage af4-college-dept/src
 */

namespace CollegeDept;

/**
 * Loads required theme assets
 *
 * @package af4-college-dept
 * @since 1.0.5
 */
class Custom_Fields {

	/**
	 * Initialize the class
	 *
	 * @since 1.0.5
	 * @return void
	 */
	public function __construct() {

		add_action( 'after_setup_theme', array( $this, 'add_options_between_existing_fields' ) );

	}

	/**
	 * Registers the fields after the theme options load.
	 *
	 * @since 1.0.5
	 * @return void
	 */
	public function add_options_between_existing_fields() {

		add_action( 'acf/init', array( $this, 'site_banner_text' ), 11 );

	}

	/**
	 * Registers the theme header logos option.
	 *
	 * @since 1.0.5
	 * @return void
	 */
	public function site_banner_text() {

		if ( function_exists( 'acf_add_local_field' ) ) {

			acf_add_local_field(
				array(
					'key'               => 'field_5e346051c681f',
					'label'             => 'Site Banner Text',
					'name'              => 'site_banner_text',
					'type'              => 'text',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => 'College of Agriculture & Life Sciences',
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
					'maxlength'         => 244,
					'parent'            => 'group_5e14d2d88b326',
				)
			);
		}
	}

}
