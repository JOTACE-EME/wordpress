<?php
/**
 * Service section
 *
 * This is the template for the content of service section
 *
 * @package Theme Palace
 * @subpackage Top Travel Pro
 * @since Top Travel Pro 1.0.0
 */
if ( ! function_exists( 'top_travel_add_service_section' ) ) :
    /**
    * Add service section
    *
    *@since Top Travel Pro 1.0.0
    */
    function top_travel_add_service_section() {
        $options = top_travel_get_theme_options();
        // Check if service is enabled on frontpage
        $service_enable = apply_filters( 'top_travel_section_status', true, 'service_section_enable' );


        if ( true !== $service_enable ) {
            return false;
        }
        // Get service section details
        $section_details = array();
        $section_details = apply_filters( 'top_travel_filter_service_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render service section now.
        top_travel_render_service_section( $section_details );
    }
endif;

if ( ! function_exists( 'top_travel_get_service_section_details' ) ) :
    /**
    * service section details.
    *
    * @since Top Travel Pro 1.0.0
    * @param array $input service section details.
    */
    function top_travel_get_service_section_details( $input ) {
        $options = top_travel_get_theme_options();
        
        $content = array();
  
        $page_ids = array();

        for ( $i = 1; $i <= 3; $i++ ) {
            if ( ! empty( $options['service_content_page_' . $i] ) )
                $page_ids[] = $options['service_content_page_' . $i];
        }
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => 3,
            'orderby'           => 'post__in',
            );                    
          

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = top_travel_trim_content( 20 );
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';

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
// service section content details.
add_filter( 'top_travel_filter_service_section_details', 'top_travel_get_service_section_details' );


if ( ! function_exists( 'top_travel_render_service_section' ) ) :
  /**
   * Start service section
   *
   * @return string service content
   * @since Top Travel Pro 1.0.0
   *
   */
   function top_travel_render_service_section( $content_details = array() ) {
        $options = top_travel_get_theme_options();
        $i = 1;        

        if ( empty( $content_details ) ) {
            return;
        } 
        ?> 
        <div id="our-services" class="relative page-section same-background">
            <div class="wrapper">
                <div class="section-header">
                <?php if( !empty( $options['service_sub_title'] ) ): ?>
                    <p class="section-subtitle"><?php echo esc_html( $options['service_sub_title'] ) ; ?></p>
                <?php endif;

                    if( !empty( $options['service_title'] ) ):

                     ?>
                    <h2 class="section-title"><?php echo esc_html( $options['service_title'] ) ; ?></h2>
                <?php endif; ?>
                </div><!-- .section-header -->

                <div class="section-content col-3 clear">
                    <?php foreach ( $content_details as $content ) : ?>
                        <article>
                        <div class="service-item-wrapper">
                            <?php if (  !empty($options['service_content_icon_' . $i]) ): ?>
                                <div class="icon-container">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>">
                                        <i class="fa <?php echo ! empty( $options['service_content_icon_' . $i] ) ? esc_attr( $options['service_content_icon_' . $i] ) : 'fa-cogs'; ?>"></i>
                                    </a>
                                </div><!-- .icon-container -->
                            <?php endif ?>
                            <div class="entry-container">
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                </header>

                                <div class="entry-content">
                                    <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                </div><!-- .entry-content -->
                            </div><!-- .entry-container -->
                            </div>
                        </article>
                    <?php $i++; endforeach; ?>
                </div><!-- .section-content -->

                <?php if ( !empty( $options['service_btn_url'] ) && $options['service_btn_title'] ): ?>
                    <div class="read-more">
                        <a href="<?php echo esc_url( $options['service_btn_url'] ) ; ?>" class="btn"><?php echo esc_html( $options['service_btn_title'] ) ?></a>
                    </div><!-- .read-more -->
                <?php endif ?>
                
            </div><!-- .wrapper -->
        </div><!-- #our-services -->
    <?php }
endif;