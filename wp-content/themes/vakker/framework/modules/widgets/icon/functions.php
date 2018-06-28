<?php

if ( ! function_exists( 'vakker_eltd_register_icon_widget' ) ) {
	/**
	 * Function that register icon widget
	 */
	function vakker_eltd_register_icon_widget( $widgets ) {
		$widgets[] = 'VakkerElatedIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'vakker_eltd_register_widgets', 'vakker_eltd_register_icon_widget' );
}