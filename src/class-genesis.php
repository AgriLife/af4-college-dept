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

		add_action( 'genesis_header', array( $this, 'add_site_title' ), 6 );
		add_filter( 'genesis_seo_title', array( $this, 'add_site_name' ), 11, 3 );

	}

	/**
	 * Add the site title custom field.
	 *
	 * @since 0.3.0
	 * @return void
	 */
	public function add_site_title() {

		$field = get_field( 'site_banner_text', 'option' );
		if ( empty( $field ) ) {
			$field = 'College of Agriculture & Life Sciences';
		}

		echo wp_kses_post( "<div class=\"college-dept-title show-for-medium\"><div class=\"grid-container\">$field</div></div>" );

	}

	/**
	 * Add the site title custom field.
	 *
	 * @since 0.4.1
	 * @param string $title  The SEO title.
	 * @param string $inside The inner portion of the SEO title.
	 * @param string $wrap   The html element to wrap the title in.
	 * @return string
	 */
	public function add_site_name( $title, $inside, $wrap ) {

		if ( false !== display_header_text() ) {

			$title = str_replace( '</a>', '<span class="site-title-text">' . get_bloginfo( 'name' ) . '</span></a>', $title );

		}

		return $title;

	}
}
