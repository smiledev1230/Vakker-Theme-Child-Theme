<?php

if ( ! function_exists( 'vakker_eltd_get_hide_dep_for_top_header_options' ) ) {
	function vakker_eltd_get_hide_dep_for_top_header_options() {
		$hide_dep_options = apply_filters( 'vakker_eltd_top_header_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'vakker_eltd_header_top_options_map' ) ) {
	function vakker_eltd_header_top_options_map( $panel_header ) {
		$hide_dep_options = vakker_eltd_get_hide_dep_for_top_header_options();
		
		$top_header_container = vakker_eltd_add_admin_container_no_style(
			array(
				'type'            => 'container',
				'name'            => 'top_header_container',
				'parent'          => $panel_header,
				'hidden_property' => 'header_type',
				'hidden_values'   => $hide_dep_options
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'          => 'top_bar',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Top Bar', 'vakker' ),
				'description'   => esc_html__( 'Enabling this option will show top bar area', 'vakker' ),
				'parent'        => $top_header_container,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltd_top_bar_container"
				)
			)
		);
		
		$top_bar_container = vakker_eltd_add_admin_container(
			array(
				'name'            => 'top_bar_container',
				'parent'          => $top_header_container,
				'hidden_property' => 'top_bar',
				'hidden_value'    => 'no'
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'          => 'top_bar_in_grid',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Top Bar in Grid', 'vakker' ),
				'description'   => esc_html__( 'Set top bar content to be in grid', 'vakker' ),
				'parent'        => $top_bar_container,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltd_top_bar_in_grid_container"
				)
			)
		);
		
		$top_bar_in_grid_container = vakker_eltd_add_admin_container(
			array(
				'name'            => 'top_bar_in_grid_container',
				'parent'          => $top_bar_container,
				'hidden_property' => 'top_bar_in_grid',
				'hidden_value'    => 'no'
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'        => 'top_bar_grid_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Grid Background Color', 'vakker' ),
				'description' => esc_html__( 'Set grid background color for top bar', 'vakker' ),
				'parent'      => $top_bar_in_grid_container
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'        => 'top_bar_grid_background_transparency',
				'type'        => 'text',
				'label'       => esc_html__( 'Grid Background Transparency', 'vakker' ),
				'description' => esc_html__( 'Set grid background transparency for top bar', 'vakker' ),
				'parent'      => $top_bar_in_grid_container,
				'args'        => array( 'col_width' => 3 )
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'        => 'top_bar_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'vakker' ),
				'description' => esc_html__( 'Set background color for top bar', 'vakker' ),
				'parent'      => $top_bar_container
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'        => 'top_bar_background_transparency',
				'type'        => 'text',
				'label'       => esc_html__( 'Background Transparency', 'vakker' ),
				'description' => esc_html__( 'Set background transparency for top bar', 'vakker' ),
				'parent'      => $top_bar_container,
				'args'        => array( 'col_width' => 3 )
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'          => 'top_bar_border',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Top Bar Border', 'vakker' ),
				'description'   => esc_html__( 'Set top bar border', 'vakker' ),
				'parent'        => $top_bar_container,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltd_top_bar_border_container"
				)
			)
		);
		
		$top_bar_border_container = vakker_eltd_add_admin_container(
			array(
				'name'            => 'top_bar_border_container',
				'parent'          => $top_bar_container,
				'hidden_property' => 'top_bar_border',
				'hidden_value'    => 'no'
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'        => 'top_bar_border_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Top Bar Border', 'vakker' ),
				'description' => esc_html__( 'Set border color for top bar', 'vakker' ),
				'parent'      => $top_bar_border_container
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'        => 'top_bar_height',
				'type'        => 'text',
				'label'       => esc_html__( 'Top Bar Height', 'vakker' ),
				'description' => esc_html__( 'Enter top bar height (Default is 50px)', 'vakker' ),
				'parent'      => $top_bar_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);
	}
	
	add_action( 'vakker_eltd_header_top_options_map', 'vakker_eltd_header_top_options_map', 10, 1 );
}