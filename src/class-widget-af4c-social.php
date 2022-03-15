<?php
/**
 * The file that creates a social buttons widget.
 *
 * @link       https://github.com/AgriLife/af4-college-dept/blob/master/src/class-widget-af4c-social.php
 * @since      0.1.0
 * @package    af4-college-dept
 * @subpackage af4-college-dept/src
 */

/**
 * Loads theme widgets
 *
 * @package af4-college-dept
 * @since 0.1.0
 */
class Widget_AF4C_Social extends WP_Widget {

	/**
	 * Default instance.
	 *
	 * @since 0.1.0
	 * @var array
	 */
	protected $default_instance = array(
		'title'   => '',
		'content' => '<div class="textwidget custom-html-widget"><a class="social-links" href="https://www.facebook.com/tamuagrilife" id="Facebook" itemprop="sameAs" title="agrilife facebook">
<span class="sr-only">AgriLife Facebook</span>
<span aria-hidden="true" aria-label="AgriLife Facebook" class="fab fa-facebook-square" title="AgriLife Facebook"></span><span class="sr-only">AgriLife Facebook</span>
</a>
<a class="social-links" href="https://twitter.com/AgriLife" id="Twitter" itemprop="sameAs" title="agrilife twitter">
<span class="sr-only">AgriLife Twitter</span>
<span aria-hidden="true" aria-label="AgriLife Twitter" class="fab fa-twitter-square" title="AgriLife Twitter"></span><span class="sr-only">AgriLife Twitter</span>
</a>
<a class="social-links" href="https://www.linkedin.com/company/texas-a&amp;m-agrilife/" id="Linkedin" itemprop="sameAs" title="agrilife linkedin">
<span class="sr-only">AgriLife Linkedin</span>
<span aria-hidden="true" aria-label="AgriLife Linkedin" class="fab fa-linkedin" title="AgriLife Linkedin"></span><span class="sr-only">AgriLife Linkedin</span>
</a>
<a class="social-links" href="https://www.youtube.com/user/AgriLifeVideo" id="Youtube" itemprop="sameAs" title="agrilife youtube">
<span class="sr-only">AgriLife Youtube</span>
<span aria-hidden="true" aria-label="AgriLife Youtube" class="fab fa-youtube-square" title="AgriLife Youtube"></span><span class="sr-only">AgriLife Youtube</span>
</a></div>',
	);

	/**
	 * Construct the widget
	 *
	 * @since 0.1.0
	 * @return void
	 */
	public function __construct() {

		$widget_ops = array(
			'classname'                   => 'college-social',
			'description'                 => __( 'Social media links for this unit.' ),
			'customize_selective_refresh' => true,
		);

		$control_ops = array(
			'width'  => 400,
			'height' => 350,
		);
		parent::__construct( 'college_social', __( 'Connect with Us' ), $widget_ops, $control_ops );

	}

	/**
	 * Echoes the widget content
	 *
	 * @since 0.1.0
	 * @param array $args Display arguments including 'before_title', 'after_title', 'before_widget', and 'after_widget'.
	 * @param array $instance The settings for the particular instance of the widget.
	 * @return void
	 */
	public function widget( $args, $instance ) {

		$instance = array_merge( $this->default_instance, $instance );
		$title    = $instance['title'];
		$content  = $instance['content'];

		$title = '<div class="title-wrap cell medium-12 small-4-collapse">' . $args['before_title'] . $title . $args['after_title'] . '</div>';

		$args['before_widget'] = str_replace( 'class="widget-wrap', 'class="widget-wrap', $args['before_widget'] );

		echo wp_kses_post( $args['before_widget'] );
		if ( ! empty( $instance['title'] ) ) {
			echo wp_kses_post( $title );
		}
		echo '<div class="textwidget custom-html-widget">'; // The textwidget class is for theme styling compatibility.
		echo wp_kses(
			$content,
			array(
				'div'  => array(
					'class' => array(),
				),
				'span' => array(
					'class' => array(),
				),
				'a'    => array(
					'class' => array(),
					'href'  => array(),
				),
			)
		);
		echo '</div>';
		echo wp_kses_post( $args['after_widget'] );

	}

	/**
	 * Outputs the settings update form
	 *
	 * @since 0.1.0
	 * @param array $instance Current settings.
	 * @return void
	 */
	public function form( $instance ) {

		$instance = wp_parse_args( (array) $instance, $this->default_instance );

		$output = '<p><label for="%s">%s</label><input type="text" id="%s" name="%s" class="title widefat" value="%s"/></p><p><textarea id="%s" rows="8" name="%s" class="content widefat">%s</textarea></p>';

		echo wp_kses(
			sprintf(
				$output,
				esc_attr( $this->get_field_id( 'title' ) ),
				esc_attr_e( 'Title:', 'af4-college-dept' ),
				esc_attr( $this->get_field_id( 'title' ) ),
				$this->get_field_name( 'title' ),
				esc_attr( $instance['title'] ),
				$this->get_field_id( 'content' ),
				$this->get_field_name( 'content' ),
				esc_textarea( $instance['content'] )
			),
			array(
				'p'        => array(),
				'label'    => array(
					'for' => array(),
				),
				'input'    => array(
					'type'  => array(),
					'id'    => array(),
					'name'  => array(),
					'class' => array(),
					'value' => array(),
				),
				'textarea' => array(
					'id'    => array(),
					'rows'  => array(),
					'name'  => array(),
					'class' => array(),
				),
			)
		);

	}

	/**
	 * Updates a particular instance of a widget
	 *
	 * @since 0.1.0
	 * @param array $new_instance New settings for this instance as input by the user via WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {

		$instance          = array_merge( $this->default_instance, $old_instance );
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		if ( current_user_can( 'unfiltered_html' ) ) {
			$instance['content'] = $new_instance['content'];
		} else {
			$instance['content'] = wp_kses_post( $new_instance['content'] );
		}
		return $instance;

	}
}