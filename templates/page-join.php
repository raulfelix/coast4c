<?php

/**
 * Template Name: join
 *
 */

get_header();
?>

<div class="grid">
  <h1 class="page-title"><?php echo get_the_title(); ?></h1>

  <?php 
    if (have_posts()): while (have_posts()): the_post();
      the_content(); 
    endwhile; endif;
  ?>
</div>

<?php 
  get_footer(); 
?>