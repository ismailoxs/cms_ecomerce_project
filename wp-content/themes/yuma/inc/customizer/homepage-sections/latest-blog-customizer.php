<?php
/**
 * latest blog Customizer Options
 *
 * @package yuma
 */

// Add blog section
$wp_customize->add_section( 'yuma_latest_blog_section', array(
	'title'             => esc_html__( 'Latest Blog Section','yuma' ),
	'description'       => esc_html__( 'Note: Meta Data ( i.e. Category, Author, Date ) Enable/Disable option works along with Inner Archive page. To edit, please go to Inner Page Options -> Archive Page Settings.', 'yuma' ),
	'panel'             => 'yuma_homepage_sections_panel',
) );

// latest blog menu enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_latest_blog]', array(
	'default'           => yuma_theme_option('enable_latest_blog'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_latest_blog]', array(
	'label'             => esc_html__( 'Enable Latest Blog', 'yuma' ),
	'section'           => 'yuma_latest_blog_section',
	'on_off_label' 		=> yuma_show_options(),
) ) );

// latest blog enable before element setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_blog_before_element]', array(
	'default'           => yuma_theme_option('enable_blog_before_element'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_blog_before_element]', array(
	'label'             => esc_html__( 'Enable Title Bar', 'yuma' ),
	'section'           => 'yuma_latest_blog_section',
	'on_off_label' 		=> yuma_show_options(),
	'active_callback'	=> 'yuma_blog_section_enable',
) ) );

// blog title bar color control and setting
$wp_customize->add_setting( 'yuma_theme_options[blog_title_bar_color]', array(
	'default'           => '#eba54c',
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'yuma_theme_options[blog_title_bar_color]', array(
	'label'    => esc_html__( 'Title Bar Color', 'yuma' ),
	'section'  => 'yuma_latest_blog_section',
	'active_callback' => 'yuma_blog_title_bar_enable',
) ) );

// latest blog title drop down chooser control and setting
$wp_customize->add_setting( 'yuma_theme_options[latest_blog_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'          	=> yuma_theme_option( 'latest_blog_title' ),
) );

$wp_customize->add_control( 'yuma_theme_options[latest_blog_title]', array(
	'label'             => esc_html__( 'Latest Blog Title', 'yuma' ),
	'section'           => 'yuma_latest_blog_section',
	'type'				=> 'text',
	'active_callback'	=> 'yuma_blog_section_enable',
) );

// latest blog image size control and setting
$wp_customize->add_setting( 'yuma_theme_options[blog_image_size]', array(
	'default'          	=> yuma_theme_option('blog_image_size'),
	'sanitize_callback' => 'yuma_sanitize_select',
) );

$wp_customize->add_control( 'yuma_theme_options[blog_image_size]', array(
	'label'             => esc_html__( 'Image Size', 'yuma' ),
	'section'           => 'yuma_latest_blog_section',
	'type'				=> 'select',
	'choices'			=> yuma_get_all_image_sizes(),
	'active_callback'	=> 'yuma_blog_section_enable',
) );

// alignment control and setting
$wp_customize->add_setting( 'yuma_theme_options[blog_layout]', array(
	'default'          	=> yuma_theme_option('blog_layout'),
	'sanitize_callback' => 'yuma_sanitize_select',
) );

$wp_customize->add_control( 'yuma_theme_options[blog_layout]', array(
	'label'             => esc_html__( 'Layout', 'yuma' ),
	'section'           => 'yuma_latest_blog_section',
	'type'				=> 'select',
	'choices'			=> apply_filters( 'yuma_blog_layout_options', array( 
		'left-align' 		=> esc_html__( 'Left Align', 'yuma' ),
		'center-align' 		=> esc_html__( 'Center Align', 'yuma' ),
		'image-focus' 		=> esc_html__( 'Image Focus', 'yuma' ),
		'image-focus-dark' 		=> esc_html__( 'Image Focus Dark', 'yuma' ),
	) ),
	'active_callback'	=> 'yuma_blog_section_enable',
) );

// column control and setting
$wp_customize->add_setting( 'yuma_theme_options[blog_column_type]', array(
	'default'          	=> yuma_theme_option('blog_column_type'),
	'sanitize_callback' => 'yuma_sanitize_select',
) );

$wp_customize->add_control( 'yuma_theme_options[blog_column_type]', array(
	'label'             => esc_html__( 'Column', 'yuma' ),
	'description'       => esc_html__( 'Note: While selecting One Column ZigZag/Horizontal, make sure you set Layout: Left/Center Align', 'yuma' ),
	'section'           => 'yuma_latest_blog_section',
	'type'				=> 'select',
	'choices'			=> apply_filters( 'yuma_blog_column_type_options', array( 
		'column-1' 		=> esc_html__( 'One Column', 'yuma' ),
		'column-2' 		=> esc_html__( 'Two Column', 'yuma' ),
		'column-3' 		=> esc_html__( 'Three Column', 'yuma' ),
	) ),
	'active_callback'	=> 'yuma_blog_section_enable',
) );

// pagination control and setting
$wp_customize->add_setting( 'yuma_theme_options[blog_pagination_type]', array(
	'default'          	=> yuma_theme_option('blog_pagination_type'),
	'sanitize_callback' => 'yuma_sanitize_select',
) );

$wp_customize->add_control( 'yuma_theme_options[blog_pagination_type]', array(
	'label'             => esc_html__( 'Pagination Type', 'yuma' ),
	'section'           => 'yuma_latest_blog_section',
	'type'				=> 'select',
	'choices'			=> apply_filters( 'yuma_blog_pagination_type_options', array( 
		'default' 		=> esc_html__( 'Default', 'yuma' ),
		'numeric' 		=> esc_html__( 'Numeric', 'yuma' ),
	) ),
	'active_callback'	=> 'yuma_blog_section_enable',
) );

// filter control and setting
$wp_customize->add_setting( 'yuma_theme_options[filter_blog_posts]', array(
	'default'          	=> yuma_theme_option('filter_blog_posts'),
	'sanitize_callback' => 'yuma_sanitize_select',
) );

$wp_customize->add_control( 'yuma_theme_options[filter_blog_posts]', array(
	'label'             => esc_html__( 'Filter Posts By', 'yuma' ),
	'section'           => 'yuma_latest_blog_section',
	'type'				=> 'select',
	'choices'			=> apply_filters( 'yuma_blog_filter_options', array( 
		'category' 		=> esc_html__( 'Category', 'yuma' ),
		'none' 			=> esc_html__( 'None', 'yuma' ),
	) ),
	'active_callback'	=> 'yuma_blog_section_enable',
) );

// category drop down chooser control and setting
$wp_customize->add_setting( 'yuma_theme_options[blog_filter_category]', array(
	'sanitize_callback' => 'yuma_sanitize_multiple_absint',
) );

$wp_customize->add_control( new Yuma_Dropdown_Multiple_Chosen_Control( $wp_customize, 'yuma_theme_options[blog_filter_category]', array(
	'label'             => esc_html__( 'Select Filter Categories', 'yuma' ),
	'section'           => 'yuma_latest_blog_section',
	'choices'			=> yuma_category_choices(),
	'active_callback'	=> 'yuma_blog_filter_category',
) ) );

// latest blog enable masonry element setting and control.
$wp_customize->add_setting( 'yuma_theme_options[enable_latest_blog_masonry]', array(
	'default'           => yuma_theme_option('enable_latest_blog_masonry'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[enable_latest_blog_masonry]', array(
	'label'             => esc_html__( 'Enable Masonry Layout', 'yuma' ),
	'section'           => 'yuma_latest_blog_section',
	'on_off_label' 		=> yuma_show_options(),
	'active_callback'	=> 'yuma_blog_section_enable',
) ) );

// latest blog menu enable setting and control.
$wp_customize->add_setting( 'yuma_theme_options[latest_blog_sidebar]', array(
	'default'           => yuma_theme_option('latest_blog_sidebar'),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[latest_blog_sidebar]', array(
	'label'             => esc_html__( 'Enable Sidebar', 'yuma' ),
	'section'           => 'yuma_latest_blog_section',
	'on_off_label' 		=> yuma_show_options(),
	'active_callback'	=> 'yuma_blog_section_enable',
) ) );

// Latest blog date meta setting and control.
$wp_customize->add_setting( 'yuma_theme_options[latest_blog_show_date]', array(
	'default'           => yuma_theme_option( 'latest_blog_show_date' ),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[latest_blog_show_date]', array(
	'label'             => esc_html__( 'Show Date', 'yuma' ),
	'section'           => 'yuma_latest_blog_section',
	'on_off_label' 		=> yuma_show_options(),
	'active_callback'	=> 'yuma_blog_section_enable',
) ) );

// Latest blog category meta setting and control.
$wp_customize->add_setting( 'yuma_theme_options[latest_blog_show_category]', array(
	'default'           => yuma_theme_option( 'latest_blog_show_category' ),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[latest_blog_show_category]', array(
	'label'             => esc_html__( 'Show Category', 'yuma' ),
	'section'           => 'yuma_latest_blog_section',
	'on_off_label' 		=> yuma_show_options(),
	'active_callback'	=> 'yuma_blog_section_enable',
) ) );

// Latest blog author meta setting and control.
$wp_customize->add_setting( 'yuma_theme_options[latest_blog_show_author]', array(
	'default'           => yuma_theme_option( 'latest_blog_show_author' ),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[latest_blog_show_author]', array(
	'label'             => esc_html__( 'Show Author', 'yuma' ),
	'section'           => 'yuma_latest_blog_section',
	'on_off_label' 		=> yuma_show_options(),
	'active_callback'	=> 'yuma_blog_section_enable',
) ) );

// Latest blog read time meta setting and control.
$wp_customize->add_setting( 'yuma_theme_options[latest_blog_show_read_time]', array(
	'default'           => yuma_theme_option( 'latest_blog_show_read_time' ),
	'sanitize_callback' => 'yuma_switch_sanitization',
) );

$wp_customize->add_control( new Yuma_Toggle_Switch_Custom_control( $wp_customize, 'yuma_theme_options[latest_blog_show_read_time]', array(
	'label'             => esc_html__( 'Show Read Time', 'yuma' ),
	'section'           => 'yuma_latest_blog_section',
	'on_off_label' 		=> yuma_show_options(),
	'active_callback'	=> 'yuma_blog_section_enable',
) ) );
