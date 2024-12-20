<?php
/**
 * Mouse Cursor Customizer Options
 *
 * @package yuma
 */

// Add Mouse Cursor section
$wp_customize->add_section( 'yuma_cursor_section', array(
	'title'             => esc_html__( 'Mouse Cursor','yuma' ),
	'description'       => esc_html__( 'Mouse Cursor Setting Options', 'yuma' ),
	'capability'     	=> 'edit_theme_options',
	'priority'  		=> 100,
) );

// cursor layout setting and control.
$wp_customize->add_setting( 'yuma_theme_options[cursor_type]', array(
	'sanitize_callback'   => 'yuma_radio_sanitization',
	'default'             => yuma_theme_option('cursor_type'),
) );

$wp_customize->add_control(  new Yuma_Text_Radio_Button_Custom_Control( $wp_customize, 'yuma_theme_options[cursor_type]', array(
	'label'              	 => esc_html__( 'Mouse Cursor Type', 'yuma' ),
	'section'             	=> 'yuma_cursor_section',
	'choices'			  	=> apply_filters( 'yuma_cursor_options', array(
		'default'	=> esc_html__( 'Default', 'yuma' ),
	) ),
) ) );
