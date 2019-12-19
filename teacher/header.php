<?php
/**
 * Header file for the Tatorient WordPress  theme.
 */

?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <title><?php bloginfo('name'); ?></title>
  <meta name="description" content="Добро пожаловать на персональный сайт учителя математики" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta name="format-detection" content="telephone=no">
  <link rel="shortcut icon" href="<?php echo  get_stylesheet_directory_uri(); ?>/images/favicon.png" type="image/png">
  <link rel="stylesheet" href="<?php echo  get_stylesheet_directory_uri(); ?>/libs/slick/slick.css">
  <link rel="stylesheet" href="<?php echo  get_stylesheet_directory_uri(); ?>/libs/air-datepicker/datepicker.min.css">
  <link rel="stylesheet" href="<?php echo  get_stylesheet_directory_uri(); ?>/style.css">
  <?php wp_head();?>

</head> 
<body>
  <header class="header">
    <div class="header-top">
      <div class="wrapper">
        <div class="header-top__wrapper">
          <?php $all_options = get_option('true_options'); ?>
          <a href="mailto:<?php echo $all_options['my_email']; ?>" class="header__mail"><?php echo $all_options['my_email']; ?></a>
          <a href="tel:<?php echo $all_options['my_phone']; ?>" class="header__phone"><?php echo $all_options['my_phone']; ?></a>
          
          <?php if ( is_user_logged_in() ) { 
            $current_user = wp_get_current_user();
                echo '<a href="http://alexandrovazoya.ru/wp-admin/profile.php" class="user-name">' . $current_user->user_login . '</a>';?>
            <a href="<?php echo wp_logout_url(); ?>" class="user-logout">Выход</a>
          <?php } else { ?>
            <a class="lrm-login lrm-hide-if-logged-in">Вход/Регистрация</a>
          <?php } ?>
        </div>
      </div>
    </div>
    <div class="header-center">
      <div class="wrapper header-center__wrapper">
        <h1 class="title">Персональный сайт учителя математики <strong>Александровой Зои Алексеевны</strong></h1>
      </div>
    </div>
    <div class="header-bottom">
      <nav class="menu">
        <div class="wrapper">
        <?php
          wp_nav_menu( [
            'theme_location' => 'header-menu',
          ] );?>
        </div>
      </nav>
    </div>
  </header>

  <main class="main">
    