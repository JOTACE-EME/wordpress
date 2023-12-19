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
$class = has_post_thumbnail() ? '' : 'no-post-thumbnail';
$options = top_travel_get_theme_options();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>

    <div class="post-item-wrapper">
        <div class="entry-container">
             <?php if ( has_post_thumbnail() ) : ?>
                <div class="featured-image matchheight" style="background-image: url('<?php the_post_thumbnail_url( 'post-thumbnail' ); ?>');">
                    <a href="<?php the_permalink(); ?>" class="post-thumbnail-link"></a>
                </div><!-- .featured-image -->
            <?php endif; ?>
            <?php echo top_travel_article_header_meta();  ?>
            <header class="entry-header">
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                 <div class="entry-meta">
                    <?php 
                        echo top_travel_author_meta();
                        top_travel_posted_on();
                    ?>
                </div><!-- .entry-meta -->
            </header>
            <div class="entry-content">
                <p><?php the_excerpt(); ?></p>
            </div><!-- .entry-content -->

            <?php if( !empty( $options['blog_page_button'] ) ): ?>
            <div class="read-more">
            <a href="<?php the_permalink(); ?>" class="btn" tabindex="0"><?php echo esc_html( $options['blog_page_button'] ); ?></a>
            </div><!-- .read-more -->
        <?php endif; ?>

        </div><!-- .entry-container -->
       
    </div><!-- .post-item-wrapper -->

</article><!-- #post-## -->
