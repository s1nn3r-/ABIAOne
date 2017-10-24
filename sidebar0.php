<!--<div class="col-sm-3 col-sm-offset-1 blog-sidebar">-->
<div class="col-sm-3 blog-sidebar">
	<div class="sidebar-module sidebar-module-inset">

		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
    <ul id="sidebar">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </ul>
		<?php endif; ?>


    <h4>Archives</h4>
    <ol class="list-unstyled">
    	<?php wp_get_archives( 'type=monthly' ); ?>
    </ol>
    <h4>About</h4>
    <p><?php the_author_meta( 'description' ); ?> </p>
	</div>
</div><!-- /.blog-sidebar -->
