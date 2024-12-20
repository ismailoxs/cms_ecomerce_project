<?php
/**
 * Color Customizer Options
 *
 * @package yuma
 */

// theme color content type control and setting
$wp_customize->add_setting( 'yuma_theme_options[theme_color]', array(
	'default'          	=> yuma_theme_option('theme_color'),
	'sanitize_callback' => 'yuma_sanitize_select',
) );

$wp_customize->add_control( 'yuma_theme_options[theme_color]', array(
	'label'             => esc_html__( 'Theme Color Options', 'yuma' ),
	'section'           => 'colors',
	'type'				=> 'radio',
	'choices'			=> array( 
		'default' 	=> esc_html__( 'Default', 'yuma' ),
		'custom' 	=> esc_html__( 'Custom', 'yuma' ),
	),
) );

$wp_customize->add_setting( 'yuma_theme_options[color_primary]', array(
	'default'           => yuma_theme_option('color_primary', '#0a0e14'),
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'yuma_theme_options[color_primary]', array(
	'label'    => esc_html__( 'Theme Color Primary', 'yuma' ),
	'section'  => 'colors',
	'active_callback'	=> 'yuma_theme_color_custom_enable',
) ) );

$wp_customize->add_setting( 'yuma_theme_options[color_secondary]', array(
	'default'           => yuma_theme_option('color_secondary', '#eba54c'),
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'yuma_theme_options[color_secondary]', array(
	'label'    => esc_html__( 'Theme Color Secondary', 'yuma' ),
	'section'  => 'colors',
	'active_callback'	=> 'yuma_theme_color_custom_enable',
) ) );

