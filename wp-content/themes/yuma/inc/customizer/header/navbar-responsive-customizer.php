<?php
/**
 * Navbar Responsive Customizer Options
 *
 * @package yuma
 */

// Add navbar responsive section
$wp_customize->add_section( 'yuma_navbar_responsive_section', array(
	'title'             => esc_html__( 'Navbar Responsive','yuma' ),
	'description'       => esc_html__( 'Note: This functionality only works with the elements that are activated in Navbar Elements Section.','yuma' ),
	'panel'             => 'yuma_header_panel',
) );

// navbar elements setting and control.
$wp_customize->add_setting( 'yuma_theme_options[navbar_responsive_element]', array(
	'sanitize_callback' => 'yuma_text_sanitization',
) );

$wp_customize->add_control( new Yuma_Pill_Checkbox_Custom_Control( $wp_customize, 'yuma_theme_options[navbar_responsive_element]', array(
		'label' => esc_html__( 'Navbar Elements on Large Screen Only', 'yuma' ),
		'description' => esc_html__( 'Check to disable the elements in small screen', 'yuma' ),
		'section' => 'yuma_navbar_responsive_section',
		'input_attrs' => array(
			'sortable' => false,
			'fullwidth' => true,
		),
		'choices' => yuma_navbar_elements_options(),
	)
) );

// navbar elements setting and control.
$wp_customize->add_setting( 'yuma_theme_options[navbar_large_responsive_element]', array(
	'sanitize_callback' => 'yuma_text_sanitization',
) );

$wp_customize->add_control( new Yuma_Pill_Checkbox_Custom_Control( $wp_customize, 'yuma_theme_options[navbar_large_responsive_element]', array(
		'label' => esc_html__( 'Navbar Elements on Small Screen Only', 'yuma' ),
		'description' => esc_html__( 'Check to disable the elements in large screen', 'yuma' ),
		'section' => 'yuma_navbar_responsive_section',
		'input_attrs' => array(
			'sortable' => false,
			'fullwidth' => true,
		),
		'choices' => yuma_navbar_elements_options(),
	)
) );
