<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package loveatwork / riksgransen
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'loveatwork_credits' ); ?>
			<a href="http://wordpress.org/" rel="generator"><?php printf( __( 'Proudly powered by %s', 'loveatwork' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'loveatwork' ), 'loveatwork / riksgransen', '<a href="http://twitter.com/huring" rel="designer">Lars Huring</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<script src="http://code.jquery.com/jquery.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.stellar.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/waypoints.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/loveatwork-scripts.min.js"></script>

<script>
	
	$(window).stellar({
		horizontalOffset: 50
	});

	$(".start-page-content").waypoint({
  		handler: function(dir) {
	
		if (dir == "down") {
			$("#masthead").fadeOut("fast");	
		} else {
			$("#masthead").fadeIn("fast");
		}
	

  		},
  		offset: 550
	});

</script>

<?php wp_footer(); ?>

</body>
</html>