<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package yuma
 */

get_header(); 
$image = yuma_theme_option( '404_image' );
$main_title = yuma_theme_option( '404_title' );
$sub_title = yuma_theme_option( '404_sub_title' );
$message = yuma_theme_option( '404_message' );
$enable_404_search = yuma_theme_option( 'enable_404_search' );
?>

<div class="single-template-wrapper wrapper page-section align-center">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<?php if ( $image ) : ?>
					<div class="image-404">
						<img src="<?php echo esc_url( $image ); ?>" alt="<?php esc_attr_e( '404', 'yuma' ); ?>">
					</div>
				<?php endif; ?>
				<h1 class="error-heading"><?php echo esc_html( $main_title ); ?></h1>
				<header class="page-header">
					<h1 class="page-title"><?php echo esc_html( $sub_title ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php echo esc_html( $message ); ?></p>

					<?php if ( $enable_404_search ) :
						get_search_form();
					endif; ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
get_footer();
