<?php
/**
 * Counter section
 *
 * This is the template for the content of counter section
 *
 * @package Theme Palace
 * @subpackage Top Travel Pro
 * @since Top Travel Pro 1.0.0
 */
if ( ! function_exists( 'top_travel_add_counter_section' ) ) :
    /**
    * Add counter section
    *
    *@since Top Travel Pro 1.0.0
    */
    function top_travel_add_counter_section() {
        $options = top_travel_get_theme_options();
        // Check if counter is enabled on frontpage
        $counter_enable = apply_filters( 'top_travel_section_status', true, 'counter_section_enable' );


        if ( true !== $counter_enable ) {
            return false;
        }

        // Render counter section now.
        top_travel_render_counter_section();
    }
endif;

if ( ! function_exists( 'top_travel_render_counter_section' ) ) :
  /**
   * Start counter section
   *
   * @return string counter content
   * @since Top Travel Pro 1.0.0
   *
   */
   function top_travel_render_counter_section() {
        $options = top_travel_get_theme_options();
        $image = ! empty( $options['counter_image'] ) ? $options['counter_image'] : '';
      
        ?>

        <div id="counter-section" class="relative page-section" style="background-image: url('<?php echo esc_url( $image ); ?>');">
                <div class="overlay"></div>
                <div class="wrapper">
                    <div class="clear col-4">
                       <?php for ( $i = 1; $i <= 4 ; $i++) { 
                        if ( ! empty( $options['counter_value_' . $i] ) && ! empty( $options['counter_label_' . $i] ) ) : ?>
                        <article>
                          <h2 class="counter-value"><?php echo esc_html( $options['counter_value_' . $i] ); ?></h3>
                          <div class="separator-line"></div>
                          <h3 class="counter-title"><?php echo esc_html( $options['counter_label_' . $i] ); ?></h2>
                        </article>
                        <?php endif; 
                    } ?>
                    </div><!-- .section-content -->
                </div><!-- .wrapper -->
            </div>
            
    <?php }
endif;