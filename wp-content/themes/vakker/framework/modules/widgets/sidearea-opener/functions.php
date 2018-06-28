<?php

if ( ! function_exists( 'vakker_eltd_register_sidearea_opener_widget' ) ) {
	/**
	 * Function that register sidearea opener widget
	 */
	function vakker_eltd_register_sidearea_opener_widget( $widgets ) {
		$widgets[] = 'VakkerElatedSideAreaOpener';
		
		return $widgets;
	}
	
	add_filter( 'vakker_eltd_register_widgets', 'vakker_eltd_register_sidearea_opener_widget' );
}