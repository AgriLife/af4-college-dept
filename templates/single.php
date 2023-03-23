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


remove_action('genesis_entry_content', 'genesis_do_post_content');
add_action( 'genesis_entry_content', 'custom_entry_content' ); // Add custom loop
//* Force full width content layout
//add_filter( 'genesis_site_layout', '__genesis_return_content_sidebar' );

while ( have_posts() ){

	the_post();




function custom_entry_content() {
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

 
<?php
$image = get_the_post_thumbnail();
                if ( $image ) { ?>
                    <div class="wp-block-cover alignfull is-light has-custom-content-position is-position-bottom-left" id="post-page-cover"><img class="wp-block-cover__image-background" src="<?php the_post_thumbnail_url('full'); ?>"></div>
            <?php      }
                else { } ?>


<h1 class="entry-title"><?php the_title(); ?></h1>
<p class="blog-date"><strong><?php the_time('F jS, Y') ?> </strong> </p> 



  <section class="entry-content">
    <?php the_content(); ?>
  </section><!-- .entry-content -->

</article>
<?php
}
}
// Runs the Genesis loop.
genesis();