<?php
/**
 * @package Responsive
 */
?>

	<?php
	if ( ! is_active_sidebar( 'sidebar-7' ) )
		return;
	?>

	<div id="top-widget" class="top-widget">
		<?php do_action( 'before_sidebar' ); ?>

				<?php dynamic_sidebar( 'sidebar-7' ); ?>

	</div><!-- end of #top-widget -->