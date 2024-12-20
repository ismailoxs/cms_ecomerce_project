<?php
/**
 * Typography Customizer Options
 *
 * @package yuma
 */

// Add typography section
$wp_customize->add_section( 'yuma_theme_typography_section', array(
	'title'             => esc_html__( 'Theme Typography Setting','yuma' ),
	'description'       => esc_html__( 'Typography Setting Options for Headings and Paragraph', 'yuma' ),
	'panel'             => 'yuma_typography_panel',
) );


$typography = theme_typography_list();

foreach ( $typography as $key => $value ):

	// Heading Google Font Select Control
	$wp_customize->add_setting( 'yuma_theme_options['. $key .'_font_family]',
		array(
			'default' => yuma_theme_option($key . '_font_family'),
			'sanitize_callback' => 'yuma_google_font_sanitization'
		)
	);
	$wp_customize->add_control( new Yuma_Google_Font_Select_Two_Custom_Control( $wp_customize, 'yuma_theme_options['. $key .'_font_family]',
		array(
			'label' => sprintf( esc_html__( '%s Font Family', 'yuma' ), $value['title'] ),
			'description' => $value['note'],
			'section' => 'yuma_theme_typography_section',
			'input_attrs' => array(
				'font_count' => 'all',
				'orderby' => 'alpha',
			),
		)
	) );

	// font size control and setting
	$wp_customize->add_setting( 'yuma_theme_options[' . $key . '_font_size]', array(
		'default' => yuma_theme_option($key . '_font_size'),
		'sanitize_callback' => 'absint'
	) );
	$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[' . $key . '_font_size]', 
		array(
			'label' => esc_html__( 'Font Size (px)', 'yuma' ),
			'section' => 'yuma_theme_typography_section',
			'input_attrs' => array(
				'min' => 10,
				'max' => 100,
				'step' => 1,
			),
		)
	) );

	// font weight control and setting
	$wp_customize->add_setting( 'yuma_theme_options[' . $key . '_font_weight]', array(
		'default' => yuma_theme_option($key . '_font_weight'),
		'sanitize_callback' => 'absint'
	) );
	$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[' . $key . '_font_weight]', 
		array(
			'label' => esc_html__( 'Font Weight', 'yuma' ),
			'section' => 'yuma_theme_typography_section',
			'input_attrs' => array(
				'min' => 100,
				'max' => 900,
				'step' => 100,
			),
		)
	) );

	// text_transform control and setting
	$wp_customize->add_setting( 'yuma_theme_options[' . $key . '_text_transform]', array(
		'default'          	=> yuma_theme_option($key . '_text_transform'),
		'sanitize_callback' => 'yuma_radio_sanitization',
	) );

	$wp_customize->add_control( new Yuma_Text_Radio_Button_Custom_Control( $wp_customize, 'yuma_theme_options[' . $key . '_text_transform]',
		array(
		'label'             => esc_html__( 'Text Transformation', 'yuma' ),
		'section'           => 'yuma_theme_typography_section',
		'choices'			=> array( 
			'none' 				=> esc_html__( 'Normal', 'yuma' ),
			'capitalize' 		=> esc_html__( 'Capitalize', 'yuma' ),
			'uppercase' 		=> esc_html__( 'Uppercase', 'yuma' ),
		),
	) ) );

	// typography hr control and setting
	$wp_customize->add_setting( 'yuma_theme_options[typography_' . $key . '_hr]', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new Yuma_Horizontal_Line( $wp_customize, 'yuma_theme_options[typography_' . $key . '_hr]', array(
		'section'           => 'yuma_theme_typography_section',
	) ) );

endforeach;
