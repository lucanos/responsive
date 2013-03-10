<?php
/**
 * Landing Page Template
 *
 * Template Name: Landing Page (no menu)
 *
 * @package Responsive
 */

get_header(); ?>

		<div id="content-full" class="grid col-940">

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1 class="post-title"><?php the_title(); ?></h1>

				<div class="post-entry">
					<?php the_content( __( 'Read more &#8250;', 'responsive' ) ); ?>
					<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
				</div><!-- end of .post-entry -->

				<div class="post-data">
					<?php the_tags( __( 'Tagged with:', 'responsive' ) . ' ', ', ', '<br />' ); ?>
					<?php the_category( __( 'Posted in %s', 'responsive' ) . ', ' ); ?>
				</div><!-- end of .post-data -->

				<?php edit_post_link( __( 'Edit', 'responsive' ), '<div class="post-edit">', '</div>' ); ?>
			</div><!-- end of #post-<?php the_ID(); ?> -->

	<?php endwhile; ?>

		<?php if ( $wp_query->max_num_pages > 1 ) : ?>
		<div class="navigation">
			<div class="previous"><?php next_posts_link( __( '&#8249; Older posts', 'responsive' ) ); ?></div>
			<div class="next"><?php previous_posts_link( __( 'Newer posts &#8250;', 'responsive' ) ); ?></div>
		</div><!-- end of .navigation -->
		<?php endif; ?>

<?php else : ?>

		<?php get_template_part( 'no-results', 'landing-page' ); ?>

<?php endif; ?>

		</div><!-- end of #content-full -->

<?php get_footer(); ?>
