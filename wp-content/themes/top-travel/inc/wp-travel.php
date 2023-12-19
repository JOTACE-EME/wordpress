<?php

/**
 * Theme Palace wp travel hooks overwrite
 *
 * @package Theme Palace
 * @subpackage Top Travel Pro
 * @since Top Travel Pro 1.0.0
 */

function top_travel_search_form() { 
	$options = top_travel_get_theme_options();
?>

	<div class="wp-travel-search">
		<form method="get" name="wp-travel_search" action="<?php echo esc_url( home_url( '/' ) );  ?>" > 
			<input type="hidden" name="post_type" value="itineraries" />
			<p>
				<?php $placeholder = $options['trip_search_placeholder_1'] ; ?>
				<input type="text" name="s" id="s" value="<?php echo ( isset( $_GET['s'] ) ) ? esc_textarea( wp_unslash( $_GET['s'] ) ) : ''; ?>" placeholder="<?php echo esc_attr( apply_filters( 'wp_travel_search_placeholder', $placeholder ) ); ?>">
			</p>
			<p>
				<?php
				$taxonomy = 'itinerary_types';
				$args = array(
					'show_option_all'    => isset($options['trip_search_placeholder_2']) ? $options['trip_search_placeholder_2'] : wp_travel_get_strings()['trip_type'],
					'hide_empty'         => 0,
					'selected'           => 1,
					'hierarchical'       => 1,
					'name'               => $taxonomy,
					'class'              => 'wp-travel-taxonomy',
					'taxonomy'           => $taxonomy,
					'selected'           => ( isset( $_GET[$taxonomy] ) ) ? esc_textarea( wp_unslash( $_GET[$taxonomy] ) ) : 0,
					'value_field'		 => 'slug',
				);

				wp_dropdown_categories( $args, $taxonomy );
				?>
			</p>
			<p>
				<?php
				$taxonomy = 'travel_locations';
				$args = array(
					'show_option_all'    => isset($options['trip_search_placeholder_3']) ? $options['trip_search_placeholder_3'] : wp_travel_get_strings()['trip_type'],
					'hide_empty'         => 0,
					'selected'           => 1,
					'hierarchical'       => 1,
					'name'               => $taxonomy,
					'class'              => 'wp-travel-taxonomy',
					'taxonomy'           => $taxonomy,
					'selected'           => ( isset( $_GET[$taxonomy] ) ) ? esc_textarea( wp_unslash( $_GET[$taxonomy] ) ) : 0,
					'value_field'		 => 'slug',
				);

				wp_dropdown_categories( $args, $taxonomy );
				?>
			</p>
			<?php
			if ( class_exists('WP_Travel') ) {
				WP_Travel::create_nonce_field();
			}
			?>
			<p class="wp-travel-search"><input type="submit" name="wp-travel_search" id="wp-travel-search" class="button button-primary" value="<?php esc_attr_e( 'Search', 'top-travel' ) ?>"  /></p>
		</form>
	</div>	
	<?php
}
add_filter( 'wp_travel_search_form', 'top_travel_search_form', 999 );

/**
 * Add html for Keywords.
 *
 * @param int $post_id ID of current post.
 */
function top_travel_trip_duration( $post_id ) {
	if ( ! $post_id ) {
		return;
	}
	$start_date	= get_post_meta( $post_id, 'wp_travel_start_date', true );
	$end_date 	= get_post_meta( $post_id, 'wp_travel_end_date', true );
	
	$fixed_departure = get_post_meta( $post_id, 'wp_travel_fixed_departure', true );
	$fixed_departure = ( $fixed_departure ) ? $fixed_departure : 'yes';
	$fixed_departure = apply_filters( 'wp_travel_fixed_departure_defalut', $fixed_departure );

	$trip_duration = get_post_meta( $post_id, 'wp_travel_trip_duration', true );
	$trip_duration = ( $trip_duration ) ? $trip_duration : 0;
	$trip_duration_night = get_post_meta( $post_id, 'wp_travel_trip_duration_night', true );
	$trip_duration_night = ( $trip_duration_night ) ? $trip_duration_night : 0;
	
	if ( 'yes' === $fixed_departure ) : 
		if ( $start_date && $end_date ) :
			
			$date_format = get_option( 'date_format' );
			if ( ! $date_format ) :
				$date_format = 'jS M, Y';
			endif;
			printf( '%s - %s', date( $date_format, strtotime( $start_date ) ), date( $date_format, strtotime( $end_date ) ) ); 

		endif;
	else :
		if ( $trip_duration || $trip_duration_night ) :
			printf( __( '%1$s Day(s) %2$s Night(s)', 'top-travel' ), $trip_duration, $trip_duration_night );
		endif;

	endif;
}

remove_action( 'wp_travel_after_main_content', 'wp_travel_archive_wrapper_close' );
add_action( 'wp_travel_after_main_content', 'top_travel_archive_wrapper_close' );
/**
 * Add html for Keywords.
 */
function top_travel_archive_wrapper_close() { ?>
	</div>
<?php }

remove_action( 'wp_travel_single_trip_after_title', 'wptravel_trip_price', 1 );
remove_action( 'wp_travel_single_trip_after_title', 'wptravel_single_excerpt', 1 );
remove_action( 'wp_travel_single_trip_after_header', 'wptravel_trip_map', 20 );
add_action( 'top_travel_trip_after_title', 'wptravel_trip_price', 10 );
add_action( 'top_travel_trip_after_title', 'wptravel_single_excerpt', 20 );
add_action( 'top_travel_trip_after_title', 'wptravel_trip_map', 30 );
