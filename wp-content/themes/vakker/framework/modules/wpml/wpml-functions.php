<?php

if ( ! function_exists( 'vakker_eltd_disable_wpml_css' ) ) {
	function vakker_eltd_disable_wpml_css() {
		define( 'ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true );
	}
	
	add_action( 'after_setup_theme', 'vakker_eltd_disable_wpml_css' );
}