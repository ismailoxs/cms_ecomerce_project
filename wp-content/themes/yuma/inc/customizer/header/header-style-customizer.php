<?php
/**
 * Header Style Customizer Options
 *
 * @package yuma
 */

// Add header section
$wp_customize->add_section( 'yuma_header_style_section', array(
	'title'             => esc_html__( 'Main Header Style','yuma' ),
	'description'       => esc_html__( 'Main Header Layout and Elements Style Options','yuma' ),
	'panel'             => 'yuma_header_panel',
) );

// header width setting and control.
$wp_customize->add_setting( 'yuma_theme_options[header_width]',
	array(
		'default' => yuma_theme_option('header_width'),
		'sanitize_callback' => 'yuma_radio_sanitization'
	)
);

$wp_customize->add_control( new Yuma_Text_Radio_Button_Custom_Control( $wp_customize, 'yuma_theme_options[header_width]',
	array(
		'label' => esc_html__( 'Content Width', 'yuma' ),
		'section' => 'yuma_header_style_section',
		'choices' => array(
			'full-width' 		=> esc_html__( 'Full', 'yuma' ),
			'normal-width' 		=> esc_html__( 'Normal', 'yuma'  ),
			'container-width' 	=> esc_html__( 'Container', 'yuma'  ),
		),
	)
) );

// header position absolute enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[header_position_absolute]', array(
	'default'           => yuma_theme_option('header_position_absolute'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[header_position_absolute]', array(
	'label'             => esc_html__( 'Enable Absolute Position', 'yuma' ),
	'section'           => 'yuma_header_style_section',
) ) );

// header background color control and setting
$wp_customize->add_setting( 'yuma_theme_options[header_bg_color]', array(
	'default'           => 'rgba(255,255,255,1)',
	'sanitize_callback' => 'yuma_hex_rgba_sanitization', 
) );

$wp_customize->add_control( new Yuma_Customize_Alpha_Color_Control( $wp_customize, 'yuma_theme_options[header_bg_color]',
	array(
		'label'    => esc_html__( 'Background Color', 'yuma' ),
		'section' => 'yuma_header_style_section',
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

// header element color control and setting
$wp_customize->add_setting( 'yuma_theme_options[header_elements_color]', array(
	'default'           => '#0a0e14',
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'yuma_theme_options[header_elements_color]', array(
	'label'    => esc_html__( 'Elements Color', 'yuma' ),
	'section'  => 'yuma_header_style_section',
) ) );

// header sticky enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[header_sticky]', array(
	'default'           => yuma_theme_option('header_sticky'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[header_sticky]', array(
	'label'             => esc_html__( 'Enable Sticky Header', 'yuma' ),
	'section'           => 'yuma_header_style_section',
) ) );

// header sticky background color control and setting
$wp_customize->add_setting( 'yuma_theme_options[header_sticky_bg_color]', array(
	'default'           => 'rgba(255,255,255,1)',
	'sanitize_callback' => 'yuma_hex_rgba_sanitization', 
) );

$wp_customize->add_control( new Yuma_Customize_Alpha_Color_Control( $wp_customize, 'yuma_theme_options[header_sticky_bg_color]',
	array(
		'label'    => esc_html__( 'Sticky Header Background Color', 'yuma' ),
		'section' => 'yuma_header_style_section',
		'show_opacity' => true,
		'active_callback' => 'yuma_header_sticky_enable',
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

// header element color control and setting
$wp_customize->add_setting( 'yuma_theme_options[header_sticky_elements_color]', array(
	'default'           => '#0a0e14',
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'yuma_theme_options[header_sticky_elements_color]', array(
	'label'    => esc_html__( 'Sticky Header Elements Color', 'yuma' ),
	'section'  => 'yuma_header_style_section',
	'active_callback' => 'yuma_header_sticky_enable',
) ) );

// header video setting and control.
$wp_customize->add_setting( 'yuma_theme_options[header_bg_video]', array(
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'yuma_theme_options[header_bg_video]',
	array(
	'label'       		=> esc_html__( 'Header Video', 'yuma' ),
	'mime_type' 		=> 'video',
	'section'     		=> 'yuma_header_style_section',
) ) );

// header image setting and control.
$wp_customize->add_setting( 'yuma_theme_options[header_bg_image]', array(
	'sanitize_callback' => 'yuma_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'yuma_theme_options[header_bg_image]',
	array(
	'label'       		=> esc_html__( 'Header Image', 'yuma' ),
	'section'     		=> 'yuma_header_style_section',
) ) );

// header image size setting and control.
$wp_customize->add_setting( 'yuma_theme_options[header_bg_image_size]',
	array(
		'default' => yuma_theme_option('header_bg_image_size'),
		'sanitize_callback' => 'yuma_radio_sanitization'
	)
);

$wp_customize->add_control( new Yuma_Text_Radio_Button_Custom_Control( $wp_customize, 'yuma_theme_options[header_bg_image_size]',
	array(
		'label' => esc_html__( 'Background Image Size', 'yuma' ),
		'section' => 'yuma_header_style_section',
		'choices' => array(
			'cover' 	=> esc_html__( 'Cover', 'yuma' ),
			'contain' 	=> esc_html__( 'Contain', 'yuma'  )
		),
	)
) );

// header image background repeat enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[header_bg_image_repeat]', array(
	'default'           => yuma_theme_option('header_bg_image_repeat'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[header_bg_image_repeat]', array(
	'label'             => esc_html__( 'Background Image Repeat', 'yuma' ),
	'section'           => 'yuma_header_style_section',
) ) );

// header image background fixed enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[header_bg_image_fixed]', array(
	'default'           => yuma_theme_option('header_bg_image_fixed'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[header_bg_image_fixed]', array(
	'label'             => esc_html__( 'Fixed Background', 'yuma' ),
	'section'           => 'yuma_header_style_section',
) ) );

// header height top size control and setting
$wp_customize->add_setting( 'yuma_theme_options[header_height]', array(
	'default' => yuma_theme_option('header_height'),
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[header_height]', 
	array(
		'label' => esc_html__( 'Height (px)', 'yuma' ),
		'section' => 'yuma_header_style_section',
		'input_attrs' => array(
			'min' => 50,
			'max' => 1000,
			'step' => 5,
		),
	)
) );

// header margin size control and setting
$wp_customize->add_setting( 'yuma_theme_options[header_margin]', array(
	'default' => yuma_theme_option('header_margin'),
	'sanitize_callback' => 'absint'
) );

$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[header_margin]', 
	array(
		'label' => esc_html__( 'Margin Top (px)', 'yuma' ),
		'section' => 'yuma_header_style_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)
) );

// header font size control and setting
$wp_customize->add_setting( 'yuma_theme_options[header_font_size]', array(
	'default' => yuma_theme_option('header_font_size'),
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[header_font_size]', 
	array(
		'label' => esc_html__( 'Element Font Size (px)', 'yuma' ),
		'section' => 'yuma_header_style_section',
		'input_attrs' => array(
			'min' => 14,
			'max' => 24,
			'step' => 1,
		),
	)
) );

// header border bottom control and setting
$wp_customize->add_setting( 'yuma_theme_options[header_border_height]', array(
	'default' => yuma_theme_option('header_border_height'),
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[header_border_height]', 
	array(
		'label' => esc_html__( 'Border Bottom Height (px)', 'yuma' ),
		'section' => 'yuma_header_style_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 5,
			'step' => 1,
		),
	)
) );

// header border bottom color control and setting
$wp_customize->add_setting( 'yuma_theme_options[header_border_color]', array(
	'default'           => 'rgba(255,255,255,0.1)',
	'sanitize_callback' => 'yuma_hex_rgba_sanitization', 
) );

$wp_customize->add_control( new Yuma_Customize_Alpha_Color_Control( $wp_customize, 'yuma_theme_options[header_border_color]',
	array(
		'label'    => esc_html__( 'Border Bottom Color', 'yuma' ),
		'section' => 'yuma_header_style_section',
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

// header element area size control and setting
$wp_customize->add_setting( 'yuma_theme_options[header_area]', array(
	'default'          	=> yuma_theme_option('header_area'),
	'sanitize_callback' => 'yuma_sanitize_select',
) );

$wp_customize->add_control( 'yuma_theme_options[header_area]', array(
	'label'             => esc_html__( 'Element Area Size', 'yuma' ),
	'description'       => esc_html__( 'Left, Center and Right Area Size', 'yuma' ),
	'section'           => 'yuma_header_style_section',
	'type'				=> 'radio',
	'choices'			=> array( 
		'equal' 	=> esc_html__( 'Equal Size', 'yuma' ),
		'auto' 		=> esc_html__( 'Auto Size', 'yuma' ),
		'custom' 	=> esc_html__( 'Custom Size', 'yuma' ),
	),
) );

// header left area size control and setting
$wp_customize->add_setting( 'yuma_theme_options[header_left_area_size]', array(
	'default' => yuma_theme_option('header_left_area_size'),
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[header_left_area_size]', 
	array(
		'label' => esc_html__( 'Left Area Size (%)', 'yuma' ),
		'description' => esc_html__( 'Note: It will work only if the area is active.', 'yuma' ),
		'section' => 'yuma_header_style_section',
		'input_attrs' => array(
			'min' => 1,
			'max' => 100,
			'step' => 1,
		),
		'active_callback' => 'yuma_header_area_size_custom_enable',
	)
) );

// header center area size control and setting
$wp_customize->add_setting( 'yuma_theme_options[header_center_area_size]', array(
	'default' => yuma_theme_option('header_center_area_size'),
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[header_center_area_size]', 
	array(
		'label' => esc_html__( 'Center Area Size (%)', 'yuma' ),
		'description' => esc_html__( 'Note: It will work only if the area is active.', 'yuma' ),
		'section' => 'yuma_header_style_section',
		'input_attrs' => array(
			'min' => 1,
			'max' => 100,
			'step' => 1,
		),
		'active_callback' => 'yuma_header_area_size_custom_enable',
	)
) );

// header right area size control and setting
$wp_customize->add_setting( 'yuma_theme_options[header_right_area_size]', array(
	'default' => yuma_theme_option('header_right_area_size'),
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[header_right_area_size]', 
	array(
		'label' => esc_html__( 'Right Area Size (%)', 'yuma' ),
		'description' => esc_html__( 'Note: It will work only if the area is active.', 'yuma' ),
		'section' => 'yuma_header_style_section',
		'input_attrs' => array(
			'min' => 1,
			'max' => 100,
			'step' => 1,
		),
		'active_callback' => 'yuma_header_area_size_custom_enable',
	)
) );

