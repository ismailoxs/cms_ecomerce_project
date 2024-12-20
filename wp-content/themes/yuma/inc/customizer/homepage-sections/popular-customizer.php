<?php
/**
 * Popular Customizer Options
 *
 * @package yuma
 */

// Add popular section
$wp_customize->add_section( 'yuma_popular_section', array(
	'title'             => esc_html__( 'Popular Section','yuma' ),
	'description'       => esc_html__( 'Popular Setting Options', 'yuma' ),
	'panel'             => 'yuma_homepage_sections_panel',
) );

// popular enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_popular]', array(
	'default'           => yuma_theme_option('enable_popular'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_popular]', array(
	'label'             => esc_html__( 'Enable Popular', 'yuma' ),
	'section'           => 'yuma_popular_section',
	'on_off_label' 		=> yuma_show_options(),
) ) );

// popular enable before element setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_popular_before_element]', array(
	'default'           => yuma_theme_option('enable_popular_before_element'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_popular_before_element]', array(
	'label'             => esc_html__( 'Enable Title Bar', 'yuma' ),
	'section'           => 'yuma_popular_section',
	'on_off_label' 		=> yuma_show_options(),
	'active_callback'	=> 'yuma_popular_section_enable',
) ) );

// popular title bar color control and setting
$wp_customize->add_setting( 'yuma_theme_options[popular_title_bar_color]', array(
	'default'           => '#eba54c',
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'yuma_theme_options[popular_title_bar_color]', array(
	'label'    => esc_html__( 'Title Bar Color', 'yuma' ),
	'section'  => 'yuma_popular_section',
	'active_callback' => 'yuma_popular_title_bar_enable',
) ) );

// popular title control and setting
$wp_customize->add_setting( 'yuma_theme_options[popular_title]', array(
	'default'          	=> yuma_theme_option('popular_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'yuma_theme_options[popular_title]', array(
	'label'             => esc_html__( 'Title', 'yuma' ),
	'section'           => 'yuma_popular_section',
	'type'				=> 'text',
	'active_callback'	=> 'yuma_popular_section_enable',
) );

// popular overlay control and setting
$wp_customize->add_setting( 'yuma_theme_options[popular_overlay]', array(
	'default'           => 'rgba(0,0,0,0.6)',
	'sanitize_callback' => 'yuma_hex_rgba_sanitization', 
) );

$wp_customize->add_control( new Yuma_Customize_Alpha_Color_Control( $wp_customize, 'yuma_theme_options[popular_overlay]',
	array(
		'label'    => esc_html__( 'Image Overlay Color:Hover', 'yuma' ),
		'section' => 'yuma_popular_section',
		'show_opacity' => true,
		'active_callback'	=> 'yuma_popular_section_enable',
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

// popular no image bg color control and setting
$wp_customize->add_setting( 'yuma_theme_options[popular_no_img_bg]', array(
	'default'           => '#0a0e14',
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'yuma_theme_options[popular_no_img_bg]', array(
	'label'    => esc_html__( 'No Image Background Color', 'yuma' ),
	'section'  => 'yuma_popular_section',
	'active_callback'	=> 'yuma_popular_section_enable',
) ) );

// popular alignment control and setting
$wp_customize->add_setting( 'yuma_theme_options[popular_alignment]', array(
	'default'          	=> yuma_theme_option('popular_alignment'),
	'sanitize_callback' => 'yuma_radio_sanitization',
) );

$wp_customize->add_control( new Yuma_Text_Radio_Button_Custom_Control( $wp_customize, 'yuma_theme_options[popular_alignment]',
	array(
	'label'             => esc_html__( 'Text Alignment', 'yuma' ),
	'section'           => 'yuma_popular_section',
	'choices'			=> apply_filters( 'yuma_popular_alignment_options', array( 
		'left-align' 		=> esc_html__( 'Left', 'yuma' ),
	) ),
	'active_callback'	=> 'yuma_popular_section_enable',
) ) );

// popular layout control and setting
$wp_customize->add_setting( 'yuma_theme_options[popular_layout]', array(
	'default'          	=> yuma_theme_option('popular_layout'),
	'sanitize_callback' => 'yuma_radio_sanitization',
) );

$wp_customize->add_control( new Yuma_Text_Radio_Button_Custom_Control( $wp_customize, 'yuma_theme_options[popular_layout]',
	array(
	'label'             => esc_html__( 'Layout', 'yuma' ),
	'section'           => 'yuma_popular_section',
	'choices'			=> apply_filters( 'yuma_popular_layout_options', array( 
		'gap' 			=> esc_html__( 'Gap', 'yuma' ),
	) ),
	'active_callback'	=> 'yuma_popular_section_enable',
) ) );

// popular image size control and setting
$wp_customize->add_setting( 'yuma_theme_options[popular_image_size]', array(
	'default'          	=> yuma_theme_option('popular_image_size'),
	'sanitize_callback' => 'yuma_sanitize_select',
) );

$wp_customize->add_control( 'yuma_theme_options[popular_image_size]', array(
	'label'             => esc_html__( 'Image Size', 'yuma' ),
	'section'           => 'yuma_popular_section',
	'type'				=> 'select',
	'choices'			=> yuma_get_all_image_sizes(),
	'active_callback'	=> 'yuma_popular_section_enable',
) );

// popular trasnition control and setting
$wp_customize->add_setting( 'yuma_theme_options[popular_column]', array(
	'default'          	=> yuma_theme_option('popular_column'),
	'sanitize_callback' => 'yuma_sanitize_select',
) );

$wp_customize->add_control( 'yuma_theme_options[popular_column]', array(
	'label'             => esc_html__( 'Column', 'yuma' ),
	'section'           => 'yuma_popular_section',
	'type'				=> 'select',
	'choices'			=> apply_filters( 'yuma_popular_column_options', array( 
		2 		=> esc_html__( 'Two Column', 'yuma' ),
		3 		=> esc_html__( 'Three Column', 'yuma' ),
	) ),
	'active_callback'	=> 'yuma_popular_section_enable',
) );

// popular content type control and setting
$wp_customize->add_setting( 'yuma_theme_options[popular_content_type]', array(
	'default'          	=> yuma_theme_option('popular_content_type'),
	'sanitize_callback' => 'yuma_sanitize_select',
) );

$wp_customize->add_control( 'yuma_theme_options[popular_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'yuma' ),
	'section'           => 'yuma_popular_section',
	'type'				=> 'select',
	'choices'			=> apply_filters( 'yuma_popular_content_type_options', array( 
		'post' 		=> esc_html__( 'Post', 'yuma' ),
	) ),
	'active_callback'	=> 'yuma_popular_section_enable',
) );

// popular count control and setting
$wp_customize->add_setting( 'yuma_theme_options[popular_count]', array(
	'default'          	=> yuma_theme_option('popular_count'),
	'sanitize_callback' => 'yuma_sanitize_number_range',
	'validate_callback' => 'yuma_validate_popular_count',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'yuma_theme_options[popular_count]', array(
	'label'             => esc_html__( 'Number of Popular Posts', 'yuma' ),
	'description'       => esc_html__( 'Note: Min 2 & Max 6. Please refresh the page to see the change.', 'yuma' ),
	'section'           => 'yuma_popular_section',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 2,
		'max'	=> 6,
		),
	'active_callback'	=> 'yuma_popular_section_enable',
) );

for ( $i = 1; $i <= yuma_theme_option('popular_count'); $i++ ) :

	// popular posts drop down chooser control and setting
	$wp_customize->add_setting( 'yuma_theme_options[popular_content_post_' . $i . ']', array(
		'sanitize_callback' => 'yuma_sanitize_page_post',
	) );

	$wp_customize->add_control( new Yuma_Dropdown_Chosen_Control( $wp_customize, 'yuma_theme_options[popular_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'yuma' ), $i ),
		'section'           => 'yuma_popular_section',
		'choices'			=> yuma_post_choices(),
		'active_callback'	=> 'yuma_popular_content_post_enable',
	) ) );

endfor;
