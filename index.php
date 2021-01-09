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

<script src="<?php echo get_template_directory_uri(); ?>/static/vendor/splide.min.js"></script>

<script type="text/javascript">
  $('.coast-video-overlay').click(function() {
    $(this).css('display', 'none').next().css('opacity', '1');
    $("iframe")[0].src += "&autoplay=1";
  });

  var splide = $('.splide__list');
  splide.parent().addClass('splide__track').parent().addClass('splide');
  splide.children().addClass('splide__slide');
  document.addEventListener( 'DOMContentLoaded', function () {
		new Splide('.splide', {
      type   : 'slide',
	    perPage: 3,
	    perMove: 1,
      breakpoints: {
        900: {
          perPage: 2
        },
        680: {
          perPage: 1,
        },
      }
    }).mount();
	});

</script>