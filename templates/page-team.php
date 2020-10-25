<?php
/**
 * Template Name: team
 */

get_header();
?>

<div class="row row-team">
  <h1><?php echo get_the_title(); ?></h1>
  <?php 
    if (have_posts()): while (have_posts()): the_post();
      the_content(); 
    endwhile; endif;
  ?>
</div>

<?php 
  get_footer(); 
?>