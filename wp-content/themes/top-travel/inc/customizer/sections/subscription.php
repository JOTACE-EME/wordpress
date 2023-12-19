<?php
/**
 * Subscription Section options
 *
 * @package Theme Palace
 * @subpackage Top Travel Pro
 * @since Top Travel Pro 1.0.0
 */

// Add Subscription section
$wp_customize->add_section( 'top_travel_subscription_section', array(
	'title'             => esc_html__( 'Subscription','top-travel' ),
	'description'       => esc_html__( 'Note: To activate this section you need to install Jetpack Plugin and activate subscription module.', 'top-travel' ),
	'panel'             => 'top_travel_front_page_panel',
	'priority'			=> 80,
) );

// Subscription content enable control and setting
$wp_customize->add_setting( 'top_travel_theme_options[subscription_section_enable]', array(
	'default'			=> 	$options['subscription_section_enable'],
	'sanitize_callback' => 'top_travel_sanitize_switch_control',
) );

$wp_customize->add_control( new Top_Travel_Switch_Control( $wp_customize, 'top_travel_theme_options[subscription_section_enable]', array(
	'label'             => esc_html__( 'Subscription Section Enable', 'top-travel' ),
	'section'           => 'top_travel_subscription_section',
	'on_off_label' 		=> top_travel_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'top_travel_theme_options[subscription_section_enable]', array(
		'selector'            => '#subscribe-now .wrapper',
		'settings'            => 'top_travel_theme_options[subscription_section_enable]',
    ) );
}

// subscription description setting and control
$wp_customize->add_setting( 'top_travel_theme_options[subscription_sub_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['subscription_sub_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'top_travel_theme_options[subscription_sub_title]', array(
	'label'           	=> esc_html__( 'Sub Title', 'top-travel' ),
	'section'        	=> 'top_travel_subscription_section',
	'active_callback' 	=> 'top_travel_is_subscription_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'top_travel_theme_options[subscription_sub_title]', array(
		'selector'            => '#subscribe-now .section-header p.section-subtitle',
		'settings'            => 'top_travel_theme_options[subscription_sub_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'top_travel_subscription_sub_title_partial',
    ) );
}

// subscription title setting and control
$wp_customize->add_setting( 'top_travel_theme_options[subscription_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['subscription_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'top_travel_theme_options[subscription_title]', array(
	'label'           	=> esc_html__( 'Title', 'top-travel' ),
	'section'        	=> 'top_travel_subscription_section',
	'active_callback' 	=> 'top_travel_is_subscription_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'top_travel_theme_options[subscription_title]', array(
		'selector'            => '#subscribe-now .section-header h2.section-title',
		'settings'            => 'top_travel_theme_options[subscription_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'top_travel_subscription_title_partial',
    ) );
}

// subscription btn title setting and control
$wp_customize->add_setting( 'top_travel_theme_options[subscription_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['subscription_btn_title'],
) );

$wp_customize->add_control( 'top_travel_theme_options[subscription_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'top-travel' ),
	'section'        	=> 'top_travel_subscription_section',
	'active_callback' 	=> 'top_travel_is_subscription_section_enable',
	'type'				=> 'text',
) );

