<?php
/**
 * Testimonial section
 *
 * This is the template for the content of testimonial section
 *
 * @package Theme Palace
 * @subpackage Top Travel Pro
 * @since Top Travel Pro 1.0.0
 */
if ( ! function_exists( 'top_travel_add_testimonial_section' ) ) :
    /**
    * Add testimonial section
    *
    *@since Top Travel Pro 1.0.0
    */
    function top_travel_add_testimonial_section() {
        $options = top_travel_get_theme_options();
        // Check if testimonial is enabled on frontpage
        $testimonial_enable = apply_filters( 'top_travel_section_status', true, 'testimonial_section_enable' );


        if ( true !== $testimonial_enable ) {
            return false;
        }
        // Get testimonial section details
        $section_details = array();
        $section_details = apply_filters( 'top_travel_filter_testimonial_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render testimonial section now.
        top_travel_render_testimonial_section( $section_details );
    }
endif;

if ( ! function_exists( 'top_travel_get_testimonial_section_details' ) ) :
    /**
    * testimonial section details.
    *
    * @since Top Travel Pro 1.0.0
    * @param array $input testimonial section details.
    */
    function top_travel_get_testimonial_section_details( $input ) {
        $options = top_travel_get_theme_options();


        $content = array();

        $page_ids = array();
        $author = array();

        for ( $i = 1; $i <= 5; $i++ ) {
            if ( ! empty( $options['testimonial_content_page_' . $i] ) ) :
                $page_ids[] = $options['testimonial_content_page_' . $i];
                $author[] = ! empty( $options['testimonial_author_' . $i] ) ? $options['testimonial_author_' . $i] : '';
            endif;
        }
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => absint( 5 ),
            'orderby'           => 'post__in',
            );                    
 
        // Run The Loop.
        $query = new WP_Query( $args );
        $i = 0;
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = top_travel_trim_content( 35 );
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'large' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-590x650.jpg';

                // Push to the main array.
                array_push( $content, $page_post );
                $i++;
            endwhile;
        endif;
        wp_reset_postdata();
   
            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// testimonial section content details.
add_filter( 'top_travel_filter_testimonial_section_details', 'top_travel_get_testimonial_section_details' );


if ( ! function_exists( 'top_travel_render_testimonial_section' ) ) :
  /**
   * Start testimonial section
   *
   * @return string testimonial content
   * @since Top Travel Pro 1.0.0
   *
   */
   function top_travel_render_testimonial_section( $content_details = array() ) {
        $options = top_travel_get_theme_options();
        $autoplay = $options['testimonial_auto_play'] ? 'true' : 'false';

        if ( empty( $content_details ) ) {
            return;
        } ?>
        <div id="testimonial-section" class="relative page-section testimonial-class">
                <div class="wrapper testimonial-class-wrapper">
                    <div class="section-header">
                        <p class="section-subtitle testimonial-class-subtitle"><?php echo esc_html( $options['testimonial_section_sub_title'] ); ?></p>
                        <h2 class="section-title testimonial-class-title">
                            <?php echo esc_html( $options['testimonial_section_title'] ); ?>
                        </h2>
                    </div><!-- .section-header -->

                    <div class="testimonial-slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite": false, "speed": 1000, "dots": true, "arrows":false, "autoplay": <?php echo esc_attr( $autoplay ); ?>, "draggable": true, "fade": false }'>
                        <?php $i = 1 ; foreach ( $content_details as $content ) : ?>
                        <article>
                            <div class="featured-image">
                                <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['image'] ); ?>" alt="testimonial-01"></a>
                            </div><!-- .featured-image -->

                            <div class="entry-container">
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>">‘’<?php echo esc_html( $content['title'] ); ?>’’</a></h2>
                                </header>

                                <div class="entry-content">
                                    <p><?php echo wp_kses_post( $content['excerpt'] ); ?></p>
                                </div><!-- .entry-content -->

                                <?php if ( !empty($options['testimonial_client_image_'.$i]) || !empty($options['testimonial_client_name_'.$i]) || !empty($options['testimonial_client_position_'.$i])): ?>
                                    <div class="client-details">
                                        <?php if ( !empty($options['testimonial_client_image_'.$i]) ): ?>
                                            <div class="client-image">
                                                <img src="<?php echo esc_url( $options['testimonial_client_image_'.$i] ) ?>" alt="client-01">
                                            </div><!-- .client-image -->
                                        <?php endif ?>
                                        

                                        <div class="client-name">
                                        <?php if ( !empty($options['testimonial_client_name_'.$i]) ): ?>
                                            <span><?php echo esc_html( $options['testimonial_client_name_'.$i] ) ?></span>
                                        <?php endif; ?>
                                        <?php if ( !empty($options['testimonial_client_position_'.$i]) ): ?>
                                            <p class="position"><?php echo esc_html( $options['testimonial_client_position_'.$i] ) ?></p>
                                        <?php endif; ?>
                                        </div>
                                </div><!-- .client-details -->
                                <?php endif ?>
                                
                            </div><!-- .entry-container -->
                        </article>
                    <?php $i++ ; endforeach ; ?>
                    </div><!-- .section-content -->
                </div><!-- .wrapper -->
            </div><!-- #testimonial-section -->
       

    <?php }
endif;
