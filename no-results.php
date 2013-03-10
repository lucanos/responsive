<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * @package Responsive
 */
?>

		<?php if ( ! is_search() ) { ?>
				<h1 class="title-404"><?php _e( 'Nothing Found', 'responsive' ); ?></h1>
		<?php } else { ?>
				<h3 class="title-404"><?php _e( 'Nothing Found', 'responsive' ); ?></h3>
		<?php } ?>

		<p><?php _e( 'Don&#39;t panic, we&#39;ll get through this together. Let&#39;s explore our options here.', 'responsive' ); ?></p>

		<h6><?php
			printf( __( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'responsive' ),
				sprintf( '<a href="%1$s" title="%2$s">%3$s</a>',
					esc_url( home_url( '/' ) ),
					esc_attr__( 'Home', 'responsive' ),
					esc_attr__( '&larr; Home', 'responsive' )
				)
			);
		?></h6>

		<?php get_search_form(); ?>
