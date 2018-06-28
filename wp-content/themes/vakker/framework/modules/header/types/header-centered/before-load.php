<?php

if ( ! function_exists( 'vakker_eltd_set_header_centered_type_global_option' ) ) {
	/**
	 * This function set header type value for global header option map
	 */
	function vakker_eltd_set_header_centered_type_global_option( $header_types ) {
		$header_types['header-centered'] = array(
			'image' => ELATED_FRAMEWORK_HEADER_TYPES_ROOT . '/header-centered/assets/img/header-centered.png',
			'label' => esc_html__( 'Centered', 'vakker' )
		);
		
		return $header_types;
	}
	
	add_filter( 'vakker_eltd_header_type_global_option', 'vakker_eltd_set_header_centered_type_global_option' );
}

if ( ! function_exists( 'vakker_eltd_set_header_centered_type_meta_boxes_option' ) ) {
	/**
	 * This function set header type value for header meta boxes map
	 */
	function vakker_eltd_set_header_centered_type_meta_boxes_option( $header_type_options ) {
		$header_type_options['header-centered'] = esc_html__( 'Centered', 'vakker' );
		
		return $header_type_options;
	}
	
	add_filter( 'vakker_eltd_header_type_meta_boxes', 'vakker_eltd_set_header_centered_type_meta_boxes_option' );
}

if ( ! function_exists( 'vakker_eltd_set_show_dep_options_for_header_centered' ) ) {
	/**
	 * This function set show container values when this header type is selected for header type global option
	 */
	function vakker_eltd_set_show_dep_options_for_header_centered( $show_dep_options ) {
		$show_containers   = array();
		$show_containers[] = '#eltd_header_behaviour';
		$show_containers[] = '#eltd_menu_area_container';
		$show_containers[] = '#eltd_logo_area_container';
		$show_containers[] = '#eltd_logo_wrapper_padding_header_centered';
		$show_containers[] = '#eltd_panel_main_menu';
		$show_containers[] = '#eltd_panel_sticky_header';
		$show_containers[] = '#eltd_panel_fixed_header';
		
		$show_containers = apply_filters( 'vakker_eltd_show_dep_options_for_header_centered', $show_containers );
		
		$show_dep_options['header-centered'] = implode( ',', $show_containers );
		
		return $show_dep_options;
	}
	
	add_filter( 'vakker_eltd_header_type_show_global_option', 'vakker_eltd_set_show_dep_options_for_header_centered' );
}

if ( ! function_exists( 'vakker_eltd_set_hide_dep_options_for_header_centered' ) ) {
	/**
	 * This function set hide container values when this header type is selected for header type global option
	 */
	function vakker_eltd_set_hide_dep_options_for_header_centered( $hide_dep_options ) {
		$hide_containers   = array();
		$hide_containers[] = '#eltd_panel_fullscreen_menu';
		
		$hide_containers = apply_filters( 'vakker_eltd_hide_dep_options_for_header_centered', $hide_containers );
		
		$hide_dep_options['header-centered'] = implode( ',', $hide_containers );
		
		return $hide_dep_options;
	}
	
	add_filter( 'vakker_eltd_header_type_hide_global_option', 'vakker_eltd_set_hide_dep_options_for_header_centered' );
}

if ( ! function_exists( 'vakker_eltd_set_show_dep_options_for_header_centered_meta_boxes' ) ) {
	/**
	 * This function set show container values when this header type is selected for header type meta boxes map
	 */
	function vakker_eltd_set_show_dep_options_for_header_centered_meta_boxes( $show_dep_options ) {
		$show_containers   = array();
		$show_containers[] = '#eltd_logo_area_container';
		$show_containers[] = '#eltd_menu_area_container';
		$show_containers[] = '#eltd_logo_wrapper_padding_header_centered';
		
		$show_containers = apply_filters( 'vakker_eltd_show_dep_options_for_header_centered_meta_boxes', $show_containers );
		
		$show_dep_options['header-centered'] = implode( ',', $show_containers );
		
		return $show_dep_options;
	}
	
	add_filter( 'vakker_eltd_header_type_show_meta_boxes', 'vakker_eltd_set_show_dep_options_for_header_centered_meta_boxes' );
}

if ( ! function_exists( 'vakker_eltd_set_hide_dep_options_for_header_centered_meta_boxes' ) ) {
	/**
	 * This function set hide container values when this header type is selected for header type meta boxes map
	 */
	function vakker_eltd_set_hide_dep_options_for_header_centered_meta_boxes( $hide_dep_options ) {
		$hide_containers = apply_filters( 'vakker_eltd_hide_dep_options_for_header_centered_meta_boxes', $hide_containers = array() );
		
		$hide_dep_options['header-centered'] = implode( ',', $hide_containers );
		
		return $hide_dep_options;
	}
	
	add_filter( 'vakker_eltd_header_type_hide_meta_boxes', 'vakker_eltd_set_hide_dep_options_for_header_centered_meta_boxes' );
}

if ( ! function_exists( 'vakker_eltd_set_centered_hide_dep_options_for_header_types' ) ) {
	/**
	 * This function is used to disable this header type specific containers/panels for admin options when another header type is selected
	 */
	function vakker_eltd_set_centered_hide_dep_options_for_header_types( $hide_containers_dep_options ) {
		$hide_containers_dep_options[] = '#eltd_logo_wrapper_padding_header_centered';
		
		return $hide_containers_dep_options;
	}
	
	// hide header centered container for global options
	add_filter( 'vakker_eltd_hide_dep_options_for_header_box', 'vakker_eltd_set_centered_hide_dep_options_for_header_types' );
	add_filter( 'vakker_eltd_hide_dep_options_for_header_divided', 'vakker_eltd_set_centered_hide_dep_options_for_header_types' );
	add_filter( 'vakker_eltd_hide_dep_options_for_header_minimal', 'vakker_eltd_set_centered_hide_dep_options_for_header_types' );
	add_filter( 'vakker_eltd_hide_dep_options_for_header_standard', 'vakker_eltd_set_centered_hide_dep_options_for_header_types' );
	add_filter( 'vakker_eltd_hide_dep_options_for_header_standard_extended', 'vakker_eltd_set_centered_hide_dep_options_for_header_types' );
	add_filter( 'vakker_eltd_hide_dep_options_for_header_tabbed', 'vakker_eltd_set_centered_hide_dep_options_for_header_types' );
	add_filter( 'vakker_eltd_hide_dep_options_for_header_top_menu', 'vakker_eltd_set_centered_hide_dep_options_for_header_types' );
	add_filter( 'vakker_eltd_hide_dep_options_for_header_vertical', 'vakker_eltd_set_centered_hide_dep_options_for_header_types' );
	add_filter( 'vakker_eltd_hide_dep_options_for_header_vertical_closed', 'vakker_eltd_set_centered_hide_dep_options_for_header_types' );
	add_filter( 'vakker_eltd_hide_dep_options_for_header_vertical_compact', 'vakker_eltd_set_centered_hide_dep_options_for_header_types' );
	
	// hide header centered container for meta boxes
	add_filter( 'vakker_eltd_hide_dep_options_for_header_box_meta_boxes', 'vakker_eltd_set_centered_hide_dep_options_for_header_types' );
	add_filter( 'vakker_eltd_hide_dep_options_for_header_divided_meta_boxes', 'vakker_eltd_set_centered_hide_dep_options_for_header_types' );
	add_filter( 'vakker_eltd_hide_dep_options_for_header_minimal_meta_boxes', 'vakker_eltd_set_centered_hide_dep_options_for_header_types' );
	add_filter( 'vakker_eltd_hide_dep_options_for_header_standard_meta_boxes', 'vakker_eltd_set_centered_hide_dep_options_for_header_types' );
	add_filter( 'vakker_eltd_hide_dep_options_for_header_standard_extended_meta_boxes', 'vakker_eltd_set_centered_hide_dep_options_for_header_types' );
	add_filter( 'vakker_eltd_hide_dep_options_for_header_tabbed_meta_boxes', 'vakker_eltd_set_centered_hide_dep_options_for_header_types' );
	add_filter( 'vakker_eltd_hide_dep_options_for_header_top_menu_meta_boxes', 'vakker_eltd_set_centered_hide_dep_options_for_header_types' );
	add_filter( 'vakker_eltd_hide_dep_options_for_header_vertical_meta_boxes', 'vakker_eltd_set_centered_hide_dep_options_for_header_types' );
	add_filter( 'vakker_eltd_hide_dep_options_for_header_vertical_closed_meta_boxes', 'vakker_eltd_set_centered_hide_dep_options_for_header_types' );
	add_filter( 'vakker_eltd_hide_dep_options_for_header_vertical_compact_meta_boxes', 'vakker_eltd_set_centered_hide_dep_options_for_header_types' );
}

if ( ! function_exists( 'vakker_eltd_set_hide_dep_options_header_centered' ) ) {
	/**
	 * This function is used to hide all containers/panels for admin options when this header type is selected
	 */
	function vakker_eltd_set_hide_dep_options_header_centered( $hide_dep_options ) {
		$hide_dep_options[] = 'header-centered';
		
		return $hide_dep_options;
	}
	
	// header types panel options
	add_filter( 'vakker_eltd_full_screen_menu_hide_global_option', 'vakker_eltd_set_hide_dep_options_header_centered' );
	add_filter( 'vakker_eltd_header_standard_hide_global_option', 'vakker_eltd_set_hide_dep_options_header_centered' );
	add_filter( 'vakker_eltd_header_vertical_hide_global_option', 'vakker_eltd_set_hide_dep_options_header_centered' );
	add_filter( 'vakker_eltd_header_vertical_menu_hide_global_option', 'vakker_eltd_set_hide_dep_options_header_centered' );
	
	// header types panel meta boxes
	add_filter( 'vakker_eltd_header_standard_hide_meta_boxes', 'vakker_eltd_set_hide_dep_options_header_centered' );
	add_filter( 'vakker_eltd_header_vertical_hide_meta_boxes', 'vakker_eltd_set_hide_dep_options_header_centered' );
}