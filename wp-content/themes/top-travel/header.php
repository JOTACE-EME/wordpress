<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage Top Travel Pro
	 * @since Top Travel Pro 1.0.0
	 */

	/**
	 * top_travel_doctype hook
	 *
	 * @hooked top_travel_doctype -  10
	 *
	 */
	do_action( 'top_travel_doctype' );

?>
<head>
<?php
	/**
	 * top_travel_before_wp_head hook
	 *
	 * @hooked top_travel_head -  10
	 *
	 */
	do_action( 'top_travel_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>

<?php
	/**
	 * top_travel_page_start_action hook
	 *
	 * @hooked top_travel_page_start -  10
	 *
	 */
	do_action( 'top_travel_page_start_action' ); 

	/**
	 * top_travel_loader_action hook
	 *
	 * @hooked top_travel_loader -  10
	 *
	 */
	do_action( 'top_travel_before_header' );

	/**
	 * top_travel_header_action hook
	 *
	 * @hooked top_travel_header_start -  10
	 * @hooked top_travel_site_branding -  20
	 * @hooked top_travel_site_navigation -  30
	 * @hooked top_travel_header_end -  50
	 *
	 */
	do_action( 'top_travel_header_action' );

	/**
	 * top_travel_content_start_action hook
	 *
	 * @hooked top_travel_content_start -  10
	 *
	 */
	do_action( 'top_travel_content_start_action' );

	/**
	 * top_travel_header_image_action hook
	 *
	 * @hooked top_travel_header_image -  10
	 *
	 */
	do_action( 'top_travel_header_image_action' );

	if ( top_travel_is_frontpage() ) {
    	$options = top_travel_get_theme_options();
    	$sorted = array();
    	if ( ! empty( $options['sortable'] ) ) {
			$sorted = explode( ',' , $options['sortable'] );
		}

		foreach ( $sorted as $section ) {
			add_action( 'top_travel_primary_content', 'top_travel_add_'. $section .'_section' );
		}

		do_action( 'top_travel_primary_content' );
	}