<?php
/**
 * Service Section options
 *
 * @package Theme Palace
 * @subpackage Top Travel Pro
 * @since Top Travel Pro 1.0.0
 */

// Add Service section
$wp_customize->add_section( 'top_travel_service_section', array(
	'title'             => esc_html__( 'Services','top-travel' ),
	'description'       => esc_html__( 'Services Section options.', 'top-travel' ),
	'panel'             => 'top_travel_front_page_panel',	
	'priority'			=> 30,
) );

// Service content enable control and setting
$wp_customize->add_setting( 'top_travel_theme_options[service_section_enable]', array(
	'default'			=> 	$options['service_section_enable'],
	'sanitize_callback' => 'top_travel_sanitize_switch_control',
) );

$wp_customize->add_control( new Top_Travel_Switch_Control( $wp_customize, 'top_travel_theme_options[service_section_enable]', array(
	'label'             => esc_html__( 'Service Section Enable', 'top-travel' ),
	'section'           => 'top_travel_service_section',
	'on_off_label' 		=> top_travel_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'top_travel_theme_options[service_section_enable]', array(
		'selector'            => '#our-services .wrapper',
		'settings'            => 'top_travel_theme_options[service_section_enable]',
    ) );
}

// service title setting and control
$wp_customize->add_setting( 'top_travel_theme_options[service_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['service_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'top_travel_theme_options[service_title]', array(
	'label'           	=> esc_html__( 'Title', 'top-travel' ),
	'section'        	=> 'top_travel_service_section',
	'active_callback' 	=> 'top_travel_is_service_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'top_travel_theme_options[service_title]', array(
		'selector'            => '#our-services .section-header h2.section-title',
		'settings'            => 'top_travel_theme_options[service_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'top_travel_service_title_partial',
    ) );
}

// service title setting and control
$wp_customize->add_setting( 'top_travel_theme_options[service_sub_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['service_sub_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'top_travel_theme_options[service_sub_title]', array(
	'label'           	=> esc_html__( 'Sub Title', 'top-travel' ),
	'section'        	=> 'top_travel_service_section',
	'active_callback' 	=> 'top_travel_is_service_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'top_travel_theme_options[service_sub_title]', array(
		'selector'            => '#our-services .section-header p.section-subtitle',
		'settings'            => 'top_travel_theme_options[service_sub_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'top_travel_service_sub_title_partial',
    ) );
}

// service title setting and control
$wp_customize->add_setting( 'top_travel_theme_options[service_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['service_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'top_travel_theme_options[service_btn_title]', array(
	'label'           	=> esc_html__( 'Btn Title', 'top-travel' ),
	'section'        	=> 'top_travel_service_section',
	'active_callback' 	=> 'top_travel_is_service_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'top_travel_theme_options[service_btn_title]', array(
		'selector'            => '#our-services .read-more a',
		'settings'            => 'top_travel_theme_options[service_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'top_travel_service_btn_title_partial',
    ) );
}

$wp_customize->add_setting( 'top_travel_theme_options[service_btn_url]', array(
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'top_travel_theme_options[service_btn_url]', array(
	'label'           	=> esc_html__( 'Btn Url', 'top-travel' ),
	'section'        	=> 'top_travel_service_section',
	'active_callback' 	=> 'top_travel_is_service_section_enable',
	'type'				=> 'url',
) );


for ( $i = 1; $i <= 3; $i++ ) :

	// service note control and setting
	$wp_customize->add_setting( 'top_travel_theme_options[service_content_icon_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new Top_Travel_Icon_Picker( $wp_customize, 'top_travel_theme_options[service_content_icon_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Icon %d', 'top-travel' ), $i ),
		'section'           => 'top_travel_service_section',
		'active_callback' 	=> 'top_travel_is_service_section_enable',
	) ) );

	// service pages drop down chooser control and setting
	$wp_customize->add_setting( 'top_travel_theme_options[service_content_page_' . $i . ']', array(
		'sanitize_callback' => 'top_travel_sanitize_page',
	) );

	$wp_customize->add_control( new Top_Travel_Dropdown_Chooser( $wp_customize, 'top_travel_theme_options[service_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'top-travel' ), $i ),
		'section'           => 'top_travel_service_section',
		'active_callback' 	=> 'top_travel_is_service_section_enable',
		'choices'			=> top_travel_page_choices(),
	) ) );


	// service hr setting and control
	$wp_customize->add_setting( 'top_travel_theme_options[service_hr_'. $i .']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Top_Travel_Customize_Horizontal_Line( $wp_customize, 'top_travel_theme_options[service_hr_'. $i .']',
		array(
			'section'         => 'top_travel_service_section',
			'active_callback' 	=> 'top_travel_is_service_section_enable',
			'type'			  => 'hr'
	) ) );

endfor;
