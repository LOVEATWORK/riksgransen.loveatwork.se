<?php
/**
 * Template Name: Start page template
 * Description: This page is really simple, it uses widgets on pages to display content.
 *
 * @package loveatwork / riksgransen
 */

get_header(); ?>
<div id="primary" class="content-area start-page">
	<main id="main" class="site-main" role="main">

		<!-- Get random feature here -->
		
		<?php
		
			$args=array('post_type'=>'feature', 'orderby'=>'rand', 'posts_per_page'=>'1');
			$feature=new WP_Query($args);
			
			while ($feature->have_posts()) : $feature->the_post(); 
			
				$img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');

		?>

				<article class="entry-header responsive-background" style="background-image: url('<?php echo $img[0] ?>')">

					<div class="container_12 header-text">

						<div class="grid_10 push_1">
							
							<div class="category-meta center">
								<?php 
									$cat = get_the_category();
									echo "<span>" . $cat[0]->cat_name . "</span>";
								?>
								<hr />
							</div>

							<h1 class="entry-title center"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
							<h2 class="center"><a href="<?php the_permalink() ?>"><?php the_field("sub-header") ?></a></h2>
							</a>
						</div>
					</div>

				</article>
			
			<?php

			endwhile;
			wp_reset_postdata();

		?>

		<div id="blog-posts container_12">

		<!-- Loop the blog -->
		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="">

				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->

			</article><!-- #post-## -->
			
		<?php endwhile; // end of the loop. ?>

		</div>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
