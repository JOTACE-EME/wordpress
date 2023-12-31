<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage Top Travel Pro
 * @since Top Travel Pro 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'top_travel_reset_section', array(
	'title'             => esc_html__('Reset all settings','top-travel'),
	'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'top-travel' ),
) );

// Add reset enable setting and control.
$wp_customize->add_setting( 'top_travel_theme_options[reset_options]', array(
	'default'           => $options['reset_options'],
	'sanitize_callback' => 'top_travel_sanitize_checkbox',
	'transport'			  => 'postMessage',
) );

$wp_customize->add_control( 'top_travel_theme_options[reset_options]', array(
	'label'             => esc_html__( 'Check to reset all settings', 'top-travel' ),
	'section'           => 'top_travel_reset_section',
	'type'              => 'checkbox',
) );
