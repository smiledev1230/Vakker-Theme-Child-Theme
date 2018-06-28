<?php

if(!function_exists('vakker_eltd_register_author_widget')) {
	/**
	 * Function that register author widget
	 */
	function vakker_eltd_register_author_widget($widgets) {
		$widgets[] = 'VakkerElatedAuthorWidget';
		
		return $widgets;
	}
	
	add_filter('vakker_eltd_register_widgets', 'vakker_eltd_register_author_widget');
}