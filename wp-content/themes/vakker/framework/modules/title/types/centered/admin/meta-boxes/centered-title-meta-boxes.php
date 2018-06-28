<?php

if ( ! function_exists( 'vakker_eltd_centered_title_type_options_meta_boxes' ) ) {
	function vakker_eltd_centered_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_subtitle_side_padding_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Subtitle Side Padding', 'vakker' ),
				'description' => esc_html__( 'Set left/right padding for subtitle area', 'vakker' ),
				'parent'      => $show_title_area_meta_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px or %'
				)
			)
		);
	}
	
	add_action( 'vakker_eltd_additional_title_area_meta_boxes', 'vakker_eltd_centered_title_type_options_meta_boxes', 5 );
}