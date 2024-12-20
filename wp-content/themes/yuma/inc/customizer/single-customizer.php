<?php
/**
 * Single Post Customizer Options
 *
 * @package yuma
 */

// Add excerpt section
$wp_customize->add_section( 'yuma_single_section', array(
	'title'             => esc_html__( 'Single Post Setting','yuma' ),
	'description'       => esc_html__( 'Single Post Setting Options', 'yuma' ),
	'panel'             => 'yuma_theme_options_panel',
) );

// single featured image setting and control.
$wp_customize->add_setting( 'yuma_theme_options[show_single_image]', array(
	'default'           => yuma_theme_option( 'show_single_image' ),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[show_single_image]', array(
	'label'             => esc_html__( 'Show Featured Image', 'yuma' ),
	'section'           => 'yuma_single_section',
	'on_off_label' 		=> yuma_show_options(),
) ) );

// single featured image setting and control.
$wp_customize->add_setting( 'yuma_theme_options[single_header_image_size]',
	array(
		'default' => yuma_theme_option('single_header_image_size'),
		'sanitize_callback' => 'yuma_radio_sanitization'
	)
);

$wp_customize->add_control( new Yuma_Text_Radio_Button_Custom_Control( $wp_customize, 'yuma_theme_options[single_header_image_size]',
	array(
		'label' => esc_html__( 'Featured Image Size', 'yuma' ),
		'section'     		=> 'yuma_single_section',
		'active_callback'	=> 'yuma_single_featured_image_enable',
		'choices' => array(
			'original-size' 		=> esc_html__( 'Original', 'yuma' ),
			'full-width-size' 		=> esc_html__( 'Full Width', 'yuma'  ),
		),
	)
) );

// single featured image setting and control.
$wp_customize->add_setting( 'yuma_theme_options[single_header_image_layout]',
	array(
		'default' => yuma_theme_option('single_header_image_layout'),
		'sanitize_callback' => 'yuma_radio_sanitization'
	)
);

$wp_customize->add_control( new Yuma_Text_Radio_Button_Custom_Control( $wp_customize, 'yuma_theme_options[single_header_image_layout]',
	array(
		'label' => esc_html__( 'Featured Image Placement', 'yuma' ),
		'description' => esc_html__( 'Note: Make sure you select Banner and set placeholder banner image when Absolute Header Position is enabled.', 'yuma' ),
		'section'     		=> 'yuma_single_section',
		'active_callback'	=> 'yuma_single_featured_image_enable',
		'choices' => array(
			'banner-featured-image' 		=> esc_html__( 'Banner', 'yuma' ),
			'content-featured-image' 		=> esc_html__( 'With Content', 'yuma'  ),
		),
	)
) );

// single additional image setting and control.
$wp_customize->add_setting( 'yuma_theme_options[single_header_image]', array(
	'sanitize_callback' => 'yuma_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'yuma_theme_options[single_header_image]',
	array(
	'label'       		=> esc_html__( 'Featured Banner Image', 'yuma' ),
	'description' 		=> sprintf( esc_html__( 'Note: Visible when featured image is not set. Recommended size: %1$dpx x %2$dpx ', 'yuma' ), 1920, 800 ),
	'section'     		=> 'yuma_single_section',
	'active_callback'	=> 'yuma_single_featured_image_banner_enable',
) ) );

// single banner overlay color control and setting
$wp_customize->add_setting( 'yuma_theme_options[single_header_image_overlay_color]', array(
	'default'           => 'rgba(0,0,0,0.1)',
	'sanitize_callback' => 'yuma_hex_rgba_sanitization', 
) );

$wp_customize->add_control( new Yuma_Customize_Alpha_Color_Control( $wp_customize, 'yuma_theme_options[single_header_image_overlay_color]',
	array(
		'label'    => esc_html__( 'Featured Banner Overlay Color', 'yuma' ),
		'section'     		=> 'yuma_single_section',
		'active_callback'	=> 'yuma_single_featured_image_banner_enable',
		'show_opacity' => true,
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

// single banner max height control and setting
$wp_customize->add_setting( 'yuma_theme_options[single_header_image_max_height]', array(
	'default' => yuma_theme_option('single_header_image_max_height'),
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( new Yuma_Slider_Custom_Control( $wp_customize, 'yuma_theme_options[single_header_image_max_height]', 
	array(
		'label' => esc_html__( 'Featured Banner Max Height (px)', 'yuma' ),
		'section'     		=> 'yuma_single_section',
		'active_callback'	=> 'yuma_single_featured_image_banner_enable',
		'input_attrs' => array(
			'min' => 100,
			'max' => 1000,
			'step' => 1,
		),
	)
) );

// single banner image position setting and control.
$wp_customize->add_setting( 'yuma_theme_options[single_header_image_position]',
	array(
		'default' => yuma_theme_option('single_header_image_position'),
		'sanitize_callback' => 'yuma_radio_sanitization'
	)
);

$wp_customize->add_control( new Yuma_Text_Radio_Button_Custom_Control( $wp_customize, 'yuma_theme_options[single_header_image_position]',
	array(
		'label' => esc_html__( 'Featured Banner Image Position', 'yuma' ),
		'section'     		=> 'yuma_single_section',
		'active_callback'	=> 'yuma_single_featured_image_banner_enable',
		'choices' => array(
			'top' 		=> esc_html__( 'Top', 'yuma' ),
			'center' 	=> esc_html__( 'Center', 'yuma'  ),
			'bottom' 	=> esc_html__( 'Bottom', 'yuma'  ),
		),
	)
) );

// single enable header details on banner setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_single_title_banner]', array(
	'default'           => yuma_theme_option('enable_single_title_banner'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_single_title_banner]', array(
	'label'             => esc_html__( 'Show Page Title in Banner', 'yuma' ),
	'section'           => 'yuma_single_section',
	'on_off_label' 		=> yuma_show_options(),
	'active_callback'	=> 'yuma_single_featured_image_enable',
) ) );

// single header details alignment setting and control.
$wp_customize->add_setting( 'yuma_theme_options[single_title_alignment]',
	array(
		'default' => yuma_theme_option('single_title_alignment'),
		'sanitize_callback' => 'yuma_radio_sanitization'
	)
);

$wp_customize->add_control( new Yuma_Text_Radio_Button_Custom_Control( $wp_customize, 'yuma_theme_options[single_title_alignment]',
	array(
		'label' => esc_html__( 'Page Title Alignment', 'yuma' ),
		'section'     		=> 'yuma_single_section',
		'active_callback'	=> 'yuma_single_title_banner_enable',
		'choices' => array(
			'left-align' 		=> esc_html__( 'Left', 'yuma' ),
			'center-align' 		=> esc_html__( 'Center', 'yuma'  ),
			'right-align' 		=> esc_html__( 'Right', 'yuma'  ),
		),
	)
) );

// sidebar layout setting and control.
$wp_customize->add_setting( 'yuma_theme_options[sidebar_single_layout]', array(
	'sanitize_callback'   => 'yuma_sanitize_select',
	'default'             => yuma_theme_option('sidebar_single_layout'),
) );

$wp_customize->add_control(  new Yuma_Radio_Image_Control ( $wp_customize, 'yuma_theme_options[sidebar_single_layout]', array(
	'label'               => esc_html__( 'Sidebar Layout', 'yuma' ),
	'section'             => 'yuma_single_section',
	'choices'			  => yuma_sidebar_position(),
) ) );

// single breadcrumb setting and control.
$wp_customize->add_setting( 'yuma_theme_options[show_single_breadcrumb]', array(
	'default'           => yuma_theme_option( 'show_single_breadcrumb' ),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[show_single_breadcrumb]', array(
	'label'             => esc_html__( 'Show Breadcrumb', 'yuma' ),
	'section'           => 'yuma_single_section',
	'on_off_label' 		=> yuma_show_options(),
) ) );

// single date meta setting and control.
$wp_customize->add_setting( 'yuma_theme_options[show_single_date]', array(
	'default'           => yuma_theme_option( 'show_single_date' ),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[show_single_date]', array(
	'label'             => esc_html__( 'Show Date', 'yuma' ),
	'section'           => 'yuma_single_section',
	'on_off_label' 		=> yuma_show_options(),
) ) );

// single category meta setting and control.
$wp_customize->add_setting( 'yuma_theme_options[show_single_category]', array(
	'default'           => yuma_theme_option( 'show_single_category' ),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[show_single_category]', array(
	'label'             => esc_html__( 'Show Category', 'yuma' ),
	'section'           => 'yuma_single_section',
	'on_off_label' 		=> yuma_show_options(),
) ) );

// single category meta setting and control.
$wp_customize->add_setting( 'yuma_theme_options[show_single_tags]', array(
	'default'           => yuma_theme_option( 'show_single_tags' ),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[show_single_tags]', array(
	'label'             => esc_html__( 'Show Tags', 'yuma' ),
	'section'           => 'yuma_single_section',
	'on_off_label' 		=> yuma_show_options(),
) ) );

// single author meta setting and control.
$wp_customize->add_setting( 'yuma_theme_options[show_single_author]', array(
	'default'           => yuma_theme_option( 'show_single_author' ),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[show_single_author]', array(
	'label'             => esc_html__( 'Show Author', 'yuma' ),
	'section'           => 'yuma_single_section',
	'on_off_label' 		=> yuma_show_options(),
) ) );

// single pagination setting and control.
$wp_customize->add_setting( 'yuma_theme_options[show_single_pagination]', array(
	'default'           => yuma_theme_option( 'show_single_pagination' ),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[show_single_pagination]', array(
	'label'             => esc_html__( 'Show Pagination', 'yuma' ),
	'section'           => 'yuma_single_section',
	'on_off_label' 		=> yuma_show_options(),
) ) );

// single related posts setting and control.
$wp_customize->add_setting( 'yuma_theme_options[show_single_related_posts]', array(
	'default'           => yuma_theme_option( 'show_single_related_posts' ),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[show_single_related_posts]', array(
	'label'             => esc_html__( 'Show Related Posts', 'yuma' ),
	'section'           => 'yuma_single_section',
	'on_off_label' 		=> yuma_show_options(),
) ) );

// single related posts title setting and control.
$wp_customize->add_setting( 'yuma_theme_options[single_related_posts_title]', array(
	'default'           => yuma_theme_option( 'single_related_posts_title' ),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'yuma_theme_options[single_related_posts_title]', array(
	'label'             => esc_html__( 'Related Posts Title', 'yuma' ),
	'section'           => 'yuma_single_section',
	'type' 				=> 'text',
	'active_callback'	=> 'yuma_single_related_posts_enable',
) );
