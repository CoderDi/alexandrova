<?php
/*
Template Name: Frontpage
*/

get_header();
?>
<?php $story = new WP_Query( array( 'post_type' => 'slide', 'posts_per_page' => 8 ) ); 
									
					if ( $story->have_posts() ) {?>

		<section class="slider js-slider">
			
							<?php while ( $story->have_posts() ) : $story->the_post();?>
								

								<div class="slider__item" style="background: <?php the_field('color'); ?>">
									<div class="wrapper">
										<div class="slider__item_wrapper">
											<div class="slider__item_content">
												<h2 class="slider__item_title" style="color: <?php the_field('czvet_teksta'); ?>"><strong><?php the_title(); ?></strong><br><?php the_excerpt(); ?></h2>
												<a class="btn slider__btn" href="<?php the_permalink(); ?>"><?php the_field('tekst_knopki'); ?></a>
											</div>
											<?php the_post_thumbnail("s slider__item_img slider__item_img--first"); ?>
										</div>
									</div>
								</div>
						
							<?php endwhile;?>
							<?php wp_reset_postdata(); ?>
		</section>
		<?php } ?>

		<section class="news">
			<div class="wrapper">
				<div class="news__wrapper">
					<h2 class="news__title">Новости</h2>
					
					<?php $story = new WP_Query( array( 'post_type' => 'novosti','posts_per_page' => 8 ) ); 
									
					if ( $story->have_posts() ) {?>
						<div class="news__list">

							<?php while ( $story->have_posts() ) : $story->the_post();?>
								<div class="news__item">
									<a class="news__item_container" href="<?php the_permalink(); ?>">
										<div class="news__item--img">
											<?php the_post_thumbnail("news__item_img"); ?>
										</div>
										
										<div class="news__item--content">
											<span><?php the_date(); ?></span>
											<strong><?php the_title(); ?></strong>
										</div>
									</a>
								</div>
						
							<?php endwhile;?>
							<?php wp_reset_postdata(); ?>
						</div>
						<a class="news__btn-more" href="/news">еще новости</a>

						<?php } else {?>
							<span class="calendar__item_date">Пока нет ни одной новости, скоро они здесь появятся...</span>
						<?php } ?>

				</div>
			</div>
		</section>

		<section class="calendar"><img class="shape calendar__shape1" src="<?php echo  get_stylesheet_directory_uri(); ?>/img/shape1.svg" alt=""><img class="shape calendar__shape2" src="<?php echo  get_stylesheet_directory_uri(); ?>/img/shape2.svg" alt="">
			<div class="wrapper">
				<div class="calendar__wrapper">
					<h2 class="calendar__title">Соревнования ФСО РТ</h2>

					<?php $story = new WP_Query( array( 
						'post_type' => 'sorevnovanie',
						'posts_per_page' => 6,
						'meta_key' => 'doc_year', // то самое поле
						'orderby'  => 'meta_value_num',
						'order'    => 'DESC' 
						) ); 
									
					if ( $story->have_posts() ) {?>
						<div class="calendar__list">

							<?php while ( $story->have_posts() ) : $story->the_post();?>

							<div class="calendar__item">
								<a class="calendar__item_container" href="<?php the_permalink(); ?>">
									<div class="calendar__item_icon">
										<img src="<?php echo  get_stylesheet_directory_uri(); ?>/img/icons/icons.svg#logo" alt="">
									</div>
									<span class="calendar__item_date"> Дата: <?php the_field('doc_year'); ?></span>
									<h3 class="calendar__item_title"><?php the_title(); ?></h3>
									<div class="btn calendar__item_btn">УЗНАТЬ БОЛЬШЕ</div>
								</a>
							</div>
						
							<?php endwhile;?>
							<?php wp_reset_postdata(); ?>
						</div>

						<?php } else {?>
							<span class="calendar__item_date">Пока нет ни одной новости, скоро они здесь появятся...</span>
						<?php } ?>

				</div>
			</div>
		</section>
<?php
get_footer();
