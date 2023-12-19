<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage Top Travel Pro
 * @since Top Travel Pro 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'top_travel_pagination', array(
	'title'               => esc_html__('Pagination','top-travel'),
	'description'         => esc_html__( 'Pagination section options.', 'top-travel' ),
	'panel'               => 'top_travel_theme_options_panel',
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'top_travel_theme_options[pagination_enable]', array(
	'sanitize_callback' => 'top_travel_sanitize_switch_control',
	'default'             => $options['pagination_enable'],
) );

$wp_customize->add_control( new Top_Travel_Switch_Control( $wp_customize, 'top_travel_theme_options[pagination_enable]', array(
	'label'               => esc_html__( 'Pagination Enable', 'top-travel' ),
	'section'             => 'top_travel_pagination',
	'on_off_label' 		=> top_travel_switch_options(),
) ) );

// Site layout setting and control.
$wp_customize->add_setting( 'top_travel_theme_options[pagination_type]', array(
	'sanitize_callback'   => 'top_travel_sanitize_select',
	'default'             => $options['pagination_type'],
) );

$wp_customize->add_control( 'top_travel_theme_options[pagination_type]', array(
	'label'               => esc_html__( 'Pagination Type', 'top-travel' ),
	'section'             => 'top_travel_pagination',
	'type'                => 'select',
	'choices'			  => top_travel_pagination_options(),
	'active_callback'	  => 'top_travel_is_pagination_enable',
) );
