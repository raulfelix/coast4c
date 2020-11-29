
<?php
  $categories = get_the_category();
  $img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'original');
?>

<?php if ( ! empty( $categories ) && $categories[0]->name == 'Research'): ?>
  <div class="blog-research">
    <div class="grid">
      <div class="blog-research-image" style="background-image: url(<?php echo $img_url[0] ?>);" data-type="background"></div>
      <?php 
          $author = get_post_meta($post->ID, 'Author', true);
        ?>
      <div class="blog-research-author"><?php echo $author; ?></div>
      <div class="blog-research-title">
        <h1><?php the_title(); ?></h1>
       
      </div>
      <div class="blog-content">
        <?php the_content(); ?>
      </div>
      <div class="blog-post-details">
        <?php get_template_part( 'partials/module', 'share' ); ?>
      </div>
      
    </div>
  </div>

  <?php
    wp_reset_query();
  ?>
<?php endif; ?>

<?php if ( ! empty( $categories ) && $categories[0]->name != 'Research'): ?>
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
        <div class="blog-date">
          <?php if (get_the_author_meta('user_login') != 'warhol'): ?>
            Written by <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
              <strong><?php the_author_meta('display_name'); ?></strong>
            </a>
            <span class="blog-bullet"></span>
          <?php endif; ?>
          <?php echo get_the_time( get_option('date_format')) ?>
        </div>
      </div>
    </div>
    <div class="blog-image" style="background-image: url(<?php echo $img_url[0] ?>);" data-type="background"></div>
  </div>

  <div class="grid blog-post">
    <div class="blog-content">
      <?php the_content(); ?>
    </div>
      
    <div class="blog-post-details">
      <?php get_template_part( 'partials/module', 'share' ); ?>
    </div>
      
    <?php
      wp_reset_query();
    ?>
</div>

<?php endif; ?>

