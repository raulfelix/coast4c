<?php
/*
 * The Header
 */
?>
<!DOCTYPE html>

<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="google-site-verification" content="Z61YOU3iGmI_SS1oPoH3b1C1eweD_BlbgZnpH4QWrJU" />
  <title><?php wp_title(''); ?></title>
  <?php $uri = get_template_directory_uri(); ?>
  <link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/static/images/favicon-96x96.png">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri(); ?>/master.css?ver=2" rel="stylesheet">

  <?php if ( is_single() ): ?>
    <meta property="og:title" content="<?php echo the_title() ?>" />
    <meta property="og:site_name" content="Coast 4C"/>
    <meta property="og:url" content="<?php echo get_the_permalink() ?>" />
    <meta property="fb:app_id" content="852240585593084" />
    <meta property="og:image" content="<?php echo get_search_thumbnail()[0] ?>" />
  <?php endif; ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <?php wp_head(); ?>
</head>

<body>
  <?php get_template_part('partials/header', 'nav'); ?>
