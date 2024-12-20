<?php
/**
 * Featured Customizer Options
 *
 * @package yuma
 */

// Add featured section
$wp_customize->add_section( 'yuma_featured_section', array(
	'title'             => esc_html__( 'Featured Section','yuma' ),
	'description'       => esc_html__( 'Featured Setting Options', 'yuma' ),
	'panel'             => 'yuma_homepage_sections_panel',
) );

// featured enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_featured]', array(
	'default'           => yuma_theme_option('enable_featured'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_featured]', array(
	'label'             => esc_html__( 'Enable Featured', 'yuma' ),
	'section'           => 'yuma_featured_section',
	'on_off_label' 		=> yuma_show_options(),
) ) );

// featured enable meta date setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_featured_meta]', array(
	'default'           => yuma_theme_option('enable_featured_meta'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_featured_meta]', array(
	'label'             => esc_html__( 'Show Date', 'yuma' ),
	'section'           => 'yuma_featured_section',
	'on_off_label' 		=> yuma_show_options(),
	'active_callback'	=> 'yuma_featured_section_enable',
) ) );

// featured enable excerpt setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_featured_excerpt]', array(
	'default'           => yuma_theme_option('enable_featured_excerpt'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_featured_excerpt]', array(
	'label'             => esc_html__( 'Show Excerpt', 'yuma' ),
	'section'           => 'yuma_featured_section',
	'on_off_label' 		=> yuma_show_options(),
	'active_callback'	=> 'yuma_featured_section_enable',
) ) );

// featured enable before element setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_featured_before_element]', array(
	'default'           => yuma_theme_option('enable_featured_before_element'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_featured_before_element]', array(
	'label'             => esc_html__( 'Enable Title Bar', 'yuma' ),
	'section'           => 'yuma_featured_section',
	'on_off_label' 		=> yuma_show_options(),
	'active_callback'	=> 'yuma_featured_section_enable',
) ) );

// featured title bar color control and setting
$wp_customize->add_setting( 'yuma_theme_options[featured_title_bar_color]', array(
	'default'           => '#eba54c',
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'yuma_theme_options[featured_title_bar_color]', array(
	'label'    => esc_html__( 'Title Bar Color', 'yuma' ),
	'section'  => 'yuma_featured_section',
	'active_callback' => 'yuma_featured_title_bar_enable',
) ) );

// featured title control and setting
$wp_customize->add_setting( 'yuma_theme_options[featured_title]', array(
	'default'          	=> yuma_theme_option('featured_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'yuma_theme_options[featured_title]', array(
	'label'             => esc_html__( 'Title', 'yuma' ),
	'section'           => 'yuma_featured_section',
	'type'				=> 'text',
	'active_callback'	=> 'yuma_featured_section_enable',
) );

// featured read more control and setting
$wp_customize->add_setting( 'yuma_theme_options[featured_readmore]', array(
	'default'          	=> yuma_theme_option('featured_readmore'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'yuma_theme_options[featured_readmore]', array(
	'label'             => esc_html__( 'Readmore Label', 'yuma' ),
	'section'           => 'yuma_featured_section',
	'type'				=> 'text',
	'active_callback'	=> 'yuma_featured_section_enable',
) );

// featured alignment control and setting
$wp_customize->add_setting( 'yuma_theme_options[featured_alignment]', array(
	'default'          	=> yuma_theme_option('featured_alignment'),
	'sanitize_callback' => 'yuma_radio_sanitization',
) );

$wp_customize->add_control( new Yuma_Text_Radio_Button_Custom_Control( $wp_customize, 'yuma_theme_options[featured_alignment]',
	array(
	'label'             => esc_html__( 'Text Alignment', 'yuma' ),
	'section'           => 'yuma_featured_section',
	'choices'			=> apply_filters( 'yuma_featured_alignment_options', array( 
		'left-align' 		=> esc_html__( 'Left', 'yuma' ),
		'center-align' 		=> esc_html__( 'Center', 'yuma' ),
	) ),
	'active_callback'	=> 'yuma_featured_section_enable',
) ) );

// featured image size control and setting
$wp_customize->add_setting( 'yuma_theme_options[featured_image_size]', array(
	'default'          	=> yuma_theme_option('featured_image_size'),
	'sanitize_callback' => 'yuma_sanitize_select',
) );

$wp_customize->add_control( 'yuma_theme_options[featured_image_size]', array(
	'label'             => esc_html__( 'Image Size', 'yuma' ),
	'section'           => 'yuma_featured_section',
	'type'				=> 'select',
	'choices'			=> yuma_get_all_image_sizes(),
	'active_callback'	=> 'yuma_featured_section_enable',
) );

// featured trasnition control and setting
$wp_customize->add_setting( 'yuma_theme_options[featured_column]', array(
	'default'          	=> yuma_theme_option('featured_column'),
	'sanitize_callback' => 'yuma_sanitize_select',
) );

$wp_customize->add_control( 'yuma_theme_options[featured_column]', array(
	'label'             => esc_html__( 'Column', 'yuma' ),
	'section'           => 'yuma_featured_section',
	'type'				=> 'select',
	'choices'			=> apply_filters( 'yuma_featured_column_options', array( 
		2 		=> esc_html__( 'Two Column', 'yuma' ),
		3 		=> esc_html__( 'Three Column', 'yuma' ),
	) ),
	'active_callback'	=> 'yuma_featured_section_enable',
) );

// featured content type control and setting
$wp_customize->add_setting( 'yuma_theme_options[featured_content_type]', array(
	'default'          	=> yuma_theme_option('featured_content_type'),
	'sanitize_callback' => 'yuma_sanitize_select',
) );

$wp_customize->add_control( 'yuma_theme_options[featured_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'yuma' ),
	'section'           => 'yuma_featured_section',
	'type'				=> 'select',
	'choices'			=> apply_filters( 'yuma_featured_content_type_options', array( 
		'post' 		=> esc_html__( 'Post', 'yuma' ),
	) ),
	'active_callback'	=> 'yuma_featured_section_enable',
) );

// featured count control and setting
$wp_customize->add_setting( 'yuma_theme_options[featured_count]', array(
	'default'          	=> yuma_theme_option('featured_count'),
	'sanitize_callback' => 'yuma_sanitize_number_range',
	'validate_callback' => 'yuma_validate_featured_count',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'yuma_theme_options[featured_count]', array(
	'label'             => esc_html__( 'Number of Featured Posts', 'yuma' ),
	'description'       => esc_html__( 'Note: Min 2 & Max 3. Please refresh the page to see the change.', 'yuma' ),
	'section'           => 'yuma_featured_section',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 2,
		'max'	=> 3,
		),
	'active_callback'	=> 'yuma_featured_section_enable',
) );

for ( $i = 1; $i <= yuma_theme_option('featured_count'); $i++ ) :

	// featured posts drop down chooser control and setting
	$wp_customize->add_setting( 'yuma_theme_options[featured_content_post_' . $i . ']', array(
		'sanitize_callback' => 'yuma_sanitize_page_post',
	) );

	$wp_customize->add_control( new Yuma_Dropdown_Chosen_Control( $wp_customize, 'yuma_theme_options[featured_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'yuma' ), $i ),
		'section'           => 'yuma_featured_section',
		'choices'			=> yuma_post_choices(),
		'active_callback'	=> 'yuma_featured_content_post_enable',
	) ) );

endfor;
