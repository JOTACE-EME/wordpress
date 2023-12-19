<?php
/**
 * Counter Section options
 *
 * @package Theme Palace
 * @subpackage Blog Diary Pro
 * @since Blog Diary Pro 1.0.0
 */

// Add Counter section
$wp_customize->add_section( 'top_travel_counter_section', array(
	'title'             => esc_html__( 'Counter','top-travel' ),
	'description'       => esc_html__( 'Counter Section options.', 'top-travel' ),
	'panel'             => 'top_travel_front_page_panel',
	'priority'			=> 70,
) );

// Counter content enable control and setting
$wp_customize->add_setting( 'top_travel_theme_options[counter_section_enable]', array(
	'default'			=> 	$options['counter_section_enable'],
	'sanitize_callback' => 'top_travel_sanitize_switch_control',
) );

$wp_customize->add_control( new Top_Travel_Switch_Control( $wp_customize, 'top_travel_theme_options[counter_section_enable]', array(
	'label'             => esc_html__( 'Counter Section Enable', 'top-travel' ),
	'section'           => 'top_travel_counter_section',
	'on_off_label' 		=> top_travel_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'top_travel_theme_options[counter_section_enable]', array(
		'selector'            => '#counter-section .wrapper',
		'settings'            => 'top_travel_theme_options[counter_section_enable]',
    ) );
}

// counter image setting and control.
$wp_customize->add_setting( 'top_travel_theme_options[counter_image]', array(
	'sanitize_callback' => 'top_travel_sanitize_image'
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'top_travel_theme_options[counter_image]',
		array(
		'label'       		=> esc_html__( 'Background Image', 'top-travel' ),
		'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'top-travel' ), 1920, 500 ),
		'section'     		=> 'top_travel_counter_section',
		'active_callback'	=> 'top_travel_is_counter_section_enable',
) ) );

for ( $i = 1; $i <= 4; $i++ ) :

	// counter title setting and control
	$wp_customize->add_setting( 'top_travel_theme_options[counter_value_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'top_travel_theme_options[counter_value_' . $i . ']', array(
		'label'           	=> sprintf( esc_html__( 'Value %d', 'top-travel' ), $i ),
		'section'        	=> 'top_travel_counter_section',
		'active_callback' 	=> 'top_travel_is_counter_section_enable',
		'type'				=> 'text',
	) );

	// counter position setting and control
	$wp_customize->add_setting( 'top_travel_theme_options[counter_label_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'top_travel_theme_options[counter_label_' . $i . ']', array(
		'label'           	=> sprintf( esc_html__( 'Label %d', 'top-travel' ), $i ),
		'section'        	=> 'top_travel_counter_section',
		'active_callback' 	=> 'top_travel_is_counter_section_enable',
		'type'				=> 'text',
	) );

	// counter hr setting and control
	$wp_customize->add_setting( 'top_travel_theme_options[counter_hr_'. $i .']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Top_Travel_Customize_Horizontal_Line( $wp_customize, 'top_travel_theme_options[counter_hr_'. $i .']',
		array(
			'section'         => 'top_travel_counter_section',
			'active_callback' => 'top_travel_is_counter_section_enable',
			'type'			  => 'hr'
	) ) );
endfor;
