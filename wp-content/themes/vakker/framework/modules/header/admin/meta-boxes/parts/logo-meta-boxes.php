<?php

if ( ! function_exists( 'vakker_eltd_logo_meta_box_map' ) ) {
	function vakker_eltd_logo_meta_box_map() {
		
		$logo_meta_box = vakker_eltd_add_meta_box(
			array(
				'scope' => apply_filters( 'vakker_eltd_set_scope_for_meta_boxes', array( 'page', 'post' ), 'logo_meta' ),
				'title' => esc_html__( 'Logo', 'vakker' ),
				'name'  => 'logo_meta'
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_logo_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Default', 'vakker' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'vakker' ),
				'parent'      => $logo_meta_box
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_logo_image_dark_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Dark', 'vakker' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'vakker' ),
				'parent'      => $logo_meta_box
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_logo_image_light_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Light', 'vakker' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'vakker' ),
				'parent'      => $logo_meta_box
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_logo_image_sticky_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Sticky', 'vakker' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'vakker' ),
				'parent'      => $logo_meta_box
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_logo_image_mobile_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Mobile', 'vakker' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'vakker' ),
				'parent'      => $logo_meta_box
			)
		);
	}
	
	add_action( 'vakker_eltd_meta_boxes_map', 'vakker_eltd_logo_meta_box_map', 47 );
}