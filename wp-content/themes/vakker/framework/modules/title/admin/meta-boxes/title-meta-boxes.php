<?php

if ( ! function_exists( 'vakker_eltd_get_title_types_meta_boxes' ) ) {
	function vakker_eltd_get_title_types_meta_boxes() {
		$title_type_options = apply_filters( 'vakker_eltd_title_type_meta_boxes', $title_type_options = array( '' => esc_html__( 'Default', 'vakker' ) ) );
		
		return $title_type_options;
	}
}

foreach ( glob( ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'vakker_eltd_map_title_meta' ) ) {
	function vakker_eltd_map_title_meta() {
		$title_type_meta_boxes = vakker_eltd_get_title_types_meta_boxes();
		
		$title_meta_box = vakker_eltd_add_meta_box(
			array(
				'scope' => apply_filters( 'vakker_eltd_set_scope_for_meta_boxes', array( 'page', 'post' ), 'title_meta' ),
				'title' => esc_html__( 'Title', 'vakker' ),
				'name'  => 'title_meta'
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'          => 'eltd_show_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'vakker' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'vakker' ),
				'parent'        => $title_meta_box,
				'options'       => vakker_eltd_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '',
						'no'  => '#eltd_eltd_show_title_area_meta_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '#eltd_eltd_show_title_area_meta_container',
						'no'  => '',
						'yes' => '#eltd_eltd_show_title_area_meta_container'
					)
				)
			)
		);
		
			$show_title_area_meta_container = vakker_eltd_add_admin_container(
				array(
					'parent'          => $title_meta_box,
					'name'            => 'eltd_show_title_area_meta_container',
					'hidden_property' => 'eltd_show_title_area_meta',
					'hidden_value'    => 'no'
				)
			);
		
				vakker_eltd_add_meta_box_field(
					array(
						'name'          => 'eltd_title_area_type_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area Type', 'vakker' ),
						'description'   => esc_html__( 'Choose title type', 'vakker' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => $title_type_meta_boxes
					)
				);
		
				vakker_eltd_add_meta_box_field(
					array(
						'name'          => 'eltd_title_area_in_grid_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area In Grid', 'vakker' ),
						'description'   => esc_html__( 'Set title area content to be in grid', 'vakker' ),
						'options'       => vakker_eltd_get_yes_no_select_array(),
						'parent'        => $show_title_area_meta_container
					)
				);
		
				vakker_eltd_add_meta_box_field(
					array(
						'name'        => 'eltd_title_area_height_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Height', 'vakker' ),
						'description' => esc_html__( 'Set a height for Title Area', 'vakker' ),
						'parent'      => $show_title_area_meta_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px'
						)
					)
				);
				
				vakker_eltd_add_meta_box_field(
					array(
						'name'        => 'eltd_title_area_background_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Background Color', 'vakker' ),
						'description' => esc_html__( 'Choose a background color for title area', 'vakker' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				vakker_eltd_add_meta_box_field(
					array(
						'name'        => 'eltd_title_area_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'vakker' ),
						'description' => esc_html__( 'Choose an Image for title area', 'vakker' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				vakker_eltd_add_meta_box_field(
					array(
						'name'          => 'eltd_title_area_background_image_behavior_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Behavior', 'vakker' ),
						'description'   => esc_html__( 'Choose title area background image behavior', 'vakker' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''                    => esc_html__( 'Default', 'vakker' ),
							'hide'                => esc_html__( 'Hide Image', 'vakker' ),
							'responsive'          => esc_html__( 'Enable Responsive Image', 'vakker' ),
							'responsive-disabled' => esc_html__( 'Disable Responsive Image', 'vakker' ),
							'parallax'            => esc_html__( 'Enable Parallax Image', 'vakker' ),
							'parallax-zoom-out'   => esc_html__( 'Enable Parallax With Zoom Out Image', 'vakker' ),
							'parallax-disabled'   => esc_html__( 'Disable Parallax Image', 'vakker' )
						)
					)
				);
				
				vakker_eltd_add_meta_box_field(
					array(
						'name'          => 'eltd_title_area_vertical_alignment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Vertical Alignment', 'vakker' ),
						'description'   => esc_html__( 'Specify title area content vertical alignment', 'vakker' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''              => esc_html__( 'Default', 'vakker' ),
							'header_bottom' => esc_html__( 'From Bottom of Header', 'vakker' ),
							'window_top'    => esc_html__( 'From Window Top', 'vakker' )
						)
					)
				);
				
				vakker_eltd_add_meta_box_field(
					array(
						'name'          => 'eltd_title_area_title_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Tag', 'vakker' ),
						'options'       => vakker_eltd_get_title_tag( true ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				vakker_eltd_add_meta_box_field(
					array(
						'name'        => 'eltd_title_text_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Title Color', 'vakker' ),
						'description' => esc_html__( 'Choose a color for title text', 'vakker' ),
						'parent'      => $show_title_area_meta_container
					)
				);
				
				vakker_eltd_add_meta_box_field(
					array(
						'name'          => 'eltd_title_area_subtitle_meta',
						'type'          => 'text',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Text', 'vakker' ),
						'description'   => esc_html__( 'Enter your subtitle text', 'vakker' ),
						'parent'        => $show_title_area_meta_container,
						'args'          => array(
							'col_width' => 6
						)
					)
				);
		
				vakker_eltd_add_meta_box_field(
					array(
						'name'          => 'eltd_title_area_subtitle_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Tag', 'vakker' ),
						'options'       => vakker_eltd_get_title_tag( true, array( 'p' => 'p' ) ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				vakker_eltd_add_meta_box_field(
					array(
						'name'        => 'eltd_subtitle_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Subtitle Color', 'vakker' ),
						'description' => esc_html__( 'Choose a color for subtitle text', 'vakker' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
		/***************** Additional Title Area Layout - start *****************/
		
		do_action( 'vakker_eltd_additional_title_area_meta_boxes', $show_title_area_meta_container );
		
		/***************** Additional Title Area Layout - end *****************/
		
	}
	
	add_action( 'vakker_eltd_meta_boxes_map', 'vakker_eltd_map_title_meta', 60 );
}