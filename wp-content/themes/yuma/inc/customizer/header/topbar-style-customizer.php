<?php
/**
 * Topbar Style Customizer Options
 *
 * @package yuma
 */

// Add topbar section
$wp_customize->add_section( 'yuma_topbar_style_section', array(
	'title'             => esc_html__( 'Topbar Style','yuma' ),
	'description'       => esc_html__( 'Topbar Layout and Elements Style Options','yuma' ),
	'panel'             => 'yuma_header_panel',
) );

// topbar full width enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[topbar_full_width]', array(
	'default'           => yuma_theme_option('topbar_full_width'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[topbar_full_width]', array(
	'label'             => esc_html__( 'Full Width Content', 'yuma' ),
	'section'           => 'yuma_topbar_style_section',
) ) );

// topbar position absolute enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[topbar_position_absolute]', array(
	'default'           => yuma_theme_option('topbar_position_absolute'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[topbar_position_absolute]', array(
	'label'             => esc_html__( 'Enable Absolute Position', 'yuma' ),
	'section'           => 'yuma_topbar_style_section',
) ) );

// topbar background color control and setting
$wp_customize->add_setting( 'yuma_theme_options[topbar_bg_color]', array(
	'default'           => 'rgba(16,23,31,1)',
	'sanitize_callback' => 'yuma_hex_rgba_sanitization', 
) );

$wp_customize->add_control( new Yuma_Customize_Alpha_Color_Control( $wp_customize, 'yuma_theme_options[topbar_bg_color]',
	array(
		'label'    => esc_html__( 'Background Color', 'yuma' ),
		'section' => 'yuma_topbar_style_section',
		'show_opacity' => true,
		'palette' => array(
			'#000',
			'#ffffff',
			'#df312c',
			'#df9a23',
			'#eef000',
			'#7ed934',
			'#1571c1',
			'#8309e7'
		),
	)
) );

// topbar element color control and setting
$wp_customize->add_setting( 'yuma_theme_options[topbar_elements_color]', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'yuma_theme_options[topbar_elements_color]', array(
	'label'    => esc_html__( 'Elements Color', 'yuma' ),
	'section'  => 'yuma_topbar_style_section',
) ) );

// topbar dropdown icon color control and setting
$wp_customize->add_setting( 'yuma_theme_options[topbar_dropdown_icon_color]', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'yuma_theme_options[topbar_dropdown_icon_color]', array(
	'label'    => esc_html__( 'Dropdown Icon Color', 'yuma' ),
	'description'    => esc_html__( 'Note: Visible in smaller screen', 'yuma' ),
	'section'  => 'yuma_topbar_style_section',
) ) );

// topbar image setting and control.
$wp_customize->add_setting( 'yuma_theme_options[topbar_bg_image]', array(
	'sanitize_callback' => 'yuma_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'yuma_theme_options[topbar_bg_image]',
	array(
	'label'       		=> esc_html__( 'Background Image', 'yuma' ),
	'section'     		=> 'yuma_topbar_style_section',
) ) );

// topbar height control and setting
$wp_customize->add_setting( 'yuma_theme_options[topbar_height]', array(
	'default' => yuma_theme_option('topbar_height'),
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[topbar_height]', 
	array(
		'label' => esc_html__( 'Height (px)', 'yuma' ),
		'section' => 'yuma_topbar_style_section',
		'input_attrs' => array(
			'min' => 20,
			'max' => 100,
			'step' => 1,
		),
	)
) );

// topbar font size control and setting
$wp_customize->add_setting( 'yuma_theme_options[topbar_font_size]', array(
	'default' => yuma_theme_option('topbar_font_size'),
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[topbar_font_size]', 
	array(
		'label' => esc_html__( 'Element Font Size (px)', 'yuma' ),
		'section' => 'yuma_topbar_style_section',
		'input_attrs' => array(
			'min' => 10,
			'max' => 20,
			'step' => 1,
		),
	)
) );

// topbar border bottom control and setting
$wp_customize->add_setting( 'yuma_theme_options[topbar_border_height]', array(
	'default' => yuma_theme_option('topbar_border_height'),
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[topbar_border_height]', 
	array(
		'label' => esc_html__( 'Border Bottom Height (px)', 'yuma' ),
		'section' => 'yuma_topbar_style_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 5,
			'step' => 1,
		),
	)
) );

// topbar border bottom color control and setting
$wp_customize->add_setting( 'yuma_theme_options[topbar_border_color]', array(
	'default'           => 'rgba(255,255,255,0.1)',
	'sanitize_callback' => 'yuma_hex_rgba_sanitization', 
) );

$wp_customize->add_control( new Yuma_Customize_Alpha_Color_Control( $wp_customize, 'yuma_theme_options[topbar_border_color]',
	array(
		'label'    => esc_html__( 'Border Bottom Color', 'yuma' ),
		'section' => 'yuma_topbar_style_section',
		'show_opacity' => true,
		'palette' => array(
			'#000',
			'#ffffff',
			'#df312c',
			'#df9a23',
			'#eef000',
			'#7ed934',
			'#1571c1',
			'#8309e7'
		),
	)
) );

// topbar element area size control and setting
$wp_customize->add_setting( 'yuma_theme_options[topbar_area]', array(
	'default'          	=> yuma_theme_option('topbar_area'),
	'sanitize_callback' => 'yuma_sanitize_select',
) );

$wp_customize->add_control( 'yuma_theme_options[topbar_area]', array(
	'label'             => esc_html__( 'Element Area Size', 'yuma' ),
	'description'       => esc_html__( 'Left, Center and Right Area Size', 'yuma' ),
	'section'           => 'yuma_topbar_style_section',
	'type'				=> 'radio',
	'choices'			=> array( 
		'equal' 	=> esc_html__( 'Equal Size', 'yuma' ),
		'auto' 		=> esc_html__( 'Auto Size', 'yuma' ),
		'custom' 	=> esc_html__( 'Custom Size', 'yuma' ),
	),
) );

// topbar left area size control and setting
$wp_customize->add_setting( 'yuma_theme_options[topbar_left_area_size]', array(
	'default' => yuma_theme_option('topbar_left_area_size'),
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[topbar_left_area_size]', 
	array(
		'label' => esc_html__( 'Left Area Size (%)', 'yuma' ),
		'description' => esc_html__( 'Note: It will work only if the area is active.', 'yuma' ),
		'section' => 'yuma_topbar_style_section',
		'input_attrs' => array(
			'min' => 1,
			'max' => 100,
			'step' => 1,
		),
		'active_callback' => 'yuma_topbar_area_size_custom_enable',
	)
) );

// topbar center area size control and setting
$wp_customize->add_setting( 'yuma_theme_options[topbar_center_area_size]', array(
	'default' => yuma_theme_option('topbar_center_area_size'),
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[topbar_center_area_size]', 
	array(
		'label' => esc_html__( 'Center Area Size (%)', 'yuma' ),
		'description' => esc_html__( 'Note: It will work only if the area is active.', 'yuma' ),
		'section' => 'yuma_topbar_style_section',
		'input_attrs' => array(
			'min' => 1,
			'max' => 100,
			'step' => 1,
		),
		'active_callback' => 'yuma_topbar_area_size_custom_enable',
	)
) );

// topbar right area size control and setting
$wp_customize->add_setting( 'yuma_theme_options[topbar_right_area_size]', array(
	'default' => yuma_theme_option('topbar_right_area_size'),
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[topbar_right_area_size]', 
	array(
		'label' => esc_html__( 'Right Area Size (%)', 'yuma' ),
		'description' => esc_html__( 'Note: It will work only if the area is active.', 'yuma' ),
		'section' => 'yuma_topbar_style_section',
		'input_attrs' => array(
			'min' => 1,
			'max' => 100,
			'step' => 1,
		),
		'active_callback' => 'yuma_topbar_area_size_custom_enable',
	)
) );
