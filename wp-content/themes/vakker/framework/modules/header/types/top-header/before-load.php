<?php

if ( ! function_exists( 'vakker_eltd_set_show_dep_options_for_top_header' ) ) {
	/**
	 * This function is used to show this header type specific containers/panels for admin options when another header type is selected
	 */
	function vakker_eltd_set_show_dep_options_for_top_header( $show_dep_options ) {
		$show_dep_options[] = '#eltd_top_header_container';
		
		return $show_dep_options;
	}
	
	// show top header container for global options
	add_filter( 'vakker_eltd_show_dep_options_for_header_box', 'vakker_eltd_set_show_dep_options_for_top_header' );
	add_filter( 'vakker_eltd_show_dep_options_for_header_centered', 'vakker_eltd_set_show_dep_options_for_top_header' );
	add_filter( 'vakker_eltd_show_dep_options_for_header_divided', 'vakker_eltd_set_show_dep_options_for_top_header' );
	add_filter( 'vakker_eltd_show_dep_options_for_header_minimal', 'vakker_eltd_set_show_dep_options_for_top_header' );
	add_filter( 'vakker_eltd_show_dep_options_for_header_standard', 'vakker_eltd_set_show_dep_options_for_top_header' );
	add_filter( 'vakker_eltd_show_dep_options_for_header_standard_extended', 'vakker_eltd_set_show_dep_options_for_top_header' );
	add_filter( 'vakker_eltd_show_dep_options_for_header_tabbed', 'vakker_eltd_set_show_dep_options_for_top_header' );
	
	// show top header container for meta boxes
	add_filter( 'vakker_eltd_show_dep_options_for_header_box_meta_boxes', 'vakker_eltd_set_show_dep_options_for_top_header' );
	add_filter( 'vakker_eltd_show_dep_options_for_header_centered_meta_boxes', 'vakker_eltd_set_show_dep_options_for_top_header' );
	add_filter( 'vakker_eltd_show_dep_options_for_header_divided_meta_boxes', 'vakker_eltd_set_show_dep_options_for_top_header' );
	add_filter( 'vakker_eltd_show_dep_options_for_header_minimal_meta_boxes', 'vakker_eltd_set_show_dep_options_for_top_header' );
	add_filter( 'vakker_eltd_show_dep_options_for_header_standard_meta_boxes', 'vakker_eltd_set_show_dep_options_for_top_header' );
	add_filter( 'vakker_eltd_show_dep_options_for_header_standard_extended_meta_boxes', 'vakker_eltd_set_show_dep_options_for_top_header' );
	add_filter( 'vakker_eltd_show_dep_options_for_header_tabbed_meta_boxes', 'vakker_eltd_set_show_dep_options_for_top_header' );
}

if ( ! function_exists( 'vakker_eltd_set_hide_dep_options_for_top_header' ) ) {
	/**
	 * This function is used to hide this header type specific containers/panels for admin options when another header type is selected
	 */
	function vakker_eltd_set_hide_dep_options_for_top_header( $hide_dep_options ) {
		$hide_dep_options[] = '#eltd_top_header_container';
		
		return $hide_dep_options;
	}
	
	// hide top header container for global options
	add_filter( 'vakker_eltd_hide_dep_options_for_header_top_menu', 'vakker_eltd_set_hide_dep_options_for_top_header' );
	add_filter( 'vakker_eltd_hide_dep_options_for_header_vertical', 'vakker_eltd_set_hide_dep_options_for_top_header' );
	add_filter( 'vakker_eltd_hide_dep_options_for_header_vertical_closed', 'vakker_eltd_set_hide_dep_options_for_top_header' );
	add_filter( 'vakker_eltd_hide_dep_options_for_header_vertical_compact', 'vakker_eltd_set_hide_dep_options_for_top_header' );
	
	// hide top header container for meta boxes
	add_filter( 'vakker_eltd_hide_dep_options_for_header_top_menu_meta_boxes', 'vakker_eltd_set_hide_dep_options_for_top_header' );
	add_filter( 'vakker_eltd_hide_dep_options_for_header_vertical_meta_boxes', 'vakker_eltd_set_hide_dep_options_for_top_header' );
	add_filter( 'vakker_eltd_hide_dep_options_for_header_vertical_closed_meta_boxes', 'vakker_eltd_set_hide_dep_options_for_top_header' );
	add_filter( 'vakker_eltd_hide_dep_options_for_header_vertical_compact_meta_boxes', 'vakker_eltd_set_hide_dep_options_for_top_header' );
}