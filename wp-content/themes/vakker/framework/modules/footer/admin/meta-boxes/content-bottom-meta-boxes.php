<?php

if ( ! function_exists( 'vakker_eltd_map_content_bottom_meta' ) ) {
	function vakker_eltd_map_content_bottom_meta() {
		
		$content_bottom_meta_box = vakker_eltd_add_meta_box(
			array(
				'scope' => apply_filters( 'vakker_eltd_set_scope_for_meta_boxes', array( 'page', 'post' ), 'content_bottom_meta' ),
				'title' => esc_html__( 'Content Bottom', 'vakker' ),
				'name'  => 'content_bottom_meta'
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'          => 'eltd_enable_content_bottom_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Enable Content Bottom Area', 'vakker' ),
				'description'   => esc_html__( 'This option will enable Content Bottom area on pages', 'vakker' ),
				'parent'        => $content_bottom_meta_box,
				'options'       => vakker_eltd_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''   => '#eltd_eltd_show_content_bottom_meta_container',
						'no' => '#eltd_eltd_show_content_bottom_meta_container'
					),
					'show'       => array(
						'yes' => '#eltd_eltd_show_content_bottom_meta_container'
					)
				)
			)
		);
		
		$show_content_bottom_meta_container = vakker_eltd_add_admin_container(
			array(
				'parent'          => $content_bottom_meta_box,
				'name'            => 'eltd_show_content_bottom_meta_container',
				'hidden_property' => 'eltd_enable_content_bottom_area_meta',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'          => 'eltd_content_bottom_sidebar_custom_display_meta',
				'type'          => 'selectblank',
				'default_value' => '',
				'label'         => esc_html__( 'Sidebar to Display', 'vakker' ),
				'description'   => esc_html__( 'Choose a content bottom sidebar to display', 'vakker' ),
				'options'       => vakker_eltd_get_custom_sidebars(),
				'parent'        => $show_content_bottom_meta_container,
				'args'          => array(
					'select2' => true
				)
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'type'          => 'select',
				'name'          => 'eltd_content_bottom_in_grid_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Display in Grid', 'vakker' ),
				'description'   => esc_html__( 'Enabling this option will place content bottom in grid', 'vakker' ),
				'options'       => vakker_eltd_get_yes_no_select_array(),
				'parent'        => $show_content_bottom_meta_container
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'type'        => 'color',
				'name'        => 'eltd_content_bottom_background_color_meta',
				'label'       => esc_html__( 'Background Color', 'vakker' ),
				'description' => esc_html__( 'Choose a background color for content bottom area', 'vakker' ),
				'parent'      => $show_content_bottom_meta_container
			)
		);
	}
	
	add_action( 'vakker_eltd_meta_boxes_map', 'vakker_eltd_map_content_bottom_meta', 71 );
}