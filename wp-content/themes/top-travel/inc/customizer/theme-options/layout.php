<?php
/**
 * Layout options
 *
 * @package Theme Palace
 * @subpackage Top Travel Pro
 * @since Top Travel Pro 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'top_travel_layout', array(
	'title'               => esc_html__('Layout','top-travel'),
	'description'         => esc_html__( 'Layout section options.', 'top-travel' ),
	'panel'               => 'top_travel_theme_options_panel',
) );

// Site layout setting and control.
$wp_customize->add_setting( 'top_travel_theme_options[site_layout]', array(
	'sanitize_callback'   => 'top_travel_sanitize_select',
	'default'             => $options['site_layout'],
) );

$wp_customize->add_control(  new Top_Travel_Custom_Radio_Image_Control ( $wp_customize, 'top_travel_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'top-travel' ),
	'section'             => 'top_travel_layout',
	'choices'			  => top_travel_site_layout(),
) ) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'top_travel_theme_options[sidebar_position]', array(
	'sanitize_callback'   => 'top_travel_sanitize_select',
	'default'             => $options['sidebar_position'],
) );

$wp_customize->add_control(  new Top_Travel_Custom_Radio_Image_Control ( $wp_customize, 'top_travel_theme_options[sidebar_position]', array(
	'label'               => esc_html__( 'Global Sidebar Position', 'top-travel' ),
	'section'             => 'top_travel_layout',
	'choices'			  => top_travel_global_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'top_travel_theme_options[post_sidebar_position]', array(
	'sanitize_callback'   => 'top_travel_sanitize_select',
	'default'             => $options['post_sidebar_position'],
) );

$wp_customize->add_control(  new Top_Travel_Custom_Radio_Image_Control ( $wp_customize, 'top_travel_theme_options[post_sidebar_position]', array(
	'label'               => esc_html__( 'Posts Sidebar Position', 'top-travel' ),
	'section'             => 'top_travel_layout',
	'choices'			  => top_travel_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'top_travel_theme_options[page_sidebar_position]', array(
	'sanitize_callback'   => 'top_travel_sanitize_select',
	'default'             => $options['page_sidebar_position'],
) );

$wp_customize->add_control( new Top_Travel_Custom_Radio_Image_Control( $wp_customize, 'top_travel_theme_options[page_sidebar_position]', array(
	'label'               => esc_html__( 'Pages Sidebar Position', 'top-travel' ),
	'section'             => 'top_travel_layout',
	'choices'			  => top_travel_sidebar_position(),
) ) );