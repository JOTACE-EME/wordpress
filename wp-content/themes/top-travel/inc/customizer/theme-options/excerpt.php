<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Top Travel Pro
 * @since Top Travel Pro 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'top_travel_excerpt_section', array(
	'title'             => esc_html__( 'Excerpt','top-travel' ),
	'description'       => esc_html__( 'Excerpt section options.', 'top-travel' ),
	'panel'             => 'top_travel_theme_options_panel',
) );


// long Excerpt length setting and control.
$wp_customize->add_setting( 'top_travel_theme_options[long_excerpt_length]', array(
	'sanitize_callback' => 'top_travel_sanitize_number_range',
	'validate_callback' => 'top_travel_validate_long_excerpt',
	'default'			=> $options['long_excerpt_length'],
) );

$wp_customize->add_control( 'top_travel_theme_options[long_excerpt_length]', array(
	'label'       		=> esc_html__( 'Blog Page Excerpt Length', 'top-travel' ),
	'description' 		=> esc_html__( 'Total words to be displayed in archive page/search page.', 'top-travel' ),
	'section'     		=> 'top_travel_excerpt_section',
	'type'        		=> 'number',
	'input_attrs' 		=> array(
		'style'       => 'width: 80px;',
		'max'         => 100,
		'min'         => 5,
	),
) );
