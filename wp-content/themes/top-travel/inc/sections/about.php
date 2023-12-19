<?php
/**
 * About section
 *
 * This is the template for the content of about section
 *
 * @package Theme Palace
 * @subpackage Top Travel Pro
 * @since Top Travel Pro 1.0.0
 */
if ( ! function_exists( 'top_travel_add_about_section' ) ) :
    /**
    * Add about section
    *
    *@since Top Travel Pro 1.0.0
    */
    function top_travel_add_about_section() {
    	$options = top_travel_get_theme_options();
        // Check if about is enabled on frontpage
        $about_enable = apply_filters( 'top_travel_section_status', true, 'about_section_enable' );

        if ( true !== $about_enable ) {
            return false;
        }
        // Get about section details
        $section_details = array();
        $section_details = apply_filters( 'top_travel_filter_about_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render about section now.
        top_travel_render_about_section( $section_details );
    }
endif;

if ( ! function_exists( 'top_travel_get_about_section_details' ) ) :
    /**
    * about section details.
    *
    * @since Top Travel Pro 1.0.0
    * @param array $input about section details.
    */
    function top_travel_get_about_section_details( $input ) {
        $options = top_travel_get_theme_options();

        // Content type.
        $about_content_type  = $options['about_content_type'];
        
        $content = array();
   
        $page_id = ! empty( $options['about_content_page'] ) ? $options['about_content_page'] : '';
        $args = array(
            'post_type'         => 'page',
            'page_id'           => $page_id,
            'posts_per_page'    => 1,
          );
        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['excerpt']   = top_travel_trim_content( 35 );
                $page_post['url']       = get_the_permalink();
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : '';

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();

            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// about section content details.
add_filter( 'top_travel_filter_about_section_details', 'top_travel_get_about_section_details' );


if ( ! function_exists( 'top_travel_render_about_section' ) ) :
  /**
   * Start about section
   *
   * @return string about content
   * @since Top Travel Pro 1.0.0
   *
   */
   function top_travel_render_about_section( $content_details = array() ) {
        $options = top_travel_get_theme_options();
        $destinations = ! empty( $options['about_content_destination'] ) ? $options['about_content_destination'] : array();
        $product_cats = ! empty( $options['about_content_product_category'] ) ? $options['about_content_product_category'] : array();

        if ( empty( $content_details ) ) {
            return;
        } 

        foreach ( $content_details as $content ) : 
            $about_bg_image = $options['about_bg_image'] !== '' ? $options['about_bg_image']: '' ; 
        ?>

            <div id="about-us" class="relative page-section" style="background-image: url('<?php echo esc_url( $about_bg_image ) ; ?>');">
                <div class="wrapper">
                    <article class="<?php echo !empty ( $content['image'] ) ? 'has-post-thumbnail' : 'no-post-thumbnail' ?>">
                        <?php if ( !empty ( $content['image'] ) ) : ?>
                            <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ) ; ?>');">
                                <a href="<?php echo esc_url( $content['url'] ) ; ?>" class="post-thumbnail-link"></a>
                            </div><!-- .featured-image -->
                        <?php endif; ?>

                        <div class="entry-container">


                            <div class="section-header">

                                
                            <?php if ( !empty( $options['about_sub_title'] ) ): ?>
                                <p class="section-subtitle"><?php echo esc_html( $options['about_sub_title'] ) ?></p>
                            <?php endif; ?>

                            <h2 class="section-title"><a href="<?php echo esc_url( $content['url'] ) ; ?>"><?php echo esc_html( $content['title'] ) ; ?></a></h2>
                            </div><!-- .section-header -->

                            <div class="entry-content">
                                <p><?php echo esc_html( $content['excerpt'] ) ; ?></p>
                            </div><!-- .entry-content -->

                            <?php if ( !empty( $options['about_btn_title'] ) ): ?>
                                <div class="read-more">
                                    <a href="<?php echo esc_url( $content['url'] ) ; ?>" class="btn"><?php echo esc_html( $options['about_btn_title'] ) ?></a>
                                </div><!-- .read-more -->
                            <?php endif ?>
                           
                        </div><!-- .entry-container -->
                    </article>
                </div><!-- .wrapper -->
            </div><!-- #about-us -->
        <?php endforeach;
    }
endif;

