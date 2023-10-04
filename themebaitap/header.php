<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="//fdn.fontcdn.ir">
  <link rel="preconnect" href="//v1.fontapi.ir">
  <link href="https://v1.fontapi.ir/css/SFProDisplay" rel="stylesheet">
  <?php
  wp_head();
  ?>
  <title>Bai Tap</title>
</head>

<body>
  <div class="main">
    <div class="navbar">
      <div class="navbar__wrapper">
        <div class="navbar__logo">
          <?php the_custom_logo(); ?>
        </div>
        <div class="icon" id="dropdownIcon"><i class="fas fa-bars" onclick="clickFunction()"></i>
        </div>
        <?php
        wp_nav_menu(
          array(
            'menu' => 'primary',
            'container' => '',
            'theme_location' => 'primary',
            'items_wrap' => '<ul id="dropdown" class="navbar__menu">%3$s</ul>'
          )
        )
          ?>
      </div>
    </div>
