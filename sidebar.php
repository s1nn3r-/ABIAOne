<div class="col-sm-3 blog-sidebar">
	<div class="sidebar-module sidebar-module-inset">

		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    
		<?php endif; ?>
	</div>
</div><!-- /.blog-sidebar -->
