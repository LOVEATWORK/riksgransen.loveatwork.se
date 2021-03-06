
<header id="masthead" class="site-header" role="banner" data-stellar-horizontal-offset="0" data-stellar-ratio="0.2">
	<div class="site-branding">
		<h1 class="site-title ir"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		
		<nav class="primary">

			<a href="" class="toggle"><i class="fa fa-bars fa-2x"></i>	

			<div class="navigation hide">
				<?php wp_nav_menu( array( 'theme_location' => 'primary') ); ?>
			</div>
		</nav>

		<nav class="social">
			<ul class="menu-list">
				<li><a href="#"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="icon fa fa-twitter fa-stack-1x fa-inverse"></i></span></a></li>
				<li><a href="#"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="icon fa fa-facebook fa-stack-1x fa-inverse"></i></span></a></li>
				<li><a href="#"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="icon fa fa-instagram fa-stack-1x fa-inverse"></i></span></a></li>
			</ul>
		</nav>



	</div>
</header><!-- #masthead -->