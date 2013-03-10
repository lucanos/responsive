<?php
/**
 * @package Responsive
 */
?>

<?php if ( is_active_sidebar( 'sidebar-2' ) || is_active_sidebar( 'sidebar-3' ) || is_active_sidebar( 'sidebar-4' ) ) : ?>

	<div id="widgets" class="home-widgets">
		<div class="grid col-300">
		<?php do_action( 'before_sidebar' ); ?>

			<?php if ( dynamic_sidebar( 'sidebar-2' ) ) ?>

		</div><!-- end of .col-300 -->

		<div class="grid col-300">
		<?php do_action( 'before_sidebar' ); ?>

			<?php if ( dynamic_sidebar( 'sidebar-3' ) ) ?>

		</div><!-- end of .col-300 -->

		<div class="grid col-300 fit">
		<?php do_action( 'before_sidebar' ); ?>

			<?php if ( dynamic_sidebar( 'sidebar-4' ) ) ?>

		</div><!-- end of .col-300 fit -->
	</div><!-- end of #widgets -->

<?php else : ?>
	<?php return; ?>
<?php endif; ?>