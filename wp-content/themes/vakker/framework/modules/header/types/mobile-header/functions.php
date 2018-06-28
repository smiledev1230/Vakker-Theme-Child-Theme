<?php

if ( ! function_exists( 'vakker_eltd_include_mobile_header_menu' ) ) {
	function vakker_eltd_include_mobile_header_menu( $menus ) {
		$menus['mobile-navigation'] = esc_html__( 'Mobile Navigation', 'vakker' );
		
		return $menus;
	}
	
	add_filter( 'vakker_eltd_register_headers_menu', 'vakker_eltd_include_mobile_header_menu' );
}

if ( ! function_exists( 'vakker_eltd_register_mobile_header_areas' ) ) {
	/**
	 * Registers widget areas for mobile header
	 */
	function vakker_eltd_register_mobile_header_areas() {
		if ( vakker_eltd_is_responsive_on() ) {
			register_sidebar(
				array(
					'id'            => 'eltd-right-from-mobile-logo',
					'name'          => esc_html__( 'Mobile Header Widget Area', 'vakker' ),
					'description'   => esc_html__( 'Widgets added here will appear on the right hand side from the mobile logo on mobile header', 'vakker' ),
					'before_widget' => '<div id="%1$s" class="widget %2$s eltd-right-from-mobile-logo">',
					'after_widget'  => '</div>'
				)
			);
		}
	}
	
	add_action( 'widgets_init', 'vakker_eltd_register_mobile_header_areas' );
}

if ( ! function_exists( 'vakker_eltd_mobile_header_class' ) ) {
	function vakker_eltd_mobile_header_class( $classes ) {
		$classes[] = 'eltd-default-mobile-header';
		
		$classes[] = 'eltd-sticky-up-mobile-header';
		
		return $classes;
	}
	
	add_filter( 'body_class', 'vakker_eltd_mobile_header_class' );
}

if ( ! function_exists( 'vakker_eltd_get_mobile_header' ) ) {
	/**
	 * Loads mobile header HTML only if responsiveness is enabled
	 */
	function vakker_eltd_get_mobile_header( $slug = '', $module = '' ) {
		if ( vakker_eltd_is_responsive_on() ) {
			$mobile_menu_title = vakker_eltd_options()->getOptionValue( 'mobile_menu_title' );
			$has_navigation    = has_nav_menu( 'main-navigation' ) || has_nav_menu( 'mobile-navigation' ) ? true : false;
			
			$parameters = array(
				'show_navigation_opener' => $has_navigation,
				'mobile_menu_title'      => $mobile_menu_title
			);

            $module = apply_filters('vakker_eltd_mobile_menu_module', 'header/types/mobile-header');
            $slug = apply_filters('vakker_eltd_mobile_menu_slug', '');

            vakker_eltd_get_module_template_part( 'templates/mobile-header', $module, $slug, $parameters );
		}
	}
	
	add_action( 'vakker_eltd_after_wrapper_inner', 'vakker_eltd_get_mobile_header', 20 );
}

if ( ! function_exists( 'vakker_eltd_get_mobile_logo' ) ) {
	/**
	 * Loads mobile logo HTML. It checks if mobile logo image is set and uses that, else takes normal logo image
	 */
	function vakker_eltd_get_mobile_logo() {
		$show_logo_image = vakker_eltd_options()->getOptionValue( 'hide_logo' ) === 'yes' ? false : true;
		
		if ( $show_logo_image ) {
			$mobile_logo_image = vakker_eltd_get_meta_field_intersect( 'logo_image_mobile', vakker_eltd_get_page_id() );
			
			//check if mobile logo has been set and use that, else use normal logo
			$logo_image = ! empty( $mobile_logo_image ) ? $mobile_logo_image : vakker_eltd_get_meta_field_intersect( 'logo_image', vakker_eltd_get_page_id() );
			
			//get logo image dimensions and set style attribute for image link.
			$logo_dimensions = vakker_eltd_get_image_dimensions( $logo_image );
			
			$logo_height = '';
			$logo_styles = '';
			if ( is_array( $logo_dimensions ) && array_key_exists( 'height', $logo_dimensions ) ) {
				$logo_height = $logo_dimensions['height'];
				$logo_styles = 'height: ' . intval( $logo_height / 2 ) . 'px'; //divided with 2 because of retina screens
			}
			
			//set parameters for logo
			$parameters = array(
				'logo_image'      => $logo_image,
				'logo_dimensions' => $logo_dimensions,
				'logo_height'     => $logo_height,
				'logo_styles'     => $logo_styles
			);
			
			vakker_eltd_get_module_template_part( 'templates/mobile-logo', 'header/types/mobile-header', '', $parameters );
		}
	}
}

if ( ! function_exists( 'vakker_eltd_get_mobile_nav' ) ) {
	/**
	 * Loads mobile navigation HTML
	 */
	function vakker_eltd_get_mobile_nav() {
		vakker_eltd_get_module_template_part( 'templates/mobile-navigation', 'header/types/mobile-header' );
	}
}

if ( ! function_exists( 'cityrama_eltd_mobile_header_per_page_js_var' ) ) {
    function cityrama_eltd_mobile_header_per_page_js_var( $perPageVars ) {
        $perPageVars['eltdMobileHeaderHeight'] = vakker_eltd_set_default_mobile_menu_height_for_header_types();

        return $perPageVars;
    }

    add_filter( 'cityrama_eltd_per_page_js_vars', 'cityrama_eltd_mobile_header_per_page_js_var' );
}