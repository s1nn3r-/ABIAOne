<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		//Show featured image if not homepage 
		if ( !is_front_page() ) {
			if ( has_post_thumbnail(get_the_ID() ) ) {
				echo get_the_post_thumbnail( get_the_ID(), 'my_custom_size', array( 'class' => 'aligncenter img-responsive' ) );
			}else {				
				?><img src="<?php echo get_template_directory_uri(); ?>/images/pool_table_movers-900x200.jpg" class="aligncenter img-responsive" alt="professional pool table movers" /><?php
			}
		}
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'abiaone' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	
</article><!-- #post-## -->
