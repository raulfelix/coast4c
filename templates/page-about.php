<?php

/**
 * Template Name: about
 */

  get_header();
?>

  <?php
    if (have_posts()): while (have_posts()): the_post();
      the_content();
    endwhile; endif;
  ?>

  <div class="about-research">
    <div class="about-research-posts">
      <div class="blog-post-tiles">
        <?php
          // get order and default to date otherwise by popularity
          $order = isset($_GET['orderby']) ? $_GET['orderby'] : 'desc';

          $args = Array(
            'posts_per_page' => 3,
            'paged' => $paged,
            'category__in' => array(7) 
          );
          $wp_query = new WP_Query( $args );
          $idx = 1;
          if ( $wp_query->have_posts() ):
            while ( $wp_query->have_posts() ): 
              $wp_query->the_post();
        ?>
        <?php get_template_part('partials/research', 'thumb'); ?>
        <?php 
            endwhile;
          endif;
        ?>
      </div>
    </div>
  </div>
<?php 
  get_footer(); 
?>