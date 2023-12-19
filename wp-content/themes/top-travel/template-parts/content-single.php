<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Top Travel Pro
 * @since Top Travel Pro 1.0.0
 */
$options = top_travel_get_theme_options();
$class = has_post_thumbnail() ? '' : 'no-post-thumbnail';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'clear ' . $class ); ?>>

	<?php if ( $options['single_post_hide_banner'] == true ): ?>
		<h2 class="page-title"><?php single_post_title(); ?></h2>
	<?php endif ?>
	<div class="entry-meta">
		<?php if ( ! $options['single_post_hide_author'] ) :
			echo top_travel_author_meta();
		endif; 

		if ( ! $options['single_post_hide_date'] ) :
			top_travel_posted_on(); 
		endif; ?>
    </div><!-- .entry-meta -->

    <?php if ( $options['single_post_hide_banner'] == true ): ?>
		<img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_id(), 'full' ) ); ?> ">
	<?php endif ?>

    <div class="entry-container">
        <div class="entry-content">
            <?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'top-travel' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'top-travel' ),
					'after'  => '</div>',
				) );
			?>
        </div><!-- .entry-content -->
    </div><!-- .entry-container -->

    <div class="entry-meta">
        <?php top_travel_entry_footer(); ?>     
    </div><!-- .entry-meta -->

</article><!-- #post-## -->
