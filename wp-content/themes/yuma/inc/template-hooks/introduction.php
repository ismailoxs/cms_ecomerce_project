<?php
/**
 * Introduction hook
 *
 * @package yuma
 */

if ( ! function_exists( 'yuma_add_introduction_section' ) ) :
    /**
    * Add introduction section
    *
    *@since Yuma 1.0.0
    */
    function yuma_add_introduction_section() {

        // Check if introduction is enabled on frontpage
        $introduction_enable = apply_filters( 'yuma_section_status', 'enable_introduction', '' );

        if ( ! $introduction_enable )
            return false;

        // Get introduction section details
        $section_details = array();
        $section_details = apply_filters( 'yuma_filter_introduction_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render introduction section now.
        yuma_render_introduction_section( $section_details );
    }
endif;
add_action( 'yuma_primary_content_action', 'yuma_add_introduction_section', 20 );


if ( ! function_exists( 'yuma_get_introduction_section_details' ) ) :
    /**
    * introduction section details.
    *
    * @since Yuma 1.0.0
    * @param array $input introduction section details.
    */
    function yuma_get_introduction_section_details( $input ) {

        // Content type.
        $introduction_content_type  = yuma_theme_option( 'introduction_content_type' );
        $content = array();
        switch ( $introduction_content_type ) {

            case 'page':
                $page_id = yuma_theme_option( 'introduction_content_page' );
                
                $args = array(
                    'post_type'         => 'page',
                    'page_id'           =>  absint( $page_id ),
                    'posts_per_page'    => 1,
                    );                    
            break;

            default:
                return;
            break;
        }

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = yuma_trim_content( 30 );
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'medium_large' ) : '';

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();
            
        if ( ! empty( $content ) )
            $input = $content;
       
        return $input;
    }
endif;
// introduction section content details.
add_filter( 'yuma_filter_introduction_section_details', 'yuma_get_introduction_section_details' );


if ( ! function_exists( 'yuma_render_introduction_section' ) ) :
  /**
   * Start introduction section
   *
   * @return string introduction content
   * @since Yuma 1.0.0
   *
   */
   function yuma_render_introduction_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        $introduction_excerpt  = yuma_theme_option( 'introduction_excerpt' );
        $readmore = yuma_theme_option('introduction_readmore_label');

        foreach ( $content_details as $content ) : ?>

            <div id="introduction" class="relative homepage-section">
                <div class="wrapper page-section <?php echo esc_attr( yuma_theme_option('introduction_alignment'), 'right-align' ) ?>">
                    <article class="hentry <?php echo empty( $content['image'] ) ? 'no-featured-image' : ''; ?>">
                        <div class="post-wrapper">
                            <div class="entry-container">
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo yuma_title_allow_span( $content['title'] ); ?></a></h2>
                                </header>

                                <?php if ( 'excerpt' == $introduction_excerpt ) : ?>
                                    <div class="entry-content">
                                        <p><?php echo wp_kses_post( $content['excerpt'] ); ?></p>                                  
                                    </div><!-- .entry-content -->
                                <?php endif; 

                                if ( ! empty( $readmore ) ) : ?>
                                    <div class="read-more">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn"><?php echo esc_html( $readmore ); ?></a>
                                    </div>
                                <?php endif; ?>
                            </div><!-- .entry-container -->

                            <?php if ( ! empty( $content['image'] ) ) : ?>
                                <div class="featured-image">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>"></a>
                                </div><!-- .featured-image -->
                            <?php endif; ?>
                        </div><!-- .post-wrapper -->
                    </article>
                </div><!-- .wrapper -->
            </div><!-- #introduction -->

        <?php endforeach;
    }
endif;