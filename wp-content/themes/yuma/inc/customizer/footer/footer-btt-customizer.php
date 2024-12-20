<?php
/**
 * Back to top Style Customizer Options
 *
 * @package yuma
 */

// Add btt section
$wp_customize->add_section( 'yuma_footer_btt_section', array(
	'title'             => esc_html__( 'Back to Top Style','yuma' ),
	'description'       => esc_html__( 'Back to Top Button Style Options','yuma' ),
	'panel'             => 'yuma_footer_panel',
) );

// btt enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_btt]', array(
	'default'           => yuma_theme_option('enable_btt'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_btt]', array(
	'label'             => esc_html__( 'Enable Back To Top', 'yuma' ),
	'section'           => 'yuma_footer_btt_section',
	'on_off_label' 		=> yuma_show_options(),
) ) );

// btt width setting and control.
$wp_customize->add_setting( 'yuma_theme_options[btt_align]',
	array(
		'default' => yuma_theme_option('btt_align'),
		'sanitize_callback' => 'yuma_radio_sanitization'
	)
);

$wp_customize->add_control( new Yuma_Text_Radio_Button_Custom_Control( $wp_customize, 'yuma_theme_options[btt_align]',
	array(
		'label' => esc_html__( 'Alignment', 'yuma' ),
		'section' => 'yuma_footer_btt_section',
		'active_callback'	=> 'yuma_btt_enable',
		'choices' => array(
			'left' 		=> esc_html__( 'Left', 'yuma'  ),
			'right' 	=> esc_html__( 'Right', 'yuma' ),
		),
	)
) );

// btt additional image setting and control.
$wp_customize->add_setting( 'yuma_theme_options[btt_icon_image]', array(
	'sanitize_callback' => 'yuma_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'yuma_theme_options[btt_icon_image]',
	array(
	'label'       		=> esc_html__( 'Select Icon Image', 'yuma' ),
	'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'yuma' ), 20, 20 ),
	'section'     		=> 'yuma_footer_btt_section',
	'active_callback'	=> 'yuma_btt_enable',
) ) );

// btt label drop down chooser control and setting
$wp_customize->add_setting( 'yuma_theme_options[btt_label]', array(
	'default'          	=> yuma_theme_option('btt_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'yuma_theme_options[btt_label]', array(
	'label'             => esc_html__( 'Back to Top Label', 'yuma' ),
	'section'           => 'yuma_footer_btt_section',
	'type'				=> 'text',
	'active_callback'	=> 'yuma_btt_enable',
) );

// btt background color control and setting
$wp_customize->add_setting( 'yuma_theme_options[btt_bg_color]', array(
	'default'           => 'rgba(16,23,31,1)',
	'sanitize_callback' => 'yuma_hex_rgba_sanitization', 
) );

$wp_customize->add_control( new Yuma_Customize_Alpha_Color_Control( $wp_customize, 'yuma_theme_options[btt_bg_color]',
	array(
		'label'    => esc_html__( 'Background Color', 'yuma' ),
		'section' => 'yuma_footer_btt_section',
		'show_opacity' => true,
		'active_callback'	=> 'yuma_btt_enable',
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

// btt background color control and setting
$wp_customize->add_setting( 'yuma_theme_options[btt_bg_hover_color]', array(
	'default'           => 'rgba(235,165,76,1)',
	'sanitize_callback' => 'yuma_hex_rgba_sanitization', 
) );

$wp_customize->add_control( new Yuma_Customize_Alpha_Color_Control( $wp_customize, 'yuma_theme_options[btt_bg_hover_color]',
	array(
		'label'    => esc_html__( 'Background Color:Hover', 'yuma' ),
		'section' => 'yuma_footer_btt_section',
		'show_opacity' => true,
		'active_callback'	=> 'yuma_btt_enable',
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

// btt element color control and setting
$wp_customize->add_setting( 'yuma_theme_options[btt_elements_color]', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'yuma_theme_options[btt_elements_color]', array(
	'label'    => esc_html__( 'Label Color', 'yuma' ),
	'section'  => 'yuma_footer_btt_section',
	'active_callback'	=> 'yuma_btt_enable',
) ) );

// btt element hover color control and setting
$wp_customize->add_setting( 'yuma_theme_options[btt_elements_hover_color]', array(
	'default'           => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'yuma_theme_options[btt_elements_hover_color]', array(
	'label'    => esc_html__( 'Label Color:Hover', 'yuma' ),
	'section'  => 'yuma_footer_btt_section',
	'active_callback'	=> 'yuma_btt_enable',
) ) );

// btt font size control and setting
$wp_customize->add_setting( 'yuma_theme_options[btt_font_size]', array(
	'default' => yuma_theme_option('btt_font_size'),
	'sanitize_callback' => 'absint'
) );


$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[btt_font_size]', 
	array(
		'label' => esc_html__( 'Label Font Size (px)', 'yuma' ),
		'section' => 'yuma_footer_btt_section',
		'input_attrs' => array(
			'min' => 10,
			'max' => 36,
			'step' => 1,
		),
		'active_callback'	=> 'yuma_btt_enable',
	)
) );

// btt padding size control and setting
$wp_customize->add_setting( 'yuma_theme_options[btt_image_width]', array(
	'default' => yuma_theme_option('btt_image_width'),
	'sanitize_callback' => 'absint'
) );

$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[btt_image_width]', 
	array(
		'label' => esc_html__( 'Image Width (px)', 'yuma' ),
		'section' => 'yuma_footer_btt_section',
		'input_attrs' => array(
			'min' => 1,
			'max' => 100,
			'step' => 1,
		),
		'active_callback'	=> 'yuma_btt_enable',
	)
) );

// btt padding size control and setting
$wp_customize->add_setting( 'yuma_theme_options[btt_padding]', array(
	'default' => yuma_theme_option('btt_padding'),
	'sanitize_callback' => 'absint'
) );

$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[btt_padding]', 
	array(
		'label' => esc_html__( 'Padding (px)', 'yuma' ),
		'section' => 'yuma_footer_btt_section',
		'input_attrs' => array(
			'min' => 1,
			'max' => 50,
			'step' => 1,
		),
		'active_callback'	=> 'yuma_btt_enable',
	)
) );

// btt border radius control and setting
$wp_customize->add_setting( 'yuma_theme_options[btt_border_radius]', array(
	'default' => yuma_theme_option('btt_border_radius'),
	'sanitize_callback' => 'absint'
) );

$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[btt_border_radius]', 
	array(
		'label' => esc_html__( 'Border Radius (px)', 'yuma' ),
		'section' => 'yuma_footer_btt_section',
		'input_attrs' => array(
			'min' => 1,
			'max' => 100,
			'step' => 1,
		),
		'active_callback'	=> 'yuma_btt_enable',
	)
) );
