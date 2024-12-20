<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package yuma
 */

if( ! function_exists( 'yuma_body_classes' ) ):
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 * @return array
	 */
	function yuma_body_classes( $classes ) {
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		// custom header margin bottom
		$classes[] = yuma_theme_option('enable_featured_categories') ? '' : 'custom-header-no-bottom-margin';

		// off canvas position
		$off_canvas_position = yuma_theme_option( 'off_canvas_position', 'align-right' );
		$classes[] = ( 'align-right' !== $off_canvas_position ) ? 'off-canvas-left' : '';

		// site layout
		$site_layout = yuma_theme_option( 'site_layout' );
		$classes[] = esc_attr( $site_layout );

		// sidebar layout
		$sidebar_layout = yuma_sidebar_layout();
		if ( is_404() )
			$sidebar_layout = 'no-sidebar';
		$classes[] = esc_attr( $sidebar_layout );

		return $classes;
	}
endif;
add_filter( 'body_class', 'yuma_body_classes' );

/**
 * Add customizer defaults.
 */
require get_template_directory() . '/inc/customizer/default.php';

/**
 * Add options.
 */
require get_template_directory() . '/inc/options.php';

if( ! function_exists( 'yuma_theme_option' ) ):
	/**
	 * Merge values from default options array and values from customizer
	 *
	 * @return customizer value
	 */
	function yuma_theme_option( $controler, $default = null ) {
		if ( empty( $controler ) )
			return;

		$yuma_default_options = yuma_get_default_theme_options();
	  	$output = wp_parse_args( get_theme_mod( 'yuma_theme_options' ), $yuma_default_options ) ;

	  	return ! empty( $output[$controler] ) ? $output[$controler] : $default;
	}
endif;

if( ! function_exists( 'yuma_check_enable_status' ) ):
	/**
	 * Check status of content.
	 *
	 * @return boolean
	 */
  	function yuma_check_enable_status( $content_enable = true, $entire_site = false ){
		// Content status.
		$content_status = yuma_theme_option( $content_enable );
		$entire_site 	= yuma_theme_option( $entire_site );

		if ( $content_status && $entire_site ) :
			return true;
		elseif ( $content_status && ! $entire_site ) :
			if ( is_home() )
				return true;
			else
				return false;
		else :
			return false;
		endif;
  	}
endif;
add_filter( 'yuma_section_status', 'yuma_check_enable_status', 10, 2 );

/**
 * Display custom color CSS.
 */
if ( 'custom' == yuma_theme_option( 'theme_color', 'default' ) ) {
    require get_template_directory() . '/inc/colors.php';
}

/**
 * Add custom style hooks.
 */
require get_template_directory() . '/inc/custom-style.php';

/**
 * Add homepage structure hooks.
 */
require get_template_directory() . '/inc/construct.php';

/**
 * Add sanitization functions.
 */
require get_template_directory() . '/inc/sanitize.php';

/**
 * Add template hooks.
 */
require get_template_directory() . '/inc/template-hooks/template-hooks.php';

/**
 * Add metabox.
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Add pattern.
 */
require get_template_directory() . '/inc/block-pattern.php';

/**
 * Add breadcrumb.
 */
require get_template_directory() . '/inc/breadcrumb.php';

if ( ! function_exists( 'yuma_breadcrumb' ) ) :
	/**
	 *  breadcrumb.
	 *
	 * @param  array $args Arguments
	 */
	function yuma_breadcrumb( $args = array() ) {
		/**
		 * Add breadcrumb.
		 *
		 */
		$args = array(
			'show_on_front'   => false,
			'show_title'      => true,
			'show_browse'     => false,
		);
		breadcrumb_trail( $args );      

		return;
	}
endif;

if ( ! function_exists( 'yuma_excerpt_length' ) ) :
	/**
	 * excerpt length
	 * 
	 * @return excerpt length value
	 */
	function yuma_excerpt_length( $length ){
		if ( is_admin() ) {
			return $length;
		}

		$length = yuma_theme_option( 'excerpt_count', 25 );
		return absint( $length );
	}
endif;
add_filter( 'excerpt_length', 'yuma_excerpt_length', 999 );

if ( ! function_exists( 'yuma_pagination' ) ) :
	/**
	 * blog/archive pagination.
	 *
	 * @return pagination type value
	 */
	function yuma_pagination( $pagination_from ) {
		$pagination = $pagination_from ? yuma_theme_option( $pagination_from ) : yuma_theme_option( 'pagination_type' );
		if ( $pagination == 'default' ) :
			the_posts_navigation( array(
				'prev_text' => sprintf( yuma_get_svg( array( 'icon' => 'angle-left' ) ) . ' %1$s', esc_html__( 'Older Posts', 'yuma' ) ),
				'next_text' => sprintf( '%1$s ' . yuma_get_svg( array( 'icon' => 'angle-right' ) ), esc_html__( 'Newer Posts', 'yuma' ) ),
			) );
		elseif ( in_array( $pagination, array( 'infinite', 'numeric', 'click' ) ) ) :
			the_posts_pagination( array(
			    'mid_size' => 4,
			    'prev_text' => yuma_get_svg( array( 'icon' => 'angle-left' ) ),
			    'next_text' => yuma_get_svg( array( 'icon' => 'angle-right' ) ),
			) );
		endif;
	}
endif;
add_action( 'yuma_pagination_action', 'yuma_pagination', 10, 1 );

if ( ! function_exists( 'yuma_sidebar_layout' ) ) :
	/**
	 * sidebar layout
	 * 
	 * @return sidebar layout 
	 */
	function yuma_sidebar_layout(){
		$sidebar = 'sidebar-1';

		if ( is_home() && ! yuma_theme_option( 'latest_blog_sidebar', false ) ) {
			return 'no-sidebar';
		}

		// woocommerce single product
		if ( class_exists('WooCommerce') && is_product() ) {
			return 'no-sidebar-content';
		}

		// elementor single library
		if ( did_action( 'elementor/loaded' ) && is_singular( $post_types = 'elementor_library' ) ) {
			return 'no-sidebar';
		}

		// full page template
		if ( is_page_template( 'fullpage.php' ) ) {
			return 'no-sidebar';
		}

		if ( is_singular() ) {
			$sidebar = get_post_meta( get_the_ID(), 'yuma-selected-sidebar', true );
			$sidebar = ! empty( $sidebar ) ? $sidebar : 'sidebar-1';
		} elseif ( class_exists( 'WooCommerce' ) && ( is_shop() || is_product_category() || is_product_tag() ) ) {
			$sidebar = 'woocommerce-sidebar';
		}

		if ( is_active_sidebar( $sidebar ) ) :

			if ( is_single() ) :
				$post_layout = get_post_meta( get_the_ID(), 'yuma-sidebar-position', true );
				if ( ! empty( $post_layout ) ) {
					return $post_layout;
				} else {
					return yuma_theme_option( 'sidebar_single_layout' );
				}
			elseif ( is_page() ) :
				$page_layout = get_post_meta( get_the_ID(), 'yuma-sidebar-position', true );
				if ( ! empty( $page_layout ) ) {
					return $page_layout;
				} else {
					return yuma_theme_option( 'sidebar_page_layout' );
				}
			else :
				return yuma_theme_option( 'sidebar_layout' );
			endif;

		else :
			
			if ( is_single() ) {
				$page_layout = yuma_theme_option( 'sidebar_single_layout' );
			} elseif ( is_page() ) {
				$page_layout = yuma_theme_option( 'sidebar_page_layout' );
			} else {
				$page_layout = yuma_theme_option( 'sidebar_layout' );
			}

			return in_array( $page_layout, array( 'no-sidebar', 'no-sidebar-full', 'no-sidebar-content' ) ) ? $page_layout  : 'no-sidebar';

		endif;
	}
endif;

/**
 * Add SVG definitions to the footer.
 */
function yuma_include_svg_icons() {
	// Define SVG sprite file.
	$svg_icons = get_template_directory() . '/assets/svg-icons.svg';

	// If it exists, include it.
	if ( file_exists( $svg_icons ) ) {
		require_once( $svg_icons );
	}
}
add_action( 'wp_footer', 'yuma_include_svg_icons', 9999 );

/**
 * Return SVG markup.
 *
 * @param array $args {
 *     Parameters needed to display an SVG.
 *
 *     @type string $icon  Required SVG icon filename.
 *     @type string $title Optional SVG title.
 *     @type string $desc  Optional SVG description.
 * }
 * @return string SVG markup.
 */
function yuma_get_svg( $args = array() ) {
	// Make sure $args are an array.
	if ( empty( $args ) ) {
		return esc_html__( 'Please define default parameters in the form of an array.', 'yuma' );
	}

	// Define an icon.
	if ( false === array_key_exists( 'icon', $args ) ) {
		return esc_html__( 'Please define an SVG icon filename.', 'yuma' );
	}

	// Set defaults.
	$defaults = array(
		'icon'        => '',
		'title'       => '',
		'desc'        => '',
		'class'       => '',
		'fallback'    => false,
	);

	// Parse args.
	$args = wp_parse_args( $args, $defaults );

	// Set aria hidden.
	$aria_hidden = ' aria-hidden="true"';

	// Set ARIA.
	$aria_labelledby = '';

	/*
	 * Shark Themes doesn't use the SVG title or description attributes; non-decorative icons are described with .screen-reader-text.
	 *
	 * However, child themes can use the title and description to add information to non-decorative SVG icons to improve accessibility.
	 *
	 * Example 1 with title: <?php echo yuma_get_svg( array( 'icon' => 'arrow-right', 'title' => __( 'This is the title', 'textdomain' ) ) ); ?>
	 *
	 * Example 2 with title and description: <?php echo yuma_get_svg( array( 'icon' => 'arrow-right', 'title' => __( 'This is the title', 'textdomain' ), 'desc' => __( 'This is the description', 'textdomain' ) ) ); ?>
	 *
	 * See https://www.paciellogroup.com/blog/2013/12/using-aria-enhance-svg-accessibility/.
	 */
	if ( $args['title'] ) {
		$aria_hidden     = '';
		$unique_id       = uniqid();
		$aria_labelledby = ' aria-labelledby="title-' . $unique_id . '"';

		if ( $args['desc'] ) {
			$aria_labelledby = ' aria-labelledby="title-' . $unique_id . ' desc-' . $unique_id . '"';
		}
	}

	// Begin SVG markup.
	$svg = '<svg class="icon icon-' . esc_attr( $args['icon'] ) . ' ' . esc_attr( $args['class'] ) . '"' . $aria_hidden . $aria_labelledby . ' role="img">';

	// Display the title.
	if ( $args['title'] ) {
		$svg .= '<title id="title-' . $unique_id . '">' . esc_html( $args['title'] ) . '</title>';

		// Display the desc only if the title is already set.
		if ( $args['desc'] ) {
			$svg .= '<desc id="desc-' . $unique_id . '">' . esc_html( $args['desc'] ) . '</desc>';
		}
	}

	/*
	 * Display the icon.
	 *
	 * The whitespace around `<use>` is intentional - it is a work around to a keyboard navigation bug in Safari 10.
	 *
	 * See https://core.trac.wordpress.org/ticket/38387.
	 */
	$svg .= ' <use href="#icon-' . esc_attr( $args['icon'] ) . '" xlink:href="#icon-' . esc_attr( $args['icon'] ) . '"></use> ';

	// Add some markup to use as a fallback for browsers that do not support SVGs.
	if ( $args['fallback'] ) {
		$svg .= '<span class="svg-fallback icon-' . esc_attr( $args['icon'] ) . '"></span>';
	}

	$svg .= '</svg>';

	return $svg;
}

/**
 * Add dropdown icon if menu item has children.
 *
 * @param  string $title The menu item's title.
 * @param  object $item  The current menu item.
 * @param  array  $args  An array of wp_nav_menu() arguments.
 * @param  int    $depth Depth of menu item. Used for padding.
 * @return string $title The menu item's title with dropdown icon.
 */
function yuma_dropdown_icon_to_menu_link( $title, $item, $args, $depth ) {
	if ( in_array( $args->theme_location, array( 'primary', 'secondary' ) ) ) {
		foreach ( $item->classes as $value ) {
			if ( 'menu-item-has-children' === $value || 'page_item_has_children' === $value ) {
				$title = $title . yuma_get_svg( array( 'icon' => 'angle-down' ) );
			}
		}
	}

	return $title;
}
add_filter( 'nav_menu_item_title', 'yuma_dropdown_icon_to_menu_link', 10, 4 );

/**
 * Returns an array of supported social links (URL and icon name).
 *
 * @return array $social_links_icons
 */
function yuma_social_links_icons() {
	// Supported social links icons.
	$social_links_icons = array(
		'behance.net'     => 'behance',
		'codepen.io'      => 'codepen',
		'deviantart.com'  => 'deviantart',
		'digg.com'        => 'digg',
		'deezer.com'    => 'deezer',
		'dribbble.com'    => 'dribbble',
		'dropbox.com'     => 'dropbox',
		'facebook.com'    => 'facebook',
		'flickr.com'      => 'flickr',
		'foursquare.com'  => 'foursquare',
		'plus.google.com' => 'google-plus',
		'github.com'      => 'github',
		'instagram.com'   => 'instagram',
		'linkedin.com'    => 'linkedin',
		'mailto:'         => 'envelope-o',
		'medium.com'      => 'medium',
		'pinterest.com'   => 'pinterest-p',
		'getpocket.com'   => 'get-pocket',
		'reddit.com'      => 'reddit-alien',
		'skype.com'       => 'skype',
		'skype:'          => 'skype',
		'slideshare.net'  => 'slideshare',
		'snapchat.com'    => 'snapchat-ghost',
		'soundcloud.com'  => 'soundcloud',
		'spotify.com'     => 'spotify',
		'stumbleupon.com' => 'stumbleupon',
		'tiktok.com'      => 'tiktok',
		'tumblr.com'      => 'tumblr',
		'twitch.tv'       => 'twitch',
		'twitter.com'     => 'twitter',
		'vimeo.com'       => 'vimeo',
		'vine.co'         => 'vine',
		'vk.com'          => 'vk',
		'wordpress.org'   => 'wordpress',
		'wordpress.com'   => 'wordpress',
		'yelp.com'        => 'yelp',
		'youtube.com'     => 'youtube',
	);

	/**
	 * Filter Shark Themes social links icons.
	 *
	 * @since Yuma 1.0.0
	 *
	 * @param array $social_links_icons Array of social links icons.
	 */
	return apply_filters( 'yuma_social_links_icons', $social_links_icons );
}

/**
 * Display SVG icons in social links menu.
 *
 * @param  string  $item_output The menu item output.
 * @param  WP_Post $item        Menu item object.
 * @param  int     $depth       Depth of the menu.
 * @param  array   $args        wp_nav_menu() arguments.
 * @return string  $item_output The menu item output with social icon.
 */
function yuma_nav_menu_social_icons( $item_output, $item, $depth, $args ) {
	// Get supported social icons.
	$social_icons = yuma_social_links_icons();

	// Change SVG icon inside social links menu if there is supported URL.
	if ( 'social' === $args->theme_location ) {
		foreach ( $social_icons as $attr => $value ) {
			if ( false !== strpos( $item_output, $attr ) ) {
				$item_output = str_replace( $args->link_after, '</span>' . yuma_get_svg( array( 'icon' => esc_attr( $value ) ) ), $item_output );
			}
		}
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'yuma_nav_menu_social_icons', 10, 4 );

/**
 * Fallback function call for menu
 * @param  Mixed $args Menu arguments
 * @return String $output Return or echo the add menu link.       
 */
function yuma_menu_fallback_cb( $args ){
    if ( ! current_user_can( 'edit_theme_options' ) ){
	    return;
   	}
    // see wp-includes/nav-menu-template.php for available arguments
    $link = $args['link_before']
        	. '<a href="' .esc_url( admin_url( 'nav-menus.php' ) ) . '">' . $args['before'] . esc_html__( 'Add a menu','yuma' ) . $args['after'] . '</a>'
        	. $args['link_after'];

   	if ( FALSE !== stripos( $args['items_wrap'], '<ul' ) || FALSE !== stripos( $args['items_wrap'], '<ol' )
	){
		$link = "<li>$link</li>";
	}
	$output = sprintf( $args['items_wrap'], $args['menu_id'], $args['menu_class'], $link );
	if ( ! empty ( $args['container'] ) ){
		$output = sprintf( '<%1$s class="%2$s" id="%3$s">%4$s</%1$s>', $args['container'], $args['container_class'], $args['container_id'], $output );
	}
	if ( $args['echo'] ){
		echo $output;
	}
	return $output;
}

/**
 * Display SVG icons as per the link.
 *
 * @param  string   $social_link        Theme mod value rendered
 * @return string  SVG icon HTML
 */
function yuma_return_social_icon( $social_link ) {
	// Get supported social icons.
	$social_icons = yuma_social_links_icons();

	// Check in the URL for the url in the array.
	foreach ( $social_icons as $attr => $value ) {
		if ( false !== strpos( $social_link, $attr ) ) {
			return yuma_get_svg( array( 'icon' => esc_attr( $value ) ) );
		}
	}
}

if ( ! function_exists( 'yuma_trim_content' ) ) :
	/**
	 * custom excerpt function
	 * 
	 * @since Yuma 1.0.0
	 * @return  no of words to display
	 */
	function yuma_trim_content( $length = 30, $post_obj = null ) {
		global $post;
		if ( is_null( $post_obj ) ) {
			$post_obj = $post;
		}

		$length = absint( $length );
		if ( $length < 1 ) {
			$length = 30;
		}

		$source_content = $post_obj->post_content;
		if ( ! empty( $post_obj->post_excerpt ) ) {
			$source_content = $post_obj->post_excerpt;
		}

		$source_content = preg_replace( '`\[[^\]]*\]`', '', $source_content );
		if ( ! empty( $post_obj->post_excerpt ) ) {
			$trimmed_content = $source_content;
		} else {
			$trimmed_content = wp_trim_words( $source_content, $length, '...' );
		}

	   return apply_filters( 'yuma_trim_content', $trimmed_content );
	}
endif;

if ( ! function_exists( 'yuma_check_latest_blog_page_condition' ) ) :
	/**
	 * latest blog page condition function
	 */
	function yuma_check_latest_blog_page_condition() {
		if ( yuma_theme_option( 'enable_latest_blog' ) ) {
			return true;
		} else {
			return false;
		}
	}
endif;

/**
 * Add webfont loader
 */
require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

if ( ! function_exists( 'yuma_custom_fonts' ) ) :
    /**
     * custom google fonts enqueue
     */
    function yuma_custom_fonts( $fonts, $added_fonts ) {
        $fonts = ( array ) $fonts; 
        $added_fonts = ( array ) $added_fonts; 
        $fonts_list = array_merge_recursive($fonts, $added_fonts);
        $fonts_list = str_replace(' ', '+', $fonts_list);
        return $fonts_list;
    }
endif;

if ( ! function_exists( 'yuma_custom_fonts_suffix' ) ) :
    /**
     * add font weight to google fonts enqueue
     */
    function yuma_custom_fonts_suffix( $font ) {
        $font = $font . ':wght@100;200;300;400;500;600;700;800;900'; 
        return $font;
    }
endif;

/**
 * Change the base path.
 * This is by default WP_CONTENT_DIR.
 *
 * NOTE: Do not include trailing slash.
 */
add_filter( 'wptt_get_local_fonts_base_path', function( $path ) {
	return get_template_directory() . '/assets';
} );

/**
 * Change the base URL.
 * This is by default the content_url().
 *
 * NOTE: Do not include trailing slash.
 */
add_filter( 'wptt_get_local_fonts_base_url', function( $url ) {
	return get_template_directory_uri() . '/assets';
} );

/**
 * Change the subfolder name.
 * This is by default "fonts".
 *
 * Return empty string or false to not use a subfolder.
 */
add_filter( 'wptt_get_local_fonts_subfolder_name', function( $subfolder_name ) {
	return 'webfonts';
} );


if ( ! function_exists( 'yuma_fonts_url' ) ) :
	/**
	 * Register Google fonts
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function yuma_fonts_url() {
		$fonts 		= array();
		$subsets   	= 'latin,latin-ext';

	    // body font family
	    $body_font_family = yuma_theme_option('body_font_family');
	    $body_font_family = json_decode( $body_font_family );
        $body_font_family = $body_font_family->font;
        $fonts = yuma_custom_fonts( $fonts, $body_font_family );

	    // heading font family
	    $heading_font_family = yuma_theme_option('heading_font_family');
	    $heading_font_family = json_decode( $heading_font_family );
        $heading_font_family = $heading_font_family->font;
        $fonts = yuma_custom_fonts( $fonts, $heading_font_family );

        // page title, entry title, entry meta
        $theme_typography = theme_typography_list();
        foreach ( $theme_typography as $key => $value ):
        	$font_family = yuma_theme_option( $key . '_font_family' );
        	$font_family = json_decode( $font_family );
        	$font_family = $font_family->font;
	            $fonts = yuma_custom_fonts( $fonts, $font_family );
        endforeach;

	    $fonts = array_unique( $fonts );
	    $fonts = array_map( 'yuma_custom_fonts_suffix', $fonts );
		$fonts = add_query_arg( array(
			'family' => implode( '&family=', $fonts ),
			'display' => 'swap',
		), 'https://fonts.googleapis.com/css2' );

		$fonts = wptt_get_webfont_url( esc_url_raw( $fonts ), 'woff' );
		return $fonts;
	}
endif;


// Load the webfont.
function yuma_fonts_enqueue_assets() {
	wp_enqueue_style( 'yuma-fonts', yuma_fonts_url(), array(), '1.0' );
}
add_action( 'wp_enqueue_scripts', 'yuma_fonts_enqueue_assets' );
