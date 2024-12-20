<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yuma
 */

get_header(); 

$filter = yuma_theme_option( 'filter_blog_posts', 'category' );
$blog_layout = yuma_theme_option( 'blog_layout', 'left-align' );
$cat_filter = yuma_theme_option( 'blog_filter_category', array() );
$tag_filter = yuma_theme_option( 'blog_filter_tag', array() );
$latest_blog_title = yuma_theme_option( 'latest_blog_title', '' );
$masonry = yuma_theme_option( 'enable_latest_blog_masonry' );
$separator = yuma_theme_option( 'enable_blog_before_element' );
$column = yuma_theme_option( 'blog_column_type','column-3' );

if ( in_array( $column, array( 'column-zigzag-pro-option', 'column-horizontal-pro-option', 'column-4-pro-option', 'column-5-pro-option' ) ) ) :
	$column = 'column-1';
endif;

if ( yuma_check_latest_blog_page_condition() ) : ?>

	<div class="wrapper page-section latest-blog">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<?php
				$header_class = '';
				$header_class = empty( $latest_blog_title ) && ! in_array( $filter, array( 'category', 'tag' ) ) ? 'page-header-hide' : '';
				?>
				<header class="page-header <?php echo esc_attr( $header_class ); ?>">
					<?php if ( ! empty( $latest_blog_title ) ) : ?>
							<h1 class="page-title <?php echo $separator ? 'separator' : ''; ?>"><?php echo esc_html( $latest_blog_title ); ?></h1>
					<?php endif; 

					if ( in_array( $filter, array( 'category', 'tag' ) ) ) :  ?>
						<div id="filter-posts">
							<?php if ( 'category' == $filter ) : ?>
								<div class="cat-filter">
									<ul>
										<li class="active"><a href="#" data-filter="*"><?php esc_html_e( 'Show All', 'yuma' ); ?></a></li>
										<?php $categories = get_categories();
										foreach ( $categories as $category_id ) : 
											if ( in_array( $category_id->term_id , $cat_filter ) ) : ?>
												<li><a href="#" data-filter=".<?php echo esc_attr( 'category-' . $category_id->slug ); ?>"><?php echo esc_html( $category_id->name ); ?></a></li>
											<?php endif; 
										endforeach; ?>
									</ul>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</header><!-- .page-header -->

				<div class="blog-posts-wrapper <?php echo $masonry ? 'grid' : ''; ?> <?php echo esc_attr( $blog_layout ); ?> <?php echo esc_attr( $column ); ?>">
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
				do_action( 'yuma_pagination_action', 'blog_pagination_type' ); 
				?>
			</main><!-- #main -->
		</div><!-- #primary -->
		<?php get_sidebar(); ?>
	</div><!-- .wrapper -->

<?php
endif;

get_footer();
