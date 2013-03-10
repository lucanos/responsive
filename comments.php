<?php
/**
 * Comments Template
 *
 * @package Responsive
 */
?>

<?php
if ( post_password_required() )
	return;
?>

<?php if ( have_comments() ) : ?>
	<h6 id="comments">
		<?php
		printf( _n( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'responsive' ),
			number_format_i18n( get_comments_number() ),
			'<span>' . get_the_title() . '</span>'
		);
		?>
	</h6>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<div class="navigation">
		<div class="previous"><?php previous_comments_link( __( '&#8249; Older comments','responsive' ) ); ?></div><!-- end of .previous -->
		<div class="next"><?php next_comments_link( __( 'Newer comments &#8250;','responsive', 0 ) ); ?></div><!-- end of .next -->
	</div><!-- end of.navigation -->
	<?php endif; ?>

	<ol class="commentlist">
		<?php wp_list_comments( 'avatar_size=60&type=comment' ); ?>
	</ol>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<div class="navigation">
		<div class="previous"><?php previous_comments_link( __( '&#8249; Older comments','responsive' ) ); ?></div><!-- end of .previous -->
		<div class="next"><?php next_comments_link( __( 'Newer comments &#8250;','responsive', 0 ) ); ?></div><!-- end of .next -->
	</div><!-- end of.navigation -->
	<?php endif; ?>

<?php endif; ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'responsive' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>