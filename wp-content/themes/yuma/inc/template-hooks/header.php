<?php
/**
 * Header hook
 *
 * @package yuma
 */

if ( ! function_exists( 'yuma_add_header_section' ) ) :
    /**
    * Add header section
    *
    *@since Yuma 1.0.0
    */
    function yuma_add_header_section() {

        // Check if header is enabled on frontpage
        $header_enable = yuma_theme_option( 'enable_header' );

        if ( ! $header_enable ) {
            return;
        }

        // Render header section now.
        yuma_render_header_section();
    }
endif;
add_action( 'yuma_header_start_action', 'yuma_add_header_section', 30 );

if ( ! function_exists( 'header_yuma_cart_link' ) ) {
    /**
     * Cart Link
     * Displayed a link to the cart including the number of items present and the cart total
     *
     * @return void
     * @since  1.0.0
     */
    function header_yuma_cart_link() {
        $woocart_item = yuma_theme_option( 'enable_header_woocart_item' );
        ?>
            <a class="cart-contents <?php echo $woocart_item ? 'show-items' : 'hide-items' ?>" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'yuma' ); ?>">
            <?php 
                echo yuma_get_svg( array( 'icon' => 'bag' ) );
                if ( $woocart_item ) :
                    echo wp_kses_post( WC()->cart->get_cart_subtotal() ); ?> 
                    <span class="header-count">
                        <?php echo wp_kses_data( sprintf( _n( ' - %d item', ' - %d items', WC()->cart->get_cart_contents_count(), 'yuma' ), WC()->cart->get_cart_contents_count() ) ); ?>
                    </span>
                <?php else : ?>
                    <span class="header-count-box">
                        <?php echo absint( WC()->cart->get_cart_contents_count() ); ?>
                    </span>
                <?php endif; ?>
            </a>
        <?php
    }
}

if ( ! function_exists( 'yuma_render_header_cart' ) ) :
    /**
    * header woocommrce cart
    *
    * @return string header content
    * @since Yuma 1.0.0
    *
    */
    function yuma_render_header_cart() {
        if ( class_exists( 'WooCommerce' ) ) : ?>
            <div class="mini-cart header-element header_cart">
                <?php 
                header_yuma_cart_link();
                if ( ! is_cart() && ! is_checkout() ) : ?>
                    <div class="mini-cart-items">
                        <?php
                        $instance = array( 'title' => '' );
                        the_widget( 'WC_Widget_Cart', $instance );
                        ?>
                    </div><!-- .mini-cart-tems -->
                <?php endif; ?>
            </div>
        <?php endif;
    }
endif;

if ( ! function_exists( 'yuma_render_header_product_search' ) ) :
    /**
    * header woo product search
    *
    * @return string header content
    * @since Yuma 1.0.0
    *
    */
    function yuma_render_header_product_search() { 
        if ( ! class_exists( 'WooCommerce' ) ) {
            return;
        }

        $placeholder = yuma_theme_option( 'header_woo_search_placeholder' );
        ?>
        <div class="header-element header-product-search-form header_woo_product_search">
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <input type="hidden" name="post_type" value="product" />
                <?php
                    $taxonomy = 'product_cat';
                    $args = array(
                        'option_none_value'  => 0,
                        'show_option_none'   => esc_html__( 'All Categories', 'yuma' ),
                        'hide_empty'         => 0,              
                        'selected'           => 1,
                        'hierarchical'       => 0,
                        'name'               => 'product_cat',
                        'class'              => 'header-product-categories-dropdown',              
                        'taxonomy'           => $taxonomy,
                        'selected'           => ( isset( $_GET[$taxonomy] ) ) ? esc_attr( $_GET[$taxonomy] ) : 0,
                        'value_field'        => 'slug'
                    );

                    wp_dropdown_categories( $args, $taxonomy );
                ?>
                <input class="header-product-search-input" name="s" type="text" placeholder="<?php echo esc_attr( $placeholder ); ?>"/>
                <button type="submit" class="header-product-search-button" type="submit"><?php echo yuma_get_svg( array( 'icon' => 'search' ) ); ?><span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', 'yuma' ); ?></button>
            </form>
        </div>
    <?php }
endif;

if ( ! function_exists( 'yuma_render_header_address' ) ) :
    /**
    * header address
    *
    * @return string header content
    * @since Yuma 1.0.0
    *
    */
    function yuma_render_header_address() {
        $address_label = yuma_theme_option( 'header_address_label' );
        $address = yuma_theme_option( 'header_address' );
        $address_link = yuma_theme_option( 'header_address_link' );
        if ( ! empty( $address ) ) : ?>
            <div class="header-element header-meta header_address">
                <div class="header-meta-icon">
                    <?php echo yuma_get_svg( array( 'icon' => 'location-o' ) ); ?>
                </div>
                <div class="header-meta-details">
                    <?php if ( ! empty( $address_label ) ) : ?>
                        <span class="header-meta-label"><?php echo esc_html( $address_label ); ?></span>
                    <?php endif;
                     
                    if ( ! empty( $address_link ) ) : ?>
                        <a href="<?php echo esc_url( $address_link ); ?>">
                            <span><?php echo esc_html( $address ); ?></span>
                        </a>
                    <?php else : ?>
                        <span><?php echo esc_html( $address ); ?></span>
                    <?php endif; ?>
                </div><!-- .header-meta-details -->
            </div><!-- .header-element -->
        <?php endif;
    }
endif;

if ( ! function_exists( 'yuma_render_header_time' ) ) :
    /**
    * header time
    *
    * @return string header content
    * @since Yuma 1.0.0
    *
    */
    function yuma_render_header_time() {
        $time_label = yuma_theme_option( 'header_time_label' );
        $time = yuma_theme_option( 'header_time' );
        if ( ! empty( $time ) ) : ?>
            <div class="header-element header-meta header_time">
                <div class="header-meta-icon">
                    <?php echo yuma_get_svg( array( 'icon' => 'clock' ) ); ?>
                </div>
                <div class="header-meta-details">
                    <?php if ( ! empty( $time_label ) ) : ?>
                        <span class="header-meta-label"><?php echo esc_html( $time_label ); ?></span>
                    <?php endif; ?>
                    <span><?php echo esc_html( $time );  ?></span>
                </div><!-- .header-meta-details -->
            </div><!-- .header-element -->
        <?php endif;
    }
endif;

if ( ! function_exists( 'yuma_render_header_phone' ) ) :
    /**
     * header phone
     *
     * @return string header content
     * @since Yuma 1.0.0
     *
     */
    function yuma_render_header_phone() {
        $phone_label = yuma_theme_option( 'header_phone_label' );
        $phones = yuma_theme_option( 'header_phone' );
        if ( ! empty( $phones ) ) :
            $phones = explode(',', $phones ); ?>
            <div class="header-element header-meta header_phone">
                <div class="header-meta-icon">
                    <?php echo yuma_get_svg( array( 'icon' => 'phone-o' ) ); ?>
                </div>
                <div class="header-meta-details">
                    <?php if ( ! empty( $phone_label ) ) : ?>
                        <span class="header-meta-label"><?php echo esc_html( $phone_label ); ?></span>
                    <?php endif; ?>

                    <div class="details">
                        <?php foreach ( $phones as $phone ) : ?>
                            <a href="<?php echo esc_url( 'tel:' . $phone ); ?>">
                                <span><?php echo esc_html( $phone ); ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div><!-- .details -->
                </div><!-- .header-meta-details -->
            </div><!-- .header-element -->
        <?php endif;
    }
endif;

if ( ! function_exists( 'yuma_render_header_email' ) ) :
    /**
     * header email
     *
     * @return string header content
     * @since Yuma 1.0.0
     *
     */
    function yuma_render_header_email() {
        $email_label = yuma_theme_option( 'header_email_label' );
        $emails = yuma_theme_option( 'header_email' );
        if ( ! empty( $emails ) ) :
            $emails = explode(',', $emails ); ?>
            <div class="header-element header-meta header_email">
                <div class="header-meta-icon">
                    <?php echo yuma_get_svg( array( 'icon' => 'envelope-o' ) ); ?>
                </div>
                <div class="header-meta-details">
                    <?php if ( ! empty( $email_label ) ) : ?>
                        <span class="header-meta-label"><?php echo esc_html( $email_label ); ?></span>
                    <?php endif; ?>

                    <div class="details">
                        <?php foreach ( $emails as $email ) : ?>
                            <a href="<?php echo esc_url( 'mailto:' . $email ); ?>">
                                <span><?php echo esc_html( $email ); ?></span>
                            </a>
                        <?php endforeach; ?>
                    </div><!-- .details -->
                </div><!-- .header-meta-details -->
            </div><!-- .header-element -->
        <?php endif;
    }
endif;

if ( ! function_exists( 'yuma_render_header_off_canvas_bar' ) ) :
    /**
    * header off canvas bar
    *
    * @return string header content
    * @since Yuma 1.0.0
    *
    */
    function yuma_render_header_off_canvas_bar() { ?>
        <div class="header-element header_off_canvas_bar">
            <a class="off-canvas-bar" href="#">
                <span></span>
                <span></span>
                <span></span>
            </a>
        </div>
    <?php }
endif;

if ( ! function_exists( 'yuma_render_header_button' ) ) :
    /**
    * header address
    *
    * @return string header content
    * @since Yuma 1.0.0
    *
    */
    function yuma_render_header_button() {
        $label  = yuma_theme_option( 'header_button_label' );
        $url    = yuma_theme_option( 'header_button_url' );

        if ( empty( $label ) || empty( $url ) ) {
            return;
        } ?>

        <div class="header-element header_button">
            <a class="btn btn-transparent header-btn" href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a>
        </div>
    <?php }
endif;

if ( ! function_exists( 'yuma_render_header_primary_menu' ) ) :
    /**
    * header menu
    *
    * @return string header content
    * @since Yuma 1.0.0
    *
    */
    function yuma_render_header_primary_menu() {
        $menu_hover_style = yuma_theme_option( 'header_primary_menu_hover_style', 'default' );
        $label = yuma_theme_option( 'header_primary_menu_label' ); ?>
            <div class="header-element header_primary_menu <?php echo esc_attr( $menu_hover_style ); ?>">
                <nav id="site-navigation" class="main-navigation">
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                        <span><?php echo esc_html( $label ); ?></span>
                        <svg viewBox="0 0 40 40" class="icon-menu">
                            <g>
                                <rect y="7" width="40" height="2"/>
                                <rect y="19" width="40" height="2"/>
                                <rect y="31" width="40" height="2"/>
                            </g>
                        </svg>
                        <?php echo yuma_get_svg( array( 'icon' => 'close' ) ); ?>
                    </button>

                    <?php  
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => 'menu nav-menu',
                        'menu_id' => 'primary-menu',
                        'fallback_cb' => 'yuma_menu_fallback_cb',
                    ) );
                    ?>
                </nav>
            </div><!-- .primary-menu -->
        <?php
    }
endif;

if ( ! function_exists( 'yuma_render_header_social_menu' ) ) :
    /**
    * header social menu
    *
    * @return string header content
    * @since Yuma 1.0.0
    *
    */
    function yuma_render_header_social_menu() {
        $class = 'original-hover-color';
        if ( has_nav_menu( 'social' ) ) : ?>
            <div class="social-menu header-element header_social_menu">
                <?php  
                wp_nav_menu( array(
                    'theme_location'    => 'social',
                    'container'         => false,
                    'menu_class'        => 'menu ' . esc_attr( $class ),
                    'depth'             => 1,
                    'link_before'       => '<span class="screen-reader-text">',
                    'link_after'        => '</span>',
                ) );
                ?>
            </div><!-- .social-menu -->
        <?php endif;
    }
endif;

if ( ! function_exists( 'yuma_render_header_search' ) ) :
    /**
    * header search
    *
    * @return string header content
    * @since Yuma 1.0.0
    *
    */
    function yuma_render_header_search() { 
        $search_format = yuma_theme_option('header_search_format'); ?>
        <div class="header-element search-form header_search">
            <?php if ( 'search-icon' == $search_format ) : ?>
                <a href="#" class="search">
                    <?php echo yuma_get_svg( array( 'icon' => 'search' ) ); ?>
                </a>
                <div class="header-search top-model-search"><?php get_search_form(); ?></div>
            <?php else : ?>
                <div class="header-open-search"><?php get_search_form(); ?></div>
            <?php endif; ?>
        </div>
    <?php }
endif;

if ( ! function_exists( 'yuma_render_header_widget' ) ) :
    /**
    * header widget area
    *
    * @return string header content
    * @since Yuma 1.0.0
    *
    */
    function yuma_render_header_widget() {
        if ( ! is_active_sidebar( 'header-area' ) ) {
            return;
        } ?>
        <div class="header-element header_widget">
            <?php dynamic_sidebar( 'header-area' ); ?>
        </div>
    <?php }
endif;

if ( ! function_exists( 'yuma_render_header_site_details' ) ) :
    /**
    * header search
    *
    * @return string header content
    * @since Yuma 1.0.0
    *
    */
    function yuma_render_header_site_details() { 
        $header_site_details_layout = yuma_theme_option( 'header_site_details_layout' );
        ?>
        <div class="site-branding header-element header_site_details <?php echo esc_attr( $header_site_details_layout ); ?>">
            <?php
            // site logo
            the_custom_logo();
            ?>
            <div class="site-details">
                <?php if ( is_front_page() && is_home() ) : ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php else : ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php endif;

                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) : ?>
                    <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                <?php endif; ?>
                </div><!-- .site-details -->
        </div><!-- .site-branding -->
    <?php }
endif;

if ( ! function_exists( 'yuma_render_header_section' ) ) :
  /**
   * Start header section
   *
   * @return string header content
   * @since Yuma 1.0.0
   *
   */
   function yuma_render_header_section() { 
        $left_element = yuma_theme_option( 'header_left_element' ); 
        $center_element = yuma_theme_option( 'header_center_element' ); 
        $right_element = yuma_theme_option( 'header_right_element' );

        if ( ! $left_element && ! $center_element && ! $right_element ) {
            return;
        }

        $class = ! $left_element ? 'no-header-left-element' : '';
        $class .= ! $center_element ? ' no-header-center-element' : '';
        $class .= ! $right_element ? ' no-header-right-element' : '';
        $header_bg_video = yuma_theme_option( 'header_bg_video', '' );
        $header_width = yuma_theme_option( 'header_width', 'normal-width' );
        $header_sticky = yuma_theme_option( 'header_sticky' );
        ?>
        <header id="masthead" class="site-header <?php echo ( 'container-width' == $header_width ) ? 'container-width' : ''; ?> <?php echo $header_sticky  ? 'sticky-header' : ''; ?>">
            <div class="header-container">
                <?php if ( ! empty( $header_bg_video ) ) : ?>
                    <div class="video-wrapper">
                        <video autoplay muted loop id="header-video">
                            <source src="<?php echo esc_url( wp_get_attachment_url( $header_bg_video ) ); ?>" type="video/mp4">
                        </video>
                    </div>
                <?php endif; ?>
                <div class="wrapper <?php echo ( 'full-width' == $header_width ) ? 'full-width' : ''; ?>">
                    <div class="inner-wrapper <?php echo esc_attr( $class ); ?>">
                        <?php if ( $left_element ) : ?>
                            <div class="header-left">
                                <?php 
                                    $left_element = explode( ',', $left_element );
                                    foreach ( $left_element as $element ) {
                                        if ( function_exists( 'yuma_render_header_' . esc_attr( $element ) ) ) :
                                            add_action( 'yuma_header_left_action', 'yuma_render_header_' . esc_attr( $element ) );
                                        endif;
                                    }
                                    do_action( 'yuma_header_left_action' );
                                ?>
                            </div>
                        <?php endif;

                        if ( $center_element ) : ?>
                            <div class="header-center">
                                <?php 
                                    $center_element = explode( ',', $center_element );
                                    foreach ( $center_element as $element ) {
                                        if ( function_exists( 'yuma_render_header_' . esc_attr( $element ) ) ) :
                                            add_action( 'yuma_header_center_action', 'yuma_render_header_' . esc_attr( $element ) );
                                        endif;
                                    }
                                    do_action( 'yuma_header_center_action' );
                                ?>
                            </div>
                        <?php endif;

                        if ( $right_element ) : ?>
                            <div class="header-right">
                                <?php 
                                    $right_element = explode( ',', $right_element );
                                    foreach ( $right_element as $element ) {
                                        if ( function_exists( 'yuma_render_header_' . esc_attr( $element ) ) ) :
                                            add_action( 'yuma_header_right_action', 'yuma_render_header_' . esc_attr( $element ) );
                                        endif;
                                    }
                                    do_action( 'yuma_header_right_action' );
                                ?>
                            </div>
                        <?php endif; ?>

                    </div><!-- .inner-wrapper -->
                </div><!-- .wrapper -->
            </div><!-- .header-container -->
        </header><!-- #masthead -->
    <?php }
endif;
