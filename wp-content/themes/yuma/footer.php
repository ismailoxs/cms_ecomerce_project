<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package yuma
 */

/**
 * yuma_off_canvas_area_action hook
 *
 * @hooked yuma_off_canvas_area -  10
 *
 */
do_action( 'yuma_off_canvas_area_action' );

/**
 * yuma_site_content_ends_action hook
 *
 * @hooked yuma_site_content_ends -  10
 *
 */
do_action( 'yuma_site_content_ends_action' );

/**
 * yuma_footer_start_action hook
 *
 * @hooked yuma_footer_start -  10
 *
 */
do_action( 'yuma_footer_start_action' );

/**
 * yuma_site_info_action hook
 *
 * @hooked yuma_add_footer_section -  10
 *
 */
do_action( 'yuma_site_info_action' );

/**
 * yuma_footer_ends_action hook
 *
 * @hooked yuma_footer_ends -  10
 * @hooked yuma_slide_to_top -  20
 * @hooked yuma_search_form_model -  30
 *
 */
do_action( 'yuma_footer_ends_action' );

/**
 * yuma_page_ends_action hook
 *
 * @hooked yuma_page_ends -  10
 *
 */
do_action( 'yuma_page_ends_action' );

wp_footer();

/**
 * yuma_body_html_ends_action hook
 *
 * @hooked yuma_body_html_ends -  10
 *
 */
do_action( 'yuma_body_html_ends_action' );
