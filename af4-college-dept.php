<?php
/**
 * College Department - AgriFlex4
 *
 * @package      af4-college-dept
 * @author       Zachary Watkins
 * @copyright    2019 Texas A&M AgriLife Communications
 * @license      GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name:  College Department - AgriFlex4
 * Plugin URI:   https://github.com/AgriLife/af4-college-dept
 * Description:  College of Agriculture and Life Sciences Unit variation of the AgriFlex4 theme.
 * Version:      0.1.0
 * Author:       Zachary Watkins
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
spl_autoload_register( 'CollegeDept::autoload' );
CollegeDept::get_instance();

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
