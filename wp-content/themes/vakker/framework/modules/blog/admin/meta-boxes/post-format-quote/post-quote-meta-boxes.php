<?php

if ( ! function_exists( 'vakker_eltd_map_post_quote_meta' ) ) {
	function vakker_eltd_map_post_quote_meta() {
		$quote_post_format_meta_box = vakker_eltd_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Quote Post Format', 'vakker' ),
				'name'  => 'post_format_quote_meta'
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Text', 'vakker' ),
				'description' => esc_html__( 'Enter Quote text', 'vakker' ),
				'parent'      => $quote_post_format_meta_box,
			
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_post_quote_author_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author', 'vakker' ),
				'description' => esc_html__( 'Enter Quote author', 'vakker' ),
				'parent'      => $quote_post_format_meta_box,
			)
		);

		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_post_quote_author_position_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author Position', 'vakker' ),
				'description' => esc_html__( 'Enter Quote Author Position', 'vakker' ),
				'parent'      => $quote_post_format_meta_box,
			)
		);
	}
	
	add_action( 'vakker_eltd_meta_boxes_map', 'vakker_eltd_map_post_quote_meta', 25 );
}