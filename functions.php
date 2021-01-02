<?php

require_once('includes/custom-category-functions.php');
require_once('includes/custom-profile-functions.php');
require_once('includes/ui-util-functions.php');
require_once('includes/ajax-functions.php');
require_once('includes/custom-metabox-functions.php');


// ------------------------------ 
// theme support
// ------------------------------ 
add_theme_support( 'post-thumbnails' ); 

add_theme_support( 'custom-logo' );

function theme_prefix_the_custom_logo() {
    if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
    }
}


// ------------------------------ 
// theme support
// add a custom image size
// w: 600, h: 388
// ------------------------------ 
add_image_size( 'news-thumbnail', 600, 388, true );

function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'news-thumbnail' => __('News thumbnail'),
    ) );
}
add_filter( 'image_size_names_choose', 'my_custom_sizes' );


// ------------------------------ 
// admin:
// add admin stylesheet
// ------------------------------ 
function change_adminbar_css() {
    wp_register_style( 'add-admin-stylesheet', get_template_directory_uri() . '/admin/css/admin-styles.css' );
    wp_enqueue_style( 'add-admin-stylesheet' );
}
add_action( 'admin_enqueue_scripts', 'change_adminbar_css' ); 


// ------------------------------ 
// admin:
// add editor css for better 
// content management 
// ------------------------------
function add_editor_styles() {
  add_editor_style( '/admin/css/editor-styles.css' );
}
add_action( 'init', 'add_editor_styles' );


// ------------------------------
// admin: 
// JS files
// ------------------------------ 
function enqueue_custom_admin_scripts() {
  wp_enqueue_media();
  wp_register_script('edit-category', get_template_directory_uri() . '/admin/edit-category.js', array('jquery'));
  wp_enqueue_script('edit-category');
}
add_action('admin_enqueue_scripts', 'enqueue_custom_admin_scripts');


// ------------------------------ 
// customise: 
// add app JS in footer of page
// ------------------------------ 
function add_scripts() {

  wp_register_style( 'style', get_template_directory_uri() . '/static/css/master.css?ver=' . rand(111,999), null, null, 'all' );
  
  wp_localize_script( 'global', 'ajaxEndpoint', array(
    'url' => admin_url( 'admin-ajax.php' ),
    'assets' => get_bloginfo( 'template_url' )
  ));   

  wp_enqueue_style( 'style' );
}
add_action( 'wp_enqueue_scripts', 'add_scripts', 999 );


// ------------------------------ 
// admin:
// modify editor headings dropdown
// ------------------------------
function mce_mod( $init ) {
  $init['block_formats'] = 'Intro=h1;Header=h2;Subhead=h4;Paragraph=p;Quote=blockquote';
  return $init;
}
add_filter('tiny_mce_before_init', 'mce_mod');


// ------------------------------ 
// admin: 
// hide default posts menu option
// ------------------------------ 
function post_remove () {
  remove_menu_page('edit.php');
}
// add_action('admin_menu', 'post_remove'); 


// ------------------------------ 
// admin: 
// remove wrapping of img elements
// ------------------------------ 
function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');


// --------------------------------- 
// register custom taxonomies
//
// postpending to avoid name clashes
// --------------------------------- 
function register_custom_taxonomies() {
  $labels = array(
    'name'              => _x( 'Partners taxonomy', 'taxonomy general name' ),
    'singular_name'     => _x( 'Partners taxonomy', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Partners taxonomy' ),
    'all_items'         => __( 'All Partners taxonomy' ),
    'parent_item'       => __( 'Parent Partner taxonomy' ),
    'parent_item_colon' => __( 'Parent Partner taxonomy:' ),
    'edit_item'         => __( 'Edit Partner taxonomy' ), 
    'update_item'       => __( 'Update Partner taxonomy' ),
    'add_new_item'      => __( 'Add New Partner taxonomy' ),
    'new_item_name'     => __( 'New Partner taxonomy' ),
    'menu_name'         => __( 'Partners taxonomy' ),
  );

  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite' => array (
      'hierarchical' => true
    )
  );

  register_taxonomy( 'partners_tax', array('partners'), $args );
}

add_action( 'init', 'register_custom_taxonomies' );


// ------------------------------ 
// register custom post types
//
// ------------------------------ 
function create_post_type() {
  $partner_post_type = array(
    'labels' => array(
      'name' => __( 'Partners posts' ),
      'singular_name' => __( 'Partner' ),
    ),
    'description' => __( 'Partners articles are defined within this type' ),
    'hierarchical' => true,
    'show_ui' => true,
    'public' => true,
    'has_archive' => false,
    'menu_position' => 4,
    'rewrite' => array('slug' => 'partners', 'with_front' => true),
    'supports' => array('title', 'editor', 'thumbnail', 'revisions' ),
    'taxonomies' => array('partners_tax')
  );

  register_post_type( 'partners', $partner_post_type );
}

add_action( 'init', 'create_post_type' );

function mytheme_custom_excerpt_length( $length ) {
  return 20;
}
add_filter( 'excerpt_length', 'mytheme_custom_excerpt_length', 400 );

function new_excerpt_more( $more ) {
	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');


// -------------------------- 
// Remove new emoji stuff
// --------------------------
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

?>