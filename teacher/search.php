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
    <?php echo wpcourses_breadcrumb( ' / ' ); ?>
			<h2><?php echo 'Результат поиска: ' . '<span>' . get_search_query() . '</span>'; ?></h2>
			
			<?php
      if ( have_posts() ) { ?>
        
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
			<?php }
				else {
				echo "<p>Извините по Вашему результату ничего не найдено</p>";
				} ?>
		</section>
		
		<?php get_template_part( 'sidebar' ); ?>

	</div>
</div>

<?php
get_footer();
