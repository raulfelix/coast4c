<?php
/**
 * Template Name: blog
 */

  // displays all blog posts

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
        // get order and default to date otherwise by popularity
        $order = isset($_GET['orderby']) ? $_GET['orderby'] : 'desc';

        $args = Array(
          'posts_per_page' => 12,
          'paged' => $paged,
          'category__not_in' => array(7),
          'orderby' => 'date',
          'order'   => 'DESC',
        );
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
    <div class="blog-post-tiles-pagination">
      <?php get_template_part('partials/module', 'paginate-links'); ?>
    </div>
  </div>

<?php 
  wp_reset_query();
  wp_enqueue_script( 'category' );
  get_footer(); 
?>