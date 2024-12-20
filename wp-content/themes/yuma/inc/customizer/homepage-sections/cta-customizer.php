<?php
/**
 * Call to Action Customizer Options
 *
 * @package yuma
 */

// Add cta section
$wp_customize->add_section( 'yuma_cta_section', array(
	'title'             => esc_html__( 'Call to Action Section','yuma' ),
	'description'       => esc_html__( 'Call to Action Setting Options', 'yuma' ),
	'panel'             => 'yuma_homepage_sections_panel',
) );

// cta menu enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_cta]', array(
	'default'           => yuma_theme_option('enable_cta'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_cta]', array(
	'label'             => esc_html__( 'Enable Call to Action', 'yuma' ),
	'section'           => 'yuma_cta_section',
	'on_off_label' 		=> yuma_show_options(),
) ) );

// cta parallax enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_cta_parallax]', array(
	'default'           => yuma_theme_option('enable_cta_parallax'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_cta_parallax]', array(
	'label'             => esc_html__( 'Enable Fixed Background', 'yuma' ),
	'section'           => 'yuma_cta_section',
	'on_off_label' 		=> yuma_show_options(),
	'active_callback'	=> 'yuma_cta_section_enable',
) ) );

// cta overlay control and setting
$wp_customize->add_setting( 'yuma_theme_options[cta_overlay]', array(
	'default'           => 'rgba(0,0,0,0.5)',
	'sanitize_callback' => 'yuma_hex_rgba_sanitization', 
) );

$wp_customize->add_control( new Yuma_Customize_Alpha_Color_Control( $wp_customize, 'yuma_theme_options[cta_overlay]',
	array(
		'label'    => esc_html__( 'Image Overlay Color', 'yuma' ),
		'section' => 'yuma_cta_section',
		'show_opacity' => true,
		'active_callback'	=> 'yuma_cta_section_enable',
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

// cta trasnition control and setting
$wp_customize->add_setting( 'yuma_theme_options[cta_width]', array(
	'default'          	=> yuma_theme_option('cta_width'),
	'sanitize_callback' => 'yuma_radio_sanitization',
) );

$wp_customize->add_control( new Yuma_Text_Radio_Button_Custom_Control( $wp_customize, 'yuma_theme_options[cta_width]',
	array(
	'label'             => esc_html__( 'Content Width', 'yuma' ),
	'section'           => 'yuma_cta_section',
	'choices'			=> apply_filters( 'yuma_cta_content_width_options', array( 
		'full-width' 		=> esc_html__( 'Full', 'yuma' ),
		'container-width' 	=> esc_html__( 'Container', 'yuma' ),
	) ),
	'active_callback'	=> 'yuma_cta_section_enable',
) ) );

// cta content type control and setting
$wp_customize->add_setting( 'yuma_theme_options[cta_content_type]', array(
	'default'          	=> yuma_theme_option('cta_content_type'),
	'sanitize_callback' => 'yuma_sanitize_select',
) );

$wp_customize->add_control( 'yuma_theme_options[cta_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'yuma' ),
	'section'           => 'yuma_cta_section',
	'type'				=> 'select',
	'choices'			=> apply_filters( 'yuma_cta_content_type_options', array( 
		'page' 		=> esc_html__( 'Page', 'yuma' ),
	) ),
	'active_callback'	=> 'yuma_cta_section_enable',
) );

// cta pages drop down chooser control and setting
$wp_customize->add_setting( 'yuma_theme_options[cta_content_page]', array(
	'sanitize_callback' => 'yuma_sanitize_page_post',
) );

$wp_customize->add_control( new Yuma_Dropdown_Chosen_Control( $wp_customize, 'yuma_theme_options[cta_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'yuma' ),
	'section'           => 'yuma_cta_section',
	'choices'			=> yuma_page_choices(),
	'active_callback'	=> 'yuma_cta_content_page_enable',
) ) );

// cta btn label drop down chooser control and setting
$wp_customize->add_setting( 'yuma_theme_options[cta_btn_label]', array(
	'default'           => yuma_theme_option('cta_btn_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'yuma_theme_options[cta_btn_label]', array(
	'label'             => esc_html__( 'Button Label', 'yuma' ),
	'section'           => 'yuma_cta_section',
	'type'				=> 'text',
	'active_callback'	=> 'yuma_cta_section_enable',
) );