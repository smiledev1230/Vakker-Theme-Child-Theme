<?php

if ( ! function_exists( 'vakker_eltd_register_separator_widget' ) ) {
	/**
	 * Function that register separator widget
	 */
	function vakker_eltd_register_separator_widget( $widgets ) {
		$widgets[] = 'VakkerElatedSeparatorWidget';
		
		return $widgets;
	}
	
	add_filter( 'vakker_eltd_register_widgets', 'vakker_eltd_register_separator_widget' );
}