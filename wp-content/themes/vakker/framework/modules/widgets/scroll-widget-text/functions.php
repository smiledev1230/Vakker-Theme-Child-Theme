<?php

if ( ! function_exists( 'vakker_eltd_register_scroll_text_widget' ) ) {
	/**
	 * Function that register blog list widget
	 */
	function vakker_eltd_register_scroll_text_widget( $widgets ) {
		$widgets[] = 'VakkerElatedScrollTextWidget';
		
		return $widgets;
	}
	
	add_filter( 'vakker_eltd_register_widgets', 'vakker_eltd_register_scroll_text_widget' );
}