<?php
/**
 * Featured Categories Customizer Options
 *
 * @package yuma
 */

// Add featured_categories section
$wp_customize->add_section( 'yuma_featured_categories_section', array(
	'title'             => esc_html__( 'Featured Categories Section','yuma' ),
	'description'       => esc_html__( 'Featured Categories Setting Options', 'yuma' ),
	'panel'             => 'yuma_homepage_sections_panel',
) );

// featured_categories enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_featured_categories]', array(
	'default'           => yuma_theme_option('enable_featured_categories'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_featured_categories]', array(
	'label'             => esc_html__( 'Enable Featured Categories', 'yuma' ),
	'section'           => 'yuma_featured_categories_section',
	'on_off_label' 		=> yuma_show_options(),
) ) );

// featured_categories post count enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[featured_categories_post_count]', array(
	'default'           => yuma_theme_option('featured_categories_post_count'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[featured_categories_post_count]', array(
	'label'             => esc_html__( 'Show Post Count', 'yuma' ),
	'section'           => 'yuma_featured_categories_section',
	'on_off_label' 		=> yuma_show_options(),
	'active_callback'	=> 'yuma_featured_categories_section_enable',
) ) );

// featured_categories trasnition control and setting
$wp_customize->add_setting( 'yuma_theme_options[featured_categories_width]', array(
	'default'          	=> yuma_theme_option('featured_categories_width'),
	'sanitize_callback' => 'yuma_radio_sanitization',
) );

$wp_customize->add_control( new Yuma_Text_Radio_Button_Custom_Control( $wp_customize, 'yuma_theme_options[featured_categories_width]',
	array(
	'label'             => esc_html__( 'Content Width', 'yuma' ),
	'section'           => 'yuma_featured_categories_section',
	'choices'			=> apply_filters( 'yuma_featured_categories_content_width_options', array( 
		'full-width' 		=> esc_html__( 'Full', 'yuma' ),
		'container-width' 	=> esc_html__( 'Container', 'yuma' ),
	) ),
	'active_callback'	=> 'yuma_featured_categories_section_enable',
) ) );

// featured_categories alignment control and setting
$wp_customize->add_setting( 'yuma_theme_options[featured_categories_alignment]', array(
	'default'          	=> yuma_theme_option('featured_categories_alignment'),
	'sanitize_callback' => 'yuma_radio_sanitization',
) );

$wp_customize->add_control( new Yuma_Text_Radio_Button_Custom_Control( $wp_customize, 'yuma_theme_options[featured_categories_alignment]',
	array(
	'label'             => esc_html__( 'Text Alignment', 'yuma' ),
	'section'           => 'yuma_featured_categories_section',
	'choices'			=> apply_filters( 'yuma_featured_categories_alignment_options', array( 
		'left-align' 		=> esc_html__( 'Left', 'yuma' ),
	) ),
	'active_callback'	=> 'yuma_featured_categories_section_enable',
) ) );

// featured_categories layout control and setting
$wp_customize->add_setting( 'yuma_theme_options[featured_categories_layout]', array(
	'default'          	=> yuma_theme_option('featured_categories_layout'),
	'sanitize_callback' => 'yuma_radio_sanitization',
) );

$wp_customize->add_control( new Yuma_Text_Radio_Button_Custom_Control( $wp_customize, 'yuma_theme_options[featured_categories_layout]',
	array(
	'label'             => esc_html__( 'Layout', 'yuma' ),
	'section'           => 'yuma_featured_categories_section',
	'choices'			=> apply_filters( 'yuma_featured_categories_layout_options', array( 
		'no-gap' 		=> esc_html__( 'No Gap', 'yuma' ),
	) ),
	'active_callback'	=> 'yuma_featured_categories_section_enable',
) ) );

// featured_categories overlay control and setting
$wp_customize->add_setting( 'yuma_theme_options[featured_categories_overlay]', array(
	'default'           => 'rgba(0,0,0,0.1)',
	'sanitize_callback' => 'yuma_hex_rgba_sanitization', 
) );

$wp_customize->add_control( new Yuma_Customize_Alpha_Color_Control( $wp_customize, 'yuma_theme_options[featured_categories_overlay]',
	array(
		'label'    => esc_html__( 'Image Overlay Color', 'yuma' ),
		'section' => 'yuma_featured_categories_section',
		'show_opacity' => true,
		'active_callback'	=> 'yuma_featured_categories_section_enable',
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

// featured_categories overlay control and setting
$wp_customize->add_setting( 'yuma_theme_options[featured_categories_overlay_hover]', array(
	'default'           => 'rgba(0,0,0,0.3)',
	'sanitize_callback' => 'yuma_hex_rgba_sanitization', 
) );

$wp_customize->add_control( new Yuma_Customize_Alpha_Color_Control( $wp_customize, 'yuma_theme_options[featured_categories_overlay_hover]',
	array(
		'label'    => esc_html__( 'Image Overlay Color:Hover', 'yuma' ),
		'section' => 'yuma_featured_categories_section',
		'show_opacity' => true,
		'active_callback'	=> 'yuma_featured_categories_section_enable',
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

// featured_categories trasnition control and setting
$wp_customize->add_setting( 'yuma_theme_options[featured_categories_column]', array(
	'default'          	=> yuma_theme_option('featured_categories_column'),
	'sanitize_callback' => 'yuma_sanitize_select',
) );

$wp_customize->add_control( 'yuma_theme_options[featured_categories_column]', array(
	'label'             => esc_html__( 'Column', 'yuma' ),
	'section'           => 'yuma_featured_categories_section',
	'type'				=> 'select',
	'choices'			=> apply_filters( 'yuma_featured_categories_column_options', array( 
		3 		=> esc_html__( 'Three Column', 'yuma' ),
		4 		=> esc_html__( 'Four Column', 'yuma' ),
	) ),
	'active_callback'	=> 'yuma_featured_categories_section_enable',
) );

// featured_categories count control and setting
$wp_customize->add_setting( 'yuma_theme_options[featured_categories_count]', array(
	'default'          	=> yuma_theme_option('featured_categories_count'),
	'sanitize_callback' => 'yuma_sanitize_number_range',
	'validate_callback' => 'yuma_validate_featured_categories_count',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'yuma_theme_options[featured_categories_count]', array(
	'label'             => esc_html__( 'Number of Featured Categories', 'yuma' ),
	'description'       => esc_html__( 'Note: Min 3 & Max 4. Please refresh the page to see the change.', 'yuma' ),
	'section'           => 'yuma_featured_categories_section',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 3,
		'max'	=> 4,
		),
	'active_callback'	=> 'yuma_featured_categories_section_enable',
) );

for ( $i = 1; $i <= yuma_theme_option('featured_categories_count'); $i++ ) :

	// featured_categories posts drop down chooser control and setting
	$wp_customize->add_setting( 'yuma_theme_options[featured_categories_content_category_' . $i . ']', array(
		'sanitize_callback' => 'yuma_sanitize_category',
	) );

	$wp_customize->add_control( new Yuma_Dropdown_Chosen_Control( $wp_customize, 'yuma_theme_options[featured_categories_content_category_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Category %d', 'yuma' ), $i ),
		'section'           => 'yuma_featured_categories_section',
		'choices'			=> yuma_category_choices(),
		'active_callback'	=> 'yuma_featured_categories_section_enable',
	) ) );

	// Client additional image setting and control.
	$wp_customize->add_setting( 'yuma_theme_options[featured_categories_category_image_' . $i . ']', array(
		'sanitize_callback' => 'yuma_sanitize_image',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'yuma_theme_options[featured_categories_category_image_' . $i . ']',
			array(
			'label'       		=> sprintf( esc_html__( 'Select Image %d', 'yuma' ), $i ),
			'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'yuma' ), 600, 800 ),
			'section'     		=> 'yuma_featured_categories_section',
			'active_callback'	=> 'yuma_featured_categories_section_enable',
	) ) );

	// featured_categories hr control and setting
	$wp_customize->add_setting( 'yuma_theme_options[featured_categories_custom_hr_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new Yuma_Horizontal_Line( $wp_customize, 'yuma_theme_options[featured_categories_custom_hr_' . $i . ']', array(
		'section'           => 'yuma_featured_categories_section',
		'active_callback'	=> 'yuma_featured_categories_section_enable',
	) ) );

endfor;
