<?php
	/*
	Template Name: Homepage
	*/
?><?php get_header(); ?>
	<div class="reading">
		<div class="wrapper normal clearfix">
			<div class="articles-list">
				<?php
					$args = array(
						'post_type' => 'post',
						'numberposts' => '5',
						'post_status' => 'publish',
						'tax_query' => array(
							array(
								'taxonomy' => 'post_format',
								'field' => 'slug',
								'terms' => array('post-format-quote', 'post-format-link', 'post-format-image', 'post-format-aside'),
								'operator' => 'NOT IN'
							)
						)
					);
					$posts = wp_get_recent_posts($args);
				?>
				<?php foreach($posts as $post):?>
					<?php
						$post = get_post( $post['ID'] );
						$content = get_extended ($post->post_content);
					?>
					<article>
						<div class="article-meta"
							<time class="entry-date" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date();?></time>
						</div>
						<h2><a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title;?></a></h2>
						<p>
							<?php echo $content['main']; ?>
							<a href="<?php echo get_permalink($post->ID); ?>" class="more">Read more »</a>
						</p>
					</article>
				<?php endforeach;?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>
