<?php

if ( ! function_exists( 'vakker_eltd_get_hide_dep_for_header_standard_options' ) ) {
	function vakker_eltd_get_hide_dep_for_header_standard_options() {
		$hide_dep_options = apply_filters( 'vakker_eltd_header_standard_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'vakker_eltd_header_standard_map' ) ) {
	function vakker_eltd_header_standard_map( $parent ) {
		$hide_dep_options = vakker_eltd_get_hide_dep_for_header_standard_options();
		
		vakker_eltd_add_admin_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'set_menu_area_position',
				'default_value'   => 'right',
				'label'           => esc_html__( 'Choose Menu Area Position', 'vakker' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'vakker' ),
				'options'         => array(
					'right'  => esc_html__( 'Right', 'vakker' ),
					'left'   => esc_html__( 'Left', 'vakker' ),
					'center' => esc_html__( 'Center', 'vakker' )
				),
				'hidden_property' => 'header_type',
				'hidden_values'   => $hide_dep_options
			)
		);
	}
	
	add_action( 'vakker_eltd_additional_header_menu_area_options_map', 'vakker_eltd_header_standard_map' );
}