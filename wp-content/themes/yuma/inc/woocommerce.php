<?php
/**
 * woocommerce functions and definitions
 *
 * @package yuma
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function yuma_woocommerce_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'yuma_woocommerce_setup' );

if ( ! function_exists( 'yuma_woocommerce_product_featured_image' ) ) {
	/**
	 * Product columns wrapper.
	 *
	 * @return  void
	 */
	function yuma_woocommerce_product_featured_image() {
		$header_image = yuma_theme_option( 'page_header_image' );
		$show_page_image = yuma_theme_option( 'show_page_image' );
		$shop_page = get_option( 'woocommerce_shop_page_id' );
		$header_position_absolute = yuma_theme_option( 'header_position_absolute' );

		if ( is_product() && ! $header_position_absolute ) {
			return;
		}

		if ( $show_page_image ) :
			if ( has_post_thumbnail( $shop_page ) ) : ?>
				<div class="featured-image inner-header-image">
					<?php $image = get_the_post_thumbnail_url( $shop_page, 'full' ); ?>
					<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( get_the_title( $shop_page ) ); ?>">
				</div>
			<?php elseif ( $header_image ) : ?>
				<div class="featured-image inner-header-image">
					<img src="<?php echo esc_url( $header_image ); ?>" alt="<?php single_post_title(); ?>">
				</div>
			<?php endif;
		endif;
	}
}
add_action( 'woocommerce_before_main_content', 'yuma_woocommerce_product_featured_image', 5 );

if ( ! function_exists( 'yuma_woocommerce_product_columns_wrapper' ) ) {
	/**
	 * Product columns wrapper.
	 *
	 * @return  void
	 */
	function yuma_woocommerce_product_columns_wrapper() {
		if ( is_product() ) {
			echo '<div class="single-template-wrapper wrapper page-section">';
		} else {
			echo '<div class="wrapper page-section">';
		}
	}
}
add_action( 'woocommerce_before_main_content', 'yuma_woocommerce_product_columns_wrapper', 6 );

if ( ! function_exists( 'yuma_woocommerce_product_columns_wrapper_close' ) ) {
	/**
	 * Product columns wrapper close.
	 *
	 * @return  void
	 */
	function yuma_woocommerce_product_columns_wrapper_close() {
		echo '</div>';
	}
}
add_action( 'woocommerce_sidebar', 'yuma_woocommerce_product_columns_wrapper_close', 20 );

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

if ( ! function_exists( 'yuma_woocommerce_hide_page_title' ) ) {
	/**
	 * Product columns wrapper close.
	 *
	 * @return  void
	 */
	function yuma_woocommerce_hide_page_title() {
		return true;
	}
}
add_filter( 'woocommerce_show_page_title', 'yuma_woocommerce_hide_page_title' );

// Change number or products per row to 3
add_filter('loop_shop_columns', 'yuma_loop_columns');

if ( ! function_exists( 'yuma_loop_columns' ) ) {
	function yuma_loop_columns() {
		$sidebar_layout = yuma_sidebar_layout();
		return ( in_array( $sidebar_layout, array( 'no-sidebar', 'no-sidebar-full' ) ) ) ? 5 : 3; // 3 products per row
	}
}

/**
 * Add theme pagination
 */
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
add_action( 'woocommerce_after_shop_loop', 'yuma_woocommerce_pagination', 10 );
if ( ! function_exists( 'yuma_woocommerce_pagination' ) ) {
	function yuma_woocommerce_pagination() {
		/**
		* Hook - yuma_pagination_action.
		*
		* @hooked yuma_pagination 
		*/
		do_action( 'yuma_pagination_action' ); 
	}
}

add_filter( 'get_product_search_form', 'yuma_product_search' );
if ( ! function_exists( 'yuma_product_search' ) ) { 
	function yuma_product_search() { ?>
		<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"><?php esc_html_e( 'Search for:', 'yuma' ); ?></label>
			<input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field" placeholder="<?php echo esc_attr__( 'Search products&hellip;', 'yuma' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
			<input type="hidden" name="post_type" value="product" />
			<button type="submit" class="search-submit"><?php echo yuma_get_svg( array( 'icon' => 'search' ) ); ?><span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', 'yuma' ); ?></span></button>
		</form>
	<?php }
}

/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', 'yuma_loop_shop_per_page', 20 );
function yuma_loop_shop_per_page( $cols ) {
  	// $cols contains the current number of products per page based on the value stored on Options –> Reading
  	// Return the number of products you wanna show per page.
	$posts_count = get_option( 'posts_per_page' );
  	$cols = $posts_count;
  	return $cols;
}

/**
 * Change single product description title
 */
add_filter( 'woocommerce_product_description_heading', 'yuma_product_description_heading', 10 );
function yuma_product_description_heading() {
  	return false;
}

/**
* Change number of related products on product page
*/ 
function yuma_related_products_args( $args ) {
	$args['posts_per_page'] = 3; // 3 related products
	$args['columns'] = 3; // arranged in 3 columns
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'yuma_related_products_args' );
