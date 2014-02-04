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

 <div class="loveatwork-overlay">
	<span class="loveatwork-close">close</span>
	<div class="loveatwork-week">
		<div><span class="loveatwork-city">Lisbon</span><span class="icon-clima-1"></span><span>21°C</span></div>
		<div><span>Mon</span><span class="icon-clima-1"></span><span>19°C</span></div>
		<div><span>Tue</span><span class="icon-clima-2"></span><span>19°C</span></div>
		<div><span>Wed</span><span class="icon-clima-2"></span><span>18°C</span></div>
		<div><span>Thu</span><span class="icon-clima-2"></span><span>17°C</span></div>
		<div><span>Fri</span><span class="icon-clima-1"></span><span>19°C</span></div>
		<div><span>Sat</span><span class="icon-clima-1"></span><span>22°C</span></div>
		<div><span>Sun</span><span class="icon-clima-1"></span><span>18°C</span></div>
	</div>
</div>

<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<?php include(dirname(__FILE__) . "/inc/masthead.php"); ?>
	<div id="content" class="site-content">
