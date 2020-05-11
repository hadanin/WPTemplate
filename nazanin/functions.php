<?php
function Nazanin_enqueue() {
    wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
    if($_SERVER['SERVER_NAME'] != 'localhost'){
      wp_enqueue_style('style', get_template_directory_uri() . '/style.min.css');
    } else{
      wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
    }
    wp_enqueue_script( 'customjs', get_template_directory_uri() . '/assets/js/custom.min.js', array('jquery'), '', true );
    wp_enqueue_style('Montserrat', "https://fonts.googleapis.com/css?family=Montserrat:700|Montserrat:normal|Montserrat:300");
    wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.2.0/css/all.css');
    wp_enqueue_script( 'bootstrapcdn', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array('jquery'), '', true );
}
add_action('wp_enqueue_scripts', 'Nazanin_enqueue');
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
  if(!file_exists(get_template_directory() . '/class-wp-bootstrap-navwalker.php')){
    return new WP_Error('class-wp-bootstrap-navwalker-missing', __('It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker'));
  }else{
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
  }
}
add_action('after_setup_theme', 'register_navwalker');

register_nav_menus( array(
  'primary' => __('Primary Menu', 'Nazanin'),
) );