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
<article class="article">
  <div class="wrapper">
    <div class="article__wrapper">
      <?php 
        if ( have_posts() ) {?>
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
          <div class="comments__btn--center"><span class="btn comments__btn js-auth">оставить комментарий</span></div>
                      
          <?php echo do_shortcode( '[anycomment]' ); ?>

        </section>
        
        <div class="article__nav">
          <div class="article__nav_left article__nav_block">
            <?php previous_post_link('%link','<strong>%title</strong>'); ?>
          </div>
          <div class="article__nav_right article__nav_block">
            <?php next_post_link('%link','<strong>%title</strong>'); ?> 
          </div>
        </div>
        
        <?php endwhile;?>
        <?php } ?>

    </div>
  </div>
</article>



<?php
get_footer();
