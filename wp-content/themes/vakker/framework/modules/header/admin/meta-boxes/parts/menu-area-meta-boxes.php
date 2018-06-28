<?php

if ( ! function_exists( 'vakker_eltd_get_hide_dep_for_header_menu_area_meta_boxes' ) ) {
	function vakker_eltd_get_hide_dep_for_header_menu_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'vakker_eltd_header_menu_area_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'vakker_eltd_header_menu_area_meta_options_map' ) ) {
	function vakker_eltd_header_menu_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = vakker_eltd_get_hide_dep_for_header_menu_area_meta_boxes();
		
		$menu_area_container = vakker_eltd_add_admin_container_no_style(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_container',
				'parent'          => $header_meta_box,
				'hidden_property' => 'eltd_header_type_meta',
				'hidden_values'   => $hide_dep_options,
				'args'            => array(
					'enable_panels_for_default_value' => true
				)
			)
		);
		
		vakker_eltd_add_admin_section_title(
			array(
				'parent' => $menu_area_container,
				'name'   => 'menu_area_style',
				'title'  => esc_html__( 'Menu Area Style', 'vakker' )
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'          => 'eltd_disable_header_widget_menu_area_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Header Menu Area Widget', 'vakker' ),
				'description'   => esc_html__( 'Enabling this option will hide widget area from the menu area', 'vakker' ),
				'parent'        => $menu_area_container
			)
		);

        vakker_eltd_add_meta_box_field(
            array(
                'name'          => 'eltd_disable_sticky_header_widget_menu_area_meta',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__( 'Disable Sticky Header Menu Area Widget', 'vakker' ),
                'description'   => esc_html__( 'Enabling this option will hide widget area from the sticky menu area', 'vakker' ),
                'parent'        => $menu_area_container
            )
        );
		
		$vakker_custom_sidebars = vakker_eltd_get_custom_sidebars();
		if ( count( $vakker_custom_sidebars ) > 0 ) {
			vakker_eltd_add_meta_box_field(
				array(
					'name'        => 'eltd_custom_menu_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area In Menu Area', 'vakker' ),
					'description' => esc_html__( 'Choose custom widget area to display in header menu area"', 'vakker' ),
					'parent'      => $menu_area_container,
					'options'     => $vakker_custom_sidebars
				)
			);
		}
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'          => 'eltd_menu_area_in_grid_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area In Grid', 'vakker' ),
				'description'   => esc_html__( 'Set menu area content to be in grid', 'vakker' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => vakker_eltd_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltd_menu_area_in_grid_container',
						'no'  => '#eltd_menu_area_in_grid_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltd_menu_area_in_grid_container'
					)
				)
			)
		);
		
		$menu_area_in_grid_container = vakker_eltd_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_in_grid_container',
				'parent'          => $menu_area_container,
				'hidden_property' => 'eltd_menu_area_in_grid_meta',
				'hidden_value'    => 'no',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_menu_area_grid_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Grid Background Color', 'vakker' ),
				'description' => esc_html__( 'Set grid background color for menu area', 'vakker' ),
				'parent'      => $menu_area_in_grid_container
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_menu_area_grid_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Grid Background Transparency', 'vakker' ),
				'description' => esc_html__( 'Set grid background transparency for menu area (0 = fully transparent, 1 = opaque)', 'vakker' ),
				'parent'      => $menu_area_in_grid_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'          => 'eltd_menu_area_in_grid_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Grid Area Shadow', 'vakker' ),
				'description'   => esc_html__( 'Set shadow on grid menu area', 'vakker' ),
				'parent'        => $menu_area_in_grid_container,
				'default_value' => '',
				'options'       => vakker_eltd_get_yes_no_select_array()
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'          => 'eltd_menu_area_in_grid_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Grid Area Border', 'vakker' ),
				'description'   => esc_html__( 'Set border on grid menu area', 'vakker' ),
				'parent'        => $menu_area_in_grid_container,
				'default_value' => '',
				'options'       => vakker_eltd_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltd_menu_area_in_grid_border_container',
						'no'  => '#eltd_menu_area_in_grid_border_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltd_menu_area_in_grid_border_container'
					)
				)
			)
		);
		
		$menu_area_in_grid_border_container = vakker_eltd_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_in_grid_border_container',
				'parent'          => $menu_area_in_grid_container,
				'hidden_property' => 'eltd_menu_area_in_grid_border_meta',
				'hidden_value'    => 'no',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_menu_area_in_grid_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'vakker' ),
				'description' => esc_html__( 'Set border color for grid area', 'vakker' ),
				'parent'      => $menu_area_in_grid_border_container
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_menu_area_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'vakker' ),
				'description' => esc_html__( 'Choose a background color for menu area', 'vakker' ),
				'parent'      => $menu_area_container
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_menu_area_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Transparency', 'vakker' ),
				'description' => esc_html__( 'Choose a transparency for the menu area background color (0 = fully transparent, 1 = opaque)', 'vakker' ),
				'parent'      => $menu_area_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'          => 'eltd_menu_area_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area Shadow', 'vakker' ),
				'description'   => esc_html__( 'Set shadow on menu area', 'vakker' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => vakker_eltd_get_yes_no_select_array()
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'          => 'eltd_menu_area_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area Border', 'vakker' ),
				'description'   => esc_html__( 'Set border on menu area', 'vakker' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => vakker_eltd_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltd_menu_area_border_bottom_color_container',
						'no'  => '#eltd_menu_area_border_bottom_color_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltd_menu_area_border_bottom_color_container'
					)
				)
			)
		);
		
		$menu_area_border_bottom_color_container = vakker_eltd_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_border_bottom_color_container',
				'parent'          => $menu_area_container,
				'hidden_property' => 'eltd_menu_area_border_meta',
				'hidden_value'    => 'no',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_menu_area_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'vakker' ),
				'description' => esc_html__( 'Choose color of header bottom border', 'vakker' ),
				'parent'      => $menu_area_border_bottom_color_container
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'text',
				'name'          => 'eltd_dropdown_top_position_meta',
				'label'         => esc_html__( 'Dropdown Position', 'vakker' ),
				'description'   => esc_html__( 'Enter value in percentage of entire header height', 'vakker' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => '%'
				)
			)
		);
		
		do_action( 'vakker_eltd_header_menu_area_additional_meta_boxes_map', $menu_area_container );
	}
	
	add_action( 'vakker_eltd_header_menu_area_meta_boxes_map', 'vakker_eltd_header_menu_area_meta_options_map', 10, 1 );
}