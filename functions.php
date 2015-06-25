<?php

remove_action('wp_head', 'wp_generator');

function register_header_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
  register_nav_menu('off-canvas-menu', __('Mobile Menu'));
}
add_action( 'init', 'register_header_menu' );

//add_theme_support( 'post-thumbnails' );

?>