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

  wp_register_style( 'style', get_template_directory_uri() . '/static/css/master.css', null, null, 'all' );

  // wp_register_script( 'global', get_template_directory_uri() . '/static/dist/js/9e81a7e5d3e8.global.min.js', null, null, true );
  // wp_register_script( 'gallery', get_template_directory_uri() . '/static/dist/js/27323ae010fb.gallery.min.js', array('single'), null, true );
  
  // wp_register_script( 'single', get_template_directory_uri() . '/build/dist/js/3b7d199bd846.single.entry.js', null, null, true );
  // wp_register_script( 'everywhere', get_template_directory_uri() . '/build/dist/js/fa7b740abd72.everywhere.entry.js', null, null, true );
  // wp_register_script( 'index', get_template_directory_uri() . '/build/dist/js/e3a1443bfb24.index.entry.js', null, null, true );
  // wp_register_script( 'category', get_template_directory_uri() . '/build/dist/js/1e748c29df12.category.entry.js', null, null, true );
  
  wp_localize_script( 'global', 'ajaxEndpoint', array(
    'url' => admin_url( 'admin-ajax.php' ),
    'assets' => get_bloginfo( 'template_url' )
  ));   

  wp_enqueue_style( 'style' );
  // wp_enqueue_script( 'global' );
  // wp_enqueue_script( 'everywhere' );

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
// news: news_tax
// postpending to avoid name clashes
// --------------------------------- 
function register_custom_taxonomies() {
  $labels = array(
    'name'              => _x( 'Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Categories' ),
    'all_items'         => __( 'All Categories' ),
    'parent_item'       => __( 'Parent Category' ),
    'parent_item_colon' => __( 'Parent Category:' ),
    'edit_item'         => __( 'Edit Category' ), 
    'update_item'       => __( 'Update Category' ),
    'add_new_item'      => __( 'Add New Category' ),
    'new_item_name'     => __( 'New Category' ),
    'menu_name'         => __( 'Categories' ),
  );

  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
    'rewrite' => array (
      'hierarchical' => true
    )
  );

  register_taxonomy( 'news_tax', 'news', $args );
}

add_action( 'init', 'register_custom_taxonomies' );


// ------------------------------ 
// register custom post types
//
// news: news
// ------------------------------ 
function create_post_type() {
  $news_post_type = array(
    'labels' => array(
      'name' => __( 'News posts' ),
      'singular_name' => __( 'News' ),
    ),
    'description' => __( 'News articles are defined within this type' ),
    'hierarchical' => true,
    'show_ui' => true,
    'public' => true,
    'has_archive' => true,
    'rewrite' => array('slug' => 'news/%news_tax%', 'with_front' => false),
    'menu_position' => 5,
    'supports' => array('title', 'editor', 'thumbnail', 'author', 'revisions' ),
    'taxonomies' => array( 'news_tax', 'subtitle', 'carousel' )
  );

  register_post_type( 'news', $news_post_type );
}

add_action( 'init', 'create_post_type' );


// --------------------------------------------  
// customisation: custom post type permalink 
//
// make sure post permalinks follow structure: 
// post_type/%custom_taxonomy%/%postname%
// -------------------------------------------- 
function custom_post_type_permastruct($link, $post) {
  if ($post->post_type === 'lwa_feature') {
    if ($cats = get_the_terms($post->ID, 'featured_tax'))
      $link = str_replace('%featured_tax%', array_pop($cats)->slug, $link);
      return $link;
  } 
  else if ($post->post_type === 'news') {
    if ($cats = get_the_terms($post->ID, 'news_tax'))
      $link = str_replace('%news_tax%', array_pop($cats)->slug, $link);
      return $link;
  } else {
    return $link;
  }
}
add_filter('post_type_link', 'custom_post_type_permastruct', 10, 2);


// ----------------------------------
// plugin: BAW post view count
// only keep the total view count
// ----------------------------------
function remove_timing_for_bawpvc( $timings ) {
    return array( 'all' => '' );
}
add_filter( 'baw_count_views_timings', 'remove_timing_for_bawpvc' );


function mytheme_custom_excerpt_length( $length ) {
  return 20;
}
add_filter( 'excerpt_length', 'mytheme_custom_excerpt_length', 400 );

function new_excerpt_more( $more ) {
	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');


// -------------------------- 
// plugin: attachments
// --------------------------
add_filter( 'attachments_default_instance', '__return_false' ); // disable the default instance
function my_attachments( $attachments ) {
  $fields = array( 
    array(
      'name'      => 'caption',                       // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __( 'Caption', 'attachments' ),  // label to display
      'default'   => 'caption',                       // default value upon selection
    )
  );

  $args = array(

    // title of the meta box (string)
    'label'         => 'Gallery Images',

    // all post types to utilize (string|array)
    'post_type'     => array( 'lwa_feature', 'lwa_news'),

    // meta box position (string) (normal, side or advanced)
    'position'      => 'advanced',

    // meta box priority (string) (high, default, low, core)
    'priority'      => 'high',

    // allowed file type(s) (array) (image|video|text|audio|application)
    'filetype'      => array('image'),

    // include a note within the meta box (string)
    'note'          => '',

    // append to the list
    'append'        => true,

    // text for 'Attach' button in meta box (string)
    'button_text'   => __( 'Add to gallery', 'attachments' ),

    // text for modal 'Attach' button (string)
    'modal_text'    => __( 'Add', 'attachments' ),

    // which tab should be the default in the modal (string) (browse|upload)
    'router'        => 'browse',

    'post_parent'   => true,

    // fields array
    'fields'        => $fields,

  );

  $attachments->register( 'my_attachments', $args ); // unique instance name
}
add_action( 'attachments_register', 'my_attachments' );


// -------------------------- 
// Remove new emoji stuff
// --------------------------
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

?>