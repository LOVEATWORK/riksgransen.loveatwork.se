<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package loveatwork / riksgransen
 */
?>
	<div id="secondary" class="overlay-widget-area" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>
		<?php if ( ! dynamic_sidebar( 'overlay' ) ) : ?>

			
		<?php endif; // end sidebar widget area ?>
	</div><!-- #secondary -->
