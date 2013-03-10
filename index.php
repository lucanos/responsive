<?php
/**
 * The main template file.
 *
 * @package Responsive
 */

get_header(); ?>

		<div id="content-blog" class="grid col-620">

<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>

		<?php get_template_part( 'content', get_post_format() ); ?>

	<?php endwhile; ?>

		<?php if ( $wp_query->max_num_pages > 1 ) : ?>
		<div class="navigation">
			<div class="previous"><?php next_posts_link( __( '&#8249; Older posts', 'responsive' ) ); ?></div>
			<div class="next"><?php previous_posts_link( __( 'Newer posts &#8250;', 'responsive' ) ); ?></div>
		</div><!-- end of .navigation -->
		<?php endif; ?>

<?php else : ?>

		<?php get_template_part( 'no-results', 'index' ); ?>

<?php endif; ?>

		</div><!-- end of #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
