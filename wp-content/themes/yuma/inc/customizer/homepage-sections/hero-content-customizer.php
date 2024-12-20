<?php
/**
 * Hero Content Customizer Options
 *
 * @package yuma
 */

// Add hero_content section
$wp_customize->add_section( 'yuma_hero_content_section', array(
	'title'             => esc_html__( 'Hero Content Section','yuma' ),
	'description'       => esc_html__( 'Hero Content Setting Options', 'yuma' ),
	'panel'             => 'yuma_homepage_sections_panel',
) );

// hero_content menu enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_hero_content]', array(
	'default'           => yuma_theme_option('enable_hero_content'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_hero_content]', array(
	'label'             => esc_html__( 'Enable Hero Content', 'yuma' ),
	'section'           => 'yuma_hero_content_section',
	'on_off_label' 		=> yuma_show_options(),
) ) );

// hero_content parallax enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_hero_content_parallax]', array(
	'default'           => yuma_theme_option('enable_hero_content_parallax'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_hero_content_parallax]', array(
	'label'             => esc_html__( 'Enable Fixed Background', 'yuma' ),
	'section'           => 'yuma_hero_content_section',
	'on_off_label' 		=> yuma_show_options(),
	'active_callback'	=> 'yuma_hero_content_section_enable',
) ) );

// hero_content alignment control and setting
$wp_customize->add_setting( 'yuma_theme_options[hero_content_alignment]', array(
	'default'          	=> yuma_theme_option('hero_content_alignment'),
	'sanitize_callback' => 'yuma_radio_sanitization',
) );

$wp_customize->add_control( new Yuma_Text_Radio_Button_Custom_Control( $wp_customize, 'yuma_theme_options[hero_content_alignment]',
	array(
	'label'             => esc_html__( 'Content Alignment', 'yuma' ),
	'section'           => 'yuma_hero_content_section',
	'choices'			=> apply_filters( 'yuma_hero_content_alignment_options', array( 
		'align-left' 		=> esc_html__( 'Left', 'yuma' ),
		'align-center' 		=> esc_html__( 'Center', 'yuma' ),
	) ),
	'active_callback'	=> 'yuma_hero_content_section_enable',
) ) );

// hero_content width control and setting
$wp_customize->add_setting( 'yuma_theme_options[hero_content_width]', array(
	'default'          	=> yuma_theme_option('hero_content_width'),
	'sanitize_callback' => 'yuma_radio_sanitization',
) );

$wp_customize->add_control( new Yuma_Text_Radio_Button_Custom_Control( $wp_customize, 'yuma_theme_options[hero_content_width]',
	array(
	'label'             => esc_html__( 'Content Width', 'yuma' ),
	'section'           => 'yuma_hero_content_section',
	'choices'			=> apply_filters( 'yuma_hero_content_width_options', array( 
		'full' 			=> esc_html__( 'Full', 'yuma' ),
		'container' 	=> esc_html__( 'Container', 'yuma' ),
	) ),
	'active_callback'	=> 'yuma_hero_content_section_enable',
) ) );

// hero_content color control and setting
$wp_customize->add_setting( 'yuma_theme_options[hero_content_color]', array(
	'default'          	=> yuma_theme_option('hero_content_color'),
	'sanitize_callback' => 'yuma_radio_sanitization',
) );

$wp_customize->add_control( new Yuma_Text_Radio_Button_Custom_Control( $wp_customize, 'yuma_theme_options[hero_content_color]',
	array(
	'label'             => esc_html__( 'Color Mode', 'yuma' ),
	'section'           => 'yuma_hero_content_section',
	'choices'			=> apply_filters( 'yuma_hero_content_color_mode_options', array( 
		'light' 	=> esc_html__( 'Light', 'yuma' ),
		'dark' 		=> esc_html__( 'Dark', 'yuma' ),
	) ),
	'active_callback'	=> 'yuma_hero_content_section_enable',
) ) );

// hero_content overlay control and setting
$wp_customize->add_setting( 'yuma_theme_options[hero_content_overlay]', array(
	'default'           => 'rgba(0,0,0,0.8)',
	'sanitize_callback' => 'yuma_hex_rgba_sanitization', 
) );

$wp_customize->add_control( new Yuma_Customize_Alpha_Color_Control( $wp_customize, 'yuma_theme_options[hero_content_overlay]',
	array(
		'label'    => esc_html__( 'Image Overlay Color', 'yuma' ),
		'section' => 'yuma_hero_content_section',
		'show_opacity' => true,
		'active_callback'	=> 'yuma_hero_content_section_enable',
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

// hero_content content type control and setting
$wp_customize->add_setting( 'yuma_theme_options[hero_content_content_type]', array(
	'default'          	=> yuma_theme_option('hero_content_content_type'),
	'sanitize_callback' => 'yuma_sanitize_select',
) );

$wp_customize->add_control( 'yuma_theme_options[hero_content_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'yuma' ),
	'section'           => 'yuma_hero_content_section',
	'type'				=> 'select',
	'choices'			=> apply_filters( 'yuma_hero_content_content_type_options', array( 
		'page' 		=> esc_html__( 'Page', 'yuma' ),
	) ),
	'active_callback'	=> 'yuma_hero_content_section_enable',
) );

// hero_content title control and setting
$wp_customize->add_setting( 'yuma_theme_options[hero_content_sub_title]', array(
	'default'          	=> yuma_theme_option('hero_content_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'yuma_theme_options[hero_content_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'yuma' ),
	'section'           => 'yuma_hero_content_section',
	'type'				=> 'text',
	'active_callback'	=> 'yuma_hero_content_section_enable',
) );

// hero_content pages drop down chooser control and setting
$wp_customize->add_setting( 'yuma_theme_options[hero_content_content_page]', array(
	'sanitize_callback' => 'yuma_sanitize_page_post',
) );

$wp_customize->add_control( new Yuma_Dropdown_Chosen_Control( $wp_customize, 'yuma_theme_options[hero_content_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'yuma' ),
	'section'           => 'yuma_hero_content_section',
	'choices'			=> yuma_page_choices(),
	'active_callback'	=> 'yuma_hero_content_content_page_enable',
) ) );
