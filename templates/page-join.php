<?php

/**
 * Template Name: join
 *
 */

get_header();
?>

<div class="row">
  <div class="row-title">
    <h1><?php echo get_the_title(); ?></h1>
  </div>
</div>

<div class="row-join">
<?php 
  if (have_posts()): while (have_posts()): the_post();
    the_content(); 
  endwhile; endif;
?>
</div>

<?php 
  get_footer(); 
?>