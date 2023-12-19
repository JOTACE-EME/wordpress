<?php
/**
 * Popular Destination Section options
 *
 * @package Theme Palace
 * @subpackage Top Travel Pro
 * @since Top Travel Pro 1.0.0
 */

// Add Popular Destination section
$wp_customize->add_section( 'top_travel_popular_destination_section', array(
	'title'             => esc_html__( 'Popular Destination','top-travel' ),
	'description'       => esc_html__( 'Popular Destination Section options.', 'top-travel' ),
	'panel'             => 'top_travel_front_page_panel',	
	'priority'			=> 40,
) );

// Popular Destination content enable control and setting
$wp_customize->add_setting( 'top_travel_theme_options[popular_destination_section_enable]', array(
	'default'			=> 	$options['popular_destination_section_enable'],
	'sanitize_callback' => 'top_travel_sanitize_switch_control',
) );

$wp_customize->add_control( new Top_Travel_Switch_Control( $wp_customize, 'top_travel_theme_options[popular_destination_section_enable]', array(
	'label'             => esc_html__( 'Popular Destination Section Enable', 'top-travel' ),
	'section'           => 'top_travel_popular_destination_section',
	'on_off_label' 		=> top_travel_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'top_travel_theme_options[popular_destination_section_enable]', array(
		'selector'            => '#popular-destinations .wrapper',
		'settings'            => 'top_travel_theme_options[popular_destination_section_enable]',
    ) );
}


// Popular Destination content type control and setting
$wp_customize->add_setting( 'top_travel_theme_options[popular_destination_content_type]', array(
	'default'          	=> $options['popular_destination_content_type'],
	'sanitize_callback' => 'top_travel_sanitize_select',
) );

$wp_customize->add_control( 'top_travel_theme_options[popular_destination_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'top-travel' ),
	'section'           => 'top_travel_popular_destination_section',
	'type'				=> 'select',
	'active_callback' 	=> 'top_travel_is_popular_destination_section_enable',
	'choices'			=> top_travel_popular_destination_content_type(),
) );

for ( $i=1; $i <= 6; $i++ ) { 
	// popular_destination pages drop down chooser control and setting
	$wp_customize->add_setting( 'top_travel_theme_options[popular_destination_content_page_' . $i . ']', array(
		'sanitize_callback' => 'top_travel_sanitize_page',
	) );

	$wp_customize->add_control( new Top_Travel_Dropdown_Chooser( $wp_customize, 'top_travel_theme_options[popular_destination_content_page_' . $i . ']', array(
		'label'             => sprintf ( esc_html__( 'Select Page %d', 'top-travel' ), $i ),
		'section'           => 'top_travel_popular_destination_section',
		'choices'			=> top_travel_page_choices(),
		'active_callback'	=> 'top_travel_is_popular_destination_section_content_page_enable',
	) ) );


	// popular_destination trips drop down chooser control and setting
	$wp_customize->add_setting( 'top_travel_theme_options[popular_destination_content_trip_' . $i . ']', array(
		'sanitize_callback' => 'top_travel_sanitize_page',
	) );

	$wp_customize->add_control( new Top_Travel_Dropdown_Chooser( $wp_customize, 'top_travel_theme_options[popular_destination_content_trip_' . $i . ']', array(
		'label'             => sprintf ( esc_html__( 'Select Trip %d', 'top-travel' ), $i ),
		'section'           => 'top_travel_popular_destination_section',
		'choices'			=> top_travel_trip_choices(),
		'active_callback'	=> 'top_travel_is_popular_destination_section_content_trip_enable',
	) ) );
}


// destination btn title setting and control
$wp_customize->add_setting( 'top_travel_theme_options[popular_destination_btn_title]', array(
	'default'			=> $options['popular_destination_btn_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'top_travel_theme_options[popular_destination_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'top-travel' ),
	'section'        	=> 'top_travel_popular_destination_section',
	'active_callback' 	=> 'top_travel_is_popular_destination_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'top_travel_theme_options[popular_destination_btn_title]', array(
		'selector'            => '#popular-destinations .more-link a',
		'settings'            => 'top_travel_theme_options[popular_destination_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'top_travel_popular_destination_btn_title_partial',
    ) );
}
