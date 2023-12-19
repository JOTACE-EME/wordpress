<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage Top Travel Pro
 * @since Top Travel Pro 1.0.0
 */

// Footer Section
$wp_customize->add_section( 'top_travel_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'top-travel' ),
		'priority'   			=> 900,
		'panel'      			=> 'top_travel_theme_options_panel',
	)
);

// footer text
$wp_customize->add_setting( 'top_travel_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'top_travel_santize_allow_tag',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'top_travel_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'top-travel' ),
		'section'    			=> 'top_travel_section_footer',
		'type'		 			=> 'textarea',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'top_travel_theme_options[copyright_text]', array(
		'selector'            => '.site-info .copyright p',
		'settings'            => 'top_travel_theme_options[copyright_text]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'top_travel_copyright_text_partial',
    ) );
}


// footer text
$wp_customize->add_setting( 'top_travel_theme_options[powered_by_text]',
	array(
		'default'       		=> $options['powered_by_text'],
		'sanitize_callback'		=> 'top_travel_santize_allow_tag',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'top_travel_theme_options[powered_by_text]',
    array(
		'label'      			=> esc_html__( 'Powered By Text', 'top-travel' ),
		'section'    			=> 'top_travel_section_footer',
		'type'		 			=> 'textarea',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'top_travel_theme_options[powered_by_text]', array(
		'selector'            => '.site-info .powered-by p',
		'settings'            => 'top_travel_theme_options[powered_by_text]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'top_travel_powered_by_text_partial',
    ) );
}

// scroll top visible
$wp_customize->add_setting( 'top_travel_theme_options[scroll_top_visible]',
	array(
		'default'       		=> $options['scroll_top_visible'],
		'sanitize_callback' => 'top_travel_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Top_Travel_Switch_Control( $wp_customize, 'top_travel_theme_options[scroll_top_visible]',
    array(
		'label'      			=> esc_html__( 'Display Scroll Top Button', 'top-travel' ),
		'section'    			=> 'top_travel_section_footer',
		'on_off_label' 		=> top_travel_switch_options(),
    )
) );