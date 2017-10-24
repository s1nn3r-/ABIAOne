<?php
// Register and load the widget
function abia_load_talk_widget() {
	register_widget( 'abia_talk_widget' );
}
add_action( 'widgets_init', 'abia_load_talk_widget' );

// Creating the widget
class abia_talk_widget extends WP_Widget {

function __construct() {
  parent::__construct(

  // Base ID of your widget
  'abia_talk_widget',

  // Widget name will appear in UI
  __('ABIA Talk to us', 'abiaone'),

  // Widget description
  array( 'description' => __( 'Add talk to us info', 'abiaone' ), )
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
if( 'on' == $instance[ 'show_address' ] && get_option('address')) : ?>
    <p><i class="fa fa-map-marker fa-2x" aria-hidden="true"></i><?php echo get_option('address'); ?></p>
<?php
endif;
if( 'on' == $instance[ 'show_phone' ] && get_option('phone')) :
	$phone = get_option('phone');
	$phone = str_replace(' ', '', $phone);
	?>
  	<p><a href="callto://<?php echo $phone; ?>"><i class="fa fa-phone" aria-hidden="true"></i>+1 <?php echo get_option('phone', 'option'); ?></a></p>
<?php
endif;
if( 'on' == $instance[ 'show_email' ] && get_option('email')) : ?>
    <p><i class="fa fa-save" aria-hidden="true"></i> <?php echo get_option('email'); ?></p>
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
$title = __( '', 'abiaone' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'abiaone' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
    <input class="checkbox" type="checkbox" <?php checked( $instance[ 'show_address' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'show_address' ); ?>" name="<?php echo $this->get_field_name( 'show_address' ); ?>" />
    <label for="<?php echo $this->get_field_id( 'show_address' ); ?>">Show address</label>
</p>
<p>
    <input class="checkbox" type="checkbox" <?php checked( $instance[ 'show_email' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'show_email' ); ?>" name="<?php echo $this->get_field_name( 'show_email' ); ?>" />
    <label for="<?php echo $this->get_field_id( 'show_email' ); ?>">Show email</label>
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
$instance[ 'show_address' ] = $new_instance[ 'show_address' ];
$instance[ 'show_email' ] = $new_instance[ 'show_email' ];
$instance[ 'show_phone' ] = $new_instance[ 'show_phone' ];
return $instance;
}
} // Class wpb_widget ends here
