<?php
/**
 * The Template for displaying feature content.
 *
 * @package loveatwork / riksgransen
 */

get_header('feature'); ?>

<?php 

	$img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); 
	$textcolor = get_field('header_color');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header responsive-background" style="background-image: url('<?php echo $img[0] ?>')">

		<div class="container_12 header-text">

			<div class="grid_10 push_1">
				<h1 class="entry-title center" style="color: <?php echo $textcolor ?>"><?php the_title(); ?></h1>
				<h2 class="center" style="color: <?php echo $textcolor ?>"><?php the_field("sub-header") ?></h2>

				<div class="entry-meta center">

					<hr />

					<?php // loveatwork_posted_on(); ?>

					<?php

						$authors = get_field("author");

						// var_dump($authors);

						if ($authors) {
							
							foreach ($authors as $post) {
								setup_postdata($post);
								
								$author_name = $post->post_title;
								$author_thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail')[0];
								$author_contact = get_field("twitter");
							}
						}

					?>

					<img class="author-avatar" width="24" height="24" src="<?php echo $author_thumbnail ?>" /> <span style="color: <?php echo $textcolor ?>"><?php echo $author_name ?></span>

					<?php wp_reset_postdata(); ?>

				</div><!-- .entry-meta -->
			
			</div>
		
		</div>
	
	</header><!-- .entry-header -->

	<div class="entry-content container_12">
		<div class="grid_10 push_1">
	
			<?php // include("resources/style-boilerplate.html"); ?>
			<?php echo $post->post_content ?>
		</div>

		<div class="author-meta grid_4 push_1">
			
			<h3>Skrivet av</h3>
			

		</div>
	
		<div class="category-meta grid_4 push_2">
			
			<h3>Kategori</h3>

		</div>

	</div><!-- .entry-content -->

</article><!-- #post-## -->

<?php get_footer(); ?>