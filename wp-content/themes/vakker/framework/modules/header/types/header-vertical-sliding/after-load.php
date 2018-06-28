<?php

if ( ! function_exists( 'vakker_eltd_disable_behaviors_for_header_vertical_sliding' ) ) {
	/**
	 * This function is used to disable sticky header functions that perform processing variables their used in js for this header type
	 */
	function vakker_eltd_disable_behaviors_for_header_vertical_sliding( $allow_behavior ) {
		return false;
	}
	
	if ( vakker_eltd_check_is_header_type_enabled( 'header-vertical-sliding', vakker_eltd_get_page_id() ) ) {
		add_filter( 'vakker_eltd_allow_sticky_header_behavior', 'vakker_eltd_disable_behaviors_for_header_vertical_sliding' );
		add_filter( 'vakker_eltd_allow_content_boxed_layout', 'vakker_eltd_disable_behaviors_for_header_vertical_sliding' );
	}
}