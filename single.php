<?php get_header(); ?>
<?php the_post(); ?>
<div class="reading">
  <article class="<?php echo (has_post_thumbnail() ? "featured" : "normal");?>">
    <?php if(has_post_thumbnail()):?>
      <?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
      <div class="featured-image" style="background-image: url('<?php echo $thumb[0]; ?>');"></div>
    <?php endif;?>
    <div class="wrapper">
      <div class="article-header">
        <h1><?php echo $post->post_title;?></h1>
        <div class="article-meta">
          A <span class="article-categories"><?php echo get_the_category_list(', '); ?></span> entry from
          <a href="<?php echo get_permalink($post->ID); ?>" rel="bookmark" class="article-date">
            <time class="entry-date" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date();?></time>
          </a>
        </div>
      </div>
      <div class="article-content">
        <?php the_content(''); ?>
      </div>
    </div>
  </article>
</div>
<div class="discussion">
  <div class="wrapper">
    <?php jk_display_pings(); ?>

    <div id="disqus_thread"></div>
    <script type="text/javascript">

        // Required - Replace example with your forum shortname
        var disqus_shortname = 'xxxxxxx';


        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">blog comments powered by <span class="logo-disqus">Disqus</span></a>
  </div>
</div>
<?php get_footer(); ?>
