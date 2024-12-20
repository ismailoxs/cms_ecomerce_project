<?php
/**
 * Footer Widget Style Customizer Options
 *
 * @package yuma
 */

// Add footer widget area section
$wp_customize->add_section( 'yuma_footer_widget_style_section', array(
	'title'             => esc_html__( 'Footer Widget Area Style','yuma' ),
	'description'       => esc_html__( 'Site Footer Layout and Elements Style Options','yuma' ),
	'panel'             => 'yuma_footer_panel',
) );

// footer widget background color control and setting
$wp_customize->add_setting( 'yuma_theme_options[footer_widget_bg_color]', array(
	'default'           => '#0a0e14',
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'yuma_theme_options[footer_widget_bg_color]', array(
	'label'    => esc_html__( 'Background Color', 'yuma' ),
	'section'  => 'yuma_footer_widget_style_section',
) ) );

// footer widget image setting and control.
$wp_customize->add_setting( 'yuma_theme_options[footer_widget_bg_image]', array(
	'sanitize_callback' => 'yuma_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'yuma_theme_options[footer_widget_bg_image]',
	array(
	'label'       		=> esc_html__( 'Background Image', 'yuma' ),
	'section'     		=> 'yuma_footer_widget_style_section',
) ) );

// footer widget image size setting and control.
$wp_customize->add_setting( 'yuma_theme_options[footer_widget_bg_image_size]',
	array(
		'default' => yuma_theme_option('footer_widget_bg_image_size'),
		'sanitize_callback' => 'yuma_radio_sanitization'
	)
);

$wp_customize->add_control( new Yuma_Text_Radio_Button_Custom_Control( $wp_customize, 'yuma_theme_options[footer_widget_bg_image_size]',
	array(
		'label' => esc_html__( 'Background Image Size', 'yuma' ),
		'section' => 'yuma_footer_widget_style_section',
		'choices' => array(
			'cover' 	=> esc_html__( 'Cover', 'yuma' ),
			'contain' 	=> esc_html__( 'Contain', 'yuma'  )
		),
	)
) );

// footer widget image background repeat enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[footer_widget_bg_image_repeat]', array(
	'default'           => yuma_theme_option('footer_widget_bg_image_repeat'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[footer_widget_bg_image_repeat]', array(
	'label'             => esc_html__( 'Background Image Repeat', 'yuma' ),
	'section'           => 'yuma_footer_widget_style_section',
) ) );

// footer widget image background fixed enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[footer_widget_bg_image_fixed]', array(
	'default'           => yuma_theme_option('footer_widget_bg_image_fixed'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[footer_widget_bg_image_fixed]', array(
	'label'             => esc_html__( 'Fixed Background', 'yuma' ),
	'section'           => 'yuma_footer_widget_style_section',
) ) );

// footer widget title color control and setting
$wp_customize->add_setting( 'yuma_theme_options[footer_widget_title_color]', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'yuma_theme_options[footer_widget_title_color]', array(
	'label'    => esc_html__( 'Widget Title Color', 'yuma' ),
	'section'  => 'yuma_footer_widget_style_section',
) ) );

// footer widget title separator enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[footer_widget_title_separator]', array(
	'default'           => yuma_theme_option('footer_widget_title_separator'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[footer_widget_title_separator]', array(
	'label'             => esc_html__( 'Enable Widget Title Separator', 'yuma' ),
	'section'           => 'yuma_footer_widget_style_section',
) ) );

// footer widget title separator color control and setting
$wp_customize->add_setting( 'yuma_theme_options[footer_widget_title_separator_color]', array(
	'default'           => '#eba54c',
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'yuma_theme_options[footer_widget_title_separator_color]', array(
	'label'    => esc_html__( 'Widget Title Separator Color', 'yuma' ),
	'section'  => 'yuma_footer_widget_style_section',
	'active_callback'	=> 'yuma_footer_widget_title_separator_enable',
) ) );

// footer widget title font size control and setting
$wp_customize->add_setting( 'yuma_theme_options[footer_widget_title_font_size]', array(
	'default' => yuma_theme_option('footer_widget_title_font_size'),
	'sanitize_callback' => 'absint'
) );

$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[footer_widget_title_font_size]', 
	array(
		'label' => esc_html__( 'Widget Title Font Size (px)', 'yuma' ),
		'section' => 'yuma_footer_widget_style_section',
		'input_attrs' => array(
			'min' => 10,
			'max' => 36,
			'step' => 1,
		),
	)
) );

// footer widget title font weight control and setting
$wp_customize->add_setting( 'yuma_theme_options[footer_widget_title_font_weight]', array(
	'default' => yuma_theme_option('footer_widget_title_font_weight'),
	'sanitize_callback' => 'absint'
) );

$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[footer_widget_title_font_weight]', 
	array(
		'label' => esc_html__( 'Widget Title Font Weight', 'yuma' ),
		'section' => 'yuma_footer_widget_style_section',
		'input_attrs' => array(
			'min' => 100,
			'max' => 900,
			'step' => 100,
		),
	)
) );

// footer widget element color control and setting
$wp_customize->add_setting( 'yuma_theme_options[footer_widget_elements_color]', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'yuma_theme_options[footer_widget_elements_color]', array(
	'label'    => esc_html__( 'Widget Elements Color', 'yuma' ),
	'section'  => 'yuma_footer_widget_style_section',
) ) );

// footer widget font size control and setting
$wp_customize->add_setting( 'yuma_theme_options[footer_widget_font_size]', array(
	'default' => yuma_theme_option('footer_widget_font_size'),
	'sanitize_callback' => 'absint'
) );

$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[footer_widget_font_size]', 
	array(
		'label' => esc_html__( 'Widget Element Font Size (px)', 'yuma' ),
		'section' => 'yuma_footer_widget_style_section',
		'input_attrs' => array(
			'min' => 10,
			'max' => 24,
			'step' => 1,
		),
	)
) );

// footer padding size control and setting
$wp_customize->add_setting( 'yuma_theme_options[footer_widget_padding]', array(
	'default' => yuma_theme_option('footer_widget_padding'),
	'sanitize_callback' => 'absint'
) );

$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[footer_widget_padding]', 
	array(
		'label' => esc_html__( 'Padding Top/Bottom (px)', 'yuma' ),
		'section' => 'yuma_footer_widget_style_section',
		'input_attrs' => array(
			'min' => 10,
			'max' => 200,
			'step' => 1,
		),
	)
) );
