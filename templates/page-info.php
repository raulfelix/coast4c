<?php

/**
 * Template Name: info
 */

  get_header();
?>

<div class="row-highlight">
  <div class="row">
    <div class="row-title">
      <h1><?php echo get_the_title(); ?></h1>
      <p>Creating a blue economy</p>
    </div>
  </div>
</div>

<div class="row-about">
<?php 
  if (have_posts()): while (have_posts()): the_post();
    the_content(); 
  endwhile; endif;
?>
</div>

<?php 
  get_footer(); 
?>