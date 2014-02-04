<?php
/**
 * Template Name: Start page template
 * Description: This page is really simple, it uses widgets on pages to display content.
 *
 * @package loveatwork / riksgransen
 */

get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">


		<!-- Get random feature here -->

		<!-- Loop the blog -->
		<?php while ( have_posts() ) : the_post(); ?>


			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">


				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->

			</article><!-- #post-## -->

			
		<?php endwhile; // end of the loop. ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
