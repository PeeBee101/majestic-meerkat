<?php

// Adds custom bamboonine pattern category found inside gutenberg
function register_pattern_categories() {
  register_block_pattern_category(
    'Bamboo Nine',
    array( 'label' => __( 'Bamboo Nine', 'bamboonine' ) )
  );
}
add_action( 'init', 'register_pattern_categories' );

// Assigns a default pattern to bamboonine category
function reg_block_patterns() {
  register_block_pattern(
    'bamboonine/my-awesome-pattern',
    array(
      'title'       => __( 'Title of this block', 'bamboonine'),
      'description' => _x( 'This pattern contains a media text block and button you can use for an event banner', 'event pattern', 'bamboonine' ),
      'categories'  => array( 'Bamboo Nine' ),
      'keywords'      => array( 'cta', 'image', 'text' ),
      'viewportWidth' => 1920,
      'content'     => '<div><p>test</p></div>'
    )
  );
}
add_action( 'init', 'reg_block_patterns' );

// Add custom editor font sizes to gutenberg
add_theme_support(
  'editor-font-sizes',
  array(
    array(
      'name'      => esc_html__('Small', 'bamboonine'),
      'shortName' => esc_html_x('S', 'Font size', 'bamboonine'),
      'size'      => 12,
      'slug'      => 's',
    ),
    array(
      'name'      => esc_html__('Normal', 'bamboonine'),
      'shortName' => esc_html_x('N', 'Font size', 'bamboonine'),
      'size'      => 16,
      'slug'      => 'default',
    ),
    array(
      'name'      => esc_html__('Large', 'bamboonine'),
      'shortName' => esc_html_x('L', 'Font size', 'bamboonine'),
      'size'      => 24,
      'slug'      => 'l',
    ),
    array(
      'name'      => esc_html__('Extra Large', 'bamboonine'),
      'shortName' => esc_html_x('XL', 'Font size', 'bamboonine'),
      'size'      => 32,
      'slug'      => 'xl',
    ),
    array(
      'name'      => esc_html__('XXL', 'bamboonine'),
      'shortName' => esc_html_x('XXL', 'Font size', 'bamboonine'),
      'size'      => 40,
      'slug'      => 'xxl',
    ),
    array(
      'name'      => esc_html__('XXXL', 'bamboonine'),
      'shortName' => esc_html_x('XXXL', 'Font size', 'bamboonine'),
      'size'      => 48,
      'slug'      => 'xxxl',
    ),
  )
);

// Register ACF fields  
function my_acf_init() {
  // check function exists
  if( function_exists('acf_register_block') ) { 
    // register an accordion block
    acf_register_block(array(
      'name'              => 'accordion',
      'title'             => __('Accordion'),
      'description'       => __('Accordion Content (e.g. for FAQs)'),
      'render_callback'   => 'my_acf_block_render_callback',
      'category'          => 'design',
      'icon'              => 'excerpt-view',
      'keywords'          => array( 'accordion', 'faqs'),
      'mode'              => 'edit',
    )); 
    acf_register_block(array(
      'name'              => 'tabbed',
      'title'             => __('Tabbed Content'),
      'description'       => __('Tabbed Content Areas'),
      'render_callback'   => 'my_acf_block_render_callback',
      'category'          => 'design',
      'icon'              => 'index-card',
      'keywords'          => array( 'tabs, tabbed'),
      'mode'              => 'edit',
    )); 
  }
}
add_action('acf/init', 'my_acf_init');

//render ACF fields
function my_acf_block_render_callback( $block ) {
  // convert name ("acf/testimonials") into path friendly slug ("testimonials")
  $slug = str_replace('acf/', '', $block['name']);
  // include a template part from within the "template-parts/block" folder
  if( file_exists( get_theme_file_path("/gutenbergBlocks/content-{$slug}.php") ) ) {
      include( get_theme_file_path("/gutenbergBlocks/content-{$slug}.php") );
  }
}

// Set default colours found in the gutenberg editor with the colours found inside the styleGuide
function custom_editor_colors() {
  add_theme_support( 'editor-color-palette', array(
      array(
        'name'  => __( 'Custom Color 1', 'bamboonine' ),
        'slug'  => 'custom-color-1',
        'color' => '#ff0000',
      ),
      array(
        'name'  => __( 'Custom Color 2', 'bamboonine' ),
        'slug'  => 'custom-color-2',
        'color' => '#00ff00',
      ),
      array(
        'name'  => __( 'Custom Color 3', 'bamboonine' ),
        'slug'  => 'custom-color-3',
        'color' => '#0000ff',
      ),
  ) );
}
add_action( 'after_setup_theme', 'custom_editor_colors' );

// Set the default gradients found in the gutenberg editor with the colours found inside the styleGuide
function custom_editor_gradients() {
  add_theme_support( 'editor-gradient-presets', array(
      array(
        'name'     => __( 'Custom Gradient 1', 'bamboonine' ),
        'gradient' => 'linear-gradient(135deg, #ff0000 0%, #00ff00 100%)',
        'slug'     => 'custom-gradient-1',
      ),
      array(
        'name'     => __( 'Custom Gradient 2', 'bamboonine' ),
        'gradient' => 'linear-gradient(135deg, #0000ff 0%, #ffff00 100%)',
        'slug'     => 'custom-gradient-2',
      ),
  ) );
}
add_action( 'after_setup_theme', 'custom_editor_gradients' );
?>