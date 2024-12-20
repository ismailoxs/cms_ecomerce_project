<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yuma
 */

get_header(); 
$header_image = yuma_theme_option( 'blog_header_image' );
if ( is_shop() ) {
    $page_id =  wc_get_page_id('shop');
    $header_image = has_post_thumbnail( $page_id ) ? get_the_post_thumbnail_url( $page_id, 'full' ) : $header_image;
}
$title_banner = yuma_theme_option( 'enable_blog_title_banner' );
$blog_title_alignment = yuma_theme_option( 'blog_title_alignment', 'left-align' );

if ( $header_image || $title_banner ) : ?>
	<div class="featured-image inner-header-image <?php echo ! $header_image ? 'no-banner-image' : ''; ?>">
		<?php if ( $header_image ) : ?>
			<img src="<?php echo esc_url( $header_image ); ?>" alt="<?php woocommerce_page_title(); ?>">
		<?php endif; 

		if ( $title_banner ) : ?>
			<div class="wrapper <?php echo esc_attr( $blog_title_alignment ); ?>">
				<header class="page-header">
                    <h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
					<?php
						// add breadcrumb 
						do_action( 'yuma_breadcrumb_action' );
					?>
				</header><!-- .page-header -->
			</div><!-- .wrapper -->
		<?php endif; ?>
	</div>
<?php endif; ?>

<div class="wrapper page-section">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php if ( ! $title_banner ) : ?>
				<header class="page-header">
					<?php
						// add breadcrumb 
						do_action( 'yuma_breadcrumb_action' );
					?>
                    <h1 class="page-title"><?php woocommerce_page_title(); ?></h1>
				</header><!-- .page-header -->
			<?php endif; ?>
			
			<div class="blog-posts-wrapper">
				<?php
				if ( woocommerce_product_loop() ) :

                    /**
                     * Hook: woocommerce_before_shop_loop.
                     *
                     * @hooked woocommerce_output_all_notices - 10
                     * @hooked woocommerce_result_count - 20
                     * @hooked woocommerce_catalog_ordering - 30
                     */
                    do_action( 'woocommerce_before_shop_loop' );
                
                    woocommerce_product_loop_start();
                
                    if ( wc_get_loop_prop( 'total' ) ) {
                        while ( have_posts() ) {
                            the_post();
                
                            /**
                             * Hook: woocommerce_shop_loop.
                             */
                            do_action( 'woocommerce_shop_loop' );
                
                            wc_get_template_part( 'content', 'product' );
                        }
                    }
                
                    woocommerce_product_loop_end();
                
				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
			</div><!-- #blog-posts-wrapper -->
			<?php  
			/**
			* Hook - yuma_pagination_action.
			*
			* @hooked yuma_pagination 
			*/
			do_action( 'yuma_pagination_action' ); 
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrapper -->
<?php
get_footer();
