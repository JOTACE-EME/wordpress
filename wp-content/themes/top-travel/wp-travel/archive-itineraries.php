<?php 
/**
 * Itinerary Archive Template
 *
 * This template can be overridden by copying it to yourtheme/wp-travel/archive-itineraries.php.
 *
 * HOWEVER, on occasion wp-travel will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.wensolutions.com/document/template-structure/
 * @author      WenSolutions
 * @package     wp-travel/Templates
 * @since       1.0.0
 */

get_header( 'itinerary' ); ?>
<div id="inner-content-wrapper" class="wrapper page-section <?php echo is_active_sidebar( 'wp-travel-archive-sidebar' ) ? 'secondary-active' : 'secondary-inactive'; ?>">
	<?php do_action( 'wp_travel_before_main_content' ); ?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
		        <div class="archive-blog-wrapper posts-wrapper clear">
					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php wptravel_get_template_part( 'content', 'archive-itineraries' ); ?>
						<?php endwhile; // end of the loop. ?>
					<?php else : ?>
						<?php wptravel_get_template_part( 'content', 'archive-itineraries-none' ); ?>
					<?php endif; ?>
				</div>
				<?php  
				/**
				* Hook - top_travel_action_pagination.
				*
				* @hooked top_travel_pagination 
				*/
				do_action( 'top_travel_action_pagination' );

				/**
				* Hook - top_travel_infinite_loader_spinner_action.
				*
				* @hooked top_travel_infinite_loader_spinner 
				*/
				do_action( 'top_travel_infinite_loader_spinner_action' );
				?>
			</main>
		</div>
		<?php if ( is_active_sidebar( 'wp-travel-archive-sidebar' ) ) : ?>
			<div id="secondary">
				<?php do_action( 'wp_travel_archive_listing_sidebar' ); ?>
			</div>
		<?php endif; ?>
	<?php do_action( 'wp_travel_after_main_content' ); ?>
</div>
<?php get_footer( 'itinerary' ); ?>
