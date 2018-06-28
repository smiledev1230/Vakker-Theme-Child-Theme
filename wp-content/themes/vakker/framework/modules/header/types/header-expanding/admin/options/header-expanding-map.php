<?php

if ( ! function_exists( 'vakker_eltd_get_hide_dep_for_header_expanding_options' ) ) {
	function vakker_eltd_get_hide_dep_for_header_expanding_options() {
		$hide_dep_options = apply_filters( 'vakker_eltd_header_expanding_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'vakker_eltd_header_expanding_map' ) ) {
	function vakker_eltd_header_expanding_map( $parent ) {
		$hide_dep_options = vakker_eltd_get_hide_dep_for_header_expanding_options();
		
		vakker_eltd_add_admin_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'set_expanding_menu_area_position',
				'default_value'   => 'right',
				'label'           => esc_html__( 'Choose Menu Area Position', 'vakker' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'vakker' ),
				'options'         => array(
					'center'   => esc_html__( 'Center', 'vakker' ),
					'right'  => esc_html__( 'Right', 'vakker' )
				),
				'hidden_property' => 'header_type',
				'hidden_values'   => $hide_dep_options
			)
		);
	}
	
	add_action( 'vakker_eltd_additional_header_menu_area_options_map', 'vakker_eltd_header_expanding_map' );
}