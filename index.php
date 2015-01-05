<?php get_header(); ?>
<div class="reading">
	<div class="wrapper">
		<?php if (have_posts()) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<article>
					<div class="article-meta">
						<a href="<?php echo get_permalink($post->ID); ?>" rel="bookmark" class="article-date">
							<time class="entry-date" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date();?></time>
						</a> &mdash;
						<span class="article-categories"><?php echo get_the_category_list(', '); ?></span>
					</div>
					<h2><a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title;?></a></h2>
					<?php the_content(''); ?>
				</article>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>