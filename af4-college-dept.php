<?php
/**
 * College Department - AgriFlex4
 *
 * @package      af4-college-dept
 * @author       Zachary Watkins, Elisabeth Button
 * @copyright    2019 Texas A&M AgriLife Communications
 * @license      GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name:  College Department - AgriFlex4
 * Plugin URI:   https://github.com/AgriLife/af4-college-dept
 * Description:  College of Agriculture and Life Sciences Unit variation of the AgriFlex4 theme. Updated 2022 to reflect new brand guide.
 * Version:      2.0
 * Author:       Zachary Watkins, Elisabeth Button
 * Author URI:   https://github.com/ZachWatkins
 * Author Email: zachary.watkins@ag.tamu.edu
 * Text Domain:  af4-college-dept
 * License:      GPL-2.0+
 * License URI:  http://www.gnu.org/licenses/gpl-2.0.txt
 */

/* Define some useful constants */
define( 'CDEPAF4_DIRNAME', 'af4-college-dept' );
define( 'CDEPAF4_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'CDEPAF4_DIR_FILE', __FILE__ );
define( 'CDEPAF4_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'CDEPAF4_TEXTDOMAIN', 'af4-college-dept' );

/**
 * The core plugin class that is used to initialize the plugin
 */
require CDEPAF4_DIR_PATH . 'src/class-college-dept.php';
spl_autoload_register( 'College_Dept::autoload' );
College_Dept::get_instance();

/**
 * Notify user of missing dependencies
 */
register_activation_hook( __FILE__, 'af4_college_dept_activation' );

/**
 * Check for missing dependencies
 *
 * @since 0.1.0
 * @return void
 */
function af4_college_dept_activation() {
	$theme = wp_get_theme();
	if ( 'AgriFlex4' !== $theme->name ) {
		$error = sprintf(
			/* translators: %s: URL for plugins dashboard page */
			__(
				'Plugin NOT activated: The <strong>College Department - AgriFlex4 Plugin</strong> needs the <strong>AgriFlex4 Theme</strong> to be installed and activated first. <a href="%s">Back to plugins page</a>',
				'af4-college-dept'
			),
			get_admin_url( null, '/plugins.php' )
		);
		wp_die( wp_kses_post( $error ) );
	}
}

// Override the theme Single template for custom post types
add_filter( 'single_template', 'override_single_template' );
function override_single_template( $single_template ){
    global $post;

    $file = dirname(__FILE__) .'/../../plugins/af4-college-dept/templates/single.php';

    if( file_exists( $file ) ) $single_template = $file;

    return $single_template;
}

// Override the theme Category template for custom post types 
add_filter( 'category_template', 'override_category_template' );
function override_category_template( $category_template ){
    global $post;

    $file = dirname(__FILE__) .'/../../plugins/af4-college-dept/templates/category-department-updates.php';

    if( file_exists( $file ) ) $category_template = $file;

    return $category_template;
}
//* Remove the entry header markup and entry title for posts so they can have a custom header



add_action( 'genesis_before', 'prefix_remove_entry_header' );
/**
 * Remove Entry Header
 */
function prefix_remove_entry_header()
{

	if ( is_page_template( '/plugins/af4-college-dept/templates/single.php' ) ) { return; }

	//* Remove the entry header markup (requires HTML5 theme support)
	remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
	remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );

	//* Remove the entry title (requires HTML5 theme support)
	remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

	//* Remove the entry meta in the entry header (requires HTML5 theme support)
	remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

	//* Remove the post format image (requires HTML5 theme support)
	remove_action( 'genesis_entry_header', 'genesis_do_post_format_image', 4 );


}
