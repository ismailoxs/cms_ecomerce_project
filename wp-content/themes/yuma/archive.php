<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yuma
 */

get_header(); 
$column = yuma_theme_option( 'column_type', 'column-2' );
$layout = yuma_theme_option( 'archive_layout', 'left-align' );
$masonry = yuma_theme_option( 'enable_blog_masonry' );
$header_image = yuma_theme_option( 'blog_header_image' );
$title_banner = yuma_theme_option( 'enable_blog_title_banner' );
$blog_title_alignment = yuma_theme_option( 'blog_title_alignment', 'left-align' );

if ( in_array( $layout, array( 'image-focus-pro-option', 'image-focus-dark-pro-option', 'image-focus-outline-pro-option', 'image-focus-outline-dark-pro-option' ) ) ) :
	$layout = 'left-align';
endif;

if ( in_array( $column, array( 'column-3-pro-option', 'column-4-pro-option', 'column-5-pro-option' ) ) ) :
	$column = 'column-1';
endif;

if ( $header_image || $title_banner ) : ?>
	<div class="featured-image inner-header-image <?php echo ! $header_image ? 'no-banner-image' : ''; ?>">
		<?php if ( $header_image ) : ?>
			<img src="<?php echo esc_url( $header_image ); ?>" alt="<?php the_archive_title(); ?>">
		<?php endif; 

		if ( $title_banner ) : ?>
			<div class="wrapper <?php echo esc_attr( $blog_title_alignment ); ?>">
				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
						
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
						
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header><!-- .page-header -->
			<?php endif; ?>
			
			<div class="blog-posts-wrapper <?php echo $masonry ? 'grid' : ''; ?> <?php echo esc_attr( $column ) . ' ' . esc_attr( $layout ); ?>">
				<?php
				if ( have_posts() ) : 

					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );

					endwhile;

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
