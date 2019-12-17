<?php
/**
 * Tatorient functions and definitions
 *
 */


 /**
 * Enqueue scripts and styles.
 *
 */
function tatorient_scripts() {
	
	
	// Load our main stylesheet.
	wp_enqueue_style( 'tatorient-style', get_stylesheet_uri() );
  wp_enqueue_script( 'libs-script', get_template_directory_uri() . '/js/libs.min.js', array(), '', true );
  wp_enqueue_script( 'common-script', get_template_directory_uri() . '/js/common.min.js', array(), '', true );

}
add_action( 'wp_enqueue_scripts', 'tatorient_scripts' );




add_action( 'init', 'true_register_post_type_init' ); // Использовать функцию только внутри хука init
 
function true_register_post_type_init() {
	
	

	
	


	$labels = array(
		'name' => 'События',
		'singular_name' => 'Событие', // админ панель Добавить->Функцию
		'add_new' => 'Добавить событие',
		'add_new_item' => 'Добавить событие', // заголовок тега <title>
		'edit_item' => 'Редактировать событие',
		'new_item' => 'Новое событие',
		'all_items' => 'Все события',
		'view_item' => 'Просмотр события на сайте',
		'search_items' => 'Искать события',
		'not_found' =>  'Событий не найдено.',
		'not_found_in_trash' => 'В корзине нет событий.',
		'menu_name' => 'События' // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true, // показывать интерфейс в админке
		'has_archive' => true, 
		'menu_icon' => get_stylesheet_directory_uri() .'', // иконка в меню
		'menu_position' => 20, // порядок в меню
		'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt'),
		'taxonomies' => array( 'post_tag')
	);
  register_post_type('sobytie_post', $args);
	
}


	/*
	 * Enable support for Post Thumbnails on posts and pages.
	  */
	add_theme_support( 'post-thumbnails' );

	// Set post thumbnail size.
	set_post_thumbnail_size( 1200, 9999 );

	/*
	 * Let WordPress manage the document title.
   * */
  add_theme_support( 'title-tag' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);


	if (function_exists('add_theme_support')) {
		add_theme_support('menus');
		}

		register_nav_menus( array(
			'footer_menu' => 'Меню в подвале'
		) );



add_filter( 'wpcf7_autop_or_not', '__return_false' );
remove_filter( 'the_content', 'wpautop' );// для контента
remove_filter( 'the_excerpt', 'wpautop' );// для анонсов
remove_filter( 'comment_text', 'wpautop' );// для комментарий




/* Подсчет количества посещений страниц
---------------------------------------------------------- */
add_action('wp_head', 'kama_postviews');
function kama_postviews() {

/* ------------ Настройки -------------- */
$meta_key       = 'views';  // Ключ мета поля, куда будет записываться количество просмотров.
$who_count      = 1;            // Чьи посещения считать? 0 - Всех. 1 - Только гостей. 2 - Только зарегистрированных пользователей.
$exclude_bots   = 1;            // Исключить ботов, роботов, пауков и прочую нечесть :)? 0 - нет, пусть тоже считаются. 1 - да, исключить из подсчета.

global $user_ID, $post;
	if(is_singular()) {
		$id = (int)$post->ID;
		static $post_views = false;
		if($post_views) return true; // чтобы 1 раз за поток
		$post_views = (int)get_post_meta($id,$meta_key, true);
		$should_count = false;
		switch( (int)$who_count ) {
			case 0: $should_count = true;
				break;
			case 1:
				if( (int)$user_ID == 0 )
					$should_count = true;
				break;
			case 2:
				if( (int)$user_ID > 0 )
					$should_count = true;
				break;
		}
		if( (int)$exclude_bots==1 && $should_count ){
			$useragent = $_SERVER['HTTP_USER_AGENT'];
			$notbot = "Mozilla|Opera"; //Chrome|Safari|Firefox|Netscape - все равны Mozilla
			$bot = "Bot/|robot|Slurp/|yahoo"; //Яндекс иногда как Mozilla представляется
			if ( !preg_match("/$notbot/i", $useragent) || preg_match("!$bot!i", $useragent) )
				$should_count = false;
		}

		if($should_count)
			if( !update_post_meta($id, $meta_key, ($post_views+1)) ) add_post_meta($id, $meta_key, 1, true);
	}
	return true;
}



/**
 * Альтернатива wp_pagenavi. Создает ссылки пагинации на страницах архивов.
 *
 * @param array  $args      Аргументы функции
 * @param object $wp_query  Объект WP_Query на основе которого строится пагинация. По умолчанию глобальная переменная $wp_query
 *
 * @version 2.7
 * @author  Тимур Камаев
 * @link    Ссылка на страницу функции: http://wp-kama.ru/?p=8
 */
function kama_pagenavi( $args = array(), $wp_query = null ){

	// параметры по умолчанию
	$default = array(
		'before'          => '',   // Текст до навигации.
		'after'           => '',   // Текст после навигации.
		'echo'            => true, // Возвращать или выводить результат.

		'text_num_page'   => '',           // Текст перед пагинацией.
		// {current} - текущая.
		// {last} - последняя (пр: 'Страница {current} из {last}' получим: "Страница 4 из 60").
		'num_pages'       => 10,           // Сколько ссылок показывать.
		'step_link'       => 10,           // Ссылки с шагом (если 10, то: 1,2,3...10,20,30. Ставим 0, если такие ссылки не нужны.
		'dotright_text'   => '…',          // Промежуточный текст "до".
		'dotright_text2'  => '…',          // Промежуточный текст "после".
		'back_text'       => '« назад',    // Текст "перейти на предыдущую страницу". Ставим 0, если эта ссылка не нужна.
		'next_text'       => 'вперед »',   // Текст "перейти на следующую страницу".  Ставим 0, если эта ссылка не нужна.
		'first_page_text' => '« к началу', // Текст "к первой странице".    Ставим 0, если вместо текста нужно показать номер страницы.
		'last_page_text'  => 'в конец »',  // Текст "к последней странице". Ставим 0, если вместо текста нужно показать номер страницы.
	);

	// Cовместимость с v2.5: kama_pagenavi( $before = '', $after = '', $echo = true, $args = array() )
	if( ($fargs = func_get_args()) && is_string( $fargs[0] ) ){
		$default['before'] = isset($fargs[0]) ? $fargs[0] : '';
		$default['after']  = isset($fargs[1]) ? $fargs[1] : '';
		$default['echo']   = isset($fargs[2]) ? $fargs[2] : true;
		$args              = isset($fargs[3]) ? $fargs[3] : array();
		$wp_query = $GLOBALS['wp_query']; // после определения $default!
	}

	if( ! $wp_query ){
		wp_reset_query();
		global $wp_query;
	}

	if( ! $args ) $args = array();
	if( $args instanceof WP_Query ){
		$wp_query = $args;
		$args     = array();
	}

	$default = apply_filters( 'kama_pagenavi_args', $default ); // чтобы можно было установить свои значения по умолчанию

	$rg = (object) array_merge( $default, $args );

	//$posts_per_page = (int) $wp_query->get('posts_per_page');
	$paged          = (int) $wp_query->get('paged');
	$max_page       = $wp_query->max_num_pages;

	// проверка на надобность в навигации
	if( $max_page <= 1 )
		return false;

	if( empty( $paged ) || $paged == 0 )
		$paged = 1;

	$pages_to_show = intval( $rg->num_pages );
	$pages_to_show_minus_1 = $pages_to_show-1;

	$half_page_start = floor( $pages_to_show_minus_1/2 ); // сколько ссылок до текущей страницы
	$half_page_end   = ceil(  $pages_to_show_minus_1/2 ); // сколько ссылок после текущей страницы

	$start_page = $paged - $half_page_start; // первая страница
	$end_page   = $paged + $half_page_end;   // последняя страница (условно)

	if( $start_page <= 0 )
		$start_page = 1;
	if( ($end_page - $start_page) != $pages_to_show_minus_1 )
		$end_page = $start_page + $pages_to_show_minus_1;
	if( $end_page > $max_page ) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = (int) $max_page;
	}

	if( $start_page <= 0 )
		$start_page = 1;

	// создаем базу чтобы вызвать get_pagenum_link один раз
	$link_base = str_replace( 99999999, '___', get_pagenum_link( 99999999 ) );
	$first_url = get_pagenum_link( 1 );
	if( false === strpos( $first_url, '?') )
		$first_url = user_trailingslashit( $first_url );

	// собираем елементы
	$els = array();

	if( $rg->text_num_page ){
		$rg->text_num_page = preg_replace( '!{current}|{last}!', '%s', $rg->text_num_page );
		$els['pages'] = sprintf( '<span class="pages">'. $rg->text_num_page .'</span>', $paged, $max_page );
	}
	// назад
	if ( $rg->back_text && $paged != 1 )
		$els['prev'] = '<a class="prev" href="'. ( ($paged-1)==1 ? $first_url : str_replace( '___', ($paged-1), $link_base ) ) .'">'. $rg->back_text .'</a>';
	// в начало
	if ( $start_page >= 2 && $pages_to_show < $max_page ) {
		$els['first'] = '<a class="first" href="'. $first_url .'">'. ( $rg->first_page_text ?: 1 ) .'</a>';
		if( $rg->dotright_text && $start_page != 2 )
			$els[] = '<span class="extend">'. $rg->dotright_text .'</span>';
	}
	// пагинация
	for( $i = $start_page; $i <= $end_page; $i++ ) {
		if( $i == $paged )
			$els['current'] = '<span class="current">'. $i .'</span>';
		elseif( $i == 1 )
			$els[] = '<a href="'. $first_url .'">1</a>';
		else
			$els[] = '<a href="'. str_replace( '___', $i, $link_base ) .'">'. $i .'</a>';
	}

	// ссылки с шагом
	$dd = 0;
	if ( $rg->step_link && $end_page < $max_page ){
		for( $i = $end_page + 1; $i <= $max_page; $i++ ){
			if( $i % $rg->step_link == 0 && $i !== $rg->num_pages ) {
				if ( ++$dd == 1 )
					$els[] = '<span class="extend">'. $rg->dotright_text2 .'</span>';
				$els[] = '<a href="'. str_replace( '___', $i, $link_base ) .'">'. $i .'</a>';
			}
		}
	}
	// в конец
	if ( $end_page < $max_page ) {
		if( $rg->dotright_text && $end_page != ($max_page-1) )
			$els[] = '<span class="extend">'. $rg->dotright_text2 .'</span>';
		$els['last'] = '<a class="last" href="'. str_replace( '___', $max_page, $link_base ) .'">'. ( $rg->last_page_text ?: $max_page ) .'</a>';
	}
	// вперед
	if ( $rg->next_text && $paged != $end_page )
		$els['next'] = '<a class="next" href="'. str_replace( '___', ($paged+1), $link_base ) .'">'. $rg->next_text .'</a>';

	$els = apply_filters( 'kama_pagenavi_elements', $els );

	$out = $rg->before . '<div class="wp-pagenavi">'. implode( ' ', $els ) .'</div>'. $rg->after;

	$out = apply_filters( 'kama_pagenavi', $out );

	if( $rg->echo ) echo $out;
	else return $out;
}
/**
 * 2.7 (02.11.2018) - В $args можно указать второй параметр $wp_query, когда $args можно оставить пустым.
 *                  - Правки кода - исправил баги, переделал сбор элементов в массив.
 *                  - Новый хук `kama_pagenavi_elements`.
 * 2.6 (20.10.2018) - Убрал extract().
 *                  - Перенес параметры $before, $after, $echo в $args (старый вариант будет работать).
 * 2.5 - 2.5.1      - Автоматический сброс основного запроса.
 */






// function search_filter($query) {
// 	if ( !is_admin() && $query->is_main_query() ) {
// 	if ($query->is_search) {
// 	$query->set('post_type', array( 'post', 'news', 'documents', 'sorevnovanie' ) );
// 	}}}
// 	add_action('pre_get_posts','search_filter');

function wp_corenavi($wp_query=null) { // функция вывода пагинации
	if (!is_object($wp_query)) {
					global $wp_query; // используем глобальную выборку если не передана пользовательская
			}
  $total = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
  $a['total'] = $total;
  $a['mid_size'] = 3; // сколько ссылок показывать слева и справа от текущей
  $a['end_size'] = 1; // сколько ссылок показывать в начале и в конце
  $a['prev_text'] = '&laquo;'; // текст ссылки "Предыдущая страница"
  $a['next_text'] = '&raquo;'; // текст ссылки "Следующая страница"

  if ( $total > 1 ) echo '<nav class="pagination">';
  echo paginate_links( $a );
  if ( $total > 1 ) echo '</nav>';
}





$true_page = 'myparameters.php'; // это часть URL страницы, рекомендую использовать строковое значение, т.к. в данном случае не будет зависимости от того, в какой файл вы всё это вставите
 
/*
 * Функция, добавляющая страницу в пункт меню Настройки
 */
function true_options() {
	global $true_page;
	add_dashboard_page( 'Параметры сайта', 'Параметры сайта', 'manage_options', $true_page, 'true_option_page');  
}
add_action('admin_menu', 'true_options');
 
/**
 * Возвратная функция (Callback)
 */ 
function true_option_page(){
	global $true_page;
	?><div class="wrap">
		<h2>Дополнительные параметры сайта</h2>
		<form method="post" enctype="multipart/form-data" action="options.php">
			<?php 
			settings_fields('true_options'); // меняем под себя только здесь (название настроек)
			do_settings_sections($true_page);
			?>
			<p class="submit">  
				<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />  
			</p>
		</form>
	</div><?php
}
 
/*
 * Регистрируем настройки
 * Мои настройки будут храниться в базе под названием true_options (это также видно в предыдущей функции)
 */
function true_option_settings() {
	global $true_page;
	// Присваиваем функцию валидации ( true_validate_settings() ). Вы найдете её ниже
	register_setting( 'true_options', 'true_options', 'true_validate_settings' ); // true_options
 
	// Добавляем секцию
	add_settings_section( 'true_section_1', 'Настройки сайта', '', $true_page );
 
	// Создадим текстовое поле в первой секции
	$true_field_params = array(
		'type'      => 'text', // тип
		'id'        => 'my_phone',
		'desc'      => 'Телефон на странице Контакты', // описание
		'label_for' => 'my_phone' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
	);
	add_settings_field( 'my_phone_field', 'Телефон', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params );

	$true_field_params = array(
		'type'      => 'text', // тип
		'id'        => 'my_vk',
		'desc'      => 'Вконтакте', // описание
		'label_for' => 'my_vk' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
	);
	add_settings_field( 'my_vk_field', 'Вконтакте', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params );
 
	$true_field_params = array(
		'type'      => 'text', // тип
		'id'        => 'my_ig',
		'desc'      => 'Инстаграм', // описание
		'label_for' => 'my_ig' // позволяет сделать название настройки лейблом (если не понимаете, что это, можете не использовать), по идее должно быть одинаковым с параметром id
	);
	add_settings_field( 'my_ig_field', 'Инстаграм', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params );
 
	
	
}
add_action( 'admin_init', 'true_option_settings' );
 
/*
 * Функция отображения полей ввода
 * Здесь задаётся HTML и PHP, выводящий поля
 */
function true_option_display_settings($args) {
	extract( $args );
 
	$option_name = 'true_options';
 
	$o = get_option( $option_name );
 
	switch ( $type ) {  
		case 'text':  
			$o[$id] = esc_attr( stripslashes($o[$id]) );
			echo "<input class='regular-text' type='text' id='$id' name='" . $option_name . "[$id]' value='$o[$id]' />";  
			echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
		break;
	}
}
 
/*
 * Функция проверки правильности вводимых полей
 */
function true_validate_settings($input) {
	foreach($input as $k => $v) {
		$valid_input[$k] = trim($v);
 
		/* Вы можете включить в эту функцию различные проверки значений, например
		if(! задаем условие ) { // если не выполняется
			$valid_input[$k] = ''; // тогда присваиваем значению пустую строку
		}
		*/
	}
	return $valid_input;
}