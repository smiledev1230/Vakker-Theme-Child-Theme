<?php

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if ( function_exists( 'vc_set_as_theme' ) ) {
	vc_set_as_theme( true );
}

/**
 * Change path for overridden templates
 */
if ( function_exists( 'vc_set_shortcodes_templates_dir' ) ) {
	$dir = ELATED_ROOT_DIR . '/vc-templates';
	vc_set_shortcodes_templates_dir( $dir );
}

if ( ! function_exists( 'vakker_eltd_configure_visual_composer_frontend_editor' ) ) {
	/**
	 * Configuration for Visual Composer FrontEnd Editor
	 * Hooks on vc_after_init action
	 */
	function vakker_eltd_configure_visual_composer_frontend_editor() {
		/**
		 * Remove frontend editor
		 */
		if ( function_exists( 'vc_disable_frontend' ) ) {
			vc_disable_frontend();
		}
	}
	
	add_action( 'vc_after_init', 'vakker_eltd_configure_visual_composer_frontend_editor' );
}

if ( ! function_exists( 'vakker_eltd_vc_row_map' ) ) {
	/**
	 * Map VC Row shortcode
	 * Hooks on vc_after_init action
	 */
	function vakker_eltd_vc_row_map() {
		
		/******* VC Row shortcode - begin *******/
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Elated Row Content Width', 'vakker' ),
				'value'      => array(
					esc_html__( 'Full Width', 'vakker' ) => 'full-width',
					esc_html__( 'In Grid', 'vakker' )    => 'grid'
				),
				'group'      => esc_html__( 'Elated Settings', 'vakker' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'anchor',
				'heading'     => esc_html__( 'Elated Anchor ID', 'vakker' ),
				'description' => esc_html__( 'For example "home"', 'vakker' ),
				'group'       => esc_html__( 'Elated Settings', 'vakker' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Elated Background Color', 'vakker' ),
				'group'      => esc_html__( 'Elated Settings', 'vakker' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Elated Background Image', 'vakker' ),
				'group'      => esc_html__( 'Elated Settings', 'vakker' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Elated Disable Background Image', 'vakker' ),
				'value'       => array(
					esc_html__( 'Never', 'vakker' )        => '',
					esc_html__( 'Below 1280px', 'vakker' ) => '1280',
					esc_html__( 'Below 1024px', 'vakker' ) => '1024',
					esc_html__( 'Below 768px', 'vakker' )  => '768',
					esc_html__( 'Below 680px', 'vakker' )  => '680',
					esc_html__( 'Below 480px', 'vakker' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'vakker' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Elated Settings', 'vakker' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'parallax_background_image',
				'heading'    => esc_html__( 'Elated Parallax Background Image', 'vakker' ),
				'group'      => esc_html__( 'Elated Settings', 'vakker' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'parallax_bg_speed',
				'heading'     => esc_html__( 'Elated Parallax Speed', 'vakker' ),
				'description' => esc_html__( 'Set your parallax speed. Default value is 1.', 'vakker' ),
				'dependency'  => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Elated Settings', 'vakker' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'textfield',
				'param_name' => 'parallax_bg_height',
				'heading'    => esc_html__( 'Elated Parallax Section Height (px)', 'vakker' ),
				'dependency' => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'      => esc_html__( 'Elated Settings', 'vakker' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Elated Content Aligment', 'vakker' ),
				'value'      => array(
					esc_html__( 'Default', 'vakker' ) => '',
					esc_html__( 'Left', 'vakker' )    => 'left',
					esc_html__( 'Center', 'vakker' )  => 'center',
					esc_html__( 'Right', 'vakker' )   => 'right'
				),
				'group'      => esc_html__( 'Elated Settings', 'vakker' )
			)
		);
		
		/******* VC Row shortcode - end *******/
		
		/******* VC Row Inner shortcode - begin *******/
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Elated Row Content Width', 'vakker' ),
				'value'      => array(
					esc_html__( 'Full Width', 'vakker' ) => 'full-width',
					esc_html__( 'In Grid', 'vakker' )    => 'grid'
				),
				'group'      => esc_html__( 'Elated Settings', 'vakker' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Elated Background Color', 'vakker' ),
				'group'      => esc_html__( 'Elated Settings', 'vakker' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Elated Background Image', 'vakker' ),
				'group'      => esc_html__( 'Elated Settings', 'vakker' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Elated Disable Background Image', 'vakker' ),
				'value'       => array(
					esc_html__( 'Never', 'vakker' )        => '',
					esc_html__( 'Below 1280px', 'vakker' ) => '1280',
					esc_html__( 'Below 1024px', 'vakker' ) => '1024',
					esc_html__( 'Below 768px', 'vakker' )  => '768',
					esc_html__( 'Below 680px', 'vakker' )  => '680',
					esc_html__( 'Below 480px', 'vakker' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'vakker' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Elated Settings', 'vakker' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Elated Content Aligment', 'vakker' ),
				'value'      => array(
					esc_html__( 'Default', 'vakker' ) => '',
					esc_html__( 'Left', 'vakker' )    => 'left',
					esc_html__( 'Center', 'vakker' )  => 'center',
					esc_html__( 'Right', 'vakker' )   => 'right'
				),
				'group'      => esc_html__( 'Elated Settings', 'vakker' )
			)
		);
		
		/******* VC Row Inner shortcode - end *******/
		
		/******* VC Revolution Slider shortcode - begin *******/
		
		if ( vakker_eltd_revolution_slider_installed() ) {
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'enable_paspartu',
					'heading'     => esc_html__( 'Elated Enable Passepartout', 'vakker' ),
					'value'       => array_flip( vakker_eltd_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'group'       => esc_html__( 'Elated Settings', 'vakker' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'paspartu_size',
					'heading'     => esc_html__( 'Elated Passepartout Size', 'vakker' ),
					'value'       => array(
						esc_html__( 'Tiny', 'vakker' )   => 'tiny',
						esc_html__( 'Small', 'vakker' )  => 'small',
						esc_html__( 'Normal', 'vakker' ) => 'normal',
						esc_html__( 'Large', 'vakker' )  => 'large'
					),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Elated Settings', 'vakker' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_side_paspartu',
					'heading'     => esc_html__( 'Elated Disable Side Passepartout', 'vakker' ),
					'value'       => array_flip( vakker_eltd_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Elated Settings', 'vakker' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_top_paspartu',
					'heading'     => esc_html__( 'Elated Disable Top Passepartout', 'vakker' ),
					'value'       => array_flip( vakker_eltd_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Elated Settings', 'vakker' )
				)
			);
		}
		
		/******* VC Revolution Slider shortcode - end *******/
	}
	
	add_action( 'vc_after_init', 'vakker_eltd_vc_row_map' );
}