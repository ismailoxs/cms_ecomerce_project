<?php
/**
 * Popular hook
 *
 * @package yuma
 */

if ( ! function_exists( 'yuma_add_popular_section' ) ) :
    /**
    * Add popular section
    *
    *@since Yuma 1.0.0
    */
    function yuma_add_popular_section() {

        // Check if popular is enabled on frontpage
        $popular_enable = apply_filters( 'yuma_section_status', 'enable_popular', '' );

        if ( ! $popular_enable )
            return false;

        // Get popular section details
        $section_details = array();
        $section_details = apply_filters( 'yuma_filter_popular_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render popular section now.
        yuma_render_popular_section( $section_details );
    }
endif;
add_action( 'yuma_primary_content_action', 'yuma_add_popular_section', 60 );


if ( ! function_exists( 'yuma_get_popular_section_details' ) ) :
    /**
    * popular section details.
    *
    * @since Yuma 1.0.0
    * @param array $input popular section details.
    */
    function yuma_get_popular_section_details( $input ) {

        // Content type.
        $popular_content_type  = yuma_theme_option( 'popular_content_type' );
        $popular_count  = yuma_theme_option( 'popular_count', 3 );
        $content = array();
        switch ( $popular_content_type ) {

            case 'post':
                $post_ids = array();

                for ( $i = 1; $i <= $popular_count; $i++ )  :
                    $post_ids[] = yuma_theme_option( 'popular_content_post_' . $i );
                endfor;

                $args = array(
                    'post_type'         => 'post',
                    'post__in'          =>  ( array ) $post_ids,
                    'posts_per_page'    => absint( $popular_count ),
                    'orderby'           => 'post__in',
                    'ignore_sticky_posts' => true,
                    );                    
            break;

            default:
                return;
            break;
        }


        // Run The Loop.
        $query = new WP_Query( $args );
        $image_size = yuma_theme_option( 'popular_image_size', 'yuma-square-thumbnail' );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), $image_size ) : '';

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
// popular section content details.
add_filter( 'yuma_filter_popular_section_details', 'yuma_get_popular_section_details' );


if ( ! function_exists( 'yuma_render_popular_section' ) ) :
  /**
   * Start popular section
   *
   * @return string popular content
   * @since Yuma 1.0.0
   *
   */
   function yuma_render_popular_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        $alignment = yuma_theme_option( 'popular_alignment', 'left-align' );
        $popular_layout = yuma_theme_option( 'popular_layout', 'gap' );
        $column = yuma_theme_option( 'popular_column', 3 );
        $popular_content_type  = yuma_theme_option( 'popular_content_type' );
        $title = yuma_theme_option( 'popular_title', '' );
        $separator = yuma_theme_option( 'enable_popular_before_element' );
        ?>
    	<div id="popular-posts" class="relative homepage-section">
            <div class="page-section wrapper">
                <?php if ( ! empty( $title ) ) : ?>
                    <header class="page-header">
                        <h2 class="section-title <?php echo $separator ? 'separator' : ''; ?>"><?php echo esc_html( $title ); ?></h2>
                    </header>
                <?php endif; ?>

                <div class="section-content <?php echo esc_attr( $alignment ); ?> <?php echo esc_attr( $popular_layout ); ?> column-<?php echo absint( $column ); ?>">
                    <?php foreach ( $content_details as $content ) : ?>
                        <article class="hentry <?php echo empty( $content['image'] ) ? 'no-post-thumbnail' : 'has-post-thumbnail'; ?>">
                            <div class="post-wrapper">
                                <?php if ( ! empty( $content['image'] ) ) : ?>
                                    <div class="featured-image">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>">
                                            <img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
                                        </a>
                                    </div><!-- .recent-image -->
                                <?php endif; ?>

                                <div class="entry-container">
                                    <?php if ( 'page' !== $popular_content_type ) : ?>
                                        <div class="entry-meta">
                                            <span class="posted-on">
                                                <a href="<?php echo esc_url( $content['url'] ); ?>">
                                                    <time>
                                                        <?php echo esc_html( get_the_date( get_option('date_format'), $content['id'] ) ); ?>
                                                    </time>
                                                </a>
                                            </span>
                                        </div>
                                    <?php endif; ?>

                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo yuma_title_allow_span( $content['title'] ); ?></a></h2>
                                    </header>

                                </div><!-- .entry-container -->
                            </div><!-- .post-wrapper -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #popular-posts -->
    <?php 
    }
endif;