<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package yuma
 */

/**
 * yuma_doctype_action hook
 *
 * @hooked yuma_doctype -  10
 *
 */
do_action( 'yuma_doctype_action' );

/**
 * yuma_head_action hook
 *
 * @hooked yuma_head -  10
 *
 */
do_action( 'yuma_head_action' );

/**
 * yuma_body_start_action hook
 *
 * @hooked yuma_body_start -  10
 *
 */
do_action( 'yuma_body_start_action' );
 
/**
 * yuma_page_start_action hook
 *
 * @hooked yuma_page_start -  10
 * @hooked yuma_loader -  20
 *
 */
do_action( 'yuma_page_start_action' );

/**
 * yuma_header_start_action hook
 *
 * @hooked yuma_header_start -  10
 * @hooked yuma_add_topbar_section -  20
 * @hooked yuma_header_navbar_wrapper -  25
 * @hooked yuma_add_header_section -  30
 * @hooked yuma_add_navbar_section -  40
 *
 */
do_action( 'yuma_header_start_action' );

/**
 * yuma_header_ends_action hook
 *
 * @hooked yuma_header_navbar_wrapper_ends -  10
 * @hooked yuma_header_ends -  20
 *
 */
do_action( 'yuma_header_ends_action' );

/**
 * yuma_site_content_start_action hook
 *
 * @hooked yuma_site_content_start -  10
 *
 */
do_action( 'yuma_site_content_start_action' );

/**
 * yuma_primary_content_action hook
 *
 * @hooked yuma_add_slider_section -  10
 * @hooked yuma_add_introduction_section -  20
 * @hooked yuma_add_featured_categories_section -  30
 * @hooked yuma_add_featured_section -  40
 * @hooked yuma_add_hero_content_section -  50
 * @hooked yuma_add_popular_section -  60
 * @hooked yuma_add_cta_section -  70
 *
 */
do_action( 'yuma_primary_content_action' );
