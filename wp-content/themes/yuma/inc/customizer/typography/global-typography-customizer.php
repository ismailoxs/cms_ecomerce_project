<?php
/**
 * Typography Customizer Options
 *
 * @package yuma
 */

// Add typography section
$wp_customize->add_section( 'yuma_global_typography_section', array(
	'title'             => esc_html__( 'Global Typography Setting','yuma' ),
	'description'       => esc_html__( 'Typography Setting Options for Headings and Paragraph', 'yuma' ),
	'panel'             => 'yuma_typography_panel',
) );

// Body Google Font Select Control
$wp_customize->add_setting( 'yuma_theme_options[body_font_family]',
	array(
		'default' => yuma_theme_option('body_font_family'),
		'sanitize_callback' => 'yuma_google_font_sanitization'
	)
);
$wp_customize->add_control( new Yuma_Google_Font_Select_Two_Custom_Control( $wp_customize, 'yuma_theme_options[body_font_family]',
	array(
		'label' => esc_html__( 'Body Font Family', 'yuma' ),
		'description' => esc_html__( 'All Google Fonts sorted alphabetically', 'yuma' ),
		'section' => 'yuma_global_typography_section',
		'input_attrs' => array(
			'font_count' => 'all',
			'orderby' => 'alpha',
		),
	)
) );

// body font size control and setting
$wp_customize->add_setting( 'yuma_theme_options[body_font_size]', array(
	'default' => yuma_theme_option('body_font_size'),
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[body_font_size]', 
	array(
		'label' => esc_html__( 'Body Font Size (px)', 'yuma' ),
		'section' => 'yuma_global_typography_section',
		'input_attrs' => array(
			'min' => 10,
			'max' => 100,
			'step' => 1,
		),
	)
) );

// body font weight control and setting
$wp_customize->add_setting( 'yuma_theme_options[body_font_weight]', array(
	'default' => yuma_theme_option('body_font_weight'),
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[body_font_weight]', 
	array(
		'label' => esc_html__( 'Body Font Weight', 'yuma' ),
		'section' => 'yuma_global_typography_section',
		'input_attrs' => array(
			'min' => 100,
			'max' => 900,
			'step' => 100,
		),
	)
) );

// body font hr control and setting
$wp_customize->add_setting( 'yuma_theme_options[typography_body_hr]', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Yuma_Horizontal_Line( $wp_customize, 'yuma_theme_options[typography_body_hr]', array(
	'section'           => 'yuma_global_typography_section',
) ) );

// Heading Google Font Select Control
$wp_customize->add_setting( 'yuma_theme_options[heading_font_family]',
	array(
		'default' => yuma_theme_option('heading_font_family'),
		'sanitize_callback' => 'yuma_google_font_sanitization'
	)
);
$wp_customize->add_control( new Yuma_Google_Font_Select_Two_Custom_Control( $wp_customize, 'yuma_theme_options[heading_font_family]',
	array(
		'label' => esc_html__( 'Heading Font Family ( H1 - H6 )', 'yuma' ),
		'description' => esc_html__( 'All Google Fonts sorted alphabetically', 'yuma' ),
		'section' => 'yuma_global_typography_section',
		'input_attrs' => array(
			'font_count' => 'all',
			'orderby' => 'alpha',
		),
	)
) );

$typography = typography_elements_list();

foreach ( $typography as $key => $value ):

	// h1 font size control and setting
	$wp_customize->add_setting( 'yuma_theme_options[' . $key . '_font_size]', array(
		'default' => yuma_theme_option($key . '_font_size'),
		'sanitize_callback' => 'absint'
	) );
	$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[' . $key . '_font_size]', 
		array(
			'label' => sprintf( esc_html__( '%s Font Size (px)', 'yuma' ), $value ),
			'section' => 'yuma_global_typography_section',
			'input_attrs' => array(
				'min' => 10,
				'max' => 100,
				'step' => 1,
			),
		)
	) );

	// h1 font weight control and setting
	$wp_customize->add_setting( 'yuma_theme_options[' . $key . '_font_weight]', array(
		'default' => yuma_theme_option($key . '_font_weight'),
		'sanitize_callback' => 'absint'
	) );
	$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[' . $key . '_font_weight]', 
		array(
			'label' => sprintf( esc_html__( '%s Font Weight', 'yuma' ), $value ),
			'section' => 'yuma_global_typography_section',
			'input_attrs' => array(
				'min' => 100,
				'max' => 900,
				'step' => 100,
			),
		)
	) );

	// typography h1 hr control and setting
	$wp_customize->add_setting( 'yuma_theme_options[typography_' . $key . '_hr]', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new Yuma_Horizontal_Line( $wp_customize, 'yuma_theme_options[typography_' . $key . '_hr]', array(
		'section'           => 'yuma_global_typography_section',
	) ) );

endforeach;
