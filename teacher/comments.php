<?php
/**
 * The template file for displaying the comments and comment form for the
 
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
*/
?>

<section class="comments">
  <div class="comments__btn--center">
    <h2 class="comments__btn">Оставить комментарий</h2>
  </div>
              
    <?php echo do_shortcode( '[anycomment]' ); ?>

</section>