<?php
/**
 * Yuma Theme Customizer
 *
 * @package yuma
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function yuma_customize_register( $wp_customize ) {

	// Load vendor custom control functions.
	require_once get_template_directory() . '/inc/customizer/vendor/customizer-custom-controls-master/functions.php';

	// Load custom control functions.
	require_once get_template_directory() . '/inc/customizer/controls.php';

	// Load callback functions.
	require_once get_template_directory() . '/inc/customizer/callbacks.php';

	// Load validation functions.
	require_once get_template_directory() . '/inc/customizer/validate.php';

	$wp_customize->add_section( new Yuma_Upsell_Section( $wp_customize, 'upsell_section',
	   array(
	      'title' => esc_html__( 'Upgrade To Pro Version', 'yuma' ),
	      'url' => 'https://yuma.sharkthemes.com/',
	      'backgroundcolor' => '#2271b1',
	      'textcolor' => '#fff',
	      'priority' => 0,
	   )
	) );

	// Add panel for common Header Settings
	$wp_customize->add_panel( 'yuma_header_panel' , array(
	    'title'      => esc_html__( 'Header Settings','yuma' ),
	    'priority'   => 100,
	) );

	// topbar settings
	require get_template_directory() . '/inc/customizer/header/topbar-customizer.php';

	// topbar style settings
	require get_template_directory() . '/inc/customizer/header/topbar-style-customizer.php';

	// topbar responsive settings
	require get_template_directory() . '/inc/customizer/header/topbar-responsive-customizer.php';
	
	// header settings
	require get_template_directory() . '/inc/customizer/header/header-customizer.php';

	// header style settings
	require get_template_directory() . '/inc/customizer/header/header-style-customizer.php';

	// header responsive settings
	require get_template_directory() . '/inc/customizer/header/header-responsive-customizer.php';

	// navbar settings
	require get_template_directory() . '/inc/customizer/header/navbar-customizer.php';

	// navbar style settings
	require get_template_directory() . '/inc/customizer/header/navbar-style-customizer.php';

	// navbar responsive settings
	require get_template_directory() . '/inc/customizer/header/navbar-responsive-customizer.php';

	

	// Add panel for common Home Page Settings
	$wp_customize->add_panel( 'yuma_homepage_sections_panel' , array(
	    'title'     	=> esc_html__( 'Home/Blog Page Sections','yuma' ),
	    'description'   => esc_html__( 'Sections Below will be visible in Latest Posts Homepage and Blog Page.','yuma' ),
	    'priority'   => 100,
	) );

	// slider settings
	require get_template_directory() . '/inc/customizer/homepage-sections/slider-customizer.php';

	// introduction settings
	require get_template_directory() . '/inc/customizer/homepage-sections/introduction-customizer.php';

	// featured categories settings
	require get_template_directory() . '/inc/customizer/homepage-sections/featured-categories-customizer.php';

	// featured settings
	require get_template_directory() . '/inc/customizer/homepage-sections/featured-customizer.php';

	// hero content settings
	require get_template_directory() . '/inc/customizer/homepage-sections/hero-content-customizer.php';

	// popular settings
	require get_template_directory() . '/inc/customizer/homepage-sections/popular-customizer.php';

	// cta settings
	require get_template_directory() . '/inc/customizer/homepage-sections/cta-customizer.php';

	// latest blog settings
	require get_template_directory() . '/inc/customizer/homepage-sections/latest-blog-customizer.php';
	

	// Add panel for common Footer Settings
	$wp_customize->add_panel( 'yuma_footer_panel' , array(
	    'title'      => esc_html__( 'Footer Settings','yuma' ),
	    'priority'   => 100,
	) );

	// footer widget area style settings
	require get_template_directory() . '/inc/customizer/footer/footer-widget-style-customizer.php';

	// footer settings
	require get_template_directory() . '/inc/customizer/footer/footer-customizer.php';

	// footer style settings
	require get_template_directory() . '/inc/customizer/footer/footer-style-customizer.php';

	// footer back to top settings
	require get_template_directory() . '/inc/customizer/footer/footer-btt-customizer.php';

	// Add panel for typography Settings
	$wp_customize->add_panel( 'yuma_typography_panel' , array(
	    'title'      => esc_html__( 'Typography Options','yuma' ),
	    'priority'   => 100,
	) );

	// global typography settings
	require get_template_directory() . '/inc/customizer/typography/global-typography-customizer.php';

	// theme typography settings
	require get_template_directory() . '/inc/customizer/typography/theme-typography-customizer.php';
	

	// Add panel for common Home Page Settings
	$wp_customize->add_panel( 'yuma_theme_options_panel' , array(
	    'title'      => esc_html__( 'Inner Page Options','yuma' ),
	    'priority'   => 100,
	) );
	

	// sidebar settings
	require get_template_directory() . '/inc/customizer/sidebar-customizer.php';

	// blog/archive settings
	require get_template_directory() . '/inc/customizer/blog-customizer.php';

	// single settings
	require get_template_directory() . '/inc/customizer/single-customizer.php';

	// page settings
	require get_template_directory() . '/inc/customizer/page-customizer.php';

	// site layout settings
	require get_template_directory() . '/inc/customizer/site-layout-customizer.php';

	// cursor settings
	require get_template_directory() . '/inc/customizer/cursor-customizer.php';

	// preloader settings
	require get_template_directory() . '/inc/customizer/preloader-customizer.php';

	// 404 settings
	require get_template_directory() . '/inc/customizer/404-customizer.php';
	
	// color settings
	require get_template_directory() . '/inc/customizer/color-customizer.php';

}
add_action( 'customize_register', 'yuma_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function yuma_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function yuma_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function yuma_customize_preview_js() {
	wp_enqueue_script( 'yuma-customizer', get_template_directory_uri() . '/assets/js/customizer' . yuma_min() . '.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'yuma_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function yuma_customize_control_js() {
	// Choose from select jquery.
	wp_enqueue_style( 'jquery-chosen', get_template_directory_uri() . '/assets/css/chosen' . yuma_min() . '.css' );
	wp_enqueue_script( 'jquery-chosen', get_template_directory_uri() . '/assets/js/chosen' . yuma_min() . '.js', array( 'jquery' ), '1.4.2', true );

	wp_enqueue_style( 'yuma-customizer-style', get_template_directory_uri() . '/assets/css/customizer' . yuma_min() . '.css' );
	wp_enqueue_script( 'yuma-customizer-controls', get_template_directory_uri() . '/assets/js/customizer-controls' . yuma_min() . '.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'yuma_customize_control_js' );
