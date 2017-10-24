<!--<div class="col-sm-3 col-sm-offset-1 blog-sidebar">-->
<div class="col-sm-3 blog-sidebar">
	<div class="sidebar-module sidebar-module-inset">

		<?php if ( is_active_sidebar( 'sidebar-secondary' ) ) : ?>
    <ul id="sidebar">
        <?php dynamic_sidebar( 'sidebar-secondary' ); ?>
    </ul>
		<?php endif; ?>

	</div>
</div><!-- /.blog-sidebar -->
