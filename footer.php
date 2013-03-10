<?php
/**
 * Footer Template
 *
 * @package Responsive
 */
?>

	</div><!-- end of #wrapper -->

</div><!-- end of #container -->

<div id="footer" class="clearfix">

	<div id="footer-wrapper">

		<div class="grid col-940">

		<div class="grid col-540">
		<?php
		if (has_nav_menu('footer-menu', 'responsive')) {
			wp_nav_menu(array(
				'container'		  => '',
				'fallback_cb'    => false,
				'menu_class'     => 'footer-menu',
				'theme_location' => 'footer-menu'
			) );
		}
		?>
		</div><!-- end of col-540 -->

		<?php
		$options = get_theme_mod( 'responsive_social_links' );

		// Social icons
		if ( array_filter( $options ) ) :
		?>

		<div class="grid col-380 fit">
			<ul class="social-icons">

				<?php
				if ( ! empty( $options['twitter'] ) )
					echo '<li class="twitter-icon"><a href="' . esc_url( $options['twitter'] ) . '"><img src="' . get_stylesheet_directory_uri() . '/icons/twitter-icon.png" width="24" height="24" alt="Twitter"></a></li>';

				if ( ! empty( $options['facebook'] ) )
					echo '<li class="facebook-icon"><a href="' . esc_url( $options['facebook'] ) . '"><img src="' . get_stylesheet_directory_uri() . '/icons/facebook-icon.png" width="24" height="24" alt="Facebook"></a></li>';

				if ( ! empty( $options['linkedin'] ) )
					echo '<li class="linkedin-icon"><a href="' . esc_url( $options['linkedin'] ) . '"><img src="' . get_stylesheet_directory_uri() . '/icons/linkedin-icon.png" width="24" height="24" alt="LinkedIn"></a></li>';

				if ( ! empty( $options['youtube'] ) )
					echo '<li class="youtube-icon"><a href="' . esc_url( $options['youtube'] ) . '"><img src="' . get_stylesheet_directory_uri() . '/icons/youtube-icon.png" width="24" height="24" alt="YouTube"></a></li>';

				if ( ! empty( $options['stumbleupon'] ) )
					echo '<li class="stumble-upon-icon"><a href="' . esc_url( $options['stumble'] ) . '"><img src="' . get_stylesheet_directory_uri() . '/icons/stumble-upon-icon.png" width="24" height="24" alt="StumbleUpon"></a></li>';

				if ( ! empty( $options['google_plus'] ) )
					echo '<li class="google-plus-icon"><a href="' . esc_url( $options['google_plus'] ) . '"><img src="' . get_stylesheet_directory_uri() . '/icons/googleplus-icon.png" width="24" height="24" alt="Google Plus">' . '</a></li>';

				if ( ! empty( $options['instagram'] ) )
					echo '<li class="instagram-icon"><a href="' . esc_url( $options['instagram'] ) . '"><img src="' . get_stylesheet_directory_uri() . '/icons/instagram-icon.png" width="24" height="24" alt="Instagram"></a></li>';

				if ( ! empty( $options['pinterest'] ) )
					echo '<li class="pinterest-icon"><a href="' . esc_url( $options['pinterest'] ) . '"><img src="' . get_stylesheet_directory_uri() . '/icons/pinterest-icon.png" width="24" height="24" alt="Pinterest"></a></li>';

				if ( ! empty( $options['yelp'] ) )
					echo '<li class="yelp-icon"><a href="' . esc_url( $options['yelp'] ) . '"><img src="' . get_stylesheet_directory_uri() . '/icons/yelp-icon.png" width="24" height="24" alt="Yelp!"></a></li>';

				if ( ! empty( $options['vimeo'] ) )
					echo '<li class="vimeo-icon"><a href="' . esc_url( $options['vimeo'] ) . '"><img src="' . get_stylesheet_directory_uri() . '/icons/vimeo-icon.png" width="24" height="24" alt="Vimeo"></a></li>';

				if ( ! empty( $options['foursquare'] ) )
					echo '<li class="foursquare-icon"><a href="' . esc_url( $options['foursquare'] ) . '"><img src="' . get_stylesheet_directory_uri() . '/icons/foursquare-icon.png" width="24" height="24" alt="foursquare"></a></li>';
				?>

			</ul><!-- end of .social-icons -->
		</div><!-- end of col-380 fit -->
		<?php endif; ?>

		</div><!-- end of col-940 -->
		<?php get_sidebar( 'colophon' ); ?>

		<div class="grid col-300 copyright">
			<?php esc_attr_e( '&copy;', 'responsive' ); ?> <?php _e( date( 'Y' ) ); ?> <a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo ( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
		</div><!-- end of .copyright -->

		<div class="grid col-300 scroll-top"><a href="#scroll-top" title="<?php esc_attr_e( 'scroll to top', 'responsive' ); ?>"><?php _e( '&uarr;', 'responsive' ); ?></a></div>

		<div class="grid col-300 fit powered">
			<?php do_action( 'responsive_credits' ); ?>
			<a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'responsive' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'responsive' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'responsive' ), 'Responsive', '<a href="http://themeid.com/responsive-theme/" rel="designer">ThemeID</a>' ); ?>
		</div><!-- end .powered -->

	</div><!-- end #footer-wrapper -->

</div><!-- end #footer -->

<?php wp_footer(); ?>
</body>
</html>