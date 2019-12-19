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
      <h2>Ошибка 404 - Страницы не существует.</h2>
		</section>
		
		<?php get_template_part( 'sidebar' ); ?>

	</div>
</div>
<?php get_footer();
