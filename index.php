<?php get_header(); ?>
<div class="container">
<div class="row">

		<?php
		$sidebar_position = get_option('sidebar_position');
		//Sidebar option left
		if(!$sidebar_position || $sidebar_position[0] == 'left') :
			get_sidebar();
		endif; ?>

		<!--<div class="col-sm-8 blog-main">-->
		<div class="col-sm-9 blog-main">

			<?php
			$layout = get_option('posts_layout');

			if ( have_posts() ) : while ( have_posts() ) : the_post();

			if($layout && $layout[0] == 'grid')
				get_template_part( 'template-parts/content', 'grid' );
			else
				get_template_part( 'content', get_post_format() );

			endwhile; endif;
			?>
      <nav>
     	<ul class="pager">
     		<li><?php next_posts_link( 'Previous' ); ?></li>
     		<li><?php previous_posts_link( 'Next' ); ?></li>
     	</ul>
     </nav>
		</div> <!-- /.blog-main -->

		<?php
		//Sidebar option right
		if($sidebar_position && $sidebar_position[0] == 'right') :
			get_sidebar();
		endif; ?>

	</div> <!-- /.row -->
</div><!-- /.container -->

<?php get_footer(); ?>

</html>
