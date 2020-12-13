<?php
/**
 * Home page template
 */
?>

<?php get_header(); ?>

<?php
  if (have_posts()): while (have_posts()): the_post();
    the_content();
  endwhile; endif;
?>

<?php
  wp_enqueue_script( 'index' );
  get_footer(); 
?>

<script type="text/javascript">
  $('.coast-video-overlay').click(function() {
    $(this).css('display', 'none').next().css('opacity', '1');
  });
  // $('.home-page-gallery .blocks-gallery-grid').slick({ dots: true });
</script>