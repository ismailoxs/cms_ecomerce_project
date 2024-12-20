<?php
/**
 * Site Layout Customizer Options
 *
 * @package yuma
 */

// Add Site Layout section
$wp_customize->add_section( 'yuma_site_layout_section', array(
	'title'             => esc_html__( 'Site Background And Layout','yuma' ),
	'description'       => esc_html__( 'Site Background and Layout Setting Options', 'yuma' ),
	'capability'     	=> 'edit_theme_options',
	'priority'  		=> 100,
) );

// site layout setting and control.
$wp_customize->add_setting( 'yuma_theme_options[site_layout]', array(
	'sanitize_callback'   => 'yuma_sanitize_select',
	'default'             => yuma_theme_option('site_layout'),
) );

$wp_customize->add_control(  new Yuma_Radio_Image_Control( $wp_customize, 'yuma_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'yuma' ),
	'section'             => 'yuma_site_layout_section',
	'choices'			  => yuma_site_layout(),
) ) );

// site background color control and setting
$wp_customize->add_setting( 'yuma_theme_options[site_bg_color]', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'yuma_theme_options[site_bg_color]', array(
	'label'    => esc_html__( 'Background Color', 'yuma' ),
	'section'  => 'yuma_site_layout_section',
) ) );

// site background image setting and control.
$wp_customize->add_setting( 'yuma_theme_options[site_bg_image]', array(
	'sanitize_callback' => 'yuma_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'yuma_theme_options[site_bg_image]',
	array(
	'label'		=> esc_html__( 'Background Image', 'yuma' ),
	'section'  	=> 'yuma_site_layout_section',
) ) );

// site bg repeat enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_site_bg_repeat]', array(
	'default'           => yuma_theme_option('enable_site_bg_repeat'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_site_bg_repeat]', array(
	'label'             => esc_html__( 'Background Image Repeat', 'yuma' ),
	'section'  			=> 'yuma_site_layout_section',
	'active_callback'	=> 'yuma_site_layout_bg_image_enable',
	'on_off_label' 		=> yuma_show_options(),
) ) );

// site bg size cover enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_site_bg_size_cover]', array(
	'default'           => yuma_theme_option('enable_site_bg_size_cover'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_site_bg_size_cover]', array(
	'label'             => esc_html__( 'Background Image Cover Size', 'yuma' ),
	'section'  			=> 'yuma_site_layout_section',
	'active_callback'	=> 'yuma_site_layout_bg_image_enable',
	'on_off_label' 		=> yuma_show_options(),
) ) );

// site bg fixed enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_site_bg_fixed]', array(
	'default'           => yuma_theme_option('enable_site_bg_fixed'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_site_bg_fixed]', array(
	'label'             => esc_html__( 'Background Image Fixed', 'yuma' ),
	'section'  			=> 'yuma_site_layout_section',
	'active_callback'	=> 'yuma_site_layout_bg_image_enable',
	'on_off_label' 		=> yuma_show_options(),
) ) );

/******************************************************************************************************/

// site frame hr control and setting
$wp_customize->add_setting( 'yuma_theme_options[site_frame_bg_hr]', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Yuma_Horizontal_Line( $wp_customize, 'yuma_theme_options[site_frame_bg_hr]', array(
	'section'           => 'yuma_site_layout_section',
	'active_callback'	=> 'yuma_site_layout_bg_design_enable',
) ) );

// site frame background color control and setting
$wp_customize->add_setting( 'yuma_theme_options[site_frame_bg_color]', array(
	'default'           => '#eeeeee',
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'yuma_theme_options[site_frame_bg_color]', array(
	'label'    => esc_html__( 'Frame Color', 'yuma' ),
	'section'  => 'yuma_site_layout_section',
	'active_callback'	=> 'yuma_site_layout_bg_design_enable',
) ) );

// site frame background image setting and control.
$wp_customize->add_setting( 'yuma_theme_options[site_frame_bg_image]', array(
	'sanitize_callback' => 'yuma_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'yuma_theme_options[site_frame_bg_image]',
	array(
	'label'		=> esc_html__( 'Frame Image', 'yuma' ),
	'section'  	=> 'yuma_site_layout_section',
	'active_callback'	=> 'yuma_site_layout_bg_design_enable',
) ) );

// site bg repeat enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_site_frame_bg_repeat]', array(
	'default'           => yuma_theme_option('enable_site_frame_bg_repeat'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_site_frame_bg_repeat]', array(
	'label'             => esc_html__( 'Frame Image Repeat', 'yuma' ),
	'section'  			=> 'yuma_site_layout_section',
	'active_callback'	=> 'yuma_site_layout_frame_bg_image_enable',
	'on_off_label' 		=> yuma_show_options(),
) ) );

// site bg size cover enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_site_frame_bg_size_cover]', array(
	'default'           => yuma_theme_option('enable_site_frame_bg_size_cover'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_site_frame_bg_size_cover]', array(
	'label'             => esc_html__( 'Frame Image Cover Size', 'yuma' ),
	'section'  			=> 'yuma_site_layout_section',
	'active_callback'	=> 'yuma_site_layout_frame_bg_image_enable',
	'on_off_label' 		=> yuma_show_options(),
) ) );

// site bg fixed enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_site_frame_bg_fixed]', array(
	'default'           => yuma_theme_option('enable_site_frame_bg_fixed'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_site_frame_bg_fixed]', array(
	'label'             => esc_html__( 'Frame Image Fixed', 'yuma' ),
	'section'  			=> 'yuma_site_layout_section',
	'active_callback'	=> 'yuma_site_layout_frame_bg_image_enable',
	'on_off_label' 		=> yuma_show_options(),
) ) );
