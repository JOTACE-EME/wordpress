<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage Top Travel Pro
 * @since Top Travel Pro 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function top_travel_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'top-travel' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function top_travel_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'top-travel' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    wp_reset_postdata();
    return  $choices;
}

/**
 * List of trips for post choices.
 * @return Array Array of post ids and name.
 */
function top_travel_trip_choices() {
    $posts = get_posts( array( 'post_type' => 'itineraries', 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'top-travel' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    wp_reset_postdata();
    return  $choices;
}



if ( ! function_exists( 'top_travel_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function top_travel_selected_sidebar() {
        $top_travel_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'top-travel' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'top-travel' ),
            'optional-sidebar-2'    => esc_html__( 'Optional Sidebar 2', 'top-travel' ),
            'optional-sidebar-3'    => esc_html__( 'Optional Sidebar 3', 'top-travel' ),
            'optional-sidebar-4'    => esc_html__( 'Optional Sidebar 4', 'top-travel' ),
        );

        $output = apply_filters( 'top_travel_selected_sidebar', $top_travel_selected_sidebar );

        return $output;
    }
endif;

if ( ! function_exists( 'top_travel_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function top_travel_site_layout() {
        $top_travel_site_layout = array(
            'wide-layout'  => get_template_directory_uri() . '/assets/images/full.png',
            'boxed-layout' => get_template_directory_uri() . '/assets/images/boxed.png',
            'frame-layout' => get_template_directory_uri() . '/assets/images/framed.png',
        );

        $output = apply_filters( 'top_travel_site_layout', $top_travel_site_layout );
        return $output;
    }
endif;


if ( ! function_exists( 'top_travel_global_sidebar_position' ) ) :
    /**
     * Global Sidebar position
     * @return array Global Sidebar positions
     */
    function top_travel_global_sidebar_position() {
        $top_travel_global_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'top_travel_global_sidebar_position', $top_travel_global_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'top_travel_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function top_travel_sidebar_position() {
        $top_travel_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
            'no-sidebar-content'   => get_template_directory_uri() . '/assets/images/boxed.png',
        );

        $output = apply_filters( 'top_travel_sidebar_position', $top_travel_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'top_travel_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function top_travel_pagination_options() {
        $top_travel_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'top-travel' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'top-travel' ),
        );

        $output = apply_filters( 'top_travel_pagination_options', $top_travel_pagination_options );

        return $output;
    }
endif;


if ( ! function_exists( 'top_travel_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function top_travel_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'top-travel' ),
            'off'       => esc_html__( 'Disable', 'top-travel' )
        );
        return apply_filters( 'top_travel_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'top_travel_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function top_travel_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'top-travel' ),
            'off'       => esc_html__( 'No', 'top-travel' )
        );
        return apply_filters( 'top_travel_hide_options', $arr );
    }
endif;

if ( ! function_exists( 'top_travel_main_slider_content_type' ) ) :
    /**
     * main slider Options
     * @return array site main slider options
     */
    function top_travel_main_slider_content_type() {
        $top_travel_main_slider_content_type = array(
            'page'      => esc_html__( 'Page', 'top-travel' ),
        );

        if ( class_exists( 'WP_Travel' ) ) {
            $top_travel_main_slider_content_type = array_merge( $top_travel_main_slider_content_type, array(
                'trip'          => esc_html__( 'Trip', 'top-travel' ),
                ) );
        }

        $output = apply_filters( 'top_travel_main_slider_content_type', $top_travel_main_slider_content_type );


        return $output;
    }
endif;

if ( ! function_exists( 'top_travel_service_content_type' ) ) :
    /**
     * service options
     * @return array site service options
     */
    function top_travel_service_content_type() {
        $top_travel_service_content_type = array(
            'page'      => esc_html__( 'Page', 'top-travel' ),
        );

        $output = apply_filters( 'top_travel_service_content_type', $top_travel_service_content_type );


        return $output;
    }
endif;

if ( ! function_exists( 'top_travel_blog_content_type' ) ) :
    /**
     * blog options
     * @return array site blog options
     */
    function top_travel_blog_content_type() {
        $top_travel_blog_content_type = array(
            'page'      => esc_html__( 'Page', 'top-travel' ),
        );

        if ( class_exists( 'WP_Travel' ) ) {
            $top_travel_blog_content_type = array_merge( $top_travel_blog_content_type, array(
                'trip'          => esc_html__( 'Trip', 'top-travel' ),
                ) );
        }

        $output = apply_filters( 'top_travel_blog_content_type', $top_travel_blog_content_type );


        return $output;
    }
endif;



if ( ! function_exists( 'top_travel_featured_content_type' ) ) :
    /**
     * featured Options
     * @return array site featured options
     */
    function top_travel_featured_content_type() {
        $top_travel_featured_content_type = array(
            'page'      => esc_html__( 'Page', 'top-travel' ),
        );

        if ( class_exists( 'WP_Travel' ) ) {
            $top_travel_featured_content_type = array_merge( $top_travel_featured_content_type, array(
                'trip'          => esc_html__( 'Trip', 'top-travel' ),
                ) );
        }

        $output = apply_filters( 'top_travel_featured_content_type', $top_travel_featured_content_type );


        return $output;
    }
endif;

if ( ! function_exists( 'top_travel_popular_destination_content_type' ) ) :
    /**
     * Destination Options
     * @return array site gallery options
     */
    function top_travel_popular_destination_content_type() {
        $top_travel_popular_destination_content_type = array(
            'page'      => esc_html__( 'Page', 'top-travel' ),
        );

        if ( class_exists( 'WP_Travel' ) ) {
            $top_travel_popular_destination_content_type = array_merge( $top_travel_popular_destination_content_type, array(
                'trip'          => esc_html__( 'Trip', 'top-travel' ),
                ) );
        }

        $output = apply_filters( 'top_travel_popular_destination_content_type', $top_travel_popular_destination_content_type );


        return $output;
    }
endif;

if ( ! function_exists( 'top_travel_package_content_type' ) ) :
    /**
     * Package Options
     * @return array site gallery options
     */
    function top_travel_package_content_type() {
        $top_travel_package_content_type = array(
            'category'  => esc_html__( 'Category', 'top-travel' ),
        );

        if ( class_exists( 'WP_Travel' ) ) {
            $top_travel_package_content_type = array_merge( $top_travel_package_content_type, array(
                'trip-types'    => esc_html__( 'Trip Types', 'top-travel' ),
                ) );
        }

        $output = apply_filters( 'top_travel_package_content_type', $top_travel_package_content_type );


        return $output;
    }
endif;

if ( ! function_exists( 'top_travel_traveler_choice_content_type' ) ) :
    /**
     * Destination Options
     * @return array site gallery options
     */
    function top_travel_traveler_choice_content_type() {
        $top_travel_traveler_choice_content_type = array(
            'page'      => esc_html__( 'Page', 'top-travel' ),
        );

        if ( class_exists( 'WP_Travel' ) ) {
            $top_travel_traveler_choice_content_type = array_merge( $top_travel_traveler_choice_content_type, array(
                'trip'          => esc_html__( 'Trip', 'top-travel' ),
                ) );
        }

        $output = apply_filters( 'top_travel_traveler_choice_content_type', $top_travel_traveler_choice_content_type );


        return $output;
    }
endif;

if ( ! function_exists( 'top_travel_discover_places_content_type' ) ) :
    /**
     * Destination Options
     * @return array site gallery options
     */
    function top_travel_discover_places_content_type() {
        $top_travel_discover_places_content_type = array(
            'page'      => esc_html__( 'Page', 'top-travel' ),
        );

        if ( class_exists( 'WP_Travel' ) ) {
            $top_travel_discover_places_content_type = array_merge( $top_travel_discover_places_content_type, array(
                'trip'          => esc_html__( 'Trip', 'top-travel' ),
                ) );
        }

        $output = apply_filters( 'top_travel_discover_places_content_type', $top_travel_discover_places_content_type );


        return $output;
    }
endif;

if ( ! function_exists( 'top_travel_heading_tags' ) ) :
    /**
     * Destination Options
     * @return array site gallery options
     */
    function top_travel_heading_tags() {
        
        $top_travel_heading_tags = array(
			'h1'	=> esc_html__('H1', 'top-travel'),
			'h2'	=> esc_html__('H2', 'top-travel'),
			'h3'	=> esc_html__('H3', 'top-travel'),
			'h4'	=> esc_html__('H4', 'top-travel'),
			'h5'	=> esc_html__('H5', 'top-travel'),
			'h6'	=> esc_html__('H6', 'top-travel'),
			'p'		=> esc_html__('Paragraph', 'top-travel'),
		);

        $output = apply_filters( 'top_travel_heading_tags', $top_travel_heading_tags );


        return $output;
    }
endif;

