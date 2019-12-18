<?php
/*
Template Name: Frontpage
*/

get_header(); ?>

		<div class="slider">
      <div class="wrapper">
        <div class="slider__wrapper js-slider">
          <div class="slider__item">
            <div class="slider__item_container"><img src="<?php echo  get_stylesheet_directory_uri(); ?>/images/slide1.jpg" alt=""></div>
          </div>
          <div class="slider__item">
            <div class="slider__item_container"><img src="<?php echo  get_stylesheet_directory_uri(); ?>/images/slide2.jpg" alt=""></div>
          </div>
          <div class="slider__item">
            <div class="slider__item_container"><img src="<?php echo  get_stylesheet_directory_uri(); ?>/images/slide3.jpg" alt=""></div>
          </div>
          <div class="slider__item">
            <div class="slider__item_container"><img src="<?php echo  get_stylesheet_directory_uri(); ?>/images/slide4.jpg" alt=""></div>
          </div>
          <div class="slider__item">
            <div class="slider__item_container"><img src="<?php echo  get_stylesheet_directory_uri(); ?>/images/slide3.jpg" alt=""></div>
          </div>
        </div>
      </div>
    </div>
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

        <aside class="sidebar">
          <div class="sidebar__block">
            <div class="sidebar__block_content">
							<?php echo do_shortcode( '[bvi text="Версия сайта для слабовидящих"]' ); ?>
            </div>
          </div>

          <div class="sidebar__block">
            <strong class="sidebar__block_title">Поиск по сайту:</strong>
            <div class="sidebar__block_content">
              <form class="search-form">
                <input type="text" class="input search-input" placeholder="Введите запрос...">
                <input type="submit" value="" class="search-submit">
              </form>
            </div>
          </div>

          <div class="sidebar__block">
            <strong class="sidebar__block_title">Последние комментарии</strong>
            <div class="sidebar__block_content">
              <ul class="recent-comments">
                <?php kama_recent_comments("limit=10&ex=40"); ?>
              </ul>
            </div>
          </div>

          <div class="sidebar__block">
            <strong class="sidebar__block_title">Календарь</strong>
            <div class="sidebar__block_content">
              <div class="datepicker-here"></div>
            </div>
          </div>

          <div class="sidebar__block sidebar__block_polls">
            <div class="sidebar__block_content">
              <?php if ( function_exists( 'vote_poll' ) && ! in_pollarchive() ): ?>
                <ul class="polls__list">
                    <li><?php get_poll();?></li>
                </ul>
              <?php endif; ?>
            </div>
          </div>
        </aside>
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

<?php get_footer(); ?>
