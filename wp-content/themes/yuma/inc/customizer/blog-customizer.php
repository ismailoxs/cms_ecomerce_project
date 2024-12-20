<?php
/**
 * Blog / Archive / Search Customizer Options
 *
 * @package yuma
 */

// Add blog section
$wp_customize->add_section( 'yuma_blog_section', array(
	'title'             => esc_html__( 'Archive Page Setting','yuma' ),
	'description'       => esc_html__( 'Archive/Search Page Setting Options', 'yuma' ),
	'panel'             => 'yuma_theme_options_panel',
) );

// blog additional image setting and control.
$wp_customize->add_setting( 'yuma_theme_options[blog_header_image]', array(
	'sanitize_callback' => 'yuma_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'yuma_theme_options[blog_header_image]',
	array(
	'label'       		=> esc_html__( 'Featured Banner Image', 'yuma' ),
	'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx. Note: Note: Make sure you set placeholder banner image when Absolute Header Position is enabled.', 'yuma' ), 1920, 800 ),
	'section'     		=> 'yuma_blog_section',
) ) );

// archive banner overlay color control and setting
$wp_customize->add_setting( 'yuma_theme_options[archive_header_image_overlay_color]', array(
	'default'           => 'rgba(0,0,0,0.1)',
	'sanitize_callback' => 'yuma_hex_rgba_sanitization', 
) );

$wp_customize->add_control( new Yuma_Customize_Alpha_Color_Control( $wp_customize, 'yuma_theme_options[archive_header_image_overlay_color]',
	array(
		'label'    => esc_html__( 'Featured Banner Overlay Color', 'yuma' ),
		'section'     		=> 'yuma_blog_section',
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

// Archive enable header details on banner setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_blog_title_banner]', array(
	'default'           => yuma_theme_option('enable_blog_title_banner'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_blog_title_banner]', array(
	'label'             => esc_html__( 'Show Page Title in Banner', 'yuma' ),
	'section'           => 'yuma_blog_section',
	'on_off_label' 		=> yuma_show_options(),
) ) );

// Archive header details alignment setting and control.
$wp_customize->add_setting( 'yuma_theme_options[blog_title_alignment]',
	array(
		'default' => yuma_theme_option('blog_title_alignment'),
		'sanitize_callback' => 'yuma_radio_sanitization'
	)
);

$wp_customize->add_control( new Yuma_Text_Radio_Button_Custom_Control( $wp_customize, 'yuma_theme_options[blog_title_alignment]',
	array(
		'label' => esc_html__( 'Page Title Alignment', 'yuma' ),
		'section'     		=> 'yuma_blog_section',
		'active_callback'	=> 'yuma_blog_title_banner_enable',
		'choices' => array(
			'left-align' 		=> esc_html__( 'Left', 'yuma' ),
			'center-align' 		=> esc_html__( 'Center', 'yuma'  ),
			'right-align' 		=> esc_html__( 'Right', 'yuma'  ),
		),
	)
) );

// sidebar layout setting and control.
$wp_customize->add_setting( 'yuma_theme_options[sidebar_layout]', array(
	'sanitize_callback'   => 'yuma_sanitize_select',
	'default'             => yuma_theme_option('sidebar_layout'),
) );

$wp_customize->add_control(  new Yuma_Radio_Image_Control( $wp_customize, 'yuma_theme_options[sidebar_layout]', array(
	'label'               => esc_html__( 'Sidebar Layout', 'yuma' ),
	'section'             => 'yuma_blog_section',
	'choices'			  => yuma_sidebar_position(),
) ) );

// archive image size control and setting
$wp_customize->add_setting( 'yuma_theme_options[archive_image_size]', array(
	'default'          	=> yuma_theme_option('archive_image_size'),
	'sanitize_callback' => 'yuma_sanitize_select',
) );

$wp_customize->add_control( 'yuma_theme_options[archive_image_size]', array(
	'label'             => esc_html__( 'Image Size', 'yuma' ),
	'section'           => 'yuma_blog_section',
	'type'				=> 'select',
	'choices'			=> yuma_get_all_image_sizes(),
) );

// alignment control and setting
$wp_customize->add_setting( 'yuma_theme_options[archive_layout]', array(
	'default'          	=> yuma_theme_option('archive_layout'),
	'sanitize_callback' => 'yuma_sanitize_select',
) );

$wp_customize->add_control( 'yuma_theme_options[archive_layout]', array(
	'label'             => esc_html__( 'Layout', 'yuma' ),
	'section'           => 'yuma_blog_section',
	'type'				=> 'select',
	'choices'			=> apply_filters( 'yuma_archive_layout_options', array( 
		'left-align' 		=> esc_html__( 'Left Align', 'yuma' ),
		'center-align' 		=> esc_html__( 'Center Align', 'yuma' ),
	) ),
) );

// column control and setting
$wp_customize->add_setting( 'yuma_theme_options[column_type]', array(
	'default'          	=> yuma_theme_option('column_type'),
	'sanitize_callback' => 'yuma_sanitize_select',
) );

$wp_customize->add_control( 'yuma_theme_options[column_type]', array(
	'label'             => esc_html__( 'Column Layout', 'yuma' ),
	'description'         => esc_html__( 'Note: Option for Archive and Search Page.', 'yuma' ),
	'section'           => 'yuma_blog_section',
	'type'				=> 'select',
	'choices'			=> apply_filters( 'yuma_column_type_options', array( 
		'column-1' 		=> esc_html__( 'One Column', 'yuma' ),
		'column-2' 		=> esc_html__( 'Two Column', 'yuma' ),
	) ),
) );

// pagination control and setting
$wp_customize->add_setting( 'yuma_theme_options[pagination_type]', array(
	'default'          	=> yuma_theme_option('pagination_type'),
	'sanitize_callback' => 'yuma_sanitize_select',
) );

$wp_customize->add_control( 'yuma_theme_options[pagination_type]', array(
	'label'             => esc_html__( 'Pagination Type', 'yuma' ),
	'section'           => 'yuma_blog_section',
	'type'				=> 'select',
	'choices'			=> apply_filters( 'yuma_pagination_type_options', array( 
		'default' 		=> esc_html__( 'Default', 'yuma' ),
		'numeric' 		=> esc_html__( 'Numeric', 'yuma' ),
	) ),
) );

// excerpt count control and setting
$wp_customize->add_setting( 'yuma_theme_options[excerpt_count]', array(
	'default'          	=> yuma_theme_option('excerpt_count'),
	'sanitize_callback' => 'yuma_sanitize_number_range',
	'validate_callback' => 'yuma_validate_excerpt_count',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'yuma_theme_options[excerpt_count]', array(
	'label'             => esc_html__( 'Excerpt Length', 'yuma' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 50.', 'yuma' ),
	'section'           => 'yuma_blog_section',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 50,
		),
) );

// Archive enable taxonomy prefix setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_blog_prefix]', array(
	'default'           => yuma_theme_option('enable_blog_prefix'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_blog_prefix]', array(
	'label'             => esc_html__( 'Enable Taxonomy Prefix', 'yuma' ),
	'section'           => 'yuma_blog_section',
	'on_off_label' 		=> yuma_show_options(),
) ) );

// Archive enable masonry setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_blog_masonry]', array(
	'default'           => yuma_theme_option('enable_blog_masonry'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_blog_masonry]', array(
	'label'             => esc_html__( 'Enable Masonry Layout', 'yuma' ),
	'section'           => 'yuma_blog_section',
	'on_off_label' 		=> yuma_show_options(),
) ) );

// Archive breadcrumb meta setting and control.
$wp_customize->add_setting( 'yuma_theme_options[show_breadcrumb]', array(
	'default'           => yuma_theme_option( 'show_breadcrumb' ),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[show_breadcrumb]', array(
	'label'             => esc_html__( 'Show Breadcrumb', 'yuma' ),
	'section'           => 'yuma_blog_section',
	'on_off_label' 		=> yuma_show_options(),
) ) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'yuma_theme_options[show_date]', array(
	'default'           => yuma_theme_option( 'show_date' ),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[show_date]', array(
	'label'             => esc_html__( 'Show Date', 'yuma' ),
	'section'           => 'yuma_blog_section',
	'on_off_label' 		=> yuma_show_options(),
) ) );

// Archive category meta setting and control.
$wp_customize->add_setting( 'yuma_theme_options[show_category]', array(
	'default'           => yuma_theme_option( 'show_category' ),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[show_category]', array(
	'label'             => esc_html__( 'Show Category', 'yuma' ),
	'section'           => 'yuma_blog_section',
	'on_off_label' 		=> yuma_show_options(),
) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'yuma_theme_options[show_author]', array(
	'default'           => yuma_theme_option( 'show_author' ),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[show_author]', array(
	'label'             => esc_html__( 'Show Author', 'yuma' ),
	'section'           => 'yuma_blog_section',
	'on_off_label' 		=> yuma_show_options(),
) ) );

// Archive read time meta setting and control.
$wp_customize->add_setting( 'yuma_theme_options[show_read_time]', array(
	'default'           => yuma_theme_option( 'show_read_time' ),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[show_read_time]', array(
	'label'             => esc_html__( 'Show Read Time', 'yuma' ),
	'section'           => 'yuma_blog_section',
	'on_off_label' 		=> yuma_show_options(),
) ) );
