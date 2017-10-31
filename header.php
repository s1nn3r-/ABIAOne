<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="author" content="<?php echo get_bloginfo( 'author' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php wp_head();?>
<?php echo get_option('header_code'); ?>
<?php if(get_option('custom_css')): ?>
  <style>
  <?php echo get_option('custom_css'); ?>
  </style>
<?php endif; ?>
</head>
<body <?php body_class(); ?>>
<header id="header">
<nav class="navbar navbar-default navbar-fixed-top">
        <div class="navbar-header">
		  <div class="container">
             <?php if( get_option( 'logo_file' ) != '') { ?>
                 <a href="<?php echo site_url();?>" class="navbar-brand">
                	<img src="<?php echo wp_get_attachment_url( get_option( 'logo_file' )); ?>">
                 </a>
             <?php } else { ?>
               <a href="<?php echo site_url();?>" class="navbar-brand"><?php echo get_bloginfo( 'name' ); ?></a>
             <?php } ?>
			 <div class="pull-right">
	          <a href="tel:+1<?php echo get_option('phone'); ?>"><i class="fa fa-phone-square" aria-hidden="true"></i> <?php echo get_option('phone'); ?></a>
             </div>
   	    <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>Menu
        </button>
	    </div>
		</div>
        <div id="navbar" class="navbar-collapse collapse navbar-right">
		  <div class="container">
		  	<?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => 'ul', 'menu_class' => 'nav navbar-nav' ) ); ?>
             <ul class="social">
		    	<?php $fb = get_option('facebook_url');?>
		    	<?php		    	
		    	$tw = get_option('twitter_url');
				$hide_tw = get_option('hide_twitter');				 
		    	?>
		    	<?php $yt = get_option('youtube_url');?>
		    	<?php if($fb) { ?>
		      <li><a href="<?php echo $fb; ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
		      <?php }  ?>
		      <?php if($tw && !$hide_tw) { ?>
		      <li><a href="<?php echo $tw; ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
		      <?php }  ?>
		      <?php if($yt) { ?>
		      <li><a href="<?php echo $yt; ?>" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
		      <?php }  ?>
		    </ul>
		  </div>
        </div><!--/.nav-collapse -->
    </nav>
</header>
<?php if(is_front_page()): ?>
<!-- Home Section -->
<?php
//Get Settings
$enable_particles = get_option('enable_particles');
$background_image = get_option('background_image');
if($background_image) {
  $background_inline = 'style="background-image:url('.wp_get_attachment_url($background_image).')"';
} else $background_inline = "";
?>
<section id="home" <?php echo $background_inline;?> class="main-home parallax-section">
     <div class="overlay"></div>
     <?php if($enable_particles && $enable_particles[0] == 1) : ?>
     <div id="particles-js"></div>
    <?php endif; ?>
     <div class="container">
          <div class="row">
               <div class="col-md-12 col-sm-12">
                    <div class="main-image-text"><?php echo get_bloginfo( 'name' ); ?><br /> <?php echo get_bloginfo( 'description' ); ?></div>
                    <?php $phone = get_option('phone');
                    $phone = str_replace(' ', '', $phone);
                    ?>
                    <h3>Book Your Move</h3><h2><a style="color:white;" href="tel:+1<?php echo $phone; ?>" onMouseOver="this.style.color='#FF7C24'" onMouseOut="this.style.color='#FFF'"><i class="fa fa-phone-square" aria-hidden="true"></i> <?php echo get_option('phone'); ?></a></h2>
                    <a href="<?php echo get_option('more_button_link');?>" class="smoothScroll btn btn-default"><?php echo get_option('more_button_text');?></a>
               </div>
          </div>
        </div>
</section>
<div class="container">
  <div class="row">
   <div class="col-sm-12 text-center border" >
   <p><h2> Know Your Exclusive Service Guarantee</h2>
   <a href="/wp-content/themes/abiaone/images/ABIA_guarantee.pdf" target="_blank"><button type="button" class="btn btn-default btn-lg">Service Guarantee</button></a></p>
   </div>
   </div>
      <div class="row">
         <div class="col-md-4 col-sm-4">
               <?php if ( is_active_sidebar( 'sidebar-home-1' ) ) : ?>

                   <?php dynamic_sidebar( 'sidebar-home-1' ); ?>
               
               <?php endif; ?>
           </div>
           <div class="col-md-4 col-md-offset-0 col-sm-4">
               <?php if ( is_active_sidebar( 'sidebar-home-2' ) ) : ?>

                   <?php dynamic_sidebar( 'sidebar-home-2' ); ?>

               <?php endif; ?>
           </div>
           <div class="col-md-4 col-md-offset-0 col-sm-4">
               <?php if ( is_active_sidebar( 'sidebar-home-3' ) ) : ?>

                   <?php dynamic_sidebar( 'sidebar-home-3' ); ?>

               <?php endif; ?>
           </div>           
          </div>
        </div>
<?php endif; ?>
<!--</div>-->
