<?php
/**
 * Theme functions and definitions
 *
 * @package yuma_shop
 */  

if ( ! function_exists( 'yuma_shop_enqueue_styles' ) ) :
	/**
	 * Load assets.
	 *
	 * @since 1.0.0
	 */
	function yuma_shop_enqueue_styles() {
		wp_enqueue_style( 'yuma-parent-style', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'yuma-shop-style', get_stylesheet_directory_uri() . '/style.css', array('yuma-parent-style') );
	}
endif;
add_action( 'wp_enqueue_scripts', 'yuma_shop_enqueue_styles' );

if ( ! function_exists( 'yuma_shop_theme_defaults' ) ) :
    /**
     * Customize theme defaults.
     *
     * @since 1.0.0
     *
     * @param array $defaults Theme defaults.
     * @param array Custom theme defaults.
     */
    function yuma_shop_theme_defaults( $defaults ) {
        // theme color
        $defaults['theme_color'] = 'custom';
        $defaults['color_primary'] = '#000000';
        $defaults['color_secondary'] = '#3248c6';

        // typography
        $defaults['body_font_family'] = json_encode(array('font' => 'Open Sans') );
        $defaults['heading_font_family'] = json_encode(array('font' => 'Barlow') );
        $defaults['section_title_font_family'] = json_encode(array('font' => 'Barlow') );
        $defaults['home_title_font_family'] = json_encode(array('font' => 'Barlow') );
        $defaults['page_title_font_family'] = json_encode(array('font' => 'Barlow') );
        $defaults['entry_title_font_family'] = json_encode(array('font' => 'Barlow') );
        $defaults['entry_meta_font_family'] = json_encode(array('font' => 'Open Sans') );

        // topbar section
        $defaults['enable_topbar'] = false;

        // // header section
        $defaults['header_height'] = 100;
        $defaults['header_left_element'] = 'primary_menu';
        $defaults['header_right_element'] = 'cart,search,off_canvas_bar';
        $defaults['header_area'] = 'custom';
        $defaults['header_left_area_size'] = 40;
        $defaults['header_center_area_size'] = 20;
        $defaults['header_right_area_size'] = 40;

        
        // // latest blog
        $defaults['enable_blog_before_element'] = false;
        $defaults['blog_column_type'] = 'column-2';
        $defaults['latest_blog_sidebar'] = true;
        $defaults['filter_blog_posts'] = 'none';
        
        // single post
        $defaults['single_header_image_layout'] = 'banner-featured-image';
        $defaults['enable_single_title_banner'] = true;
        $defaults['show_single_breadcrumb'] = true;
        $defaults['single_title_alignment'] = 'center-align';
        
        // page
        $defaults['page_header_image_layout'] = 'banner-featured-image';
        $defaults['enable_page_title_banner'] = true;
        $defaults['show_page_breadcrumb'] = true;
        $defaults['page_title_alignment'] = 'center-align';
        $defaults['show_static_page_title'] = false;
        $defaults['show_static_page_image'] = false;
        
        // archive
        $defaults['enable_blog_title_banner'] = true;
        $defaults['show_breadcrumb'] = true;
        $defaults['blog_title_alignment'] = 'center-align';

        return $defaults;
    }
endif;
add_filter( 'yuma_default_theme_options', 'yuma_shop_theme_defaults', 99 );

if ( ! function_exists( 'yuma_shop_set_theme_mods' ) ) :
    /**
     * Set theme mod.
     */
    function yuma_shop_set_theme_mods() {
        $theme_mod = get_theme_mod( 'yuma_theme_options' );
        if ( isset( $theme_mod ) && $theme_mod ) {
            return;
        }

        $yuma_theme_options = array( 
            
            // header section
            'header_center_element' => 'site_details',
            'header_bg_color' => '#f6f6f7',

            // single post
            'single_header_image_overlay_color' => 'rgba(0,0,0,0.3)',

            // page
            'page_header_image_overlay_color' => 'rgba(0,0,0,0.3)',

            // footer widget area
            'footer_bg_color' => '#000000',
            'footer_widget_bg_color' => '#000000',
            
            // footer btt
            'btt_bg_color' => 'rgba(0,0,0,0)',
            'btt_bg_hover_color' => 'rgba(0,0,0,0)',
            'btt_elements_color' => '#3248c6',
            'btt_elements_hover_color' => '#3248c6',

        );
        set_theme_mod( 'yuma_theme_options', $yuma_theme_options );
    }
endif;
add_action( 'after_setup_theme', 'yuma_shop_set_theme_mods' );

/**
 * Registers block patterns and categories.
 */
function yuma_shop_register_block_patterns() {
    $block_pattern_categories = array(
        'yuma-shop'     => array( 'label' => esc_html__( 'Yuma Shop', 'yuma-shop' ) ),
    );

    /**
     * block pattern categories.
     */
    $block_pattern_categories = apply_filters( 'yuma_shop_block_pattern_categories', $block_pattern_categories );

    foreach ( $block_pattern_categories as $name => $properties ) {
        if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
            register_block_pattern_category( $name, $properties );
        }
    }
}
add_action( 'init', 'yuma_shop_register_block_patterns', 100 );
