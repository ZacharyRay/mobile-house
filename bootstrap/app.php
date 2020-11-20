<?php

define('THEME_VERSION', '1.0');

/**
 * Enqueue CSS and JS files
 */
function include_scripts() {
  wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');

  wp_enqueue_style('flickity-css', get_template_directory_uri() . '/dist/flickity.css');

  wp_enqueue_style('flickity-fade-css', 'https://unpkg.com/flickity-fade@1/flickity-fade.css');

  wp_enqueue_style('stylesheet', get_stylesheet_uri());

  wp_deregister_script('jquery');

	wp_enqueue_script('jquery', get_template_directory_uri() . '/dist/jquery.js', array(), '', false);

  wp_enqueue_script('flickity-js', get_template_directory_uri() . '/dist/flickity.min.js', array(), '', false);

  wp_enqueue_script('simpleparallax-js', 'https://cdn.jsdelivr.net/npm/simple-parallax-js@5.2.0/dist/simpleParallax.min.js', array(), '', false);

  wp_enqueue_script('flickity-fade-js', 'https://unpkg.com/flickity-fade@1/flickity-fade.js', array(), '', false);

  wp_enqueue_script('main-js', get_template_directory_uri() . '/dist/main.js', array(), THEME_VERSION, false);

  wp_localize_script( 'main-js', 'props',
      array( 
        'homeURL' => home_url()
      )
    );

  wp_enqueue_script('google-maps-js', 'https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCuYDseipf-kuYHfdk2YBrf5lPS0vRlu3w', array());
}
add_action('wp_enqueue_scripts', 'include_scripts');

/**
 * Add theme support for featured image
 */
add_theme_support( 'post-thumbnails' );

/**
 * Allow SVG upload
 */
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/**
 * Add theme support for featured image
 */
function register_menus() {
  register_nav_menu('primary', 'Primary');
  register_nav_menu('top', 'Top');
  register_nav_menu('footer-primary', 'Footer - First');
  register_nav_menu('footer-secondary', 'Footer - Second');
}
add_action( 'init', 'register_menus' );

/**
 * Add image sizes
 */
add_image_size( 'square', 500, 500, true );
add_image_size( 'hero', 1450, 800, true );
add_image_size( 'column', 850, 480, true );
add_image_size( 'document', 400, 570, true );

/**
 * Add image sizes
 */
function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyCuYDseipf-kuYHfdk2YBrf5lPS0vRlu3w');
}
add_action('acf/init', 'my_acf_init');