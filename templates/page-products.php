<?php
/**
 * Template Name: products
 * The Template for displaying products
 */

get_header(); ?>

<div class="page">
  <div class="page-container">
    <h1 class="page-title"><?php the_title(); ?></h1>
  </div>
</div>

<div class="grid">
  <?php
    if (have_posts()): while (have_posts()): the_post();
      the_content();
    endwhile; endif;
  ?>
</div>

<?php
  get_footer(); 
?>