<?php

if ( ! function_exists( 'vakker_eltd_register_blog_list_widget' ) ) {
	/**
	 * Function that register blog list widget
	 */
	function vakker_eltd_register_blog_list_widget( $widgets ) {
		$widgets[] = 'VakkerElatedBlogListWidget';
		
		return $widgets;
	}
	
	add_filter( 'vakker_eltd_register_widgets', 'vakker_eltd_register_blog_list_widget' );
}