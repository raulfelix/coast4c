
<?php
  /*
   * Research thumbnail layout
   */
  $author = get_post_meta($post->ID, 'Author', true);
?>

<div class="research-post-tile">
  <div class="research-post-tile-body">
    <a href="<?php echo the_permalink(); ?>" class="research-post-tile-image">
      <?php get_thumbnail(false, $post->post_type === 'lwa_news' ? true : false, false); ?>  
    </a>
    <a href="<?php echo the_permalink(); ?>" class="research-post-tile-title"><?php the_title(); ?></a>
    <div class="research-post-tile-author"><?php echo $author; ?></div>
    <a href="<?php echo the_permalink(); ?>" class="research-post-tile-button">Read the case study</a>
  </div>
</div>