<?php

remove_action('wp_head', 'wp_generator');

function register_header_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_header_menu' );

add_theme_support( 'post-thumbnails' );

?>