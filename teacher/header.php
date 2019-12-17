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
	<meta property="og:title" content="Федерация спортивного ориентирования Республики Татарстан"/>
	<meta property="og:description" content=""/>
	<meta property="og:image" content="https://tatorient.ru/wp-content/uploads/2019/11/news2.png"/>
	<meta property="og:type" content="profile"/>
	<meta property="og:url" content= "https://tatorient.ru/" />
    <meta name="format-detection" content="telephone=no">
    <link rel="shortcut icon" href="<?php echo  get_stylesheet_directory_uri(); ?>/img/favicons/favicon.png" type="image/png">

    <?php wp_head(); 
    $all_options = get_option('true_options');
    ?>
  </head>
  <body>
    <main class="content     <?php if (!(is_front_page())) { 
                                echo " content--page"; } ?>">
      <?php if (!(is_front_page())) {
        echo "<div class='page-left'></div>";} ?>
      <header class="header">
        <div class="wrapper">
          <div class="header__wrapper flex"><a class="logo flex" href="/"><img src="<?php echo  get_stylesheet_directory_uri(); ?>/img/icons/icons.svg#logo" alt="Логотип"><strong>федерация спортивного <br>ориентирования<br>республики татарстан</strong></a>
            <div class="menu">
              <div class="menu__container"><a class="logo flex menu__logo" href="/"><img src="<?php echo  get_stylesheet_directory_uri(); ?>/img/icons/icons.svg#logo" alt="Логотип"><strong>федерация спортивного <br>ориентирования<br>республики татарстан</strong></a>
                <div class="socials flex header__socials">
                  <?php $vk = $all_options['my_vk']; 
                    if ($vk) {?>
                      <a class="socials__item socials__item--vk" href="<?php echo $all_options['my_vk']; ?>" target="_blank">
                        <img src="<?php echo  get_stylesheet_directory_uri(); ?>/img/icons/icons.svg#vk" alt="">
                      </a>
                  <?php } ?>
                  
                  <?php $ig = $all_options['my_ig']; 
                    if ($ig) {?>
                      <a class="socials__item socials__item--ig" href="<?php echo $all_options['my_ig']; ?>" target="_blank">
                        <img src="<?php echo  get_stylesheet_directory_uri(); ?>/img/icons/icons.svg#insta" alt="">
                      </a>
                  <?php } ?>
                </div>
                <ul class="menu-main flex">
                  <li class="menu-main__item"><a href="/news">новости</a></li>
                  <li class="menu-main__item"><a href="/federation">федерация</a></li>
                  <li class="menu-main__item"><a href="/national">сборная</a></li>
                  <li class="menu-main__item"><a href="/sorevnovania">соревнования</a></li>
                  <li class="menu-main__item"><a href="/docs">документы</a></li>
                  <li class="menu-main__item"><a href="/story">история</a></li>
                  <li class="menu-main__item"><a href="/poleznye-ssylki">ссылки</a></li>
                  <li class="menu-main__item"><a href="/contacts">контакты</a></li>
                </ul>
              </div>
            </div>
            <div class="socials flex mobile__socials"><a class="socials__item socials__item--vk" href="https://vk.com/orientrt" target="_blank"><img src="<?php echo  get_stylesheet_directory_uri(); ?>/img/icons/icons.svg#vk" alt=""></a><a class="socials__item socials__item--ig" href="https://www.instagram.com/orientrt/" target="_blank"><img src="<?php echo  get_stylesheet_directory_uri(); ?>/img/icons/icons.svg#insta" alt=""></a></div>
            <div class="butter"></div>
          </div>
        </div>
      </header>