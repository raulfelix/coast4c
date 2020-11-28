<?php
  /*
   * Standard thumbnail layout
   */
  $categories = get_the_category($post->ID);
?>

<div class="blog-post-tile">
  <?php 
    if ( ! empty( $categories ) &&  $categories[0]->name != 'Uncategorised'):
  ?>
    <div class="blog-pill blog-post-category">
      <a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ) ?>"><?php echo $categories[0]->name; ?></a>
    </div>
  <?php
    endif;
  ?>
  
  <a href="<?php echo the_permalink(); ?>" class="blog-post-tile-image">
    <?php get_thumbnail(false, $post->post_type === 'lwa_news' ? true : false, false); ?>  
    <span class="blog-pill blog-post-tile-when"><?php when(); ?></span>
  </a>
  <a href="<?php echo the_permalink(); ?>" class="blog-post-tile-title"><?php the_title(); ?></a>
  <div class="blog-post-tile-caption"><?php the_excerpt(); ?></div>
</div>