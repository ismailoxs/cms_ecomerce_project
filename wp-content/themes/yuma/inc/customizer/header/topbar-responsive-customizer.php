<?php
/**
 * Topbar Responsive Customizer Options
 *
 * @package yuma
 */

// Add header responsive section
$wp_customize->add_section( 'yuma_topbar_responsive_section', array(
	'title'             => esc_html__( 'Topbar Responsive','yuma' ),
	'description'       => esc_html__( 'Note: This functionality only works with the elements that are activated in Topbar Elements Section.','yuma' ),
	'panel'             => 'yuma_header_panel',
) );

// topbar elements setting and control.
$wp_customize->add_setting( 'yuma_theme_options[topbar_responsive_element]', array(
	'sanitize_callback' => 'yuma_text_sanitization',
) );

$wp_customize->add_control( new Yuma_Pill_Checkbox_Custom_Control( $wp_customize, 'yuma_theme_options[topbar_responsive_element]', array(
		'label' => esc_html__( 'Topbar Elements on Large Screen Only', 'yuma' ),
		'description' => esc_html__( 'Check to disable the elements in small screen', 'yuma' ),
		'section' => 'yuma_topbar_responsive_section',
		'input_attrs' => array(
			'sortable' => false,
			'fullwidth' => true,
		),
		'choices' => yuma_topbar_elements_options(),
	)
) );

// topbar elements setting and control.
$wp_customize->add_setting( 'yuma_theme_options[topbar_large_responsive_element]', array(
	'sanitize_callback' => 'yuma_text_sanitization',
) );

$wp_customize->add_control( new Yuma_Pill_Checkbox_Custom_Control( $wp_customize, 'yuma_theme_options[topbar_large_responsive_element]', array(
		'label' => esc_html__( 'Topbar Elements on Small Screen Only', 'yuma' ),
		'description' => esc_html__( 'Check to disable the elements in large screen', 'yuma' ),
		'section' => 'yuma_topbar_responsive_section',
		'input_attrs' => array(
			'sortable' => false,
			'fullwidth' => true,
		),
		'choices' => yuma_topbar_elements_options(),
	)
) );

