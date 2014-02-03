<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package loveatwork / riksgransen
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
			// Features

			$args = array('post_type' => 'feature', 'orderby'=>'rand', 'posts_per_page'=>'1');
		
			$features = new WP_Query($args);
		
			while ($features->have_posts()) : $features->the_post(); ?>
		
			    <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
			    <p><?php the_excerpt(); // or the_content(); ?></p>

			    <?php get_template_part( 'content', get_post_format() ); ?>

		
		<?php
			endwhile;
		
			wp_reset_postdata();

		?>

		<?php 

		// Blog posts
		if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php loveatwork_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php // get_sidebar(); ?>
<?php get_footer(); ?>
