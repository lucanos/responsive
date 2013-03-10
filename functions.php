<?php
/**
 * Responsive functions and definitions
 *
 * @package Responsive
 */

/**
 * Set content width
 */
if ( ! isset( $content_width ) )
		$content_width = 605;

/**
 * Adjust the content width for Full Width page template.
 */
function responsive_set_content_width() {
	global $content_width;

	if ( is_page_template( 'page-full-width.php' ) )
		$content_width = 918;
}
add_action( 'template_redirect', 'responsive_set_content_width' );

if ( ! function_exists( 'responsive_setup' ) ):
function responsive_setup() {
	/**
	 * Responsive is now available for translations.
	 * Add your files into /languages/ directory.
	 * @see http://codex.wordpress.org/Function_Reference/load_theme_textdomain
	 */
	load_theme_textdomain( 'responsive', get_template_directory() . '/languages' );

	/**
	 * Add callback for custom TinyMCE editor stylesheets. (editor-style.css)
	 * @see http://codex.wordpress.org/Function_Reference/add_editor_style
	 */
	add_editor_style();

	/**
	 * This feature enables post and comment RSS feed links to head.
	 * @see http://codex.wordpress.org/Function_Reference/add_theme_support#Feed_Links
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * This feature enables post-thumbnail support for a theme.
	 * @see http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'home-feat', 440, 300, true );

	/**
	 * This feature enables custom-menus support for a theme.
	 * @see http://codex.wordpress.org/Function_Reference/register_nav_menus
	 */
	register_nav_menus( array(
		'top-menu'    => __( 'Top Menu', 'responsive' ),
		'primary'     => __( 'Primary Menu', 'responsive' ),
		'secondary'   => __( 'Secondary Menu', 'responsive'),
		'footer-menu' => __( 'Footer Menu', 'responsive' )
	) );
}
endif;
add_action( 'after_setup_theme', 'responsive_setup' );

/**
 * Setup the WordPress core custom background feature.
 */
function responsive_register_custom_background() {
	$args = array(
		'default-color' => 'efefef',
		'default-image' => '',
	);

	$args = apply_filters( 'responsive_custom_background_args', $args );

	if ( function_exists( 'wp_get_theme' ) ) {
		add_theme_support( 'custom-background', $args );
	} else {
		define( 'BACKGROUND_COLOR', $args['default-color'] );
		if ( ! empty( $args['default-image'] ) )
			define( 'BACKGROUND_IMAGE', $args['default-image'] );
		add_custom_background();
	}
}
add_action( 'after_setup_theme', 'responsive_register_custom_background' );

/**
 * Enqueue scripts and styles
 */
function responsive_scripts() {
	wp_enqueue_style( 'responsive-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'responsive-modernizr', get_template_directory_uri() . '/js/responsive-modernizr.js', array( 'jquery' ), '2.6.1', false );
	wp_enqueue_script( 'responsive-scripts', get_template_directory_uri() . '/js/responsive-scripts.js', array( 'jquery' ), '1.2.3', true );

	wp_enqueue_script( 'responsive-small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );
}
add_action( 'wp_enqueue_scripts', 'responsive_scripts' );


/**
 * WordPress Widgets start right here.
 */
function responsive_widgets_init() {
	register_sidebar( array(
		'name'			=> __( 'Main Sidebar', 'responsive' ),
		'description'	=> __( 'Main sidebar', 'responsive' ),
		'id'			=> 'sidebar-1',
		'before_title'	=> '<div class="widget-title">',
		'after_title'	=> '</div>',
		'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
		'after_widget'	=> '</div>'
	) );

	register_sidebar( array(
		'name'			=> __( 'Left Home', 'responsive' ),
		'description'	=> __( 'Bottom-left home widget area', 'responsive' ),
		'id'			=> 'sidebar-2',
		'before_title'	=> '<div id="widget-title-one" class="widget-title-home"><h3>',
		'after_title'	=> '</h3></div>',
		'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
		'after_widget'	=> '</div>'
	) );

	register_sidebar( array(
		'name'			=> __( 'Middle Home', 'responsive' ),
		'description'	=> __( 'Bottom-middle home widget area', 'responsive' ),
		'id'			=> 'sidebar-3',
		'before_title'	=> '<div id="widget-title-two" class="widget-title-home"><h3>',
		'after_title'	=> '</h3></div>',
		'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
		'after_widget'	=> '</div>'
	) );

	register_sidebar( array(
		'name'			=> __( 'Right Home', 'responsive' ),
		'description'	=> __( 'Bottom-right home widget area', 'responsive' ),
		'id'			=> 'sidebar-4',
		'before_title'	=> '<div id="widget-title-three" class="widget-title-home"><h3>',
		'after_title'	=> '</h3></div>',
		'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
		'after_widget'	=> '</div>'
	) );

	register_sidebar( array(
		'name'			=> __( 'Gallery', 'responsive' ),
		'description'	=> __( 'Widget area on single image page', 'responsive' ),
		'id'			=> 'sidebar-5',
		'before_title'	=> '<div class="widget-title">',
		'after_title'	=> '</div>',
		'before_widget' => '<div id="%1$s" class="widget-wrapper %2$s">',
		'after_widget'	=> '</div>'
	) );

	register_sidebar( array(
		'name'			=> __( 'Footer', 'responsive' ),
		'description'	=> __( 'Widget area in footer', 'responsive' ),
		'id'			=> 'sidebar-6',
		'before_title'	=> '<div class="widget-title">',
		'after_title'	=> '</div>',
		'before_widget' => '<div id="%1$s" class="colophon-widget widget-wrapper %2$s">',
		'after_widget'	=> '</div>'
	) );

	register_sidebar( array(
		'name'			=> __( 'Top', 'responsive' ),
		'description'	=> __( 'Widget area above main navigation', 'responsive' ),
		'id'			=> 'sidebar-7',
		'before_title'	=> '<div class="widget-title">',
		'after_title'	=> '</div>',
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget'	=> '</div>'
	) );
}
add_action('widgets_init', 'responsive_widgets_init');



/**
 *
 * Load additional functions and theme options
 *
 */
require ( get_template_directory() . '/includes/functions.php' );
require ( get_template_directory() . '/includes/theme-options.php' );
require ( get_template_directory() . '/includes/jetpack.compat.php' );