<?php
/**
 * Navbar hook
 *
 * @package yuma
 */

if ( ! function_exists( 'yuma_add_navbar_section' ) ) :
    /**
    * Add navbar section
    *
    *@since Yuma 1.0.0
    */
    function yuma_add_navbar_section() {

        // Check if navbar is enabled on frontpage
        $navbar_enable = yuma_theme_option( 'enable_navbar' );

        if ( ! $navbar_enable ) {
            return;
        }

        // Render navbar section now.
        yuma_render_navbar_section();
    }
endif;
add_action( 'yuma_header_start_action', 'yuma_add_navbar_section', 40 );


if ( ! function_exists( 'yuma_render_navbar_custom_text' ) ) :
    /**
    * navbar address
    *
    * @return string navbar content
    * @since Yuma 1.0.0
    *
    */
    function yuma_render_navbar_custom_text() {
        $custom_text = get_theme_mod( 'yuma_navbar_custom_text' );
        if ( ! empty( $custom_text ) ) : ?>
            <div class="navbar-element navbar_custom_text">
                <?php echo wp_kses_post( $custom_text ); ?>
            </div>
        <?php endif;
    }
endif;

if ( ! function_exists( 'yuma_render_navbar_button' ) ) :
    /**
    * navbar address
    *
    * @return string navbar content
    * @since Yuma 1.0.0
    *
    */
    function yuma_render_navbar_button() {
        $label  = yuma_theme_option( 'navbar_button_label' );
        $url    = yuma_theme_option( 'navbar_button_url' );

        if ( empty( $label ) || empty( $url ) ) {
            return;
        } ?>

        <div class="navbar-element navbar_button">
            <a class="btn btn-transparent navbar-btn" href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $label ); ?></a>
        </div>
    <?php }
endif;

if ( ! function_exists( 'yuma_render_navbar_primary_menu' ) ) :
    /**
    * navbar menu
    *
    * @return string navbar content
    * @since Yuma 1.0.0
    *
    */
    function yuma_render_navbar_primary_menu() {
        $label = yuma_theme_option( 'navbar_primary_menu_label' );
        if ( has_nav_menu( 'primary' ) ) : ?>
            <div class="navbar-element navbar_primary_menu">
                <nav id="navbar-navigation" class="main-navigation">
                    <button class="navbar-menu-toggle" aria-controls="primary-menu" aria-expanded="false">
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
            </div><!-- .secondary-menu -->
        <?php endif;
    }
endif;

if ( ! function_exists( 'yuma_render_navbar_social_menu' ) ) :
    /**
    * navbar social menu
    *
    * @return string navbar content
    * @since Yuma 1.0.0
    *
    */
    function yuma_render_navbar_social_menu() {
        $class = 'original-hover-color';
        if ( has_nav_menu( 'social' ) ) : ?>
            <div class="social-menu navbar-element navbar_social_menu">
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

if ( ! function_exists( 'yuma_render_navbar_off_canvas_bar' ) ) :
    /**
    * navbar off canvas bar
    *
    * @return string navbar content
    * @since Yuma 1.0.0
    *
    */
    function yuma_render_navbar_off_canvas_bar() { ?>
        <div class="navbar-element navbar_off_canvas_bar">
            <a class="off-canvas-bar" href="#">
                <span></span>
                <span></span>
                <span></span>
            </a>
        </div>
    <?php }
endif;

if ( ! function_exists( 'yuma_render_navbar_search' ) ) :
    /**
    * navbar search
    *
    * @return string navbar content
    * @since Yuma 1.0.0
    *
    */
    function yuma_render_navbar_search() { 
        $search_format = yuma_theme_option('navbar_search_format'); ?>
        <div class="navbar-element search-form navbar_search">
            <?php if ( 'search-icon' == $search_format ) : ?>
                <a href="#" class="search">
                    <?php echo yuma_get_svg( array( 'icon' => 'search' ) ); ?>
                </a>
                <div class="navbar-search top-model-search"><?php get_search_form(); ?></div>
            <?php else : ?>
                <div class="navbar-open-search"><?php get_search_form(); ?></div>
            <?php endif; ?>
        </div>
    <?php }
endif;

if ( ! function_exists( 'yuma_render_navbar_section' ) ) :
  /**
   * Start navbar section
   *
   * @return string navbar content
   * @since Yuma 1.0.0
   *
   */
   function yuma_render_navbar_section() { 
        $left_element = yuma_theme_option( 'navbar_left_element' ); 
        $center_element = yuma_theme_option( 'navbar_center_element' ); 
        $right_element = yuma_theme_option( 'navbar_right_element' );

        if ( ! $left_element && ! $center_element && ! $right_element ) {
            return;
        }

        $class = ! $left_element ? 'no-navbar-left-element' : '';
        $class .= ! $center_element ? ' no-navbar-center-element' : '';
        $class .= ! $right_element ? ' no-navbar-right-element' : '';
        $navbar_width = yuma_theme_option( 'navbar_width', 'normal-width' );
        ?>
        <div id="navbar" class="site-navbar <?php echo ( 'container-width' == $navbar_width ) ? 'container-width' : ''; ?>">
            <div class="navbar-container">
                <div class="wrapper <?php echo ( 'full-width' == $navbar_width ) ? 'full-width' : ''; ?>">
                    <div class="inner-wrapper <?php echo esc_attr( $class ); ?>">
                        <?php if ( $left_element ) : ?>
                            <div class="navbar-left">
                                <?php 
                                    $left_element = explode( ',', $left_element );
                                    foreach ( $left_element as $element ) {
                                        if ( function_exists( 'yuma_render_navbar_' . esc_attr( $element ) ) ) :
                                            add_action( 'yuma_navbar_left_action', 'yuma_render_navbar_' . esc_attr( $element ) );
                                        endif;
                                    }
                                    do_action( 'yuma_navbar_left_action' );
                                ?>
                            </div>
                        <?php endif;

                        if ( $center_element ) : ?>
                            <div class="navbar-center">
                                <?php 
                                    $center_element = explode( ',', $center_element );
                                    foreach ( $center_element as $element ) {
                                        if ( function_exists( 'yuma_render_navbar_' . esc_attr( $element ) ) ) :
                                            add_action( 'yuma_navbar_center_action', 'yuma_render_navbar_' . esc_attr( $element ) );
                                        endif;
                                    }
                                    do_action( 'yuma_navbar_center_action' );
                                ?>
                            </div>
                        <?php endif;

                        if ( $right_element ) : ?>
                            <div class="navbar-right">
                                <?php 
                                    $right_element = explode( ',', $right_element );
                                    foreach ( $right_element as $element ) {
                                        if ( function_exists( 'yuma_render_navbar_' . esc_attr( $element ) ) ) :
                                            add_action( 'yuma_navbar_right_action', 'yuma_render_navbar_' . esc_attr( $element ) );
                                        endif;
                                    }
                                    do_action( 'yuma_navbar_right_action' );
                                ?>
                            </div>
                        <?php endif; ?>

                    </div><!-- .inner-wrapper -->
                </div><!-- .wrapper -->
            </div><!-- .navbar-container -->
        </div><!-- #navbar -->
    <?php }
endif;
