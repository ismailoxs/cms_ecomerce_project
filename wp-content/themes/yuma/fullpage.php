<?php
/**
 * Template Name: Full Page Template
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
?>

<div class="single-template-wrapper">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				    <div class="entry-container">
						<div class="entry-content">
							<?php
								the_content();

								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'yuma' ),
									'after'  => '</div>',
								) );
							?>
						</div><!-- .entry-content -->

						<?php if ( get_edit_post_link() ) : ?>
							<footer class="entry-footer">
								<?php
									edit_post_link(
										sprintf(
											wp_kses(
												/* translators: %s: Name of current post. Only visible to screen readers */
												__( 'Edit <span class="screen-reader-text">%s</span>', 'yuma' ),
												array(
													'span' => array(
														'class' => array(),
													),
												)
											),
											get_the_title()
										),
										'<span class="edit-link">',
										'</span>'
									);
								?>
							</footer><!-- .entry-footer -->
						<?php endif; ?>
					</div><!-- .entry-container -->
				</article><!-- #post-<?php the_ID(); ?> -->
			<?php endwhile; // End of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
get_footer();
