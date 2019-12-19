<?php


get_header();
?>
<div class="wrapper">
	<div class="main__wrapper">
		<section class="content">
    <?php echo wpcourses_breadcrumb( ' / ' ); ?>
			<?php
      if ( have_posts() ) { ?>
        <h2>Архив записей</h2>
        <div class="news__list">

				<?php while ( have_posts() ) {
					the_post();
            ?>

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
            
          <?php } ?>
        </div>
			<?php } ?>
		</section>
		
		<?php get_template_part( 'sidebar' ); ?>

	</div>
</div>
<?php
  get_footer();