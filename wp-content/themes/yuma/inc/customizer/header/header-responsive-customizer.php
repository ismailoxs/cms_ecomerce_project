<?php
/**
 * Header Responsive Customizer Options
 *
 * @package yuma
 */

// Add header responsive section
$wp_customize->add_section( 'yuma_header_responsive_section', array(
	'title'             => esc_html__( 'Main Header Responsive','yuma' ),
	'panel'             => 'yuma_header_panel',
) );

// header elements setting and control.
$wp_customize->add_setting( 'yuma_theme_options[header_responsive_element]', array(
	'sanitize_callback' => 'yuma_text_sanitization',
) );

$wp_customize->add_control( new Yuma_Pill_Checkbox_Custom_Control( $wp_customize, 'yuma_theme_options[header_responsive_element]', array(
		'label' => esc_html__( 'Main Header Elements on Large Screen Only', 'yuma' ),
		'description' => esc_html__( 'Check to disable the elements in small screen', 'yuma' ),
		'section' => 'yuma_header_responsive_section',
		'input_attrs' => array(
			'sortable' => false,
			'fullwidth' => true,
		),
		'choices' => yuma_header_elements_options(),
	)
) );

// header elements setting and control.
$wp_customize->add_setting( 'yuma_theme_options[header_large_responsive_element]', array(
	'sanitize_callback' => 'yuma_text_sanitization',
) );

$wp_customize->add_control( new Yuma_Pill_Checkbox_Custom_Control( $wp_customize, 'yuma_theme_options[header_large_responsive_element]', array(
		'label' => esc_html__( 'Main Header Elements on Small Screen Only', 'yuma' ),
		'description' => esc_html__( 'Check to disable the elements in large screen', 'yuma' ),
		'section' => 'yuma_header_responsive_section',
		'input_attrs' => array(
			'sortable' => false,
			'fullwidth' => true,
		),
		'choices' => yuma_header_elements_options(),
	)
) );
