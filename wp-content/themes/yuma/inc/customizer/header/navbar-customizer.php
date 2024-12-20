<?php
/**
 * Navbar Customizer Options
 *
 * @package yuma
 */

// Add navbar section
$wp_customize->add_section( 'yuma_navbar_section', array(
	'title'             => esc_html__( 'Navbar Elements','yuma' ),
	'description'       => sprintf( '%1$s <a class="menu_locations" href="#"> %2$s </a> %3$s', esc_html__( 'Note: To show Primary and Social menu,', 'yuma' ), esc_html__( 'Click Here', 'yuma' ), esc_html__( 'to create menu. Add Widgets in Off Canvas Widget area to get Off Canvas Bar work.', 'yuma' ) ),
	'panel'             => 'yuma_header_panel',
) );

// navbar enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_navbar]', array(
	'default'           => yuma_theme_option('enable_navbar'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_navbar]', array(
	'label'             => esc_html__( 'Enable Navbar', 'yuma' ),
	'section'           => 'yuma_navbar_section',
) ) );

// Test of Text Radio Button Custom Control
$wp_customize->add_setting( 'yuma_theme_options[navbar_element_location]', array(
	'transport' => 'postMessage',
	'sanitize_callback' => 'yuma_radio_sanitization',
) );

$wp_customize->add_control( new Yuma_Text_Radio_Button_Tab_Heading_Custom_Control( $wp_customize, 'yuma_theme_options[navbar_element_location]',
	array(
		'section' => 'yuma_navbar_section',
		'choices' => array(
			'navbar_left_element' => esc_html__( 'L Area', 'yuma' ),
			'navbar_center_element' => esc_html__( 'C Area', 'yuma' ),
			'navbar_right_element' => esc_html__( 'R Area', 'yuma'  )
		),
		'active_callback' => 'yuma_navbar_enable',
	)
) );

// navbar left elements setting and control.
$wp_customize->add_setting( 'yuma_theme_options[navbar_left_element]', array(
	'sanitize_callback' => 'yuma_text_sanitization',
) );

$wp_customize->add_control( new Yuma_Pill_Checkbox_Custom_Control( $wp_customize, 'yuma_theme_options[navbar_left_element]', array(
		'label' => esc_html__( 'Left Side Elements', 'yuma' ),
		'description' => esc_html__( 'Check and sort the elements', 'yuma' ),
		'section' => 'yuma_navbar_section',
		'input_attrs' => array(
			'sortable' => true,
			'fullwidth' => true,
		),
		'choices' => yuma_navbar_elements_options(),
		'active_callback' => 'yuma_callback_false',
	)
) );

// navbar center elements setting and control.
$wp_customize->add_setting( 'yuma_theme_options[navbar_center_element]', array(
	'sanitize_callback' => 'yuma_text_sanitization',
) );

$wp_customize->add_control( new Yuma_Pill_Checkbox_Custom_Control( $wp_customize, 'yuma_theme_options[navbar_center_element]', array(
		'label' => esc_html__( 'Center Elements', 'yuma' ),
		'description' => esc_html__( 'Check and sort the elements', 'yuma' ),
		'section' => 'yuma_navbar_section',
		'input_attrs' => array(
			'sortable' => true,
			'fullwidth' => true,
		),
		'choices' => yuma_navbar_elements_options(),
		'active_callback' => 'yuma_callback_false',
	)
) );
// navbar right elements setting and control.
$wp_customize->add_setting( 'yuma_theme_options[navbar_right_element]', array(
	'sanitize_callback' => 'yuma_text_sanitization',
) );
$wp_customize->add_control( new Yuma_Pill_Checkbox_Custom_Control( $wp_customize, 'yuma_theme_options[navbar_right_element]', array(
		'label' => esc_html__( 'Right Side Elements', 'yuma' ),
		'description' => esc_html__( 'Check and sort the elements', 'yuma' ),
		'section' => 'yuma_navbar_section',
		'input_attrs' => array(
			'sortable' => true,
			'fullwidth' => true,
		),
		'choices' => yuma_navbar_elements_options(),
		'active_callback' => 'yuma_callback_false',
	)
) );

/***************************************************************************************/

// navbar primary menu label control and setting
$wp_customize->add_setting( 'yuma_theme_options[navbar_primary_menu_label]', array(
	'default'			=> yuma_theme_option('navbar_primary_menu_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'yuma_theme_options[navbar_primary_menu_label]', array(
	'label'             => esc_html__( 'Primary Menu Label', 'yuma' ),
	'description'       => esc_html__( 'Visible in mobile devices.', 'yuma' ),
	'section'           => 'yuma_navbar_section',
	'type'				=> 'text',
	'active_callback'	=> 'yuma_navbar_primary_menu_enable',
) );

// navbar primary menu style enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_navbar_primary_menu_style]', array(
	'default'           => yuma_theme_option('enable_navbar_primary_menu_style'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_navbar_primary_menu_style]', array(
	'label'             => esc_html__( 'Enable Primary Menu Style', 'yuma' ),
	'section'           => 'yuma_navbar_section',
	'active_callback'	=> 'yuma_navbar_primary_menu_enable',
) ) );

/***************************************************************************************/

// navbar social menu style enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_navbar_social_menu_style]', array(
	'default'           => yuma_theme_option('enable_navbar_social_menu_style'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_navbar_social_menu_style]', array(
	'label'             => esc_html__( 'Enable Social Menu Style', 'yuma' ),
	'section'           => 'yuma_navbar_section',
	'active_callback'	=> 'yuma_navbar_social_menu_enable',
) ) );

/**************************************************************************/

// navbar off_canvas_bar style enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_navbar_off_canvas_bar_style]', array(
	'default'           => yuma_theme_option('enable_navbar_off_canvas_bar_style'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_navbar_off_canvas_bar_style]', array(
	'label'             => esc_html__( 'Enable Off Canvas Bar Style', 'yuma' ),
	'section'           => 'yuma_navbar_section',
	'active_callback'	=> 'yuma_navbar_off_canvas_bar_enable',
) ) );

/**************************************************************************/

// navbar search format control and setting
$wp_customize->add_setting( 'yuma_theme_options[navbar_search_format]', array(
	'default'          	=> yuma_theme_option('navbar_search_format'),
	'sanitize_callback' => 'yuma_sanitize_select',
) );

$wp_customize->add_control( 'yuma_theme_options[navbar_search_format]', array(
	'label'             => esc_html__( 'Search Format', 'yuma' ),
	'section'           => 'yuma_navbar_section',
	'type'				=> 'radio',
	'choices'			=> array( 
		'search-icon' 		=> esc_html__( 'Search Icon', 'yuma' ),
		'search-form' 		=> esc_html__( 'Search Form', 'yuma' ),
	),
	'active_callback'  	=> 'yuma_navbar_search_enable',
) );

// navbar search style enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_navbar_search_style]', array(
	'default'           => yuma_theme_option('enable_navbar_search_style'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_navbar_search_style]', array(
	'label'             => esc_html__( 'Enable Search Form Style', 'yuma' ),
	'section'           => 'yuma_navbar_section',
	'active_callback'	=> 'yuma_navbar_search_style_btn_enable',
) ) );
