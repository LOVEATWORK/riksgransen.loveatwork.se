<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package loveatwork / riksgransen
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,300,600,400' rel='stylesheet' type='text/css'>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	 <div class="loveatwork-overlay center">

	 	<div class="overlay-content container_12">
	 		
	 	 		<div class="grid_12">
		 			<?php get_sidebar('overlay') ?>
		 		</div>
	 		
		</div>

	</div>

	<?php do_action( 'before' ); ?>
	<?php include(dirname(__FILE__) . "/inc/masthead.php"); ?>
	<div id="content" class="site-content">
