<?php
/**
 * @package Responsive
 */
?>

			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( __( 'Permanent Link to %s', 'responsive' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h1>

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
							<?php the_post_thumbnail(); ?>
						</a>
					<?php endif; ?>

					<?php // display the_excerpt if set
					$options = get_theme_mod( 'blog_excerpt' );

					if ( 'yes' == $options ) {
						the_excerpt();
					} else {
						the_content( __( 'Read more &#8250;', 'responsive' ) );
					}
					?>

					<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
				</div><!-- end of .post-entry -->

				<div class="post-data">
					<?php the_tags( __( 'Tagged with:', 'responsive' ) . ' ', ', ', '<br />' ); ?>
					<?php printf( __( 'Posted in %s', 'responsive' ), get_the_category_list(', ') ); ?>
				</div><!-- end of .post-data -->

				<?php edit_post_link( __( 'Edit', 'responsive' ), '<div class="post-edit">', '</div>' ); ?>
			</div><!-- end of #post-<?php the_ID(); ?> -->