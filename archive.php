<?php
/**
 * Archive Template
 *
 * @package Responsive
 */

get_header(); ?>

		<div id="content-archive" class="grid col-620">

<?php if ( have_posts() ) : ?>

		<?php responsive_breadcrumb_lists(); ?>

			<h6>
				<?php if ( is_day() ) : ?>
					<?php printf( __( 'Daily Archives: %s', 'responsive' ), '<span>' . get_the_date() . '</span>' ); ?>
				<?php elseif ( is_month() ) : ?>
					<?php printf( __( 'Monthly Archives: %s', 'responsive' ), '<span>' . get_the_date( 'F Y' ) . '</span>' ); ?>
				<?php elseif ( is_year() ) : ?>
					<?php printf( __( 'Yearly Archives: %s', 'responsive' ), '<span>' . get_the_date( 'Y' ) . '</span>' ); ?>
				<?php else : ?>
					<?php _e( 'Blog Archives', 'responsive' ); ?>
				<?php endif; ?>
			</h6>

	<?php while ( have_posts() ) : the_post(); ?>

			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( __( 'Permanent Link to %s', 'responsive' ), esc_attr( the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_title(); ?></a></h1>

				<div class="post-meta">
					<?php responsive_post_meta_data(); ?>

					<?php if ( comments_open() ) : ?>
						<span class="comments-link">
							<span class="mdash">&mdash;</span>
							<?php comments_popup_link( __( 'Leave a comment &darr;', 'responsive' ), __( '1 Comment &darr;', 'responsive' ), __( '% Comments &darr;', 'responsive' ) ); ?>
						</span>
					<?php endif; ?>
				</div><!-- end of .post-meta -->

				<div class="post-entry">
					<?php if ( '' != get_the_post_thumbnail( $post->ID ) ) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
							<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'alignleft' ) ); ?>
						</a>
					<?php endif; ?>

					<?php the_excerpt(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
				</div><!-- end of .post-entry -->

				<div class="post-data">
					<?php the_tags( __( 'Tagged with:', 'responsive' ) . ' ', ', ', '<br />' ); ?>
					<?php printf( __( 'Posted in %s', 'responsive' ), get_the_category_list( ', ' ) ); ?>
				</div><!-- end of .post-data -->

				<?php edit_post_link( __( 'Edit', 'responsive' ), '<div class="post-edit">', '</div>' ); ?>
			</div><!-- end of #post-<?php the_ID(); ?> -->

			<?php comments_template( '', true ); ?>

	<?php endwhile; ?>

		<?php if ( $wp_query->max_num_pages > 1 ) : ?>
		<div class="navigation">
			<div class="previous"><?php next_posts_link( __( '&#8249; Older posts', 'responsive' ) ); ?></div>
			<div class="next"><?php previous_posts_link( __( 'Newer posts &#8250;', 'responsive' ) ); ?></div>
		</div><!-- end of .navigation -->
		<?php endif; ?>

<?php else : ?>

		<?php get_template_part( 'no-results', 'archive' ); ?>

<?php endif; ?>

		</div><!-- end of #content-archive -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
