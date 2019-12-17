<?php
/**
 * The template for displaying the footer
 *
 */

?> 
 </main>
    <footer class="footer"><img class="shape footer__shape3" src="<?php echo  get_stylesheet_directory_uri(); ?>/img/shape3.svg" alt=""><img class="shape footer__shape4" src="<?php echo  get_stylesheet_directory_uri(); ?>/img/shape4.svg" alt="">
      <div class="wrapper">
        <div class="footer__wrapper">
          <a class="footer__logo" href="">
            <img src="<?php echo  get_stylesheet_directory_uri(); ?>/img/icons/icons.svg#logo-white" alt="">
          </a>
          

            <?php $all_options = get_option('true_options'); ?>

            <div class="socials flex footer__socials">
                  <?php $vk = $all_options['my_vk']; 
                    if ($vk) {?>
                      <a class="socials__item socials__item--vk" href="<?php echo $all_options['my_vk']; ?>" target="_blank">
                        <img src="<?php echo  get_stylesheet_directory_uri(); ?>/img/icons/icons.svg#vk-white" alt="">
                      </a>
                  <?php } ?>
                  
                  <?php $ig = $all_options['my_ig']; 
                    if ($ig) {?>
                      <a class="socials__item socials__item--ig" href="<?php echo $all_options['my_ig']; ?>" target="_blank">
                        <img src="<?php echo  get_stylesheet_directory_uri(); ?>/img/icons/icons.svg#insta-white" alt="">
                      </a>
                  <?php } ?>
            </div>
        </div>
        <?php wp_nav_menu( array( 'container_class' => 'footer--menu', 'theme_location' => 'footer_menu' ) ); ?>
        
      </div>
    </footer>
    

    <?php wp_footer(); ?>
  </body>
</html>