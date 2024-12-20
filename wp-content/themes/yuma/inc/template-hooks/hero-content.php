<?php
/**
 * Hero Content hook
 *
 * @package yuma
 */

if ( ! function_exists( 'yuma_add_hero_content_section' ) ) :
    /**
    * Add hero_content section
    *
    *@since Yuma 1.0.0
    */
    function yuma_add_hero_content_section() {

        // Check if hero_content is enabled on frontpage
        $hero_content_enable = apply_filters( 'yuma_section_status', 'enable_hero_content', '' );

        if ( ! $hero_content_enable )
            return false;

        // Get hero_content section details
        $section_details = array();
        $section_details = apply_filters( 'yuma_filter_hero_content_section_details', $section_details );

        if ( empty( $section_details ) ) 
            return;

        // Render hero_content section now.
        yuma_render_hero_content_section( $section_details );
    }
endif;
add_action( 'yuma_primary_content_action', 'yuma_add_hero_content_section', 50 );


if ( ! function_exists( 'yuma_get_hero_content_section_details' ) ) :
    /**
    * hero_content section details.
    *
    * @since Yuma 1.0.0
    * @param array $input hero_content section details.
    */
    function yuma_get_hero_content_section_details( $input ) {

        // Content type.
        $hero_content_content_type  = yuma_theme_option( 'hero_content_content_type' );
        $content = array();
        switch ( $hero_content_content_type ) {

            case 'page':
                $page_id = yuma_theme_option( 'hero_content_content_page' );
                
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
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';

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
// hero_content section content details.
add_filter( 'yuma_filter_hero_content_section_details', 'yuma_get_hero_content_section_details' );


if ( ! function_exists( 'yuma_render_hero_content_section' ) ) :
    /**
    * Start hero_content section
    *
    * @return string hero_content content
    * @since Yuma 1.0.0
    *
    */
    function yuma_render_hero_content_section( $content_details = array() ) {
        $sub_title  = yuma_theme_option( 'hero_content_sub_title' );
        $hero_content_alignment  = yuma_theme_option( 'hero_content_alignment','align-center' );
        $hero_content_color  = yuma_theme_option( 'hero_content_color','light' );
        $hero_content_width  = yuma_theme_option( 'hero_content_width','container' );
        $enable_hero_parallax  = yuma_theme_option( 'enable_hero_content_parallax' );
        if ( empty( $content_details ) )
            return;

        foreach ( $content_details as $content ) : ?>
        	<div id="hero-content-section" class="hero-content relative homepage-section <?php echo esc_attr( $hero_content_color ); ?> <?php echo $enable_hero_parallax ? 'fixed-bg' : ''; ?> <?php echo ( 'container' == $hero_content_width ) ? 'wrapper' : ''; ?> <?php echo esc_attr( $hero_content_alignment ); ?>" <?php if ( ! empty( $content['image'] ) ) { echo 'style="background-image: url(' . esc_url( $content['image'] ) . ')"'; } ?>>
                <div class="wrapper">
                    <div class="entry-container">
                        <header class="entry-header">
                            <h5><?php echo esc_html( $sub_title ); ?></h5>
                            <h2 class="entry-title">
                                <a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo yuma_title_allow_span( $content['title'] ); ?></a>
                            </h2>
                        </header>
                    </div><!-- .entry-container -->
                </div><!-- .wrapper -->
            </div><!-- #hero_content-section -->
        <?php endforeach;
    }
endif;