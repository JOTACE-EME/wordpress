<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Top Travel Pro
 * @since Top Travel Pro 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'top_travel_single_post_section', array(
	'title'             => esc_html__( 'Single Post','top-travel' ),
	'description'       => esc_html__( 'Options to change the single posts globally.', 'top-travel' ),
	'panel'             => 'top_travel_theme_options_panel',
) );

$wp_customize->add_setting( 'top_travel_theme_options[single_post_hide_banner]', array(
	'default'           => $options['single_post_hide_banner'],
	'sanitize_callback' => 'top_travel_sanitize_switch_control',
) );

$wp_customize->add_control( new Top_Travel_Switch_Control( $wp_customize, 'top_travel_theme_options[single_post_hide_banner]', array(
	'label'             => esc_html__( 'Hide Banner', 'top-travel' ),
	'section'           => 'top_travel_single_post_section',
	'on_off_label' 		=> top_travel_hide_options(),
) ) );



// Tourableve date meta setting and control.
$wp_customize->add_setting( 'top_travel_theme_options[single_post_hide_date]', array(
	'default'           => $options['single_post_hide_date'],
	'sanitize_callback' => 'top_travel_sanitize_switch_control',
) );

$wp_customize->add_control( new Top_Travel_Switch_Control( $wp_customize, 'top_travel_theme_options[single_post_hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'top-travel' ),
	'section'           => 'top_travel_single_post_section',
	'on_off_label' 		=> top_travel_hide_options(),
) ) );

// Tourableve author meta setting and control.
$wp_customize->add_setting( 'top_travel_theme_options[single_post_hide_author]', array(
	'default'           => $options['single_post_hide_author'],
	'sanitize_callback' => 'top_travel_sanitize_switch_control',
) );

$wp_customize->add_control( new Top_Travel_Switch_Control( $wp_customize, 'top_travel_theme_options[single_post_hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'top-travel' ),
	'section'           => 'top_travel_single_post_section',
	'on_off_label' 		=> top_travel_hide_options(),
) ) );

// Tourableve author category setting and control.
$wp_customize->add_setting( 'top_travel_theme_options[single_post_hide_category]', array(
	'default'           => $options['single_post_hide_category'],
	'sanitize_callback' => 'top_travel_sanitize_switch_control',
) );

$wp_customize->add_control( new Top_Travel_Switch_Control( $wp_customize, 'top_travel_theme_options[single_post_hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'top-travel' ),
	'section'           => 'top_travel_single_post_section',
	'on_off_label' 		=> top_travel_hide_options(),
) ) );

// Tourableve tag category setting and control.
$wp_customize->add_setting( 'top_travel_theme_options[single_post_hide_tags]', array(
	'default'           => $options['single_post_hide_tags'],
	'sanitize_callback' => 'top_travel_sanitize_switch_control',
) );

$wp_customize->add_control( new Top_Travel_Switch_Control( $wp_customize, 'top_travel_theme_options[single_post_hide_tags]', array(
	'label'             => esc_html__( 'Hide Tag', 'top-travel' ),
	'section'           => 'top_travel_single_post_section',
	'on_off_label' 		=> top_travel_hide_options(),
) ) );
