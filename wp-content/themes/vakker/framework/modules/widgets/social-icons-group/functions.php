<?php

if ( ! function_exists( 'vakker_eltd_register_social_icons_widget' ) ) {
	/**
	 * Function that register social icon widget
	 */
	function vakker_eltd_register_social_icons_widget( $widgets ) {
		$widgets[] = 'VakkerElatedClassIconsGroupWidget';
		
		return $widgets;
	}
	
	add_filter( 'vakker_eltd_register_widgets', 'vakker_eltd_register_social_icons_widget' );
}