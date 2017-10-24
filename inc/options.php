<?php
/**
 * ABIA custom options
 */
 class abia_fields_Plugin {

     public function __construct() {
     	// Hook into the admin menu
     	add_action( 'admin_menu', array( $this, 'create_plugin_settings_page' ) );

         // Add Settings and Fields
     	add_action( 'admin_init', array( $this, 'setup_sections' ) );
     	add_action( 'admin_init', array( $this, 'setup_fields' ) );

     	add_action( 'admin_init', array( $this, 'setup_social_fields' ) );
 			add_action( 'admin_init', array( $this, 'setup_home_fields' ) );
     }

     public function create_plugin_settings_page() {
     	// Add the menu item and page
     	$page_title = 'ABIA Settings';
     	$menu_title = 'ABIA Settings';
     	$capability = 'manage_options';
     	$slug = 'abia_fields';
     	$callback = array( $this, 'plugin_settings_page_content' );
     	$icon = 'dashicons-admin-generic';
     	$position = 100;

     	add_menu_page( $page_title, $menu_title, $capability, $slug, $callback, $icon, $position );
     }

     public function plugin_settings_page_content() {?>


     	<div class="wrap">

 				<h2>ABIA Settings Page</h2>

 				<div id="poststuff">

 					 <div id="post-body" class="metabox-holder columns-<?php echo 1 == get_current_screen()->get_columns() ? '1' : '2'; ?>">

 							 <div id="post-body-content" class="options-content">
 									 <!-- #post-body-content -->

     		<?php
             if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] ){
                   $this->admin_notice();
             } ?>

 						<?php
 		            if( isset( $_GET[ 'tab' ] ) ) {
 		                $active_tab = $_GET[ 'tab' ];
 		            } else $active_tab = 'general_options';
 		        ?>


 		        <h1 class="nav-tab-wrapper">
 		            <a href="?page=abia_fields&tab=general_options" class="nav-tab <?php echo $active_tab == 'general_options' ? 'nav-tab-active' : ''; ?>">General</a>
 		            <a href="?page=abia_fields&tab=social_options" class="nav-tab <?php echo $active_tab == 'social_options' ? 'nav-tab-active' : ''; ?>">Contacts & social</a>
 								<a href="?page=abia_fields&tab=homepage_options" class="nav-tab <?php echo $active_tab == 'homepage_options' ? 'nav-tab-active' : ''; ?>">Homepage</a>
 		        </h1>

     		<form method="POST" action="options.php">

 					<p class="submit" style="text-align:right;">
 						<?php submit_button ( 'Save Changes', 'button button-primary','', false ); ?>
 					</p>
                 <?php

 								if( $active_tab == 'general_options' ) {

 									settings_fields( 'abia_fields' );
                   do_settings_sections( 'abia_fields' );

 								} else if( $active_tab == 'social_options' ) {

 									settings_fields( 'abia_social_fields' );
                   do_settings_sections( 'abia_social_fields' );

 								} else {

 									settings_fields( 'abia_home_fields' );
                   do_settings_sections( 'abia_home_fields' );
 								}
 								?>
 								<p class="submit" style="text-align:right;">
 									<?php submit_button ( 'Save Changes', 'button button-primary','', false ); ?>
 								</p>
 							</div>
 							<div id="postbox-container-1" class="postbox-container">
 							</div>

     		</form>

 			</div> <!-- #post-body -->

 	</div> <!-- #poststuff -->

     	</div> <?php
     }

     public function admin_notice() { ?>
         <div class="notice notice-success is-dismissible">
             <p>Your settings have been updated!</p>
         </div><?php
     }

     public function setup_sections() {

         add_settings_section( 'general_section', '', array( $this, 'section_callback' ), 'abia_fields' );
 				add_settings_section( 'social_section', 'Social', array( $this, 'section_callback' ), 'abia_social_fields' );
 				add_settings_section( 'contact_section', 'Contacts', array( $this, 'section_callback' ), 'abia_social_fields' );
         add_settings_section( 'home_section', '', array( $this, 'section_callback' ), 'abia_home_fields' );
     }


     public function section_callback( $arguments ) {
     	switch( $arguments['id'] ){
     		case 'general_section':

     			break;
     		case 'social_section':

     			break;
     		case 'our_third_section':

     			break;
     	}
     }

     public function setup_fields() {
         $fields = array(
 					array(
         		'uid' => 'logo_file',
         		'label' => 'Logo image',
         		'section' => 'general_section',
         		'type' => 'file',
         	),
 					array(
         		'uid' => 'custom_css',
         		'label' => 'Custom CSS',
         		'section' => 'general_section',
         		'type' => 'textarea',
 						'supplimental' => 'Type your custom css here, which you would like to add to theme\'s css (or overwrite it)'
         	),
 					array(
         		'uid' => 'header_code',
         		'label' => 'Header code',
         		'section' => 'general_section',
         		'type' => 'textarea',
 						'supplimental' => 'Type custom html code, which you would like to add to theme\'s header section'
         	),
 					array(
         		'uid' => 'footer_code',
         		'label' => 'Footer code',
         		'section' => 'general_section',
         		'type' => 'textarea',
 						'supplimental' => 'Type custom html code, which you would like to add to theme\'s header section'
         	)

         );
     	foreach( $fields as $field ){

         	add_settings_field( $field['uid'], $field['label'], array( $this, 'field_callback' ), 'abia_fields', $field['section'], $field );
             register_setting( 'abia_fields', $field['uid'] );
     	}
     }

 		function setup_social_fields(){

 			$fields = array(
 				array(
 					'uid' => 'facebook_url',
 					'label' => 'Facebook url',
 					'section' => 'social_section',
 					'type' => 'text',
 					'placeholder' => '',
 					//'helper' => 'help text',
 					//'supplimental' => 'more text',
 				),
 				array(
 					'uid' => 'facebook_icon',
 					'label' => 'Facebook icon',
 					'section' => 'social_section',
 					'type' => 'file',
 				),
 				array(
 					'uid' => 'twitter_url',
 					'label' => 'Twitter url',
 					'section' => 'social_section',
 					'type' => 'text',
 					'placeholder' => ''
 					
 				),
 				array(
 					'uid' => 'twitter_icon',
 					'label' => 'Twitter icon',
 					'section' => 'social_section',
 					'type' => 'file',
 				),
 				array(
 					'uid' => 'hide_twitter',
 					'label' => 'Hide twitter',
 					'section' => 'social_section',
 					'type' => 'checkbox',
 					'options' => array(
 						'1' => '',
 					),
 							'default' => array()
 				),
 				array(
 					'uid' => 'youtube_url',
 					'label' => 'You Tube url',
 					'section' => 'social_section',
 					'type' => 'text',
 					'placeholder' => '',
 					'supplimental' => '',
 				),
 				array(
 					'uid' => 'youtube_icon',
 					'label' => 'You Tube icon',
 					'section' => 'social_section',
 					'type' => 'file',
 				),
 				array(
 					'uid' => 'linkedin_url',
 					'label' => 'Linkedin url',
 					'section' => 'social_section',
 					'type' => 'text',
 					'placeholder' => '',
 					'supplimental' => '',
 				),
 				array(
 					'uid' => 'linkedin_icon',
 					'label' => 'Linkedin icon',
 					'section' => 'social_section',
 					'type' => 'file',
 				),
 				array(
 					'uid' => 'phone',
 					'label' => 'Phone',
 					'section' => 'contact_section',
 					'type' => 'text',
 					'placeholder' => '',
 					'supplimental' => '',
 				),
 				array(
 					'uid' => 'email',
 					'label' => 'Email',
 					'section' => 'contact_section',
 					'type' => 'text',
 					'placeholder' => '',
 					'supplimental' => '',
 				),
 				array(
 					'uid' => 'address',
 					'label' => 'Address',
 					'section' => 'contact_section',
 					'type' => 'text',
 					'placeholder' => '',
 					'supplimental' => '',
 				),
 				array(
 					'uid' => 'website',
 					'label' => 'Website',
 					'section' => 'contact_section',
 					'type' => 'text',
 					'placeholder' => '',
 					'supplimental' => '',
 				),
 				array(
 					'uid' => 'phone',
 					'label' => 'Phone',
 					'section' => 'contact_section',
 					'type' => 'text',
 					'placeholder' => '',
 					'supplimental' => '',
 				),
 				array(
 					'uid' => 'skype',
 					'label' => 'Skype',
 					'section' => 'contact_section',
 					'type' => 'text',
 					'placeholder' => '',
 					'supplimental' => '',
 				)

 			);

 			foreach( $fields as $field ){

         	add_settings_field( $field['uid'], $field['label'], array( $this, 'field_callback' ), 'abia_social_fields', $field['section'], $field );
             register_setting( 'abia_social_fields', $field['uid'] );
     	}
 		}

 		function setup_home_fields(){

 			$fields = array(

 				array(
 					'uid' => 'background_image',
 					'label' => 'Background image',
 					'section' => 'home_section',
 					'type' => 'file',
 				),
 				array(
 					'uid' => 'enable_particles',
 					'label' => 'Enable particles',
 					'section' => 'home_section',
 					'type' => 'checkbox',
 					'options' => array(
 						'1' => '',
 					),
 							'default' => array()
 				),
 				array(
 					'uid' => 'more_button_link',
 					'label' => 'More button link',
 					'section' => 'home_section',
 					'type' => 'text',
 					'placeholder' => '',
 					'supplimental' => '',
 				),
 				array(
 					'uid' => 'more_button_text',
 					'label' => 'More button text',
 					'section' => 'home_section',
 					'type' => 'text',
 					'placeholder' => '',
 					'supplimental' => '',
 				),
 				array(
 					'uid' => 'sidebar_position',
 					'label' => 'Sidebar position',
 					'section' => 'home_section',
 					'type' => 'select',
 					'options' => array(
 						'left' => 'Left',
 						'right' => 'Right',
 					),
 							'default' => array()
 				),
 				array(
         		'uid' => 'posts_layout',
         		'label' => 'Posts layout',
         		'section' => 'home_section',
         		'type' => 'select',
         		'options' => array(
         			'list' => 'List',
         			'grid' => 'Grid',
         		),
                 'default' => array()
         	)

 			);

 			foreach( $fields as $field ){

         	add_settings_field( $field['uid'], $field['label'], array( $this, 'field_callback' ), 'abia_home_fields', $field['section'], $field );
             register_setting( 'abia_home_fields', $field['uid'] );
     	}
 		}


     public function field_callback( $arguments ) {

         $value = get_option( $arguments['uid'] );

         if( ! $value && isset($arguments['default'])) {
             $value = $arguments['default'];
			 
         }

         switch( $arguments['type'] ){
             case 'text':
             case 'password':
             case 'number':
                 printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />', $arguments['uid'], $arguments['type'], $arguments['placeholder'], $value );
                 break;
             case 'textarea':
                 printf( '<textarea name="%1$s" id="%1$s" rows="9" cols="70">%2$s</textarea>', $arguments['uid'], $value );
                 break;
             case 'select':
             case 'multiselect':
                 if( ! empty ( $arguments['options'] ) && is_array( $arguments['options'] ) ){
                     $attributes = '';
                     $options_markup = '';
                     foreach( $arguments['options'] as $key => $label ){
                         $options_markup .= sprintf( '<option value="%s" %s>%s</option>', $key, selected( $value[ array_search( $key, $value, true ) ], $key, false ), $label );
                     }
                     if( $arguments['type'] === 'multiselect' ){
                         $attributes = ' multiple="multiple" ';
                     }
                     printf( '<select name="%1$s[]" id="%1$s" %2$s>%3$s</select>', $arguments['uid'], $attributes, $options_markup );
                 }
                 break;
             case 'radio':
             case 'checkbox':
                 if( ! empty ( $arguments['options'] ) && is_array( $arguments['options'] ) ){
                     $options_markup = '';
                     $iterator = 0;
                     foreach( $arguments['options'] as $key => $label ){
                         $iterator++;
                         $options_markup .= sprintf( '<label for="%1$s_%6$s"><input id="%1$s_%6$s" name="%1$s[]" type="%2$s" value="%3$s" %4$s /> %5$s</label><br/>', $arguments['uid'], $arguments['type'], $key, checked( $value[ array_search( $key, $value, true ) ], $key, false ), $label, $iterator );
                     }
                     printf( '<fieldset>%s</fieldset>', $options_markup );
                 }
                 break;
 								case 'file':
 								wp_enqueue_script( 'media-upload' );
 								wp_enqueue_media();
 								$display = (!$value) ? " display:none;" : "";
 								$display_button = ($value) ? ' style="display:none;"' : '';
 								?><div class='image-preview-wrapper' style="max-width: 150px;<?php echo $display; ?>">
 									<img id='image-preview-<?php echo $arguments['uid']; ?>' src='<?php echo wp_get_attachment_url( $value ); ?>' height='100'>
 									<a class="icon-remove" data-name="remove" data-id="<?php echo $arguments['uid']; ?>" href="javascript:void(0)" title="Remove">Remove image</a>
 								</div>
 					<input id="<?php echo $arguments['uid']; ?>" type="button" class="button upload_image_button" value="<?php _e( 'Add image', 'abiaone' ); ?>" <?php echo $display_button; ?>/>
 					<input type='hidden' name='<?php echo $arguments['uid']; ?>' id='image_attachment_id_<?php echo $arguments['uid']; ?>' value='<?php echo $value; ?>'><?php

 									//printf( '<input name="%1$s" id="%1$s"  type="file">%2$s', $arguments['uid'], $value );
 								break;
         }

         if( isset( $arguments['helper'] ) && $helper = $arguments['helper'] ){
             printf( '<span class="helper"> %s</span>', $helper );
         }

         if( isset( $arguments['supplimental'] ) && $supplimental = $arguments['supplimental'] ){
             printf( '<p class="description">%s</p>', $supplimental );
         }

     }

 }
 new abia_fields_Plugin();

?>
