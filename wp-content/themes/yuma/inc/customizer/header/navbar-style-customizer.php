<?php
/**
 * Navbar Style Customizer Options
 *
 * @package yuma
 */

// Add navbar section
$wp_customize->add_section( 'yuma_navbar_style_section', array(
	'title'             => esc_html__( 'Navbar Style','yuma' ),
	'description'       => esc_html__( 'Navbar Layout and Elements Style Options','yuma' ),
	'panel'             => 'yuma_header_panel',
) );

// navbar width setting and control.
$wp_customize->add_setting( 'yuma_theme_options[navbar_width]',
	array(
		'default' => yuma_theme_option('navbar_width'),
		'sanitize_callback' => 'yuma_radio_sanitization'
	)
);

$wp_customize->add_control( new Yuma_Text_Radio_Button_Custom_Control( $wp_customize, 'yuma_theme_options[navbar_width]',
	array(
		'label' => esc_html__( 'Content Width', 'yuma' ),
		'section' => 'yuma_navbar_style_section',
		'choices' => array(
			'full-width' 		=> esc_html__( 'Full', 'yuma' ),
			'normal-width' 		=> esc_html__( 'Normal', 'yuma'  ),
			'container-width' 	=> esc_html__( 'Container', 'yuma'  ),
		),
	)
) );

// navbar position absolute enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[navbar_position_absolute]', array(
	'default'           => yuma_theme_option('navbar_position_absolute'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[navbar_position_absolute]', array(
	'label'             => esc_html__( 'Enable Absolute Position', 'yuma' ),
	'section'           => 'yuma_navbar_style_section',
) ) );

// navbar background color control and setting
$wp_customize->add_setting( 'yuma_theme_options[navbar_bg_color]', array(
	'default'           => 'rgba(16,23,31,1)',
	'sanitize_callback' => 'yuma_hex_rgba_sanitization', 
) );

$wp_customize->add_control( new Yuma_Customize_Alpha_Color_Control( $wp_customize, 'yuma_theme_options[navbar_bg_color]',
	array(
		'label'    => esc_html__( 'Background Color', 'yuma' ),
		'section' => 'yuma_navbar_style_section',
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

// navbar element color control and setting
$wp_customize->add_setting( 'yuma_theme_options[navbar_elements_color]', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'yuma_theme_options[navbar_elements_color]', array(
	'label'    => esc_html__( 'Elements Color', 'yuma' ),
	'section'  => 'yuma_navbar_style_section',
) ) );

// navbar font size control and setting
$wp_customize->add_setting( 'yuma_theme_options[navbar_font_size]', array(
	'default' => yuma_theme_option('navbar_font_size'),
	'sanitize_callback' => 'absint'
) );


$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[navbar_font_size]', 
	array(
		'label' => esc_html__( 'Element Font Size (px)', 'yuma' ),
		'section' => 'yuma_navbar_style_section',
		'input_attrs' => array(
			'min' => 10,
			'max' => 20,
			'step' => 1,
		),
	)
) );

// navbar height control and setting
$wp_customize->add_setting( 'yuma_theme_options[navbar_height]', array(
	'default' => yuma_theme_option('navbar_height'),
	'sanitize_callback' => 'absint'
) );

$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[navbar_height]', 
	array(
		'label' => esc_html__( 'Height (px)', 'yuma' ),
		'section' => 'yuma_navbar_style_section',
		'input_attrs' => array(
			'min' => 20,
			'max' => 100,
			'step' => 1,
		),
	)
) );

// navbar margin size control and setting
$wp_customize->add_setting( 'yuma_theme_options[navbar_margin]', array(
	'default' => yuma_theme_option('navbar_margin'),
	'sanitize_callback' => 'absint'
) );

$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[navbar_margin]', 
	array(
		'label' => esc_html__( 'Margin Top (px)', 'yuma' ),
		'section' => 'yuma_navbar_style_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)
) );

// navbar border radius control and setting
$wp_customize->add_setting( 'yuma_theme_options[navbar_border_radius]', array(
	'default' => yuma_theme_option('navbar_border_radius'),
	'sanitize_callback' => 'absint'
) );

$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[navbar_border_radius]', 
	array(
		'label' => esc_html__( 'Border Radius (px)', 'yuma' ),
		'section' => 'yuma_navbar_style_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 100,
			'step' => 1,
		),
	)
) );

// navbar element area size control and setting
$wp_customize->add_setting( 'yuma_theme_options[navbar_area]', array(
	'default'          	=> yuma_theme_option('navbar_area'),
	'sanitize_callback' => 'yuma_sanitize_select',
) );

$wp_customize->add_control( 'yuma_theme_options[navbar_area]', array(
	'label'             => esc_html__( 'Element Area Size', 'yuma' ),
	'description'       => esc_html__( 'Left, Center and Right Area Size', 'yuma' ),
	'section'           => 'yuma_navbar_style_section',
	'type'				=> 'radio',
	'choices'			=> array( 
		'equal' 	=> esc_html__( 'Equal Size', 'yuma' ),
		'auto' 		=> esc_html__( 'Auto Size', 'yuma' ),
		'custom' 	=> esc_html__( 'Custom Size', 'yuma' ),
	),
) );

// navbar left area size control and setting
$wp_customize->add_setting( 'yuma_theme_options[navbar_left_area_size]', array(
	'default' => yuma_theme_option('navbar_left_area_size'),
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[navbar_left_area_size]', 
	array(
		'label' => esc_html__( 'Left Area Size (%)', 'yuma' ),
		'description' => esc_html__( 'Note: It will work only if the area is active.', 'yuma' ),
		'section' => 'yuma_navbar_style_section',
		'input_attrs' => array(
			'min' => 1,
			'max' => 100,
			'step' => 1,
		),
		'active_callback' => 'yuma_navbar_area_size_custom_enable',
	)
) );

// navbar center area size control and setting
$wp_customize->add_setting( 'yuma_theme_options[navbar_center_area_size]', array(
	'default' => yuma_theme_option('navbar_center_area_size'),
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[navbar_center_area_size]', 
	array(
		'label' => esc_html__( 'Center Area Size (%)', 'yuma' ),
		'description' => esc_html__( 'Note: It will work only if the area is active.', 'yuma' ),
		'section' => 'yuma_navbar_style_section',
		'input_attrs' => array(
			'min' => 1,
			'max' => 100,
			'step' => 1,
		),
		'active_callback' => 'yuma_navbar_area_size_custom_enable',
	)
) );

// navbar right area size control and setting
$wp_customize->add_setting( 'yuma_theme_options[navbar_right_area_size]', array(
	'default' => yuma_theme_option('navbar_right_area_size'),
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[navbar_right_area_size]', 
	array(
		'label' => esc_html__( 'Right Area Size (%)', 'yuma' ),
		'description' => esc_html__( 'Note: It will work only if the area is active.', 'yuma' ),
		'section' => 'yuma_navbar_style_section',
		'input_attrs' => array(
			'min' => 1,
			'max' => 100,
			'step' => 1,
		),
		'active_callback' => 'yuma_navbar_area_size_custom_enable',
	)
) );
