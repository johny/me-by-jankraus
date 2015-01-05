<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <title><?php wp_title( '|', true, 'right' ); ?></title>
<?php if(is_single() && strip_tags(get_the_excerpt($post->ID)) !== ''):?>
  <meta name="description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
<?php else:?>
  <meta name="description" content="<?php bloginfo('description');?>">
<?php endif;?>
  <meta name="viewport" content="width=device-width">
  <meta name="application-name" content="<?php bloginfo('name'); ?>" />
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">
<?php if(has_post_thumbnail()):?>
  <?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
  <meta name="og:image" content="<?php echo $thumb[0]; ?>" />
<?php endif;?>

</head>
<body <?php body_class(); ?>>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-xxxxxxxxx-xx', 'xxxxxx');
  ga('send', 'pageview');

</script>
<div id="page" class="page">
  <header role="banner" class="header">
    <a href="/" class="branding"><?php bloginfo('name'); ?></a>
    <?php wp_nav_menu(); ?>
  </header>
  <div id="main" class="main">
    <?php if(is_front_page()): ?>
      <div class="welcome">
        <div class="wrapper">
          <div class="featured">
            <div class="article-header">
              <h1>Hello, I'm John Doe</h1>
              <p class="info">I like coffee, instagram and funky music</p>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
