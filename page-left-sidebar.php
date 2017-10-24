<?php
/**
 * Template name: Left Sidebar
 */
?>
<?php get_header(); ?>
<section id="blog-single-post">
<div class="container">
	<div class="row">

    <?php get_sidebar(); ?>

		<div class="col-sm-9">

			<?php
				if ( have_posts() ) : while ( have_posts() ) : the_post();

					get_template_part( 'content', get_post_format() );

				endwhile; endif;
			?>
     </div> <!-- /.col -->
	</div> <!-- /.row -->
</div>
</section>
<?php get_footer(); ?>
