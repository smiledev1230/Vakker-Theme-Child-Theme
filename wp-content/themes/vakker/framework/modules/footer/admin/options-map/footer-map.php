<?php

if ( ! function_exists( 'vakker_eltd_footer_options_map' ) ) {
	function vakker_eltd_footer_options_map() {
		
		vakker_eltd_add_admin_page(
			array(
				'slug'  => '_footer_page',
				'title' => esc_html__( 'Footer', 'vakker' ),
				'icon'  => 'fa fa-sort-amount-asc'
			)
		);
		
		$footer_panel = vakker_eltd_add_admin_panel(
			array(
				'title' => esc_html__( 'Footer', 'vakker' ),
				'name'  => 'footer',
				'page'  => '_footer_page'
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'footer_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Footer in Grid', 'vakker' ),
				'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'vakker' ),
				'parent'        => $footer_panel
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_top',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Top', 'vakker' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'vakker' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltd_show_footer_top_container'
				),
				'parent'        => $footer_panel,
			)
		);

		$show_footer_top_container = vakker_eltd_add_admin_container(
			array(
				'name'            => 'show_footer_top_container',
				'hidden_property' => 'show_footer_top',
				'hidden_value'    => 'no',
				'parent'          => $footer_panel
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns',
				'parent'        => $show_footer_top_container,
				'default_value' => '3',
				'label'         => esc_html__( 'Footer Top Columns', 'vakker' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Top area', 'vakker' ),
				'options'       => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4'
				)
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns_alignment',
				'default_value' => '',
				'label'         => esc_html__( 'Footer Top Columns Alignment', 'vakker' ),
				'description'   => esc_html__( 'Text Alignment in Footer Columns', 'vakker' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'vakker' ),
					'left'   => esc_html__( 'Left', 'vakker' ),
					'center' => esc_html__( 'Center', 'vakker' ),
					'right'  => esc_html__( 'Right', 'vakker' )
				),
				'parent'        => $show_footer_top_container,
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'        => 'footer_top_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'vakker' ),
				'description' => esc_html__( 'Set background color for top footer area', 'vakker' ),
				'parent'      => $show_footer_top_container
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_bottom',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Bottom', 'vakker' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'vakker' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltd_show_footer_bottom_container'
				),
				'parent'        => $footer_panel,
			)
		);
		
		$show_footer_bottom_container = vakker_eltd_add_admin_container(
			array(
				'name'            => 'show_footer_bottom_container',
				'hidden_property' => 'show_footer_bottom',
				'hidden_value'    => 'no',
				'parent'          => $footer_panel
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_bottom_columns',
				'default_value' => '2',
				'label'         => esc_html__( 'Footer Bottom Columns', 'vakker' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Bottom area', 'vakker' ),
				'options'       => array(
					'1' => '1',
					'2' => '2',
					'3' => '3'
				),
				'parent'        => $show_footer_bottom_container,
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'        => 'footer_bottom_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'vakker' ),
				'description' => esc_html__( 'Set background color for bottom footer area', 'vakker' ),
				'parent'      => $show_footer_bottom_container
			)
		);
	}
	
	add_action( 'vakker_eltd_options_map', 'vakker_eltd_footer_options_map', 9 );
}