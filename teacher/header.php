<?php
/**
 * Header file for the Tatorient WordPress  theme.
 */

?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <title><?php bloginfo('name'); ?></title>
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
          <div class="menu__wrapper flex">
            <div class="menu__item menu__item--withdrop">
              <a href="">Главная</a>
              <ul class="menu-drop">
                <div class="menu-drop__container">
                  <li class="menu-drop__item">
                    <a href="">Карта сайта</a>
                  </li>
                </div>                
              </ul>
            </div>
            <div class="menu__item">
              <a href="">Новости</a>
            </div>
            <div class="menu__item menu__item--withdrop">
              <span>Портфолио</span>
              <ul class="menu-drop">
                <div class="menu-drop__container">
                  <li class="menu-drop__item">
                    <a href="">О себе</a>
                  </li>
                  <li class="menu-drop__item">
                    <a href="">Курсы повышения квалификации</a>
                  </li>
                  <li class="menu-drop__item">
                    <a href="">Обобщение педагогического опыта</a>
                  </li>
                  <li class="menu-drop__item">
                    <a href="">Мои достижения</a>
                  </li>
                  <li class="menu-drop__item">
                    <a href="">Достижения учащихся</a>
                  </li>
                  <li class="menu-drop__item">
                    <a href="">Фотоальбом</a>
                  </li>
                </div>                
              </ul>
            </div>
            <div class="menu__item menu__item--withdrop">
              <span>Полезное</span>
              <ul class="menu-drop">
                <div class="menu-drop__container">
                  <li class="menu-drop__item menu-drop__item--withdrop">
                    <a>Ученикам</a>
                    <ul class="menu-drop menu-drop2">
                      <li class="menu-drop__item">
                        <a href="">Ссылка 1</a>
                      </li>
                      <li class="menu-drop__item">
                        <a href="">Ссылка 2</a>
                      </li>
                    </ul>
                  </li>
                  <li class="menu-drop__item menu-drop__item--withdrop">
                    <a>Коллегам</a>
                    <ul class="menu-drop menu-drop2">
                      <li class="menu-drop__item">
                        <a href="">Ссылка 1</a>
                      </li>
                      <li class="menu-drop__item">
                        <a href="">Ссылка 2</a>
                      </li>
                    </ul>
                  </li>
                  <li class="menu-drop__item">
                    <a href="">Родителям</a>
                  </li>
                  <li class="menu-drop__item">
                    <a href="">ОГЭ</a>
                  </li>
                  <li class="menu-drop__item">
                    <a href="">ЕГЭ</a>
                  </li>
                  <li class="menu-drop__item">
                    <a href="">Медиатека</a>
                  </li>
                </div>
              </ul>
            </div>
            <div class="menu__item">
              <a href="">Методика</a>
            </div>
            <div class="menu__item">
              <a href="">Нормативные документы</a>
            </div>
            <div class="menu__item">
              <a href="">Отзывы</a>
            </div>
            <div class="menu__item">
              <a href="">Контакты</a>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <main class="main">
    