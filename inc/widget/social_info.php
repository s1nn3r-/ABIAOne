<?php
// Register and load the widget
function abia_load_widget() {
	register_widget( 'abia_widget' );
}
add_action( 'widgets_init', 'abia_load_widget' );

// Creating the widget
class abia_widget extends WP_Widget {

function __construct() {
  parent::__construct(

  // Base ID of your widget
  'abia_widget',

  // Widget name will appear in UI
  __('ABIA Contact & Social', 'abiaone'),

  // Widget description
  array( 'description' => __( 'Add social and contact info', 'abiaone' ), )
  );
}

// Creating widget front-end

public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );

// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

//Output here
if( 'on' == $instance[ 'show_facebook' ] && get_option('facebook_url')) : ?>
    <li><a href="<?php echo get_option('facebook_url'); ?>"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i> Facebook</a></li>
<?php
endif;
if( 'on' == $instance[ 'show_twitter' ] && get_option('twitter_url')) : ?>
    <li><a href="<?php echo get_option('twitter_url'); ?>"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i> Twitter</a></li>
<?php
endif;
if( 'on' == $instance[ 'show_phone' ] && get_option('phone')) : ?>
  	<li><a href="callto://<?php echo get_option('phone'); ?>"><i class="fa fa-phone fa-2x" aria-hidden="true"></i><?php echo get_option('phone'); ?></a></li>
<?php
endif;

echo $args['after_widget'];
}

// Widget Backend
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'abiaone' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'abiaone' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
    <input class="checkbox" type="checkbox" <?php checked( $instance[ 'show_facebook' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'show_facebook' ); ?>" name="<?php echo $this->get_field_name( 'show_facebook' ); ?>" />
    <label for="<?php echo $this->get_field_id( 'show_facebook' ); ?>">Show facebook</label>
</p>
<p>
    <input class="checkbox" type="checkbox" <?php checked( $instance[ 'show_twitter' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'show_twitter' ); ?>" name="<?php echo $this->get_field_name( 'show_twitter' ); ?>" />
    <label for="<?php echo $this->get_field_id( 'show_twitter' ); ?>">Show twitter</label>
</p>
<p>
    <input class="checkbox" type="checkbox" <?php checked( $instance[ 'show_phone' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'show_phone' ); ?>" name="<?php echo $this->get_field_name( 'show_phone' ); ?>" />
    <label for="<?php echo $this->get_field_id( 'show_phone' ); ?>">Show phone</label>
</p>
<?php
}

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance[ 'show_facebook' ] = $new_instance[ 'show_facebook' ];
$instance[ 'show_twitter' ] = $new_instance[ 'show_twitter' ];
$instance[ 'show_phone' ] = $new_instance[ 'show_phone' ];
return $instance;
}
} // Class wpb_widget ends here
