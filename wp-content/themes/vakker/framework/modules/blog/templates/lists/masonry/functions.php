<?php

if ( ! function_exists( 'vakker_eltd_register_blog_masonry_template_file' ) ) {
	/**
	 * Function that register blog masonry template
	 */
	function vakker_eltd_register_blog_masonry_template_file( $templates ) {
		$templates['blog-masonry'] = esc_html__( 'Blog: Masonry', 'vakker' );
		
		return $templates;
	}
	
	add_filter( 'vakker_eltd_register_blog_templates', 'vakker_eltd_register_blog_masonry_template_file' );
}

if ( ! function_exists( 'vakker_eltd_set_blog_masonry_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function vakker_eltd_set_blog_masonry_type_global_option( $options ) {
		$options['masonry'] = esc_html__( 'Blog: Masonry', 'vakker' );
		
		return $options;
	}
	
	add_filter( 'vakker_eltd_blog_list_type_global_option', 'vakker_eltd_set_blog_masonry_type_global_option' );
}