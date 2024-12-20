<?php
/**
 * 404 Customizer Options
 *
 * @package yuma
 */

// Add 404 section
$wp_customize->add_section( 'yuma_404_section', array(
	'title'             => esc_html__( '404','yuma' ),
	'description'       => esc_html__( '404 Setting Options', 'yuma' ),
	'capability'     	=> 'edit_theme_options',
	'priority'  		=> 100,
) );


// 404 background image setting and control.
$wp_customize->add_setting( 'yuma_theme_options[404_image]', array(
	'sanitize_callback' => 'yuma_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'yuma_theme_options[404_image]',
	array(
	'label'			=> esc_html__( '404 Image', 'yuma' ),
	'description'	=> esc_html__( 'Note: Transparent PNG Image Recommended.', 'yuma' ),
	'section'  		=> 'yuma_404_section',
) ) );

// 404 image size control and setting
$wp_customize->add_setting( 'yuma_theme_options[404_image_size]', array(
	'default' => yuma_theme_option('404_image_size'),
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[404_image_size]', 
	array(
		'label' => esc_html__( 'Max Image Width (px)', 'yuma' ),
		'section' => 'yuma_404_section',
		'input_attrs' => array(
			'min' => 50,
			'max' => 800,
			'step' => 1,
		),
	)
) );

// 404 title control and setting
$wp_customize->add_setting( 'yuma_theme_options[404_title]', array(
	'default'          	=> yuma_theme_option('404_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'yuma_theme_options[404_title]', array(
	'label'             => esc_html__( 'Title', 'yuma' ),
	'section'           => 'yuma_404_section',
	'type'				=> 'text',
) );

// 404 sub title control and setting
$wp_customize->add_setting( 'yuma_theme_options[404_sub_title]', array(
	'default'          	=> yuma_theme_option('404_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'yuma_theme_options[404_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'yuma' ),
	'section'           => 'yuma_404_section',
	'type'				=> 'text',
) );

// 404 message control and setting
$wp_customize->add_setting( 'yuma_theme_options[404_message]', array(
	'default'          	=> yuma_theme_option('404_message'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'yuma_theme_options[404_message]', array(
	'label'             => esc_html__( 'Info Message', 'yuma' ),
	'section'           => 'yuma_404_section',
	'type'				=> 'text',
) );

// 404 search enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_404_search]', array(
	'default'           => yuma_theme_option('enable_404_search'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_404_search]', array(
	'label'             => esc_html__( 'Enable Search', 'yuma' ),
	'section'  			=> 'yuma_404_section',
	'on_off_label' 		=> yuma_show_options(),
) ) );
