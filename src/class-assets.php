<?php
/**
 * The file that defines css and js files loaded for the plugin
 *
 * A class definition that includes css and js files used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://github.com/AgriLife/af4-college-dept/blob/master/src/class-assets.php
 * @since      0.1.0
 * @package    af4-college-dept
 * @subpackage af4-college-dept/src
 */

namespace CollegeDept;

/**
 * Add assets
 *
 * @since 0.1.0
 */
class Assets {

	/**
	 * Initialize the class
	 *
	 * @since 0.1.0
	 * @return void
	 */
	public function __construct() {

		// Register global styles used in the theme.
		add_action( 'wp_enqueue_scripts', array( $this, 'register_styles' ) );

		// Enqueue extension styles.
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );

		// Register scripts used in the plugin.
		add_action( 'wp_enqueue_scripts', array( $this, 'register_scripts' ), 14 );

		// Enqueue scripts used in the plugin.
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ), 15 );

	}

	/**
	 * Registers all styles used within the plugin
	 *
	 * @since 0.1.0
	 * @return void
	 */
	public function register_styles() {

		wp_register_style(
			'college-unit-styles',
			CDEPAF4_DIR_URL . 'css/college-dept.css',
			array(),
			filemtime( CDEPAF4_DIR_PATH . 'css/college-dept.css' ),
			'screen'
		);

	}

	/**
	 * Enqueues extension styles
	 *
	 * @since 0.1.0
	 * @return void
	 */
	public function enqueue_styles() {

		wp_enqueue_style( 'college-unit-styles' );

	}

	/**
	 * Register js files.
	 *
	 * @since 0.1.0
	 * @return void
	 */
	public function register_scripts() {

		wp_register_script(
			'foundation-college',
			CDEPAF4_DIR_URL . 'js/foundation.concat.js',
			array( 'jquery', 'foundation' ),
			filemtime( CDEPAF4_DIR_PATH . '/js/foundation.concat.js' ),
			true
		);

	}

	/**
	 * Enqueue js files.
	 *
	 * @since 0.1.0
	 * @return void
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( 'foundation-college' );

	}

}
