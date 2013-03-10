<?php
/**
 * Error 404 Template
 *
 * @package Responsive
 */

get_header(); ?>

		<div id="content-full" class="grid col-940">
			<div id="post-0" class="error404">
				<div class="post-entry">

					<?php get_template_part( 'no-results', '404' ); ?>

				</div><!-- end of .post-entry -->
			</div><!-- end of #post-0 -->
		</div><!-- end of #content-full -->

<?php get_footer(); ?>
