<?php
/**
 * Colophon Widget Template
 *
 * @package Responsive
 */
?>

	<?php
	if ( ! is_active_sidebar( 'sidebar-6' ) )
		return;
	?>

	<div id="colophon-widget" class="grid col-940">
		<?php do_action( 'before_sidebar' ); ?>
			<?php dynamic_sidebar( 'sidebar-6' ); ?>
	</div><!-- end of #colophon-widget -->