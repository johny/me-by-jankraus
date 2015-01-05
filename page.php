<?php get_header(); ?>
<div class="reading">
  <div class="wrapper">
    <?php if (have_posts()) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <article class="static">
          <h2><?php echo $post->post_title;?></h2>
          <?php the_content(''); ?>
        </article>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</div>
<?php get_footer(); ?>