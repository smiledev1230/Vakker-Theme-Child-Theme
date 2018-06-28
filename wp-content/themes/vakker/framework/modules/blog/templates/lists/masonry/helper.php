<?php

if ( ! function_exists( 'vakker_eltd_get_blog_holder_params' ) ) {
	/**
	 * Function that generates params for holders on blog templates
	 */
	function vakker_eltd_get_blog_holder_params( $params ) {
		$params_list = array();
		
		$masonry_layout = vakker_eltd_get_meta_field_intersect( 'blog_masonry_layout' );
		if ( $masonry_layout === 'in-grid' ) {
			$params_list['holder'] = 'eltd-container';
			$params_list['inner']  = 'eltd-container-inner clearfix';
		} else {
			$params_list['holder'] = 'eltd-full-width';
			$params_list['inner']  = 'eltd-full-width-inner';
		}
		
		return $params_list;
	}
	
	add_filter( 'vakker_eltd_blog_holder_params', 'vakker_eltd_get_blog_holder_params' );
}

if ( ! function_exists( 'vakker_eltd_get_blog_list_classes' ) ) {
	/**
	 * Function that generates blog list holder classes for blog list templates
	 */
	function vakker_eltd_get_blog_list_classes( $classes ) {
		$list_classes   = array();
		$list_classes[] = 'eltd-blog-type-masonry';
		
		$number_of_columns = vakker_eltd_get_meta_field_intersect( 'blog_masonry_number_of_columns' );
		if ( ! empty( $number_of_columns ) ) {
			$list_classes[] = 'eltd-blog-' . $number_of_columns . '-columns';
		}
		
		$space_between_items = vakker_eltd_get_meta_field_intersect( 'blog_masonry_space_between_items' );
		if ( ! empty( $space_between_items ) ) {
			$list_classes[] = 'eltd-' . $space_between_items . '-space';
		}
		
		$masonry_layout = vakker_eltd_get_meta_field_intersect( 'blog_masonry_layout' );
		$list_classes[] = 'eltd-blog-masonry-' . $masonry_layout;
		
		$classes = array_merge( $classes, $list_classes );
		
		return $classes;
	}
	
	add_filter( 'vakker_eltd_blog_list_classes', 'vakker_eltd_get_blog_list_classes' );
}

if ( ! function_exists( 'vakker_eltd_blog_part_params' ) ) {
	function vakker_eltd_blog_part_params( $params ) {
		$part_params              = array();
		$part_params['title_tag'] = 'h3';
		$part_params['link_tag']  = 'h6';
		$part_params['quote_tag'] = 'h6';
		
		return array_merge( $params, $part_params );
	}
	
	add_filter( 'vakker_eltd_blog_part_params', 'vakker_eltd_blog_part_params' );
}