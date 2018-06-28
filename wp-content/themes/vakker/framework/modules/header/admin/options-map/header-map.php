<?php

if ( ! function_exists( 'vakker_eltd_get_header_types_options' ) ) {
	function vakker_eltd_get_header_types_options() {
		$header_type_options = apply_filters( 'vakker_eltd_header_type_global_option', $header_type_options = array() );
		
		return $header_type_options;
	}
}

if ( ! function_exists( 'vakker_eltd_get_header_type_default_options' ) ) {
	function vakker_eltd_get_header_type_default_options() {
		$header_type_option = apply_filters( 'vakker_eltd_default_header_type_global_option', $header_type_option = '' );
		
		return $header_type_option;
	}
}

if ( ! function_exists( 'vakker_eltd_get_show_dep_for_header_types_options' ) ) {
	function vakker_eltd_get_show_dep_for_header_types_options() {
		$show_dep_options = apply_filters( 'vakker_eltd_header_type_show_global_option', $show_dep_options = array() );
		
		return $show_dep_options;
	}
}

if ( ! function_exists( 'vakker_eltd_get_hide_dep_for_header_types_options' ) ) {
	function vakker_eltd_get_hide_dep_for_header_types_options() {
		$hide_dep_options = apply_filters( 'vakker_eltd_header_type_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'vakker_eltd_get_hide_dep_for_header_behavior_options' ) ) {
	function vakker_eltd_get_hide_dep_for_header_behavior_options() {
		$hide_dep_options = apply_filters( 'vakker_eltd_header_behavior_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

foreach ( glob( ELATED_FRAMEWORK_HEADER_ROOT_DIR . '/admin/options-map/*/*.php' ) as $options_load ) {
	include_once $options_load;
}

foreach ( glob( ELATED_FRAMEWORK_HEADER_TYPES_ROOT_DIR . '/*/admin/options-map/*.php' ) as $options_load ) {
	include_once $options_load;
}

if ( ! function_exists( 'vakker_eltd_header_options_map' ) ) {
	function vakker_eltd_header_options_map() {
		$header_type_options              = vakker_eltd_get_header_types_options();
		$header_type_default_option       = vakker_eltd_get_header_type_default_options();
		$header_type_options_show_dep     = vakker_eltd_get_show_dep_for_header_types_options();
		$header_type_options_hide_dep     = vakker_eltd_get_hide_dep_for_header_types_options();
		$header_behavior_options_hide_dep = vakker_eltd_get_hide_dep_for_header_behavior_options();
		
		vakker_eltd_add_admin_page(
			array(
				'slug'  => '_header_page',
				'title' => esc_html__( 'Header', 'vakker' ),
				'icon'  => 'fa fa-header'
			)
		);
		
		$panel_header = vakker_eltd_add_admin_panel(
			array(
				'page'  => '_header_page',
				'name'  => 'panel_header',
				'title' => esc_html__( 'Header', 'vakker' )
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'parent'        => $panel_header,
				'type'          => 'radiogroup',
				'name'          => 'header_type',
				'default_value' => $header_type_default_option,
				'label'         => esc_html__( 'Choose Header Type', 'vakker' ),
				'description'   => esc_html__( 'Select the type of header you would like to use', 'vakker' ),
				'options'       => $header_type_options,
				'args'          => array(
					'use_images'  => true,
					'hide_labels' => true,
					'dependence'  => true,
					'show'        => $header_type_options_show_dep,
					'hide'        => $header_type_options_hide_dep
				)
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'parent'          => $panel_header,
				'type'            => 'select',
				'name'            => 'header_behaviour',
				'default_value'   => 'fixed-on-scroll',
				'label'           => esc_html__( 'Choose Header Behaviour', 'vakker' ),
				'description'     => esc_html__( 'Select the behaviour of header when you scroll down to page', 'vakker' ),
				'options'         => array(
					'fixed-on-scroll'                 => esc_html__( 'Fixed on scroll', 'vakker' ),
					'no-behavior'                     => esc_html__( 'No Behavior', 'vakker' ),
					'sticky-header-on-scroll-up'      => esc_html__( 'Sticky on scroll up', 'vakker' ),
					'sticky-header-on-scroll-down-up' => esc_html__( 'Sticky on scroll up/down', 'vakker' )
				),
				'hidden_property' => 'header_type',
				'hidden_values'   => $header_behavior_options_hide_dep,
				'args'            => array(
					'dependence'   => true,
					'show'         => array(
						'fixed-on-scroll'                 => '#eltd_panel_fixed_header',
						'no-behavior'                     => '',
						'sticky-header-on-scroll-up'      => '#eltd_panel_sticky_header',
						'sticky-header-on-scroll-down-up' => '#eltd_panel_sticky_header'
					),
					'hide'         => array(
						'fixed-on-scroll'                 => '#eltd_panel_sticky_header',
						'no-behavior'                     => '#eltd_panel_sticky_header, #eltd_panel_fixed_header',
						'sticky-header-on-scroll-up'      => '#eltd_panel_fixed_header',
						'sticky-header-on-scroll-down-up' => '#eltd_panel_fixed_header'
					)
				)
			)
		);
		
		/***************** Header Skin Options -start ********************/
		
		vakker_eltd_add_admin_field(
			array(
				'parent'        => $panel_header,
				'type'          => 'select',
				'name'          => 'header_style',
				'default_value' => '',
				'label'         => esc_html__( 'Header Skin', 'vakker' ),
				'description'   => esc_html__( 'Choose a predefined header style for header elements (logo, main menu, side menu opener...)', 'vakker' ),
				'options'       => array(
					''             => esc_html__( 'Default', 'vakker' ),
					'light-header' => esc_html__( 'Light', 'vakker' ),
					'dark-header'  => esc_html__( 'Dark', 'vakker' )
				)
			)
		);
		
		/***************** Header Skin Options - end ********************/
		
		/***************** Top Header Layout - start **********************/
		
		do_action( 'vakker_eltd_header_top_options_map', $panel_header );
		
		/***************** Top Header Layout - end **********************/
		
		/***************** Logo Area Layout - start **********************/
		
		do_action( 'vakker_eltd_header_logo_area_options_map', $panel_header );
		
		/***************** Logo Area Layout - end **********************/
		
		/***************** Menu Area Layout - start **********************/
		
		do_action( 'vakker_eltd_header_menu_area_options_map', $panel_header );
		
		/***************** Menu Area Layout - end **********************/
		
		/***************** Additional Header Menu Area Layout - start *****************/
		
		do_action( 'vakker_eltd_additional_header_menu_area_options_map', $panel_header );
		
		/***************** Additional Header Menu Area Layout - end *****************/
		
		/***************** Sticky Header Layout - start *******************/
		
		do_action( 'vakker_eltd_header_sticky_options_map', $panel_header );
		
		/***************** Sticky Header Layout - end *******************/
		
		/***************** Fixed Header Layout - start ********************/
		
		do_action( 'vakker_eltd_header_fixed_options_map', $panel_header );
		
		/***************** Fixed Header Layout - end ********************/
		
		/******************* Main Menu Layout - start *********************/
		
		do_action( 'vakker_eltd_header_main_navigation_options_map' );
		
		/******************* Main Menu Layout - end *********************/
		
		/***************** Additional Main Menu Area Layout - start *****************/
		
		do_action( 'vakker_eltd_additional_header_main_navigation_options_map' );
		
		/***************** Additional Main Menu Area Layout - end *****************/

        do_action( 'vakker_eltd_mobile_header_options_map' );
	}
	
	add_action( 'vakker_eltd_options_map', 'vakker_eltd_header_options_map', 3 );
}