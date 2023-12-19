<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage Top Travel Pro
 * @since Top Travel Pro 1.0.0
 */

$wp_customize->add_section( 'top_travel_breadcrumb', array(
	'title'             => esc_html__( 'Breadcrumb','top-travel' ),
	'description'       => esc_html__( 'Breadcrumb section options.', 'top-travel' ),
	'panel'             => 'top_travel_theme_options_panel',
) );

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'top_travel_theme_options[breadcrumb_enable]', array(
	'sanitize_callback' => 'top_travel_sanitize_switch_control',
	'default'          	=> $options['breadcrumb_enable'],
) );

$wp_customize->add_control( new Top_Travel_Switch_Control( $wp_customize, 'top_travel_theme_options[breadcrumb_enable]', array(
	'label'            	=> esc_html__( 'Enable Breadcrumb', 'top-travel' ),
	'section'          	=> 'top_travel_breadcrumb',
	'on_off_label' 		=> top_travel_switch_options(),
) ) );

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'top_travel_theme_options[breadcrumb_separator]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['breadcrumb_separator'],
) );

$wp_customize->add_control( 'top_travel_theme_options[breadcrumb_separator]', array(
	'label'            	=> esc_html__( 'Separator', 'top-travel' ),
	'active_callback' 	=> 'top_travel_is_breadcrumb_enable',
	'section'          	=> 'top_travel_breadcrumb',
) );
