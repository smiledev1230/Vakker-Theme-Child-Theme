<?php

if ( ! function_exists( 'vakker_eltd_get_hide_dep_for_top_header_area_meta_boxes' ) ) {
	function vakker_eltd_get_hide_dep_for_top_header_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'vakker_eltd_top_header_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'vakker_eltd_header_top_area_meta_options_map' ) ) {
	function vakker_eltd_header_top_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = vakker_eltd_get_hide_dep_for_top_header_area_meta_boxes();
		
		$top_header_container = vakker_eltd_add_admin_container_no_style(
			array(
				'type'            => 'container',
				'name'            => 'top_header_container',
				'parent'          => $header_meta_box,
				'hidden_property' => 'eltd_header_type_meta',
				'hidden_values'   => $hide_dep_options
			)
		);
		
		vakker_eltd_add_admin_section_title(
			array(
				'parent' => $top_header_container,
				'name'   => 'top_area_style',
				'title'  => esc_html__( 'Top Area', 'vakker' )
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'          => 'eltd_top_bar_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Header Top Bar', 'vakker' ),
				'description'   => esc_html__( 'Enabling this option will show header top bar area', 'vakker' ),
				'parent'        => $top_header_container,
				'options'       => vakker_eltd_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltd_top_bar_container_no_style',
						'no'  => '#eltd_top_bar_container_no_style',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltd_top_bar_container_no_style'
					)
				)
			)
		);
		
		$top_bar_container = vakker_eltd_add_admin_container_no_style(
			array(
				'name'            => 'top_bar_container_no_style',
				'parent'          => $top_header_container,
				'hidden_property' => 'eltd_top_bar_meta',
				'hidden_value'    => 'no',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'          => 'eltd_top_bar_in_grid_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Top Bar In Grid', 'vakker' ),
				'description'   => esc_html__( 'Set top bar content to be in grid', 'vakker' ),
				'parent'        => $top_bar_container,
				'default_value' => '',
				'options'       => vakker_eltd_get_yes_no_select_array()
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'   => 'eltd_top_bar_background_color_meta',
				'type'   => 'color',
				'label'  => esc_html__( 'Top Bar Background Color', 'vakker' ),
				'parent' => $top_bar_container
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_top_bar_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Top Bar Background Color Transparency', 'vakker' ),
				'description' => esc_html__( 'Set top bar background color transparenct. Value should be between 0 and 1', 'vakker' ),
				'parent'      => $top_bar_container,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'          => 'eltd_top_bar_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Top Bar Border', 'vakker' ),
				'description'   => esc_html__( 'Set border on top bar', 'vakker' ),
				'parent'        => $top_bar_container,
				'default_value' => '',
				'options'       => vakker_eltd_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltd_top_bar_border_container',
						'no'  => '#eltd_top_bar_border_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltd_top_bar_border_container'
					)
				)
			)
		);
		
		$top_bar_border_container = vakker_eltd_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'top_bar_border_container',
				'parent'          => $top_bar_container,
				'hidden_property' => 'eltd_top_bar_border_meta',
				'hidden_value'    => 'no',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_top_bar_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'vakker' ),
				'description' => esc_html__( 'Choose color for top bar border', 'vakker' ),
				'parent'      => $top_bar_border_container
			)
		);
	}
	
	add_action( 'vakker_eltd_additional_header_area_meta_boxes_map', 'vakker_eltd_header_top_area_meta_options_map', 10, 1 );
}