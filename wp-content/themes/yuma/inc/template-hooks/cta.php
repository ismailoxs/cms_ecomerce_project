<?php
/**
 * Call to action hook
 *
 * @package yuma
 */

if ( ! function_exists( 'yuma_add_cta_section' ) ) :
    /**
    * Add cta section
    *
    *@since Yuma 1.0.0
    */
    function yuma_add_cta_section() {

        // Check if cta is enabled on frontpage
        $cta_enable = apply_filters( 'yuma_section_status', 'enable_cta', '' );

        if ( ! $cta_enable )
            return false;

        // Get cta section details
        $section_details = array();
        $section_details = apply_filters( 'yuma_filter_cta_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render cta section now.
        yuma_render_cta_section( $section_details );
    }
endif;
add_action( 'yuma_primary_content_action', 'yuma_add_cta_section', 70 );


if ( ! function_exists( 'yuma_get_cta_section_details' ) ) :
    /**
    * cta section details.
    *
    * @since Yuma 1.0.0
    * @param array $input cta section details.
    */
    function yuma_get_cta_section_details( $input ) {

        // Content type.
        $cta_content_type  = yuma_theme_option( 'cta_content_type' );
        $content = array();
        switch ( $cta_content_type ) {

            case 'page':
                $page_id = yuma_theme_option( 'cta_content_page' );
                
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

        if ( in_array( $cta_content_type, array( 'page', 'post' ) ) ) {

            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';

                    // Push to the main array.
                    array_push( $content, $page_post );
                endwhile;
            endif;
            wp_reset_postdata();
        }
            
        if ( ! empty( $content ) )
            $input = $content;
       
        return $input;
    }
endif;
// cta section content details.
add_filter( 'yuma_filter_cta_section_details', 'yuma_get_cta_section_details' );


if ( ! function_exists( 'yuma_render_cta_section' ) ) :
  /**
   * Start cta section
   *
   * @return string cta content
   * @since Yuma 1.0.0
   *
   */
   function yuma_render_cta_section( $content_details = array() ) {
        $readmore = yuma_theme_option( 'cta_btn_label', '' );
        $cta_width = yuma_theme_option( 'cta_width', 'full-width' );
        $enable_cta_parallax  = yuma_theme_option( 'enable_cta_parallax' );

        if ( empty( $content_details ) )
            return;

        foreach ( $content_details as $content ) : ?>
        	<div id="cta-section" class="relative homepage-section align-center <?php echo $enable_cta_parallax ? 'fixed-bg' : ''; ?> <?php echo ( 'container-width' == $cta_width ) ? 'wrapper' : ''; ?>" <?php if ( ! empty( $content['image'] ) ) { echo 'style=" background-image: url( ' . esc_url( $content['image'] ) . ' ) "'; } ?> >
                <div class="overlay"></div>
                <div class="entry-container">
                    <header class="entry-header">
                        <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo yuma_title_allow_span( $content['title'] ); ?></a></h2>
                    </header>
                    <?php if ( ! empty( $readmore ) ) : ?>
                        <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn btn-transparent"><?php echo esc_html( $readmore ); ?></a>
                    <?php endif; ?>
                </div>
            </div><!-- #cta-section -->
        <?php endforeach;
    }
endif;