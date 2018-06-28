<?php

if ( ! function_exists( 'vakker_eltd_map_post_link_meta' ) ) {
	function vakker_eltd_map_post_link_meta() {
		$link_post_format_meta_box = vakker_eltd_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Link Post Format', 'vakker' ),
				'name'  => 'post_format_link_meta'
			)
		);

		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_post_link_text_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Link Text', 'vakker' ),
				'description' => esc_html__( 'Enter link text', 'vakker' ),
				'parent'      => $link_post_format_meta_box,

			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Link', 'vakker' ),
				'description' => esc_html__( 'Enter link', 'vakker' ),
				'parent'      => $link_post_format_meta_box,
			
			)
		);
	}
	
	add_action( 'vakker_eltd_meta_boxes_map', 'vakker_eltd_map_post_link_meta', 24 );
}