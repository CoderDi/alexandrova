<?php
/*
Template Name: News
*/

get_header();
?>
      <section class="page news-page">
        <div class="wrapper">
          <div class="page__wrapper">
            <h2 class="news__title">Новости</h2>
            <?php 
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $story = new WP_Query( array( 'post_type' => 'novosti', 'posts_per_page' => 10, 'paged' => $paged ) ); 
									
					  if ( $story->have_posts() ) {?>
              <div class="news-page__list">
                <?php while ( $story->have_posts() ) : $story->the_post();?>
                  
                  <div class="news-page__item">
                    <div class="news-page__item_img">
                    <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="news-page__item_content">
                      <h3 class="news-page__item_title"><?php the_title(); ?></h3>
                      <div class="news-page__item_metas">
                        <span class="news-page__item_meta">Дата: <?php the_date(); ?></span>
                        <span class="news-page__item_meta">Просмотров: <?php the_field('views'); ?></span>
                        <span class="news-page__item_meta">Добавил: <?php the_author(); ?></span>
                      </div>
                      <p class="news-page__item_text"><?php the_excerpt(); ?></p>
                      <a class="btn news-page__item_btn" href="<?php the_permalink(); ?>">читать</a>
                    </div>
                  </div>
              
                <?php endwhile;?>
              </div>
            
            <?php } else {?>
							<span class="calendar__item_date">Пока нет ни одной новости, скоро они здесь появятся...</span>
						<?php } ?>

            <?php wp_corenavi($story); ?>
                <?php wp_reset_postdata(); ?>
          </div>
        </div>
      </section>
    

<?php
  get_footer();