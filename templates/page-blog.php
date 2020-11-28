<?php
/**
 * Template Name: blog
 */

  // displays all blog posts

  get_header();
?>
  <div class="grid blog-container blog-post-tiles">

    <?php
      // get order and default to date otherwise by popularity
      $order = isset($_GET['orderby']) ? $_GET['orderby'] : 'desc';

      if ($order === 'desc') {
        $args = Array(
          'posts_per_page' => 12,
          'paged' => $paged,
          'post__not_in' => array( $post_ID_no_repeat ),
        );
      } else {
        $args = Array(
          'posts_per_page' => 12,
          'paged' => $paged,
          'post__not_in' => array( $post_ID_no_repeat ),
          'orderby' => 'meta_value_num'
        );
      }

      $wp_query = new WP_Query( $args );
      $idx = 1;
      if ( $wp_query->have_posts() ):
        while ( $wp_query->have_posts() ): 
          $wp_query->the_post();
    ?>

    <?php get_template_part('partials/article', 'thumb'); ?>

    <?php 
        endwhile;
      endif;
    ?>
  </div>

  <div class="grid blog-container blog-post-tiles-pagination">
    <?php get_template_part('partials/module', 'paginate-links'); ?>
  </div>

<?php 
  wp_reset_query();
  wp_enqueue_script( 'category' );
  get_footer(); 
?>