<?php
/**
 * Default Theme Customizer Values
 *
 * @package yuma
 */

function yuma_get_default_theme_options() {
	$yuma_default_options = array(
		// default options

		// Top Bar
		'enable_topbar'			=> true,
		'topbar_address'		=> esc_html__( 'Durbar Marg, Kathmandu', 'yuma' ),
		'enable_topbar_address_style'	=> false,
		'topbar_time'			=> esc_html__( '10AM - 5PM, Mon - Fri', 'yuma' ),
		'enable_topbar_time_style'		=> false,
		'topbar_phone'			=> esc_html__( '+00 0 0000000', 'yuma' ),
		'enable_topbar_phone_style'		=> false,
		'topbar_email'			=> 'abc@sharkthemes.com',
		'enable_topbar_email_style'		=> false,
		'topbar_date_format'	=> 'layout-1',
		'enable_topbar_date_style'		=> false,
		'topbar_search_format'	=> 'search-icon',
		'enable_topbar_search_style'	=> false,
		'enable_topbar_woocart_item'	=> false,
		'enable_topbar_woocart_style'	=> false,
		'enable_topbar_social_menu_style'				=> false,

		// Top Bar Style
		'topbar_full_width'		=> false,
		'topbar_position_absolute'	=> false,
		'topbar_area'			=> 'equal',
		'topbar_height'			=> 50,
		'topbar_font_size'		=> 14,
		'topbar_border_height'	=> 0,
		'topbar_left_area_size'	=> 33,
		'topbar_center_area_size'	=> 33,
		'topbar_right_area_size'	=> 33,

		// Header Section
		'enable_header'			=> true,
		'header_left_element'	=> 'site_details',
		'header_right_element'	=> 'primary_menu',
		'header_site_details_logo_height' 	=> 80,
		'header_site_details_layout'	=> 'horizontal-site-details',
		'enable_header_site_details_title'			=> true,
		'enable_header_site_details_description'	=> true,
		'enable_header_social_menu_style'				=> false,
		'header_primary_menu_label'						=> esc_html__( 'Menu', 'yuma' ),
		'header_primary_menu_hover_style'				=> 'default',
		'enable_header_primary_menu_style'				=> false,
		'header_address_label'	=> esc_html__( 'Address', 'yuma' ),
		'header_address'		=> esc_html__( 'Durbar Marg, Kathmandu', 'yuma' ),
		'enable_header_address_style'	=> false,
		'header_time_label'	=> esc_html__( 'Time', 'yuma' ),
		'header_time'		=> esc_html__( '10AM - 5PM, Mon - Fri', 'yuma' ),
		'enable_header_time_style'	=> false,
		'header_phone_label'	=> esc_html__( 'Phone', 'yuma' ),
		'header_phone'			=> esc_html__( '+00 0 0000000', 'yuma' ),
		'enable_header_phone_style'		=> false,
		'header_email_label'	=> esc_html__( 'Email', 'yuma' ),
		'header_email'			=> 'abc@sharkthemes.com',
		'enable_header_email_style'		=> false,
		'enable_header_woocart_item'	=> false,
		'enable_header_woocart_style'	=> false,
		'header_woo_search_placeholder'	=> esc_html__( 'Search Products...', 'yuma' ),
		'enable_header_woo_search_style'	=> false,
		'header_search_format'			=> 'search-icon',
		'enable_header_search_style'	=> false,
		'header_button_label'	=> esc_html__( 'Buy Themes', 'yuma' ),
		'header_button_url'		=> esc_url_raw( 'https://yuma.sharkthemes.com/' ),
		'enable_header_button_style'	=> false,

		// Header Style
		'header_width'			=> 'normal-width',
		'header_position_absolute'	=> false,
		'header_area'			=> 'equal',
		'header_bg_image_size'	=> 'cover',
		'header_bg_image_repeat'	=> false,
		'header_bg_image_fixed'		=> false,
		'header_height'			=> 100,
		'header_margin'			=> 0,
		'header_font_size'		=> 17,
		'header_border_height'	=> 0,
		'header_left_area_size'	=> 33,
		'header_center_area_size'	=> 33,
		'header_right_area_size'	=> 33,
		'header_sticky'			=> false,

		// Navbar Section
		'enable_navbar'			=> true,
		'navbar_primary_menu_label'						=> esc_html__( 'Navbar Menu', 'yuma' ),
		'enable_navbar_primary_menu_style'				=> false,
		'navbar_search_format'			=> 'search-icon',
		'enable_navbar_search_style'	=> false,
		'enable_navbar_social_menu_style'				=> false,

		// Navbar Style
		'navbar_width'			=> 'normal-width',
		'navbar_position_absolute'	=> false,
		'navbar_area'			=> 'equal',
		'navbar_height'			=> 60,
		'navbar_margin'			=> 0,
		'navbar_border_radius'	=> 0,
		'navbar_font_size'		=> 16,
		'navbar_left_area_size'	=> 33,
		'navbar_center_area_size'	=> 33,
		'navbar_right_area_size'	=> 33,

		// Footer Section
		'enable_footer'			=> true,
		'footer_left_element'	=> 'custom_text',
		'enable_footer_menu_style'				=> false,
		'enable_footer_social_menu_style'				=> false,
		'slide_to_top'			=> true,
		'copyright_text'		=> esc_html__( 'Copyright &copy; 2022 | All Rights Reserved.', 'yuma' ),

		// Footer Style
		'footer_area'			=> 'equal',
		'footer_padding'		=> 30,
		'footer_font_size'		=> 14,
		'footer_left_area_size'	=> 33,
		'footer_center_area_size'	=> 33,
		'footer_right_area_size'	=> 33,
		'footer_widget_title_font_size'	=> 24,
		'footer_widget_title_font_weight'	=> 500,
		'footer_widget_font_size'	=> 18,
		'footer_widget_padding'	=> 80,
		'footer_widget_bg_image_size'	=> 'cover',
		'footer_widget_bg_image_repeat'	=> false,
		'footer_widget_bg_image_fixed'		=> false,
		'footer_widget_title_separator'		=> true,

		// Back to Top
		'enable_btt'			=> true,
		'btt_align'				=> 'right',
		'btt_label'				=> esc_html__( 'Back To Top', 'yuma' ),
		'btt_font_size'			=> 17,
		'btt_image_width'		=> 14,
		'btt_padding'			=> 15,
		'btt_border_radius'		=> 1,

		// Typography

		// global typography
		'body_font_family' 		=> json_encode(array('font' => 'Oxygen') ),
		'body_font_size'		=> 18,
		'body_font_weight'		=> 400,
		'heading_font_family' 	=> json_encode(array('font' => 'Alata') ),
		'h1_font_size'			=> 52,
		'h1_font_weight'		=> 600,
		'h2_font_size'			=> 42,
		'h2_font_weight'		=> 600,
		'h3_font_size'			=> 32,
		'h3_font_weight'		=> 600,
		'h4_font_size'			=> 28,
		'h4_font_weight'		=> 600,
		'h5_font_size'			=> 24,
		'h5_font_weight'		=> 600,
		'h6_font_size'			=> 20,
		'h6_font_weight'		=> 600,

		// theme typography
		'section_title_font_family' 	=> json_encode(array('font' => 'Alata') ),
		'section_title_font_size'		=> 46,
		'section_title_font_weight'		=> 600,
		'section_title_text_transform'		=> 'none',
		'home_title_font_family' 	=> json_encode(array('font' => 'Alata') ),
		'home_title_font_size'		=> 28,
		'home_title_font_weight'	=> 600,
		'home_title_text_transform'	=> 'none',
		'page_title_font_family' 	=> json_encode(array('font' => 'Alata') ),
		'page_title_font_size'		=> 48,
		'page_title_font_weight'	=> 600,
		'page_title_text_transform'	=> 'none',
		'entry_title_font_family' 	=> json_encode(array('font' => 'Alata') ),
		'entry_title_font_size'		=> 28,
		'entry_title_font_weight'	=> 600,
		'entry_title_text_transform'	=> 'none',
		'entry_meta_font_family' 	=> json_encode(array('font' => 'Oxygen') ),
		'entry_meta_font_size'		=> 17,
		'entry_meta_font_weight'	=> 500,
		'entry_meta_text_transform'	=> 'none',

		// Slider
		'enable_slider'			=> false,
		'slider_entire_site'	=> false,
		'slider_arrow'			=> true,
		'slider_auto_slide'		=> false,
		'slider_excerpt'		=> true,
		'slider_center_mode'	=> false,
		'slider_gap'			=> false,
		'slider_gap_size'		=> 27,
		'slider_content_type'	=> 'page',
		'slider_count'			=> 3,
		'slider_column'			=> 1,
		'slider_image_size' 	=> 'yuma-post-thumbnail',
		'slider_width' 			=> 'full-width',
		'slider_layout' 		=> 'left-align',
		'slider_readmore_label' => esc_html__( 'Read Blog', 'yuma' ),

		// Introduction
		'enable_introduction'	=> false,
		'introduction_content_type'	=> 'page',
		'introduction_alignment'	=> 'right-align',
		'introduction_excerpt'	=> 'excerpt',
		'introduction_readmore_label' => esc_html__( 'Read Blog', 'yuma' ),

		// Featured Categories
		'enable_featured_categories' => false,
		'featured_categories_post_count' => true,
		'featured_categories_width' => 'full-width',
		'featured_categories_alignment' => 'left-align',
		'featured_categories_layout' => 'no-gap',
		'featured_categories_column' => 4,
		'featured_categories_count'  => 4,

		// Featured
		'enable_featured'		=> false,
		'enable_featured_meta'	=> true,
		'enable_featured_excerpt' => true,
		'enable_featured_before_element' => true,
		'featured_title' 		=> esc_html__( 'Featured Posts', 'yuma' ),
		'featured_readmore' 	=> esc_html__( 'Continue Reading ...', 'yuma' ),
		'featured_content_type'	=> 'post',
		'featured_alignment'	=> 'left-align',
		'featured_count'		=> 3,
		'featured_column'		=> 3,
		'featured_image_size'	=> 'yuma-post-thumbnail',

		// Hero Content
		'enable_hero_content'	=> false,
		'enable_hero_content_parallax'	=> true,
		'hero_content_sub_title' 	=> esc_html__( 'Hero Content', 'yuma' ),
		'hero_content_alignment'	=> 'align-center',
		'hero_content_color'		=> 'light',
		'hero_content_width'		=> 'container',
		'hero_content_content_type'	=> 'page',

		// Popular
		'enable_popular'		=> false,
		'enable_popular_before_element'		=> true,
		'popular_title' 		=> esc_html__( 'Popular Posts', 'yuma' ),
		'popular_content_type'	=> 'post',
		'popular_alignment'		=> 'left-align',
		'popular_layout'		=> 'gap',
		'popular_count'			=> 3,
		'popular_column'		=> 3,
		'popular_image_size'	=> 'yuma-square-thumbnail',

		// Call to action
		'enable_cta'			=> false,
		'enable_cta_parallax'	=> true,
		'cta_width'				=> 'full-width',
		'cta_content_type'		=> 'page',
		'cta_btn_label'			=> esc_html__( 'Read Blog', 'yuma' ),

		// Latest Blog
		'enable_latest_blog'	=> true,
		'enable_blog_before_element'	=> true,
		'latest_blog_title'		=> esc_html__( 'Latest Blogs', 'yuma' ),
		'filter_blog_posts'		=> 'category',
		'blog_column_type'		=> 'column-1',
		'enable_blog_title_banner'	=> false,
		'blog_title_alignment'	=> 'left-align',
		'blog_layout'			=> 'left-align',
		'blog_pagination_type'	=> 'numeric',
		'blog_image_size'		=> 'medium_large',
		'enable_latest_blog_masonry'	=> true,
		'latest_blog_sidebar'	=> false,
		'latest_blog_show_date'	=> true,
		'latest_blog_show_category'	=> true,
		'latest_blog_show_author'	=> true,
		'latest_blog_show_read_time'	=> true,

		// sidebar widget
		'off_canvas_position'	=> 'align-right',
		'sidebar_widget_bg_color'	=> '#f6f6f7',
		'sidebar_widget_title_color'	=> '#0a0e14',
		'sidebar_widget_title_font_size'	=> 20,
		'sidebar_widget_title_font_weight'	=> 500,
		'sidebar_widget_elements_color'	=> '#555555',
		'sidebar_widget_font_size'	=> 17,
		'sidebar_widget_padding'	=> 40,

		// blog / archive
		'excerpt_count'			=> 15,
		'pagination_type'		=> 'numeric',
		'sidebar_layout'		=> 'right-sidebar',
		'archive_layout'		=> 'left-align',
		'archive_image_size'	=> 'medium_large',
		'column_type'			=> 'column-2',
		'enable_blog_prefix'	=> true,
		'enable_blog_masonry'	=> true,
		'show_breadcrumb'		=> false,
		'show_date'				=> true,
		'show_category'			=> true,
		'show_author'			=> true,
		'show_read_time'		=> true,

		// single post
		'show_single_image'		=> true,
		'single_header_image_layout'	=> 'banner-featured-image',
		'single_header_image_size'	=> 'full-width-size',
		'single_header_image_max_height'	=> 800,
		'single_header_image_position'	=> 'center',
		'enable_single_title_banner'	=> false,
		'single_title_alignment'	=> 'center-align',
		'sidebar_single_layout'	=> 'right-sidebar',
		'show_single_breadcrumb' => false,
		'show_single_date'		=> true,
		'show_single_category'	=> true,
		'show_single_tags'		=> true,
		'show_single_author'	=> true,
		'show_single_pagination'	=> true,
		'show_single_related_posts'	=> true,
		'single_related_posts_title'	=> esc_html__( 'Related Posts', 'yuma' ),

		// page
		'show_static_page_title'	=> true,
		'show_page_breadcrumb'		=> false,
		'show_page_image'			=> true,
		'show_static_page_image'	=> true,
		'page_header_image_layout'	=> 'banner-featured-image',
		'page_header_image_size'	=> 'full-width-size',
		'page_header_image_max_height'	=> 800,
		'page_header_image_position'	=> 'center',
		'enable_page_title_banner'	=> false,
		'page_title_alignment'		=> 'left-align',
		'sidebar_page_layout'		=> 'right-sidebar',

		// site layout
		'site_layout'				=> 'full',
		'enable_site_bg_repeat'		=> true,
		'enable_site_bg_size_cover'	=> false,
		'enable_site_bg_fixed'		=> false,
		'enable_site_frame_bg_repeat'		=> true,
		'enable_site_frame_bg_size_cover'	=> false,
		'enable_site_frame_bg_fixed'		=> false,

		// cursor
		'cursor_type'				=> 'default',

		// preloader
		'enable_preloader'			=> false,
		'preloader_layout'			=> 'default',
		'preloader_icon'			=> 'spinner-two-way',
		'preloader_image_size'		=> 400,

		// 404
		'404_image_size'			=> 400,
		'404_title'					=> esc_html__( '404', 'yuma' ),
		'404_sub_title'				=> esc_html__( 'Oops! That page can&rsquo;t be found.', 'yuma' ),
		'404_message'				=> esc_html__( 'It looks like nothing was found at this location. Maybe try a search.', 'yuma' ),
		'enable_404_search'			=> true,

		// theme color
		'theme_color'				=> 'default',
	);

	$output = apply_filters( 'yuma_default_theme_options', $yuma_default_options );
	return $output;
}