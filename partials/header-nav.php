<header class="header">
  <div class="header-wrapper">
  <div class="header-logo">
    <a href="<?php echo get_home_url(); ?>">
      <img src="<?php echo get_template_directory_uri(); ?>/static/images/logo_inline.svg" alt="" />
    </a>
  </div>
  <button type="button" class="nav-mobile-menu" id="nav-mobile-menu">Menu</button>

  <nav class="header-big-nav">
    <button type="button" class="nav-mobile icon-close" id="nav-mobile"></button>
    <?php
      echo wp_nav_menu('footer-1');
    ?>
  </nav>
</div>

<script type="text/javascript">
  var el = document.getElementById('nav-mobile');
  function toggleNav(e) {
    e.preventDefault();
    document.body.classList.toggle('nav-mobile-active');
  }
  el.addEventListener('click', toggleNav, false);

  var button = document.getElementById('nav-mobile-menu');
  button.addEventListener('click', toggleNav, false);

</script>
</header>