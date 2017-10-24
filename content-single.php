<!-- Blog Single Post Section -->


     
          <div class="row">

               <div class="col-md-12 col-sm-12">
                    <div class="blog-single-post-thumb">
                         
					  <div class="blog-post-title">
                           <h2><?php the_title(); ?></a></h2>
                      </div>
	
					 <div class="blog-post-meta">
                          <span><?php the_author(); ?></span>
                          <span><i class="fa fa-date"></i> <?php the_date(); ?></span>                          
                     </div>											

					<div class="blog-post-des">
						
						<?php echo get_the_post_thumbnail( get_the_ID(), 'my_custom_size', array( 'class' => 'aligncenter img-responsive' ) ); ?>
						
						<?php the_content(); ?>
					</div>

					<?php the_tags();?>
				</div><!-- /.blog-post -->

    		</div>
          </div>

