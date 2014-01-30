<?php
/**
 * The Template for displaying feature content.
 *
 * @package loveatwork / riksgransen
 */

get_header('feature'); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<h2><?php the_field("sub-header") ?></h2>

		<div class="entry-meta">
			<?php loveatwork_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
	
		<?php the_content(); ?>
		<?php the_field("map"); ?>

		<p>This template should be very flexible. Also need to install that wonderful plugin that's used for widgets on pages</p>

	</div><!-- .entry-content -->

	
</article><!-- #post-## -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>