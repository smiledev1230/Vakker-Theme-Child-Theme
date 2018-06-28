<?php

if ( ! function_exists( 'vakker_eltd_register_header_expanding_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function vakker_eltd_register_header_expanding_type( $header_types ) {
		$header_type = array(
			'header-expanding' => 'VakkerElated\Modules\Header\Types\HeaderExpanding'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'vakker_eltd_init_register_header_expanding_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function vakker_eltd_init_register_header_expanding_type() {
		add_filter( 'vakker_eltd_register_header_type_class', 'vakker_eltd_register_header_expanding_type' );
	}
	
	add_action( 'vakker_eltd_before_header_function_init', 'vakker_eltd_init_register_header_expanding_type' );
}