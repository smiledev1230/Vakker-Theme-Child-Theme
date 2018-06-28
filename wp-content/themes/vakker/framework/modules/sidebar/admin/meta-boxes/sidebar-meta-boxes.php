<?php

if ( ! function_exists( 'vakker_eltd_map_sidebar_meta' ) ) {
	function vakker_eltd_map_sidebar_meta() {
		$eltd_sidebar_meta_box = vakker_eltd_add_meta_box(
			array(
				'scope' => apply_filters( 'vakker_eltd_set_scope_for_meta_boxes', array( 'page' ), 'sidebar_meta' ),
				'title' => esc_html__( 'Sidebar', 'vakker' ),
				'name'  => 'sidebar_meta'
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_sidebar_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Sidebar Layout', 'vakker' ),
				'description' => esc_html__( 'Choose the sidebar layout', 'vakker' ),
				'parent'      => $eltd_sidebar_meta_box,
                'options'       => vakker_eltd_get_custom_sidebars_options( true )
			)
		);
		
		$eltd_custom_sidebars = vakker_eltd_get_custom_sidebars();
		if ( count( $eltd_custom_sidebars ) > 0 ) {
			vakker_eltd_add_meta_box_field(
				array(
					'name'        => 'eltd_custom_sidebar_area_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Widget Area in Sidebar', 'vakker' ),
					'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar"', 'vakker' ),
					'parent'      => $eltd_sidebar_meta_box,
					'options'     => $eltd_custom_sidebars,
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
	}
	
	add_action( 'vakker_eltd_meta_boxes_map', 'vakker_eltd_map_sidebar_meta', 31 );
}