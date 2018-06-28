<?php

if ( ! function_exists( 'vakker_eltd_get_hide_dep_for_header_expanding_meta_boxes' ) ) {
	function vakker_eltd_get_hide_dep_for_header_expanding_meta_boxes() {
		$hide_dep_options = apply_filters( 'vakker_eltd_header_expanding_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'vakker_eltd_header_expanding_meta_map' ) ) {
	function vakker_eltd_header_expanding_meta_map( $parent ) {
		$hide_dep_options = vakker_eltd_get_hide_dep_for_header_expanding_meta_boxes();
		
		vakker_eltd_add_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'eltd_set_expanding_menu_area_position_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Expanding Menu Area Position', 'vakker' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'vakker' ),
				'options'         => array(
					''       => esc_html__( 'Default', 'vakker' ),
					'center' => esc_html__( 'Center', 'vakker' ),
					'right'  => esc_html__( 'Right', 'vakker' )
				),
				'hidden_property' => 'eltd_header_type_meta',
				'hidden_values'   => $hide_dep_options
			)
		);
	}
	
	add_action( 'vakker_eltd_additional_header_area_meta_boxes_map', 'vakker_eltd_header_expanding_meta_map' );
}