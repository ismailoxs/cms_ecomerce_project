<?php
/**
 * Footer Style Customizer Options
 *
 * @package yuma
 */

// Add footer section
$wp_customize->add_section( 'yuma_footer_style_section', array(
	'title'             => esc_html__( 'Footer Site Info Style','yuma' ),
	'description'       => esc_html__( 'Site Info Layout and Elements Style Options','yuma' ),
	'panel'             => 'yuma_footer_panel',
) );

// footer background color control and setting
$wp_customize->add_setting( 'yuma_theme_options[footer_bg_color]', array(
	'default'           => '#0a0e14',
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'yuma_theme_options[footer_bg_color]', array(
	'label'    => esc_html__( 'Background Color', 'yuma' ),
	'section'  => 'yuma_footer_style_section',
) ) );

// footer element color control and setting
$wp_customize->add_setting( 'yuma_theme_options[footer_elements_color]', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'yuma_theme_options[footer_elements_color]', array(
	'label'    => esc_html__( 'Elements Color', 'yuma' ),
	'section'  => 'yuma_footer_style_section',
) ) );

// footer font size control and setting
$wp_customize->add_setting( 'yuma_theme_options[footer_font_size]', array(
	'default' => yuma_theme_option('footer_font_size'),
	'sanitize_callback' => 'absint'
) );


$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[footer_font_size]', 
	array(
		'label' => esc_html__( 'Element Font Size (px)', 'yuma' ),
		'section' => 'yuma_footer_style_section',
		'input_attrs' => array(
			'min' => 10,
			'max' => 36,
			'step' => 1,
		),
	)
) );

// footer padding size control and setting
$wp_customize->add_setting( 'yuma_theme_options[footer_padding]', array(
	'default' => yuma_theme_option('footer_padding'),
	'sanitize_callback' => 'absint'
) );

$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[footer_padding]', 
	array(
		'label' => esc_html__( 'Padding Top/Bottom (px)', 'yuma' ),
		'section' => 'yuma_footer_style_section',
		'input_attrs' => array(
			'min' => 1,
			'max' => 50,
			'step' => 1,
		),
	)
) );

// footer element area size control and setting
$wp_customize->add_setting( 'yuma_theme_options[footer_area]', array(
	'default'          	=> yuma_theme_option('footer_area'),
	'sanitize_callback' => 'yuma_sanitize_select',
) );

$wp_customize->add_control( 'yuma_theme_options[footer_area]', array(
	'label'             => esc_html__( 'Element Area Size', 'yuma' ),
	'description'       => esc_html__( 'Left, Center and Right Area Size', 'yuma' ),
	'section'           => 'yuma_footer_style_section',
	'type'				=> 'radio',
	'choices'			=> array( 
		'equal' 	=> esc_html__( 'Equal Size', 'yuma' ),
		'auto' 		=> esc_html__( 'Auto Size', 'yuma' ),
		'custom' 	=> esc_html__( 'Custom Size', 'yuma' ),
	),
) );

// footer left area size control and setting
$wp_customize->add_setting( 'yuma_theme_options[footer_left_area_size]', array(
	'default' => yuma_theme_option('footer_left_area_size'),
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[footer_left_area_size]', 
	array(
		'label' => esc_html__( 'Left Area Size (%)', 'yuma' ),
		'description' => esc_html__( 'Note: It will work only if the area is active.', 'yuma' ),
		'section' => 'yuma_footer_style_section',
		'input_attrs' => array(
			'min' => 1,
			'max' => 100,
			'step' => 1,
		),
		'active_callback' => 'yuma_footer_area_size_custom_enable',
	)
) );

// footer center area size control and setting
$wp_customize->add_setting( 'yuma_theme_options[footer_center_area_size]', array(
	'default' => yuma_theme_option('footer_center_area_size'),
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[footer_center_area_size]', 
	array(
		'label' => esc_html__( 'Center Area Size (%)', 'yuma' ),
		'description' => esc_html__( 'Note: It will work only if the area is active.', 'yuma' ),
		'section' => 'yuma_footer_style_section',
		'input_attrs' => array(
			'min' => 1,
			'max' => 100,
			'step' => 1,
		),
		'active_callback' => 'yuma_footer_area_size_custom_enable',
	)
) );

// footer right area size control and setting
$wp_customize->add_setting( 'yuma_theme_options[footer_right_area_size]', array(
	'default' => yuma_theme_option('footer_right_area_size'),
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[footer_right_area_size]', 
	array(
		'label' => esc_html__( 'Right Area Size (%)', 'yuma' ),
		'description' => esc_html__( 'Note: It will work only if the area is active.', 'yuma' ),
		'section' => 'yuma_footer_style_section',
		'input_attrs' => array(
			'min' => 1,
			'max' => 100,
			'step' => 1,
		),
		'active_callback' => 'yuma_footer_area_size_custom_enable',
	)
) );
