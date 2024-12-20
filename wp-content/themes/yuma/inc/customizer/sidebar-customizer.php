<?php
/**
 * Sidebar Widget Style Customizer Options
 *
 * @package yuma
 */

// Add sidebar widget area section
$wp_customize->add_section( 'yuma_sidebar_widget_section', array(
	'title'             => esc_html__( 'Sidebar/Off Canvas','yuma' ),
	'description'       => esc_html__( 'Sidebar and Off Canvas Style Options','yuma' ),
	'capability'     	=> 'edit_theme_options',
	'priority'  		=> 100,
) );

// off canvas label control and setting
$wp_customize->add_setting( 'yuma_theme_options[off_canvas_label]', array(
	'default' => '',
	'transport' => 'postMessage',
	'sanitize_callback' => 'yuma_text_sanitization',
) );

$wp_customize->add_control( new Yuma_Simple_Notice_Custom_control( $wp_customize, 'yuma_theme_options[off_canvas_label]', array(
	'label' => esc_html__( 'Off Canvas Settings', 'yuma' ),
	'section' => 'yuma_sidebar_widget_section',
) ) );

// off canvas position control and setting
$wp_customize->add_setting( 'yuma_theme_options[off_canvas_position]', array(
	'default'          	=> yuma_theme_option('off_canvas_position'),
	'sanitize_callback' => 'yuma_radio_sanitization',
) );

$wp_customize->add_control( new Yuma_Text_Radio_Button_Custom_Control( $wp_customize, 'yuma_theme_options[off_canvas_position]',
	array(
	'label'             => esc_html__( 'Off Canvas Position', 'yuma' ),
	'section'           => 'yuma_sidebar_widget_section',
	'choices'			=> array( 
		'align-left' 		=> esc_html__( 'Left', 'yuma' ),
		'align-right' 		=> esc_html__( 'Right', 'yuma' ),
	),
) ) );

// off canvas background color control and setting
$wp_customize->add_setting( 'yuma_theme_options[off_canvas_area_bg_color]', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'yuma_theme_options[off_canvas_area_bg_color]', array(
	'label'    => esc_html__( 'Off Canvas Background Color', 'yuma' ),
	'section'  => 'yuma_sidebar_widget_section',
) ) );

// off canvas close icon background color control and setting
$wp_customize->add_setting( 'yuma_theme_options[off_canvas_area_close_bg_color]', array(
	'default'           => '#0a0e14',
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'yuma_theme_options[off_canvas_area_close_bg_color]', array(
	'label'    => esc_html__( 'Off Canvas Close Icon Background Color', 'yuma' ),
	'section'  => 'yuma_sidebar_widget_section',
) ) );

// off canvas close icon color control and setting
$wp_customize->add_setting( 'yuma_theme_options[off_canvas_area_close_color]', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'yuma_theme_options[off_canvas_area_close_color]', array(
	'label'    => esc_html__( 'Off Canvas Close Icon Color', 'yuma' ),
	'section'  => 'yuma_sidebar_widget_section',
) ) );

// off canvas widget background color control and setting
$wp_customize->add_setting( 'yuma_theme_options[off_canvas_area_widget_bg_color]', array(
	'default'           => '#f6f6f7',
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'yuma_theme_options[off_canvas_area_widget_bg_color]', array(
	'label'    => esc_html__( 'Off Canvas Widget Background Color', 'yuma' ),
	'section'  => 'yuma_sidebar_widget_section',
) ) );

// off canvas widget title color control and setting
$wp_customize->add_setting( 'yuma_theme_options[off_canvas_area_widget_title_color]', array(
	'default'           => '#0a0e14',
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'yuma_theme_options[off_canvas_area_widget_title_color]', array(
	'label'    => esc_html__( 'Off Canvas Widget Title Color', 'yuma' ),
	'section'  => 'yuma_sidebar_widget_section',
) ) );

// off canvas widget element color control and setting
$wp_customize->add_setting( 'yuma_theme_options[off_canvas_area_widget_elements_color]', array(
	'default'           => '#555555',
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'yuma_theme_options[off_canvas_area_widget_elements_color]', array(
	'label'    => esc_html__( 'Off Canvas Widget Elements Color', 'yuma' ),
	'section'  => 'yuma_sidebar_widget_section',
) ) );

/************************************************************************************************************/

// sidebar hr control and setting
$wp_customize->add_setting( 'yuma_theme_options[sidebar_hr_1]', array(
	'sanitize_callback' => 'wp_kses_post',
) );

$wp_customize->add_control( new Yuma_Horizontal_Line( $wp_customize, 'yuma_theme_options[sidebar_hr_1]', array(
	'section'           => 'yuma_sidebar_widget_section',
) ) );

// sidebar label control and setting
$wp_customize->add_setting( 'yuma_theme_options[sidebar_label]', array(
	'default' => '',
	'transport' => 'postMessage',
	'sanitize_callback' => 'yuma_text_sanitization',
) );

$wp_customize->add_control( new Yuma_Simple_Notice_Custom_control( $wp_customize, 'yuma_theme_options[sidebar_label]', array(
	'label' => esc_html__( 'Sidebar Settings', 'yuma' ),
	'section' => 'yuma_sidebar_widget_section',
) ) );

// sidebar widget background color control and setting
$wp_customize->add_setting( 'yuma_theme_options[sidebar_widget_bg_color]', array(
	'default'           => '#f6f6f7',
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'yuma_theme_options[sidebar_widget_bg_color]', array(
	'label'    => esc_html__( 'Sidebar Widget Background Color', 'yuma' ),
	'section'  => 'yuma_sidebar_widget_section',
) ) );

// sidebar widget title color control and setting
$wp_customize->add_setting( 'yuma_theme_options[sidebar_widget_title_color]', array(
	'default'           => '#0a0e14',
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'yuma_theme_options[sidebar_widget_title_color]', array(
	'label'    => esc_html__( 'Sidebar Widget Title Color', 'yuma' ),
	'section'  => 'yuma_sidebar_widget_section',
) ) );

// sidebar widget element color control and setting
$wp_customize->add_setting( 'yuma_theme_options[sidebar_widget_elements_color]', array(
	'default'           => '#555555',
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'yuma_theme_options[sidebar_widget_elements_color]', array(
	'label'    => esc_html__( 'Sidebar Widget Elements Color', 'yuma' ),
	'section'  => 'yuma_sidebar_widget_section',
) ) );

/**************************************************************************************************************/

// sidebar hr control and setting
$wp_customize->add_setting( 'yuma_theme_options[sidebar_hr_2]', array(
	'sanitize_callback' => 'wp_kses_post',
) );

$wp_customize->add_control( new Yuma_Horizontal_Line( $wp_customize, 'yuma_theme_options[sidebar_hr_2]', array(
	'section'           => 'yuma_sidebar_widget_section',
) ) );

// sidebar and off canvas label control and setting
$wp_customize->add_setting( 'yuma_theme_options[sidebar_offcanvas_label]', array(
	'default' => '',
	'transport' => 'postMessage',
	'sanitize_callback' => 'yuma_text_sanitization',
) );

$wp_customize->add_control( new Yuma_Simple_Notice_Custom_control( $wp_customize, 'yuma_theme_options[sidebar_offcanvas_label]', array(
	'label' => esc_html__( 'Off Canvas And Sidebar Settings', 'yuma' ),
	'section' => 'yuma_sidebar_widget_section',
) ) );

// sidebar widget title font size control and setting
$wp_customize->add_setting( 'yuma_theme_options[sidebar_widget_title_font_size]', array(
	'default' => yuma_theme_option('sidebar_widget_title_font_size'),
	'sanitize_callback' => 'absint'
) );

$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[sidebar_widget_title_font_size]', 
	array(
		'label' => esc_html__( 'Widget Title Font Size (px)', 'yuma' ),
		'section' => 'yuma_sidebar_widget_section',
		'input_attrs' => array(
			'min' => 10,
			'max' => 36,
			'step' => 1,
		),
	)
) );

// sidebar widget title font weight control and setting
$wp_customize->add_setting( 'yuma_theme_options[sidebar_widget_title_font_weight]', array(
	'default' => yuma_theme_option('sidebar_widget_title_font_weight'),
	'sanitize_callback' => 'absint'
) );

$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[sidebar_widget_title_font_weight]', 
	array(
		'label' => esc_html__( 'Widget Title Font Weight', 'yuma' ),
		'section' => 'yuma_sidebar_widget_section',
		'input_attrs' => array(
			'min' => 100,
			'max' => 900,
			'step' => 100,
		),
	)
) );

// sidebar widget font size control and setting
$wp_customize->add_setting( 'yuma_theme_options[sidebar_widget_font_size]', array(
	'default' => yuma_theme_option('sidebar_widget_font_size'),
	'sanitize_callback' => 'absint'
) );

$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[sidebar_widget_font_size]', 
	array(
		'label' => esc_html__( 'Widget Element Font Size (px)', 'yuma' ),
		'section' => 'yuma_sidebar_widget_section',
		'input_attrs' => array(
			'min' => 10,
			'max' => 24,
			'step' => 1,
		),
	)
) );

// sidebar padding size control and setting
$wp_customize->add_setting( 'yuma_theme_options[sidebar_widget_padding]', array(
	'default' => yuma_theme_option('sidebar_widget_padding'),
	'sanitize_callback' => 'absint'
) );

$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[sidebar_widget_padding]', 
	array(
		'label' => esc_html__( 'Widget Padding (px)', 'yuma' ),
		'section' => 'yuma_sidebar_widget_section',
		'input_attrs' => array(
			'min' => 10,
			'max' => 100,
			'step' => 1,
		),
	)
) );
