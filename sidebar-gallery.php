<?php
/**
 * @package Responsive
 */
?>

		<div id="widgets" class="grid col-300 fit gallery-meta">
		<?php do_action( 'before_sidebar' ); ?>

		<?php
		if ( ! is_active_sidebar( 'sidebar-5' ) )
			return;
		?>
		<div id="widgets" class="grid col-300 fit">
		<?php do_action( 'before_sidebar' ); ?>

				<?php dynamic_sidebar( 'sidebar-5' ); ?>

		</div><!-- end of #widgets -->