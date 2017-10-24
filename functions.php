<?php
/**
 * Option page
 */
require get_template_directory() . '/inc/options.php';
/** Defer JS from wordpress**/
function starter_scripts() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
    wp_enqueue_script( 'jquery' );

    //wp_enqueue_style( 'starter-style', get_stylesheet_uri() );
    wp_enqueue_script( 'includes', get_template_directory_uri() . '/js/min/includes.min.js', '', '', true );
}
add_action( 'wp_enqueue_scripts', 'starter_scripts' );
/** YOU ARE WELCOME WORDPRESS**/
/**
 * Enqueue scripts and styles.
 */
function abia_scripts() {

	wp_enqueue_style( 'bootstrap',  get_template_directory_uri() .'/css/bootstrap.min.css');
	wp_enqueue_style( 'font-awesome',  get_template_directory_uri() .'/css/font-awesome.min.css');
	wp_enqueue_style( 'abia-style', get_stylesheet_uri() );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '20151215', true );
	//check if particles effect is enable
	$enable_particles = get_option('enable_particles');
	if($enable_particles && $enable_particles[0] == 1) {
		wp_enqueue_script( 'particles', get_template_directory_uri() . '/js/particles.min.js', array(), '20151215', true );
		wp_enqueue_script( 'app', get_template_directory_uri() . '/js/app.js', array(), '20151215', true );
	}
	wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/jquery.parallax.js', array(), '20151215', true );
	wp_enqueue_script( 'smoothscroll', get_template_directory_uri() . '/js/smoothscroll.js', array(), '20151215', true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'abia_scripts' );


function load_custom_wp_admin_style() {
        wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/css/admin-style.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

/**
 * Admin scripts
 */
function starter_plugin_admin_scripts ($hook) {

	wp_enqueue_script( 'mediaoptions', get_template_directory_uri() . '/js/admin-options-media.js');
	//wp_enqueue_script ('jquery-ui-tabs');
}
add_action('admin_enqueue_scripts', 'starter_plugin_admin_scripts');

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Widgets
 */
require get_template_directory() . '/inc/widget/social_info.php';
require get_template_directory() . '/inc/widget/talk_to_us.php';

/**
 * Custom image sizes
 */
add_image_size( 'loop', 630, 380, true );

/**
 * Show social incons in footer
 * @return [type] [description]
 */
function social_icons_footer() {
	$img_fb = get_option('facebook_icon');
	$img_tw = get_option('twitter_icon');
	$img_google = get_option('google_icon');
	$img_linkedin = get_option('linkedin_icon');
	?>
	<?php if(get_option('facebook_url') !== null) : ?>
	<li>
		<?php if($img_fb) : ?>
			<a href="<?php echo get_option('facebook_url');?>" target="_blank" style="border:none;"><img src="<?php echo wp_get_attachment_url($img_fb);?>" alt="fb_icon" /></a>
		<?php else: ?>
			<a href="<?php echo get_option('facebook_url');?>" class="fa fa-facebook" target="_blank"></a>
		<?php endif; ?></li><?php endif; ?>
		<?php
		//Twitter
		if(get_option('twitter_url')) : ?>
		<li>
			<?php if($img_tw) : ?>
				<a href="<?php echo get_option('twitter_url');?>" target="_blank" style="border:none;"><img src="<?php echo wp_get_attachment_url($img_tw);?>" alt="tw_icon" /></a>
			<?php else: ?>
				<a href="<?php echo get_option('twitter_url');?>" class="fa fa-twitter" target="_blank"></a>
			<?php endif; ?></li><?php endif; ?>
			<?php
			//YouTube
			if(get_option('youtube_url')) : ?>
			<li>
				<?php if($img_youtube) : ?>
					<a href="<?php echo get_option('youtube_url');?>" target="_blank" style="border:none;"><img src="<?php echo wp_get_attachment_url($img_youtube);?>" alt="youtube_icon" /></a>
				<?php else: ?>
					<a href="<?php echo get_option('youtube_url');?>" class="fa fa-youtube" target="_blank"></a>
				<?php endif; ?></li><?php endif; ?>
			<?php
			//LinkedIn
			if(get_option('linkedin')) : ?>
			<li>
				<?php if($img_linkedin) : ?>
					<a href="<?php echo get_option('linkedin');?>" target="_blank" style="border:none;"><img src="<?php echo wp_get_attachment_url($img_linkedin);?>" alt="linkedin_icon" /></a>
				<?php else: ?>
					<a href="<?php echo get_option('linkedin');?>" class="fa fa-linkedin" target="_blank"></a>
				<?php endif; ?></li><?php endif; ?>
				<?php
}


// Content Width
if ( ! isset( $content_width ) ) {
	$content_width = 600;
}
// The Customizer
//include 'theme_customizer.php';
//Register Menus
add_action( 'init', 'register_my_menus' );

function register_my_menus() {
	register_nav_menus(
		array(
			'primary-menu' => __( 'Primary Menu', 'abiaone' ),
			'secondary-menu' => __( 'Secondary Menu', 'abiaone' ),
			'tertiary-menu' => __( 'Tertiary Menu', 'abiaone' )
		)
	);
}
// Add Google Fonts
function abia_google_fonts() {
		wp_register_style('Lato', 'https://fonts.googleapis.com/css?family=Lato:300,400');
		wp_enqueue_style( 'Lato');
}

add_action('wp_print_styles', 'abia_google_fonts');


// Support Featured Images
add_theme_support( 'post-thumbnails' );

// WordPress Titles
add_theme_support( 'title-tag' );

// Add default posts and comments RSS feed links to head.
add_theme_support( 'automatic-feed-links' );

// Customization selective refresh
add_theme_support( 'customize-selective-refresh-widgets' );

//Woocommerce support
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// Registers an editor stylesheet for the theme.
function abia_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'abia_theme_add_editor_styles' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function abia_widgets_init() {
  register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'abiaone' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'abiaone' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	//For Pages with two sidebars
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Secondary', 'abiaone' ),
		'id'            => 'sidebar-secondary',
		'description'   => esc_html__( 'Add widgets here.', 'abiaone' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	//Home page widgets
	register_sidebar( array(
		 'name'          => esc_html__( 'Home 1', 'abiaone' ),
		 'id'            => 'sidebar-home-1',
		 'description'   => esc_html__( 'Add widgets here.', 'abiaone' ),
		 'before_widget' => '<section id="%1$s" class="widget %2$s">',
		 'after_widget'  => '</section>',
		 'before_title'  => '<h3 class="widget-title">',
		 'after_title'   => '</h3>',
	 ) );
	 register_sidebar( array(
		 'name'          => esc_html__( 'Home 2', 'abiaone' ),
		 'id'            => 'sidebar-home-2',
		 'description'   => esc_html__( 'Add widgets here.', 'abiaone' ),
		 'before_widget' => '<section id="%1$s" class="widget %2$s">',
		 'after_widget'  => '</section>',
		 'before_title'  => '<h3 class="widget-title">',
		 'after_title'   => '</h3>',
	 ) );
	 register_sidebar( array(
		 'name'          => esc_html__( 'Home 3', 'abiaone' ),
		 'id'            => 'sidebar-home-3',
		 'description'   => esc_html__( 'Add widgets here.', 'abiaone' ),
		 'before_widget' => '<section id="%1$s" class="widget %2$s">',
		 'after_widget'  => '</section>',
		 'before_title'  => '<h3 class="widget-title">',
		 'after_title'   => '</h3>',
	 ) );

  // Footer sidebars
	register_sidebar( array(
		 'name'          => esc_html__( 'Footer 1', 'abiaone' ),
		 'id'            => 'sidebar-footer-1',
		 'description'   => esc_html__( 'Add widgets here.', 'abiaone' ),
		 'before_widget' => '<section id="%1$s" class="widget %2$s">',
		 'after_widget'  => '</section>',
		 'before_title'  => '<h3 class="widget-title">',
		 'after_title'   => '</h3>',
	 ) );
	 register_sidebar( array(
		 'name'          => esc_html__( 'Footer 2', 'abiaone' ),
		 'id'            => 'sidebar-footer-2',
		 'description'   => esc_html__( 'Add widgets here.', 'abiaone' ),
		 'before_widget' => '<section id="%1$s" class="widget %2$s">',
		 'after_widget'  => '</section>',
		 'before_title'  => '<h3 class="widget-title">',
		 'after_title'   => '</h3>',
	 ) );
	 register_sidebar( array(
		 'name'          => esc_html__( 'Footer 3', 'abiaone' ),
		 'id'            => 'sidebar-footer-3',
		 'description'   => esc_html__( 'Add widgets here.', 'abiaone' ),
		 'before_widget' => '<section id="%1$s" class="widget %2$s">',
		 'after_widget'  => '</section>',
		 'before_title'  => '<h3 class="widget-title">',
		 'after_title'   => '</h3>',
	 ) );
}
add_action( 'widgets_init', 'abia_widgets_init' );

/**
 * Posted on
 */
function abia_posted_on(){
	the_date(); echo " by ". the_author_link();
}

if ( get_option( 'twitter_url' ) === false || get_option( 'twitter_url' ) == "") 
    update_option( 'twitter_url', 'https://twitter.com/jeffmovesit' );

add_image_size( 'my_custom_size', 900, 200, true );

// Remove WP Version From Styles	
add_filter( 'style_loader_src', 'sdt_remove_ver_css_js', 9999 );
// Remove WP Version From Scripts
add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999 );

// Function to remove version numbers
function sdt_remove_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}