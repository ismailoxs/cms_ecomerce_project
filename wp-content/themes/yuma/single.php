<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package yuma
 */

get_header();
$header_image = yuma_theme_option( 'single_header_image' );
$show_single_image = yuma_theme_option( 'show_single_image' );
$show_single_related_posts = yuma_theme_option( 'show_single_related_posts' );
$single_header_image_layout = yuma_theme_option( 'single_header_image_layout', 'banner-featured-image' );
$single_header_image_size = yuma_theme_option( 'single_header_image_size', 'full-width-size' );
$title_banner = yuma_theme_option( 'enable_single_title_banner' );
$single_title_alignment = yuma_theme_option( 'single_title_alignment', 'center-align' );

if ( $show_single_image && ( 'banner-featured-image' == $single_header_image_layout || $title_banner ) ) : ?>
	<div class="featured-image inner-header-image <?php echo esc_attr( $single_header_image_size ); ?> <?php echo esc_attr( $single_header_image_layout ); ?>">
		<?php if ( 'banner-featured-image' == $single_header_image_layout ) : 
			if ( has_post_thumbnail() ) : 
			the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( 'echo=0' ) ) );
		 	elseif ( $header_image ) : ?>
		 		<img src="<?php echo esc_url( $header_image ); ?>" alt="<?php the_title_attribute(); ?>">
	 		<?php endif;
	 	endif;

		if ( $title_banner ) : ?>
			<div class="wrapper <?php echo esc_attr( $single_title_alignment ); ?> <?php echo ( ! has_post_thumbnail() && ! $header_image ) || 'content-featured-image' == $single_header_image_layout ? 'no-banner-image' : ''; ?>">
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
<?php endif; ?>

<div class="single-template-wrapper wrapper page-section">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( $show_single_image && ( 'content-featured-image' == $single_header_image_layout ) ) :
			if ( has_post_thumbnail() ) : ?>
				<div class="featured-image inner-header-image <?php echo esc_attr( $single_header_image_size ); ?>">
					<?php the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
				</div>
			<?php elseif ( $header_image ) : ?>
				<div class="featured-image inner-header-image <?php echo esc_attr( $single_header_image_size ); ?>">
					<img src="<?php echo esc_url( $header_image ); ?>" alt="<?php single_post_title(); ?>">
				</div>
			<?php endif; 
		endif;

		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );

			if ( yuma_theme_option( 'show_single_pagination' ) ) :
				the_post_navigation( array(
					'prev_text' => sprintf( yuma_get_svg( array( 'icon' => 'angle-left' ) ) . ' %1$s <span> %2$s </span>', esc_html__( 'Previous', 'yuma' ), '%title' ),
					'next_text' => sprintf( '%1$s ' . yuma_get_svg( array( 'icon' => 'angle-right' ) ) . ' <span> %2$s </span>', esc_html__( 'Next', 'yuma' ), '%title' ),
				) );
			endif;

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

			if ( $show_single_related_posts ) :
				yuma_related_posts( get_the_id() );
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div>
<?php
get_footer();
