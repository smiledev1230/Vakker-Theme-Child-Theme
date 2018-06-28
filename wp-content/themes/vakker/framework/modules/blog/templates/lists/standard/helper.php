<?php

if ( ! function_exists( 'vakker_eltd_get_blog_holder_params' ) ) {
	/**
	 * Function that generates params for holders on blog templates
	 */
	function vakker_eltd_get_blog_holder_params( $params ) {
		$params_list = array();
		
		$params_list['holder'] = 'eltd-container';
		$params_list['inner']  = 'eltd-container-inner clearfix';
		
		return $params_list;
	}
	
	add_filter( 'vakker_eltd_blog_holder_params', 'vakker_eltd_get_blog_holder_params' );
}

if ( ! function_exists( 'vakker_eltd_get_blog_holder_classes' ) ) {
	/**
	 * Function that generates blog holder classes for blog page
	 */
	function vakker_eltd_get_blog_holder_classes( $classes ) {
		$sidebar_classes   = array();
		$sidebar_classes[] = 'eltd-grid-huge-gutter';
		
		return implode( ' ', $sidebar_classes );
	}
	
	add_filter( 'vakker_eltd_blog_holder_classes', 'vakker_eltd_get_blog_holder_classes' );
}

if ( ! function_exists( 'vakker_eltd_blog_part_params' ) ) {
	function vakker_eltd_blog_part_params( $params ) {
		
		$part_params              = array();
		$part_params['title_tag'] = 'h2';
		$part_params['link_tag']  = 'h6';
		$part_params['quote_tag'] = 'h6';
		
		return array_merge( $params, $part_params );
	}
	
	add_filter( 'vakker_eltd_blog_part_params', 'vakker_eltd_blog_part_params' );
}