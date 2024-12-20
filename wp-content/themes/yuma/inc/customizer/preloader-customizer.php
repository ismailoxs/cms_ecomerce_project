<?php
/**
 * Pre Loader Customizer Options
 *
 * @package yuma
 */

// Add Pre Loader section
$wp_customize->add_section( 'yuma_preloader_section', array(
	'title'             => esc_html__( 'Pre Loader','yuma' ),
	'description'       => esc_html__( 'Pre Loader Setting Options', 'yuma' ),
	'capability'     	=> 'edit_theme_options',
	'priority'  		=> 100,
) );

// preloader enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_preloader]', array(
	'default'           => yuma_theme_option('enable_preloader'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_preloader]', array(
	'label'             => esc_html__( 'Enable Pre Loader', 'yuma' ),
	'section'  			=> 'yuma_preloader_section',
	'on_off_label' 		=> yuma_show_options(),
) ) );

// preloader background color control and setting
$wp_customize->add_setting( 'yuma_theme_options[preloader_bg_color]', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'yuma_theme_options[preloader_bg_color]', array(
	'label'    => esc_html__( 'Pre Loader Background Color', 'yuma' ),
	'section'  => 'yuma_preloader_section',
	'active_callback'	=> 'yuma_preloader_enable',
) ) );

// preloader layout setting and control.
$wp_customize->add_setting( 'yuma_theme_options[preloader_layout]', array(
	'sanitize_callback'   => 'yuma_radio_sanitization',
	'default'             => yuma_theme_option('preloader_layout'),
) );

$wp_customize->add_control(  new Yuma_Text_Radio_Button_Custom_Control( $wp_customize, 'yuma_theme_options[preloader_layout]', array(
	'label'              	 => esc_html__( 'Pre Loader', 'yuma' ),
	'section'             	=> 'yuma_preloader_section',
	'active_callback'		=> 'yuma_preloader_enable',
	'choices'			  	=> array(
		'default'	=> esc_html__( 'Default', 'yuma' ),
		'image'		=> esc_html__( 'Custom Image', 'yuma' ),
	),
) ) );

// loader type control and setting
$wp_customize->add_setting( 'yuma_theme_options[preloader_icon]', array(
	'default'          	=> yuma_theme_option('preloader_icon'),
	'sanitize_callback' => 'yuma_sanitize_select',
) );

$wp_customize->add_control( 'yuma_theme_options[preloader_icon]', array(
	'label'             => esc_html__( 'Select Icon', 'yuma' ),
	'section'           => 'yuma_preloader_section',
	'type'				=> 'select',
	'choices'			=> yuma_get_spinner_list(),
	'active_callback'		=> 'yuma_preloader_default_enable',
) );

// preloader background color control and setting
$wp_customize->add_setting( 'yuma_theme_options[preloader_icon_color]', array(
	'default'           => '#0a0e14',
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'yuma_theme_options[preloader_icon_color]', array(
	'label'    => esc_html__( 'Icon Color', 'yuma' ),
	'section'  => 'yuma_preloader_section',
	'active_callback'	=> 'yuma_preloader_default_enable',
) ) );

// preloader background image setting and control.
$wp_customize->add_setting( 'yuma_theme_options[preloader_image]', array(
	'sanitize_callback' => 'yuma_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'yuma_theme_options[preloader_image]',
	array(
	'label'			=> esc_html__( 'Preloader Image', 'yuma' ),
	'description'	=> esc_html__( 'Note: Transparent Gif Image Recommended.', 'yuma' ),
	'section'  		=> 'yuma_preloader_section',
	'active_callback'	=> 'yuma_preloader_image_enable',
) ) );

// preloader image size control and setting
$wp_customize->add_setting( 'yuma_theme_options[preloader_image_size]', array(
	'default' => yuma_theme_option('preloader_image_size'),
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[preloader_image_size]', 
	array(
		'label' => esc_html__( 'Max Image Width (px)', 'yuma' ),
		'section' => 'yuma_preloader_section',
		'input_attrs' => array(
			'min' => 50,
			'max' => 800,
			'step' => 1,
		),
		'active_callback' => 'yuma_preloader_image_enable',
	)
) );

