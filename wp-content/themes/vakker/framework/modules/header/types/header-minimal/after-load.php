<?php

if ( ! function_exists( 'vakker_eltd_header_minimal_full_screen_menu_body_class' ) ) {
	/**
	 * Function that adds body classes for different full screen menu types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function vakker_eltd_header_minimal_full_screen_menu_body_class( $classes ) {
		$classes[] = 'eltd-' . vakker_eltd_options()->getOptionValue( 'fullscreen_menu_animation_style' );
		
		return $classes;
	}
	
	if ( vakker_eltd_check_is_header_type_enabled( 'header-minimal', vakker_eltd_get_page_id() ) ) {
		add_filter( 'body_class', 'vakker_eltd_header_minimal_full_screen_menu_body_class' );
	}
}

if ( ! function_exists( 'vakker_eltd_get_header_minimal_full_screen_menu' ) ) {
	/**
	 * Loads fullscreen menu HTML template
	 */
	function vakker_eltd_get_header_minimal_full_screen_menu() {
		$parameters = array(
			'fullscreen_menu_in_grid' => vakker_eltd_options()->getOptionValue( 'fullscreen_in_grid' ) === 'yes' ? true : false
		);
		
		vakker_eltd_get_module_template_part( 'templates/full-screen-menu', 'header/types/header-minimal', '', $parameters );
	}
	
	if ( vakker_eltd_check_is_header_type_enabled( 'header-minimal', vakker_eltd_get_page_id() ) ) {
		add_action( 'vakker_eltd_after_wrapper_inner', 'vakker_eltd_get_header_minimal_full_screen_menu', 40 );
	}
}

if ( ! function_exists( 'vakker_eltd_header_minimal_mobile_menu_module' ) ) {
    /**
     * Function that edits module for mobile menu
     *
     * @param $module - default module value
     *
     * @return string name of module
     */
    function vakker_eltd_header_minimal_mobile_menu_module( $module ) {
        return 'header/types/header-minimal';
    }

    if ( vakker_eltd_check_is_header_type_enabled( 'header-minimal', vakker_eltd_get_page_id() ) ) {
        add_filter('vakker_eltd_mobile_menu_module', 'vakker_eltd_header_minimal_mobile_menu_module');
    }
}

if ( ! function_exists( 'vakker_eltd_header_minimal_mobile_menu_slug' ) ) {
    /**
     * Function that edits slug for mobile menu
     *
     * @param $slug - default slug value
     *
     * @return string name of slug
     */
    function vakker_eltd_header_minimal_mobile_menu_slug( $slug ) {
        return 'minimal';
    }

    if ( vakker_eltd_check_is_header_type_enabled( 'header-minimal', vakker_eltd_get_page_id() ) ) {
        add_filter('vakker_eltd_mobile_menu_slug', 'vakker_eltd_header_minimal_mobile_menu_slug');
    }
}