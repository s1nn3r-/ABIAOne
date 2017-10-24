<!-- Footer Section -->
<footer>
 <div class="container">
      <div class="row">
         <div class="col-md-4 col-sm-4">
               <?php if ( is_active_sidebar( 'sidebar-footer-1' ) ) : ?>

                   <?php dynamic_sidebar( 'sidebar-footer-1' ); ?>
               
               <?php endif; ?>
           </div>
           <div class="col-md-4 col-md-offset-0 col-sm-4">
               <?php if ( is_active_sidebar( 'sidebar-footer-2' ) ) : ?>

                   <?php dynamic_sidebar( 'sidebar-footer-2' ); ?>

               <?php endif; ?>
           </div>
           <div class="col-md-4 col-md-offset-0 col-sm-4">
               <?php if ( is_active_sidebar( 'sidebar-footer-3' ) ) : ?>

                   <?php dynamic_sidebar( 'sidebar-footer-3' ); ?>

               <?php endif; ?>
           </div>
           <div class="clearfix col-md-12 col-sm-12">
                <hr>
           </div>
           <div class="col-md-12 col-sm-12">
                <ul class="social-icon">
                  <?php
                    social_icons_footer();
                  ?>
                </ul>
           </div>
          </div>
      </div>
 </footer>
<!-- Back top -->
<a href="#back-top" class="go-top"><i class="fa fa-angle-up"></i></a>

<?php
//Footer settings code
echo get_option('footer_code');
?>

<?php wp_footer(); ?>
</body>
