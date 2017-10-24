<?php get_header(); ?>

<section id="blog-single-post">
<div class="container">
	<div class="row">
		<div class="col-sm-9">
			<?php
      if ( have_posts() ) : while ( have_posts() ) : the_post();
        get_template_part( 'content-single', get_post_format() );

      if ( comments_open() || get_comments_number() ) :
        comments_template();
      endif;
      endwhile; endif;
			?>
		</div> <!-- /.col -->
		<?php get_sidebar(); ?>
	</div> <!-- /.row -->
</div>
</section>
<?php get_footer(); ?>
