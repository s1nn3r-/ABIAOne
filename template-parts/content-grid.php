<?php
/**
 * Template part for displaying posts in grid
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package abia
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="col-md-6 col-sm-6 col-xs-12">
	<div class="pt-cv-ifield">
		<header class="entry-header">
			<?php
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php the_date(); ?> by <?php the_author_link(); ?>
			</div><!-- .entry-meta -->
			<?php
			endif; ?>
		</header><!-- .entry-header -->
		<div class="entry-content">
			<?php the_post_thumbnail('loop',  array( 'class' => 'img-responsive' )); ?>
			<?php the_excerpt(); ?>
		</div>
</div>
</div>


</article><!-- #post-## -->
