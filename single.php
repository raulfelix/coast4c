<?php
/**
 * The Template for displaying all single posts
 */

  get_header();
?>
  <?php
    
    if (have_posts()): while (have_posts()): the_post();
      get_template_part( 'partials/article', 'content' );
      // get_template_part( 'partials/module', 'share' );
      // get_template_part( 'partials/module', 'subscribe' );
      // get_template_part( 'partials/module', 'editors-pick' );
    endwhile; endif;
  ?>
  
<?php
  wp_enqueue_script( 'single' );
  wp_enqueue_script( 'bundle' );
  get_footer(); 
?>