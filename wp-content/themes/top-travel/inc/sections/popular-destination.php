<?php
/**
 * Popular Destination section
 *
 * This is the template for the content of popular destination section
 *
 * @package Theme Palace
 * @subpackage Top Travel Pro
 * @since Top Travel Pro 1.0.0
 */
if ( ! function_exists( 'top_travel_add_popular_destination_section' ) ) :
    /**
    * Add popular destination section
    *
    *@since Top Travel Pro 1.0.0
    */
    function top_travel_add_popular_destination_section() {
    	$options = top_travel_get_theme_options();
        // Check if destination is enabled on frontpage
        $popular_destination_enable = apply_filters( 'top_travel_section_status', true, 'popular_destination_section_enable' );
        
        if ( true !== $popular_destination_enable ) {
            return false;
        }
        // Get destination section details
        $section_details = array();
        $section_details = apply_filters( 'top_travel_filter_popular_destination_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render destination section now.
        top_travel_render_popular_destination_section( $section_details );
    }
endif;

if ( ! function_exists( 'top_travel_get_popular_destination_section_details' ) ) :
    /**
    * popular destination section details.
    *
    * @since Top Travel Pro 1.0.0
    * @param array $input popular destination section details.
    */
    function top_travel_get_popular_destination_section_details( $input ) {
        $options = top_travel_get_theme_options();

        // Content type.
        $popular_destination_content_type  = $options['popular_destination_content_type'];

        $content = array();
        switch ( $popular_destination_content_type ) {
        	
            case 'page':
                $page_ids = array();

                for ( $i = 1; $i <= 6; $i++ ) {
                    if ( ! empty( $options['popular_destination_content_page_' . $i] ) )
                        $page_ids[] = $options['popular_destination_content_page_' . $i];
                }
                
                $args = array(
                    'post_type'         => 'page',
                    'post__in'          => ( array ) $page_ids,
                    'posts_per_page'    =>6,
                    'orderby'           => 'post__in',
                    );                    
            break;

            case 'trip':
                if ( ! class_exists( 'WP_Travel' ) )
                    return;

                $page_ids = array();

                for ( $i = 1; $i <= 6; $i++ ) {
                    if ( ! empty( $options['popular_destination_content_trip_' . $i] ) )
                        $page_ids[] = $options['popular_destination_content_trip_' . $i];
                }
                
                $args = array(
                    'post_type'         => 'itineraries',
                    'post__in'          => ( array ) $page_ids,
                    'posts_per_page'    =>6,
                    'orderby'           => 'post__in',
                    );                    
            break;  

            default:
            break;
        }

            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['id']        = get_the_id();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['excerpt']   = top_travel_trim_content( 30 );
                    $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-590x650.jpg';

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
// destination section content details.
add_filter( 'top_travel_filter_popular_destination_section_details', 'top_travel_get_popular_destination_section_details' );


if ( ! function_exists( 'top_travel_render_popular_destination_section' ) ) :
  /**
   * Start destination section
   *
   * @return string destination content
   * @since Top Travel Pro 1.0.0
   *
   */
   function top_travel_render_popular_destination_section( $content_details = array() ) {
        $options = top_travel_get_theme_options();
        $popular_destination_content_type  = $options['popular_destination_content_type'];

        if ( empty( $content_details ) ) {
            return;
        } ?>
        <div id="popular-destinations" class="relative page-section same-background">
                <div class="wrapper">
                    <div class="destination-slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite": false, "speed": 1000, "dots": false, "arrows":true, "autoplay": false, "draggable": true, "fade": false }'>
                        <?php foreach ( $content_details as $content ) : ?>
                            <article>
                                <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ) ; ?>');">
                                    <a href="<?php echo esc_url( $content['url'] ) ; ?>" class="post-thumbnail-link"></a>
                                </div><!-- .featured-image -->

                                <div class="entry-container">

                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ) ; ?>"><?php echo esc_html( $content['title'] ) ; ?></a></h2>
                                    </header>

                                    <div class="entry-content">
                                        <p><?php echo esc_html( $content['excerpt'] ) ; ?></p>
                                    </div><!-- .entry-content -->

                                    <?php if ( !empty($options['popular_destination_btn_title']) ): ?>
                                        <div class="more-link">
                                            <a href="<?php echo esc_url( $content['url'] ) ; ?>"><?php echo esc_html( $options['popular_destination_btn_title'] ) ?><svg viewBox="0 0 493.356 493.356">
                                                <path d="M490.498,239.278l-109.632-99.929c-3.046-2.474-6.376-2.95-9.993-1.427c-3.613,1.525-5.427,4.283-5.427,8.282v63.954H9.136
                                                c-2.666,0-4.856,0.855-6.567,2.568C0.859,214.438,0,216.628,0,219.292v54.816c0,2.663,0.855,4.853,2.568,6.563
                                                c1.715,1.712,3.905,2.567,6.567,2.567h356.313v63.953c0,3.812,1.817,6.57,5.428,8.278c3.62,1.529,6.95,0.951,9.996-1.708
                                                l109.632-101.077c1.903-1.902,2.852-4.182,2.852-6.849C493.356,243.367,492.401,241.181,490.498,239.278z"/>
                                            </svg></a>
                                        </div><!-- .more-link -->
                                    <?php endif ?>
                                    
                                </div><!-- .entry-container -->
                            </article>
                        <?php endforeach ; ?>
                    </div><!-- .section-content -->
                </div><!-- .wrapper -->
            </div><!-- #popular-destinations -->
        
    <?php }
endif;