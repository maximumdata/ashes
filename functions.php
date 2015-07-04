<?php

remove_action('wp_head', 'wp_generator');

function register_header_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
  register_nav_menu('off-canvas-menu', __('Mobile Menu'));
}
add_action( 'init', 'register_header_menu' );

add_filter( 'pre_get_posts', 'my_get_posts' );

function my_get_posts( $query ) {

	if ( ( is_home() && $query->is_main_query() ) || is_feed() )
		$query->set( 'post_type', array( 'post', 'projects' ) );

	return $query;
}

?>