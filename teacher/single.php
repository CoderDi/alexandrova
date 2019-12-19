<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 */

get_header();
?>


  <div class="wrapper">
    <div class="main__wrapper">
      <section class="content">
        <div class="main__content">
          <div class="photo"><img src="<?php echo  get_stylesheet_directory_uri(); ?>/images/foto.jpg" alt=""></div>
          <h2>Добро пожаловать на мой сайт!</h2>
          <p>Я очень рада видеть Вас у себя в гостях!</p>
          <p>Я надеюсь, что путешествие по сайту будет не только интересным, но и познавательным. На страничках моего сайта вы найдёте много полезной и интересной информации.</p>
          <p>Буду рада знакомству, надеюсь на сотрудничество и общение с Вами, дорогие друзья!</p>
        </div>
        
        <div class="news__list">
          <h2 class="news__list_title">Актуальные новости</h2>

          <?php $story = new WP_Query( array( 'post_type' => 'post','posts_per_page' => 3 ) ); 
                
          if ( $story->have_posts() ) {?>
            <?php while ( $story->have_posts() ) : $story->the_post();?>
                
            <div class="news">
              <h3 class="hews__title"><?php the_title(); ?></h3>
              <div class="news__meta">
                <span class="news__author"><?php the_author(); ?></span>
                <span class="news__date"><?php the_date(); ?></span>
              </div>
              <p class="news__text"><?php the_excerpt(); ?></p>
              <div class="news__bottom">
                <a href="<?php the_permalink(); ?>" class="btn news__btn">Читать полностью</a>
              </div>
            </div>
          
            <?php endwhile;?>
            <?php wp_reset_postdata(); ?>
          <a href="/news" class="btn btn-more">Смотреть все новости</a>

          <?php } else {?>
            <span class="calendar__item_date">Пока нет ни одной новости, скоро они здесь появятся...</span>
          <?php } ?>
        </div>
        
        <div class="form">
          <strong class="form__title">Уважаемые обучающиеся, родители и коллеги! <br> Жду ваших вопросов, пожеланий и предложений!</strong>
          <?php echo do_shortcode( '[contact-form-7 id="7" title="Контактная форма 1" html_class="form__block"]'); ?>
        </div>
      </section>

      <?php get_template_part( 'sidebar' ); ?>

    </div>



    <div class="partners__container">
      <h2 class="partners__title">Полезные ссылки</h2>
      <div class="partners">

      <?php $story = new WP_Query( array( 'post_type' => 'partners', 'posts_per_page' => 100 ) ); 
                
        if ( $story->have_posts() ) {?>

        <?php while ( $story->have_posts() ) : $story->the_post();?>		

          <a href="<?php the_field('link'); ?>" class="partner" target="_blank">
            <div class="partner__container">
            <?php the_post_thumbnail(); ?>
              <strong><?php the_title(); ?></strong>
            </div>
          </a>
      
        <?php endwhile;
          wp_reset_postdata(); } ?>
      </div>
    </div>


    </div>
    <?php  if ( have_posts() ) {?>
    <?php while ( have_posts() ) : the_post();?>
      <div class="article-top flex">
        <h1 class="article__title"><?php the_title(); ?></h1>
        <div class="news-page__item_metas">
          <span class="news-page__item_meta">Дата: <?php the_date(); ?></span>
          <span class="news-page__item_meta">Просмотров: <?php the_field('views'); ?></span>
          <span class="news-page__item_meta">Добавил: <?php the_author(); ?></span>
        </div>
      </div>
      <div class="article__img"><?php the_post_thumbnail(); ?></div>
      <div class="article__content">
        <p><?php the_content(); ?></p>
      </div> 

  <section class="comments">
    
    <?php echo do_shortcode( '[anycomment]' ); ?>

  </section>
  
  <?php endwhile;?>
<?php } ?>

<?php get_footer();
