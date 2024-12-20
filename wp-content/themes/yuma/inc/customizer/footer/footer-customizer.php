<?php
/**
 * Footer Customizer Options
 *
 * @package yuma
 */

// Add footer section
$wp_customize->add_section( 'yuma_footer_section', array(
	'title'             => esc_html__( 'Footer Site Info Elements','yuma' ),
	'description'       => sprintf( '%1$s <a class="menu_locations" href="#"> %2$s </a> %3$s', esc_html__( 'Note: To show Footer and Social menu,', 'yuma' ), esc_html__( 'Click Here', 'yuma' ), esc_html__( 'to create menu.', 'yuma' ) ),
	'panel'             => 'yuma_footer_panel',
) );

// footer enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_footer]', array(
	'default'           => yuma_theme_option('enable_footer'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_footer]', array(
	'label'             => esc_html__( 'Enable Site Footer', 'yuma' ),
	'section'           => 'yuma_footer_section',
) ) );

// Test of Text Radio Button Custom Control
$wp_customize->add_setting( 'yuma_theme_options[footer_element_location]', array(
	'transport' => 'postMessage',
	'sanitize_callback' => 'yuma_radio_sanitization',
) );

$wp_customize->add_control( new Yuma_Text_Radio_Button_Tab_Heading_Custom_Control( $wp_customize, 'yuma_theme_options[footer_element_location]',
	array(
		'section' => 'yuma_footer_section',
		'choices' => array(
			'footer_left_element' => esc_html__( 'L Area', 'yuma' ),
			'footer_center_element' => esc_html__( 'C Area', 'yuma' ),
			'footer_right_element' => esc_html__( 'R Area', 'yuma'  )
		),
	)
) );

// footer left elements setting and control.
$wp_customize->add_setting( 'yuma_theme_options[footer_left_element]', array(
	'default'			=> yuma_theme_option('footer_left_element'),
	'sanitize_callback' => 'yuma_text_sanitization',
) );

$wp_customize->add_control( new Yuma_Pill_Checkbox_Custom_Control( $wp_customize, 'yuma_theme_options[footer_left_element]', array(
		'label' => esc_html__( 'Left Side Elements', 'yuma' ),
		'description' => esc_html__( 'Check and sort the elements', 'yuma' ),
		'section' => 'yuma_footer_section',
		'input_attrs' => array(
			'sortable' => true,
			'fullwidth' => true,
		),
		'choices' => yuma_footer_elements_options(),
		'active_callback' => 'yuma_callback_false',
	)
) );

// footer center elements setting and control.
$wp_customize->add_setting( 'yuma_theme_options[footer_center_element]', array(
	'sanitize_callback' => 'yuma_text_sanitization',
) );

$wp_customize->add_control( new Yuma_Pill_Checkbox_Custom_Control( $wp_customize, 'yuma_theme_options[footer_center_element]', array(
		'label' => esc_html__( 'Center Elements', 'yuma' ),
		'description' => esc_html__( 'Check and sort the elements', 'yuma' ),
		'section' => 'yuma_footer_section',
		'input_attrs' => array(
			'sortable' => true,
			'fullwidth' => true,
		),
		'choices' => yuma_footer_elements_options(),
		'active_callback' => 'yuma_callback_false',
	)
) );
// footer right elements setting and control.
$wp_customize->add_setting( 'yuma_theme_options[footer_right_element]', array(
	'sanitize_callback' => 'yuma_text_sanitization',
) );
$wp_customize->add_control( new Yuma_Pill_Checkbox_Custom_Control( $wp_customize, 'yuma_theme_options[footer_right_element]', array(
		'label' => esc_html__( 'Right Side Elements', 'yuma' ),
		'description' => esc_html__( 'Check and sort the elements', 'yuma' ),
		'section' => 'yuma_footer_section',
		'input_attrs' => array(
			'sortable' => true,
			'fullwidth' => true,
		),
		'choices' => yuma_footer_elements_options(),
		'active_callback' => 'yuma_callback_false',
	)
) );

/***************************************************************************************/

// footer menu style enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_footer_menu_style]', array(
	'default'           => yuma_theme_option('enable_footer_menu_style'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_footer_menu_style]', array(
	'label'             => esc_html__( 'Enable Footer Menu Style', 'yuma' ),
	'section'           => 'yuma_footer_section',
	'active_callback'	=> 'yuma_footer_menu_enable',
) ) );

/***************************************************************************************/

// footer social menu style enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_footer_social_menu_style]', array(
	'default'           => yuma_theme_option('enable_footer_social_menu_style'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_footer_social_menu_style]', array(
	'label'             => esc_html__( 'Enable Social Menu Style', 'yuma' ),
	'section'           => 'yuma_footer_section',
	'active_callback'	=> 'yuma_footer_social_menu_enable',
) ) );

/***************************************************************************************/

// footer custom text control and setting
$wp_customize->add_setting( 'yuma_footer_custom_text', array(
	'default'           => yuma_theme_option('copyright_text'),
	'sanitize_callback' => 'wp_kses_post',
) );

$wp_customize->add_control( new Yuma_TinyMCE_Custom_control( $wp_customize, 'yuma_footer_custom_text', array(
	'label' 			=> esc_html__( 'Custom Text', 'yuma' ),
	'section' 			=> 'yuma_footer_section',
	'input_attrs' 		=> array(
		'toolbar1' 		=> 'bold italic link',
		'mediaButtons' 	=> true,
	),
	'active_callback'	=> 'yuma_footer_custom_text_enable',
) ) );
