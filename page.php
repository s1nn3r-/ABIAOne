<?php get_header(); ?>
<section id="blog-single-post">
<div class="container">
	<div class="row">
		<div class="col-sm-9 blog-main">
<?php ?>
<?php
				if ( have_posts() ) : while ( have_posts() ) : the_post();

					get_template_part( 'content', get_post_format() );

				endwhile; endif;
			?>
 
     </div> <!-- /.col -->
     
     <?php get_sidebar(); ?>
	</div> <!-- /.row -->
</div>
</section>
<?php get_footer(); ?>
