<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage Top Travel Pro
 * @since Top Travel Pro 1.0.0
 * @return array An array of default values
 */

function top_travel_get_default_theme_options() {
	$theme_data = wp_get_theme();
	$top_travel_default_options = array(
		// Color Options
		'header_title_color'			=> '#000',
		'header_tagline_color'			=> '#fff',
		'header_txt_logo_extra'			=> 'show-all',

		// breadcrumb
		'breadcrumb_enable'				=> true,
		'breadcrumb_separator'			=> '/',
		
		// layout 
		'site_layout'         			=> 'wide-layout',
		'sidebar_position'         		=> 'right-sidebar',
		'post_sidebar_position' 		=> 'right-sidebar',
		'page_sidebar_position' 		=> 'right-sidebar',
		'menu_sticky'					=> true,
		'social_nav_enable'				=> true,
		'search_icon'					=> true,


		// excerpt options
		'long_excerpt_length'           => 25,
		
		// pagination options
		'pagination_enable'         	=> true,
		'pagination_type'         		=> 'default',

		// footer options
		'copyright_text'           		=> sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'top-travel' ), '[the-year]', '[site-link]' ),
		'powered_by_text'           	=> esc_html__( 'All Rights Reserved | ', 'top-travel' ) . esc_html( $theme_data->get( 'Name') ) . '&nbsp;' . esc_html__( 'by', 'top-travel' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_html( ucwords( $theme_data->get( 'Author' ) ) ) .'</a>',
		'scroll_top_visible'        	=> true,

		// reset options
		'reset_options'      			=> false,
		
		// homepage options
		'enable_frontpage_content' 		=> false,

		// homepage sections sortable
		'sortable' 						=> 'slider,about,service,popular_destination,testimonial,counter,subscription',

		// blog/archive options
		'your_latest_posts_title' 		=> esc_html__( 'Blogs', 'top-travel' ),
		'blog_page_button' 				=> esc_html__( 'READ MORE', 'top-travel' ),
		'single_post_hide_banner'		=> false,
		'hide_date' 					=> false,
		'hide_category'					=> false,
		'hide_author'					=> false,
		'hide_banner'					=> false,		
		'blog_column'					=> 'col-2',
		'blog_layout_design'			=> '',


		// single post theme options
		'single_post_hide_date' 		=> false,
		'single_post_hide_author'		=> false,
		'single_post_hide_category'		=> false,
		'single_post_hide_tags'			=> false,

		/* Front Page */

		// Top bar
		'top_section_enable'			=> true,
		'top_contact_info'					=> __( 'Any Questions? Call Us: <a href="#">1-223-355-2214</a>', 'top-travel' ),

		// Slider
		'slider_section_enable'		=> false,
		'slider_autoplay'			=> false,
		'slider_arrow'				=> true,
		'slider_content_type'		=> 'page',
		'slider_count'				=> 3,
		'slider_btn_label'			=> esc_html__( 'Discover More', 'top-travel' ),
		'slider_video_label'		=> esc_html__( 'Watch the video', 'top-travel' ),

		// popular destination
		'popular_destination_section_enable'	=> false,
		'popular_destination_content_type'		=> 'page',
		'popular_destination_count'				=> 3,
		'popular_destination_btn_title'			=> esc_html__( 'Book Now', 'top-travel' ),


		// about
		'about_section_enable'			=> false,
		'about_content_type'			=> 'page',
		'about_title'					=> esc_html__( 'Go places you&#39;ve dreamed of', 'top-travel' ),
		'about_sub_title'				=> esc_html__( 'About Us', 'top-travel' ),
		'about_description'				=> esc_html__( 'Between the many mouths to feed, entry to myriad attractions and school holiday price hikes, traveling with kids can quickly add up. Follow these top tips to make your hard-earned cash go further as you and your brood explore the world...', 'top-travel' ),
		'about_btn_title'				=> esc_html__( 'Explore More', 'top-travel' ),
		'about_bg_image'                => '',


		// service
		'service_section_enable'		=> false,
		'service_section_icon_enable'	=> true,
		'service_content_type'			=> 'category',
		'service_count'					=> 3,
		'service_sub_title'				=> esc_html('Our Service', 'top-travel'),
		'service_title'					=> esc_html('Feel Our Hospitality', 'top-travel'),
		'service_btn_title'				=> esc_html('More Services', 'top-travel'),
		
		// team
		'team_section_enable'		=> false,
		'team_section_icon_enable'	=> true,
		'team_content_type'			=> 'category',
		'team_count'				=> 3,
		'team_sub_title'			=> esc_html('Our team', 'top-travel'),
		'team_title'				=> esc_html('Meet our professional team', 'top-travel'),
		'team_column'				=> '3',

		// testimonial
		'testimonial_section_enable'	=> false,
		'testimonial_auto_play'			=> false,
		'testimonial_content_type'		=> 'category',
		'testimonial_count'				=> 4,
		'testimonial_section_title'		=> esc_html__( 'What Our Clients Says', 'top-travel' ),
		'testimonial_section_sub_title'	=> esc_html__( 'DISOVER US MORE', 'top-travel' ),

		'counter_section_enable'		=> false,

		// subscription
		'subscription_section_enable'	=> false,
		'subscription_sub_title'		=> esc_html__( 'Keep in touch', 'top-travel' ),
		'subscription_title'			=> esc_html__( 'Travel with us!', 'top-travel' ),
		'subscription_btn_title'		=> esc_html__( 'Subscribe Now', 'top-travel' ),

		
	);

	$output = apply_filters( 'top_travel_default_theme_options', $top_travel_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}