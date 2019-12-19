<?php
/*
Template Name: Reviews
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
						<h2><?php the_title(); ?></h2>
						<div class="main__content">
								<?php the_content(); ?>
            </div>
            <section class="comments">
              <div class="comments__btn--center">
                <h2 class="comments__btn">Оставить отзыв</h2>
              </div>
                          
                <?php echo do_shortcode( '[anycomment]' ); ?>

            </section>
						<?php
				}
			}?>
		</section>
		
		<?php get_template_part( 'sidebar' ); ?>

	</div>
</div>

  


<?php get_footer();
