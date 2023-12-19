<?php
/**
 * Subscription section
 *
 * This is the template for the content of subscription section
 *
 * @package Theme Palace
 * @subpackage Top Travel Pro
 * @since Top Travel Pro 1.0.0
 */
if ( ! function_exists( 'top_travel_add_subscription_section' ) ) :
    /**
    * Add subscription section
    *
    *@since Top Travel Pro 1.0.0
    */
    function top_travel_add_subscription_section() {
        $options = top_travel_get_theme_options();
        // Check if subscription is enabled on frontpage
        $subscription_enable = apply_filters( 'top_travel_section_status', true, 'subscription_section_enable' );

        if ( true !== $subscription_enable ) {
            return false;
        }

        // Render subscription section now.
        top_travel_render_subscription_section();
    }
endif;

if ( ! function_exists( 'top_travel_render_subscription_section' ) ) :
  /**
   * Start subscription section
   *
   * @return string subscription content
   * @since Top Travel Pro 1.0.0
   *
   */
   function top_travel_render_subscription_section() {
        if ( ! class_exists( 'Jetpack' ) ) {
            return;
        } elseif ( class_exists( 'Jetpack' ) ) {
            if ( ! Jetpack::is_module_active( 'subscriptions' ) )
                return;
        }

        $options = top_travel_get_theme_options();
        $btn_label = ! empty( $options['subscription_btn_title'] ) ? $options['subscription_btn_title'] : esc_html__( 'Subscribe Now', 'top-travel' );

        ?>

        <div id="subscribe-now" class="relative page-section">
            <div class="wrapper">
                <?php if ( ! empty( $options['subscription_title'] ) || ! empty( $options['subscription_sub_title'] ) ) : ?>
                    <div class="section-header">
                        <?php if ( ! empty( $options['subscription_sub_title'] ) ) : ?>
                            <p class="section-subtitle"><?php echo esc_html( $options['subscription_sub_title'] ); ?></p>
                        <?php endif; 

                        if ( ! empty( $options['subscription_title'] ) ) : ?>
                            <h2 class="section-title"><?php echo esc_html( $options['subscription_title'] ); ?></h2>
                        <?php endif; ?>
                    </div><!-- .section-header -->
                <?php endif; ?>

                <div class="subscribe-form-wrapper">
                    <?php 
                        $subscription_shortcode = '[jetpack_subscription_form title="" subscribe_text="" subscribe_button="' . esc_html( $btn_label ) . '" show_subscribers_total="0"]';
                        echo do_shortcode( wp_kses_post( $subscription_shortcode ) ); 
                    ?>
                </div><!-- .subscribe-form-wrapper -->
            </div><!-- .wrapper -->
        </div><!-- #subscribe-now -->

    <?php }
endif;
