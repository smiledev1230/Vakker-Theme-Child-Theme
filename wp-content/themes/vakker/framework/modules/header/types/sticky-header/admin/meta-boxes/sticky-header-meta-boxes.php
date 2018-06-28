<?php

if ( ! function_exists( 'vakker_eltd_sticky_header_meta_boxes_options_map' ) ) {
	function vakker_eltd_sticky_header_meta_boxes_options_map( $header_meta_box ) {
		
		$sticky_amount_container = vakker_eltd_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'sticky_amount_container_meta_container',
				'hidden_property' => 'eltd_header_behaviour_meta',
				'hidden_values'   => array(
					'',
					'no-behavior',
					'fixed-on-scroll',
					'sticky-header-on-scroll-up'
				)
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_scroll_amount_for_sticky_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Scroll amount for sticky header appearance', 'vakker' ),
				'description' => esc_html__( 'Define scroll amount for sticky header appearance', 'vakker' ),
				'parent'      => $sticky_amount_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);
	}
	
	add_action( 'vakker_eltd_additional_header_area_meta_boxes_map', 'vakker_eltd_sticky_header_meta_boxes_options_map', 10, 1 );
}