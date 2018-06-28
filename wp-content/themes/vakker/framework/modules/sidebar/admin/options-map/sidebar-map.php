<?php

if ( ! function_exists( 'vakker_eltd_sidebar_options_map' ) ) {
	function vakker_eltd_sidebar_options_map() {
		
		vakker_eltd_add_admin_page(
			array(
				'slug'  => '_sidebar_page',
				'title' => esc_html__( 'Sidebar Area', 'vakker' ),
				'icon'  => 'fa fa-indent'
			)
		);
		
		$sidebar_panel = vakker_eltd_add_admin_panel(
			array(
				'title' => esc_html__( 'Sidebar Area', 'vakker' ),
				'name'  => 'sidebar',
				'page'  => '_sidebar_page'
			)
		);
		
		vakker_eltd_add_admin_field( array(
			'name'          => 'sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Sidebar Layout', 'vakker' ),
			'description'   => esc_html__( 'Choose a sidebar layout for pages', 'vakker' ),
			'parent'        => $sidebar_panel,
			'default_value' => 'no-sidebar',
            'options'       => vakker_eltd_get_custom_sidebars_options()
		) );
		
		$vakker_custom_sidebars = vakker_eltd_get_custom_sidebars();
		if ( count( $vakker_custom_sidebars ) > 0 ) {
			vakker_eltd_add_admin_field( array(
				'name'        => 'custom_sidebar_area',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'vakker' ),
				'description' => esc_html__( 'Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'vakker' ),
				'parent'      => $sidebar_panel,
				'options'     => $vakker_custom_sidebars,
				'args'        => array(
					'select2' => true
				)
			) );
		}
	}
	
	add_action( 'vakker_eltd_options_map', 'vakker_eltd_sidebar_options_map', 6 );
}