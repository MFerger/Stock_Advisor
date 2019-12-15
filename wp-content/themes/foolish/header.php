<!DOCTYPE html>
<html>
  <head>
    <meta charset="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stock Advisor</title>
  <?php
  wp_head();
  $logo = get_field('logo', 'option');
  ?>
  </head>
  <body>
    <header>
      <div class="container">
        <a href="/">
          <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" />
        </a>
        <?php wp_nav_menu(array('theme_location'=>'main', 'menu_id' => 'top-menu', 'container'=>'ul', 'items_wrap' => '<ul id="%1$s">%3$s</ul>', 'depth'=> 2)); ?>
      </div>
    </header>
    <div class="clearfix spacer"></div>
