<?php
/**
 * Archive options
 *
 * @package Theme Palace
 * @subpackage Top Travel Pro
 * @since Top Travel Pro 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'top_travel_archive_section', array(
	'title'             => esc_html__( 'Blog/Archive','top-travel' ),
	'description'       => esc_html__( 'Archive section options.', 'top-travel' ),
	'panel'             => 'top_travel_theme_options_panel',
) );

$wp_customize->add_setting( 'top_travel_theme_options[hide_banner]', array(
	'default'           => $options['hide_banner'],
	'sanitize_callback' => 'top_travel_sanitize_switch_control',
) );

$wp_customize->add_control( new Top_Travel_Switch_Control( $wp_customize, 'top_travel_theme_options[hide_banner]', array(
	'label'             => esc_html__( 'Hide Banner', 'top-travel' ),
	'section'           => 'top_travel_archive_section',
	'on_off_label' 		=> top_travel_hide_options(),
) ) );


// Archive date meta setting and control.
$wp_customize->add_setting( 'top_travel_theme_options[hide_date]', array(
	'default'           => $options['hide_date'],
	'sanitize_callback' => 'top_travel_sanitize_switch_control',
) );

$wp_customize->add_control( new Top_Travel_Switch_Control( $wp_customize, 'top_travel_theme_options[hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'top-travel' ),
	'section'           => 'top_travel_archive_section',
	'on_off_label' 		=> top_travel_hide_options(),
) ) );

// Archive category setting and control.
$wp_customize->add_setting( 'top_travel_theme_options[hide_category]', array(
	'default'           => $options['hide_category'],
	'sanitize_callback' => 'top_travel_sanitize_switch_control',
) );

$wp_customize->add_control( new Top_Travel_Switch_Control( $wp_customize, 'top_travel_theme_options[hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'top-travel' ),
	'section'           => 'top_travel_archive_section',
	'on_off_label' 		=> top_travel_hide_options(),
) ) );

// Archive category setting and control.
$wp_customize->add_setting( 'top_travel_theme_options[hide_author]', array(
	'default'           => $options['hide_author'],
	'sanitize_callback' => 'top_travel_sanitize_switch_control',
) );

$wp_customize->add_control( new Top_Travel_Switch_Control( $wp_customize, 'top_travel_theme_options[hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'top-travel' ),
	'section'           => 'top_travel_archive_section',
	'on_off_label' 		=> top_travel_hide_options(),
) ) );


// features content type control and setting
$wp_customize->add_setting( 'top_travel_theme_options[blog_column]', array(
	'default'          	=> $options['blog_column'],
	'sanitize_callback' => 'top_travel_sanitize_select',
	'transport'			=> 'refresh',
) );

$wp_customize->add_control( 'top_travel_theme_options[blog_column]', array(
	'label'             => esc_html__( 'Column Layout', 'top-travel' ),
	'section'           => 'top_travel_archive_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'col-1'		=> esc_html__( 'One Column', 'top-travel' ),
		'col-2'		=> esc_html__( 'Two Column', 'top-travel' ),
		'col-3'		=> esc_html__( 'Three Column', 'top-travel' ),
		'col-4'		=> esc_html__( 'Four Column', 'top-travel' ),
	),
) );

// Archive sub title setting and control
$wp_customize->add_setting( 'top_travel_theme_options[blog_page_button]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_page_button'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'top_travel_theme_options[blog_page_button]', array(
	'label'           	=> esc_html__( 'Read More Button', 'top-travel' ),
	'section'        	=> 'top_travel_archive_section',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'top_travel_theme_options[blog_page_button]', array(
		'selector'            => '#inner-content-wrapper .post-item-wrapper div.read-more a',
		'settings'            => 'top_travel_theme_options[blog_page_button]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'top_travel_blog_page_button_partial',
    ) );
}

