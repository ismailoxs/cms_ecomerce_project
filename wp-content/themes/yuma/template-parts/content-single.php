<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yuma
 */

$show_single_image = yuma_theme_option( 'show_single_image' );
$title_banner = yuma_theme_option( 'enable_single_title_banner' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( ! $title_banner || ! $show_single_image ) : ?>
		<header class="page-header">
			<?php 
				// add breadcrumb 
				do_action( 'yuma_breadcrumb_action' ); 
			?>
			<?php yuma_article_category(); ?>
			<h1 class="page-title"><?php echo yuma_title_allow_span( get_the_title() ); ?></h1>
		</header><!-- .entry-header -->
	<?php endif; ?>
	
    <div class="entry-container">
    	<div class="entry-meta">
			<?php yuma_posted_on(); ?>
		</div><!-- .entry-meta -->
		
		<div class="entry-content">
			<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'yuma' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<div class="entry-footer">
            <?php yuma_entry_footer(); ?>
        </div><!-- .entry-meta -->
	</div><!-- .entry-container -->
</article><!-- #post-<?php the_ID(); ?> -->
