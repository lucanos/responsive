<?php
/**
 * Home Page
 *
 * Template Name: Home
 *
 * @package Responsive
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<div id="featured" class="grid col-940">

		<div class="grid col-460">

			<?php the_title( '<h1 class="featured-title">', '</h1>' ); ?>
			<?php the_content( __( 'Read more &#8250;', 'responsive' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>

			<?php
			$call_to_action = get_theme_mod( 'homepage_callout' );

			if ( 'yes' == $call_to_action['link_to'] && '' != $call_to_action['url'] )
				printf( '<div class="call-to-action"><a href="%1$s" class="blue button">%2$s</a></div>',
					esc_url( $call_to_action['url'] ),
					esc_html( $call_to_action['text'] )
				);
			?>

		</div><!-- end of .col-460 -->

		<div id="featured-image" class="grid col-460 fit">

			<?php if ( '' != get_the_post_thumbnail( $post->ID ) ) : ?>
				<?php the_post_thumbnail( 'home-feat', array( 'class' => 'aligncenter' ) ); ?>
			<?php endif; ?>

		</div><!-- end of #featured-image -->

		</div><!-- end of #featured -->

	<?php endwhile; ?>

<?php else : ?>

		<?php get_template_part( 'no-results', 'page-home' ); ?>

<?php endif; ?>

<?php get_sidebar( 'home' ); ?>
<?php get_footer(); ?>