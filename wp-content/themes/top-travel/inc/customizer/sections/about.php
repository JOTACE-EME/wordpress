<?php
/**
 * About Section options
 *
 * @package Theme Palace
 * @subpackage Top Travel Pro
 * @since Top Travel Pro 1.0.0
 */

// Add About section
$wp_customize->add_section( 'top_travel_about_section', array(
	'title'             => esc_html__( 'About Us','top-travel' ),
	'description'       => esc_html__( 'About Us Section options.', 'top-travel' ),
	'panel'             => 'top_travel_front_page_panel',
	'priority'			=> 20,
) );

// About content enable control and setting
$wp_customize->add_setting( 'top_travel_theme_options[about_section_enable]', array(
	'default'			=> 	$options['about_section_enable'],
	'sanitize_callback' => 'top_travel_sanitize_switch_control',
) );

$wp_customize->add_control( new Top_Travel_Switch_Control( $wp_customize, 'top_travel_theme_options[about_section_enable]', array(
	'label'             => esc_html__( 'About Section Enable', 'top-travel' ),
	'section'           => 'top_travel_about_section',
	'on_off_label' 		=> top_travel_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'top_travel_theme_options[about_section_enable]', array(
		'selector'            => '#about-us .wrapper',
		'settings'            => 'top_travel_theme_options[about_section_enable]',
    ) );
}

$wp_customize->add_setting( 'top_travel_theme_options[about_bg_image]', array(
	'sanitize_callback' => 'top_travel_sanitize_image'
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'top_travel_theme_options[about_bg_image]',
		array(
		'label'       		=> esc_html__( 'Background Image', 'top-travel' ),
		'section'     		=> 'top_travel_about_section',
		'active_callback'	=> 'top_travel_is_about_section_enable',
) ) );


// about sub title setting and control
$wp_customize->add_setting( 'top_travel_theme_options[about_sub_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['about_sub_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'top_travel_theme_options[about_sub_title]', array(
	'label'           	=> esc_html__( 'Sub Title', 'top-travel' ),
	'section'        	=> 'top_travel_about_section',
	'active_callback' 	=> 'top_travel_is_about_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'top_travel_theme_options[about_sub_title]', array(
		'selector'            => '#about-us p.section-subtitle',
		'settings'            => 'top_travel_theme_options[about_sub_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'top_travel_about_sub_title_partial',
    ) );
}

// about pages drop down chooser control and setting
$wp_customize->add_setting( 'top_travel_theme_options[about_content_page]', array(
	'sanitize_callback' => 'top_travel_sanitize_page',
) );

$wp_customize->add_control( new Top_Travel_Dropdown_Chooser( $wp_customize, 'top_travel_theme_options[about_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'top-travel' ),
	'section'           => 'top_travel_about_section',
	'active_callback' 	=> 'top_travel_is_about_section_enable',
	'choices'			=> top_travel_page_choices(),
) ) );


// about btn title setting and control
$wp_customize->add_setting( 'top_travel_theme_options[about_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['about_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'top_travel_theme_options[about_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'top-travel' ),
	'section'        	=> 'top_travel_about_section',
	'active_callback' 	=> 'top_travel_is_about_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'top_travel_theme_options[about_btn_title]', array(
		'selector'            => '#about-us .wrapper .read-more a',
		'settings'            => 'top_travel_theme_options[about_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'top_travel_about_btn_title_partial',
    ) );
}
