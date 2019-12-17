<form class="national__form search-form" role="search" method="get" action="<?php echo home_url( '/' ); ?>">

<?php $categories = get_categories( array(
      'taxonomy'     => 'category',
      'type'         => 'post',
      'child_of'     => 0,
      'parent'       => '',
      'orderby'      => 'name',
      'order'        => 'ASC',
      'hide_empty'   => 1,
      'exclude'      => '',
      'include'      => '',
      'number'       => 0,
      'pad_counts'   => false
    ) );

if( $categories ){?>

  <select class="select" name="category">

    <option value="" default>категория</option>
    <?php 
      foreach( $categories as $cat ){ ?>
      
        <option value="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></option>

    <?php } ?>

  </select>
	
<?php } ?>
  
  
  <select class="select" name="doc_year">
    <option value="" default>год</option>
    <option value="2017">2016</option>
    <option value="2018">2017</option>
    <option value="2019">2018</option>
    <option value="2017">2019</option>
    <option value="2018">2020</option>
  </select>

  <?php 
    $str = "";
    if (is_page(12)) {
      $str = "sorevnovanie";
    } elseif ((is_page(18))||(is_page(8))) {
      $str = "documents";
    } ?>
  <input type="hidden" name="ptype" value="<?php echo $str; ?>">
  
  <label class="label">
    <input class="input search-field" type="search" placeholder="<?php echo esc_attr_x( 'Искать …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>">
    <button class="button" type="submit"></button>
  </label>
</form>