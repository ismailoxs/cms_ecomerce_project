<?php
/**
 * Featured hook
 *
 * @package yuma
 */

if ( ! function_exists( 'yuma_add_featured_section' ) ) :
    /**
    * Add featured section
    *
    *@since Yuma 1.0.0
    */
    function yuma_add_featured_section() {

        // Check if featured is enabled on frontpage
        $featured_enable = apply_filters( 'yuma_section_status', 'enable_featured', '' );

        if ( ! $featured_enable )
            return false;

        // Get featured section details
        $section_details = array();
        $section_details = apply_filters( 'yuma_filter_featured_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render featured section now.
        yuma_render_featured_section( $section_details );
    }
endif;
add_action( 'yuma_primary_content_action', 'yuma_add_featured_section', 40 );


if ( ! function_exists( 'yuma_get_featured_section_details' ) ) :
    /**
    * featured section details.
    *
    * @since Yuma 1.0.0
    * @param array $input featured section details.
    */
    function yuma_get_featured_section_details( $input ) {

        // Content type.
        $featured_content_type  = yuma_theme_option( 'featured_content_type' );
        $featured_count  = yuma_theme_option( 'featured_count', 3 );
        $content = array();
        switch ( $featured_content_type ) {

            case 'post':
                $post_ids = array();

                for ( $i = 1; $i <= $featured_count; $i++ )  :
                    $post_ids[] = yuma_theme_option( 'featured_content_post_' . $i );
                endfor;

                $args = array(
                    'post_type'         => 'post',
                    'post__in'          =>  ( array ) $post_ids,
                    'posts_per_page'    => absint( $featured_count ),
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
        $image_size = yuma_theme_option( 'featured_image_size', 'yuma-post-thumbnail' );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = yuma_trim_content( 15 );
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
// featured section content details.
add_filter( 'yuma_filter_featured_section_details', 'yuma_get_featured_section_details' );


if ( ! function_exists( 'yuma_render_featured_section' ) ) :
  /**
   * Start featured section
   *
   * @return string featured content
   * @since Yuma 1.0.0
   *
   */
   function yuma_render_featured_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        $alignment = yuma_theme_option( 'featured_alignment', 'center-align' );
        $column = yuma_theme_option( 'featured_column', 3 );
        $featured_content_type  = yuma_theme_option( 'featured_content_type' );
        $title = yuma_theme_option( 'featured_title', '' );
        $readmore = yuma_theme_option( 'featured_readmore', '' );
        $separator = yuma_theme_option( 'enable_featured_before_element' );
        $featured_meta = yuma_theme_option( 'enable_featured_meta' );
        $featured_excerpt = yuma_theme_option( 'enable_featured_excerpt' );
        ?>
    	<div id="featured-posts" class="relative homepage-section">
            <div class="page-section wrapper">
                <?php if ( ! empty( $title ) ) : ?>
                    <header class="page-header">
                        <h2 class="section-title <?php echo $separator ? 'separator' : ''; ?>"><?php echo esc_html( $title ); ?></h2>
                    </header>
                <?php endif; ?>
                
                <div class="section-content <?php echo esc_attr( $alignment ); ?> column-<?php echo absint( $column ); ?>">
                    <?php foreach ( $content_details as $content ) : ?>
                        <article class="hentry">
                            <div class="post-wrapper">
                                <?php if ( ! empty( $content['image'] ) ) : ?>
                                    <div class="featured-image">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>">
                                            <img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
                                        </a>
                                    </div><!-- .recent-image -->
                                <?php endif; ?>

                                <div class="entry-container">
                                    <?php if ( 'page' !== $featured_content_type && $featured_meta ) : ?>
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

                                    <?php if ( $featured_excerpt ) : ?>
                                        <div class="entry-content">
                                            <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                        </div><!-- .entry-content -->
                                    <?php endif;

                                    if ( ! empty( $readmore ) ) : ?>
                                        <div class="read-more">
                                            <a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $readmore ); ?></a>
                                        </div>
                                    <?php endif; ?>

                                </div><!-- .entry-container -->
                            </div><!-- .post-wrapper -->
                        </article>
                    <?php endforeach; ?>
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #featured-posts -->
    <?php 
    }
endif;