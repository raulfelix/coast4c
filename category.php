<?php
/**
 * Template Name: category
 */

  get_header();

  // get the category and display /category-name
  $taxonomy_slug = $wp_query->tax_query->queries[0]['taxonomy'];
  $term_slug = $wp_query->tax_query->queries[0]['terms'][0];
  $term = get_term_by('slug', $term_slug, $taxonomy_slug);
  $term_name = $term->name;
?>

  <div class="grid blog-container">
    <div class="blog-post-title">
      <h1><?php echo $term_name; ?></h1>
    </div>

    <div class="blog-post-tiles">
      <?php
        // get order and default to date otherwise by popularity
        $order = isset($_GET['orderby']) ? $_GET['orderby'] : 'desc';

        if ($order === 'desc') {
          $args = Array(
            'posts_per_page' => 12,
            'paged' => $paged,
            'post__not_in' => array( $post_ID_no_repeat ),
            'category_name' => $term_name
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
  </div>

  <div class="grid blog-container blog-post-tiles-pagination">
    <?php get_template_part('partials/module', 'paginate-links'); ?>
  </div>

<?php 
  wp_reset_query();
  wp_enqueue_script( 'category' );
  get_footer(); 
?>