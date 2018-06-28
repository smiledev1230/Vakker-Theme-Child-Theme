<?php

if ( ! function_exists( 'vakker_eltd_register_recent_posts_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function vakker_eltd_register_recent_posts_widget( $widgets ) {
		$widgets[] = 'VakkerElatedRecentPosts';
		
		return $widgets;
	}
	
	add_filter( 'vakker_eltd_register_widgets', 'vakker_eltd_register_recent_posts_widget' );
}