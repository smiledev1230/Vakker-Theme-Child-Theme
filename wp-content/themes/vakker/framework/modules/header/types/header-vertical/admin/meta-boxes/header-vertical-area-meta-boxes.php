<?php

if ( ! function_exists( 'vakker_eltd_get_hide_dep_for_header_vertical_area_meta_boxes' ) ) {
	function vakker_eltd_get_hide_dep_for_header_vertical_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'vakker_eltd_header_vertical_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'vakker_eltd_header_vertical_area_meta_options_map' ) ) {
	function vakker_eltd_header_vertical_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = vakker_eltd_get_hide_dep_for_header_vertical_area_meta_boxes();
		
		$header_vertical_area_meta_container = vakker_eltd_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'header_vertical_area_container',
				'hidden_property' => 'eltd_header_type_meta',
				'hidden_values'   => $hide_dep_options
			)
		);
		
		vakker_eltd_add_admin_section_title(
			array(
				'parent' => $header_vertical_area_meta_container,
				'name'   => 'vertical_area_style',
				'title'  => esc_html__( 'Vertical Area Style', 'vakker' )
			)
		);
		
		$vakker_custom_sidebars = vakker_eltd_get_custom_sidebars();
		if ( count( $vakker_custom_sidebars ) > 0 ) {
			vakker_eltd_add_meta_box_field(
				array(
					'name'        => 'eltd_custom_vertical_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area in Vertical area', 'vakker' ),
					'description' => esc_html__( 'Choose custom widget area to display in vertical menu"', 'vakker' ),
					'parent'      => $header_vertical_area_meta_container,
					'options'     => $vakker_custom_sidebars
				)
			);
		}
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_vertical_header_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'vakker' ),
				'description' => esc_html__( 'Set background color for vertical menu', 'vakker' ),
				'parent'      => $header_vertical_area_meta_container
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'          => 'eltd_vertical_header_background_image_meta',
				'type'          => 'image',
				'default_value' => '',
				'label'         => esc_html__( 'Background Image', 'vakker' ),
				'description'   => esc_html__( 'Set background image for vertical menu', 'vakker' ),
				'parent'        => $header_vertical_area_meta_container
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'          => 'eltd_disable_vertical_header_background_image_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Background Image', 'vakker' ),
				'description'   => esc_html__( 'Enabling this option will hide background image in Vertical Menu', 'vakker' ),
				'parent'        => $header_vertical_area_meta_container
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'          => 'eltd_vertical_header_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Shadow', 'vakker' ),
				'description'   => esc_html__( 'Set shadow on vertical menu', 'vakker' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => vakker_eltd_get_yes_no_select_array()
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'          => 'eltd_vertical_header_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Vertical Area Border', 'vakker' ),
				'description'   => esc_html__( 'Set border on vertical area', 'vakker' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => vakker_eltd_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltd_vertical_header_border_container',
						'no'  => '#eltd_vertical_header_border_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltd_vertical_header_border_container'
					)
				)
			)
		);
		
		$vertical_header_border_container = vakker_eltd_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'vertical_header_border_container',
				'parent'          => $header_vertical_area_meta_container,
				'hidden_property' => 'eltd_vertical_header_border_meta',
				'hidden_value'    => 'no',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_vertical_header_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'vakker' ),
				'description' => esc_html__( 'Choose color of border', 'vakker' ),
				'parent'      => $vertical_header_border_container
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'          => 'eltd_vertical_header_center_content_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Center Content', 'vakker' ),
				'description'   => esc_html__( 'Set content in vertical center', 'vakker' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => vakker_eltd_get_yes_no_select_array()
			)
		);
	}
	
	add_action( 'vakker_eltd_additional_header_area_meta_boxes_map', 'vakker_eltd_header_vertical_area_meta_options_map', 10, 1 );
}