<?php
/**
 * Theme's Functions and Definitions
 *
 * @package Responsive
 */


/**
 * Setup the WordPress core custom header feature.
 */
function responsive_custom_header_setup() {
	$args = array(
		'default-image'          => '',
		'default-text-color'     => '333',
		'width'                  => 300,
		'height'                 => 100,
		'flex-width'             => true,
		'flex-height'            => true,
		'wp-head-callback'       => 'responsive_header_style',
		'admin-head-callback'    => 'responsive_admin_header_style',
		'admin-preview-callback' => 'responsive_admin_header_image',
	);

	$args = apply_filters( 'responsive_custom_header_args', $args );

	if ( function_exists( 'wp_get_theme' ) ) {
		add_theme_support( 'custom-header', $args );
	} else {
		// Compat: Versions of WordPress prior to 3.4.
		define( 'HEADER_TEXTCOLOR', $args['default-text-color'] );
		define( 'HEADER_IMAGE', $args['default-image'] );
		define( 'HEADER_IMAGE_WIDTH', $args['width'] );
		define( 'HEADER_IMAGE_HEIGHT', $args['height'] );
		add_custom_image_header( $args['wp-head-callback'], $args['admin-head-callback'], $args['admin-preview-callback'] );
	}
}
add_action( 'after_setup_theme', 'responsive_custom_header_setup' );

/**
 * Shiv for get_custom_header().
 */
if ( ! function_exists( 'get_custom_header' ) ) {
	function get_custom_header() {
		return (object) array(
			'url'           => get_header_image(),
			'thumbnail_url' => get_header_image(),
			'width'         => HEADER_IMAGE_WIDTH,
			'height'        => HEADER_IMAGE_HEIGHT,
		);
	}
}

if ( ! function_exists( 'responsive_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 */
function responsive_header_style() {

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == get_header_textcolor() )
		return;
	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == get_header_textcolor() ) :
	?>
		.site-title,
		.site-description {
			position: absolute !important;
			clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo get_header_textcolor(); ?> !important;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif;

if ( ! function_exists( 'responsive_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 */
function responsive_admin_header_style() {
?>
	<style type="text/css">
	.appearance_page_custom-header #headimg {
		border: none;
	}
	#headimg h1,
	#desc {
	}
	#headimg h1 {
		font-weight: 700;
	}
	#headimg h1 a {
		text-decoration: none;
	}
	#description {
		color: #afafaf;
		display: block;
		font-size: 0.875em;
		margin: 10px 0;
	}
	#headimg img {
	}
	</style>
<?php
}
endif;

if ( ! function_exists( 'responsive_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 */
function responsive_admin_header_image() { ?>
	<div id="headimg">
		<?php
		if ( 'blank' == get_header_textcolor() || '' == get_header_textcolor() )
			$style = ' style="display:none;"';
		else
			$style = ' style="color:#' . get_header_textcolor() . ';"';
		?>
		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<img src="<?php echo esc_url( $header_image ); ?>" alt="" />
		<?php endif; ?>
			<h1><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<div id="description"><?php bloginfo( 'description' ); ?></div>
	</div>
<?php }
endif;


/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function responsive_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'responsive_page_menu_args' );


/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 */
function responsive_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $sep $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( __( 'Page %s', 'responsive' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'responsive_wp_title', 10, 2 );


/**
 * Sets the post excerpt length to 40 words.
 * Adopted from Coraline
 */
function responsive_excerpt_length($length) {
	return 40;
}

add_filter('excerpt_length', 'responsive_excerpt_length');

/**
 * Returns a "Read more" link for excerpts
 */
function responsive_read_more() {
	return '<div class="read-more"><a href="' . get_permalink() . '">' . __( 'Read more &#8250;', 'responsive' ) . '</a></div><!-- end of .read-more -->';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and responsive_read_more_link().
 */
function responsive_auto_excerpt_more($more) {
	return '<span class="ellipsis">&hellip;</span>' . responsive_read_more();
}

add_filter('excerpt_more', 'responsive_auto_excerpt_more');

/**
 * Adds a pretty "Read more" link to custom post excerpts.
 */
function responsive_custom_excerpt_more($output) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= responsive_read_more();
	}
	return $output;
}

add_filter( 'get_the_excerpt', 'responsive_custom_excerpt_more' );


/**
 * This function prints post meta data.
 *
 * Ulrich Pogson Contribution
 */
if (!function_exists('responsive_post_meta_data')) :
function responsive_post_meta_data() {
	printf( __( '<span class="%1$s">Posted on </span>%2$s<span class="%3$s"> by </span>%4$s', 'responsive' ),
		'meta-prep meta-prep-author posted',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="timestamp">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
			),
		'byline',
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'responsive' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;





/** ---------------------------------- */
/** Need to deal with everything below */
/** ---------------------------------- */

/**
 * Breadcrumb Lists
 * Allows visitors to quickly navigate back to a previous section or the root page.
 *
 * Adopted from Dimox
 *
 */
if ( ! function_exists( 'responsive_breadcrumb_lists' ) ) :
function responsive_breadcrumb_lists() {
	$options = get_theme_mod( 'breadcrumbs' );

	if ( 'no' == $options ) {
		return;
	} else {

		$chevron = '<span class="chevron">&#8250;</span>';
		$home = __('Home','responsive'); // text for the 'Home' link
		$before = '<span class="breadcrumb-current">'; // tag before the current crumb
		$after = '</span>'; // tag after the current crumb

		if ( ! is_home() && ! is_front_page() || is_paged() ) {

			echo '<div class="breadcrumb-list">';

			global $post;
			$homeLink = home_url( '/' );

			echo '<a href="' . esc_url( $homeLink ) . '">' . $home . '</a> ' . $chevron . ' ';

			if ( is_category() ) {
				global $wp_query;

				$cat_obj = $wp_query->get_queried_object();
				$thisCat = $cat_obj->term_id;
				$thisCat = get_category( $thisCat );
				$parentCat = get_category( $thisCat->parent );
				$cat_parents = get_category_parents( $parentCat, TRUE, ' ' . $chevron . ' ' );

				if ( $thisCat->parent != 0 && ! is_wp_error( $cat_parents ) )
					echo $cat_parents;

				echo $before; printf( __( 'Archive for %s', 'responsive' ), single_cat_title('', false) ); $after;

			} elseif ( is_day() ) {

				echo '<a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . get_the_time( 'Y' ) . '</a> ' . $chevron . ' <a href="' . esc_url( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ) . '">' . get_the_time( 'F' ) . '</a> ' . $chevron . ' ' . before . get_the_time( 'd' ) . $after;

			} elseif ( is_month() ) {

				echo '<a href="' . esc_url( get_year_link(get_the_time( 'Y' ) ) ) . '">' . get_the_time( 'Y' ) . '</a> ' . $chevron . ' ' . $before . get_the_time( 'F' ) . $after;

			} elseif ( is_year() ) {

				echo $before . get_the_time( 'Y' ) . $after;

			} elseif ( is_single() && ! is_attachment() ) {

				if ( 'post' != get_post_type() ) {
					$post_type = get_post_type_object( get_post_type() );
					$slug = $post_type->rewrite;
					$post_type_link = $homeLink . '/' . $slug['slug'] . '/';

					echo '<a href="' . esc_url( $post_type_link ) . '">' . $post_type->labels->singular_name . '</a> ' . $chevron . ' ' . $before . get_the_title() . $after;

				} else {

					$cat = get_the_category(); $cat = $cat[0];
					$cat_parents = get_category_parents( $cat, TRUE, ' ' . $chevron . ' ' );

					if ( ! is_wp_error( $cat_parents ) )
						echo $cat_parents . $before . get_the_title() . $after;

				}

			} elseif ( ! is_single() && ! is_page() && get_post_type() != 'post' && ! is_404() ) {

				$post_type = get_post_type_object( get_post_type() );

				echo $before . $post_type->labels->singular_name . $after;

			} elseif ( is_attachment() ) {

				$parent = get_post( $post->post_parent );
				$cat = get_the_category( $parent->ID ); $cat = $cat[0];
				$cat_parents = get_category_parents( $cat, TRUE, ' ' . $chevron . ' ' );

				if ( ! is_wp_error( $cat_parents ) )
					echo $cat_parents . '<a href="' . esc_url( get_permalink($parent) ) . '">' . $parent->post_title . '</a> ' . $chevron . ' ' . $before . get_the_title() . $after;

			} elseif ( is_page() && ! $post->post_parent ) {

				echo $before . get_the_title() . $after;

			} elseif ( is_page() && $post->post_parent ) {

				$parent_id  = $post->post_parent;
				$breadcrumbs = array();

				while ($parent_id) {
					$page = get_page( $parent_id );
					$breadcrumbs[] = '<a href="' . esc_url( get_permalink( $page->ID ) ) . '">' . get_the_title( $page->ID ) . '</a>';
					$parent_id  = $page->post_parent;
				}

				$breadcrumbs = array_reverse( $breadcrumbs );

				foreach ( $breadcrumbs as $crumb )
					echo $crumb . ' ' . $chevron . ' ';

				echo $before . get_the_title() . $after;

			} elseif ( is_search() ) {

				echo $before; printf( __( 'Search results for: %s', 'responsive' ), get_search_query() ); $after;

			} elseif ( is_tag() ) {

				echo $before . printf( __( 'Posts tagged %s', 'responsive' ), single_tag_title('', false) ) . $after;

			} elseif ( is_author() ) {

				global $author;

				$userdata = get_userdata($author);

				echo $before . sprintf( __( 'View all posts by %s', 'responsive' ), $userdata->display_name ) . $after;

			} elseif ( is_404() ) {
				echo $before . __('Error 404 ','responsive') . $after;
			}

			if ( get_query_var('paged') ) {
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() )
					echo ' (';

				echo __('Page','responsive') . ' ' . get_query_var('paged');

				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() )
					echo ')';
			}

			echo '</div>';

		}
	}
}
endif;

/**
 * This function removes .menu class from custom menus
 * in widgets only and fallback's on default widget lists
 * and assigns new unique class called .menu-widget
 *
 * Marko Heijnen Contribution
 *
 */
class responsive_widget_menu_class {
	public function __construct() {
		add_action( 'widget_display_callback', array( $this, 'menu_different_class' ), 10, 2 );
	}

	public function menu_different_class( $settings, $widget ) {
		if( $widget instanceof WP_Nav_Menu_Widget )
			add_filter( 'wp_nav_menu_args', array( $this, 'wp_nav_menu_args' ) );

		return $settings;
	}

	public function wp_nav_menu_args( $args ) {
		remove_filter( 'wp_nav_menu_args', array( $this, 'wp_nav_menu_args' ) );

		if( 'menu' == $args['menu_class'] )
			$args['menu_class'] = 'menu-widget';

		return $args;
	}
}
new responsive_widget_menu_class();

/**
 * Removes div from wp_page_menu() and replace with ul.
 */
function responsive_wp_page_menu ($page_markup) {
	preg_match('/^<div class=\"([a-z0-9-_]+)\">/i', $page_markup, $matches);
		$divclass = $matches[1];
		$replace = array('<div class="'.$divclass.'">', '</div>');
		$new_markup = str_replace($replace, '', $page_markup);
		$new_markup = preg_replace('/^<ul>/i', '<ul class="'.$divclass.'">', $new_markup);
		return $new_markup; }

add_filter('wp_page_menu', 'responsive_wp_page_menu');

/**
 * wp_list_comments() Pings Callback
 *
 * wp_list_comments() Callback function for
 * Pings (Trackbacks/Pingbacks)
 */
function responsive_comment_list_pings( $comment ) {
	$GLOBALS['comment'] = $comment;
?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php }