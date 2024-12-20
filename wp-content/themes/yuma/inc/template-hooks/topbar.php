<?php
/**
 * Topbar hook
 *
 * @package yuma
 */

if ( ! function_exists( 'yuma_add_topbar_section' ) ) :
    /**
    * Add topbar section
    *
    *@since Yuma 1.0.0
    */
    function yuma_add_topbar_section() {

        // Check if topbar is enabled on frontpage
        $topbar_enable = yuma_theme_option( 'enable_topbar' );

        if ( ! $topbar_enable ) {
            return;
        }

        // Render topbar section now.
        yuma_render_topbar_section();
    }
endif;
add_action( 'yuma_header_start_action', 'yuma_add_topbar_section', 20 );

if ( ! function_exists( 'topbar_yuma_cart_link' ) ) {
    /**
     * Cart Link
     * Displayed a link to the cart including the number of items present and the cart total
     *
     * @return void
     * @since  1.0.0
     */
    function topbar_yuma_cart_link() {
        $woocart_item = yuma_theme_option( 'enable_topbar_woocart_item' );
        ?>
            <a class="cart-contents <?php echo $woocart_item ? 'show-items' : 'hide-items' ?>" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'yuma' ); ?>">
                <?php echo yuma_get_svg( array( 'icon' => 'bag' ) );
                if ( $woocart_item ) :
                    echo wp_kses_post( WC()->cart->get_cart_subtotal() ); ?> 
                    <span class="topbar-count">
                        <?php echo wp_kses_data( sprintf( _n( ' - %d item', ' - %d items', WC()->cart->get_cart_contents_count(), 'yuma' ), WC()->cart->get_cart_contents_count() ) ); ?>
                    </span>
                <?php else : ?>
                    <span class="topbar-count-box">
                        <?php echo absint( WC()->cart->get_cart_contents_count() ); ?>
                    </span>
                <?php endif; ?>
            </a>
        <?php
    }
}

if ( ! function_exists( 'yuma_render_topbar_cart' ) ) :
    /**
    * topbar woocommrce cart
    *
    * @return string topbar content
    * @since Yuma 1.0.0
    *
    */
    function yuma_render_topbar_cart() {
        if ( class_exists( 'WooCommerce' ) ) : ?>
            <div class="mini-cart topbar-element topbar_cart">
                <?php 
                topbar_yuma_cart_link();
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

if ( ! function_exists( 'yuma_render_topbar_address' ) ) :
    /**
    * topbar address
    *
    * @return string topbar content
    * @since Yuma 1.0.0
    *
    */
    function yuma_render_topbar_address() {
        $address = yuma_theme_option( 'topbar_address' );
        $address_link = yuma_theme_option( 'topbar_address_link' );
        if ( ! empty( $address ) ) : ?>
            <div class="topbar-element topbar-address topbar_address">
                <?php 
                echo yuma_get_svg( array( 'icon' => 'location-o' ) ); 
                if ( ! empty( $address_link ) ) : ?>
                    <a href="<?php echo esc_url( $address_link ); ?>">
                        <?php echo esc_html( $address ); ?>
                    </a>
                <?php else :
                    echo esc_html( $address ); 
                endif; ?>
            </div>
        <?php endif;
    }
endif;

if ( ! function_exists( 'yuma_render_topbar_time' ) ) :
    /**
    * topbar time
    *
    * @return string topbar content
    * @since Yuma 1.0.0
    *
    */
    function yuma_render_topbar_time() {
        $time = yuma_theme_option( 'topbar_time' );
        if ( ! empty( $time ) ) : ?>
            <div class="topbar-element topbar-time topbar_time">
                <?php 
                echo yuma_get_svg( array( 'icon' => 'clock' ) ); 
                echo esc_html( $time ); 
                ?>
            </div>
        <?php endif;
    }
endif;

if ( ! function_exists( 'yuma_render_topbar_phone' ) ) :
    /**
     * topbar phone
     *
     * @return string topbar content
     * @since Yuma 1.0.0
     *
     */
    function yuma_render_topbar_phone() {
        $phones = yuma_theme_option( 'topbar_phone' );
        if ( ! empty( $phones ) ) :
            $phones = explode(',', $phones ); ?>
            <div class="topbar-element topbar-phone topbar_phone">
                <?php 
                echo yuma_get_svg( array( 'icon' => 'phone-o' ) ); 
                foreach ( $phones as $phone ) : ?>
                    <a href="<?php echo esc_url( 'tel:' . $phone ); ?>">
                        <?php echo esc_html( $phone ); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif;
   }
endif;

if ( ! function_exists( 'yuma_render_topbar_email' ) ) :
    /**
     * topbar email
     *
     * @return string topbar content
     * @since Yuma 1.0.0
     *
     */
    function yuma_render_topbar_email() {
        $emails = yuma_theme_option( 'topbar_email' );
        if ( ! empty( $emails ) ) :
            $emails = explode(',', $emails ); ?>
            <div class="topbar-element topbar-email topbar_email">
                <?php 
                echo yuma_get_svg( array( 'icon' => 'envelope-o' ) ); 
                foreach ( $emails as $email ) : ?>
                    <a href="<?php echo esc_url( 'mailto:' . $email ); ?>">
                        <?php echo esc_html( $email ); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif;
   }
endif;

if ( ! function_exists( 'yuma_render_topbar_date' ) ) :
    /**
    * topbar date
    *
    * @return string topbar content
    * @since Yuma 1.0.0
    *
    */
    function yuma_render_topbar_date() {
        $date = yuma_theme_option( 'topbar_date_format' );
        $date_format = array(
            'layout-1'      => 'F j, Y',
            'layout-2'      => 'M j, Y',
            'layout-3'      => 'm-d-Y',
            'layout-4'      => 'm/d/Y',
            'layout-5'      => 'd/m/Y',
            'layout-6'      => 'l jS F Y',
            'layout-7'      => 'D jS M Y',
        );
        if ( ! empty( $date ) ) : 
            ?>
            <div class="topbar-element topbar-date topbar_date">
                <?php echo esc_html( date( $date_format[ $date ] ) ); ?>
            </div>
        <?php endif;
    }
endif;

if ( ! function_exists( 'yuma_render_topbar_topbar_menu' ) ) :
    /**
    * topbar menu
    *
    * @return string topbar content
    * @since Yuma 1.0.0
    *
    */
    function yuma_render_topbar_topbar_menu() {
        if ( has_nav_menu( 'topbar' ) ) : ?>
            <div class="topbar-element topbar-menu topbar_topbar_menu">
                <?php  
                wp_nav_menu( array(
                    'theme_location'  => 'topbar',
                    'container_class' => 'secondary-menu',
                    'menu_class'      => 'menu',
                    'fallback_cb'     => false,
                    'depth'           => 1,
                ) );
                ?>
            </div><!-- .secondary-menu -->
        <?php endif;
    }
endif;

if ( ! function_exists( 'yuma_render_topbar_social_menu' ) ) :
    /**
    * topbar social menu
    *
    * @return string topbar content
    * @since Yuma 1.0.0
    *
    */
    function yuma_render_topbar_social_menu() {
        $class = 'original-hover-color';

        if ( has_nav_menu( 'social' ) ) : ?>
            <div class="social-menu topbar-element topbar_social_menu">
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

if ( ! function_exists( 'yuma_render_topbar_search' ) ) :
    /**
    * topbar search
    *
    * @return string topbar content
    * @since Yuma 1.0.0
    *
    */
    function yuma_render_topbar_search() { 
        $search_format = yuma_theme_option('topbar_search_format'); ?>
        <div id="top-search" class="topbar-element topbar_search">
            <?php if ( 'search-icon' == $search_format ) : ?>
                <a href="#" class="search">
                    <?php echo yuma_get_svg( array( 'icon' => 'search' ) ); ?>
                </a>
                <div class="topbar-search top-model-search"><?php get_search_form(); ?></div>
            <?php else : ?>
                <div class="topbar-open-search"><?php get_search_form(); ?></div>
            <?php endif; ?>
        </div>
    <?php }
endif;

if ( ! function_exists( 'yuma_render_topbar_off_canvas_bar' ) ) :
    /**
    * topbar off canvas bar
    *
    * @return string topbar content
    * @since Yuma 1.0.0
    *
    */
    function yuma_render_topbar_off_canvas_bar() { ?>
        <div class="topbar-element topbar_off_canvas_bar">
            <a class="off-canvas-bar" href="#">
                <span></span>
                <span></span>
                <span></span>
            </a>
        </div>
    <?php }
endif;


if ( ! function_exists( 'yuma_render_topbar_section' ) ) :
  /**
   * Start topbar section
   *
   * @return string topbar content
   * @since Yuma 1.0.0
   *
   */
   function yuma_render_topbar_section() { 
        $left_element = yuma_theme_option( 'topbar_left_element' ); 
        $center_element = yuma_theme_option( 'topbar_center_element' ); 
        $right_element = yuma_theme_option( 'topbar_right_element' );
        $topbar_full_width = yuma_theme_option( 'topbar_full_width', false );

        if ( ! $left_element && ! $center_element && ! $right_element ) {
            return;
        }

        $class = ! $left_element ? 'no-left-element' : '';
        $class .= ! $center_element ? ' no-center-element' : '';
        $class .= ! $right_element ? ' no-right-element' : '';
         ?>
        <div id="top-menu">
            <button class="topbar-menu-toggle">
                <?php 
                echo yuma_get_svg( array( 'icon' => 'up', 'class' => 'dropdown-icon' ) );
                echo yuma_get_svg( array( 'icon' => 'down', 'class' => 'dropdown-icon' ) ); 
                ?>
            </button>
            
            <div class="wrapper <?php echo $topbar_full_width ? 'full-width' : ''; ?>">
                <div class="inner-wrapper <?php echo esc_attr( $class ); ?>">
                    <?php if ( $left_element ) : ?>
                        <div class="topbar-left">
                            <?php 
                                $left_element = explode( ',', $left_element );
                                foreach ( $left_element as $element ) {
                                    if ( function_exists( 'yuma_render_topbar_' . esc_attr( $element ) ) ) :
                                        add_action( 'yuma_topbar_left_action', 'yuma_render_topbar_' . esc_attr( $element ) );
                                    endif;
                                }
                                do_action( 'yuma_topbar_left_action' );
                            ?>
                        </div>
                    <?php endif;

                    if ( $center_element ) : ?>
                        <div class="topbar-center">
                            <?php 
                                $center_element = explode( ',', $center_element );
                                foreach ( $center_element as $element ) {
                                    if ( function_exists( 'yuma_render_topbar_' . esc_attr( $element ) ) ) :
                                        add_action( 'yuma_topbar_center_action', 'yuma_render_topbar_' . esc_attr( $element ) );
                                    endif;
                                }
                                do_action( 'yuma_topbar_center_action' );
                            ?>
                        </div>
                    <?php endif;

                    if ( $right_element ) : ?>
                        <div class="topbar-right">
                            <?php 
                                $right_element = explode( ',', $right_element );
                                foreach ( $right_element as $element ) {
                                    if ( function_exists( 'yuma_render_topbar_' . esc_attr( $element ) ) ) :
                                        add_action( 'yuma_topbar_right_action', 'yuma_render_topbar_' . esc_attr( $element ) );
                                    endif;
                                }
                                do_action( 'yuma_topbar_right_action' );
                            ?>
                        </div>
                    <?php endif; ?>

                </div><!-- .inner-wrapper -->
            </div><!-- .wrapper -->
        </div><!-- #top-menu -->
    <?php }
endif;