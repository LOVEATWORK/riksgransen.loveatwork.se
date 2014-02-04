<?php

/**
 * Available Loveatwork Custom Widgets
 *
 * Learn more: http://codex.wordpress.org/Widgets_API#Developing_Widgets
 *
 * @package loveatwork
 * @since loveatwork 1.0
 */

class loveatwork_recentposts extends WP_Widget {

	function loveatwork_recentposts() {
		$widget_ops = array('description' => __( 'LAW Recent posts on Page (with or without thumbnails)', 'loveatwork') );

		parent::WP_Widget(false, __('LAW Recent Posts for Pages', 'loveatwork'),$widget_ops);
	}

	function widget($args, $instance) {
		extract( $args );

		$postnumber = $instance['postnumber'];
		$cat = apply_filters('widget_title', $instance['cat']);
		$thumbnail = $instance['thumbnail'];

		echo "<div class='container_12 clearfix'>";

		 ?>

				<?php
				global $post;
				$loveatwork_post = $post;
				
				// get the category IDs and the number of posts and place them in an array
				if($cat) {
					$args = array(
						'posts_per_page' => $postnumber,
						'cat' => $cat,
						'tax_query' => array(
							array(
								'taxonomy' => 'post_format',
								'field' => 'slug',
								'terms' => array( 'post-format-quote', 'post-format-link' ),
								'operator' => 'NOT IN'
								)
								)
								);
				} else {
					$args = array(
						'posts_per_page' => $postnumber,
						'tax_query' => array(
							array(
								'taxonomy' => 'post_format',
								'field' => 'slug',
								'terms' => array( 'post-format-quote', 'post-format-link' ),
								'operator' => 'NOT IN'
								)
								)
								);
				}
				
				$myposts = get_posts( $args );

				foreach( $myposts as $post ) : setup_postdata($post); ?>

					<article id="post-<?php the_ID(); ?>" class="grid_4 blog-intro">

						<?php if($thumbnail == true && has_post_thumbnail() ) { ?>
							<a href="<?php the_permalink(); ?>" class="rp-thumb"><?php the_post_thumbnail();?></a>
						<?php } ?>

						<header class=""><h2><?php the_title(); ?></h2></header>
						<div class="entry-content"><?php the_excerpt(); ?></div>

					</article>

					<?php endforeach; ?>
					<?php $post = $loveatwork_post; ?>

		</div>

	   <?php			

	   // Reset the post globals as this query will have stomped on it
	   wp_reset_postdata();

   }

   function update($new_instance, $old_instance) {                
       return $new_instance;
   }

   function form($instance) {
   		$postnumber = esc_attr($instance['postnumber']);
		$cat = esc_attr($instance['cat']);
		$thumbnail = esc_attr($instance['thumbnail']);
		?>
		
		 <p>
            <label for="<?php echo $this->get_field_id('postnumber'); ?>"><?php _e('Number of posts to display (e.g. 4, 6 or 8):','loveatwork'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('postnumber'); ?>" value="<?php echo $postnumber; ?>" class="widefat" id="<?php echo $this->get_field_id('postnumber'); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('cat'); ?>"><?php _e('Category ID numbers (to choose which categories to include):','loveatwork'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('cat'); ?>" value="<?php echo $cat; ?>" class="widefat" id="<?php echo $this->get_field_id('cat'); ?>" />
        </p>
		
		<p>
          <input id="<?php echo $this->get_field_id('thumbnail'); ?>" name="<?php echo $this->get_field_name('thumbnail'); ?>" type="checkbox" value="1" <?php checked( '1', $thumbnail ); ?>/>
          <label for="<?php echo $this->get_field_id('thumbnail'); ?>"><?php _e('Display thumbnails?','loveatwork'); ?></label> 
        </p>

       
		<?php
	}
} 

register_widget('loveatwork_recentposts');


class loveatwork_anypost extends WP_Widget {

	function loveatwork_anypost() {
		$widget_ops = array('description' => __( 'LAW any post', 'loveatwork') );

		parent::WP_Widget(false, __('LAW any post', 'loveatwork'),$widget_ops);
	}

	function widget($args, $instance) {
		extract( $args );

		$postnumber = $instance['postnumber'];
		$type = $instance['type'];
		$thumbnail = $instance['thumbnail'];
		$columns = $instance['columns'];

		if ($columns == '') {
			$columns = 4;
		} else {
			$columns = 12 / $columns;
		}

		echo "<div class='container_12 clearfix'>";

		 ?>

				<?php
				global $post;
				$loveatwork_post = $post;

				$args = array(
					'post_type' => $type,
					'orderby' => 'date',
					'post_status' => 'publish',
					'posts_per_page' => $postnumber
				);
				
				$myposts = new WP_Query( $args );

				while ($myposts->have_posts()) : $myposts->the_post(); 

				?>

					<article id="post-<?php the_ID(); ?>" class="grid_<?php echo $columns ?> blog-intro">

					<?php

					switch ($type) {

						case "instagram":
						?>

							<?php the_post_thumbnail(); ?>

						<?php
						break;

						case "people":
						?>

							<div class="person center">
								<div class="contact-img"><?php the_post_thumbnail('thumbnail'); ?></div>
								<h3><?php the_title(); ?></h3>
								<p><?php the_field("title") ?></p>
								<p><?php the_field("e-mail") ?></p>
								<p><?php the_field("phone") ?></p>
								<p><?php the_field("twitter") ?></p>
								<p><?php the_field("instagram") ?></p>
							</div>

						<?php
						break;


						default:
						?>


								<?php if($thumbnail == true && has_post_thumbnail() ) { ?>
									<a href="<?php the_permalink(); ?>" class="rp-thumb"><?php the_post_thumbnail();?></a>
								<?php } ?>

								<header class=""><h2><?php the_title(); ?></h2></header>
								<div class="entry-content"><?php the_excerpt(); ?></div>

						<?php

					}

					?>

					</article>

				<?php endwhile; ?>

		</div>

	   <?php			

	   // Reset the post globals as this query will have stomped on it
	   wp_reset_postdata();

   }

   function update($new_instance, $old_instance) {                
       return $new_instance;
   }

   function form($instance) {
   		$postnumber = esc_attr($instance['postnumber']);
		$type = esc_attr($instance['type']);
		$columns = esc_attr($instance['columns']);
		$thumbnail = esc_attr($instance['thumbnail']);
		?>
		
		 <p>
            <label for="<?php echo $this->get_field_id('postnumber'); ?>"><?php _e('Number of posts to display (e.g. 4, 6 or 8):','loveatwork'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('postnumber'); ?>" value="<?php echo $postnumber; ?>" class="widefat" id="<?php echo $this->get_field_id('postnumber'); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('type'); ?>"><?php _e('Post type','loveatwork'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('type'); ?>" value="<?php echo $type; ?>" class="widefat" id="<?php echo $this->get_field_id('type'); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('columns'); ?>"><?php _e('Columns','loveatwork'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('columns'); ?>" value="<?php echo $columns; ?>" class="widefat" id="<?php echo $this->get_field_id('columns'); ?>" />
        </p>
		
		<p>
          <input id="<?php echo $this->get_field_id('thumbnail'); ?>" name="<?php echo $this->get_field_name('thumbnail'); ?>" type="checkbox" value="1" <?php checked( '1', $thumbnail ); ?>/>
          <label for="<?php echo $this->get_field_id('thumbnail'); ?>"><?php _e('Display thumbnails?','loveatwork'); ?></label> 
        </p>

       
		<?php
	}
} 

register_widget('loveatwork_anypost');


class loveatwork_quote extends WP_Widget {

	function loveatwork_quote() {
		$widget_ops = array('description' => __( 'LAW Quote', 'loveatwork') );
		parent::WP_Widget(false, __('LAW Quote', 'loveatwork'),$widget_ops);
	}

	function widget($args, $instance) {
		extract( $args );

		$text = $instance['text'];

		?>

		<div class='container_12 clearfix quote center'>
			<blockquote><?php echo $text ?></blockquote>
		</div>

	   <?php			
   }

   function update($new_instance, $old_instance) {                
       return $new_instance;
   }

   function form($instance) {
		$text = esc_attr($instance['text']);
		?>
		
        <p>
            <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Quote text','loveatwork'); ?></label>
            <textarea name="<?php echo $this->get_field_name('text'); ?>" class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
         </p>


       
		<?php
	}
} 

register_widget('loveatwork_quote');

?>