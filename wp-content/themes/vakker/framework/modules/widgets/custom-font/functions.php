<?php

if ( ! function_exists( 'vakker_eltd_register_custom_font_widget' ) ) {
	/**
	 * Function that register custom font widget
	 */
	function vakker_eltd_register_custom_font_widget( $widgets ) {
		$widgets[] = 'VakkerElatedCustomFontWidget';
		
		return $widgets;
	}
	
	add_filter( 'vakker_eltd_register_widgets', 'vakker_eltd_register_custom_font_widget' );
}