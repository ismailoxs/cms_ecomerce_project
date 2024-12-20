<?php
/**
 * Topbar Customizer Options
 *
 * @package yuma
 */

// Add topbar section
$wp_customize->add_section( 'yuma_topbar_section', array(
	'title'             => esc_html__( 'Topbar Elements','yuma' ),
	'description'       => sprintf( '%1$s <a class="menu_locations" href="#"> %2$s </a> %3$s', esc_html__( 'Note: To show Topbar and Social menu,', 'yuma' ), esc_html__( 'Click Here', 'yuma' ), esc_html__( 'to create menu. Add Widgets in Off Canvas Widget area to get Off Canvas Bar work. Install and Activate WooCommerce to get WooCommerce Cart work.', 'yuma' ) ),
	'panel'             => 'yuma_header_panel',
) );

// topbar enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_topbar]', array(
	'default'           => yuma_theme_option('enable_topbar'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_topbar]', array(
	'label'             => esc_html__( 'Enable Topbar', 'yuma' ),
	'section'           => 'yuma_topbar_section',
) ) );

// Test of Text Radio Button Custom Control
$wp_customize->add_setting( 'yuma_theme_options[topbar_element_location]', array(
	'transport' => 'postMessage',
	'sanitize_callback' => 'yuma_radio_sanitization',
) );

$wp_customize->add_control( new Yuma_Text_Radio_Button_Tab_Heading_Custom_Control( $wp_customize, 'yuma_theme_options[topbar_element_location]',
	array(
		'section' => 'yuma_topbar_section',
		'choices' => array(
			'topbar_left_element' => esc_html__( 'L Area', 'yuma' ),
			'topbar_center_element' => esc_html__( 'C Area', 'yuma' ),
			'topbar_right_element' => esc_html__( 'R Area', 'yuma'  )
		),
		'active_callback' => 'yuma_topbar_enable',
	)
) );

// topbar left elements setting and control.
$wp_customize->add_setting( 'yuma_theme_options[topbar_left_element]', array(
	'sanitize_callback' => 'yuma_text_sanitization',
) );

$wp_customize->add_control( new Yuma_Pill_Checkbox_Custom_Control( $wp_customize, 'yuma_theme_options[topbar_left_element]', array(
		'label' => esc_html__( 'Left Area Elements', 'yuma' ),
		'description' => esc_html__( 'Check and sort the elements', 'yuma' ),
		'section' => 'yuma_topbar_section',
		'input_attrs' => array(
			'sortable' => true,
			'fullwidth' => true,
		),
		'choices' => yuma_topbar_elements_options(),
		'active_callback' => 'yuma_callback_false',
	)
) );

// topbar center elements setting and control.
$wp_customize->add_setting( 'yuma_theme_options[topbar_center_element]', array(
	'sanitize_callback' => 'yuma_text_sanitization',
) );

$wp_customize->add_control( new Yuma_Pill_Checkbox_Custom_Control( $wp_customize, 'yuma_theme_options[topbar_center_element]', array(
		'label' => esc_html__( 'Center Area Elements', 'yuma' ),
		'description' => esc_html__( 'Check and sort the elements', 'yuma' ),
		'section' => 'yuma_topbar_section',
		'input_attrs' => array(
			'sortable' => true,
			'fullwidth' => true,
		),
		'choices' => yuma_topbar_elements_options(),
		'active_callback' => 'yuma_callback_false',
	)
) );
// topbar right elements setting and control.
$wp_customize->add_setting( 'yuma_theme_options[topbar_right_element]', array(
	'sanitize_callback' => 'yuma_text_sanitization',
) );
$wp_customize->add_control( new Yuma_Pill_Checkbox_Custom_Control( $wp_customize, 'yuma_theme_options[topbar_right_element]', array(
		'label' => esc_html__( 'Right Area Elements', 'yuma' ),
		'description' => esc_html__( 'Check and sort the elements', 'yuma' ),
		'section' => 'yuma_topbar_section',
		'input_attrs' => array(
			'sortable' => true,
			'fullwidth' => true,
		),
		'choices' => yuma_topbar_elements_options(),
		'active_callback' => 'yuma_callback_false',
	)
) );

/**************************************************************************/

// topbar address control and setting
$wp_customize->add_setting( 'yuma_theme_options[topbar_address]', array(
	'default'			=> yuma_theme_option('topbar_address'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'yuma_theme_options[topbar_address]', array(
	'label'             => esc_html__( 'Address', 'yuma' ),
	'section'           => 'yuma_topbar_section',
	'type'				=> 'text',
	'active_callback'	=> 'yuma_topbar_address_enable',
) );

// topbar address control and setting
$wp_customize->add_setting( 'yuma_theme_options[topbar_address_link]', array(
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'yuma_theme_options[topbar_address_link]', array(
	'label'             => esc_html__( 'Address Link', 'yuma' ),
	'description'       => esc_html__( 'Note: You can add link to Google Map.', 'yuma' ),
	'section'           => 'yuma_topbar_section',
	'type'				=> 'text',
	'active_callback'	=> 'yuma_topbar_address_enable',
) );

// topbar address style enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_topbar_address_style]', array(
	'default'           => yuma_theme_option('enable_topbar_address_style'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_topbar_address_style]', array(
	'label'             => esc_html__( 'Enable Address Style', 'yuma' ),
	'section'           => 'yuma_topbar_section',
	'active_callback'	=> 'yuma_topbar_address_enable',
) ) );

/**************************************************************************/

// topbar time control and setting
$wp_customize->add_setting( 'yuma_theme_options[topbar_time]', array(
	'default'			=> yuma_theme_option('topbar_time'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'yuma_theme_options[topbar_time]', array(
	'label'             => esc_html__( 'Time', 'yuma' ),
	'section'           => 'yuma_topbar_section',
	'type'				=> 'text',
	'active_callback'	=> 'yuma_topbar_time_enable',
) );

// topbar time style enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_topbar_time_style]', array(
	'default'           => yuma_theme_option('enable_topbar_time_style'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_topbar_time_style]', array(
	'label'             => esc_html__( 'Enable Time Style', 'yuma' ),
	'section'           => 'yuma_topbar_section',
	'active_callback'	=> 'yuma_topbar_time_enable',
) ) );

/**************************************************************************/

// topbar phone control and setting
$wp_customize->add_setting( 'yuma_theme_options[topbar_phone]',
	array(
		'default' => yuma_theme_option('topbar_phone'),
		'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Yuma_Sortable_Repeater_Custom_Control( $wp_customize, 'yuma_theme_options[topbar_phone]',
	array(
		'label' => esc_html__( 'Phone No', 'yuma' ),
		'section' => 'yuma_topbar_section',
		'button_labels' => array(
			'add' => esc_html__( 'Add Phone No', 'yuma' ),
		),
		'active_callback'	=> 'yuma_topbar_phone_enable',
) ) );

// topbar phone style enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_topbar_phone_style]', array(
	'default'           => yuma_theme_option('enable_topbar_phone_style'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_topbar_phone_style]', array(
	'label'             => esc_html__( 'Enable Phone Style', 'yuma' ),
	'section'           => 'yuma_topbar_section',
	'active_callback'	=> 'yuma_topbar_phone_enable',
) ) );

/**************************************************************************/

// topbar email control and setting
$wp_customize->add_setting( 'yuma_theme_options[topbar_email]',
	array(
		'default' => yuma_theme_option('topbar_email'),
		'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Yuma_Sortable_Repeater_Custom_Control( $wp_customize, 'yuma_theme_options[topbar_email]',
	array(
		'label' => esc_html__( 'Email', 'yuma' ),
		'section' => 'yuma_topbar_section',
		'button_labels' => array(
			'add' => esc_html__( 'Add Email', 'yuma' ),
		),
		'active_callback'	=> 'yuma_topbar_email_enable',
) ) );

// topbar email style enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_topbar_email_style]', array(
	'default'           => yuma_theme_option('enable_topbar_email_style'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_topbar_email_style]', array(
	'label'             => esc_html__( 'Enable Email Style', 'yuma' ),
	'section'           => 'yuma_topbar_section',
	'active_callback'	=> 'yuma_topbar_email_enable',
) ) );

/**************************************************************************/

// topbar off_canvas_bar style enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_topbar_off_canvas_bar_style]', array(
	'default'           => yuma_theme_option('enable_topbar_off_canvas_bar_style'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_topbar_off_canvas_bar_style]', array(
	'label'             => esc_html__( 'Enable Off Canvas Bar Style', 'yuma' ),
	'section'           => 'yuma_topbar_section',
	'active_callback'	=> 'yuma_topbar_off_canvas_bar_enable',
) ) );

/**************************************************************************/

// topbar woocart style enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_topbar_woocart_item]', array(
	'default'           => yuma_theme_option('enable_topbar_woocart_item'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_topbar_woocart_item]', array(
	'label'             => esc_html__( 'Show Woo Cart Icon - Details', 'yuma' ),
	'section'           => 'yuma_topbar_section',
	'active_callback'	=> 'yuma_topbar_woocart_enable',
) ) );

// topbar woocart style enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_topbar_woocart_style]', array(
	'default'           => yuma_theme_option('enable_topbar_woocart_style'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_topbar_woocart_style]', array(
	'label'             => esc_html__( 'Enable Woo Cart Style', 'yuma' ),
	'section'           => 'yuma_topbar_section',
	'active_callback'	=> 'yuma_topbar_woocart_enable',
) ) );

/**************************************************************************/

// topbar date format control and setting
$wp_customize->add_setting( 'yuma_theme_options[topbar_date_format]', array(
	'default'          	=> yuma_theme_option('topbar_date_format'),
	'sanitize_callback' => 'yuma_sanitize_select',
) );

$wp_customize->add_control( 'yuma_theme_options[topbar_date_format]', array(
	'label'             => esc_html__( 'Date Format', 'yuma' ),
	'section'           => 'yuma_topbar_section',
	'type'				=> 'radio',
	'choices'			=> array( 
		'layout-1' 		=> esc_html__( 'January 14, 2021', 'yuma' ),
		'layout-2' 		=> esc_html__( 'Jan 14, 2021', 'yuma' ),
		'layout-3' 		=> esc_html__( '01-14-2021', 'yuma' ),
		'layout-4' 		=> esc_html__( '01/14/2021', 'yuma' ),
		'layout-5' 		=> esc_html__( '14/01/2021', 'yuma' ),
		'layout-6' 		=> esc_html__( 'Monday 14th January 2021', 'yuma' ),
		'layout-7' 		=> esc_html__( 'Mon 14th Jan 2021', 'yuma' ),
	),
	'active_callback'  	=> 'yuma_topbar_date_enable',
) );

// topbar date style enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_topbar_date_style]', array(
	'default'           => yuma_theme_option('enable_topbar_date_style'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_topbar_date_style]', array(
	'label'             => esc_html__( 'Enable Date Style', 'yuma' ),
	'section'           => 'yuma_topbar_section',
	'active_callback'	=> 'yuma_topbar_date_enable',
) ) );

/**************************************************************************/

// topbar search format control and setting
$wp_customize->add_setting( 'yuma_theme_options[topbar_search_format]', array(
	'default'          	=> yuma_theme_option('topbar_search_format'),
	'sanitize_callback' => 'yuma_sanitize_select',
) );

$wp_customize->add_control( 'yuma_theme_options[topbar_search_format]', array(
	'label'             => esc_html__( 'Search Format', 'yuma' ),
	'section'           => 'yuma_topbar_section',
	'type'				=> 'radio',
	'choices'			=> array( 
		'search-icon' 		=> esc_html__( 'Search Icon', 'yuma' ),
		'search-form' 		=> esc_html__( 'Search Form', 'yuma' ),
	),
	'active_callback'  	=> 'yuma_topbar_search_enable',
) );

// topbar search style enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_topbar_search_style]', array(
	'default'           => yuma_theme_option('enable_topbar_search_style'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_topbar_search_style]', array(
	'label'             => esc_html__( 'Enable Search Form Style', 'yuma' ),
	'section'           => 'yuma_topbar_section',
	'active_callback'	=> 'yuma_topbar_search_style_btn_enable',
) ) );

/***************************************************************************************/

// topbar social menu style enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_topbar_social_menu_style]', array(
	'default'           => yuma_theme_option('enable_topbar_social_menu_style'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_topbar_social_menu_style]', array(
	'label'             => esc_html__( 'Enable Social Menu Style', 'yuma' ),
	'section'           => 'yuma_topbar_section',
	'active_callback'	=> 'yuma_topbar_social_menu_enable',
) ) );
