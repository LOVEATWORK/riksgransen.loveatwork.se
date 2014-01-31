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

<?php wp_head(); ?>

<style type="text/css"><?php the_field("custom_css", $post->ID); ?></style>

</head>

<body <?php body_class(); ?>>
<div id="page feature" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<?php include(dirname(__FILE__) . "/inc/masthead.php"); ?>
	<div id="content" class="site-content container_12">