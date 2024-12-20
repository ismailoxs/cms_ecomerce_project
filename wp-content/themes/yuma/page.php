<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yuma
 */

get_header();
$header_image = yuma_theme_option( 'page_header_image' );
$show_page_image = yuma_theme_option( 'show_page_image' );
$show_static_page_image = yuma_theme_option( 'show_static_page_image' );
$page_header_image_layout = yuma_theme_option( 'page_header_image_layout', 'banner-featured-image' );
$page_header_image_size = yuma_theme_option( 'page_header_image_size', 'full-width-size' );
$title_banner = yuma_theme_option( 'enable_page_title_banner' );
$page_title_alignment = yuma_theme_option( 'page_title_alignment', 'center-align' );

if ( $show_page_image && ( 'banner-featured-image' == $page_header_image_layout || $title_banner ) ) :
	if ( ( is_front_page() && $show_static_page_image ) || ! is_front_page() ) : ?>
		<div class="featured-image inner-header-image <?php echo esc_attr( $page_header_image_size ); ?> <?php echo esc_attr( $page_header_image_layout ); ?>">
			<?php if ( 'banner-featured-image' == $page_header_image_layout ) : 
				if ( has_post_thumbnail() ) : 
				the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( 'echo=0' ) ) );
			 	elseif ( $header_image ) : ?>
			 		<img src="<?php echo esc_url( $header_image ); ?>" alt="<?php the_title_attribute(); ?>">
		 		<?php endif;
		 	endif;

			if ( $title_banner ) : ?>
				<div class="wrapper <?php echo esc_attr( $page_title_alignment ); ?> <?php echo ( ! has_post_thumbnail() && ! $header_image ) || 'content-featured-image' == $page_header_image_layout ? 'no-banner-image' : ''; ?>">
					<header class="page-header">
						<?php yuma_article_category(); ?>
						<h1 class="page-title"><?php echo yuma_title_allow_span( get_the_title() ); ?></h1>
						<?php
							// add breadcrumb 
							do_action( 'yuma_breadcrumb_action' );
						?>
					</header><!-- .page-header -->
				</div><!-- .wrapper -->
			<?php endif; ?>
		</div>
	<?php endif; 
endif; ?>

<div class="single-template-wrapper wrapper page-section">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			if ( $show_page_image && ( 'content-featured-image' == $page_header_image_layout ) ) :
				if ( has_post_thumbnail() ) : ?>
					<div class="featured-image inner-header-image <?php echo esc_attr( $page_header_image_size ); ?>">
						<?php the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
					</div>
				<?php elseif ( $header_image ) : ?>
					<div class="featured-image inner-header-image <?php echo esc_attr( $page_header_image_size ); ?>">
						<img src="<?php echo esc_url( $header_image ); ?>" alt="<?php single_post_title(); ?>">
					</div>
				<?php endif; 
			endif;

			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div>
<?php
get_footer();
