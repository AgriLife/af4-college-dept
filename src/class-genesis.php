<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://github.com/AgriLife/af4-college-dept/blob/master/src/class-genesis.php
 * @since      0.1.0
 * @package    af4-college-dept
 * @subpackage af4-college-dept/src
 */

namespace CollegeDept;

/**
 * The core plugin class
 *
 * @since 0.1.0
 * @return void
 */
class Genesis {

	/**
	 * Initialize the class
	 *
	 * @since 0.1.0
	 * @return void
	 */
	public function __construct() {

		add_action('genesis_before_header', array( $this, 'add_site_title' ) );

	}

	/**
	 * Add the site title custom field.
	 *
	 * @since 0.3.0
	 * @return void
	 */
	public function add_site_title() {

		echo wp_kses_post( '<div class="college-dept-title show-for-medium"><div class="grid-container">' );

		the_field('site_title', 'option');

		echo wp_kses_post( '</div></div>' );

	}
}
