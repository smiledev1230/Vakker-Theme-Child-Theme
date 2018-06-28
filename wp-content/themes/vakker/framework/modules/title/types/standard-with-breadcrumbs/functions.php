<?php

if ( ! function_exists( 'vakker_eltd_set_title_standard_with_breadcrumbs_type_for_options' ) ) {
	/**
	 * This function set standard with breadcrumbs title type value for title options map and meta boxes
	 */
	function vakker_eltd_set_title_standard_with_breadcrumbs_type_for_options( $type ) {
		$type['standard-with-breadcrumbs'] = esc_html__( 'Standard With Breadcrumbs', 'vakker' );
		
		return $type;
	}
	
	add_filter( 'vakker_eltd_title_type_global_option', 'vakker_eltd_set_title_standard_with_breadcrumbs_type_for_options' );
	add_filter( 'vakker_eltd_title_type_meta_boxes', 'vakker_eltd_set_title_standard_with_breadcrumbs_type_for_options' );
}