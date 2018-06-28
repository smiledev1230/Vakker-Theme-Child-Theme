<?php

if(!function_exists('vakker_eltd_register_sticky_sidebar_widget')) {
	/**
	 * Function that register sticky sidebar widget
	 */
	function vakker_eltd_register_sticky_sidebar_widget($widgets) {
		$widgets[] = 'VakkerElatedStickySidebar';
		
		return $widgets;
	}
	
	add_filter('vakker_eltd_register_widgets', 'vakker_eltd_register_sticky_sidebar_widget');
}