<?php

if ( ! function_exists( 'vakker_eltd_map_footer_meta' ) ) {
	function vakker_eltd_map_footer_meta() {
		
		$footer_meta_box = vakker_eltd_add_meta_box(
			array(
				'scope' => apply_filters( 'vakker_eltd_set_scope_for_meta_boxes', array( 'page', 'post' ), 'footer_meta' ),
				'title' => esc_html__( 'Footer', 'vakker' ),
				'name'  => 'footer_meta'
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'          => 'eltd_disable_footer_meta',
				'type'          => 'select',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Footer for this Page', 'vakker' ),
				'description'   => esc_html__( 'Enabling this option will hide footer on this page', 'vakker' ),
				'options'       => vakker_eltd_get_yes_no_select_array( false ),
				'parent'        => $footer_meta_box,
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						'no'  => '',
						'yes' => '#eltd_eltd_show_footer_meta_container'
					),
					'show'       => array(
						'no'  => '#eltd_eltd_show_footer_meta_container',
						'yes' => ''
					)
				)
			)
		);
		
		$show_footer_meta_container = vakker_eltd_add_admin_container(
			array(
				'name'            => 'eltd_show_footer_meta_container',
				'hidden_property' => 'eltd_disable_footer_meta',
				'hidden_value'    => 'yes',
				'parent'          => $footer_meta_box
			)
		);
		
			vakker_eltd_add_meta_box_field(
				array(
					'name'          => 'eltd_show_footer_top_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Top', 'vakker' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'vakker' ),
					'options'       => vakker_eltd_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
			
			vakker_eltd_add_meta_box_field(
				array(
					'name'          => 'eltd_show_footer_bottom_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Bottom', 'vakker' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'vakker' ),
					'options'       => vakker_eltd_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
	}
	
	add_action( 'vakker_eltd_meta_boxes_map', 'vakker_eltd_map_footer_meta', 70 );
}