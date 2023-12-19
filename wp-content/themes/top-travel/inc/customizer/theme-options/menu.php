<?php
/**
 * Menu options
 *
 * @package Theme Palace
 * @subpackage Top Travel Pro
 * @since Top Travel Pro 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'top_travel_menu', array(
	'title'             => esc_html__('Header Menu','top-travel'),
	'description'       => esc_html__( 'Header Menu options.', 'top-travel' ),
	'panel'             => 'nav_menus',
) );


$wp_customize->add_setting( 'top_travel_theme_options[search_icon]', array(
	'sanitize_callback' => 'top_travel_sanitize_switch_control',
	'default'           => $options['search_icon'],
) );

$wp_customize->add_control( new Top_Travel_Switch_Control( $wp_customize, 'top_travel_theme_options[search_icon]', array(
	'label'             => esc_html__( 'Enable Search', 'top-travel' ),
	'section'           => 'top_travel_menu',
	'on_off_label' 		=> top_travel_switch_options(),
) ) );

// search enable setting and control.
$wp_customize->add_setting( 'top_travel_theme_options[social_nav_enable]', array(
	'sanitize_callback' => 'top_travel_sanitize_switch_control',
	'default'           => $options['social_nav_enable'],
) );

$wp_customize->add_control( new Top_Travel_Switch_Control( $wp_customize, 'top_travel_theme_options[social_nav_enable]', array(
	'label'             => esc_html__( 'Enable Social Links', 'top-travel' ),
	'description'       => sprintf( '%1$s <a class="topbar-menu-trigger" href="#"> %2$s </a> %3$s', esc_html__( 'Note: To show social menu.', 'top-travel' ), esc_html__( 'Click Here', 'top-travel' ), esc_html__( 'to create menu', 'top-travel' ) ),
	'section'           => 'top_travel_menu',
	'on_off_label' 		=> top_travel_switch_options(),
) ) );
