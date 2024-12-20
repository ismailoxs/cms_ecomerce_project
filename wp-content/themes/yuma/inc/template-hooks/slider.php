<?php
/**
 * Slider hook
 *
 * @package yuma
 */

if ( ! function_exists( 'yuma_add_slider_section' ) ) :
    /**
    * Add slider section
    *
    *@since Yuma 1.0.0
    */
    function yuma_add_slider_section() {

        // Check if slider is enabled on frontpage
        $slider_enable = apply_filters( 'yuma_section_status', 'enable_slider', 'slider_entire_site' );

        if ( ! $slider_enable )
            return false;

        // Get slider section details
        $section_details = array();
        $section_details = apply_filters( 'yuma_filter_slider_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render slider section now.
        yuma_render_slider_section( $section_details );
    }
endif;
add_action( 'yuma_primary_content_action', 'yuma_add_slider_section', 10 );


if ( ! function_exists( 'yuma_get_slider_section_details' ) ) :
    /**
    * slider section details.
    *
    * @since Yuma 1.0.0
    * @param array $input slider section details.
    */
    function yuma_get_slider_section_details( $input ) {

        // Content type.
        $slider_content_type  = yuma_theme_option( 'slider_content_type' );
        $slider_count  = yuma_theme_option( 'slider_count', 3 );
        $slider_image_size  = yuma_theme_option( 'slider_image_size' );
        $image_size = ( yuma_theme_option( 'slider_column', 1 ) == 1 ) ? 'full' : $slider_image_size;
        $content = array();
        switch ( $slider_content_type ) {

            case 'page':
                $page_ids = array();
                $page_sub_title = array();

                for ( $i = 1; $i <= $slider_count; $i++ )  :
                    $page_ids[] = yuma_theme_option( 'slider_content_page_' . $i );
                    $page_sub_title[] =  yuma_theme_option( 'slider_sub_title_' . $i );
                endfor;
                
                $args = array(
                    'post_type'         => 'page',
                    'post__in'          =>  ( array ) $page_ids,
                    'posts_per_page'    => absint( $slider_count ),
                    'orderby'           => 'post__in',
                    );                    
            break;

            case 'post':
                $post_ids = array();

                for ( $i = 1; $i <= $slider_count; $i++ )  :
                    $post_ids[] = yuma_theme_option( 'slider_content_post_' . $i );
                endfor;
                
                $args = array(
                    'post_type'         => 'post',
                    'post__in'          =>  ( array ) $post_ids,
                    'posts_per_page'    => absint( $slider_count ),
                    'orderby'           => 'post__in',
                    'ignore_sticky_posts' => true,
                    );                    
            break;

            default:
                return;
            break;
        }

        if ( in_array( $slider_content_type, array( 'page', 'post' ) ) ) {

            // Run The Loop.
            $query = new WP_Query( $args );
            $i = 0;
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['id']        = get_the_id();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), $image_size ) : '';
                    $page_post['excerpt']   = yuma_trim_content( 20 );

                    if ( 'page' == $slider_content_type ) {
                        $page_post['sub_title'] = $page_sub_title[$i];
                    }

                    // Push to the main array.
                    array_push( $content, $page_post );
                    $i++;
                endwhile;
            endif;
            wp_reset_postdata();
        }
            
        if ( ! empty( $content ) )
            $input = $content;
       
        return $input;
    }
endif;
// slider section content details.
add_filter( 'yuma_filter_slider_section_details', 'yuma_get_slider_section_details' );


if ( ! function_exists( 'yuma_render_slider_section' ) ) :
  /**
   * Start slider section
   *
   * @return string slider content
   * @since Yuma 1.0.0
   *
   */
   function yuma_render_slider_section( $content_details = array() ) {
        if ( empty( $content_details ) )
            return;

        $slider_content_type  = yuma_theme_option( 'slider_content_type' );
        $slider_control = yuma_theme_option( 'slider_arrow' );
        $auto_slide = yuma_theme_option('slider_auto_slide' );
        $slider_gap = yuma_theme_option( 'slider_gap' );
        $slider_excerpt = yuma_theme_option( 'slider_excerpt' );
        $slider_center_mode = yuma_theme_option( 'slider_center_mode' );
        $slider_width = yuma_theme_option( 'slider_width', 'full-width' );
        $slider_layout = yuma_theme_option( 'slider_layout', 'left-align' );
        $column = yuma_theme_option( 'slider_column', 1 );
        $readmore = yuma_theme_option( 'slider_readmore_label' );
        ?>
    	<div id="custom-header" dir="ltr" class="homepage-section">
            <div class="section-content banner-slider <?php echo $slider_center_mode ? 'center-mode' : ''; ?> <?php echo ( 'container-width' == $slider_width ) ? 'wrapper' : ''; ?> <?php echo esc_attr( $slider_layout ); ?> <?php echo $slider_gap ? 'slider-gap' : ''; ?> <?php echo 'column-' . absint( $column ); ?>" data-slick='{"slidesToShow": <?php echo absint( $column ); ?>, "slidesToScroll": 1, "infinite": true, "speed": 1200, "dots": false, "arrows":<?php echo $slider_control ? 'true' : 'false'; ?>, "autoplay": <?php echo $auto_slide ? 'true' : 'false'; ?>, "fade": <?php echo ( $column == 1 && ! $slider_center_mode ) ? 'true' : 'false'; ?>, "draggable": true }'>
                <?php foreach ( $content_details as $content ) : ?>
                    <div class="custom-header-content-wrapper slide-item">
                        <div class="overlay"></div>
                        <?php if ( ! empty( $content['image'] ) ) : ?>
                            <img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
                        <?php endif; ?>

                        <div class="wrapper" <?php echo is_rtl() ? 'dir="rtl"' : '' ?>>
                            <div class="custom-header-content">
                                <?php if ( in_array( $slider_content_type, array( 'post', 'category' ) ) ) : ?>
                                    <span class="cat-links">
                                        <?php the_category( ', ', '', $content['id'] ); ?>
                                    </span>
                                <?php endif; 

                                if ( in_array( $slider_content_type, array( 'page', 'custom' ) ) ) : 
                                    if ( ! empty( $content['sub_title'] ) ) : ?>
                                        <span class="sub-title">
                                            <?php echo esc_html( $content['sub_title'] ); ?>
                                        </span>
                                    <?php endif; 
                                endif; 

                                if ( ! empty( $content['title'] ) ) : ?>
                                    <h2 class="entry-title">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo yuma_title_allow_span( $content['title'] ); ?></a>
                                    </h2>
                                <?php endif;

                                if ( $slider_excerpt ) : ?>
                                    <div class="entry-content">
                                        <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                    </div>
                                <?php endif; 

                                if ( ! empty( $content['url'] ) && ! empty( $readmore ) ) : ?>
                                    <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn btn-transparent"><?php echo esc_html( $readmore ); ?></a>
                                <?php endif; ?>
                            </div><!-- .custom-header-content -->
                        </div><!-- .wrapper -->
                    </div><!-- .custom-header-content-wrapper -->
                <?php endforeach; ?>
            </div><!-- .banner-slider -->
        </div><!-- #custom-header -->
    <?php 
    }
endif;