<?php

/**
 * Template Name: partners
 *
 */
  get_header();
?>

<div class="page-hero">
  <div class="page-hero-container">
    <h1 class="page-title"><?php the_title(); ?></h1>
    <?php
      if (have_posts()): while (have_posts()): the_post();
        the_content();
      endwhile; endif;
    ?>
  </div>
</div>

<div class="grid">
  <div class="blog-container">
    <div class="partner-tile-tiles">
      <?php
        $args = Array(
          'post_type' => 'partners',
          'post_status' => 'publish',
        );
        $wp_query = new WP_Query( $args );

        if ( $wp_query->have_posts() ):
          while ( $wp_query->have_posts() ): 
            $wp_query->the_post();
            $term_list = wp_get_post_terms( $post->ID, 'partners_tax', array( 'fields' => 'names' ) );
      ?>
        <div class="partner-tile">
          <div class="partner-tile-wrap">
            <div class="partner-tile-image">
              <?php get_thumbnail(false, false, false); ?>
            </div>
            <div class="partner-tile-title"><?php the_title(); ?></div>
            <div class="partner-tile-category"><?php echo $term_list[0] ?></div>
            <div class="partner-tile-caption"><?php the_content(); ?></div>
          </div>
        </div>
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