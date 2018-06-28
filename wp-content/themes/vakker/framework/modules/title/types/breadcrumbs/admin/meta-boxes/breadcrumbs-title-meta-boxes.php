<?php

if ( ! function_exists( 'vakker_eltd_breadcrumbs_title_type_options_meta_boxes' ) ) {
	function vakker_eltd_breadcrumbs_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_breadcrumbs_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Breadcrumbs Color', 'vakker' ),
				'description' => esc_html__( 'Choose a color for breadcrumbs text', 'vakker' ),
				'parent'      => $show_title_area_meta_container
			)
		);
	}
	
	add_action( 'vakker_eltd_additional_title_area_meta_boxes', 'vakker_eltd_breadcrumbs_title_type_options_meta_boxes' );
}