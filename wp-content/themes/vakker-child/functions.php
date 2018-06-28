<?php

/*** Child Theme Function  ***/

function vakker_eltd_child_theme_enqueue_scripts() {
	
	$parent_style = 'vakker_eltd_default_style';
	
	wp_enqueue_style('vakker_eltd_child_style', get_stylesheet_directory_uri() . '/style.css', array($parent_style));
}

add_action( 'wp_enqueue_scripts', 'vakker_eltd_child_theme_enqueue_scripts' );