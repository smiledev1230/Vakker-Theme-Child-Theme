<?php

if ( ! function_exists( 'vakker_eltd_register_button_widget' ) ) {
	/**
	 * Function that register button widget
	 */
	function vakker_eltd_register_button_widget( $widgets ) {
		$widgets[] = 'VakkerElatedButtonWidget';
		
		return $widgets;
	}
	
	add_filter( 'vakker_eltd_register_widgets', 'vakker_eltd_register_button_widget' );
}