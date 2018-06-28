<?php

if ( ! function_exists( 'vakker_eltd_register_search_opener_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function vakker_eltd_register_search_opener_widget( $widgets ) {
		$widgets[] = 'VakkerElatedSearchOpener';
		
		return $widgets;
	}
	
	add_filter( 'vakker_eltd_register_widgets', 'vakker_eltd_register_search_opener_widget' );
}