<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage Top Travel Pro
 * @since Top Travel Pro 1.0.0
 */

/**
 * top_travel_footer_primary_content hook
 *
 * @hooked top_travel_add_contact_section -  10
 *
 */
do_action( 'top_travel_footer_primary_content' );

/**
 * top_travel_content_end_action hook
 *
 * @hooked top_travel_content_end -  10
 *
 */
do_action( 'top_travel_content_end_action' );

/**
 * top_travel_content_end_action hook
 *
 * @hooked top_travel_footer_start -  10
 * @hooked top_travel_Footer_Widgets->add_footer_widgets -  20
 * @hooked top_travel_footer_site_info -  40
 * @hooked top_travel_footer_end -  100
 *
 */
do_action( 'top_travel_footer' );

/**
 * top_travel_page_end_action hook
 *
 * @hooked top_travel_page_end -  10
 *
 */
do_action( 'top_travel_page_end_action' ); 

?>

<?php wp_footer(); ?>

</body>
</html>
