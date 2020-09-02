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
			<?php
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
						?>
            <div class="single-post-img">
              <?php the_post_thumbnail(); ?>
            </div>
						<h2><?php the_title(); ?></h2>
						<div class="main__content">
								<?php the_content(); ?>
            </div>
            <?php
				}
				if( comments_open() ){ ?>
					<section class="comments">
						<div class="comments__btn--center">
							<h2 class="comments__btn">Оставить отзыв</h2>
						</div>
												
							<?php echo do_shortcode( '[anycomment]' ); ?>

					</section>
				<?php }
			}?>
		</section>
		
		<?php get_template_part( 'sidebar' ); ?>

	</div>
</div>

  


<?php get_footer();
