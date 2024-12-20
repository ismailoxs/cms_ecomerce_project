<?php
/**
 * Footer hook
 *
 * @package yuma
 */

if ( ! function_exists( 'yuma_add_footer_section' ) ) :
    /**
    * Add footer section
    *
    *@since Yuma 1.0.0
    */
    function yuma_add_footer_section() {

        // Check if footer is enabled on frontpage
        $footer_enable = yuma_theme_option( 'enable_footer' );

        if ( ! $footer_enable ) {
            return;
        }

        // Render footer section now.
        yuma_render_footer_section();
    }
endif;
add_action( 'yuma_site_info_action', 'yuma_add_footer_section', 10 );


if ( ! function_exists( 'yuma_render_footer_custom_text' ) ) :
    /**
    * footer address
    *
    * @return string footer content
    * @since Yuma 1.0.0
    *
    */
    function yuma_render_footer_custom_text() {
        $custom_text = get_theme_mod( 'yuma_footer_custom_text', yuma_theme_option( 'copyright_text' ) );
        if ( ! empty( $custom_text ) ) : ?>
            <div class="footer-element yuma_footer_custom_text">
                <?php echo wp_kses_post( $custom_text ); ?>
            </div>
        <?php endif;
    }
endif;

if ( ! function_exists( 'yuma_render_footer_static_credential' ) ) :
    /**
    * footer address
    *
    * @return string footer content
    * @since Yuma 1.0.0
    *
    */
    function yuma_render_footer_static_credential() { ?>
        <div class="footer-element">
            <?php printf( esc_html__( ' Yuma by %1$s Shark Themes %2$s', 'yuma' ), '<a href="' . esc_url( 'https://sharkthemes.com/' ) . '" target="_blank">','</a>' ); ?>
        </div>
    <?php }
endif;

if ( ! function_exists( 'yuma_render_footer_footer_menu' ) ) :
    /**
    * footer menu
    *
    * @return string footer content
    * @since Yuma 1.0.0
    *
    */
    function yuma_render_footer_footer_menu() {
        if ( has_nav_menu( 'footer' ) ) : ?>
            <div class="footer-element footer-menu footer_footer_menu">
                <?php  
                wp_nav_menu( array(
                    'theme_location'  => 'footer',
                    'container_class' => 'footer-menu',
                    'menu_class'      => 'menu',
                    'fallback_cb'     => false,
                    'depth'           => 1,
                ) );
                ?>
            </div><!-- .secondary-menu -->
        <?php endif;
    }
endif;;

if ( ! function_exists( 'yuma_render_footer_social_menu' ) ) :
    /**
    * footer social menu
    *
    * @return string footer content
    * @since Yuma 1.0.0
    *
    */
    function yuma_render_footer_social_menu() {
        $class = 'original-hover-color';
        if ( has_nav_menu( 'social' ) ) : ?>
            <div class="social-menu footer-element footer_social_menu">
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

if ( ! function_exists( 'yuma_render_footer_section' ) ) :
  /**
   * Start footer section
   *
   * @return string footer content
   * @since Yuma 1.0.0
   *
   */
   function yuma_render_footer_section() { 
        $left_element = yuma_theme_option( 'footer_left_element' ); 
        $center_element = yuma_theme_option( 'footer_center_element' ); 
        $right_element = yuma_theme_option( 'footer_right_element' );
        $right_element = $right_element . ',static_credential';

        if ( ! $left_element && ! $center_element && ! $right_element ) {
            return;
        }

        $class = ! $left_element ? 'no-footer-left-element' : '';
        $class .= ! $center_element ? ' no-footer-center-element' : '';
        $class .= ! $right_element ? ' no-footer-right-element' : '';
        ?>
        <div class="site-info">
            <div class="footer-container">
                <div class="wrapper">
                    <div class="inner-wrapper <?php echo esc_attr( $class ); ?>">
                        <?php if ( $left_element ) : ?>
                            <div class="footer-left">
                                <?php 
                                    $left_element = explode( ',', $left_element );
                                    foreach ( $left_element as $element ) {
                                        if ( function_exists( 'yuma_render_footer_' . esc_attr( $element ) ) ) :
                                            add_action( 'yuma_footer_left_action', 'yuma_render_footer_' . esc_attr( $element ) );
                                        endif;
                                    }
                                    do_action( 'yuma_footer_left_action' );
                                ?>
                            </div>
                        <?php endif;

                        if ( $center_element ) : ?>
                            <div class="footer-center">
                                <?php 
                                    $center_element = explode( ',', $center_element );
                                    foreach ( $center_element as $element ) {
                                        if ( function_exists( 'yuma_render_footer_' . esc_attr( $element ) ) ) :
                                            add_action( 'yuma_footer_center_action', 'yuma_render_footer_' . esc_attr( $element ) );
                                        endif;
                                    }
                                    do_action( 'yuma_footer_center_action' );
                                ?>
                            </div>
                        <?php endif;

                        if ( $right_element ) : ?>
                            <div class="footer-right">
                                <?php 
                                    $right_element = explode( ',', $right_element );
                                    foreach ( $right_element as $element ) {
                                        if ( function_exists( 'yuma_render_footer_' . esc_attr( $element ) ) ) :
                                            add_action( 'yuma_footer_right_action', 'yuma_render_footer_' . esc_attr( $element ) );
                                        endif;
                                    }
                                    do_action( 'yuma_footer_right_action' );
                                ?>
                            </div>
                        <?php endif; ?>

                    </div><!-- .inner-wrapper -->
                </div><!-- .wrapper -->
            </div><!-- .footer-container -->
        </div><!-- #footer -->
    <?php }
endif;
