
<?php
  $img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'original');
?>

<div class="blog-image-wrap">
  <div class="grid">
    <div class="blog-image-content">
     
      <div class="blog-image-category">
        <?php 
          $categories = get_the_category();
          if ( ! empty( $categories ) && $categories[0]->name != 'Uncategorised'):
        ?>
          <div class="blog-pill blog-post-category">
            <a href="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ) ?>"><?php echo $categories[0]->name; ?></a>
          </div>
        <?php
          endif;
        ?>
      </div>
      <div class="blog-title">
        <?php the_title(); ?>
      </div>
      <div class="blog-excert">
        <?php the_excerpt(); ?>
      </div>
      <!-- <div class="blog-date">
        <?php echo get_the_time( get_option('date_format')) ?>
      </div> -->
    </div>
  </div>
  <div class="blog-image" style="background-image: url(<?php echo $img_url[0] ?>);" data-type="background"></div>
</div>

<div class="grid blog-post">
  <div class="blog-content">
    <?php the_content(); ?>
  </div>
    
    <div class="blog-post-details">
      <?php if (get_the_author_meta('user_login') != 'warhol'): ?>
        Written by <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta('display_name'); ?></a>
        <span class="blog-bullet"></span>
      <?php endif; ?>
      <?php echo get_the_time( get_option('date_format')) ?>
    </div>
    
    <div class="f-300 bp4-gone">
      <?php 
        wp_reset_query();
        
        $args = Array(
          'posts_per_page' => 5,
          'post_type' => array('lwa_feature', 'lwa_news'),
          'meta_key' => '_count-views_all',
          'orderby' => 'meta_value_num'
        );

        $wp_query = new WP_Query( $args );
        if ( $wp_query->have_posts() ):
      ?>

        <div class="section-popular">
          <h5>Most Popular</h5>
          
          <?php
            while ( $wp_query->have_posts() ): 
              $wp_query->the_post();
          ?>

          <div class="thumb thumb-popular">
            <a href="<?php echo the_permalink(); ?>" class="h-4 thumb-title"><?php the_title(); ?></a>
            <a href="<?php echo the_permalink(); ?>" class="thumb-feature">
              <?php get_thumbnail(false, true, false); ?>  
              <div class="m-overlay blanket-light"></div>
            </a>
          </div>

          <?php  
            endwhile;
          ?>
        </div>
      <?php
        endif;
        wp_reset_query();
       ?>
    </div>
  </div>
