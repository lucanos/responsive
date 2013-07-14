<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) )
  exit;

/**
 * Header Template
 *
 *
 * @file           footer.php
 * @package        Envy Responsive Child
 * @author         Luke Stevenson <luke@lumik.com.au>
 */

/*
 * Globalize Theme options
 */
global $responsive_options;
$responsive_options = responsive_get_options();
?>
		<?php responsive_wrapper_bottom(); // after wrapper content hook ?>
  </div><!-- end of #wrapper -->
  <?php responsive_wrapper_end(); // after wrapper hook ?>
</div><!-- end of #container -->
<?php responsive_container_end(); // after container hook ?>
<div id="footer" class="clearfix">
	<?php responsive_footer_top(); ?>
  <div id="footer-wrapper">
    <div class="grid col-940">
      <div class="grid col-540">
<?php if( has_nav_menu( 'footer-menu' , 'responsive' ) ){ ?>
        <?php wp_nav_menu(array(
                'container'    => '' ,
                'fallback_cb'	   =>  false ,
                'menu_class'     => 'footer-menu' ,
                'theme_location' => 'footer-menu' )); ?>
<?php } ?>
      </div><!-- end of col-540 -->
      <div class="grid col-380 fit">
        <?php

$social_icons = array(
  'twitter'      => 'Twitter' ,
  'facebook'     => 'Facebook' ,
  'linkedin'     => 'LinkedIn' ,
  'youtube'      => 'YouTube' ,
  'stumble-upon' => 'StumbleUpon' ,
  'rss'          => 'RSS Feed' ,
  'google_plus'  => 'Google Plus' ,
  'instagram'    => 'Instagram' ,
  'pinterest'    => 'Pinterest' ,
  'yelp'         => 'Yelp!' ,
  'vimeo'        => 'Vimeo' ,
  'foursquare'   => 'foursquare'
);
$social_template = '<li class="%1$s-icon"><a href="%3$s"><img src="' . get_template_directory_uri() . '/core/icons/%1$s-icon.png" width="24" height="24" alt="%2$s"></a></li>';

foreach( $social_icons as $k => $v ){
  if( !empty( $responsive_options[$k.'_uid'] ) ){
    $social_icons[$k] = sprintf( $social_template , $k , $v , $responsive_options[$k.'_uid'] );
  }else{
    unset( $social_icons[$k] );
  }
}

if( count( $social_icons ) ){
  echo '<ul class="social-icons">';
  echo implode( '' , $social_icons );
  echo '</ul><!-- end of .social-icons -->';
}

        ?>
      </div><!-- end of col-380 fit -->
    </div><!-- end of col-940 -->
    <?php get_sidebar('colophon'); ?>
    <div class="grid col-300 copyright">
      <?php esc_attr_e('&copy;', 'responsive'); ?> <?php _e(date('Y')); ?>
      <a href="<?php echo home_url('/') ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"><?php bloginfo('name'); ?></a>
    </div><!-- end of .copyright -->
    <div class="grid col-300 scroll-top"><a href="#scroll-top" title="<?php esc_attr_e( 'scroll to top', 'responsive' ); ?>"><?php _e( '&uarr;', 'responsive' ); ?></a></div>
    <div class="grid col-300 fit powered">
      <a href="<?php echo esc_url(__('http://themeid.com/responsive-theme/','responsive')); ?>" title="<?php esc_attr_e('Responsive Theme', 'responsive'); ?>"><?php printf('Responsive Theme'); ?></a>
      <?php esc_attr_e('powered by', 'responsive'); ?>
      <a href="<?php echo esc_url(__('http://wordpress.org/','responsive')); ?>" title="<?php esc_attr_e('WordPress', 'responsive'); ?>"><?php printf('WordPress'); ?></a>
    </div><!-- end .powered -->
  </div><!-- end #footer-wrapper -->
	<?php responsive_footer_bottom(); ?>
</div><!-- end #footer -->
<?php responsive_footer_after(); ?>
<?php wp_footer(); ?>
</body>
</html>