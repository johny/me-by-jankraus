<?php

function blog_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => 'Sidebar 1',
		'description' => 'The first (primary) sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
}

function blog_theme_support() {
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(125, 125, true);
	add_theme_support('automatic-feed-links');
	add_theme_support( 'post-formats',
		array(
			'image',
			'link',
			'aside',
			'quote'
		)
	);
	add_theme_support( 'menus' );            // wp menus
	register_nav_menus(                      // wp3+ menus
		array(
			'main_nav' => 'The Main Menu',   // main nav in header
			'footer_links' => 'Footer Links' // secondary nav in footer
		)
	);
}

function jk_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );
	if($has_url){
		return $has_url;
	} else{
		return apply_filters( 'the_permalink', get_permalink() );
	}
}

function jk_display_pings() {

  // Do not do anything if Disqus is not installed
  //if(!dsq_is_installed()) return;

  $current_post_ID = get_the_ID();

  global $wpdb;

  $sql =  "SELECT comment_author_url, comment_date, comment_content, comment_author FROM $wpdb->comments WHERE comment_post_ID = $current_post_ID AND comment_approved = '1' AND (comment_type = 'pingback' OR comment_type = 'trackback') ORDER BY comment_date ASC";

  if ($post_pingtrackbacks = $wpdb->get_results($sql) ) {

    $number_of_pingtrackbacks = count($post_pingtrackbacks);

    echo '<div id="pings" class="pingbacks">';
    echo '<h4>Pings from the internet</h4>';
   	echo '<ul>';

    foreach ($post_pingtrackbacks as $post_pingtrackback) {

			echo "<li><strong>";
        echo date( 'd F Y \a\t g:ma', strtotime( $post_pingtrackback->comment_date ));
      echo "</strong><br />";

			$comment_summary = $post_pingtrackback->comment_content;
      echo substr( $comment_summary, 0, strrpos( substr( $comment_summary, 0, 90), ' ' ) ) . ' ...';

      echo "\n<a href='";
      echo $post_pingtrackback->comment_author_url;
      echo "'>";
      $author = $post_pingtrackback->comment_author;
      echo html_entity_decode($author);
      echo "</a>";
      echo "</li>";
    }

    echo "</ul></div>";
  }
}

add_filter( 'body_class',
  function($classes) {
    global $post;
    if(has_post_thumbnail()){
      $classes[] = 'has-thumbnail';
    } else{
      $classes[] = 'no-thumbnail';
    }
    return $classes;
  }
);

add_action('after_setup_theme','blog_theme_support');
add_action( 'widgets_init', 'blog_register_sidebars' );

add_image_size( 'blog-thumb-600', 700, 350, true );
add_image_size( 'blog-thumb-300', 350, 200, true );

if(is_admin()){

  add_filter('image_send_to_editor', 'wrap_image', 10, 8);

  function wrap_image($html, $id, $caption, $title, $align, $url, $size, $alt){
    return '<div class="post-image" id="post-image-'.$id.'">'.$html.'</div>';
  }
}
