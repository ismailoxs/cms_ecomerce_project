<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yuma
 */

$show_static_page_title = yuma_theme_option( 'show_static_page_title' );
$show_page_image = yuma_theme_option( 'show_page_image' );
$title_banner = yuma_theme_option( 'enable_page_title_banner' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php if ( ( is_front_page() && $show_static_page_title ) || ! is_front_page() ) : ?>
		<?php if ( ! $title_banner || ! $show_page_image ) : ?>
			<header class="page-header">
				<?php 
					// add breadcrumb 
					do_action( 'yuma_breadcrumb_action' ); 
				?>
				<h1 class="page-title"><?php echo yuma_title_allow_span( get_the_title() ); ?></h1>
			</header><!-- .entry-header -->
		<?php endif; ?>
	<?php endif; ?>

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
