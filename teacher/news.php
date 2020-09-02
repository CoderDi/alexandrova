<?php
/*
Template Name: News
*/

get_header();
?>
<div class="wrapper">
	<div class="main__wrapper">
		<section class="content">
		<?php echo wpcourses_breadcrumb( ' / ' ); ?>
      
    <?php $story = new WP_Query( array( 'post_type' => 'post','posts_per_page' => 100 ) ); 
									
      if ( $story->have_posts() ) {?>
      <div class="news__list news--page">
            <h2 class="news__list_title">Актуальные новости</h2>

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
      </div>
      <?php } ?>
		</section>
		
		<?php get_template_part( 'sidebar' ); ?>

	</div>
</div>
<?php get_footer();
