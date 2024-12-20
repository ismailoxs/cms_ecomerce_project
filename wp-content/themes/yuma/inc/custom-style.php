<?php
/**
 * custom style
 *
 * @package yuma
 */

if ( ! function_exists( 'yuma_custom_style' ) ) :
    /**
     * custom css enqueue
     */
    function yuma_custom_style() {
        $css = '';

        /*
         * Site layout
         */

        $site_bg_color = yuma_theme_option( 'site_bg_color', '#ffffff' );
        $site_bg_image = yuma_theme_option( 'site_bg_image' );
        $enable_site_bg_repeat = yuma_theme_option( 'enable_site_bg_repeat' ) ? 'repeat' : 'no-repeat';
        $enable_site_bg_size_cover = yuma_theme_option( 'enable_site_bg_size_cover' ) ? 'cover' : 'contain';
        $enable_site_bg_fixed = yuma_theme_option( 'enable_site_bg_fixed' ) ? 'fixed' : 'scroll';
        if ( '#ffffff' != $site_bg_color ) {
            $css .= 'body #page, body.dark-mode #page {
                background-color: ' . esc_attr( $site_bg_color ) . ';
                }';
        }
        if ( ! empty( $site_bg_image ) ) {
            $css .= 'body #page {
                background-image: url(' . esc_attr( $site_bg_image ) . ');
                background-repeat: ' . esc_attr( $enable_site_bg_repeat ) . '; 
                background-attachment: ' . esc_attr( $enable_site_bg_fixed ) . ';
                background-size: ' . esc_attr( $enable_site_bg_size_cover ) . ';
            }';
        }

        if ( in_array( yuma_theme_option( 'site_layout' ), array( 'boxed', 'frame' ) ) ) {
            $site_frame_bg_color = yuma_theme_option( 'site_frame_bg_color', '#eeeeee' );
            $site_frame_bg_image = yuma_theme_option( 'site_frame_bg_image' );
            $enable_site_frame_bg_repeat = yuma_theme_option( 'enable_site_frame_bg_repeat' ) ? 'repeat' : 'no-repeat';
            $enable_site_frame_bg_size_cover = yuma_theme_option( 'enable_site_frame_bg_size_cover' ) ? 'cover' : 'contain';
            $enable_site_frame_bg_fixed = yuma_theme_option( 'enable_site_frame_bg_fixed' ) ? 'fixed' : 'scroll';
            if ( '#eeeeee' != $site_frame_bg_color ) {
                $css .= 'body {
                    background-color: ' . esc_attr( $site_frame_bg_color ) . ';
                    }';
            }
            if ( ! empty( $site_frame_bg_image ) ) {
                $css .= 'body {
                    background-image: url(' . esc_attr( $site_frame_bg_image ) . ');
                    background-repeat: ' . esc_attr( $enable_site_frame_bg_repeat ) . '; 
                    background-attachment: ' . esc_attr( $enable_site_frame_bg_fixed ) . ';
                    background-size: ' . esc_attr( $enable_site_frame_bg_size_cover ) . ';
                }';
            }
        }

        /*
         * Cursor
         */
        $circle_cursor_color = yuma_theme_option( 'circle_cursor_color', '#eba54c' );
        $css .= '.circle-cursor .cursor-inner,
                .circle-cursor .cursor-inner.cursor-hover { 
                    background-color:' . esc_attr( $circle_cursor_color ) . ';
                }
                .circle-cursor .cursor-outer { 
                    border-color:' . esc_attr( $circle_cursor_color ) . ';
                }';

        /*
         * Preloader
         */
        $preloader_bg_color = yuma_theme_option( 'preloader_bg_color', '#ffffff' );
        $preloader_icon_color = yuma_theme_option( 'preloader_icon_color', '#0a0e14' );
        $preloader_image_size = yuma_theme_option( 'preloader_image_size' );
        $css .= '#loader { 
                    background-color:' . esc_attr( $preloader_bg_color ) . ';
                }
                #loader .loader-container svg { 
                    fill:' . esc_attr( $preloader_icon_color ) . ';
                }
                #loader .loader-container img { 
                    max-width:' . absint( $preloader_image_size ) . 'px;
                }';

        /*
         * 404
         */
        $image_size_fof = yuma_theme_option( '404_image_size' );
        $css .= '.image-404 img { 
                    max-width:' . absint( $image_size_fof ) . 'px;
                }';
                
        /*
         * Typography
         */

        // global body typography
        $body_font_size = yuma_theme_option( 'body_font_size' );
        $body_font_weight = yuma_theme_option( 'body_font_weight' );
        $body_font_family = yuma_theme_option( 'body_font_family' );
        $body_font_family = json_decode( $body_font_family );
        $css .= 'body { 
                    font-family:' . esc_attr( $body_font_family->font ) . ', sans-serif;
                    font-size: ' . absint( $body_font_size ) . 'px;
                    font-weight:' . esc_attr( $body_font_weight ) . ';
                }';

        // heading typography
        $heading_font_family = yuma_theme_option( 'heading_font_family' );
        $heading_font_family = json_decode( $heading_font_family );
        $css .= 'h1, h2, h3, h4, h5, h6,
                h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, .site-title a { 
                    font-family:' . esc_attr( $heading_font_family->font ) . ', sans-serif;
                }';

        $typography = typography_elements_list();
        foreach ( $typography as $key => $value ):
            $font_size = yuma_theme_option( $key .'_font_size' );
            $font_weight = yuma_theme_option( $key .'_font_weight' );
            $css .= $key .', ' . $key . ' a { 
                    font-weight:' . esc_attr( $font_weight ) . ';
                }';
            $css .= '@media screen and (min-width: 1024px) {'
                    . $key .', ' . $key . ' a { 
                        font-size: ' . absint( $font_size ) . 'px;
                    }
                }';
        endforeach;

        /*
         * Topbar custom style
         */

        $topbar_elements_color = yuma_theme_option( 'topbar_elements_color', '#ffffff' );
        if ( '#ffffff' !== $topbar_elements_color ) {
            $css .= '
                #top-menu .inner-wrapper .topbar-element, 
                #top-menu .inner-wrapper .topbar-element p, 
                .topbar-open-search form.search-form input,
                .topbar-open-search form.search-form input::placeholder,
                #top-menu .inner-wrapper .topbar-element a { 
                    color: ' . esc_attr( $topbar_elements_color ) . ';
                }
                .topbar-element a.off-canvas-bar span { 
                    background-color: ' . esc_attr( $topbar_elements_color ) . '; 
                }
                .topbar-open-search form.search-form input {
                    border: none;
                    box-shadow: 0px 0px 1px 0px ' . esc_attr( $topbar_elements_color ) . ';
                }
                #top-menu .topbar-element.topbar_button a.topbar-btn { 
                    border-color:' . esc_attr( $topbar_elements_color ) . ';
                }
                .topbar-element.social-menu ul li a svg,
                .topbar-element svg { 
                    fill: ' . esc_attr( $topbar_elements_color ) . ';
                }';
        }

        $topbar_dropdown_icon_color = yuma_theme_option( 'topbar_dropdown_icon_color', '#ffffff' );
        if ( '#ffffff' !== $topbar_dropdown_icon_color ) {
            $css .= '
                #top-menu svg.icon-up, 
                #top-menu svg.icon-down { 
                    fill: ' . esc_attr( $topbar_dropdown_icon_color ) . ';
                }';
        }

        $topbar_bg_color = yuma_theme_option( 'topbar_bg_color', 'rgba(16,23,31,1)' );
        if ( 'rgba(16,23,31,1)' !== $topbar_bg_color ) {
            $css .= '
                #top-menu { 
                    background-color: ' . esc_attr( $topbar_bg_color ) . '; 
                }';
        }

        $topbar_bg_image = yuma_theme_option( 'topbar_bg_image' );
        if ( ! empty( $topbar_bg_image ) ) {
            $css .= '
                #top-menu { 
                    background-image: url(' . esc_url( $topbar_bg_image ) . ');
                }';
        }

        $topbar_height = yuma_theme_option( 'topbar_height' );
        if ( 50 !== $topbar_height ) {
            $css .= '
                @media screen and (min-width: 1024px) {
                    #top-menu { 
                        height: ' . absint( $topbar_height ) . 'px; 
                    }
                }';
        }

        $topbar_font_size = yuma_theme_option( 'topbar_font_size' );
        if ( 14 !== $topbar_font_size ) {
            $css .= '
                @media screen and (min-width: 1024px) {
                    #top-menu .inner-wrapper .topbar-element a, 
                    #top-menu .inner-wrapper .topbar-element { 
                        font-size: ' . absint( $topbar_font_size ) . 'px; 
                    }
                    #top-menu .topbar-element.social-menu ul li a svg, 
                    #top-menu .topbar-element svg {
                        height: calc(' . esc_attr( $topbar_font_size ) . 'px - 1px );
                        width: calc(' . esc_attr( $topbar_font_size ) . 'px - 1px );
                    }
                }';
        }

        $topbar_border_height = yuma_theme_option( 'topbar_border_height', 0 );
        $topbar_border_color = yuma_theme_option( 'topbar_border_color', 'rgba(255,255,255,0.1)' );
        $css .= '
            #top-menu:after { 
                height: ' . esc_attr( $topbar_border_height ) . 'px;
                background-color: ' . esc_attr( $topbar_border_color ) . ';
            }';

        $topbar_area = yuma_theme_option( 'topbar_area' );
        if ( 'auto' == $topbar_area ) {
            $css .= '
            #top-menu .inner-wrapper .topbar-left, 
            #top-menu .inner-wrapper .topbar-center, 
            #top-menu .inner-wrapper .topbar-right {
                flex: auto;
            }';
        }

        $topbar_area = yuma_theme_option( 'topbar_area' );
        if ( 'custom' == $topbar_area ) {
            $left = yuma_theme_option( 'topbar_left_area_size' );
            $center = yuma_theme_option( 'topbar_center_area_size' );
            $right = yuma_theme_option( 'topbar_right_area_size' );
            $css .= '
            #top-menu .inner-wrapper .topbar-left, 
            #top-menu .inner-wrapper .topbar-center, 
            #top-menu .inner-wrapper .topbar-right {
                flex: auto;
            }
            @media screen and (min-width: 1024px) {
                #top-menu .inner-wrapper .topbar-left {
                    flex-basis: ' . absint( $left ) . '%;
                }
                #top-menu .inner-wrapper .topbar-center {
                    flex-basis: ' . absint( $center ) . '%;
                }
                #top-menu .inner-wrapper .topbar-right {
                    flex-basis: ' . absint( $right ) . '%;
                }
            }';
        }
        
        /*
         * Header custom style
         */

        $header_bg_image = yuma_theme_option( 'header_bg_image' );
        if ( ! empty( $header_bg_image ) ) {
            $css .= '
                #masthead { 
                    background-image: url(' . esc_url( $header_bg_image ) . ');
                }';
        }
        $header_bg_image_size = yuma_theme_option( 'header_bg_image_size', 'cover' );
        $header_bg_image_repeat = yuma_theme_option( 'header_bg_image_repeat' );
        $header_bg_image_fixed = yuma_theme_option( 'header_bg_image_fixed' );
        $css .= '
            #masthead { 
                background-size:' . esc_attr( $header_bg_image_size ) . ';
                background-repeat:' . esc_attr( $header_bg_image_repeat ? 'repeat' : 'no-repeat' ) . ';
                background-attachment:' . esc_attr( $header_bg_image_fixed ? 'fixed' : 'scroll' ) . ';
            }';

        $header_bg_color = yuma_theme_option( 'header_bg_color', 'rgba(255,255,255,1)' );
        if ( 'rgba(255,255,255,1)' !== $header_bg_color ) {
            $css .= '
                #masthead { 
                    background-color:' . esc_attr( $header_bg_color ) . ';
                }';
            $css .= '@media screen and (min-width: 1024px){
                #masthead .header-element .main-navigation ul.nav-menu li ul.sub-menu {
                    background-color:' . esc_attr( $header_bg_color ) . ';
                }
            }';
        }

        $header_font_size = yuma_theme_option( 'header_font_size' );
        if ( 17 !== $header_font_size ) {
            $css .= '
                @media screen and (min-width: 1024px) {
                    #masthead, 
                    .header-element.header-meta .header-meta-details,
                    #masthead .main-navigation a { 
                        font-size: ' . absint( $header_font_size ) . 'px; 
                    }
                    .header-element.social-menu ul li a svg, 
                    .header-element svg {
                        height: calc(' . esc_attr( $header_font_size ) . 'px - 1px );
                        width: calc(' . esc_attr( $header_font_size ) . 'px - 1px );
                    }
                    .header-element .main-navigation svg {
                        height: 14px;
                        width: 16px;
                    }
                }';
        }

        $header_height = yuma_theme_option( 'header_height' );
        if ( 100 !== $header_height ) {
            $css .= '
                @media screen and (min-width: 1024px) {
                    #masthead .header-container { 
                        height: ' . absint( $header_height ) . 'px; 
                    }
                }';
        }

        $header_sticky_bg_color = yuma_theme_option( 'header_sticky_bg_color', 'rgba(255,255,255,1)' );
        if ( 'rgba(255,255,255,1)' !== $header_sticky_bg_color ) {
            $css .= '
                #masthead.site-header.sticky-header.nav-shrink .header-container { 
                    background-color:' . esc_attr( $header_sticky_bg_color ) . ';
                    height: calc(' . esc_attr( $header_height ) . 'px - 10px );
                }';
        }

        $header_margin = yuma_theme_option( 'header_margin' );
        if ( isset( $header_margin ) ) {
            $css .= '
                @media screen and (min-width: 1024px) {
                    #masthead,
                    #masthead.container-width { 
                        margin-top: ' . absint( $header_margin ) . 'px; 
                    }
                }';
        }

        $header_elements_color = yuma_theme_option( 'header_elements_color', '#0a0e14' );
        if ( '#0a0e14' !== $header_elements_color ) {
            $css .= '
                .header-element,
                .header-open-search form.search-form input,
                .header-open-search form.search-form input::placeholder,
                .header-element a.btn.header-btn,
                .header-element p,
                .header-element a { 
                    color:' . esc_attr( $header_elements_color ) . ';
                }
                .header-element #search .search-form svg.icon-search,
                .header-element .customize-partial-edit-shortcut-button svg {
                    fill: #ffffff;
                }
                .header-element a.off-canvas-bar span { 
                    background-color: ' . esc_attr( $header_elements_color ) . '; 
                }
                .header-open-search form.search-form input {
                    border: none;
                    box-shadow: 0px 0px 1px 0px ' . esc_attr( $header_elements_color ) . ';
                }
                .header-element a.btn.btn-transparent,
                .header-element.header-meta .header-meta-icon { 
                    border-color:' . esc_attr( $header_elements_color ) . ';
                }
                .header-element .main-navigation li.menu-item-has-children ul li svg,
                .header-element.social-menu ul li a svg,
                .header-element svg.icon-search,
                .header-element svg { 
                    fill:' . esc_attr( $header_elements_color ) . ';
                }';
            $css .= '
                @media screen and (min-width: 1024px) {
                    .header-element .main-navigation ul.sub-menu li a,
                    #masthead .header-element .main-navigation ul.sub-menu li a:hover { 
                        color:' . esc_attr( $header_elements_color ) . ';
                    }
                }';
        }

        $header_sticky_elements_color = yuma_theme_option( 'header_sticky_elements_color', '#0a0e14' );
        if ( '#0a0e14' !== $header_sticky_elements_color ) {
            $css .= '
                #masthead.site-header.sticky-header.nav-shrink .header-element,
                #masthead.site-header.sticky-header.nav-shrink .header-open-search form.search-form input,
                #masthead.site-header.sticky-header.nav-shrink .header-open-search form.search-form input::placeholder,
                #masthead.site-header.sticky-header.nav-shrink .header-element a.btn.header-btn,
                #masthead.site-header.sticky-header.nav-shrink .header-element p,
                #masthead.site-header.sticky-header.nav-shrink .header-element a { 
                    color:' . esc_attr( $header_sticky_elements_color ) . ';
                }
                #masthead.site-header.sticky-header.nav-shrink .header-element #search .search-form svg.icon-search,
                #masthead.site-header.sticky-header.nav-shrink .header-element .customize-partial-edit-shortcut-button svg {
                    fill: #ffffff;
                }
                #masthead.site-header.sticky-header.nav-shrink .header-element a.off-canvas-bar span { 
                    background-color: ' . esc_attr( $header_sticky_elements_color ) . '; 
                }
                #masthead.site-header.sticky-header.nav-shrink .header-open-search form.search-form input {
                    border: none;
                    box-shadow: 0px 0px 1px 0px ' . esc_attr( $header_sticky_elements_color ) . ';
                }
                #masthead.site-header.sticky-header.nav-shrink .header-element a.btn.btn-transparent,
                #masthead.site-header.sticky-header.nav-shrink .header-element.header-meta .header-meta-icon { 
                    border-color:' . esc_attr( $header_sticky_elements_color ) . ';
                }
                #masthead.site-header.sticky-header.nav-shrink .header-element.social-menu ul li a svg,
                #masthead.site-header.sticky-header.nav-shrink .header-element svg.icon-search,
                #masthead.site-header.sticky-header.nav-shrink .header-element svg { 
                    fill:' . esc_attr( $header_sticky_elements_color ) . ';
                }';
        }

        $header_border_height = yuma_theme_option( 'header_border_height', 0 );
        $header_border_color = yuma_theme_option( 'header_border_color', 'rgba(255,255,255,0.1)' );
        $css .= '
            #masthead:after { 
                height: ' . esc_attr( $header_border_height ) . 'px;
                background-color: ' . esc_attr( $header_border_color ) . ';
            }';

        $header_area = yuma_theme_option( 'header_area' );
        if ( 'auto' == $header_area ) {
            $css .= '
            #masthead .inner-wrapper .header-left, 
            #masthead .inner-wrapper .header-center, 
            #masthead .inner-wrapper .header-right {
                flex: auto;
            }';
        }

        $header_area = yuma_theme_option( 'header_area' );
        if ( 'custom' == $header_area ) {
            $left = yuma_theme_option( 'header_left_area_size' );
            $center = yuma_theme_option( 'header_center_area_size' );
            $right = yuma_theme_option( 'header_right_area_size' );
            $css .= '
            #masthead .inner-wrapper .header-left, 
            #masthead .inner-wrapper .header-center, 
            #masthead .inner-wrapper .header-right {
                flex: auto;
            }
            @media screen and (min-width: 1024px) {
                #masthead .inner-wrapper .header-left {
                    flex-basis: ' . absint( $left ) . '%;
                }
                #masthead .inner-wrapper .header-center {
                    flex-basis: ' . absint( $center ) . '%;
                }
                #masthead .inner-wrapper .header-right {
                    flex-basis: ' . absint( $right ) . '%;
                }
            }';
        }

        // site details
        $enable_header_site_details_title = yuma_theme_option( 'enable_header_site_details_title' );
        if ( ! $enable_header_site_details_title ) {
            $css .= '
                .header-element .site-title a { 
                    display: none;
                }';
        }

        $enable_header_site_details_description = yuma_theme_option( 'enable_header_site_details_description' );
        if ( ! $enable_header_site_details_description ) {
            $css .= '
                .header-element p.site-description { 
                    display: none;
                }';
        }

        $site_logo_height = yuma_theme_option( 'header_site_details_logo_height', 80 );
        if ( 80 != $site_logo_height ) {
            $css .= '
                @media screen and (min-width: 1024px) {
                    #masthead.site-header.sticky-header.nav-shrink .site-branding img.custom-logo,
                    .header-element.site-branding img.custom-logo {
                        max-height:' . absint( $site_logo_height ) . 'px;
                    }
                }';
        }
        
        /*
         * Navbar custom style
         */

        $navbar_elements_color = yuma_theme_option( 'navbar_elements_color', '#ffffff' );
        if ( '#ffffff' !== $navbar_elements_color ) {
            $css .= '
                #navbar .inner-wrapper .navbar-element, 
                #navbar .inner-wrapper .navbar-element p, 
                .navbar-open-search form.search-form input,
                .navbar-open-search form.search-form input::placeholder,
                #navbar .inner-wrapper .navbar-element a { 
                    color: ' . esc_attr( $navbar_elements_color ) . ';
                }
                .navbar-element a.off-canvas-bar span { 
                    background-color: ' . esc_attr( $navbar_elements_color ) . '; 
                }
                .navbar-open-search form.search-form input {
                    border: none;
                    box-shadow: 0px 0px 1px 0px ' . esc_attr( $navbar_elements_color ) . ';
                }
                #navbar .navbar-element.navbar_button a.navbar-btn { 
                    border-color:' . esc_attr( $navbar_elements_color ) . ';
                }
                .navbar-element .main-navigation li.menu-item-has-children ul li svg,
                .navbar-element.social-menu ul li a svg,
                .navbar-element .main-navigation svg,
                .navbar-element svg.icon-search,
                .navbar-element svg { 
                    fill: ' . esc_attr( $navbar_elements_color ) . ';
                }';
            $css .= '
                @media screen and (min-width: 1024px) {
                    #navbar .inner-wrapper .navbar-element .main-navigation ul.sub-menu li a:hover, 
                    #navbar .inner-wrapper .navbar-element .main-navigation ul.sub-menu li a, 
                    #navbar .inner-wrapper .navbar-element .main-navigation a { 
                        color:' . esc_attr( $navbar_elements_color ) . ';
                    }
                }';
        }

        $navbar_bg_color = yuma_theme_option( 'navbar_bg_color', 'rgba(16,23,31,1)' );
        if ( 'rgba(16,23,31,1)' !== $navbar_bg_color ) {
            $css .= '
                #navbar, #navbar div.mini-cart .mini-cart-items { 
                    background-color: ' . esc_attr( $navbar_bg_color ) . '; 
                }';
            $css .= '@media screen and (min-width: 1024px){
                #navbar .inner-wrapper .navbar-element .main-navigation ul.sub-menu {
                    background-color:' . esc_attr( $navbar_bg_color ) . ';
                }
            }';
        }

        $navbar_height = yuma_theme_option( 'navbar_height' );
        if ( 8 !== $navbar_height ) {
            $css .= '
                @media screen and (min-width: 1024px) {
                    #navbar .navbar-container { 
                        height: ' . absint( $navbar_height ) . 'px; 
                    }
                }';
        }

        $navbar_margin = yuma_theme_option( 'navbar_margin' );
        if ( isset( $navbar_margin ) ) {
            $css .= '
                @media screen and (min-width: 1024px) {
                    #navbar,
                    #navbar.container-width { 
                        margin-top: ' . esc_attr( $navbar_margin ) . 'px; 
                    }
                }';
        }

        $navbar_border_radius = yuma_theme_option( 'navbar_border_radius' );
        if ( isset( $navbar_border_radius ) ) {
            $css .= '
                @media screen and (min-width: 1024px) {
                    #navbar { 
                        border-radius: ' . esc_attr( $navbar_border_radius ) . 'px; 
                    }
                }';
        }

        $navbar_font_size = yuma_theme_option( 'navbar_font_size' );
        if ( 16 !== $navbar_font_size ) {
            $css .= '
                @media screen and (min-width: 1024px) {
                    #navbar .inner-wrapper .navbar-element a, 
                    #navbar .inner-wrapper .navbar-element { 
                        font-size: ' . absint( $navbar_font_size ) . 'px; 
                    }
                    .navbar-element.social-menu ul li a svg, 
                    .navbar-element svg {
                        height: calc(' . esc_attr( $navbar_font_size ) . 'px - 1px );
                        width: calc(' . esc_attr( $navbar_font_size ) . 'px - 1px );
                    }
                    .navbar-element .main-navigation svg {
                        height: 14px;
                        width: 16px;
                    }
                }';
        }

        $navbar_area = yuma_theme_option( 'navbar_area' );
        if ( 'auto' == $navbar_area ) {
            $css .= '
            #navbar .inner-wrapper .navbar-left, 
            #navbar .inner-wrapper .navbar-center, 
            #navbar .inner-wrapper .navbar-right {
                flex: auto;
            }';
        }

        $navbar_area = yuma_theme_option( 'navbar_area' );
        if ( 'custom' == $navbar_area ) {
            $left = yuma_theme_option( 'navbar_left_area_size' );
            $center = yuma_theme_option( 'navbar_center_area_size' );
            $right = yuma_theme_option( 'navbar_right_area_size' );
            $css .= '
            #navbar .inner-wrapper .navbar-left, 
            #navbar .inner-wrapper .navbar-center, 
            #navbar .inner-wrapper .navbar-right {
                flex: auto;
            }
            @media screen and (min-width: 1024px) {
                #navbar .inner-wrapper .navbar-left {
                    flex-basis: ' . absint( $left ) . '%;
                }
                #navbar .inner-wrapper .navbar-center {
                    flex-basis: ' . absint( $center ) . '%;
                }
                #navbar .inner-wrapper .navbar-right {
                    flex-basis: ' . absint( $right ) . '%;
                }
            }';
        }

        // navbar absolute position
        $navbar_position_absolute = yuma_theme_option( 'navbar_position_absolute' );
        $enable_topbar = yuma_theme_option( 'enable_topbar' );
        $topbar_offset = ! $enable_topbar ? 0 : $topbar_height;
        if ( $navbar_position_absolute ) {
            $css .= '
                #navbar { 
                    position: absolute;
                    top: calc(' . esc_attr( $topbar_offset ) . 'px + ' . esc_attr( $header_height ) . 'px );
                    left: 50%;
                    transform: translateX(-50%);
                }';
        }

        // header absolute position
        $header_position_absolute = yuma_theme_option( 'header_position_absolute' );
        if ( $header_position_absolute ) {
            $css .= '
                #masthead { 
                    position: absolute;
                    top:' . esc_attr( $topbar_offset ) . 'px;
                    left: 50%;
                    transform: translateX(-50%);
                }';
        }

        // topbar absolute position
        $topbar_position_absolute = yuma_theme_option( 'topbar_position_absolute' );
        if ( $topbar_position_absolute ) {
            $css .= '
                #top-menu { 
                    position: absolute;
                    top: 0;
                }
                @media screen and (max-width: 1023px) {
                    #top-menu .wrapper {
                        margin-top: 20px;
                        padding: 15px;
                        background-color: rgba(0,0,0,0.9);

                    }
                }';
        }

        /*
         * Footer custom style
         */

        $footer_elements_color = yuma_theme_option( 'footer_elements_color', '#ffffff' );
        if ( '#ffffff' !== $footer_elements_color ) {
            $css .= '
                #colophon .site-info .inner-wrapper .footer-element, 
                #colophon .site-info .inner-wrapper .footer-element p, 
                #colophon .site-info .inner-wrapper .footer-element a { 
                    color: ' . esc_attr( $footer_elements_color ) . ';
                }
                #colophon .site-info .inner-wrapper .footer-element ul.sub-menu li a {
                    color: #fff;
                }
                .footer-element.social-menu ul li a svg,
                .footer-element .menu-footer svg,
                .footer-element svg { 
                    fill: ' . esc_attr( $footer_elements_color ) . ';
                }';
        }

        $footer_bg_color = yuma_theme_option( 'footer_bg_color', '#0a0e14' );
        if ( '#0a0e14' !== $footer_bg_color ) {
            $css .= '
                #colophon .site-info { 
                    background-color: ' . esc_attr( $footer_bg_color ) . '; 
                }';
        }

        $footer_padding = yuma_theme_option( 'footer_padding' );
        if ( 30 !== $footer_padding ) {
            $css .= '
                @media screen and (min-width: 1024px) {
                    #colophon .site-info { 
                        padding: ' . absint( $footer_padding ) . 'px 0; 
                    }
                }';
        }

        $footer_font_size = yuma_theme_option( 'footer_font_size' );
        if ( 14 !== $footer_font_size ) {
            $css .= '
                @media screen and (min-width: 1024px) {
                    #colophon .site-info .inner-wrapper .footer-element a, 
                    #colophon .site-info .inner-wrapper .footer-element { 
                        font-size: ' . absint( $footer_font_size ) . 'px; 
                    }
                    .footer-element.social-menu ul li a svg, 
                    .footer-element svg {
                        height: ' . absint( $footer_font_size ) . 'px;
                        width: ' . absint( $footer_font_size ) . 'px;
                    }
                }';
        }

        $footer_area = yuma_theme_option( 'footer_area' );
        if ( 'auto' == $footer_area ) {
            $css .= '
            #colophon .site-info .inner-wrapper .footer-left, 
            #colophon .site-info .inner-wrapper .footer-center, 
            #colophon .site-info .inner-wrapper .footer-right {
                flex: auto;
            }';
        }

        if ( 'custom' == $footer_area ) {
            $left = yuma_theme_option( 'footer_left_area_size' );
            $center = yuma_theme_option( 'footer_center_area_size' );
            $right = yuma_theme_option( 'footer_right_area_size' );
            $css .= '
            #colophon .site-info .inner-wrapper .footer-left, 
            #colophon .site-info .inner-wrapper .footer-center, 
            #colophon .site-info .inner-wrapper .footer-right {
                flex: auto;
            }
            @media screen and (min-width: 1024px) {
                #colophon .site-info .inner-wrapper .footer-left {
                    flex-basis: ' . absint( $left ) . '%;
                }
                #colophon .site-info .inner-wrapper .footer-center {
                    flex-basis: ' . absint( $center ) . '%;
                }
                #colophon .site-info .inner-wrapper .footer-right {
                    flex-basis: ' . absint( $right ) . '%;
                }
            }';
        }

        $footer_widget_bg_color = yuma_theme_option( 'footer_widget_bg_color', '#0a0e14' );
        if ( '#0a0e14' !== $footer_widget_bg_color ) {
            $css .= '
                #colophon .footer-widget-container { 
                    background-color: ' . esc_attr( $footer_widget_bg_color ) . '; 
                }';
        }

        $footer_widget_bg_image = yuma_theme_option( 'footer_widget_bg_image' );
        if ( ! empty( $footer_widget_bg_image ) ) {
            $css .= '
                #colophon .footer-widget-container { 
                    background-image: url(' . esc_url( $footer_widget_bg_image ) . ');
                }';
        }
        $footer_widget_bg_image_size = yuma_theme_option( 'footer_widget_bg_image_size', 'cover' );
        $footer_widget_bg_image_repeat = yuma_theme_option( 'footer_widget_bg_image_repeat' );
        $footer_widget_bg_image_fixed = yuma_theme_option( 'footer_widget_bg_image_fixed' );
        $css .= '
            #colophon .footer-widget-container { 
                background-size:' . esc_attr( $footer_widget_bg_image_size ) . ';
                background-repeat:' . esc_attr( $footer_widget_bg_image_repeat ? 'repeat' : 'no-repeat' ) . ';
                background-attachment:' . esc_attr( $footer_widget_bg_image_fixed ? 'fixed' : 'scroll' ) . ';
            }';

        $footer_widget_title_separator = yuma_theme_option( 'footer_widget_title_separator' );
        if ( ! $footer_widget_title_separator ) {
            $css .= '
                .site-footer .widget-title:after, 
                .site-footer .widgettitle:after { 
                    display: none; 
                }';
        }

        $footer_widget_title_separator_color = yuma_theme_option( 'footer_widget_title_separator_color', '#eba54c' );
        if ( '#eba54c' !== $footer_widget_title_separator_color ) {
            $css .= '
                .site-footer .widget-title:after, 
                .site-footer .widgettitle:after { 
                    background-color: ' . esc_attr( $footer_widget_title_separator_color ) . '; 
                }';
        }

        $footer_widget_title_color = yuma_theme_option( 'footer_widget_title_color', '#ffffff' );
        if ( '#ffffff' !== $footer_widget_title_color ) {
            $css .= '
                #colophon.site-footer .widget-title { 
                    color: ' . esc_attr( $footer_widget_title_color ) . '; 
                }';
        }

        $footer_widget_title_font_size = yuma_theme_option( 'footer_widget_title_font_size' );
        if ( 24 !== $footer_widget_title_font_size ) {
            $css .= '
                @media screen and (min-width: 1024px) {
                    #colophon.site-footer .widget-title { 
                        font-size: ' . absint( $footer_widget_title_font_size ) . 'px; 
                    }
                }';
        }
        $footer_widget_title_font_weight = yuma_theme_option( 'footer_widget_title_font_weight' );
        if ( 500 !== $footer_widget_title_font_weight ) {
            $css .= '
                @media screen and (min-width: 1024px) {
                    #colophon.site-footer .widget-title { 
                        font-weight: ' . absint( $footer_widget_title_font_weight ) . '; 
                    }
                }';
        }

        $footer_widget_elements_color = yuma_theme_option( 'footer_widget_elements_color', '#ffffff' );
        if ( '#ffffff' !== $footer_widget_elements_color ) {
            $css .= '
                #colophon .widget a, #colophon .widget li, #colophon p { 
                    color: ' . esc_attr( $footer_widget_elements_color ) . '; 
                }';
        }

        $footer_widget_font_size = yuma_theme_option( 'footer_widget_font_size' );
        if ( 18 !== $footer_widget_font_size ) {
            $css .= '
                #colophon ul.wp-block-latest-posts li a,
                #colophon .widget a, #colophon .widget li, #colophon p { 
                    font-size: ' . absint( $footer_widget_font_size ) . 'px; 
                }';
        }

        $footer_widget_padding = yuma_theme_option( 'footer_widget_padding' );
        if ( 80 !== $footer_widget_padding ) {
            $css .= '
                @media screen and (min-width: 1024px) {
                    #colophon .footer-widgets-area { 
                        padding: ' . absint( $footer_widget_padding ) . 'px 0; 
                    }
                }';
        }

        // back to top
        $btt_bg_color = yuma_theme_option( 'btt_bg_color', 'rgba(16,23,31,1)' );
        if ( 'rgba(16,23,31,1)' !== $btt_bg_color ) {
            $css .= '
                .backtotop .btt-inner-wrapper { 
                    background-color: ' . esc_attr( $btt_bg_color ) . '; 
                }';
        }

        $btt_bg_hover_color = yuma_theme_option( 'btt_bg_hover_color', 'rgba(235,165,76,1)' );
        if ( 'rgba(235,165,76,1)' !== $btt_bg_hover_color ) {
            $css .= '
                .backtotop .btt-inner-wrapper:hover { 
                    background-color: ' . esc_attr( $btt_bg_hover_color ) . '; 
                }';
        }

        $btt_elements_color = yuma_theme_option( 'btt_elements_color', '#ffffff' );
        if ( '#ffffff' !== $btt_elements_color ) {
            $css .= '
                .backtotop span { 
                    color: ' . esc_attr( $btt_elements_color ) . '; 
                }';
        } 

        $btt_font_size = yuma_theme_option( 'btt_font_size', 17 );
        if ( 17 !== $btt_font_size ) {
            $css .= '
                .backtotop span { 
                    font-size: ' . absint( $btt_font_size ) . 'px; 
                }';
        }

        $btt_elements_hover_color = yuma_theme_option( 'btt_elements_hover_color', '#ffffff' );
        if ( '#ffffff' !== $btt_elements_hover_color ) {
            $css .= '
                .backtotop .btt-inner-wrapper:hover span { 
                    color: ' . esc_attr( $btt_elements_hover_color ) . '; 
                }';
        }
        
        $btt_image_width = yuma_theme_option( 'btt_image_width', 14 );
        if ( 14 !== $btt_image_width ) {
            $css .= '
                .backtotop img, .backtotop svg { 
                    width: ' . absint( $btt_image_width ) . 'px; 
                }';
        }

        $btt_padding = yuma_theme_option( 'btt_padding', 15 );
        if ( 15 !== $btt_padding ) {
            $css .= '
                .backtotop .btt-inner-wrapper { 
                    padding: ' . absint( $btt_padding ) . 'px; 
                }';
        }

        $btt_border_radius = yuma_theme_option( 'btt_border_radius', 1 );
        if ( 1 !== $btt_border_radius ) {
            $css .= '
                .backtotop .btt-inner-wrapper { 
                    border-radius: ' . absint( $btt_border_radius ) . 'px; 
                }';
        }

         /*
         * sidebar custom style
         */

        $off_canvas_area_bg_color = yuma_theme_option( 'off_canvas_area_bg_color', '#ffffff' );
        if ( '#ffffff' !== $off_canvas_area_bg_color ) {
            $css .= '
                #off-canvas-area { 
                    background-color: ' . esc_attr( $off_canvas_area_bg_color ) . '; 
                }';
        }

        $off_canvas_area_close_bg_color = yuma_theme_option( 'off_canvas_area_close_bg_color', '#0a0e14' );
        if ( '#0a0e14' !== $off_canvas_area_close_bg_color ) {
            $css .= '
                #off-canvas-area span.off-canvas-close { 
                    background-color: ' . esc_attr( $off_canvas_area_close_bg_color ) . '; 
                }';
        }

        $off_canvas_area_close_color = yuma_theme_option( 'off_canvas_area_close_color', '#ffffff' );
        if ( '#ffffff' !== $off_canvas_area_close_color ) {
            $css .= '
                #off-canvas-area span.off-canvas-close svg { 
                    fill: ' . esc_attr( $off_canvas_area_close_color ) . '; 
                }';
        }

        $off_canvas_area_widget_bg_color = yuma_theme_option( 'off_canvas_area_widget_bg_color', '#f6f6f7' );
        if ( '#f6f6f7' !== $off_canvas_area_widget_bg_color ) {
            $css .= '
                #off-canvas-area section.widget { 
                    background-color: ' . esc_attr( $off_canvas_area_widget_bg_color ) . '; 
                }';
        }

        $off_canvas_area_widget_title_color = yuma_theme_option( 'off_canvas_area_widget_title_color', '#0a0e14' );
        if ( '#0a0e14' !== $off_canvas_area_widget_title_color ) {
            $css .= '
                #off-canvas-area .widget h2.widget-title { 
                    color: ' . esc_attr( $off_canvas_area_widget_title_color ) . '; 
                }';
        }

        $off_canvas_area_widget_elements_color = yuma_theme_option( 'off_canvas_area_widget_elements_color', '#555555' );
        if ( '#555555' !== $off_canvas_area_widget_elements_color ) {
            $css .= '
                #off-canvas-area .widget, #off-canvas-area .widget ul li, #off-canvas-area .widget ul li a, #off-canvas-area .widget p, #off-canvas-area .widget h1, #off-canvas-area .widget h2, #off-canvas-area .widget h3, #off-canvas-area .widget h4, #off-canvas-area .widget h5, #off-canvas-area .widget h6 { 
                    color: ' . esc_attr( $off_canvas_area_widget_elements_color ) . '; 
                }';
        }

        $sidebar_widget_bg_color = yuma_theme_option( 'sidebar_widget_bg_color', '#f6f6f7' );
        if ( '#f6f6f7' !== $sidebar_widget_bg_color ) {
            $css .= '
                #secondary section.widget { 
                    background-color: ' . esc_attr( $sidebar_widget_bg_color ) . '; 
                }';
        }

        $sidebar_widget_title_color = yuma_theme_option( 'sidebar_widget_title_color', '#0a0e14' );
        if ( '#0a0e14' !== $sidebar_widget_title_color ) {
            $css .= '
                #secondary .widget h2.widget-title { 
                    color: ' . esc_attr( $sidebar_widget_title_color ) . '; 
                }';
        }

        $sidebar_widget_elements_color = yuma_theme_option( 'sidebar_widget_elements_color', '#555555' );
        if ( '#555555' !== $sidebar_widget_elements_color ) {
            $css .= '
                #secondary .widget, #secondary .widget ul li, #secondary .widget ul li a, #secondary .widget p, #secondary .widget a, #secondary .widget h1, #secondary .widget h2, #secondary .widget h3, #secondary .widget h4, #secondary .widget h5, #secondary .widget h6 { 
                    color: ' . esc_attr( $sidebar_widget_elements_color ) . '; 
                }';
        }

        $sidebar_widget_title_font_size = yuma_theme_option( 'sidebar_widget_title_font_size' );
        if ( 20 !== $sidebar_widget_title_font_size ) {
            $css .= '
                @media screen and (min-width: 1024px) {
                    #off-canvas-area .widget h2.widget-title,
                    #secondary .widget h2.widget-title { 
                        font-size: ' . absint( $sidebar_widget_title_font_size ) . 'px; 
                    }
                }';
        }
        $sidebar_widget_title_font_weight = yuma_theme_option( 'sidebar_widget_title_font_weight' );
        if ( 500 !== $sidebar_widget_title_font_weight ) {
            $css .= '
                @media screen and (min-width: 1024px) {
                    #off-canvas-area .widget h2.widget-title,
                    #secondary .widget h2.widget-title { 
                        font-weight: ' . absint( $sidebar_widget_title_font_weight ) . '; 
                    }
                }';
        }

        $sidebar_widget_font_size = yuma_theme_option( 'sidebar_widget_font_size' );
        if ( 17 !== $sidebar_widget_font_size ) {
            $css .= '
                #off-canvas-area .widget, #off-canvas-area .widget li, #off-canvas-area .widget p,
                #secondary .widget, #secondary .widget li, #secondary .widget p { 
                    font-size: ' . absint( $sidebar_widget_font_size ) . 'px; 
                }';
        }

        $sidebar_widget_padding = yuma_theme_option( 'sidebar_widget_padding' );
        if ( 40 !== $sidebar_widget_padding ) {
            $css .= '
                @media screen and (min-width: 1024px) {
                    #off-canvas-area section.widget,
                    #secondary section.widget { 
                        padding: ' . absint( $sidebar_widget_padding ) . 'px; 
                    }
                }';
        }

        /*
         * Archive Page
         */
        $archive_header_image_overlay_color = yuma_theme_option( 'archive_header_image_overlay_color', 'rgba(0,0,0,0.1)' );
        $css .= '
        .blog .inner-header-image:after,
        .search .inner-header-image:after,
        .archive .inner-header-image:after {
            background-color: ' . esc_attr( $archive_header_image_overlay_color ) . ';
        }';

        /*
         * Single page
         */
        $single_header_image_overlay_color = yuma_theme_option( 'single_header_image_overlay_color', 'rgba(0,0,0,0.1)' ); 
        $single_header_image_max_height = yuma_theme_option( 'single_header_image_max_height' ); 
        $single_header_image_position = yuma_theme_option( 'single_header_image_position' ); 
        $css .= '
            .single .banner-featured-image.inner-header-image:after { 
                background-color: ' . esc_attr( $single_header_image_overlay_color ) . '; 
            }
            .single .banner-featured-image.inner-header-image img {
                max-height: ' . absint( $single_header_image_max_height ) . 'px;
                object-position: ' . esc_attr( $single_header_image_position ) . ';
            }';

        /*
         * Static page
         */
        $page_header_image_overlay_color = yuma_theme_option( 'page_header_image_overlay_color', 'rgba(0,0,0,0.1)' ); 
        $page_header_image_max_height = yuma_theme_option( 'page_header_image_max_height' ); 
        $page_header_image_position = yuma_theme_option( 'page_header_image_position' ); 
        $css .= '
            .page .banner-featured-image.inner-header-image:after { 
                background-color: ' . esc_attr( $page_header_image_overlay_color ) . '; 
            }
            .page .banner-featured-image.inner-header-image img {
                max-height: ' . absint( $page_header_image_max_height ) . 'px;
                object-position: ' . esc_attr( $page_header_image_position ) . ';
            }';

        /*
         * Header Responsive css
         */
        // check active elements on topbar, header and navbar
        $header_sections = array( 'topbar', 'header', 'navbar' );
        $header_elementarea = array( 'left', 'center', 'right' );
        $header_active_elements = array( 'topbar' => array(), 'header' => array(), 'navbar' => array() );
        $header_small_elements = array( 'topbar' => array(), 'header' => array(), 'navbar' => array() );
        $header_large_elements = array( 'topbar' => array(), 'header' => array(), 'navbar' => array() );
        foreach ( $header_sections as $section ) :
            foreach ( $header_elementarea as $area ) {
                $header_area_elements = yuma_theme_option( $section . '_' . $area . '_element' );
                $header_area_elements = $header_area_elements ? explode( ',', $header_area_elements ) : array();
                $header_active_elements[$section] = array_merge( $header_active_elements[$section], $header_area_elements );
            }
            // active elements
            $header_active_elements[$section] ? sort( $header_active_elements[$section] ) : array();
            $header_active_elements[$section] = array_unique( $header_active_elements[$section] );

            // check responsive elements active in small screen
            $header_small_elements[$section] = yuma_theme_option( $section . '_responsive_element', '' ); 
            $header_small_elements[$section] = explode( ',', $header_small_elements[$section] );
            $header_small_elements[$section] ? sort( $header_small_elements[$section] ) : array();

            // check responsive elements active in large screen
            $header_large_elements[$section] = yuma_theme_option( $section . '_large_responsive_element', '' ); 
            $header_large_elements[$section] = explode( ',', $header_large_elements[$section] );
            $header_large_elements[$section] ? sort( $header_large_elements[$section] ) : array();
        endforeach;

        $css .= '@media screen and (max-width: 1023px) { '; 
            // topbar responsive 
            if ( $header_active_elements['topbar'] == $header_small_elements['topbar'] ) {
                $css .= '#top-menu { display: none; }';
            }
            if ( ! empty( $header_small_elements['topbar'] ) ) :
                $header_small_elements['topbar'] = array_map( function ($str) { return "#top-menu .topbar_$str"; }, $header_small_elements['topbar'] );
                $header_small_elements['topbar'] = implode( ', ', $header_small_elements['topbar'] );
                $css .= esc_attr( $header_small_elements['topbar'] );
            endif;
            $css .= '{ display: none; }';

            // header responsive 
            if ( $header_active_elements['header'] == $header_small_elements['header'] ) {
                $css .= '#masthead { display: none; }';
            }
            if ( ! empty($header_small_elements['header'] ) ) :
               $header_small_elements['header'] = array_map( function ($str) { return "#masthead .header_$str"; },$header_small_elements['header'] );
               $header_small_elements['header'] = implode( ', ',$header_small_elements['header'] );
                $css .= esc_attr($header_small_elements['header'] );
            endif;
            $css .= '{ display: none; }';

            // navbar responsive 
            if ( $header_active_elements['navbar'] == $header_small_elements['navbar'] ) {
                $css .= '#navbar { display: none; }';
            }
            if ( ! empty( $header_small_elements['navbar'] ) ) :
                $header_small_elements['navbar'] = array_map( function ($str) { return "#navbar .navbar_$str"; }, $header_small_elements['navbar'] );
                $header_small_elements['navbar'] = implode( ', ', $header_small_elements['navbar'] );
                $css .= esc_attr( $header_small_elements['navbar'] );
            endif;
            $css .= '{ display: none; }

            #navbar .inner-wrapper .navbar-element .main-navigation a, 
            .main-navigation a {
                color: #0a0e14;
            }
        }';

        $css .= '@media screen and (min-width: 1024px) { '; 
            // topbar responsive 
            if ( $header_active_elements['topbar'] == $header_large_elements['topbar'] ) {
                $css .= '#top-menu { display: none; }';
            }
            if ( ! empty( $header_large_elements['topbar'] ) ) :
                $header_large_elements['topbar'] = array_map( function ($str) { return "#top-menu .topbar_$str"; }, $header_large_elements['topbar'] );
                $header_large_elements['topbar'] = implode( ', ', $header_large_elements['topbar'] );
                $css .= esc_attr( $header_large_elements['topbar'] );
            endif;
            $css .= '{ display: none; }';

            // header responsive 
            if ( $header_active_elements['header'] == $header_large_elements['header'] ) {
                $css .= '#masthead { display: none; }';
            }
            if ( ! empty( $header_large_elements['header'] ) ) :
                $header_large_elements['header'] = array_map( function ($str) { return "#masthead .header_$str"; }, $header_large_elements['header'] );
                $header_large_elements['header'] = implode( ', ', $header_large_elements['header'] );
                $css .= esc_attr( $header_large_elements['header'] );
            endif;
            $css .= '{ display: none; }';

            // navbar responsive 
            if ( $header_active_elements['navbar'] == $header_large_elements['navbar'] ) {
                $css .= '#navbar { display: none; }';
            } 
            if ( ! empty( $header_large_elements['navbar'] ) ) :
                $header_large_elements['navbar'] = array_map( function ($str) { return "#navbar .navbar_$str"; }, $header_large_elements['navbar'] );
                $header_large_elements['navbar'] = implode( ', ', $header_large_elements['navbar'] );
                $css .= esc_attr( $header_large_elements['navbar'] );
            endif;
            $css .= '{ display: none; }
        }';

        // home page section title typography
        $section_title_text_transform = yuma_theme_option( 'section_title_text_transform' );
        $section_title_font_size = yuma_theme_option( 'section_title_font_size' );
        $section_title_font_weight = yuma_theme_option( 'section_title_font_weight' );
        $section_title_font_family = yuma_theme_option( 'section_title_font_family' );
        $section_title_font_family = json_decode( $section_title_font_family );
        $css .= 'h2.section-title, 
            .blog h1.page-title,
            .custom-header-content h2 a,
            #introduction h2.entry-title a,
            #cta-section h2.entry-title a,
            #hero-content-section h2.entry-title a { 
                    font-family:' . esc_attr( $section_title_font_family->font ) . ', sans-serif;
                    font-size: ' . absint( $section_title_font_size ) . 'px;
                    font-weight:' . esc_attr( $section_title_font_weight ) . ';
                    text-transform:' . esc_attr( $section_title_text_transform ) . ';
                }';

        // home page section post title typography
        $home_title_text_transform = yuma_theme_option( 'home_title_text_transform' );
        $home_title_font_size = yuma_theme_option( 'home_title_font_size' );
        $home_title_font_weight = yuma_theme_option( 'home_title_font_weight' );
        $home_title_font_family = yuma_theme_option( 'home_title_font_family' );
        $home_title_font_family = json_decode( $home_title_font_family );
        $css .= '#featured-categories .section-content article .entry-header h2.entry-title a,
            #featured-posts article .entry-header h2.entry-title a,
            #popular-posts .section-content article .entry-header h2.entry-title a,
            .blog .page-section.latest-blog article h2.entry-title a { 
                    font-family:' . esc_attr( $home_title_font_family->font ) . ', sans-serif;
                    font-size: ' . absint( $home_title_font_size ) . 'px;
                    font-weight:' . esc_attr( $home_title_font_weight ) . ';
                    text-transform:' . esc_attr( $home_title_text_transform ) . ';
                }';

        // single page title typography
        $page_title_text_transform = yuma_theme_option( 'page_title_text_transform' );
        $page_title_font_size = yuma_theme_option( 'page_title_font_size' );
        $page_title_font_weight = yuma_theme_option( 'page_title_font_weight' );
        $page_title_font_family = yuma_theme_option( 'page_title_font_family' );
        $page_title_font_family = json_decode( $page_title_font_family );
        $css .= '.archive h1.page-title span,
                h1.page-title { 
                    font-family:' . esc_attr( $page_title_font_family->font ) . ', sans-serif;
                    font-size: ' . absint( $page_title_font_size ) . 'px;
                    font-weight:' . esc_attr( $page_title_font_weight ) . ';
                    text-transform:' . esc_attr( $page_title_text_transform ) . ';
                }';
        
        $enable_blog_prefix = yuma_theme_option( 'enable_blog_prefix' );
        if ( ! $enable_blog_prefix ) {
            $css .= '
                body.archive h1.page-title {
                    font-size: 0;
                }';
        }

        // archive posts title typography
        $entry_title_text_transform = yuma_theme_option( 'page_title_text_transform' );
        $entry_title_font_size = yuma_theme_option( 'entry_title_font_size' );
        $entry_title_font_weight = yuma_theme_option( 'entry_title_font_weight' );
        $entry_title_font_family = yuma_theme_option( 'entry_title_font_family' );
        $entry_title_font_family = json_decode( $entry_title_font_family );
        $css .= 'article h2.entry-title a { 
                    font-family:' . esc_attr( $entry_title_font_family->font ) . ', sans-serif;
                    font-size: ' . absint( $entry_title_font_size ) . 'px;
                    font-weight:' . esc_attr( $entry_title_font_weight ) . ';
                    text-transform:' . esc_attr( $entry_title_text_transform ) . ';
                }';

        // entire site meta data typography
        $entry_meta_text_transform = yuma_theme_option( 'entry_meta_text_transform' );
        $entry_meta_font_size = yuma_theme_option( 'entry_meta_font_size' );
        $entry_meta_font_weight = yuma_theme_option( 'entry_meta_font_weight' );
        $entry_meta_font_family = yuma_theme_option( 'entry_meta_font_family' );
        $entry_meta_font_family = json_decode( $entry_meta_font_family );
        $css .= '.cat-links, .cat-links a, span.read-time, span.byline, span.posted-on, span.posted-on a, span.posted-on time { 
                    font-family:' . esc_attr( $entry_meta_font_family->font ) . ', sans-serif;
                    font-size: ' . absint( $entry_meta_font_size ) . 'px;
                    font-weight:' . esc_attr( $entry_meta_font_weight ) . ';
                    text-transform:' . esc_attr( $entry_meta_text_transform ) . ';
                }';

        /*
         * Homepage Sections
         */

        // slider
        $slider_overlay = yuma_theme_option( 'slider_overlay' );
        $css .= '.custom-header-content-wrapper .overlay { 
                    background-color:' . esc_attr( $slider_overlay ) . ';
                }';

        if ( yuma_theme_option( 'slider_gap' ) ) {
            $slider_gap_size = yuma_theme_option( 'slider_gap_size' );
            $css .= '#custom-header .slider-gap .custom-header-content-wrapper { 
                        margin-left:' . absint( $slider_gap_size/2 ) . 'px;
                        margin-right:' . absint( $slider_gap_size/2 ) . 'px;
                    }
                    #custom-header .slider-gap .slick-list {
                        margin-left: -' . absint( $slider_gap_size/2 ) . 'px;
                        margin-right: -' . absint( $slider_gap_size/2 ) . 'px;
                    }';
        }

        // featured categories
        $featured_categories_overlay = yuma_theme_option( 'featured_categories_overlay' );
        $featured_categories_overlay_hover = yuma_theme_option( 'featured_categories_overlay_hover' );
        $css .= '#featured-categories article .post-wrapper .overlay { 
                    background-color:' . esc_attr( $featured_categories_overlay ) . ';
                }
                #featured-categories article .post-wrapper:hover .overlay { 
                    background-color:' . esc_attr( $featured_categories_overlay_hover ) . ';
                }';

        // hero content
        $hero_content_overlay = yuma_theme_option( 'hero_content_overlay', 'rgba(0,0,0,0.8)' );
        if ( 'rgba(0,0,0,0.8)' != $hero_content_overlay ) {
            $css .= '#hero-content-section .entry-container,
                    #hero-content-section.dark .entry-container { 
                        background-color:' . esc_attr( $hero_content_overlay ) . ';
                    }
                    #hero-content-section .entry-container:before,
                    #hero-content-section.dark .entry-container:before { 
                        border-color:' . esc_attr( $hero_content_overlay ) . ';
                    }';
        }
        
        // featured posts
        $featured_title_bar_color = yuma_theme_option( 'featured_title_bar_color' );
        $css .= '#featured-posts h2.section-title.separator:before { 
                    background-color:' . esc_attr( $featured_title_bar_color ) . ';
                }';

        // popular posts
        $popular_title_bar_color = yuma_theme_option( 'popular_title_bar_color' );
        $css .= '#popular-posts h2.section-title.separator:before { 
                    background-color:' . esc_attr( $popular_title_bar_color ) . ';
                }';
        $popular_overlay = yuma_theme_option( 'popular_overlay' );
        $css .= '#popular-posts .section-content article .featured-image a:before { 
                    background-color:' . esc_attr( $popular_overlay ) . ';
                }';
        $popular_no_img_bg = yuma_theme_option( 'popular_no_img_bg' );
        $css .= '#popular-posts article.no-post-thumbnail .post-wrapper { 
                    background-color:' . esc_attr( $popular_no_img_bg ) . ';
                }';

        // cta posts
        $cta_overlay = yuma_theme_option( 'cta_overlay' );
        $css .= '#cta-section .overlay { 
                    background-color:' . esc_attr( $cta_overlay ) . ';
                }';

        // blog posts
        $blog_title_bar_color = yuma_theme_option( 'blog_title_bar_color' );
        $css .= '.home.blog h1.page-title.separator:before { 
                    background-color:' . esc_attr( $blog_title_bar_color ) . ';
                }';
        
        wp_add_inline_style( 'yuma-style', $css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'yuma_custom_style', 20 );