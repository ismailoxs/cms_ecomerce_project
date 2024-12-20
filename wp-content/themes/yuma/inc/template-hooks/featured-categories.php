<?php
/**
 * Featured Categories hook
 *
 * @package yuma
 */

if ( ! function_exists( 'yuma_add_featured_categories_section' ) ) :
    /**
    * Add featured categories section
    *
    *@since Yuma 1.0.0
    */
    function yuma_add_featured_categories_section() {

        // Check if featured categories is enabled on frontpage
        $featured_categories_enable = apply_filters( 'yuma_section_status', 'enable_featured_categories', '' );

        if ( ! $featured_categories_enable )
            return false;

        // Render featured categories section now.
        yuma_render_featured_categories_section();
    }
endif;
add_action( 'yuma_primary_content_action', 'yuma_add_featured_categories_section', 30 );

if ( ! function_exists( 'yuma_render_featured_categories_section' ) ) :
  /**
   * Start featured categories section
   *
   * @return string featured categories content
   * @since Yuma 1.0.0
   *
   */
   function yuma_render_featured_categories_section() {
        $content_width = yuma_theme_option( 'featured_categories_width', 'full' );
        $alignment = yuma_theme_option( 'featured_categories_alignment', 'left-align' );
        $layout = yuma_theme_option( 'featured_categories_layout', 'no-gap' );
        $column = yuma_theme_option( 'featured_categories_column', 4 );
        $count  = yuma_theme_option( 'featured_categories_count', 4 );
        ?>
        <div id="featured-categories" class="homepage-section relative <?php echo esc_attr( $alignment ); ?> <?php echo esc_attr( $layout ); ?>">
            <div class="page-section <?php echo ( 'container-width' == $content_width ) ? 'wrapper' : ''; ?>">
                <div class="section-content column-<?php echo absint( $column ); ?>">
                    <?php for ( $i = 1; $i <= $count; $i++ ) : 
                        $category = yuma_theme_option( 'featured_categories_content_category_' . $i ); 
                        if ( ! empty( $category ) ) :
                            $title = get_cat_name( $category );
                            $url = get_category_link( $category );
                            $image = yuma_theme_option( 'featured_categories_category_image_' . $i );
                            
                            if ( yuma_theme_option( 'featured_categories_post_count' ) ) :
                                $cat = get_category($category);
                                $post_count = $cat ? $cat->category_count : '';
                            endif;
                            ?>
                            <article class="hentry">
                                <div class="post-wrapper">
                                    <div class="overlay"></div>
                                    <?php if ( ! empty( $image ) ) : ?>
                                        <div class="featured-image">
                                            <a href="<?php echo esc_url( $url ); ?>">
                                                <img src="<?php echo esc_url( $image ); ?>">
                                            </a>
                                        </div><!-- .featured-image -->
                                    <?php endif; ?>

                                    <header class="entry-header">
                                        <h2 class="entry-title">
                                            <a href="<?php echo esc_url( $url ); ?>">
                                                <?php 
                                                echo esc_html( $title );
                                                if ( yuma_theme_option( 'featured_categories_post_count' ) ) {
                                                    echo ' (' . absint( $post_count ) . ')'; 
                                                }
                                                ?>
                                            </a>
                                        </h2>
                                    </header>
                                </div><!-- .post-wrapper -->
                            </article>
                        <?php endif; 
                    endfor; ?>
                </div><!-- .section-content -->
            </div><!-- .page-section -->
        </div><!-- #featured-posts -->
    <?php 
    }
endif;