<?php
/**
 * Introduction Customizer Options
 *
 * @package yuma
 */

// Add introduction section
$wp_customize->add_section( 'yuma_introduction_section', array(
	'title'             => esc_html__( 'Introduction Section','yuma' ),
	'description'       => esc_html__( 'Introduction Setting Options', 'yuma' ),
	'panel'             => 'yuma_homepage_sections_panel',
) );

// introduction menu enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_introduction]', array(
	'default'           => yuma_theme_option('enable_introduction'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_introduction]', array(
	'label'             => esc_html__( 'Enable Introduction', 'yuma' ),
	'section'           => 'yuma_introduction_section',
	'on_off_label' 		=> yuma_show_options(),
) ) );

// introduction alignment control and setting
$wp_customize->add_setting( 'yuma_theme_options[introduction_alignment]', array(
	'default'          	=> yuma_theme_option('introduction_alignment'),
	'sanitize_callback' => 'yuma_radio_sanitization',
) );

$wp_customize->add_control( new Yuma_Text_Radio_Button_Custom_Control( $wp_customize, 'yuma_theme_options[introduction_alignment]',
	array(
	'label'             => esc_html__( 'Image Alignment', 'yuma' ),
	'section'           => 'yuma_introduction_section',
	'choices'			=> apply_filters( 'yuma_introduction_alignment_options', array( 
		'left-align' 	=> esc_html__( 'Left', 'yuma' ),
		'center-align' 	=> esc_html__( 'Center', 'yuma' ),
		'right-align' 	=> esc_html__( 'Right', 'yuma' ),
	) ),
	'active_callback'	=> 'yuma_introduction_section_enable',
) ) );

// introduction alignment control and setting
$wp_customize->add_setting( 'yuma_theme_options[introduction_excerpt]', array(
	'default'          	=> yuma_theme_option('introduction_excerpt'),
	'sanitize_callback' => 'yuma_radio_sanitization',
) );

$wp_customize->add_control( new Yuma_Text_Radio_Button_Custom_Control( $wp_customize, 'yuma_theme_options[introduction_excerpt]',
	array(
	'label'             => esc_html__( 'Content Length', 'yuma' ),
	'section'           => 'yuma_introduction_section',
	'choices'			=> apply_filters( 'yuma_introduction_excerpt_options', array( 
		'excerpt' 		=> esc_html__( 'Excerpt', 'yuma' ),
		'none' 			=> esc_html__( 'None', 'yuma' ),
	) ),
	'active_callback'	=> 'yuma_introduction_section_enable',
) ) );

// introduction content type control and setting
$wp_customize->add_setting( 'yuma_theme_options[introduction_content_type]', array(
	'default'          	=> yuma_theme_option('introduction_content_type'),
	'sanitize_callback' => 'yuma_sanitize_select',
) );

$wp_customize->add_control( 'yuma_theme_options[introduction_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'yuma' ),
	'section'           => 'yuma_introduction_section',
	'type'				=> 'select',
	'choices'			=> apply_filters( 'yuma_introduction_content_type_options', array( 
		'page' 		=> esc_html__( 'Page', 'yuma' ),
	) ),
	'active_callback'	=> 'yuma_introduction_section_enable',
) );

// introduction pages drop down chooser control and setting
$wp_customize->add_setting( 'yuma_theme_options[introduction_content_page]', array(
	'sanitize_callback' => 'yuma_sanitize_page_post',
) );

$wp_customize->add_control( new Yuma_Dropdown_Chosen_Control( $wp_customize, 'yuma_theme_options[introduction_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'yuma' ),
	'section'           => 'yuma_introduction_section',
	'choices'			=> yuma_page_choices(),
	'active_callback'	=> 'yuma_introduction_content_page_enable',
) ) );

// introduction readmore label drop down chooser control and setting
$wp_customize->add_setting( 'yuma_theme_options[introduction_readmore_label]', array(
	'default'          	=> yuma_theme_option('introduction_readmore_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'yuma_theme_options[introduction_readmore_label]', array(
	'label'             => esc_html__( 'Readmore Label', 'yuma' ),
	'section'           => 'yuma_introduction_section',
	'type'				=> 'text',
	'active_callback'	=> 'yuma_introduction_section_enable',
) );