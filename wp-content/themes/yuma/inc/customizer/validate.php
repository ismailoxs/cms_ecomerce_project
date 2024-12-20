<?php
/**
 * Validation functions
 *
 * @package yuma
 */

if ( ! function_exists( 'yuma_validate_excerpt_count' ) ) :
	/**
	 * Check if the input value is valid integer.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return string Whether the value is valid to the current preview.
	 */
	function yuma_validate_excerpt_count( $validity, $value ){
		$value = intval( $value );
		if ( empty( $value ) || ! is_numeric( $value ) ) {
			$validity->add( 'required', esc_html__( 'You must supply a valid number.', 'yuma' ) );
		} elseif ( $value < 1 ) {
			$validity->add( 'min_slider', esc_html__( 'Minimum no of Excerpt Lenght is 1', 'yuma' ) );
		} elseif ( $value > 50 ) {
			$validity->add( 'max_slider', esc_html__( 'Maximum no of Excerpt Lenght is 50', 'yuma' ) );
		}
		return $validity;
	}
endif;

if ( ! function_exists( 'yuma_validate_slider_count' ) ) :
	/**
	 * Check if the input value is valid integer.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return string Whether the value is valid to the current preview.
	 */
	function yuma_validate_slider_count( $validity, $value ){
		$value = intval( $value );
		if ( empty( $value ) || ! is_numeric( $value ) ) {
			$validity->add( 'required', esc_html__( 'You must supply a valid number.', 'yuma' ) );
		} elseif ( $value < 1 ) {
			$validity->add( 'min_slider', esc_html__( 'Minimum no of Slides is 1', 'yuma' ) );
		} elseif ( $value > 5 ) {
			$validity->add( 'max_slider', esc_html__( 'Maximum no of Slides is 5. Upgrade to pro to have more slides.', 'yuma' ) );
		}
		return $validity;
	}
endif;

if ( ! function_exists( 'yuma_validate_featured_categories_count' ) ) :
	/**
	 * Check if the input value is valid integer.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return string Whether the value is valid to the current preview.
	 */
	function yuma_validate_featured_categories_count( $validity, $value ){
		$value = intval( $value );
		if ( empty( $value ) || ! is_numeric( $value ) ) {
			$validity->add( 'required', esc_html__( 'You must supply a valid number.', 'yuma' ) );
		} elseif ( $value < 3 ) {
			$validity->add( 'min_featured_categories', esc_html__( 'Minimum no of Categories is 3', 'yuma' ) );
		} elseif ( $value > 4 ) {
			$validity->add( 'max_featured_categories', esc_html__( 'Maximum no of Categories is 4. Upgrade to pro to have more Categories.', 'yuma' ) );
		}
		return $validity;
	}
endif;

if ( ! function_exists( 'yuma_validate_featured_count' ) ) :
	/**
	 * Check if the input value is valid integer.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return string Whether the value is valid to the current preview.
	 */
	function yuma_validate_featured_count( $validity, $value ){
		$value = intval( $value );
		if ( empty( $value ) || ! is_numeric( $value ) ) {
			$validity->add( 'required', esc_html__( 'You must supply a valid number.', 'yuma' ) );
		} elseif ( $value < 2 ) {
			$validity->add( 'min_featured', esc_html__( 'Minimum no of Posts is 2', 'yuma' ) );
		} elseif ( $value > 3 ) {
			$validity->add( 'max_featured', esc_html__( 'Maximum no of Posts is 3. Upgrade to pro to have more Posts.', 'yuma' ) );
		}
		return $validity;
	}
endif;

if ( ! function_exists( 'yuma_validate_popular_count' ) ) :
	/**
	 * Check if the input value is valid integer.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return string Whether the value is valid to the current preview.
	 */
	function yuma_validate_popular_count( $validity, $value ){
		$value = intval( $value );
		if ( empty( $value ) || ! is_numeric( $value ) ) {
			$validity->add( 'required', esc_html__( 'You must supply a valid number.', 'yuma' ) );
		} elseif ( $value < 2 ) {
			$validity->add( 'min_featured', esc_html__( 'Minimum no of Posts is 2', 'yuma' ) );
		} elseif ( $value > 6 ) {
			$validity->add( 'max_featured', esc_html__( 'Maximum no of Posts is 6. Upgrade to pro to have more Posts.', 'yuma' ) );
		}
		return $validity;
	}
endif;
