<?php

if ( ! function_exists( 'vakker_eltd_get_hide_dep_for_header_centered_meta_boxes' ) ) {
	function vakker_eltd_get_hide_dep_for_header_centered_meta_boxes() {
		$hide_dep_options = apply_filters( 'vakker_eltd_header_centered_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'vakker_eltd_header_centered_meta_map' ) ) {
	function vakker_eltd_header_centered_meta_map( $parent ) {
		$hide_dep_options = vakker_eltd_get_hide_dep_for_header_centered_meta_boxes();
		
		vakker_eltd_add_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'text',
				'name'            => 'eltd_logo_wrapper_padding_header_centered_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Logo Padding', 'vakker' ),
				'description'     => esc_html__( 'Insert padding in format: 0px 0px 1px 0px', 'vakker' ),
				'args'            => array(
					'col_width' => 3
				),
				'hidden_property' => 'eltd_header_type_meta',
				'hidden_values'   => $hide_dep_options
			)
		);
	}
	
	add_action( 'vakker_eltd_header_logo_area_additional_meta_boxes_map', 'vakker_eltd_header_centered_meta_map', 10, 1 );
}