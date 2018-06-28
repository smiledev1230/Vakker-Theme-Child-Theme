<?php

if ( ! function_exists( 'vakker_eltd_register_social_icon_widget' ) ) {
	/**
	 * Function that register social icon widget
	 */
	function vakker_eltd_register_social_icon_widget( $widgets ) {
		$widgets[] = 'VakkerElatedSocialIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'vakker_eltd_register_widgets', 'vakker_eltd_register_social_icon_widget' );
}