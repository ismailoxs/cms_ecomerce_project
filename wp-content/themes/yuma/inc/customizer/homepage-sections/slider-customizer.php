<?php
/**
 * Slider Customizer Options
 *
 * @package yuma
 */

// Add slider section
$wp_customize->add_section( 'yuma_slider_section', array(
	'title'             => esc_html__( 'Slider Section','yuma' ),
	'description'       => esc_html__( 'Slider Setting Options', 'yuma' ),
	'panel'             => 'yuma_homepage_sections_panel',
) );

// slider menu enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_slider]', array(
	'default'           => yuma_theme_option('enable_slider'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_slider]', array(
	'label'             => esc_html__( 'Enable Slider', 'yuma' ),
	'section'           => 'yuma_slider_section',
	'on_off_label' 		=> yuma_show_options(),
) ) );

// slider social menu enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[slider_entire_site]', array(
	'default'           => yuma_theme_option('slider_entire_site'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[slider_entire_site]', array(
	'label'             => esc_html__( 'Show on Entire Site', 'yuma' ),
	'section'           => 'yuma_slider_section',
	'on_off_label' 		=> yuma_show_options(),
	'active_callback'	=> 'yuma_slider_section_enable',
) ) );

// slider arrow control enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[slider_arrow]', array(
	'default'           => yuma_theme_option('slider_arrow'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[slider_arrow]', array(
	'label'             => esc_html__( 'Show Arrow Controller', 'yuma' ),
	'section'           => 'yuma_slider_section',
	'on_off_label' 		=> yuma_show_options(),
	'active_callback'	=> 'yuma_slider_section_enable',
) ) );

// slider auto slide control enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[slider_auto_slide]', array(
	'default'           => yuma_theme_option('slider_auto_slide'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[slider_auto_slide]', array(
	'label'             => esc_html__( 'Auto Slide', 'yuma' ),
	'section'           => 'yuma_slider_section',
	'on_off_label' 		=> yuma_show_options(),
	'active_callback'	=> 'yuma_slider_section_enable',
) ) );

// slider excerpt control enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[slider_excerpt]', array(
	'default'           => yuma_theme_option('slider_excerpt'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[slider_excerpt]', array(
	'label'             => esc_html__( 'Show Excerpt', 'yuma' ),
	'section'           => 'yuma_slider_section',
	'on_off_label' 		=> yuma_show_options(),
	'active_callback'	=> 'yuma_slider_section_enable',
) ) );

// slider center mode control enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[slider_center_mode]', array(
	'default'           => yuma_theme_option('slider_center_mode'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[slider_center_mode]', array(
	'label'             => esc_html__( 'Center Mode', 'yuma' ),
	'section'           => 'yuma_slider_section',
	'on_off_label' 		=> yuma_show_options(),
	'active_callback'	=> 'yuma_slider_section_enable',
) ) );

// slider gap control enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[slider_gap]', array(
	'default'           => yuma_theme_option('slider_gap'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[slider_gap]', array(
	'label'             => esc_html__( 'Slides Gap', 'yuma' ),
	'section'           => 'yuma_slider_section',
	'on_off_label' 		=> yuma_show_options(),
	'active_callback'	=> 'yuma_slider_section_enable',
) ) );

// slider gap size control and setting
$wp_customize->add_setting( 'yuma_theme_options[slider_gap_size]', array(
	'default' => yuma_theme_option('slider_gap_size'),
	'sanitize_callback' => 'absint'
) );

$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[slider_gap_size]', 
	array(
		'label' => esc_html__( 'Gap Size (px)', 'yuma' ),
		'section' => 'yuma_slider_section',
		'active_callback'	=> 'yuma_slider_gap_enable',
		'input_attrs' => array(
			'min' => 1,
			'max' => 50,
			'step' => 1,
		),
	)
) );

// slider overlay control and setting
$wp_customize->add_setting( 'yuma_theme_options[slider_overlay]', array(
	'default'           => 'rgba(0,0,0,0.4)',
	'sanitize_callback' => 'yuma_hex_rgba_sanitization', 
) );

$wp_customize->add_control( new Yuma_Customize_Alpha_Color_Control( $wp_customize, 'yuma_theme_options[slider_overlay]',
	array(
		'label'    => esc_html__( 'Image Overlay Color', 'yuma' ),
		'section' => 'yuma_slider_section',
		'show_opacity' => true,
		'active_callback'	=> 'yuma_slider_section_enable',
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

// slider content width control and setting
$wp_customize->add_setting( 'yuma_theme_options[slider_width]', array(
	'default'          	=> yuma_theme_option('slider_width'),
	'sanitize_callback' => 'yuma_radio_sanitization',
) );

$wp_customize->add_control( new Yuma_Text_Radio_Button_Custom_Control( $wp_customize, 'yuma_theme_options[slider_width]',
	array(
	'label'             => esc_html__( 'Content Width', 'yuma' ),
	'section'           => 'yuma_slider_section',
	'choices'			=> array( 
		'full-width' 		=> esc_html__( 'Full', 'yuma' ),
		'container-width' 	=> esc_html__( 'Container', 'yuma' ),
	),
	'active_callback'	=> 'yuma_slider_section_enable',
) ) );

// slider image size control and setting
$wp_customize->add_setting( 'yuma_theme_options[slider_image_size]', array(
	'default'          	=> yuma_theme_option('slider_image_size'),
	'sanitize_callback' => 'yuma_sanitize_select',
) );

$wp_customize->add_control( 'yuma_theme_options[slider_image_size]', array(
	'label'             => esc_html__( 'Image Size', 'yuma' ),
	'description'	    => esc_html__( 'Note: Full size is auto activated when One Column is set.', 'yuma' ),
	'section'           => 'yuma_slider_section',
	'type'				=> 'select',
	'choices'			=> apply_filters( 'yuma_slider_image_size_options', array( 
		'full' 						=> esc_html__( 'Full', 'yuma' ),
		'post-thumbnail' 			=> esc_html__( 'Post Thumbnail (800x600)', 'yuma' ),
		'yuma-post-thumbnail' 		=> esc_html__( 'Yuma Post Thumbnail (600x800)', 'yuma' ),
		'yuma-square-thumbnail' 	=> esc_html__( 'Yuma Square Thumbnail (600x600)', 'yuma' ),
	) ),
	'active_callback'	=> 'yuma_slider_section_enable',
) );

// slider alignment control and setting
$wp_customize->add_setting( 'yuma_theme_options[slider_layout]', array(
	'default'          	=> yuma_theme_option('slider_layout'),
	'sanitize_callback' => 'yuma_sanitize_select',
) );

$wp_customize->add_control( 'yuma_theme_options[slider_layout]', array(
	'label'             => esc_html__( 'Layout', 'yuma' ),
	'section'           => 'yuma_slider_section',
	'type'				=> 'select',
	'choices'			=> apply_filters( 'yuma_slider_layout_options', array( 
		'left-align' 						=> esc_html__( 'Left Align', 'yuma' ),
		'right-align' 						=> esc_html__( 'Right Align', 'yuma' ),
		'center-align' 						=> esc_html__( 'Center Align', 'yuma' ),
	) ),
	'active_callback'	=> 'yuma_slider_section_enable',
) );

// slider trasnition control and setting
$wp_customize->add_setting( 'yuma_theme_options[slider_column]', array(
	'default'          	=> yuma_theme_option('slider_column'),
	'sanitize_callback' => 'yuma_sanitize_select',
) );

$wp_customize->add_control( 'yuma_theme_options[slider_column]', array(
	'label'             => esc_html__( 'Column', 'yuma' ),
	'section'           => 'yuma_slider_section',
	'type'				=> 'select',
	'choices'			=> apply_filters( 'yuma_slider_column_options', array( 
		1 		=> esc_html__( 'One Column', 'yuma' ),
		2 		=> esc_html__( 'Two Column', 'yuma' ),
		3 		=> esc_html__( 'Three Column', 'yuma' ),
		4 		=> esc_html__( 'Four Column', 'yuma' ),
	) ),
	'active_callback'	=> 'yuma_slider_section_enable',
) );

// slider readmore label drop down chooser control and setting
$wp_customize->add_setting( 'yuma_theme_options[slider_readmore_label]', array(
	'default'          	=> yuma_theme_option('slider_readmore_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'yuma_theme_options[slider_readmore_label]', array(
	'label'             => esc_html__( 'Readmore Label', 'yuma' ),
	'section'           => 'yuma_slider_section',
	'type'				=> 'text',
	'active_callback'	=> 'yuma_slider_section_enable',
) );

// slider content type control and setting
$wp_customize->add_setting( 'yuma_theme_options[slider_content_type]', array(
	'default'          	=> yuma_theme_option('slider_content_type'),
	'sanitize_callback' => 'yuma_sanitize_select',
) );

$wp_customize->add_control( 'yuma_theme_options[slider_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'yuma' ),
	'section'           => 'yuma_slider_section',
	'type'				=> 'select',
	'choices'			=> apply_filters( 'yuma_slider_content_type_options', array( 
		'page' 		=> esc_html__( 'Page', 'yuma' ),
		'post' 		=> esc_html__( 'Post', 'yuma' ),
	) ),
	'active_callback'	=> 'yuma_slider_section_enable',
) );

// slider count control and setting
$wp_customize->add_setting( 'yuma_theme_options[slider_count]', array(
	'default'          	=> yuma_theme_option('slider_count'),
	'sanitize_callback' => 'yuma_sanitize_number_range',
	'validate_callback' => 'yuma_validate_slider_count',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'yuma_theme_options[slider_count]', array(
	'label'             => esc_html__( 'Number of Slides', 'yuma' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 5. Please refresh the page to see the change.', 'yuma' ),
	'section'           => 'yuma_slider_section',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 5,
		),
	'active_callback'	=> 'yuma_slider_section_enable',
) );

for ( $i = 1; $i <= yuma_theme_option('slider_count'); $i++ ) :

	// slider sub title drop down chooser control and setting
	$wp_customize->add_setting( 'yuma_theme_options[slider_sub_title_' . $i . ']', array(
		'sanitize_callback' => 'yuma_title_allow_span',
	) );

	$wp_customize->add_control( 'yuma_theme_options[slider_sub_title_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Input Sub Title %d', 'yuma' ), $i ),
		'section'           => 'yuma_slider_section',
		'type'				=> 'text',
		'active_callback'	=> 'yuma_slider_content_page_enable',
	) );

	// slider pages drop down chooser control and setting
	$wp_customize->add_setting( 'yuma_theme_options[slider_content_page_' . $i . ']', array(
		'sanitize_callback' => 'yuma_sanitize_page_post',
	) );

	$wp_customize->add_control( new Yuma_Dropdown_Chosen_Control( $wp_customize, 'yuma_theme_options[slider_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'yuma' ), $i ),
		'section'           => 'yuma_slider_section',
		'choices'			=> yuma_page_choices(),
		'active_callback'	=> 'yuma_slider_content_page_enable',
	) ) );

	// slider posts drop down chooser control and setting
	$wp_customize->add_setting( 'yuma_theme_options[slider_content_post_' . $i . ']', array(
		'sanitize_callback' => 'yuma_sanitize_page_post',
	) );

	$wp_customize->add_control( new Yuma_Dropdown_Chosen_Control( $wp_customize, 'yuma_theme_options[slider_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'yuma' ), $i ),
		'section'           => 'yuma_slider_section',
		'choices'			=> yuma_post_choices(),
		'active_callback'	=> 'yuma_slider_content_post_enable',
	) ) );

endfor;
