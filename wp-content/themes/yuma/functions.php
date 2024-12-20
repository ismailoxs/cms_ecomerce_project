<?php
/**
 * Yuma functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package yuma
 */

if ( ! function_exists( 'yuma_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function yuma_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Yuma, use a find and replace
		 * to change 'yuma' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'yuma', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 800, 600, true );
		add_image_size( 'yuma-post-thumbnail', 600, 800, true );
		add_image_size( 'yuma-square-thumbnail', 600, 600, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' 	=> esc_html__( 'Primary Menu', 'yuma' ),
			'topbar' 	=> esc_html__( 'Topbar Menu', 'yuma' ),
			'social' 	=> esc_html__( 'Social Menu', 'yuma' ),
			'footer' 	=> esc_html__( 'Footer Menu', 'yuma' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add theme support for page excerpt.
		add_post_type_support( 'page', 'excerpt' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 400,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// Enable support for footer widgets.
		add_theme_support( 'footer-widgets', 4 );

		// Load Footer Widget Support.
		require_if_theme_supports( 'footer-widgets', get_template_directory() . '/inc/footer-widget.php' );

		/* Gutenberg support */
		// Add support for color palette
		add_theme_support( 'editor-color-palette', array(
			array(
	           	'name' => esc_html__( 'Ronchi', 'yuma' ),
	           	'slug' => 'ronchi',
	           	'color' => '#eba54c',
	       	),
	       	array(
	           	'name' => esc_html__( 'Tangaroa', 'yuma' ),
	           	'slug' => 'tangaroa',
	           	'color' => '#0a0e14',
	       	),
	       	array(
	           	'name' => esc_html__( 'Feldspar', 'yuma' ),
	           	'slug' => 'feldspar',
	           	'color' => '#CF987E',
	       	),
	       	array(
	           	'name' => esc_html__( 'Shark', 'yuma' ),
	           	'slug' => 'shark',
	           	'color' => '#272B2F',
	       	),
	       	array(
	           	'name' => esc_html__( 'Emperor', 'yuma' ),
	           	'slug' => 'emperor',
	           	'color' => '#555555',
	       	),
	       	array(
	           	'name' => esc_html__( 'Black', 'yuma' ),
	           	'slug' => 'black',
	           	'color' => '#000000',
	       	),
	       	array(
	           	'name' => esc_html__( 'White', 'yuma' ),
	           	'slug' => 'white',
	           	'color' => '#ffffff',
	       	),
	   	));

		// Add support for font size
		add_theme_support( 'editor-font-sizes', array(
			array(
		       	'name' => esc_html__( 'Extra Small', 'yuma' ),
		       	'shortName' => esc_html__( 'XS', 'yuma' ),
		       	'size' => 12,
		       	'slug' => 'extra-small'
		   	),
		   	array(
		       	'name' => esc_html__( 'Small', 'yuma' ),
		       	'shortName' => esc_html__( 'S', 'yuma' ),
		       	'size' => 16,
		       	'slug' => 'small'
		   	),
		   	array(
		       	'name' => esc_html__( 'Regular', 'yuma' ),
		       	'shortName' => esc_html__( 'M', 'yuma' ),
		       	'size' => 18,
		       	'slug' => 'regular'
		   	),
		   	array(
		       	'name' => esc_html__( 'Large', 'yuma' ),
		       	'shortName' => esc_html__( 'L', 'yuma' ),
		       	'size' => 24,
		       	'slug' => 'large'
		   	),
		   	array(
		       	'name' => esc_html__( 'Extra Large', 'yuma' ),
		       	'shortName' => esc_html__( 'XL', 'yuma' ),
		       	'size' => 40,
		       	'slug' => 'extra-large'
		   	),
		   	array(
				'name' => esc_html__( 'Huge', 'yuma' ),
				'shortName' => esc_html__( 'XXL', 'yuma' ),
				'size' => 96,
				'slug' => 'huge',
			),
		));

		// Add support for gradient background
		add_theme_support(
			'editor-gradient-presets',
			array(
				array(
					'name'     => esc_html__( 'Dark Ocean', 'yuma' ),
					'gradient' => 'linear-gradient(90deg, #373B44 0%, #4286f4 100%)',
					'slug'     => 'dark-ocean',
				),
				array(
					'name'     => esc_html__( 'Yoda', 'yuma' ),
					'gradient' => 'linear-gradient(90deg, #FF0099 0%, #493240 100%)',
					'slug'     => 'yoda',
				),
				array(
					'name'     => esc_html__( 'Amin', 'yuma' ),
					'gradient' => 'linear-gradient(90deg, #8E2DE2 0%, #4A00E0 100%)',
					'slug'     => 'amin',
				),
				array(
					'name'     => esc_html__( 'Harvey', 'yuma' ),
					'gradient' => 'linear-gradient(90deg, #1f4037 0%, #99f2c8 100%)',
					'slug'     => 'harvey',
				),
				array(
					'name'     => esc_html__( 'Flare', 'yuma' ),
					'gradient' => 'linear-gradient(90deg, #f12711 0%, #f5af19 100%)',
					'slug'     => 'flare',
				),
				array(
					'name'     => esc_html__( 'Metapolis', 'yuma' ),
					'gradient' => 'linear-gradient(90deg, #659999 0%, #f4791f 100%)',
					'slug'     => 'metapolis',
				),
				array(
					'name'     => esc_html__( 'Kye Meh', 'yuma' ),
					'gradient' => 'linear-gradient(90deg, #8360c3 0%, #2ebf91 100%)',
					'slug'     => 'kye-meh',
				),
				array(
					'name'     => esc_html__( 'Kyoo Tah', 'yuma' ),
					'gradient' => 'linear-gradient(90deg, #544a7d 0%, #ffd452 100%)',
					'slug'     => 'kyoo-tah',
				),
			)
		);

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

		// Enables custom line height for blocks
		add_theme_support( 'custom-line-height' );

		add_theme_support( 'appearance-tools' );

	}
endif;
add_action( 'after_setup_theme', 'yuma_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function yuma_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'yuma_content_width', 819 );
}
add_action( 'after_setup_theme', 'yuma_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function yuma_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Off Canvas Area', 'yuma' ),
		'id'            => 'off-canvas-area',
		'description'   => esc_html__( 'Add widgets here.', 'yuma' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header Area', 'yuma' ),
		'id'            => 'header-area',
		'description'   => esc_html__( 'Add widgets here.', 'yuma' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'yuma' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'yuma' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Optional Sidebar', 'yuma' ),
		'id'            => 'optional-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'yuma' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'WooCommerce Sidebar', 'yuma' ),
		'id'            => 'woocommerce-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'yuma' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'yuma_widgets_init' );

/**
 * Function to detect SCRIPT_DEBUG on and off.
 * @return string If on, empty else return .min string.
 */
function yuma_min() {
	return defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
}

/**
 * Enqueue scripts and styles.
 */
function yuma_scripts() {

	// slick
	wp_enqueue_style( 'jquery-slick', get_template_directory_uri() . '/assets/css/slick' . yuma_min() . '.css' );

	// slick theme
	wp_enqueue_style( 'jquery-slick-theme', get_template_directory_uri() . '/assets/css/slick-theme' . yuma_min() . '.css' );

	// blocks
	wp_enqueue_style( 'yuma-blocks', get_template_directory_uri() . '/assets/css/blocks' . yuma_min() . '.css' );

	wp_enqueue_style( 'yuma-style', get_stylesheet_uri() );
	wp_style_add_data( 'yuma-style', 'rtl', 'replace' );

	if ( 'dark' == yuma_theme_option( 'theme_color', 'default' ) ) {
		wp_enqueue_style( 'yuma-dark', get_template_directory_uri() . '/assets/css/dark' . yuma_min() . '.css' );
	}

	// Load the html5 shiv.
	wp_enqueue_script( 'yuma-html5', get_template_directory_uri() . '/assets/js/html5' . yuma_min() . '.js', array(), '3.7.3' );
	wp_script_add_data( 'yuma-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'yuma-navigation', get_template_directory_uri() . '/assets/js/navigation' . yuma_min() . '.js', array(), '20151215', true );

	$yuma_l10n = array(
		'quote'          => yuma_get_svg( array( 'icon' => 'quote-right' ) ),
		'expand'         => esc_html__( 'Expand child menu', 'yuma' ),
		'collapse'       => esc_html__( 'Collapse child menu', 'yuma' ),
		'icon'           => yuma_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) ),
	);
	wp_localize_script( 'yuma-navigation', 'yuma_l10n', $yuma_l10n );

	wp_enqueue_script( 'yuma-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix' . yuma_min() . '.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'imagesloaded', '', array( 'jquery' ), '', true );

	wp_enqueue_script( 'jquery-slick', get_template_directory_uri() . '/assets/js/slick' . yuma_min() . '.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'jquery-isotope', get_template_directory_uri() . '/assets/js/isotope' . yuma_min() . '.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'jquery-packery', get_template_directory_uri() . '/assets/js/packery' . yuma_min() . '.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'yuma-custom', get_template_directory_uri() . '/assets/js/custom' . yuma_min() . '.js', array( 'jquery', 'imagesloaded', 'jquery-isotope', 'jquery-packery' ), '', true );

}
add_action( 'wp_enqueue_scripts', 'yuma_scripts' );

/**
 * Enqueue editor styles for Gutenberg
 */
function yuma_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'yuma-block-editor-style', get_theme_file_uri( '/assets/css/editor-blocks' . yuma_min() . '.css' ) );
	// Add custom fonts.
	wp_enqueue_style( 'yuma-fonts', yuma_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'yuma_block_editor_styles' );

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
* TGM plugin additions.
*/
require get_template_directory() . '/inc/tgm-plugin/tgm-hook.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * WooCommerce plugin compatibility.
 */
if ( class_exists( 'WooCommerce' ) ) {
    require get_template_directory() . '/inc/woocommerce.php';
}
