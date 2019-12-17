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


<?php
	$s=get_search_query();
	$args = array(
		's' =>$s,
		'post_type' => $_GET['ptype'],
		'category_name' => $_GET['category'],
		'relation' => 'AND', 
		'posts_per_page' => 100,
		'meta_query' => array()
	);
	if( ! empty( $_GET['doc_year'] ) )
		$args['meta_query'][] = array(
			'key' => 'doc_year',
			'value' => $_GET['doc_year']
		);
    // The Query
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {
				_e("<h2 style='font-weight:bold;color:#000;margin:0 0 20px 0'>Результаты поиска для: ".get_query_var('s')."</h2>");?>
				<div class="docs__list">
        <?php while ( $the_query->have_posts() ) {
					 $the_query->the_post();
                 ?>
								 <?php $post_type = get_post_type( $post_id ) ?> 
									<? if ($post_type == 'documents') { ?>
										<a class="file file-doc flex" href="<?php the_field('doc_file'); ?>"><i></i><span><?php the_title(); ?></span></a>
								<?php	} 
									elseif ($post_type == 'sorevnovanie')  {?>
									
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

									<?php }
									
									else {?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
									<?php }
				}?>
				</div>
    <?php }else{
?>
        <h2 style='font-weight:bold;color:#000'>Ничего не найдено!</h2>
        <div class="alert alert-info">
          <p>Измените критерии поиска</p>
        </div>
<?php } ?>
<?php
get_footer();
