<?php

if ( ! function_exists( 'vakker_eltd_content_bottom_options_map' ) ) {
	function vakker_eltd_content_bottom_options_map() {
		
		$panel_content_bottom = vakker_eltd_add_admin_panel(
			array(
				'page'  => '_page_page',
				'name'  => 'panel_content_bottom',
				'title' => esc_html__( 'Content Bottom Area Style', 'vakker' )
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'          => 'enable_content_bottom_area',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Content Bottom Area', 'vakker' ),
				'description'   => esc_html__( 'This option will enable Content Bottom area on pages', 'vakker' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltd_enable_content_bottom_area_container'
				),
				'parent'        => $panel_content_bottom
			)
		);
		
		$enable_content_bottom_area_container = vakker_eltd_add_admin_container(
			array(
				'parent'          => $panel_content_bottom,
				'name'            => 'enable_content_bottom_area_container',
				'hidden_property' => 'enable_content_bottom_area',
				'hidden_value'    => 'no'
			)
		);
		
		$vakker_custom_sidebars = vakker_eltd_get_custom_sidebars();
		
		vakker_eltd_add_admin_field(
			array(
				'type'          => 'selectblank',
				'name'          => 'content_bottom_sidebar_custom_display',
				'default_value' => '',
				'label'         => esc_html__( 'Widget Area to Display', 'vakker' ),
				'description'   => esc_html__( 'Choose a Content Bottom widget area to display', 'vakker' ),
				'options'       => $vakker_custom_sidebars,
				'parent'        => $enable_content_bottom_area_container
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'content_bottom_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Display in Grid', 'vakker' ),
				'description'   => esc_html__( 'Enabling this option will place Content Bottom in grid', 'vakker' ),
				'parent'        => $enable_content_bottom_area_container
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'type'        => 'color',
				'name'        => 'content_bottom_background_color',
				'label'       => esc_html__( 'Background Color', 'vakker' ),
				'description' => esc_html__( 'Choose a background color for Content Bottom area', 'vakker' ),
				'parent'      => $enable_content_bottom_area_container
			)
		);
	}
	
	add_action( 'vakker_eltd_additional_page_options_map', 'vakker_eltd_content_bottom_options_map' );
}