<?php
/**
 * tsumugi functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package tsumugi
 */

if ( ! function_exists( 'tsumugi_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tsumugi_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on tsumugi, use a find and replace
	 * to change 'tsumugi' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'tsumugi', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'tsumugi' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	// add_theme_support( 'post-formats', array(
	// 	'aside',
	// 	'image',
	// 	'video',
	// 	'quote',
	// 	'link',
	// ) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'tsumugi_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	add_theme_support( 'custom-logo', array(
		'height'      => 190,
		'width'       => 190,
		'flex-height' => true,
		'flex-width'  => true,
	) );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets' => array(
			'sidebar-1' => array(
				'search',
				'text_about',
				'recent-posts',
				'recent-comments',
				'archives',
				'categories',
				'meta',
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts' => array(
			'home',
			'about',
			'contact',
			'blog',
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'logo' => array(
				'post_title' => _x( 'Logo', 'Theme starter content', 'tsumugi' ),
				'file' => 'img/tsumugi-logo.png', // URL relative to the template directory.
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods' => array(
			'custom_logo' => '{{logo}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "top" location.
			'primary' => array(
				'name' => __( 'Main Menu', 'tsumugi' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),
		),
	);

	/**
	 * Filters array of starter content.
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'tsumugi_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}
endif;
add_action( 'after_setup_theme', 'tsumugi_setup' );

// Add theme support for selective refresh for widgets.
add_theme_support( 'customize-selective-refresh-widgets' );

add_editor_style( array( 'bootstrap/bootstrap.min.css', 'bootstrap/tsumugi.css', 'editor-style.css'  ) );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tsumugi_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tsumugi_content_width', 640 );
}
add_action( 'after_setup_theme', 'tsumugi_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tsumugi_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'tsumugi' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'tsumugi_widgets_init' );

if ( ! function_exists( 'tsumugi_fonts_url' ) ) :
/**
 * Register Google fonts for tsumugi.
 *
 * Create your own tsumugi_fonts_url() function to override in a child theme.
 */
function tsumugi_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';
	/* translators: If there are characters in your language that are not supported by Annie Use Your Telescope, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Annie Use Your Telescope font: on or off', 'tsumugi' ) ) {
		$fonts[] = 'Annie Use Your Telescope';
	}
	/* translators: If there are characters in your language that are not supported by Source Sans Pro, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Source Sans Pro font: on or off', 'tsumugi' ) ) {
		$fonts[] = 'Source Sans Pro:300';
	}
	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}
	return $fonts_url;
}
endif;

/**
 * Enqueue scripts and styles.
 */
function tsumugi_scripts() {
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/bootstrap/bootstrap.min.css', array(), '4.0.0', 'all' );
	wp_enqueue_style( 'tsumugi-style', get_template_directory_uri() . '/bootstrap/tsumugi.css', array('bootstrap-style'), '2.1.1', 'all' );
	wp_enqueue_style( 'underscores-style', get_stylesheet_uri(), array('tsumugi-style'), '2.1.1', 'all' );

	wp_enqueue_style( 'tsumugi-fonts', tsumugi_fonts_url(), array(), null );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css', array(), '4.6.3', 'all' );

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array('jquery'), '4.0.0', true );

	wp_enqueue_script( 'tsumugi-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'tsumugi-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tsumugi_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
