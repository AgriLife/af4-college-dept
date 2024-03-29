<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://github.com/AgriLife/af4-college-dept/blob/master/src/class-college-dept.php
 * @since      0.1.0
 * @package    af4-college-dept
 * @subpackage af4-college-dept/src
 */

/**
 * The core plugin class
 *
 * @since 0.1.0
 */
class College_Dept {

	/**
	 * File name
	 *
	 * @var file
	 */
	private static $file = __FILE__;

	/**
	 * Instance
	 *
	 * @var instance
	 */
	private static $instance;

	/**
	 * Initialize the class
	 *
	 * @since 0.1.0
	 * @return void
	 */
	private function __construct() {

		// Require classes.
		$this->require_classes();

		// Add Widgets.
		add_action( 'widgets_init', array( $this, 'register_widgets' ) );

		add_image_size( 'medium_cropped', 300, 225, true );

		// Add custom fields.
		if ( class_exists( 'acf' ) ) {
			require_once CDEPAF4_DIR_PATH . 'fields/page-header-fields.php';
		}

	}

	/**
	 * Initialize the various classes
	 *
	 * @since 0.1.0
	 * @return void
	 */
	private function require_classes() {

		/* Set up asset files */
		require_once CDEPAF4_DIR_PATH . 'src/class-custom-fields.php';
		$ado_customfields = new \CollegeDept\Custom_Fields();

		/* Set up asset files */
		require_once CDEPAF4_DIR_PATH . 'src/class-assets.php';
		$ado_assets = new \CollegeDept\Assets();

		/* Genesis modifications */
		require_once CDEPAF4_DIR_PATH . 'src/class-genesis.php';
		new \CollegeDept\Genesis();

	}
		/**
	 * Register widgets
	 *
	 * @since 0.1.0
	 * @return void
	 */
	public function register_widgets() {

		require_once CDEPAF4_DIR_PATH . 'src/class-widget-af4c-social.php';
		register_widget( 'Widget_AF4C_Social' );

	}
	/**
	 * Autoloads any classes called within the theme
	 *
	 * @since 0.1.0
	 * @param string $classname The name of the class.
	 * @return void.
	 */
	public static function autoload( $classname ) {

		$filename = dirname( __FILE__ ) .
			DIRECTORY_SEPARATOR .
			str_replace( '_', DIRECTORY_SEPARATOR, $classname ) .
			'.php';

		if ( file_exists( $filename ) ) {
			require $filename;
		}

	}

	/**
	 * Return instance of class
	 *
	 * @since 0.1.0
	 * @return object.
	 */
	public static function get_instance() {

		return null === self::$instance ? new self() : self::$instance;

	}

}
