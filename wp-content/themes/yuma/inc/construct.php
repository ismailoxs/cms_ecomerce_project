<?php
/**
 * Functions which construct the theme by hooking into WordPress
 *
 * @package yuma
 */


/*------------------------------------------------
            HEADER HOOK
------------------------------------------------*/

if ( ! function_exists( 'yuma_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since Yuma 1.0.0
	 */
	function yuma_doctype() { ?>
		<!DOCTYPE html>
			<html <?php language_attributes(); ?>>
	<?php }
endif;
add_action( 'yuma_doctype_action', 'yuma_doctype', 10 );

if ( ! function_exists( 'yuma_head' ) ) :
	/**
	 * head Codes
	 *
	 * @since Yuma 1.0.0
	 */
	function yuma_head() { ?>
		<head>
			<meta charset="<?php bloginfo( 'charset' ); ?>">
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
			<link rel="profile" href="http://gmpg.org/xfn/11">
			<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
				<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
			<?php endif; ?>
			<?php wp_head(); ?>
		</head>
	<?php }
endif;
add_action( 'yuma_head_action', 'yuma_head', 10 );

if ( ! function_exists( 'yuma_body_start' ) ) :
	/**
	 * Body start codes
	 *
	 * @since Yuma 1.0.0
	 */
	function yuma_body_start() { ?>
		<body <?php body_class(); ?>>
		<?php do_action( 'wp_body_open' ); ?>
	<?php }
endif;
add_action( 'yuma_body_start_action', 'yuma_body_start', 10 );


if ( ! function_exists( 'yuma_page_start' ) ) :
	/**
	 * Page starts html codes
	 *
	 * @since Yuma 1.0.0
	 */
	function yuma_page_start() { ?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'yuma' ); ?></a>
	<?php }
endif;
add_action( 'yuma_page_start_action', 'yuma_page_start', 10 );


if ( ! function_exists( 'yuma_loader' ) ) :
	/**
	 * loader html codes
	 *
	 * @since Yuma 1.0.0
	 */
	function yuma_loader() { 
		if ( ! yuma_theme_option( 'enable_preloader' ) )
			return;
		
		$preloader_layout = yuma_theme_option( 'preloader_layout', 'default' );
		$preloader_icon = yuma_theme_option( 'preloader_icon' );
		?>
		<div id="loader">
            <div class="loader-container">
               	<?php if ( 'default' == $preloader_layout ) : 
               		echo yuma_get_svg( array( 'icon' => esc_attr( $preloader_icon ) ) ); 
           		else : 
           			$preloader_image = yuma_theme_option( 'preloader_image' ); ?>
           			<img src="<?php echo esc_url( $preloader_image ); ?>">
       			<?php endif; ?>
            </div>
        </div><!-- #loader -->
	<?php }
endif;
add_action( 'yuma_page_start_action', 'yuma_loader', 20 );

if ( ! function_exists( 'yuma_header_start' ) ) :
	/**
	 * Header starts html codes
	 *
	 * @since Yuma 1.0.0
	 */
	function yuma_header_start() { 
		$topbar_position_absolute = yuma_theme_option( 'topbar_position_absolute' );
		$header_position_absolute = yuma_theme_option( 'header_position_absolute' );
		$navbar_position_absolute = yuma_theme_option( 'navbar_position_absolute' );

		$class = ( $header_position_absolute && $navbar_position_absolute && $topbar_position_absolute ) ? 'absolute-position' : '';
		?>
		<div class="header-wrapper <?php echo esc_attr( $class ) ?>">
	<?php }
endif;
add_action( 'yuma_header_start_action', 'yuma_header_start', 10 );

if ( ! function_exists( 'yuma_header_navbar_wrapper' ) ) :
	/**
	 * Header starts html codes
	 *
	 * @since Yuma 1.0.0
	 */
	function yuma_header_navbar_wrapper() { 
		$topbar_position_absolute = yuma_theme_option( 'topbar_position_absolute' );
		$header_position_absolute = yuma_theme_option( 'header_position_absolute' );
		$navbar_position_absolute = yuma_theme_option( 'navbar_position_absolute' );
		
		if ( $header_position_absolute && $navbar_position_absolute && ! $topbar_position_absolute ) : ?>
			<div class="header-navbar-wrapper">
		<?php endif; 
	}
endif;
add_action( 'yuma_header_start_action', 'yuma_header_navbar_wrapper', 25 );

if ( ! function_exists( 'yuma_header_navbar_wrapper_ends' ) ) :
	/**
	 * Header starts html codes
	 *
	 * @since Yuma 1.0.0
	 */
	function yuma_header_navbar_wrapper_ends() { 
		$topbar_position_absolute = yuma_theme_option( 'topbar_position_absolute' );
		$header_position_absolute = yuma_theme_option( 'header_position_absolute' );
		$navbar_position_absolute = yuma_theme_option( 'navbar_position_absolute' );
		
		if ( $header_position_absolute && $navbar_position_absolute && ! $topbar_position_absolute ) : ?>
			</div>
		<?php endif; 
	}
endif;
add_action( 'yuma_header_ends_action', 'yuma_header_navbar_wrapper_ends', 10 );

if ( ! function_exists( 'yuma_header_ends' ) ) :
	/**
	 * Header ends codes
	 *
	 * @since Yuma 1.0.0
	 */
	function yuma_header_ends() { ?>
		</div><!-- .header-wrapper -->
	<?php }
endif;
add_action( 'yuma_header_ends_action', 'yuma_header_ends', 20 );


if ( ! function_exists( 'yuma_site_content_start' ) ) :
	/**
	 * Site content start codes
	 *
	 * @since Yuma 1.0.0
	 */
	function yuma_site_content_start() { ?>
		<div id="content" class="site-content">
	<?php }
endif;
add_action( 'yuma_site_content_start_action', 'yuma_site_content_start', 10 );

if ( ! function_exists( 'yuma_off_canvas_area' ) ) :
	/**
	 * off canvas area codes
	 *
	 * @since Yuma 1.0.0
	 */
	function yuma_off_canvas_area() {
		$position = yuma_theme_option( 'off_canvas_position', 'right' ); ?>
		<aside id="off-canvas-area" class="widget-area <?php echo esc_attr( $position ); ?>">
			<div class="off-canvas-wrapper">
				<span class="off-canvas-close"><?php echo yuma_get_svg( array( 'icon' => 'close' ) ) ?></span>
				<?php dynamic_sidebar( 'off-canvas-area' ); ?>
		</div><!-- .off-canvas-wrapper -->
		</aside><!-- #off-canvas-area -->
	<?php }
endif;
add_action( 'yuma_off_canvas_area_action', 'yuma_off_canvas_area', 10 );

/*------------------------------------------------
            FOOTER HOOK
------------------------------------------------*/

if ( ! function_exists( 'yuma_site_content_ends' ) ) :
	/**
	 * Site content ends codes
	 *
	 * @since Yuma 1.0.0
	 */
	function yuma_site_content_ends() { ?>
		</div><!-- #content -->
	<?php }
endif;
add_action( 'yuma_site_content_ends_action', 'yuma_site_content_ends', 10 );


if ( ! function_exists( 'yuma_footer_start' ) ) :
	/**
	 * Footer start codes
	 *
	 * @since Yuma 1.0.0
	 */
	function yuma_footer_start() { ?>
		<footer id="colophon" class="site-footer">
	<?php }
endif;
add_action( 'yuma_footer_start_action', 'yuma_footer_start', 10 );

if ( ! function_exists( 'yuma_footer_widget_container_start' ) ) :
	/**
	 * Footer start codes
	 *
	 * @since Yuma 1.0.0
	 */
	function yuma_footer_widget_container_start() { ?>
		<div class="footer-widget-container">
	<?php }
endif;
add_action( 'yuma_footer_start_action', 'yuma_footer_widget_container_start', 20 );

if ( ! function_exists( 'yuma_footer_widget_container_ends' ) ) :
	/**
	 * Footer start codes
	 *
	 * @since Yuma 1.0.0
	 */
	function yuma_footer_widget_container_ends() { ?>
		</div><!-- .footer-widget-container -->
	<?php }
endif;
add_action( 'yuma_footer_start_action', 'yuma_footer_widget_container_ends', 40 );

if ( ! function_exists( 'yuma_footer_ends' ) ) :
	/**
	 * Footer ends codes
	 *
	 * @since Yuma 1.0.0
	 */
	function yuma_footer_ends() { ?>
		</footer><!-- #colophon -->
	<?php }
endif;
add_action( 'yuma_footer_ends_action', 'yuma_footer_ends', 10 );


if ( ! function_exists( 'yuma_slide_to_top' ) ) :
	/**
	 * Footer ends codes
	 *
	 * @since Yuma 1.0.0
	 */
	function yuma_slide_to_top() { 
		$enable_btt  = yuma_theme_option( 'enable_btt' );
		$btt_label  = yuma_theme_option( 'btt_label' );
		$btt_align  = yuma_theme_option( 'btt_align', 'right' );
		$btt_icon_image  = yuma_theme_option( 'btt_icon_image' );

		if ( ! $enable_btt ) {
			return;
		} ?>
		<div class="backtotop <?php echo esc_attr( $btt_align ); ?>">
			<div class="btt-inner-wrapper clear">
				<div class="btt-second-inner <?php echo ! empty( $btt_icon_image ) ? 'has-btt-image' : ''; ?>">
	            	<?php if ( ! empty( $btt_icon_image ) ) : ?>
	            		<img src="<?php echo esc_url( $btt_icon_image ); ?>" alt="<?php esc_html__( 'Back to Top', 'yuma' ); ?>">
	            	<?php endif; 

	            	if ( ! empty( $btt_label ) ) : ?>
		            	<span><?php echo esc_html( $btt_label ); ?></span>
		            <?php endif; ?>
				</div>
			</div>
        </div><!-- .backtotop -->
	<?php }
endif;
add_action( 'yuma_footer_ends_action', 'yuma_slide_to_top', 20 );

if ( ! function_exists( 'yuma_search_form_model' ) ) :
	/**
	 * search form model
	 *
	 * @since Yuma 1.0.0
	 */
	function yuma_search_form_model() { ?>
		<div id="search" class="model-search"><?php get_search_form(); ?></div>
	<?php }
endif;
add_action( 'yuma_footer_ends_action', 'yuma_search_form_model', 30 );

if ( ! function_exists( 'yuma_page_ends' ) ) :
	/**
	 * Page ends codes
	 *
	 * @since Yuma 1.0.0
	 */
	function yuma_page_ends() { ?>
		</div><!-- #page -->
	<?php }
endif;
add_action( 'yuma_page_ends_action', 'yuma_page_ends', 10 );


if ( ! function_exists( 'yuma_body_html_ends' ) ) :
	/**
	 * Body & Html ends codes
	 *
	 * @since Yuma 1.0.0
	 */
	function yuma_body_html_ends() { ?>
		</body>
		</html>
	<?php }
endif;
add_action( 'yuma_body_html_ends_action', 'yuma_body_html_ends', 10 );

if ( ! function_exists( 'yuma_add_breadcrumb' ) ) :
	/**
	 * Add breadcrumb.
	 *
	 * @since Yuma 1.0.0
	 */
	function yuma_add_breadcrumb() {
		if ( is_archive() || is_search() || is_home() ) :
			$class = yuma_theme_option( 'show_breadcrumb' ) ? '' : 'screen-reader-text';
		elseif ( is_page() ) :
			$class = yuma_theme_option( 'show_page_breadcrumb' ) ? '' : 'screen-reader-text';
		elseif ( is_single() ) :
			$class = yuma_theme_option( 'show_single_breadcrumb' ) ? '' : 'screen-reader-text';
		else :
			$class = 'screen-reader-text';
		endif;
		
		echo '<div id="breadcrumb-list" class="' . esc_attr( $class ) . '">';
		yuma_breadcrumb();
		echo '</div><!-- #breadcrumb-list -->';
		return;
	}
endif;
add_action( 'yuma_breadcrumb_action', 'yuma_add_breadcrumb', 10 );

if ( ! function_exists( 'yuma_related_posts' ) ) :
	/**
	 * three related posts
	 *
	 * @since Yuma 1.0.0
	 */
	function yuma_related_posts( $post_id ) { 
		if ( empty( $post_id ) )
			return;
		$title = yuma_theme_option( 'single_related_posts_title' );
		$category = get_the_category( $post_id );
		$related_category = array();
		
		foreach ( $category as $cat ) {
			array_push( $related_category, $cat->term_id );
		}

		$related_args = array(
            'post_type'         => 'post',
            'posts_per_page'    => 3,
            'cat'               => (array) $related_category,
            'ignore_sticky_posts' => true,
            'post__not_in' 		=> (array) $post_id,
            );

		$related_query = new WP_Query( $related_args );
		?>

		<?php if ( $related_query -> have_posts() ) : ?>
			<div id="related-posts">
				<div class="page-section">
					<?php if ( ! empty( $title ) ) : ?>
						<header class="page-header">
							<h2 class="section-title"><?php echo esc_html( $title ); ?></h2>
						</header>
					<?php endif; ?>

					<div class="section-content column-3">
		                <?php while ( $related_query -> have_posts() ) : $related_query -> the_post(); ?>
							<article class="hentry">
				                <div class="post-wrapper">
				                    <?php if ( has_post_thumbnail() ) : ?>
				                        <div class="featured-image">
				                            <a href="<?php the_permalink(); ?>">
				                                <?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
				                            </a>
				                        </div><!-- .featured-image -->
				                    <?php endif; ?>

				                    <div class="entry-container">
				                    	<div class="entry-meta">
                                            <span class="posted-on">
                                                <a href="<?php the_permalink(); ?>">
                                                    <time>
                                                        <?php echo esc_html( get_the_date( get_option('date_format'), get_the_id() ) ); ?>
                                                    </time>
                                                </a>
                                            </span>
                                        </div>
				                        <header class="entry-header">
				                            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				                        </header>
				                    </div><!-- .entry-container -->
				                </div><!-- .post-wrapper -->
				            </article>
			            <?php endwhile; ?>
	            	</div><!-- .section-content -->
	            </div><!-- .page-section -->
			</div>
        <?php endif;
        wp_reset_postdata();
	}
endif;
