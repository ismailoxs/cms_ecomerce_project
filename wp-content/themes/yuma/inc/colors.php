<?php
/**
 * theme color
 *
 * @package yuma
 */

if ( ! function_exists( 'yuma_custom_colors_css' ) ) :
    /**
     * Generate the CSS for the current custom color.
     */
    function yuma_custom_colors_css() {
        $primary_color = yuma_theme_option('color_primary', '#0a0e14');
        $secondary_color = yuma_theme_option('color_secondary', '#eba54c');

        /*
         * Primary Color
        */

        // background color
        $css = '
        #top-menu,
        #navbar,
        #introduction .wp-playlist.wp-audio-playlist.wp-playlist-light,
        #introduction .post-wrapper .entry-container a.btn,
        #popular-posts article.no-post-thumbnail .post-wrapper,
        #colophon,
        .blog-loader-btn .read-more a,
        .backtotop .btt-inner-wrapper,
        .reply a,
        #respond input[type="submit"],
        .no-results form.search-form button.search-submit, 
        .error-404 form.search-form button.search-submit, 
        .widget_search form.search-form button.search-submit,
        .wp-block-search__button,
        .wp-block-query-pagination .current,
        .pagination .page-numbers.current,
        .woocommerce #respond input#submit.alt, 
        .woocommerce a.button.alt, 
        .woocommerce button.button.alt, 
        .woocommerce input.button.alt, 
        .woocommerce div.product form.cart .button, 
        .woocommerce #respond input#submit, 
        .woocommerce a.button, 
        .woocommerce button.button, 
        .woocommerce input.button,
        .woocommerce div.product .woocommerce-tabs ul.tabs li,
        .woocommerce-account #primary .woocommerce-MyAccount-navigation ul li a,
        .wp-block-button__link,
        .wc-block-components-pagination__page--active[disabled],
        #off-canvas-area section.widget .wp-block-button__link, 
        #secondary section.widget .wp-block-button__link,
        #masthead div.mini-cart .mini-cart-items, 
        #top-menu div.mini-cart .mini-cart-items { 
            background-color: ' . esc_attr( $primary_color ) . '; 
        }';

        // border color
        $css .= '
        .wp-block-search__button,
        #introduction .post-wrapper .entry-container a.btn {
            border-color: ' . esc_attr( $primary_color ) . ';
        }';

        /*
         * Secondary Color
        */

        // background color
        $css .= '
        #top-menu .inner-wrapper .topbar-element a.btn.topbar-btn:hover, 
        #top-menu .inner-wrapper .topbar-element a.btn.topbar-btn:focus, 
        #masthead .inner-wrapper .header-element a.btn.header-btn:hover, 
        #masthead .inner-wrapper .header-element a.btn.header-btn:focus, 
        #navbar .inner-wrapper .navbar-element a.btn.navbar-btn:hover, 
        #navbar .inner-wrapper .navbar-element a.btn.navbar-btn:focus, 
        a.btn.btn-transparent:hover, 
        a.btn.btn-transparent:focus, 
        .blog-posts-wrapper .entry-container a.btn.btn-transparent:hover,
        .topbar-news-slider .news-label span,
        .blog-loader-btn .read-more a:hover,
        .backtotop .btt-inner-wrapper:hover,
        .reply a:hover,
        #respond input[type="submit"]:hover,
        .custom-header-content a.btn.btn-transparent:hover,
        body.dark-mode #introduction .post-wrapper .entry-container a.btn:hover,
        .banner-slider.center-background-outline-light .custom-header-content a.btn.btn-transparent, 
        .banner-slider.center-background-light .custom-header-content a.btn.btn-transparent, 
        .banner-slider.center-background-outline .custom-header-content a.btn.btn-transparent, 
        .banner-slider.center-background .custom-header-content a.btn.btn-transparent,
        #introduction .post-wrapper .entry-container a.btn:hover,
        #cta-section .entry-container a.btn:hover,
        #introduction .wp-playlist-tracks .wp-playlist-item.wp-playlist-playing, 
        #introduction .wp-playlist-tracks .wp-playlist-item:hover,
        #introduction .wp-playlist .mejs-inner .mejs-controls .mejs-time-rail .mejs-time-current,
        #introduction .wp-playlist .mejs-inner .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current,
        #introduction .wp-playlist .mejs-inner .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current:after,
        .widget_tag_cloud a:hover,
        .site-footer .widget-title:after, 
        .site-footer .widgettitle:after,
        #masthead .woocommerce.widget_shopping_cart .buttons a:hover, 
        #top-menu .woocommerce.widget_shopping_cart .buttons a:hover,
        .navbar-element a.off-canvas-bar:hover span, 
        .navbar-element a.off-canvas-bar:focus span, 
        .header-element a.off-canvas-bar:hover span, 
        .header-element a.off-canvas-bar:focus span, 
        .topbar-element a.off-canvas-bar:hover span, 
        .topbar-element a.off-canvas-bar:focus span,
        .single-post .entry-footer span.tags-links a:hover,
        .widget_search form.search-form button.search-submit:hover, 
        .widget_search form.search-form button.search-submit:focus,
        .wp-block-search__button:hover,
        .wp-block-search__button:focus,
        .wp-block-button .wp-block-button__link:hover, 
        .wp-block-button .wp-block-button__link:focus,
        .wpcf7 input.wpcf7-form-control.wpcf7-submit:hover,
        .wpcf7 input.wpcf7-form-control.wpcf7-submit:focus,
        .woocommerce #respond input#submit.alt:hover, 
        .woocommerce a.button.alt:hover, 
        .woocommerce button.button.alt:hover, 
        .woocommerce input.button.alt:hover,
        .woocommerce div.product form.cart .button:hover,
        .woocommerce #respond input#submit:hover, 
        .woocommerce a.button:hover, 
        .woocommerce button.button:hover, 
        .woocommerce input.button:hover,
        .woocommerce.widget_price_filter .ui-slider .ui-slider-handle,
        #colophon section.widget .wp-block-button__link:hover,
        #off-canvas-area section.widget .wp-block-button__link:hover, 
        #secondary section.widget .wp-block-button__link:hover,
        .woocommerce-account #primary .woocommerce-MyAccount-navigation ul li a:hover {
            background-color: ' . esc_attr( $secondary_color ) . ';
        }';

        // border color
        $css .= '
        #top-menu .inner-wrapper .topbar-element a.btn.topbar-btn:hover, 
        #top-menu .inner-wrapper .topbar-element a.btn.topbar-btn:focus, 
        #masthead .inner-wrapper .header-element a.btn.header-btn:hover, 
        #masthead .inner-wrapper .header-element a.btn.header-btn:focus, 
        #navbar .inner-wrapper .navbar-element a.btn.navbar-btn:hover, 
        #navbar .inner-wrapper .navbar-element a.btn.navbar-btn:focus,
        .single-post .entry-footer span.tags-links a:hover,
        a.btn.btn-transparent:hover, 
        a.btn.btn-transparent:focus, 
        .pagination a.page-numbers:hover, 
        .pagination a.page-numbers:focus,
        .wc-block-pagination .wc-block-components-pagination__page:hover,
        .blog-posts-wrapper .entry-container a.btn.btn-transparent:hover,
        .custom-header-content a.btn.btn-transparent:hover,
        body.dark-mode #introduction .post-wrapper .entry-container a.btn:hover,
        .banner-slider.center-background-outline-light .custom-header-content a.btn.btn-transparent, 
        .banner-slider.center-background-light .custom-header-content a.btn.btn-transparent, 
        .banner-slider.center-background-outline .custom-header-content a.btn.btn-transparent, 
        .banner-slider.center-background .custom-header-content a.btn.btn-transparent,
        #introduction .post-wrapper .entry-container a.btn:hover,
        #cta-section .entry-container a.btn:hover,
        .widget_tag_cloud a:hover,
        .wp-block-search__button:hover,
        .wp-block-search__button:focus,
        .wpcf7 input.wpcf7-form-control.wpcf7-submit:hover,
        .wpcf7 input.wpcf7-form-control.wpcf7-submit:focus,
        #filter-posts ul li.active a,
        #respond input[type="submit"]:hover,
        .header-element.header-meta:hover .header-meta-icon,
        .header-element.header-meta a:hover .header-meta-icon,
        .banner-slider.center-background-outline .slick-prev:hover, 
        .banner-slider.center-background-outline .slick-prev:focus, 
        .banner-slider.center-background .slick-prev:hover, 
        .banner-slider.center-background .slick-prev:focus, 
        .banner-slider.center-background-outline .slick-next:hover, 
        .banner-slider.center-background-outline .slick-next:focus, 
        .banner-slider.center-background .slick-next:hover, 
        .banner-slider.center-background .slick-next:focus, 
        .slick-prev:hover, 
        .slick-next:hover, 
        .slick-prev:focus, 
        .slick-next:focus {
            border-color: ' . esc_attr( $secondary_color ) . ';
        }';

        // color
        $css .= '
        a:hover, 
        a:focus,
        a:active,
        #colophon .site-info .inner-wrapper .footer-element a:hover, 
        #colophon .site-info .inner-wrapper .footer-element a:focus, 
        #navbar .inner-wrapper .navbar-element a:hover, 
        #navbar .inner-wrapper .navbar-element a:focus, 
        #masthead .inner-wrapper .header-element a:hover, 
        #masthead .inner-wrapper .header-element a:focus, 
        #top-menu .inner-wrapper .topbar-element a:hover, 
        #top-menu .inner-wrapper .topbar-element a:focus,
        #navbar .inner-wrapper .navbar-element .main-navigation a:hover, 
        #navbar .inner-wrapper .navbar-element .main-navigation a:focus, 
        .main-navigation a:hover, 
        .main-navigation a:focus,
        .custom-header-content .cat-links a:hover,
        .custom-header-content h2 a:hover, 
        .custom-header-content h2 a:focus,
        #featured-posts .section-content article .entry-header h2.entry-title a:hover, 
        #featured-posts .section-content article .entry-header h2.entry-title a:focus, 
        .blog-posts-wrapper.image-focus-dark article.has-post-thumbnail .entry-container .entry-footer a:hover, 
        .blog-posts-wrapper.image-focus-dark article.has-post-thumbnail .entry-container h2.entry-title a:hover, 
        .blog-posts-wrapper.image-focus-dark article.has-post-thumbnail .entry-container .cat-links a:hover, 
        .blog-posts-wrapper.image-focus-outline-dark article.has-post-thumbnail .entry-container .entry-footer a:hover, 
        .blog-posts-wrapper.image-focus-outline-dark article.has-post-thumbnail .entry-container h2.entry-title a:hover, 
        .blog-posts-wrapper.image-focus-outline-dark article.has-post-thumbnail .entry-container .cat-links a:hover,
        body.dark-mode .blog-posts-wrapper.image-focus-outline article.has-post-thumbnail .entry-header a:hover,
        body.dark-mode .blog-posts-wrapper.image-focus-outline article.has-post-thumbnail a:hover,
        body.dark-mode .blog-posts-wrapper.image-focus-outline article.has-post-thumbnail .entry-title a:hover,
        body.dark-mode .blog-posts-wrapper.image-focus-outline article.has-post-thumbnail .entry-footer a:hover,
        body.dark-mode .blog-posts-wrapper.image-focus article.has-post-thumbnail .entry-header a:hover,
        body.dark-mode .blog-posts-wrapper.image-focus article.has-post-thumbnail a:hover,
        body.dark-mode .blog-posts-wrapper.image-focus article.has-post-thumbnail .entry-title a:hover,
        body.dark-mode .blog-posts-wrapper.image-focus article.has-post-thumbnail .entry-footer a:hover,
        article h2.entry-title a:hover, 
        article h2.entry-title a:focus,
        .banner-slider.center-background-outline-light .custom-header-content h2 a:hover, 
        .banner-slider.center-background-light .custom-header-content h2 a:hover, 
        .banner-slider.center-background-outline-light .custom-header-content .entry-meta a:hover, 
        .banner-slider.center-background-light .custom-header-content .entry-meta a:hover, 
        .banner-slider.center-background-outline-light .custom-header-content .cat-links a:hover, 
        .banner-slider.center-background-light .custom-header-content .cat-links a:hover, 
        .banner-slider.center-background-outline .custom-header-content h2 a:hover, 
        .banner-slider.center-background .custom-header-content h2 a:hover, 
        .banner-slider.center-background-outline .custom-header-content .entry-meta a:hover, 
        .banner-slider.center-background .custom-header-content .entry-meta a:hover, 
        .banner-slider.center-background-outline .custom-header-content .cat-links a:hover, 
        .banner-slider.center-background .custom-header-content .cat-links a:hover,
        .banner-slider.center-background-outline .custom-header-content a.btn.btn-transparent:hover, 
        .banner-slider.center-background .custom-header-content a.btn.btn-transparent:hover,
        body.dark-mode #introduction article .entry-header h2.entry-title a:hover,
        body.dark-mode #introduction article .entry-header h2.entry-title a:focus,
        #introduction article .entry-header h2.entry-title a:hover,
        #introduction article .entry-header h2.entry-title a:focus,
        .entry-meta > span a:hover, 
        .entry-meta > span a:focus,
        .hero-content h2.entry-title a:hover,
        .hero-content h2.entry-title a:focus,
        .single-post .entry-meta span a:hover,
        .navigation.post-navigation a:hover span,
        #off-canvas-area .widget ul li a:hover, 
        #secondary .widget ul li a:hover,
        .pagination a.page-numbers:hover, 
        .pagination a.page-numbers:focus,
        .wc-block-pagination .wc-block-components-pagination__page:hover,
        ul.trail-items li a:hover,
        ul.trail-items li a:focus,
        .header-element.header-meta:hover .header-meta-icon a,
        #top-menu .secondary-menu ul.menu li.current-menu-item > a,
        #navbar .main-navigation ul.menu li.current-menu-item > a, 
        .main-navigation ul.menu li.current-menu-item > a {
            color: ' . esc_attr( $secondary_color ) . ';
        }';

        // fill
        $css .='
        .header-element.header-meta:hover .header-meta-icon svg,
        .main-navigation ul li a:hover svg,
        .wc-block-pagination .wc-block-components-pagination__page:hover,
        .pagination a.page-numbers:hover svg, 
        .pagination a.page-numbers:focus svg {
            fill: ' . esc_attr( $secondary_color ) . ';
        }';

        /*
         * Responsive
        */
        $css .='
        @media screen and (min-width: 1024px) {
            #masthead .menu-underline .main-navigation ul.nav-menu > li > a:after,
            #masthead .menu-boxed .main-navigation ul.nav-menu > li:before,
            #masthead .menu-boxed .main-navigation ul.nav-menu > li:after,
            #masthead .menu-boxed .main-navigation ul.nav-menu > li > a:before,
            #masthead .menu-boxed .main-navigation ul.nav-menu > li > a:after {
                background-color: ' . esc_attr( $secondary_color ) . ';
            }
        }
        @media screen and (max-width: 1023px) {
            .main-navigation {
                background-color: ' . esc_attr( $primary_color ) . ';
            }
            .main-navigation ul.sub-menu {
                background-color: #f2f2f2;
            }
            .main-navigation ul.sub-menu li:hover > a {
                color: ' . esc_attr( $secondary_color ) . ';
            }
        }';

        wp_add_inline_style( 'yuma-style', $css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'yuma_custom_colors_css', 10 );
