<?php
/**
 * Header Customizer Options
 *
 * @package yuma
 */

// Add header section
$wp_customize->add_section( 'yuma_header_section', array(
	'title'             => esc_html__( 'Main Header Elements','yuma' ),
	'description'       => sprintf( '%1$s <a class="menu_locations" href="#"> %2$s </a> %3$s', esc_html__( 'Note: To show Topbar and Social menu,', 'yuma' ), esc_html__( 'Click Here', 'yuma' ), esc_html__( 'to create menu. Add Widgets in Off Canvas Widget area to get Off Canvas Bar work. Install and Activate WooCommerce to get WooCommerce Cart and Search Form work.', 'yuma' ) ),
	'panel'             => 'yuma_header_panel',
) );

// header enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_header]', array(
	'default'           => yuma_theme_option('enable_header'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_header]', array(
	'label'             => esc_html__( 'Enable Header', 'yuma' ),
	'section'           => 'yuma_header_section',
) ) );

// Test of Text Radio Button Custom Control
$wp_customize->add_setting( 'yuma_theme_options[header_element_location]', array(
	'transport' => 'postMessage',
	'sanitize_callback' => 'yuma_radio_sanitization',
) );

$wp_customize->add_control( new Yuma_Text_Radio_Button_Tab_Heading_Custom_Control( $wp_customize, 'yuma_theme_options[header_element_location]',
	array(
		'section' => 'yuma_header_section',
		'choices' => array(
			'header_left_element' => esc_html__( 'L Area', 'yuma' ),
			'header_center_element' => esc_html__( 'C Area', 'yuma' ),
			'header_right_element' => esc_html__( 'R Area', 'yuma'  )
		),
		'active_callback' => 'yuma_header_enable',
	)
) );

// header left elements setting and control.
$wp_customize->add_setting( 'yuma_theme_options[header_left_element]', array(
	'default'           => yuma_theme_option('header_left_element'),
	'sanitize_callback' => 'yuma_text_sanitization',
) );

$wp_customize->add_control( new Yuma_Pill_Checkbox_Custom_Control( $wp_customize, 'yuma_theme_options[header_left_element]', array(
		'label' => esc_html__( 'Left Area Elements', 'yuma' ),
		'description' => esc_html__( 'Check and sort the elements', 'yuma' ),
		'section' => 'yuma_header_section',
		'input_attrs' => array(
			'sortable' => true,
			'fullwidth' => true,
		),
		'choices' => yuma_header_elements_options(),
		'active_callback' => 'yuma_callback_false',
	)
) );

// header center elements setting and control.
$wp_customize->add_setting( 'yuma_theme_options[header_center_element]', array(
	'sanitize_callback' => 'yuma_text_sanitization',
) );

$wp_customize->add_control( new Yuma_Pill_Checkbox_Custom_Control( $wp_customize, 'yuma_theme_options[header_center_element]', array(
		'label' => esc_html__( 'Center Area Elements', 'yuma' ),
		'description' => esc_html__( 'Check and sort the elements', 'yuma' ),
		'section' => 'yuma_header_section',
		'input_attrs' => array(
			'sortable' => true,
			'fullwidth' => true,
		),
		'choices' => yuma_header_elements_options(),
		'active_callback' => 'yuma_callback_false',
	)
) );
// header right elements setting and control.
$wp_customize->add_setting( 'yuma_theme_options[header_right_element]', array(
	'default'           => yuma_theme_option('header_right_element'),
	'sanitize_callback' => 'yuma_text_sanitization',
) );
$wp_customize->add_control( new Yuma_Pill_Checkbox_Custom_Control( $wp_customize, 'yuma_theme_options[header_right_element]', array(
		'label' => esc_html__( 'Right Area Elements', 'yuma' ),
		'description' => esc_html__( 'Check and sort the elements', 'yuma' ),
		'section' => 'yuma_header_section',
		'input_attrs' => array(
			'sortable' => true,
			'fullwidth' => true,
		),
		'choices' => yuma_header_elements_options(),
		'active_callback' => 'yuma_callback_false',
	)
) );

/***************************************************************************************/

// header site title enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_header_site_details_title]', array(
	'default'           => yuma_theme_option('enable_header_site_details_title'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_header_site_details_title]', array(
	'label'             => esc_html__( 'Show Site Title', 'yuma' ),
	'section'           => 'yuma_header_section',
	'active_callback'	=> 'yuma_header_site_details_enable',
) ) );

// header site description enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_header_site_details_description]', array(
	'default'           => yuma_theme_option('enable_header_site_details_description'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_header_site_details_description]', array(
	'label'             => esc_html__( 'Show Site Description', 'yuma' ),
	'section'           => 'yuma_header_section',
	'active_callback'	=> 'yuma_header_site_details_enable',
) ) );

// header site logo height control and setting
$wp_customize->add_setting( 'yuma_theme_options[header_site_details_logo_height]', array(
	'default' => yuma_theme_option('header_site_details_logo_height'),
	'sanitize_callback' => 'absint'
) );

$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[header_site_details_logo_height]', 
	array(
		'label' => esc_html__( 'Site Logo Max Height (px)', 'yuma' ),
		'section' => 'yuma_header_section',
		'input_attrs' => array(
			'min' => 1,
			'max' => 200,
			'step' => 1,
		),
		'active_callback' => 'yuma_header_site_details_enable',
	)
) );

// header site details layout setting and control.
$wp_customize->add_setting( 'yuma_theme_options[header_site_details_layout]', array(
	'sanitize_callback'   => 'yuma_sanitize_select',
	'default'             => yuma_theme_option('header_site_details_layout'),
) );

$wp_customize->add_control(  new Yuma_Radio_Image_Control ( $wp_customize, 'yuma_theme_options[header_site_details_layout]', array(
	'label'               => esc_html__( 'Site Details Layout', 'yuma' ),
	'section'             => 'yuma_header_section',
	'choices'			  => yuma_site_details_layout(),
	'active_callback' => 'yuma_header_site_details_enable',
) ) );

// header site details style enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_header_site_details_style]', array(
	'default'           => yuma_theme_option('enable_header_site_details_style'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_header_site_details_style]', array(
	'label'             => esc_html__( 'Enable Site Details Style', 'yuma' ),
	'section'           => 'yuma_header_section',
	'active_callback'	=> 'yuma_header_site_details_enable',
) ) );

/***************************************************************************************/

// header primary menu label control and setting
$wp_customize->add_setting( 'yuma_theme_options[header_primary_menu_label]', array(
	'default'			=> yuma_theme_option('header_primary_menu_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'yuma_theme_options[header_primary_menu_label]', array(
	'label'             => esc_html__( 'Primary Menu Label', 'yuma' ),
	'description'       => esc_html__( 'Visible in mobile devices.', 'yuma' ),
	'section'           => 'yuma_header_section',
	'type'				=> 'text',
	'active_callback'	=> 'yuma_header_primary_menu_enable',
) );

// header menu style setting and control.
$wp_customize->add_setting( 'yuma_theme_options[header_primary_menu_hover_style]',
	array(
		'default' => yuma_theme_option('header_primary_menu_hover_style'),
		'sanitize_callback' => 'yuma_radio_sanitization'
	)
);

$wp_customize->add_control( new Yuma_Text_Radio_Button_Custom_Control( $wp_customize, 'yuma_theme_options[header_primary_menu_hover_style]',
	array(
		'label' => esc_html__( 'Menu Hover Style', 'yuma' ),
		'section' => 'yuma_header_section',
		'choices' => array(
			'default' 	=> esc_html__( 'Default', 'yuma' ),
			'menu-boxed' 		=> esc_html__( 'Boxed', 'yuma'  ),
			'menu-underline' 	=> esc_html__( 'Underline', 'yuma'  )
		),
		'active_callback'	=> 'yuma_header_primary_menu_enable',
	)
) );

// header primary menu style enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_header_primary_menu_style]', array(
	'default'           => yuma_theme_option('enable_header_primary_menu_style'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_header_primary_menu_style]', array(
	'label'             => esc_html__( 'Enable Primary Menu Style', 'yuma' ),
	'section'           => 'yuma_header_section',
	'active_callback'	=> 'yuma_header_primary_menu_enable',
) ) );

/***************************************************************************************/

// header social menu style enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_header_social_menu_style]', array(
	'default'           => yuma_theme_option('enable_header_social_menu_style'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_header_social_menu_style]', array(
	'label'             => esc_html__( 'Enable Social Menu Style', 'yuma' ),
	'section'           => 'yuma_header_section',
	'active_callback'	=> 'yuma_header_social_menu_enable',
) ) );

/***************************************************************************************/

// header address label control and setting
$wp_customize->add_setting( 'yuma_theme_options[header_address_label]', array(
	'default'			=> yuma_theme_option('header_address_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'yuma_theme_options[header_address_label]', array(
	'label'             => esc_html__( 'Address Label', 'yuma' ),
	'section'           => 'yuma_header_section',
	'type'				=> 'text',
	'active_callback'	=> 'yuma_header_address_enable',
) );

// header address control and setting
$wp_customize->add_setting( 'yuma_theme_options[header_address_link]', array(
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'yuma_theme_options[header_address_link]', array(
	'label'             => esc_html__( 'Address Link', 'yuma' ),
	'description'       => esc_html__( 'Note: You can add link to Google Map.', 'yuma' ),
	'section'           => 'yuma_header_section',
	'type'				=> 'text',
	'active_callback'	=> 'yuma_header_address_enable',
) );

// header address control and setting
$wp_customize->add_setting( 'yuma_theme_options[header_address]', array(
	'default'			=> yuma_theme_option('header_address'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'yuma_theme_options[header_address]', array(
	'label'             => esc_html__( 'Address', 'yuma' ),
	'section'           => 'yuma_header_section',
	'type'				=> 'text',
	'active_callback'	=> 'yuma_header_address_enable',
) );

// header address style enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_header_address_style]', array(
	'default'           => yuma_theme_option('enable_header_address_style'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_header_address_style]', array(
	'label'             => esc_html__( 'Enable Address Style', 'yuma' ),
	'section'           => 'yuma_header_section',
	'active_callback'	=> 'yuma_header_address_enable',
) ) );

/***************************************************************************************/

// header time label control and setting
$wp_customize->add_setting( 'yuma_theme_options[header_time_label]', array(
	'default'			=> yuma_theme_option('header_time_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'yuma_theme_options[header_time_label]', array(
	'label'             => esc_html__( 'Time Label', 'yuma' ),
	'section'           => 'yuma_header_section',
	'type'				=> 'text',
	'active_callback'	=> 'yuma_header_time_enable',
) );

// header time control and setting
$wp_customize->add_setting( 'yuma_theme_options[header_time]', array(
	'default'			=> yuma_theme_option('header_time'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'yuma_theme_options[header_time]', array(
	'label'             => esc_html__( 'Time', 'yuma' ),
	'section'           => 'yuma_header_section',
	'type'				=> 'text',
	'active_callback'	=> 'yuma_header_time_enable',
) );

// header time style enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_header_time_style]', array(
	'default'           => yuma_theme_option('enable_header_time_style'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_header_time_style]', array(
	'label'             => esc_html__( 'Enable Time Style', 'yuma' ),
	'section'           => 'yuma_header_section',
	'active_callback'	=> 'yuma_header_time_enable',
) ) );

/***************************************************************************************/

// header phone label control and setting
$wp_customize->add_setting( 'yuma_theme_options[header_phone_label]', array(
	'default'			=> yuma_theme_option('header_phone_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'yuma_theme_options[header_phone_label]', array(
	'label'             => esc_html__( 'Phone Label', 'yuma' ),
	'section'           => 'yuma_header_section',
	'type'				=> 'text',
	'active_callback'	=> 'yuma_header_phone_enable',
) );

// header phone control and setting
$wp_customize->add_setting( 'yuma_theme_options[header_phone]',
	array(
		'default' => yuma_theme_option('header_phone'),
		'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Yuma_Sortable_Repeater_Custom_Control( $wp_customize, 'yuma_theme_options[header_phone]',
	array(
		'label' => esc_html__( 'Phone No', 'yuma' ),
		'section' => 'yuma_header_section',
		'button_labels' => array(
			'add' => esc_html__( 'Add Phone No', 'yuma' ),
		),
		'active_callback'	=> 'yuma_header_phone_enable',
) ) );

// header phone style enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_header_phone_style]', array(
	'default'           => yuma_theme_option('enable_header_phone_style'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_header_phone_style]', array(
	'label'             => esc_html__( 'Enable Phone Style', 'yuma' ),
	'section'           => 'yuma_header_section',
	'active_callback'	=> 'yuma_header_phone_enable',
) ) );

/***************************************************************************************/

// header email label control and setting
$wp_customize->add_setting( 'yuma_theme_options[header_email_label]', array(
	'default'			=> yuma_theme_option('header_email_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'yuma_theme_options[header_email_label]', array(
	'label'             => esc_html__( 'Email Label', 'yuma' ),
	'section'           => 'yuma_header_section',
	'type'				=> 'text',
	'active_callback'	=> 'yuma_header_email_enable',
) );

// header email control and setting
$wp_customize->add_setting( 'yuma_theme_options[header_email]',
	array(
		'default' => yuma_theme_option('header_email'),
		'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Yuma_Sortable_Repeater_Custom_Control( $wp_customize, 'yuma_theme_options[header_email]',
	array(
		'label' => esc_html__( 'Email', 'yuma' ),
		'section' => 'yuma_header_section',
		'button_labels' => array(
			'add' => esc_html__( 'Add Email', 'yuma' ),
		),
		'active_callback'	=> 'yuma_header_email_enable',
) ) );

// header email style enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_header_email_style]', array(
	'default'           => yuma_theme_option('enable_header_email_style'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_header_email_style]', array(
	'label'             => esc_html__( 'Enable Email Style', 'yuma' ),
	'section'           => 'yuma_header_section',
	'active_callback'	=> 'yuma_header_email_enable',
) ) );

/**************************************************************************/

// header off_canvas_bar style enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_header_off_canvas_bar_style]', array(
	'default'           => yuma_theme_option('enable_header_off_canvas_bar_style'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_header_off_canvas_bar_style]', array(
	'label'             => esc_html__( 'Enable Off Canvas Bar Style', 'yuma' ),
	'section'           => 'yuma_header_section',
	'active_callback'	=> 'yuma_header_off_canvas_bar_enable',
) ) );

/**************************************************************************/

// header woocart style enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_header_woocart_item]', array(
	'default'           => yuma_theme_option('enable_header_woocart_item'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_header_woocart_item]', array(
	'label'             => esc_html__( 'Show Woo Cart Icon - Details', 'yuma' ),
	'section'           => 'yuma_header_section',
	'active_callback'	=> 'yuma_header_woocart_enable',
) ) );

// header woocart style enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_header_woocart_style]', array(
	'default'           => yuma_theme_option('enable_header_woocart_style'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_header_woocart_style]', array(
	'label'             => esc_html__( 'Enable Woo Cart Style', 'yuma' ),
	'section'           => 'yuma_header_section',
	'active_callback'	=> 'yuma_header_woocart_enable',
) ) );

/**************************************************************************/

// header woo search enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[header_woo_search_placeholder]', array(
	'default'           => yuma_theme_option('header_woo_search_placeholder'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'yuma_theme_options[header_woo_search_placeholder]', array(
	'label'             => esc_html__( 'Woo Search Placeholder Text', 'yuma' ),
	'section'           => 'yuma_header_section',
	'type'				=> 'text',
	'active_callback'	=> 'yuma_header_woo_search_enable',
) );

// header woo search style enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_header_woo_search_style]', array(
	'default'           => yuma_theme_option('enable_header_woo_search_style'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_header_woo_search_style]', array(
	'label'             => esc_html__( 'Enable Woo Search Style', 'yuma' ),
	'section'           => 'yuma_header_section',
	'active_callback'	=> 'yuma_header_woo_search_enable',
) ) );

/**************************************************************************/

// header search format control and setting
$wp_customize->add_setting( 'yuma_theme_options[header_search_format]', array(
	'default'          	=> yuma_theme_option('header_search_format'),
	'sanitize_callback' => 'yuma_sanitize_select',
) );

$wp_customize->add_control( 'yuma_theme_options[header_search_format]', array(
	'label'             => esc_html__( 'Search Format', 'yuma' ),
	'section'           => 'yuma_header_section',
	'type'				=> 'radio',
	'choices'			=> array( 
		'search-icon' 		=> esc_html__( 'Search Icon', 'yuma' ),
		'search-form' 		=> esc_html__( 'Search Form', 'yuma' ),
	),
	'active_callback'  	=> 'yuma_header_search_enable',
) );

// header search style enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_header_search_style]', array(
	'default'           => yuma_theme_option('enable_header_search_style'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_header_search_style]', array(
	'label'             => esc_html__( 'Enable Search Form Style', 'yuma' ),
	'section'           => 'yuma_header_section',
	'active_callback'	=> 'yuma_header_search_style_btn_enable',
) ) );

/***************************************************************************************/

// header button label control and setting
$wp_customize->add_setting( 'yuma_theme_options[header_button_label]', array(
	'default'			=> yuma_theme_option('header_button_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'yuma_theme_options[header_button_label]', array(
	'label'             => esc_html__( 'Button Label', 'yuma' ),
	'section'           => 'yuma_header_section',
	'type'				=> 'text',
	'active_callback'	=> 'yuma_header_button_enable',
) );

// header button url control and setting
$wp_customize->add_setting( 'yuma_theme_options[header_button_url]', array(
	'default'			=> yuma_theme_option('header_button_url'),
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'yuma_theme_options[header_button_url]', array(
	'label'             => esc_html__( 'Button Url', 'yuma' ),
	'section'           => 'yuma_header_section',
	'type'				=> 'url',
	'active_callback'	=> 'yuma_header_button_enable',
) );

// header button style enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_header_button_style]', array(
	'default'           => yuma_theme_option('enable_header_button_style'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_header_button_style]', array(
	'label'             => esc_html__( 'Enable Button Style', 'yuma' ),
	'section'           => 'yuma_header_section',
	'active_callback'	=> 'yuma_header_button_enable',
) ) );
