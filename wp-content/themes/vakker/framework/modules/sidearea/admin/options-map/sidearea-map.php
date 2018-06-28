<?php

if ( ! function_exists( 'vakker_eltd_sidearea_options_map' ) ) {
	function vakker_eltd_sidearea_options_map() {
		
		vakker_eltd_add_admin_page(
			array(
				'slug'  => '_side_area_page',
				'title' => esc_html__( 'Side Area', 'vakker' ),
				'icon'  => 'fa fa-indent'
			)
		);
		
		$side_area_panel = vakker_eltd_add_admin_panel(
			array(
				'title' => esc_html__( 'Side Area', 'vakker' ),
				'name'  => 'side_area',
				'page'  => '_side_area_page'
			)
		);
		
		$side_area_icon_style_group = vakker_eltd_add_admin_group(
			array(
				'parent'      => $side_area_panel,
				'name'        => 'side_area_icon_style_group',
				'title'       => esc_html__( 'Side Area Icon Style', 'vakker' ),
				'description' => esc_html__( 'Define styles for Side Area icon', 'vakker' )
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'parent' => $side_area_icon_style_group,
				'type'   => 'colorsimple',
				'name'   => 'side_area_close_icon_color',
				'label'  => esc_html__( 'Close Icon Color', 'vakker' )
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'parent' => $side_area_icon_style_group,
				'type'   => 'colorsimple',
				'name'   => 'side_area_close_icon_hover_color',
				'label'  => esc_html__( 'Close Icon Hover Color', 'vakker' )
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'parent'        => $side_area_panel,
				'type'          => 'text',
				'name'          => 'side_area_width',
				'default_value' => '',
				'label'         => esc_html__( 'Side Area Width', 'vakker' ),
				'description'   => esc_html__( 'Enter a width for Side Area', 'vakker' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'parent'      => $side_area_panel,
				'type'        => 'color',
				'name'        => 'side_area_background_color',
				'label'       => esc_html__( 'Background Color', 'vakker' ),
				'description' => esc_html__( 'Choose a background color for Side Area', 'vakker' )
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'parent'      => $side_area_panel,
				'type'        => 'text',
				'name'        => 'side_area_padding',
				'label'       => esc_html__( 'Padding', 'vakker' ),
				'description' => esc_html__( 'Define padding for Side Area in format top right bottom left', 'vakker' ),
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'parent'        => $side_area_panel,
				'type'          => 'selectblank',
				'name'          => 'side_area_aligment',
				'default_value' => '',
				'label'         => esc_html__( 'Text Alignment', 'vakker' ),
				'description'   => esc_html__( 'Choose text alignment for side area', 'vakker' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'vakker' ),
					'left'   => esc_html__( 'Left', 'vakker' ),
					'center' => esc_html__( 'Center', 'vakker' ),
					'right'  => esc_html__( 'Right', 'vakker' )
				)
			)
		);
	}
	
	add_action( 'vakker_eltd_options_map', 'vakker_eltd_sidearea_options_map', 8 );
}