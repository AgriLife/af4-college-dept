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
?>

<?php get_header(); ?>

<div 
<?php 
//$current_page_term = get_queried_object(); 


if ( ! function_exists( 'genesis_site_layout' ) ) {
	echo 'id="wrap"';
} else {
	echo 'class="' . genesis_site_layout() . '-wrap"';
}

?>
>
<main class="content" id="genesis-content">

	<h1>Department Updates</h1>

<?php if (have_posts()) : ?>
    <div id="blog-posts">
        
  <?php while (have_posts()) :
      the_post(); 
      
      ?>
      <div class="blog-post-archive-listing">
        <div class="wp-block-columns is-layout-flex post-details">
            
            <?php $image = get_the_post_thumbnail();
                if ( $image ) { ?>
                    <div class="wp-block-column post-image">
                    <?php the_post_thumbnail('medium'); ?>
                    </div>
            <?php      }
                else {}?>
            <div class="wp-block-column post-content">
                <h2 class="blog-post-title">
                <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
                <?php the_title(); ?></a></h2>
                <p class="blog-date"><strong><?php the_time('F jS, Y') ?> </strong> </p> 
                
                <?php the_excerpt(); ?>
                
            </div>
                
           
        </div>

        </div>
    <?php endwhile; ?>
    
    </div>
<?php endif; ?>

</main>
</div>
<?php

if ( ! function_exists( 'genesis_site_layout' ) ) {
	// Not a genesis theme
	get_sidebar();
}

get_footer();

?>