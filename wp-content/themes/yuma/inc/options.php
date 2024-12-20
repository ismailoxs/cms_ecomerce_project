<?php
/**
 * Options functions
 *
 * @package yuma
 */

if ( ! function_exists( 'yuma_show_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function yuma_show_options() {
        $arr = array(
            'on'        => '&#x2714;',
            'off'       => '&#88;'
        );
        return apply_filters( 'yuma_show_options', $arr );
    }
endif;

if ( ! function_exists( 'yuma_page_choices' ) ) :
    /**
     * List of pages for page choices.
     * @return Array Array of page ids and name.
     */
    function yuma_page_choices() {
        $pages = get_pages();
        $choices = array();
        $choices[0] = esc_html__( 'None', 'yuma' );
        foreach ( $pages as $page ) {
            $choices[ $page->ID ] = $page->post_title;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'yuma_post_choices' ) ) :
    /**
     * List of posts for post choices.
     * @return Array Array of post ids and name.
     */
    function yuma_post_choices() {
        $posts = get_posts( array( 'numberposts' => -1 ) );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'yuma' );
        foreach ( $posts as $post ) {
            $choices[ $post->ID ] = $post->post_title;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'yuma_get_all_image_sizes' ) ) :
    /**
     * Get all the registered image sizes along with their dimensions
     *
     * @global array $_wp_additional_image_sizes
     *
     * @link http://core.trac.wordpress.org/ticket/18947 Reference ticket
     *
     * @return array $image_sizes The image sizes
     */
    function yuma_get_all_image_sizes() {
        global $_wp_additional_image_sizes;

        $default_image_sizes = get_intermediate_image_sizes();
        $choices = array();

        foreach ( $default_image_sizes as $size ) {
            $choices[$size] = ucwords( str_replace( array( '_', '-' ), ' ', $size ) );
        }

        return $choices;
    }
endif;

if ( ! function_exists( 'yuma_category_choices' ) ) :
    /**
     * List of categories for category choices.
     * @return Array Array of category ids and name.
     */
    function yuma_category_choices() {
        $args = array(
                'type'          => 'post',
                'child_of'      => 0,
                'parent'        => '',
                'orderby'       => 'name',
                'order'         => 'ASC',
                'hide_empty'    => true,
                'hierarchical'  => 0,
                'taxonomy'      => 'category',
            );
        $categories = get_categories( $args );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'yuma' );
        foreach ( $categories as $category ) {
            $choices[ $category->term_id ] = $category->name;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'yuma_tag_choices' ) ) :
    /**
     * List of tags for category choices.
     * @return Array Array of tag ids and name.
     */
    function yuma_tag_choices() {
        $args = array(
                'taxonomy' => 'post_tag',
                'hide_empty' => true,
            );
        $tags = get_terms( $args );
        $choices = array();
        $choices[0] = esc_html__( 'None', 'yuma' );
        foreach ( $tags as $category ) {
            $choices[ $category->term_id ] = $category->name;
        }
        return $choices;
    }
endif;

if ( ! function_exists( 'yuma_topbar_elements_options' ) ) :
    /**
     * List of topbar elements options
     * @return array 
     */
    function yuma_topbar_elements_options() {
        $yuma_topbar_elements = array(
            'date'              => esc_html__( 'Date', 'yuma' ),
            'address'           => esc_html__( 'Address', 'yuma' ),
            'time'              => esc_html__( 'Time', 'yuma' ),
            'phone'             => esc_html__( 'Phone', 'yuma' ),
            'email'             => esc_html__( 'Email', 'yuma' ),
            'cart'              => esc_html__( 'WooCommerce Cart', 'yuma' ),
            'off_canvas_bar'    => esc_html__( 'Off Canvas Bar', 'yuma' ),
            'topbar_menu'       => esc_html__( 'Topbar Menu', 'yuma' ),
            'social_menu'       => esc_html__( 'Social Menu', 'yuma' ),
            'search'            => esc_html__( 'Search', 'yuma' ),
        );
        return apply_filters( 'yuma_topbar_elements_options', $yuma_topbar_elements );
    }
endif;

if ( ! function_exists( 'yuma_header_elements_options' ) ) :
    /**
     * List of header elements options
     * @return array 
     */
    function yuma_header_elements_options() {
        $yuma_header_elements = array(
            'site_details'      => esc_html__( 'Site Details', 'yuma' ),
            'address'           => esc_html__( 'Address', 'yuma' ),
            'time'              => esc_html__( 'Time', 'yuma' ),
            'phone'             => esc_html__( 'Phone', 'yuma' ),
            'email'             => esc_html__( 'Email', 'yuma' ),
            'cart'              => esc_html__( 'WooCommerce Cart', 'yuma' ),
            'product_search'    => esc_html__( 'WooCommerce Product Search', 'yuma' ),
            'off_canvas_bar'    => esc_html__( 'Off Canvas Bar', 'yuma' ),
            'primary_menu'      => esc_html__( 'Primary Menu', 'yuma' ),
            'social_menu'       => esc_html__( 'Social Menu', 'yuma' ),
            'search'            => esc_html__( 'Search', 'yuma' ),
            'button'            => esc_html__( 'Button', 'yuma' ),
            'widget'            => esc_html__( 'Header Widget Area', 'yuma' ),
        );
        return apply_filters( 'yuma_header_elements_options', $yuma_header_elements );
    }
endif;

if ( ! function_exists( 'yuma_navbar_elements_options' ) ) :
    /**
     * List of navbar elements options
     * @return array 
     */
    function yuma_navbar_elements_options() {
        $yuma_navbar_elements = array(
            'primary_menu'      => esc_html__( 'Primary Menu', 'yuma' ),
            'social_menu'       => esc_html__( 'Social Menu', 'yuma' ),
            'search'            => esc_html__( 'Search', 'yuma' ),
            'off_canvas_bar'    => esc_html__( 'Off Canvas Bar', 'yuma' ),
        );
        return apply_filters( 'yuma_navbar_elements_options', $yuma_navbar_elements );
    }
endif;

if ( ! function_exists( 'yuma_footer_elements_options' ) ) :
    /**
     * List of footer elements options
     * @return array 
     */
    function yuma_footer_elements_options() {
        $yuma_footer_elements = array(
            'footer_menu'       => esc_html__( 'Footer Menu', 'yuma' ),
            'social_menu'       => esc_html__( 'Social Menu', 'yuma' ),
            'custom_text'       => esc_html__( 'Custom Text', 'yuma' ),
        );
        return apply_filters( 'yuma_footer_elements_options', $yuma_footer_elements );
    }
endif;

if ( ! function_exists( 'typography_elements_list' ) ) :
    /**
     * List of typography elements list
     * @return array 
     */
    function typography_elements_list() {
        $yuma_typography_elements = array(
            'h1' => esc_html__( 'H1', 'yuma' ),
            'h2' => esc_html__( 'H2', 'yuma' ),
            'h3' => esc_html__( 'H3', 'yuma' ),
            'h4' => esc_html__( 'H4', 'yuma' ),
            'h5' => esc_html__( 'H5', 'yuma' ),
            'h6' => esc_html__( 'H6', 'yuma' ),
        );
        return apply_filters( 'typography_elements_list', $yuma_typography_elements );
    }
endif;

if ( ! function_exists( 'theme_typography_list' ) ) :
    /**
     * List of typography elements list
     * @return array 
     */
    function theme_typography_list() {
        $yuma_typography_elements = array(
            'section_title' => array(
                    'title' => esc_html__( 'Blog Page Section Header', 'yuma' ),
                    'note'  => esc_html__( 'All Blog Page Section\'s Header', 'yuma' ),
                ),
            'home_title'    => array(
                    'title' => esc_html__( 'Blog Page Post Title', 'yuma' ),
                    'note'  => esc_html__( 'All Blog Page Section\'s Post/Page Entry Title', 'yuma' ),
                ),
            'page_title'    => array(
                    'title' => esc_html__( 'Page Title', 'yuma' ),
                    'note'  => esc_html__( 'Single Post, Page and Archive Page Title', 'yuma' ),
                ),
            'entry_title'    => array(
                    'title' => esc_html__( 'Archive Blog Title', 'yuma' ),
                    'note'  => esc_html__( 'Post Title of Archive, Search Pages', 'yuma' ),
                ),
            'entry_meta'    => array(
                    'title' => esc_html__( 'Meta Data', 'yuma' ),
                    'note'  => esc_html__( 'Entire Site Categories, Date, Author and Read Time', 'yuma' ),
                ),
        );
        return apply_filters( 'theme_typography_list', $yuma_typography_elements );
    }
endif;

if ( ! function_exists( 'yuma_site_details_layout' ) ) :
    /**
     * site detials layout
     * @return array site layout
     */
    function yuma_site_details_layout() {
        $yuma_site_details_layout = array(
            'horizontal-site-details'    => esc_url( get_template_directory_uri() ) . '/assets/uploads/horizontal-site-details.jpg',
            'vertical-site-details'   => esc_url( get_template_directory_uri() ) . '/assets/uploads/vertical-site-details.jpg',
        );

        $output = apply_filters( 'yuma_site_details_layout', $yuma_site_details_layout );

        return $output;
    }
endif;

if ( ! function_exists( 'yuma_site_layout' ) ) :
    /**
     * site layout
     * @return array site layout
     */
    function yuma_site_layout() {
        $yuma_site_layout = array(
            'full'    => esc_url( get_template_directory_uri() ) . '/assets/uploads/full.png',
            'boxed'   => esc_url( get_template_directory_uri() ) . '/assets/uploads/boxed.png',
            'frame'   => esc_url( get_template_directory_uri() ) . '/assets/uploads/frame.png',
        );

        $output = apply_filters( 'yuma_site_layout', $yuma_site_layout );

        return $output;
    }
endif;

if ( ! function_exists( 'yuma_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidebar position
     */
    function yuma_sidebar_position() {
        $yuma_sidebar_position = array(
            'right-sidebar' => esc_url( get_template_directory_uri() ) . '/assets/uploads/right.png',
            'left-sidebar'  => esc_url( get_template_directory_uri() ) . '/assets/uploads/left.png',
            'no-sidebar'    => esc_url( get_template_directory_uri() ) . '/assets/uploads/full-container.png',
            'no-sidebar-full'    => esc_url( get_template_directory_uri() ) . '/assets/uploads/full.png',
            'no-sidebar-content' => esc_url( get_template_directory_uri() ) . '/assets/uploads/no-sidebar-content.png',
        );

        $output = apply_filters( 'yuma_sidebar_position', $yuma_sidebar_position );

        return $output;
    }
endif;

if ( ! function_exists( 'yuma_get_spinner_list' ) ) :
    /**
     * List of spinner icons options.
     * @return array List of all spinner icon options.
     */
    function yuma_get_spinner_list() {
        $arr = array(
            'spinner-two-way'       => esc_html__( 'Two Way', 'yuma' ),
            'spinner-umbrella'      => esc_html__( 'Umbrella', 'yuma' ),
            'spinner-dots'          => esc_html__( 'Dots', 'yuma' ),
            'spinner-one-way'       => esc_html__( 'One Way', 'yuma' ),
        );
        return apply_filters( 'yuma_spinner_list', $arr );
    }
endif;

if ( ! function_exists( 'yuma_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function yuma_selected_sidebar() {
        $yuma_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'yuma' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar', 'yuma' ),
        );

        $output = apply_filters( 'yuma_selected_sidebar', $yuma_selected_sidebar );

        return $output;
    }
endif;
