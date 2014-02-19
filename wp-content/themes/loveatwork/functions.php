<?php
/**
 * loveatwork / riksgransen functions and definitions
 *
 * @package loveatwork / riksgransen
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'loveatwork_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function loveatwork_setup() {

	require( get_stylesheet_directory()  . '/inc/widgets.php' );

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on loveatwork / riksgransen, use a find and replace
	 * to change 'loveatwork' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'loveatwork', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'loveatwork' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'loveatwork_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );

	function loveatwork_excerpt_length( $length ) {
		return 20;
	}
	add_filter( 'excerpt_length', 'loveatwork_excerpt_length', 999 );

	function loveatwork_excerpt_more( $more ) {
		return ' <i class="fa fa-ellipsis-h readmore"></i>';
	}
	add_filter('excerpt_more', 'loveatwork_excerpt_more');


}
endif; // loveatwork_setup
add_action( 'after_setup_theme', 'loveatwork_setup' );

/** 
* Register custom post types
*/

// Features post type
	add_action('init', 'cptui_register_my_cpt_feature');
	function cptui_register_my_cpt_feature() {
	register_post_type('feature', array(
	'label' => 'Features',
	'description' => 'Lång artikel som handlar om något specifikt, och i vissa fall har en egen CSS. ',
	'public' => true,
	'show_ui' => true,
	'show_in_menu' => true,
	'capability_type' => 'post',
	'map_meta_cap' => true,
	'hierarchical' => false,
	'rewrite' => array('slug' => 'feature', 'with_front' => true),
	'query_var' => true,
	'has_archive' => true,
	'supports' => array('title','editor','excerpt','trackbacks','revisions','thumbnail','author','page-attributes','post-formats'),
	'taxonomies' => array('features'),
	'labels' => array (
	  'name' => 'Features',
	  'singular_name' => 'Feature',
	  'menu_name' => 'Features',
	  'add_new' => 'Add Feature',
	  'add_new_item' => 'Add New Feature',
	  'edit' => 'Edit',
	  'edit_item' => 'Edit Feature',
	  'new_item' => 'New Feature',
	  'view' => 'View Feature',
	  'view_item' => 'View Feature',
	  'search_items' => 'Search Features',
	  'not_found' => 'No Features Found',
	  'not_found_in_trash' => 'No Features Found in Trash',
	  'parent' => 'Parent Feature',
	)
	) ); }

	// People post type
	add_action('init', 'cptui_register_my_cpt_people');
	function cptui_register_my_cpt_people() {
	register_post_type('people', array(
	'label' => 'Människor',
	'description' => '',
	'public' => true,
	'show_ui' => true,
	'show_in_menu' => true,
	'capability_type' => 'post',
	'map_meta_cap' => true,
	'hierarchical' => false,
	'rewrite' => array('slug' => 'people', 'with_front' => true),
	'query_var' => true,
	'supports' => array('title','editor','revisions','thumbnail'),
	'labels' => array (
	  'name' => 'Människor',
	  'singular_name' => 'Människa',
	  'menu_name' => 'Människor',
	  'add_new' => 'Add Människa',
	  'add_new_item' => 'Add New Människa',
	  'edit' => 'Edit',
	  'edit_item' => 'Edit Människa',
	  'new_item' => 'New Människa',
	  'view' => 'View Människa',
	  'view_item' => 'View Människa',
	  'search_items' => 'Search Människor',
	  'not_found' => 'No Människor Found',
	  'not_found_in_trash' => 'No Människor Found in Trash',
	  'parent' => 'Parent Människa',
	)
	) ); }

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function loveatwork_widgets_init() {
	
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'loveatwork' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Overlay', 'loveatwork' ),
		'id'            => 'overlay',
		'before_widget' => '<aside id="%1$s" class="overlay-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="overlay-widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Blog sidebar', 'loveatwork' ),
		'id'            => 'blog',
		'before_widget' => '<aside id="%1$s" class="blog-sidebar-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="blog-sidebar-widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'loveatwork_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function loveatwork_scripts() {
	wp_enqueue_style( 'loveatwork-style', get_stylesheet_uri() );

	wp_enqueue_script( 'loveatwork-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'loveatwork-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'loveatwork_scripts' );

function register_shortcodes(){
   add_shortcode('loveatwork_separator', 'loveatwork_get_separator');
}

add_action( 'init', 'register_shortcodes');

function loveatwork_get_separator($icon, $caption) {

	extract(shortcode_atts(array(
      'icon' => "",
      'caption' =>"",
   ), $icon));

	$str = "<div class='separator center'>";
	$str .= "<i class='fa " . $icon . " fa-2x'></i>";
	
	if ($caption != "")
		$str .= "<h4 class='separator-caption'>" . $caption . "</h4>";

	$str .= "</div>";

	return $str;
}

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
* Activate field groups (Advanced Custom Fields)
*/
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_contact-information',
		'title' => 'Contact information',
		'fields' => array (
			array (
				'key' => 'field_982734987234',
				'label' => 'Title',
				'name' => 'title',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'text',
				'maxlength' => '',
			),
			array (
				'key' => 'field_52ea5fd773696',
				'label' => 'Phone',
				'name' => 'phone',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_52ea5fa173693',
				'label' => 'E-mail',
				'name' => 'e-mail',
				'type' => 'email',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array (
				'key' => 'field_52ea5fbe73694',
				'label' => 'Twitter',
				'name' => 'twitter',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_52ea5fcf73695',
				'label' => 'Instagram',
				'name' => 'instagram',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_52ea5ffd05ede',
				'label' => 'Skype',
				'name' => 'skype',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'people',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_feature-fields',
		'title' => 'Feature fields',
		'fields' => array (
			array (
				'key' => 'field_52ea5caf5c8a6',
				'label' => 'Custom css',
				'name' => 'custom_css',
				'type' => 'textarea',
				'instructions' => 'Custom CSS for this post',
				'default_value' => '',
				'placeholder' => 'Custom styles here',
				'maxlength' => '',
				'formatting' => 'none',
			),
			array (
				'key' => 'field_52ea5d6980be9',
				'label' => 'Map',
				'name' => 'map',
				'type' => 'google_map',
				'center_lat' => '',
				'center_lng' => '',
				'zoom' => '',
				'height' => '',
			),
			array (
				'key' => 'field_52ea61591d343',
				'label' => 'Author',
				'name' => 'author',
				'type' => 'post_object',
				'post_type' => array (
					0 => 'people',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'allow_null' => 1,
				'multiple' => 1,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'feature',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_sub-header',
		'title' => 'Sub-header',
		'fields' => array (
			array (
				'key' => 'field_52ea61e29a49b',
				'label' => 'Sub-header',
				'name' => 'sub-header',
				'type' => 'text',
				'instructions' => 'Sub-header field for features. HTML allowed',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'feature',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

