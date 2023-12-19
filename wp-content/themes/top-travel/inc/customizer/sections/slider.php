<?php
/**
 * Slider Section options
 *
 * @package Theme Palace
 * @subpackage Top Travel Pro
 * @since Top Travel Pro 1.0.0
 */

// Add Slider section
$wp_customize->add_section( 'top_travel_slider_section', array(
	'title'             => esc_html__( 'Main Slider','top-travel' ),
	'description'       => esc_html__( 'Slider Section options.', 'top-travel' ),
	'panel'             => 'top_travel_front_page_panel',
	'priority'			=> 10,
) );

// Slider content enable control and setting
$wp_customize->add_setting( 'top_travel_theme_options[slider_section_enable]', array(
	'default'			=> 	$options['slider_section_enable'],
	'sanitize_callback' => 'top_travel_sanitize_switch_control',
) );

$wp_customize->add_control( new Top_Travel_Switch_Control( $wp_customize, 'top_travel_theme_options[slider_section_enable]', array(
	'label'             => esc_html__( 'Slider Section Enable', 'top-travel' ),
	'section'           => 'top_travel_slider_section',
	'on_off_label' 		=> top_travel_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'top_travel_theme_options[slider_section_enable]', array(
		'selector'            => '#featured-slider-section div.wrapper',
		'settings'            => 'top_travel_theme_options[slider_section_enable]',
    ) );
}

// Slider content enable control and setting
$wp_customize->add_setting( 'top_travel_theme_options[slider_autoplay]', array(
	'default'			=> 	$options['slider_autoplay'],
	'sanitize_callback' => 'top_travel_sanitize_switch_control',
) );

$wp_customize->add_control( new Top_Travel_Switch_Control( $wp_customize, 'top_travel_theme_options[slider_autoplay]', array(
	'label'             => esc_html__( 'Auto Play Enable', 'top-travel' ),
	'section'           => 'top_travel_slider_section',
	'on_off_label' 		=> top_travel_switch_options(),
	'active_callback' 	=> 'top_travel_is_slider_section_enable',
) ) );

// Slider content enable control and setting
$wp_customize->add_setting( 'top_travel_theme_options[slider_arrow]', array(
	'default'			=> 	$options['slider_arrow'],
	'sanitize_callback' => 'top_travel_sanitize_switch_control',
) );

$wp_customize->add_control( new Top_Travel_Switch_Control( $wp_customize, 'top_travel_theme_options[slider_arrow]', array(
	'label'             => esc_html__( 'Slider Arrow', 'top-travel' ),
	'section'           => 'top_travel_slider_section',
	'on_off_label' 		=> top_travel_switch_options(),
	'active_callback' 	=> 'top_travel_is_slider_section_enable',
) ) );

// Slider btn label setting and control
$wp_customize->add_setting( 'top_travel_theme_options[slider_btn_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['slider_btn_label'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'top_travel_theme_options[slider_btn_label]', array(
	'label'           	=> esc_html__( 'Slider Button Label', 'top-travel' ),
	'section'        	=> 'top_travel_slider_section',
	'active_callback' 	=> 'top_travel_is_slider_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'top_travel_theme_options[slider_btn_label]', array(
		'selector'            => '#featured-slider-section .read-more a.btn.btn-fill',
		'settings'            => 'top_travel_theme_options[slider_btn_label]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'top_travel_slider_btn_label_partial',
    ) );
}


// Slider content type control and setting
$wp_customize->add_setting( 'top_travel_theme_options[slider_content_type]', array(
	'default'          	=> $options['slider_content_type'],
	'sanitize_callback' => 'top_travel_sanitize_select',
) );

$wp_customize->add_control( 'top_travel_theme_options[slider_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'top-travel' ),
	'section'           => 'top_travel_slider_section',
	'type'				=> 'select',
	'active_callback' 	=> 'top_travel_is_slider_section_enable',
	'choices'			=> top_travel_main_slider_content_type(),
) );

for ( $i = 1; $i <= 3; $i++ ) :


	// slider pages drop down chooser control and setting
	$wp_customize->add_setting( 'top_travel_theme_options[slider_content_page_' . $i . ']', array(
		'sanitize_callback' => 'top_travel_sanitize_page',
	) );

	$wp_customize->add_control( new Top_Travel_Dropdown_Chooser( $wp_customize, 'top_travel_theme_options[slider_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'top-travel' ), $i ),
		'section'           => 'top_travel_slider_section',
		'choices'			=> top_travel_page_choices(),
		'active_callback'	=> 'top_travel_is_slider_section_content_page_enable',
	) ) );

	$wp_customize->add_setting( 'top_travel_theme_options[slider_content_trip_' . $i . ']', array(
		'sanitize_callback' => 'top_travel_sanitize_page',
	) );

	$wp_customize->add_control( new Top_Travel_Dropdown_Chooser( $wp_customize, 'top_travel_theme_options[slider_content_trip_' . $i . ']', array(
		'label'             => sprintf ( esc_html__( 'Select Trip %d', 'top-travel' ), $i ),
		'section'           => 'top_travel_slider_section',
		'choices'			=> top_travel_trip_choices(),
		'active_callback'	=> 'top_travel_is_slider_section_content_trip_enable',
	) ) );
endfor;
