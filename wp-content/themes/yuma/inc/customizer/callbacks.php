<?php
/**
 * Callbacks functions
 *
 * @package yuma
 */

if ( ! function_exists( 'yuma_check_element_enable' ) ) :
	/**
	 * Check if the element is enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_check_element_enable( $left_elements, $center_elements, $right_elements ) {
		$left = $left_elements ? explode( ',', $left_elements ) : array();
		$center = $center_elements ? explode( ',', $center_elements ) : array();
		$right = $right_elements ? explode( ',', $right_elements ) : array();

		$list = array_merge_recursive( $left, $center, $right );

		return ( array ) $list;
	}
endif;

if ( ! function_exists( 'yuma_callback_false' ) ) :
	/**
	 * Check if callback false.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_callback_false( $control ) {
		return false;
	}
endif;

if ( ! function_exists( 'yuma_theme_color_custom_enable' ) ) :
	/**
	 * Check if theme color is custom.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_theme_color_custom_enable( $control ) {
		return 'custom' == $control->manager->get_setting( 'yuma_theme_options[theme_color]' )->value();
	}
endif;

if ( ! function_exists( 'yuma_site_layout_bg_image_enable' ) ) :
	/**
	 * Check if site bg image set.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_site_layout_bg_image_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[site_bg_image]' )->value() ? true : false;
	}
endif;

if ( ! function_exists( 'yuma_site_layout_bg_design_enable' ) ) :
	/**
	 * Check if site layout is boxed/frame.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_site_layout_bg_design_enable( $control ) {
		return in_array( $control->manager->get_setting( 'yuma_theme_options[site_layout]' )->value(), array( 'boxed', 'frame' ) );
	}
endif;

if ( ! function_exists( 'yuma_site_layout_frame_bg_image_enable' ) ) :
	/**
	 * Check if site frame bg image set
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_site_layout_frame_bg_image_enable( $control ) {
		return in_array( $control->manager->get_setting( 'yuma_theme_options[site_layout]' )->value(), array( 'boxed', 'frame' ) ) && $control->manager->get_setting( 'yuma_theme_options[site_frame_bg_image]' )->value();
	}
endif;

if ( ! function_exists( 'yuma_preloader_enable' ) ) :
	/**
	 * Check if preloader enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_preloader_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[enable_preloader]' )->value() ? true : false;
	}
endif;

if ( ! function_exists( 'yuma_preloader_default_enable' ) ) :
	/**
	 * Check if preloader default enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_preloader_default_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[enable_preloader]' )->value() && 'default' == $control->manager->get_setting( 'yuma_theme_options[preloader_layout]' )->value();
	}
endif;

if ( ! function_exists( 'yuma_preloader_image_enable' ) ) :
	/**
	 * Check if preloader image enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_preloader_image_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[enable_preloader]' )->value() && 'image' == $control->manager->get_setting( 'yuma_theme_options[preloader_layout]' )->value();
	}
endif;

/*
 * topbar callbacks
 */

if ( ! function_exists( 'yuma_topbar_enable' ) ) :
	/**
	 * Check if topbar enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_topbar_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[enable_topbar]' )->value() ? true : false;
	}
endif;

if ( ! function_exists( 'yuma_topbar_address_enable' ) ) :
	/**
	 * Check if address enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_topbar_address_enable( $control ) {
		$left_elements = $control->manager->get_setting( 'yuma_theme_options[topbar_left_element]' )->value();
		$center_elements = $control->manager->get_setting( 'yuma_theme_options[topbar_center_element]' )->value();
		$right_elements = $control->manager->get_setting( 'yuma_theme_options[topbar_right_element]' )->value();
		$list = yuma_check_element_enable( $left_elements, $center_elements, $right_elements );
		return $control->manager->get_setting( 'yuma_theme_options[enable_topbar]' )->value() && in_array( 'address', $list );
	}
endif;

if ( ! function_exists( 'yuma_topbar_time_enable' ) ) :
	/**
	 * Check if time enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_topbar_time_enable( $control ) {
		$left_elements = $control->manager->get_setting( 'yuma_theme_options[topbar_left_element]' )->value();
		$center_elements = $control->manager->get_setting( 'yuma_theme_options[topbar_center_element]' )->value();
		$right_elements = $control->manager->get_setting( 'yuma_theme_options[topbar_right_element]' )->value();
		$list = yuma_check_element_enable( $left_elements, $center_elements, $right_elements );
		return $control->manager->get_setting( 'yuma_theme_options[enable_topbar]' )->value() && in_array( 'time', $list );
	}
endif;

if ( ! function_exists( 'yuma_topbar_phone_enable' ) ) :
	/**
	 * Check if phone enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_topbar_phone_enable( $control ) {
		$left_elements = $control->manager->get_setting( 'yuma_theme_options[topbar_left_element]' )->value();
		$center_elements = $control->manager->get_setting( 'yuma_theme_options[topbar_center_element]' )->value();
		$right_elements = $control->manager->get_setting( 'yuma_theme_options[topbar_right_element]' )->value();
		$list = yuma_check_element_enable( $left_elements, $center_elements, $right_elements );
		return $control->manager->get_setting( 'yuma_theme_options[enable_topbar]' )->value() && in_array( 'phone', $list );
	}
endif;

if ( ! function_exists( 'yuma_topbar_email_enable' ) ) :
	/**
	 * Check if email enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_topbar_email_enable( $control ) {
		$left_elements = $control->manager->get_setting( 'yuma_theme_options[topbar_left_element]' )->value();
		$center_elements = $control->manager->get_setting( 'yuma_theme_options[topbar_center_element]' )->value();
		$right_elements = $control->manager->get_setting( 'yuma_theme_options[topbar_right_element]' )->value();
		$list = yuma_check_element_enable( $left_elements, $center_elements, $right_elements );
		return $control->manager->get_setting( 'yuma_theme_options[enable_topbar]' )->value() && in_array( 'email', $list );
	}
endif;

if ( ! function_exists( 'yuma_topbar_date_enable' ) ) :
	/**
	 * Check if date enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_topbar_date_enable( $control ) {
		$left_elements = $control->manager->get_setting( 'yuma_theme_options[topbar_left_element]' )->value();
		$center_elements = $control->manager->get_setting( 'yuma_theme_options[topbar_center_element]' )->value();
		$right_elements = $control->manager->get_setting( 'yuma_theme_options[topbar_right_element]' )->value();
		$list = yuma_check_element_enable( $left_elements, $center_elements, $right_elements );
		return $control->manager->get_setting( 'yuma_theme_options[enable_topbar]' )->value() && in_array( 'date', $list );
	}
endif;

if ( ! function_exists( 'yuma_topbar_off_canvas_bar_enable' ) ) :
	/**
	 * Check if off_canvas_bar enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_topbar_off_canvas_bar_enable( $control ) {
		$left_elements = $control->manager->get_setting( 'yuma_theme_options[topbar_left_element]' )->value();
		$center_elements = $control->manager->get_setting( 'yuma_theme_options[topbar_center_element]' )->value();
		$right_elements = $control->manager->get_setting( 'yuma_theme_options[topbar_right_element]' )->value();
		$list = yuma_check_element_enable( $left_elements, $center_elements, $right_elements );
		return $control->manager->get_setting( 'yuma_theme_options[enable_topbar]' )->value() && in_array( 'off_canvas_bar', $list );
	}
endif;

if ( ! function_exists( 'yuma_topbar_social_menu_enable' ) ) :
	/**
	 * Check if social menu enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_topbar_social_menu_enable( $control ) {
		$left_elements = $control->manager->get_setting( 'yuma_theme_options[topbar_left_element]' )->value();
		$center_elements = $control->manager->get_setting( 'yuma_theme_options[topbar_center_element]' )->value();
		$right_elements = $control->manager->get_setting( 'yuma_theme_options[topbar_right_element]' )->value();
		$list = yuma_check_element_enable( $left_elements, $center_elements, $right_elements );
		return $control->manager->get_setting( 'yuma_theme_options[enable_topbar]' )->value() && in_array( 'social_menu', $list );
	}
endif;

if ( ! function_exists( 'yuma_topbar_search_enable' ) ) :
	/**
	 * Check if search enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_topbar_search_enable( $control ) {
		$left_elements = $control->manager->get_setting( 'yuma_theme_options[topbar_left_element]' )->value();
		$center_elements = $control->manager->get_setting( 'yuma_theme_options[topbar_center_element]' )->value();
		$right_elements = $control->manager->get_setting( 'yuma_theme_options[topbar_right_element]' )->value();
		$list = yuma_check_element_enable( $left_elements, $center_elements, $right_elements );
		return $control->manager->get_setting( 'yuma_theme_options[enable_topbar]' )->value() && in_array( 'search', $list );
	}
endif;

if ( ! function_exists( 'yuma_topbar_search_style_btn_enable' ) ) :
	/**
	 * Check if search enabled and search form.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_topbar_search_style_btn_enable( $control ) {
		$left_elements = $control->manager->get_setting( 'yuma_theme_options[topbar_left_element]' )->value();
		$center_elements = $control->manager->get_setting( 'yuma_theme_options[topbar_center_element]' )->value();
		$right_elements = $control->manager->get_setting( 'yuma_theme_options[topbar_right_element]' )->value();
		$list = yuma_check_element_enable( $left_elements, $center_elements, $right_elements );
		return $control->manager->get_setting( 'yuma_theme_options[enable_topbar]' )->value() && in_array( 'search', $list ) && 'search-form' == $control->manager->get_setting( 'yuma_theme_options[topbar_search_format]' )->value();
	}
endif;

if ( ! function_exists( 'yuma_topbar_woocart_enable' ) ) :
	/**
	 * Check if woocart enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_topbar_woocart_enable( $control ) {
		$left_elements = $control->manager->get_setting( 'yuma_theme_options[topbar_left_element]' )->value();
		$center_elements = $control->manager->get_setting( 'yuma_theme_options[topbar_center_element]' )->value();
		$right_elements = $control->manager->get_setting( 'yuma_theme_options[topbar_right_element]' )->value();
		$list = yuma_check_element_enable( $left_elements, $center_elements, $right_elements );
		return $control->manager->get_setting( 'yuma_theme_options[enable_topbar]' )->value() && in_array( 'cart', $list );
	}
endif;

if ( ! function_exists( 'yuma_topbar_area_size_custom_enable' ) ) :
	/**
	 * Check if topbar area size custom enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_topbar_area_size_custom_enable( $control ) {
		return 'custom' == $control->manager->get_setting( 'yuma_theme_options[topbar_area]' )->value();
	}
endif;

/*
 * header callbacks
 */

if ( ! function_exists( 'yuma_header_enable' ) ) :
	/**
	 * Check if header enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_header_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[enable_header]' )->value() ? true : false;
	}
endif;

if ( ! function_exists( 'yuma_header_site_details_enable' ) ) :
	/**
	 * Check if site details enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_header_site_details_enable( $control ) {
		$left_elements = $control->manager->get_setting( 'yuma_theme_options[header_left_element]' )->value();
		$center_elements = $control->manager->get_setting( 'yuma_theme_options[header_center_element]' )->value();
		$right_elements = $control->manager->get_setting( 'yuma_theme_options[header_right_element]' )->value();
		$list = yuma_check_element_enable( $left_elements, $center_elements, $right_elements );
		return $control->manager->get_setting( 'yuma_theme_options[enable_header]' )->value() && in_array( 'site_details', $list );
	}
endif;

if ( ! function_exists( 'yuma_header_social_menu_enable' ) ) :
	/**
	 * Check if social menu enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_header_social_menu_enable( $control ) {
		$left_elements = $control->manager->get_setting( 'yuma_theme_options[header_left_element]' )->value();
		$center_elements = $control->manager->get_setting( 'yuma_theme_options[header_center_element]' )->value();
		$right_elements = $control->manager->get_setting( 'yuma_theme_options[header_right_element]' )->value();
		$list = yuma_check_element_enable( $left_elements, $center_elements, $right_elements );
		return $control->manager->get_setting( 'yuma_theme_options[enable_header]' )->value() && in_array( 'social_menu', $list );
	}
endif;

if ( ! function_exists( 'yuma_header_primary_menu_enable' ) ) :
	/**
	 * Check if primary menu enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_header_primary_menu_enable( $control ) {
		$left_elements = $control->manager->get_setting( 'yuma_theme_options[header_left_element]' )->value();
		$center_elements = $control->manager->get_setting( 'yuma_theme_options[header_center_element]' )->value();
		$right_elements = $control->manager->get_setting( 'yuma_theme_options[header_right_element]' )->value();
		$list = yuma_check_element_enable( $left_elements, $center_elements, $right_elements );
		return $control->manager->get_setting( 'yuma_theme_options[enable_header]' )->value() && in_array( 'primary_menu', $list );
	}
endif;

if ( ! function_exists( 'yuma_header_address_enable' ) ) :
	/**
	 * Check if address enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_header_address_enable( $control ) {
		$left_elements = $control->manager->get_setting( 'yuma_theme_options[header_left_element]' )->value();
		$center_elements = $control->manager->get_setting( 'yuma_theme_options[header_center_element]' )->value();
		$right_elements = $control->manager->get_setting( 'yuma_theme_options[header_right_element]' )->value();
		$list = yuma_check_element_enable( $left_elements, $center_elements, $right_elements );
		return $control->manager->get_setting( 'yuma_theme_options[enable_header]' )->value() && in_array( 'address', $list );
	}
endif;

if ( ! function_exists( 'yuma_header_time_enable' ) ) :
	/**
	 * Check if time enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_header_time_enable( $control ) {
		$left_elements = $control->manager->get_setting( 'yuma_theme_options[header_left_element]' )->value();
		$center_elements = $control->manager->get_setting( 'yuma_theme_options[header_center_element]' )->value();
		$right_elements = $control->manager->get_setting( 'yuma_theme_options[header_right_element]' )->value();
		$list = yuma_check_element_enable( $left_elements, $center_elements, $right_elements );
		return $control->manager->get_setting( 'yuma_theme_options[enable_header]' )->value() && in_array( 'time', $list );
	}
endif;

if ( ! function_exists( 'yuma_header_phone_enable' ) ) :
	/**
	 * Check if phone enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_header_phone_enable( $control ) {
		$left_elements = $control->manager->get_setting( 'yuma_theme_options[header_left_element]' )->value();
		$center_elements = $control->manager->get_setting( 'yuma_theme_options[header_center_element]' )->value();
		$right_elements = $control->manager->get_setting( 'yuma_theme_options[header_right_element]' )->value();
		$list = yuma_check_element_enable( $left_elements, $center_elements, $right_elements );
		return $control->manager->get_setting( 'yuma_theme_options[enable_header]' )->value() && in_array( 'phone', $list );
	}
endif;

if ( ! function_exists( 'yuma_header_email_enable' ) ) :
	/**
	 * Check if email enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_header_email_enable( $control ) {
		$left_elements = $control->manager->get_setting( 'yuma_theme_options[header_left_element]' )->value();
		$center_elements = $control->manager->get_setting( 'yuma_theme_options[header_center_element]' )->value();
		$right_elements = $control->manager->get_setting( 'yuma_theme_options[header_right_element]' )->value();
		$list = yuma_check_element_enable( $left_elements, $center_elements, $right_elements );
		return $control->manager->get_setting( 'yuma_theme_options[enable_header]' )->value() && in_array( 'email', $list );
	}
endif;

if ( ! function_exists( 'yuma_header_off_canvas_bar_enable' ) ) :
	/**
	 * Check if off_canvas_bar enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_header_off_canvas_bar_enable( $control ) {
		$left_elements = $control->manager->get_setting( 'yuma_theme_options[header_left_element]' )->value();
		$center_elements = $control->manager->get_setting( 'yuma_theme_options[header_center_element]' )->value();
		$right_elements = $control->manager->get_setting( 'yuma_theme_options[header_right_element]' )->value();
		$list = yuma_check_element_enable( $left_elements, $center_elements, $right_elements );
		return $control->manager->get_setting( 'yuma_theme_options[enable_header]' )->value() && in_array( 'off_canvas_bar', $list );
	}
endif;

if ( ! function_exists( 'yuma_header_woocart_enable' ) ) :
	/**
	 * Check if woocart enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_header_woocart_enable( $control ) {
		$left_elements = $control->manager->get_setting( 'yuma_theme_options[header_left_element]' )->value();
		$center_elements = $control->manager->get_setting( 'yuma_theme_options[header_center_element]' )->value();
		$right_elements = $control->manager->get_setting( 'yuma_theme_options[header_right_element]' )->value();
		$list = yuma_check_element_enable( $left_elements, $center_elements, $right_elements );
		return $control->manager->get_setting( 'yuma_theme_options[enable_header]' )->value() && in_array( 'cart', $list );
	}
endif;

if ( ! function_exists( 'yuma_header_woo_search_enable' ) ) :
	/**
	 * Check if woo search enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_header_woo_search_enable( $control ) {
		$left_elements = $control->manager->get_setting( 'yuma_theme_options[header_left_element]' )->value();
		$center_elements = $control->manager->get_setting( 'yuma_theme_options[header_center_element]' )->value();
		$right_elements = $control->manager->get_setting( 'yuma_theme_options[header_right_element]' )->value();
		$list = yuma_check_element_enable( $left_elements, $center_elements, $right_elements );
		return $control->manager->get_setting( 'yuma_theme_options[enable_header]' )->value() && in_array( 'product_search', $list );
	}
endif;

if ( ! function_exists( 'yuma_header_search_enable' ) ) :
	/**
	 * Check if search enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_header_search_enable( $control ) {
		$left_elements = $control->manager->get_setting( 'yuma_theme_options[header_left_element]' )->value();
		$center_elements = $control->manager->get_setting( 'yuma_theme_options[header_center_element]' )->value();
		$right_elements = $control->manager->get_setting( 'yuma_theme_options[header_right_element]' )->value();
		$list = yuma_check_element_enable( $left_elements, $center_elements, $right_elements );
		return $control->manager->get_setting( 'yuma_theme_options[enable_header]' )->value() && in_array( 'search', $list );
	}
endif;

if ( ! function_exists( 'yuma_header_search_style_btn_enable' ) ) :
	/**
	 * Check if search enabled and search form.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_header_search_style_btn_enable( $control ) {
		$left_elements = $control->manager->get_setting( 'yuma_theme_options[header_left_element]' )->value();
		$center_elements = $control->manager->get_setting( 'yuma_theme_options[header_center_element]' )->value();
		$right_elements = $control->manager->get_setting( 'yuma_theme_options[header_right_element]' )->value();
		$list = yuma_check_element_enable( $left_elements, $center_elements, $right_elements );
		return $control->manager->get_setting( 'yuma_theme_options[enable_header]' )->value() && in_array( 'search', $list ) && 'search-form' == $control->manager->get_setting( 'yuma_theme_options[header_search_format]' )->value();
	}
endif;

if ( ! function_exists( 'yuma_header_button_enable' ) ) :
	/**
	 * Check if button enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_header_button_enable( $control ) {
		$left_elements = $control->manager->get_setting( 'yuma_theme_options[header_left_element]' )->value();
		$center_elements = $control->manager->get_setting( 'yuma_theme_options[header_center_element]' )->value();
		$right_elements = $control->manager->get_setting( 'yuma_theme_options[header_right_element]' )->value();
		$list = yuma_check_element_enable( $left_elements, $center_elements, $right_elements );
		return $control->manager->get_setting( 'yuma_theme_options[enable_header]' )->value() && in_array( 'button', $list );
	}
endif;


if ( ! function_exists( 'yuma_header_sticky_enable' ) ) :
	/**
	 * Check if header sticky enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_header_sticky_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[header_sticky]' )->value() ? true : false;
	}
endif;

if ( ! function_exists( 'yuma_header_area_size_custom_enable' ) ) :
	/**
	 * Check if header area size custom enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_header_area_size_custom_enable( $control ) {
		return 'custom' == $control->manager->get_setting( 'yuma_theme_options[header_area]' )->value();
	}
endif;

/*
 * navbar callbacks
 */

if ( ! function_exists( 'yuma_navbar_enable' ) ) :
	/**
	 * Check if navbar enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_navbar_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[enable_navbar]' )->value() ? true : false;
	}
endif;

if ( ! function_exists( 'yuma_navbar_primary_menu_enable' ) ) :
	/**
	 * Check if primary menu enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_navbar_primary_menu_enable( $control ) {
		$left_elements = $control->manager->get_setting( 'yuma_theme_options[navbar_left_element]' )->value();
		$center_elements = $control->manager->get_setting( 'yuma_theme_options[navbar_center_element]' )->value();
		$right_elements = $control->manager->get_setting( 'yuma_theme_options[navbar_right_element]' )->value();
		$list = yuma_check_element_enable( $left_elements, $center_elements, $right_elements );
		return $control->manager->get_setting( 'yuma_theme_options[enable_navbar]' )->value() && in_array( 'primary_menu', $list );
	}
endif;

if ( ! function_exists( 'yuma_navbar_social_menu_enable' ) ) :
	/**
	 * Check if social menu enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_navbar_social_menu_enable( $control ) {
		$left_elements = $control->manager->get_setting( 'yuma_theme_options[navbar_left_element]' )->value();
		$center_elements = $control->manager->get_setting( 'yuma_theme_options[navbar_center_element]' )->value();
		$right_elements = $control->manager->get_setting( 'yuma_theme_options[navbar_right_element]' )->value();
		$list = yuma_check_element_enable( $left_elements, $center_elements, $right_elements );
		return $control->manager->get_setting( 'yuma_theme_options[enable_navbar]' )->value() && in_array( 'social_menu', $list );
	}
endif;

if ( ! function_exists( 'yuma_navbar_off_canvas_bar_enable' ) ) :
	/**
	 * Check if off_canvas_bar enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_navbar_off_canvas_bar_enable( $control ) {
		$left_elements = $control->manager->get_setting( 'yuma_theme_options[navbar_left_element]' )->value();
		$center_elements = $control->manager->get_setting( 'yuma_theme_options[navbar_center_element]' )->value();
		$right_elements = $control->manager->get_setting( 'yuma_theme_options[navbar_right_element]' )->value();
		$list = yuma_check_element_enable( $left_elements, $center_elements, $right_elements );
		return $control->manager->get_setting( 'yuma_theme_options[enable_navbar]' )->value() && in_array( 'off_canvas_bar', $list );
	}
endif;

if ( ! function_exists( 'yuma_navbar_search_enable' ) ) :
	/**
	 * Check if search enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_navbar_search_enable( $control ) {
		$left_elements = $control->manager->get_setting( 'yuma_theme_options[navbar_left_element]' )->value();
		$center_elements = $control->manager->get_setting( 'yuma_theme_options[navbar_center_element]' )->value();
		$right_elements = $control->manager->get_setting( 'yuma_theme_options[navbar_right_element]' )->value();
		$list = yuma_check_element_enable( $left_elements, $center_elements, $right_elements );
		return $control->manager->get_setting( 'yuma_theme_options[enable_navbar]' )->value() && in_array( 'search', $list );
	}
endif;

if ( ! function_exists( 'yuma_navbar_search_style_btn_enable' ) ) :
	/**
	 * Check if search enabled and search form.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_navbar_search_style_btn_enable( $control ) {
		$left_elements = $control->manager->get_setting( 'yuma_theme_options[navbar_left_element]' )->value();
		$center_elements = $control->manager->get_setting( 'yuma_theme_options[navbar_center_element]' )->value();
		$right_elements = $control->manager->get_setting( 'yuma_theme_options[navbar_right_element]' )->value();
		$list = yuma_check_element_enable( $left_elements, $center_elements, $right_elements );
		return $control->manager->get_setting( 'yuma_theme_options[enable_navbar]' )->value() && in_array( 'search', $list ) && 'search-form' == $control->manager->get_setting( 'yuma_theme_options[navbar_search_format]' )->value();
	}
endif;

if ( ! function_exists( 'yuma_navbar_area_size_custom_enable' ) ) :
	/**
	 * Check if navbar area size custom enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_navbar_area_size_custom_enable( $control ) {
		return 'custom' == $control->manager->get_setting( 'yuma_theme_options[navbar_area]' )->value();
	}
endif;

if ( ! function_exists( 'yuma_footer_menu_enable' ) ) :
	/**
	 * Check if footer menu enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_footer_menu_enable( $control ) {
		$left_elements = $control->manager->get_setting( 'yuma_theme_options[footer_left_element]' )->value();
		$center_elements = $control->manager->get_setting( 'yuma_theme_options[footer_center_element]' )->value();
		$right_elements = $control->manager->get_setting( 'yuma_theme_options[footer_right_element]' )->value();
		$list = yuma_check_element_enable( $left_elements, $center_elements, $right_elements );
		return in_array( 'footer_menu', $list );
	}
endif;

if ( ! function_exists( 'yuma_footer_social_menu_enable' ) ) :
	/**
	 * Check if social menu enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_footer_social_menu_enable( $control ) {
		$left_elements = $control->manager->get_setting( 'yuma_theme_options[footer_left_element]' )->value();
		$center_elements = $control->manager->get_setting( 'yuma_theme_options[footer_center_element]' )->value();
		$right_elements = $control->manager->get_setting( 'yuma_theme_options[footer_right_element]' )->value();
		$list = yuma_check_element_enable( $left_elements, $center_elements, $right_elements );
		return $control->manager->get_setting( 'yuma_theme_options[enable_footer]' )->value() && in_array( 'social_menu', $list );
	}
endif;

if ( ! function_exists( 'yuma_footer_custom_text_enable' ) ) :
	/**
	 * Check if custom_text enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_footer_custom_text_enable( $control ) {
		$left_elements = $control->manager->get_setting( 'yuma_theme_options[footer_left_element]' )->value();
		$center_elements = $control->manager->get_setting( 'yuma_theme_options[footer_center_element]' )->value();
		$right_elements = $control->manager->get_setting( 'yuma_theme_options[footer_right_element]' )->value();
		$list = yuma_check_element_enable( $left_elements, $center_elements, $right_elements );
		return in_array( 'custom_text', $list );
	}
endif;

if ( ! function_exists( 'yuma_footer_widget_title_separator_enable' ) ) :
	/**
	 * Check if footer widget title separator enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_footer_widget_title_separator_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[footer_widget_title_separator]' )->value() ? true : false;
	}
endif;

if ( ! function_exists( 'yuma_footer_area_size_custom_enable' ) ) :
	/**
	 * Check if footer area size custom enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_footer_area_size_custom_enable( $control ) {
		return 'custom' == $control->manager->get_setting( 'yuma_theme_options[footer_area]' )->value();
	}
endif;

if ( ! function_exists( 'yuma_btt_enable' ) ) :
	/**
	 * Check if btt enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_btt_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[enable_btt]' )->value() ? true : false;
	}
endif;

if ( ! function_exists( 'yuma_blog_title_banner_enable' ) ) :
	/**
	 * Check if blog title in banner enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_blog_title_banner_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[enable_blog_title_banner]' )->value() ? true : false;
	}
endif;

if ( ! function_exists( 'yuma_single_featured_image_enable' ) ) :
	/**
	 * Check if single featured image enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_single_featured_image_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[show_single_image]' )->value() ? true : false;
	}
endif;

if ( ! function_exists( 'yuma_single_featured_image_banner_enable' ) ) :
	/**
	 * Check if single featured image in banner enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_single_featured_image_banner_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[show_single_image]' )->value() && 'banner-featured-image' == $control->manager->get_setting( 'yuma_theme_options[single_header_image_layout]' )->value();
	}
endif;

if ( ! function_exists( 'yuma_single_title_banner_enable' ) ) :
	/**
	 * Check if single title in banner enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_single_title_banner_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[show_single_image]' )->value() && $control->manager->get_setting( 'yuma_theme_options[enable_single_title_banner]' )->value() ? true : false;
	}
endif;

if ( ! function_exists( 'yuma_single_related_posts_enable' ) ) :
	/**
	 * Check if single related posts enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_single_related_posts_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[show_single_related_posts]' )->value() ? true : false;
	}
endif;

if ( ! function_exists( 'yuma_page_featured_image_enable' ) ) :
	/**
	 * Check if page featured image enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_page_featured_image_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[show_page_image]' )->value() ? true : false;
	}
endif;

if ( ! function_exists( 'yuma_page_featured_image_banner_enable' ) ) :
	/**
	 * Check if page featured image in banner enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_page_featured_image_banner_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[show_page_image]' )->value() && 'banner-featured-image' == $control->manager->get_setting( 'yuma_theme_options[page_header_image_layout]' )->value();
	}
endif;

if ( ! function_exists( 'yuma_page_title_banner_enable' ) ) :
	/**
	 * Check if page title in banner enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_page_title_banner_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[show_page_image]' )->value() && $control->manager->get_setting( 'yuma_theme_options[enable_page_title_banner]' )->value() ? true : false;
	}
endif;

/*
 * Homepage Sections
 */

if ( ! function_exists( 'yuma_slider_section_enable' ) ) :
	/**
	 * Check if slider section enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_slider_section_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[enable_slider]' )->value() ? true : false;;
	}
endif;

if ( ! function_exists( 'yuma_slider_gap_enable' ) ) :
	/**
	 * Check if slider gap enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_slider_gap_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[enable_slider]' )->value() && $control->manager->get_setting( 'yuma_theme_options[slider_gap]' )->value();
	}
endif;

if ( ! function_exists( 'yuma_slider_content_post_enable' ) ) :
	/**
	 * Check if slider content type is post.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_slider_content_post_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[enable_slider]' )->value() && 'post' == $control->manager->get_setting( 'yuma_theme_options[slider_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'yuma_slider_content_page_enable' ) ) :
	/**
	 * Check if slider content type is page.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_slider_content_page_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[enable_slider]' )->value() && 'page' == $control->manager->get_setting( 'yuma_theme_options[slider_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'yuma_introduction_section_enable' ) ) :
	/**
	 * Check if introduction section enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_introduction_section_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[enable_introduction]' )->value() ? true : false;;
	}
endif;

if ( ! function_exists( 'yuma_introduction_content_page_enable' ) ) :
	/**
	 * Check if introduction content type is page.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_introduction_content_page_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[enable_introduction]' )->value() && 'page' == $control->manager->get_setting( 'yuma_theme_options[introduction_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'yuma_featured_categories_section_enable' ) ) :
	/**
	 * Check if featured section enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_featured_categories_section_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[enable_featured_categories]' )->value() ? true : false;;
	}
endif;

if ( ! function_exists( 'yuma_featured_section_enable' ) ) :
	/**
	 * Check if featured section enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_featured_section_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[enable_featured]' )->value() ? true : false;;
	}
endif;

if ( ! function_exists( 'yuma_featured_section_enable' ) ) :
	/**
	 * Check if featured section enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_featured_section_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[enable_featured]' )->value() ? true : false;;
	}
endif;

if ( ! function_exists( 'yuma_featured_title_bar_enable' ) ) :
	/**
	 * Check if featured title bar enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_featured_title_bar_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[enable_featured]' )->value() && $control->manager->get_setting( 'yuma_theme_options[enable_featured_before_element]' )->value();
	}
endif;

if ( ! function_exists( 'yuma_featured_content_post_enable' ) ) :
	/**
	 * Check if featured content type is post.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_featured_content_post_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[enable_featured]' )->value() && 'post' == $control->manager->get_setting( 'yuma_theme_options[featured_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'yuma_hero_content_section_enable' ) ) :
	/**
	 * Check if hero_content section enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_hero_content_section_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[enable_hero_content]' )->value() ? true : false;;
	}
endif;

if ( ! function_exists( 'yuma_hero_content_content_page_enable' ) ) :
	/**
	 * Check if hero_content content type is page.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_hero_content_content_page_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[enable_hero_content]' )->value() && 'page' == $control->manager->get_setting( 'yuma_theme_options[hero_content_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'yuma_popular_section_enable' ) ) :
	/**
	 * Check if popular section enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_popular_section_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[enable_popular]' )->value() ? true : false;;
	}
endif;

if ( ! function_exists( 'yuma_popular_title_bar_enable' ) ) :
	/**
	 * Check if popular title bar enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_popular_title_bar_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[enable_popular]' )->value() && $control->manager->get_setting( 'yuma_theme_options[enable_popular_before_element]' )->value();
	}
endif;

if ( ! function_exists( 'yuma_popular_content_post_enable' ) ) :
	/**
	 * Check if popular content type is post.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_popular_content_post_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[enable_popular]' )->value() && 'post' == $control->manager->get_setting( 'yuma_theme_options[popular_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'yuma_cta_section_enable' ) ) :
	/**
	 * Check if cta section enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_cta_section_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[enable_cta]' )->value() ? true : false;;
	}
endif;

if ( ! function_exists( 'yuma_cta_content_page_enable' ) ) :
	/**
	 * Check if cta content type is page.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_cta_content_page_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[enable_cta]' )->value() && 'page' == $control->manager->get_setting( 'yuma_theme_options[cta_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'yuma_blog_section_enable' ) ) :
	/**
	 * Check if blog section enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_blog_section_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[enable_latest_blog]' )->value() ? true : false;;
	}
endif;

if ( ! function_exists( 'yuma_blog_title_bar_enable' ) ) :
	/**
	 * Check if blog title bar enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_blog_title_bar_enable( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[enable_latest_blog]' )->value() && $control->manager->get_setting( 'yuma_theme_options[enable_blog_before_element]' )->value();
	}
endif;

if ( ! function_exists( 'yuma_blog_filter_category' ) ) :
	/**
	 * Check if blog filter category enabled.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function yuma_blog_filter_category( $control ) {
		return $control->manager->get_setting( 'yuma_theme_options[enable_latest_blog]' )->value() && 'category' == $control->manager->get_setting( 'yuma_theme_options[filter_blog_posts]' )->value();
	}
endif;
