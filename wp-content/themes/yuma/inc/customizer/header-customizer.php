<?php
/**
 * Header Customizer Options
 *
 * @package yuma
 */

// Add header section
$wp_customize->add_section( 'yuma_header_section', array(
	'title'             => esc_html__( 'Header Section','yuma' ),
	'description'       => esc_html__( 'Header Setting Options', 'yuma' ),
	'panel'             => 'yuma_theme_options_panel',
) );

// header sticky setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_sticky_header]', array(
	'default'           => yuma_theme_option( 'enable_sticky_header' ),
	'sanitize_callback' => 'yuma_sanitize_switch',
) );

$wp_customize->add_control( new Yuma_Switch_Control( $wp_customize, 'yuma_theme_options[enable_sticky_header]', array(
	'label'             => esc_html__( 'Enable Sticky Header', 'yuma' ),
	'section'           => 'yuma_header_section',
	'on_off_label' 		=> yuma_show_options(),
) ) );

// header search setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_header_search]', array(
	'default'           => yuma_theme_option( 'enable_header_search' ),
	'sanitize_callback' => 'yuma_sanitize_switch',
) );

$wp_customize->add_control( new Yuma_Switch_Control( $wp_customize, 'yuma_theme_options[enable_header_search]', array(
	'label'             => esc_html__( 'Enable Search in Header', 'yuma' ),
	'section'           => 'yuma_header_section',
	'on_off_label' 		=> yuma_show_options(),
) ) );

// header alignment control and setting
$wp_customize->add_setting( 'yuma_theme_options[header_alignment]', array(
	'default'          	=> yuma_theme_option('header_alignment'),
	'sanitize_callback' => 'yuma_sanitize_select',
) );

$wp_customize->add_control( 'yuma_theme_options[header_alignment]', array(
	'label'             => esc_html__( 'Header Alignment', 'yuma' ),
	'section'           => 'yuma_header_section',
	'type'				=> 'radio',
	'choices'			=> array( 
		'left-align' 		=> esc_html__( 'Left Align', 'yuma' ),
		'left-absolute' 	=> esc_html__( 'Left Absolute', 'yuma' ),
		'center-align' 		=> esc_html__( 'Center Align', 'yuma' ),
	),
) );

