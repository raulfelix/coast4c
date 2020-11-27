<?php
  /*
   * Standard thumbnail layout
   */
  $category = category($post->post_type);
?>

<div class="blog-post-tile">
  <div class="blog-post-category">
  <?php 
    if ($category['parent']):
  ?>
    <a href="<?php echo $category['parentPermalink']; ?>"><?php echo $category['parent']; ?></a><span class="colon">:</span><a href="<?php echo $category['permalink']; ?>"><?php echo $category['name']; ?></a>
  <?php
    else:
    ?>
      <a href="<?php echo $category['permalink']; ?>"><?php echo $category['name']; ?></a>
  <?php
    endif;
  ?>
  </div>
  <a href="<?php echo the_permalink(); ?>" class="blog-post-tile-image">
    <?php get_thumbnail(false, $post->post_type === 'lwa_news' ? true : false, false); ?>  
    <span class="blog-post-tile-when"><?php when(); ?></span>
  </a>
  <a href="<?php echo the_permalink(); ?>" class="blog-post-tile-title"><?php the_title(); ?></a>
  <div class="blog-post-tile-caption"><?php the_excerpt(); ?></div>
</div>