<?php
/**
 * @package loveatwork / riksgransen
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
	
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'loveatwork' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'loveatwork' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( '', 'loveatwork' ) );
				if ( $tags_list ) :
			?>

			<div class="grid_7 alpha">
			<span class="tags-links">
				<?php printf( __( '%1$s', 'loveatwork' ), $tags_list ); ?>
			</span>
			</div>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

			<div class="author-meta grid_5 omega">
					<p>
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
					<span class="author-name"><?php the_author(); ?>, <?php the_date(); ?></span>
					<span class="post-date"><?php the_date(); ?></span>
				</p>
			</div><!-- .entry-meta -->

	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
