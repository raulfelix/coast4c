<?php
/**
 * Template Name: research
 */

  // displays all research category posts

  get_header();
?>
  <div class="grid blog-container">
    <?php
      if (have_posts()): while (have_posts()): the_post();
      ?>
        <div class="blog-post-title">
          <h1 class="blog-title"><?php the_title(); ?></h1>
          <div class="blog-excert">
            <?php the_content(); ?>
          </div>
        </div>
    <?php
      endwhile; endif;
    ?>

    <div class="blog-post-tiles">
      <?php
        $args = Array(
          'category__in' => array(7),
          'post_status' => 'publish',
          'orderby' => 'date',
          'order'   => 'DESC',
          'no_found_rows' => true
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
 
<?php 
  wp_reset_query();
  get_footer(); 
?>