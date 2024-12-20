<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package yuma
 */

$class = 'grid-item';
$class .= has_post_thumbnail() ? '' : ' no-post-thumbnail';
$column = yuma_theme_option( 'blog_column_type','column-3' );
$format = get_post_format();
$image = yuma_theme_option( 'archive_image_size', 'medium_large' );
if ( is_home() ) :
	$image = yuma_theme_option( 'blog_image_size', 'medium_large' );
endif;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>
	<div class="post-wrapper">
		<?php if ( has_post_thumbnail() ) : ?>
            <div class="featured-image">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail( $image, array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
                </a>
                <?php if ( $format ) : ?>
	            	<img class="blog-post-format" src="<?php echo esc_url( get_template_directory_uri() ) . '/assets/uploads/' . esc_attr( $format ) . '.png'; ?>">
	            <?php endif; ?>
            </div><!-- .recent-image -->
        <?php endif; ?>
        <div class="entry-container">
			<header class="entry-header">
				<?php if ( 'post' === get_post_type() ) : ?>
					<?php yuma_article_category(); ?>
				<?php
				endif;

				if ( is_singular() ) : ?>
					<h1 class="entry-title"><?php echo yuma_title_allow_span( get_the_title() ); ?></h1>
				<?php else : ?>
					<h2 class="entry-title"><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php echo yuma_title_allow_span( get_the_title() ); ?></a></h2>
				<?php endif; ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
					the_excerpt();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'yuma' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->

			<div class="entry-footer">
                <?php 
                	yuma_posted_on();
                	
                	if ( ( is_home() && yuma_theme_option( 'latest_blog_show_read_time' ) ) || ( ! is_home() && yuma_theme_option( 'show_read_time' ) ) ) {
                		yuma_read_time( get_the_content() ); 
                	}
                ?>
            </div><!-- .entry-meta -->

			
		</div><!-- .entry-container -->
	</div><!-- .post-wrapper -->
</article><!-- #post-<?php the_ID(); ?> -->
