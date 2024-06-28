<?php 
// Disable Gutenberg for pages and enable default editor for pages
add_filter('use_block_editor_for_post_type', function( $useBlockEditor, $postType ) {
  if( $postType == 'page' )
    return false;
    return $useBlockEditor;
}, 10, 2);

// Add featured image support
add_theme_support( 'post-thumbnails' );

// Add custom logo support
add_theme_support( 'custom-logo' );

// Enable SVG uploading support
function add_file_types_to_uploads($file_types){
  $new_filetypes = array();
  $new_filetypes['svg'] = 'image/svg+xml';
  $file_types = array_merge($file_types, $new_filetypes );
  return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');

// Remove WordPress's inline SVG's from the frontend
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

// Create menus, to enable menu support and create menu locations
function register_my_menus() {
    register_nav_menus(
      array(
        'main-menu' => __( 'Main Menu', 'main_menu' ),
        'footer-menu' => __( 'Footer Menu', 'footer_menu' )
      )
    );
}
add_action( 'init', 'register_my_menus' );

// Enqueue CSS and JS files into theme
function add_theme_scripts() {
    // Get latest update of Stylesheet
    $style_ver = filemtime( get_stylesheet_directory() . '/style.css' );
    // Get latest update of Scripts
    $script_ver = filemtime( get_stylesheet_directory() . '/js/scripts.js' );
    // Enqueue style.css with version updating
    wp_enqueue_style( 'main_style', get_stylesheet_directory_uri() . '/style.css', '', $style_ver );
    // Enqueue latest version of jQuery
    wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-latest.min.js', array(), null, true );
    // Enqueue script.js with version updating and dependency on jQuery
    wp_enqueue_script( 'main-script', get_stylesheet_directory_uri() . '/js/scripts.js', array ( 'jquery' ), $script_ver, true);
    // Enqueue slick carousel.js with a dependency on jQuery
    wp_enqueue_script( 'slick-js', get_stylesheet_directory_uri() . '/defaults/js/slick.min.js', array ( 'jquery' ));
    // Enqueue slick carousel.css
    wp_enqueue_style( 'slick-css', get_stylesheet_directory_uri() . '/defaults/css/slick.css');
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

// Adds the reusable blocks menu into the wordpress dashboard
function reusable_blocks_admin_menu() {
    add_menu_page( 'Reusable Blocks', 'Reusable Blocks', 'edit_posts', 'edit.php?post_type=wp_block', '', 'dashicons-editor-table', 22 );
}
add_action( 'admin_menu', 'reusable_blocks_admin_menu' );

// Removes the "Homepage settings"and "additional CSS" customise option
function remove_customizer_sections( $wp_customize ) {
    $wp_customize->remove_section( 'static_front_page' );
    $wp_customize->remove_section( 'custom_css' );
}
add_action( 'customize_register', 'remove_customizer_sections', 20 );

// Change excerpt length
function my_excerpt_length($length) {
	return 25;
}
add_filter('excerpt_length', 'my_excerpt_length');

// Change excerpt after text
function new_excerpt_more($more) {
	global $post;
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Add image sizes when uploading
add_image_size( 'smallest', 200, 150, true );
add_image_size( 'small', 600, 450, true );
add_image_size( 'medium', 800, 600, true );
add_image_size( 'large', 1400, 1150, true );
add_image_size( 'largest', 1920, 1440, true );
?>