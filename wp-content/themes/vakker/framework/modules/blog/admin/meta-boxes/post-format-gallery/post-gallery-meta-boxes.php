<?php

if ( ! function_exists( 'vakker_eltd_map_post_gallery_meta' ) ) {
	
	function vakker_eltd_map_post_gallery_meta() {
		$gallery_post_format_meta_box = vakker_eltd_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Gallery Post Format', 'vakker' ),
				'name'  => 'post_format_gallery_meta'
			)
		);
		
		vakker_eltd_add_multiple_images_field(
			array(
				'name'        => 'eltd_post_gallery_images_meta',
				'label'       => esc_html__( 'Gallery Images', 'vakker' ),
				'description' => esc_html__( 'Choose your gallery images', 'vakker' ),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}
	
	add_action( 'vakker_eltd_meta_boxes_map', 'vakker_eltd_map_post_gallery_meta', 21 );
}
