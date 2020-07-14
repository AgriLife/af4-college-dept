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
class CollegeDept {

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

		add_image_size( 'medium_cropped', 300, 225, true );

		// Add custom fields.
		if ( class_exists( 'acf' ) ) {
			require_once CDEPAF4_DIR_PATH . 'fields/option-fields.php';
			require_once CDEPAF4_DIR_PATH . 'fields/page-header-fields.php';
		}

		// Add field to AgriFlex4 Options page.
		add_action( 'acf/init', array( $this, 'register_site_banner_text_field' ), 11 );

	}

	/**
	 * Initialize the various classes
	 *
	 * @since 0.1.0
	 * @return void
	 */
	private function require_classes() {

		/* Set up asset files */
		require_once CDEPAF4_DIR_PATH . 'src/class-assets.php';
		$ado_assets = new \CollegeDept\Assets();

		/* Genesis modifications */
		require_once CDEPAF4_DIR_PATH . 'src/class-genesis.php';
		new \CollegeDept\Genesis();

	}

	/**
	 * Add fields to the AgriFlex4 Options page
	 *
	 * @since 1.0.1
	 * @return void
	 */
	public function register_site_banner_text_field() {

		acf_add_local_field(
			array(
				'key' => 'field_5e346051c681f',
				'label' => 'Site Banner Text',
				'name' => 'site_banner_text',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => 'College of Agriculture & Life Sciences',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => 244,
				'parent' => 'group_5e14d2d88b326'
			)
		);

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
