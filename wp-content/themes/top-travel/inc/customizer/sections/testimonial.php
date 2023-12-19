<?php
/**
 * Testimonial Section options
 *
 * @package Theme Palace
 * @subpackage Top Travel Pro
 * @since Top Travel Pro 1.0.0
 */

// Add Testimonial section
$wp_customize->add_section( 'top_travel_testimonial_section', array(
	'title'             => esc_html__( 'Testimonial','top-travel' ),
	'description'       => esc_html__( 'Testimonial Section options.', 'top-travel' ),
	'panel'             => 'top_travel_front_page_panel',
	'priority'			=> 50,
) );

// Testimonial content enable control and setting
$wp_customize->add_setting( 'top_travel_theme_options[testimonial_section_enable]', array(
	'default'			=> 	$options['testimonial_section_enable'],
	'sanitize_callback' => 'top_travel_sanitize_switch_control',
) );

$wp_customize->add_control( new Top_Travel_Switch_Control( $wp_customize, 'top_travel_theme_options[testimonial_section_enable]', array(
	'label'             => esc_html__( 'Testimonial Section Enable', 'top-travel' ),
	'section'           => 'top_travel_testimonial_section',
	'on_off_label' 		=> top_travel_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'top_travel_theme_options[testimonial_section_enable]', array(
		'selector'            => '.testimonial-class .testimonial-class-wrapper',
		'settings'            => 'top_travel_theme_options[testimonial_section_enable]',
    ) );
}

// Testimonial auto play enable control and setting
$wp_customize->add_setting( 'top_travel_theme_options[testimonial_auto_play]', array(
	'default'			=> 	$options['testimonial_auto_play'],
	'sanitize_callback' => 'top_travel_sanitize_switch_control',
) );

$wp_customize->add_control( new Top_Travel_Switch_Control( $wp_customize, 'top_travel_theme_options[testimonial_auto_play]', array(
	'label'             => esc_html__( 'Auto Play Enable', 'top-travel' ),
	'section'           => 'top_travel_testimonial_section',
	'active_callback' 	=> 'top_travel_is_testimonial_section_enable',
	'on_off_label' 		=> top_travel_switch_options(),
) ) );

$wp_customize->add_setting( 'top_travel_theme_options[testimonial_section_title]', array(
	'default'          	=> $options['testimonial_section_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'top_travel_theme_options[testimonial_section_title]', array(
	'label'             => esc_html__( 'Section Title', 'top-travel' ),
	'section'           => 'top_travel_testimonial_section',
	'type'				=> 'text',
	'active_callback' 	=> 'top_travel_is_testimonial_section_enable',
) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'top_travel_theme_options[testimonial_section_title]', array(
		'selector'            => '.testimonial-class h2.testimonial-class-title',
		'settings'            => 'top_travel_theme_options[testimonial_section_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'top_travel_testimonial_section_title_partial',
    ) );
}

$wp_customize->add_setting( 'top_travel_theme_options[testimonial_section_sub_title]', array(
	'default'          	=> $options['testimonial_section_sub_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'top_travel_theme_options[testimonial_section_sub_title]', array(
	'label'             => esc_html__( 'Section Sub Title', 'top-travel' ),
	'section'           => 'top_travel_testimonial_section',
	'type'				=> 'text',
	'active_callback' 	=> 'top_travel_is_testimonial_section_enable',
) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'top_travel_theme_options[testimonial_section_sub_title]', array(
		'selector'            => '.testimonial-class p.testimonial-class-subtitle',
		'settings'            => 'top_travel_theme_options[testimonial_section_sub_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'top_travel_testimonial_section_sub_title_partial',
    ) );
}


for ( $i = 1; $i <= 5; $i++ ) :
	// testimonial pages drop down chooser control and setting
	$wp_customize->add_setting( 'top_travel_theme_options[testimonial_content_page_' . $i . ']', array(
		'sanitize_callback' => 'top_travel_sanitize_page',
	) );

	$wp_customize->add_control( new Top_Travel_Dropdown_Chooser( $wp_customize, 'top_travel_theme_options[testimonial_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'top-travel' ), $i ),
		'section'           => 'top_travel_testimonial_section',
		'active_callback' 	=> 'top_travel_is_testimonial_section_enable',
		'choices'			=> top_travel_page_choices(),
	) ) );

	$wp_customize->add_setting( 'top_travel_theme_options[testimonial_client_position_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'top_travel_theme_options[testimonial_client_position_' . $i . ']', array(
		'label'           	=> sprintf( esc_html__( 'Client Position %d', 'top-travel' ), $i ),
		'section'        	=> 'top_travel_testimonial_section',
		'active_callback' 	=> 'top_travel_is_testimonial_section_enable',
		'type'				=> 'text',
	) );


	// testimonial hr setting and control
	$wp_customize->add_setting( 'top_travel_theme_options[testimonial_hr_'. $i .']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Top_Travel_Customize_Horizontal_Line( $wp_customize, 'top_travel_theme_options[testimonial_hr_'. $i .']',
		array(
			'section'         => 'top_travel_testimonial_section',
			'active_callback' => 'top_travel_is_testimonial_section_enable',
			'type'			  => 'hr'
	) ) );
endfor;

