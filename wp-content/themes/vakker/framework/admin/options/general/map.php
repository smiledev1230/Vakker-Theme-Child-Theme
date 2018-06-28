<?php

if ( ! function_exists( 'vakker_eltd_general_options_map' ) ) {
	/**
	 * General options page
	 */
	function vakker_eltd_general_options_map() {
		
		vakker_eltd_add_admin_page(
			array(
				'slug'  => '',
				'title' => esc_html__( 'General', 'vakker' ),
				'icon'  => 'fa fa-institution'
			)
		);
		
		$panel_design_style = vakker_eltd_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_design_style',
				'title' => esc_html__( 'Design Style', 'vakker' )
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'          => 'google_fonts',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Google Font Family', 'vakker' ),
				'description'   => esc_html__( 'Choose a default Google font for your site', 'vakker' ),
				'parent'        => $panel_design_style
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'          => 'additional_google_fonts',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Additional Google Fonts', 'vakker' ),
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltd_additional_google_fonts_container"
				)
			)
		);
		
		$additional_google_fonts_container = vakker_eltd_add_admin_container(
			array(
				'parent'          => $panel_design_style,
				'name'            => 'additional_google_fonts_container',
				'hidden_property' => 'additional_google_fonts',
				'hidden_value'    => 'no'
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'          => 'additional_google_font1',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'vakker' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'vakker' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'          => 'additional_google_font2',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'vakker' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'vakker' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'          => 'additional_google_font3',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'vakker' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'vakker' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'          => 'additional_google_font4',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'vakker' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'vakker' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'          => 'additional_google_font5',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'vakker' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'vakker' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'          => 'google_font_weight',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Style & Weight', 'vakker' ),
				'description'   => esc_html__( 'Choose a default Google font weights for your site. Impact on page load time', 'vakker' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'100'  => esc_html__( '100 Thin', 'vakker' ),
					'100i' => esc_html__( '100 Thin Italic', 'vakker' ),
					'200'  => esc_html__( '200 Extra-Light', 'vakker' ),
					'200i' => esc_html__( '200 Extra-Light Italic', 'vakker' ),
					'300'  => esc_html__( '300 Light', 'vakker' ),
					'300i' => esc_html__( '300 Light Italic', 'vakker' ),
					'400'  => esc_html__( '400 Regular', 'vakker' ),
					'400i' => esc_html__( '400 Regular Italic', 'vakker' ),
					'500'  => esc_html__( '500 Medium', 'vakker' ),
					'500i' => esc_html__( '500 Medium Italic', 'vakker' ),
					'600'  => esc_html__( '600 Semi-Bold', 'vakker' ),
					'600i' => esc_html__( '600 Semi-Bold Italic', 'vakker' ),
					'700'  => esc_html__( '700 Bold', 'vakker' ),
					'700i' => esc_html__( '700 Bold Italic', 'vakker' ),
					'800'  => esc_html__( '800 Extra-Bold', 'vakker' ),
					'800i' => esc_html__( '800 Extra-Bold Italic', 'vakker' ),
					'900'  => esc_html__( '900 Ultra-Bold', 'vakker' ),
					'900i' => esc_html__( '900 Ultra-Bold Italic', 'vakker' )
				)
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'          => 'google_font_subset',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Subset', 'vakker' ),
				'description'   => esc_html__( 'Choose a default Google font subsets for your site', 'vakker' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'latin'        => esc_html__( 'Latin', 'vakker' ),
					'latin-ext'    => esc_html__( 'Latin Extended', 'vakker' ),
					'cyrillic'     => esc_html__( 'Cyrillic', 'vakker' ),
					'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'vakker' ),
					'greek'        => esc_html__( 'Greek', 'vakker' ),
					'greek-ext'    => esc_html__( 'Greek Extended', 'vakker' ),
					'vietnamese'   => esc_html__( 'Vietnamese', 'vakker' )
				)
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'        => 'first_color',
				'type'        => 'color',
				'label'       => esc_html__( 'First Main Color', 'vakker' ),
				'description' => esc_html__( 'Choose the most dominant theme color. Default color is #00bbb3', 'vakker' ),
				'parent'      => $panel_design_style
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'        => 'page_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'vakker' ),
				'description' => esc_html__( 'Choose the background color for page content. Default color is #ffffff', 'vakker' ),
				'parent'      => $panel_design_style
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'        => 'selection_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Text Selection Color', 'vakker' ),
				'description' => esc_html__( 'Choose the color users see when selecting text', 'vakker' ),
				'parent'      => $panel_design_style
			)
		);
		
		/***************** Passepartout Layout - begin **********************/
		
		vakker_eltd_add_admin_field(
			array(
				'name'          => 'boxed',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Boxed Layout', 'vakker' ),
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltd_boxed_container"
				)
			)
		);
		
			$boxed_container = vakker_eltd_add_admin_container(
				array(
					'parent'          => $panel_design_style,
					'name'            => 'boxed_container',
					'hidden_property' => 'boxed',
					'hidden_value'    => 'no'
				)
			);
		
				vakker_eltd_add_admin_field(
					array(
						'name'        => 'page_background_color_in_box',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'vakker' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'vakker' ),
						'parent'      => $boxed_container
					)
				);
				
				vakker_eltd_add_admin_field(
					array(
						'name'        => 'boxed_background_image',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'vakker' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'vakker' ),
						'parent'      => $boxed_container
					)
				);
				
				vakker_eltd_add_admin_field(
					array(
						'name'        => 'boxed_pattern_background_image',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'vakker' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'vakker' ),
						'parent'      => $boxed_container
					)
				);
				
				vakker_eltd_add_admin_field(
					array(
						'name'          => 'boxed_background_image_attachment',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Attachment', 'vakker' ),
						'description'   => esc_html__( 'Choose background image attachment', 'vakker' ),
						'parent'        => $boxed_container,
						'options'       => array(
							''       => esc_html__( 'Default', 'vakker' ),
							'fixed'  => esc_html__( 'Fixed', 'vakker' ),
							'scroll' => esc_html__( 'Scroll', 'vakker' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		vakker_eltd_add_admin_field(
			array(
				'name'          => 'paspartu',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Passepartout', 'vakker' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'vakker' ),
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltd_paspartu_container"
				)
			)
		);
		
			$paspartu_container = vakker_eltd_add_admin_container(
				array(
					'parent'          => $panel_design_style,
					'name'            => 'paspartu_container',
					'hidden_property' => 'paspartu',
					'hidden_value'    => 'no'
				)
			);
		
				vakker_eltd_add_admin_field(
					array(
						'name'        => 'paspartu_color',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'vakker' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'vakker' ),
						'parent'      => $paspartu_container
					)
				);
				
				vakker_eltd_add_admin_field(
					array(
						'name'        => 'paspartu_width',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'vakker' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'vakker' ),
						'parent'      => $paspartu_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				vakker_eltd_add_admin_field(
					array(
						'name'        => 'paspartu_responsive_width',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'vakker' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'vakker' ),
						'parent'      => $paspartu_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				vakker_eltd_add_admin_field(
					array(
						'parent'        => $paspartu_container,
						'type'          => 'yesno',
						'default_value' => 'no',
						'name'          => 'disable_top_paspartu',
						'label'         => esc_html__( 'Disable Top Passepartout', 'vakker' )
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Layout - begin **********************/
		
		vakker_eltd_add_admin_field(
			array(
				'name'          => 'initial_content_width',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'vakker' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'vakker' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'eltd-grid-1100' => esc_html__( '1100px - default', 'vakker' ),
					'eltd-grid-1300' => esc_html__( '1300px', 'vakker' ),
					'eltd-grid-1200' => esc_html__( '1200px', 'vakker' ),
					'eltd-grid-1000' => esc_html__( '1000px', 'vakker' ),
					'eltd-grid-800'  => esc_html__( '800px', 'vakker' )
				)
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'          => 'preload_pattern_image',
				'type'          => 'image',
				'label'         => esc_html__( 'Preload Pattern Image', 'vakker' ),
				'description'   => esc_html__( 'Choose preload pattern image to be displayed until images are loaded', 'vakker' ),
				'parent'        => $panel_design_style
			)
		);
		
		/***************** Content Layout - end **********************/
		
		$panel_settings = vakker_eltd_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_settings',
				'title' => esc_html__( 'Settings', 'vakker' )
			)
		);
		
		/***************** Smooth Scroll Layout - begin **********************/
		
		vakker_eltd_add_admin_field(
			array(
				'name'          => 'page_smooth_scroll',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Scroll', 'vakker' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'vakker' ),
				'parent'        => $panel_settings
			)
		);
		
		/***************** Smooth Scroll Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		vakker_eltd_add_admin_field(
			array(
				'name'          => 'smooth_page_transitions',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Page Transitions', 'vakker' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'vakker' ),
				'parent'        => $panel_settings,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltd_page_transitions_container"
				)
			)
		);
		
			$page_transitions_container = vakker_eltd_add_admin_container(
				array(
					'parent'          => $panel_settings,
					'name'            => 'page_transitions_container',
					'hidden_property' => 'smooth_page_transitions',
					'hidden_value'    => 'no'
				)
			);
		
				vakker_eltd_add_admin_field(
					array(
						'name'          => 'page_transition_preloader',
						'type'          => 'yesno',
						'default_value' => 'no',
						'label'         => esc_html__( 'Enable Preloading Animation', 'vakker' ),
						'description'   => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'vakker' ),
						'parent'        => $page_transitions_container,
						'args'          => array(
							"dependence"             => true,
							"dependence_hide_on_yes" => "",
							"dependence_show_on_yes" => "#eltd_page_transition_preloader_container"
						)
					)
				);
				
				$page_transition_preloader_container = vakker_eltd_add_admin_container(
					array(
						'parent'          => $page_transitions_container,
						'name'            => 'page_transition_preloader_container',
						'hidden_property' => 'page_transition_preloader',
						'hidden_value'    => 'no'
					)
				);
		
		
					vakker_eltd_add_admin_field(
						array(
							'name'   => 'smooth_pt_bgnd_color',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'vakker' ),
							'parent' => $page_transition_preloader_container
						)
					);
					
					$group_pt_spinner_animation = vakker_eltd_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation',
							'title'       => esc_html__( 'Loader Style', 'vakker' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'vakker' ),
							'parent'      => $page_transition_preloader_container
						)
					);
					
					$row_pt_spinner_animation = vakker_eltd_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation',
							'parent' => $group_pt_spinner_animation
						)
					);
					
					vakker_eltd_add_admin_field(
						array(
							'type'          => 'selectsimple',
							'name'          => 'smooth_pt_spinner_type',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Type', 'vakker' ),
							'parent'        => $row_pt_spinner_animation,
							'options'       => array(
								'rotate_circles'        => esc_html__( 'Rotate Circles', 'vakker' ),
								'pulse'                 => esc_html__( 'Pulse', 'vakker' ),
								'double_pulse'          => esc_html__( 'Double Pulse', 'vakker' ),
								'cube'                  => esc_html__( 'Cube', 'vakker' ),
								'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'vakker' ),
								'stripes'               => esc_html__( 'Stripes', 'vakker' ),
								'wave'                  => esc_html__( 'Wave', 'vakker' ),
								'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'vakker' ),
								'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'vakker' ),
								'atom'                  => esc_html__( 'Atom', 'vakker' ),
								'clock'                 => esc_html__( 'Clock', 'vakker' ),
								'mitosis'               => esc_html__( 'Mitosis', 'vakker' ),
								'lines'                 => esc_html__( 'Lines', 'vakker' ),
								'fussion'               => esc_html__( 'Fussion', 'vakker' ),
								'wave_circles'          => esc_html__( 'Wave Circles', 'vakker' ),
								'pulse_circles'         => esc_html__( 'Pulse Circles', 'vakker' )
							)
						)
					);
					
					vakker_eltd_add_admin_field(
						array(
							'type'          => 'colorsimple',
							'name'          => 'smooth_pt_spinner_color',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Color', 'vakker' ),
							'parent'        => $row_pt_spinner_animation
						)
					);
					
					vakker_eltd_add_admin_field(
						array(
							'name'          => 'page_transition_fadeout',
							'type'          => 'yesno',
							'default_value' => 'no',
							'label'         => esc_html__( 'Enable Fade Out Animation', 'vakker' ),
							'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'vakker' ),
							'parent'        => $page_transitions_container
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		vakker_eltd_add_admin_field(
			array(
				'name'          => 'show_back_button',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show "Back To Top Button"', 'vakker' ),
				'description'   => esc_html__( 'Enabling this option will display a Back to Top button on every page', 'vakker' ),
				'parent'        => $panel_settings
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'          => 'responsiveness',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Responsiveness', 'vakker' ),
				'description'   => esc_html__( 'Enabling this option will make all pages responsive', 'vakker' ),
				'parent'        => $panel_settings
			)
		);
		
		$panel_custom_code = vakker_eltd_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_custom_code',
				'title' => esc_html__( 'Custom Code', 'vakker' )
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'        => 'custom_js',
				'type'        => 'textarea',
				'label'       => esc_html__( 'Custom JS', 'vakker' ),
				'description' => esc_html__( 'Enter your custom Javascript here', 'vakker' ),
				'parent'      => $panel_custom_code
			)
		);
		
		$panel_google_api = vakker_eltd_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_google_api',
				'title' => esc_html__( 'Google API', 'vakker' )
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'        => 'google_maps_api_key',
				'type'        => 'text',
				'label'       => esc_html__( 'Google Maps Api Key', 'vakker' ),
				'description' => esc_html__( 'Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our to our documentation.', 'vakker' ),
				'parent'      => $panel_google_api
			)
		);
	}
	
	add_action( 'vakker_eltd_options_map', 'vakker_eltd_general_options_map', 1 );
}

if ( ! function_exists( 'vakker_eltd_page_general_style' ) ) {
	/**
	 * Function that prints page general inline styles
	 */
	function vakker_eltd_page_general_style( $style ) {
		$current_style = '';
		$page_id       = vakker_eltd_get_page_id();
		$class_prefix  = vakker_eltd_get_unique_page_class( $page_id );
		
		$boxed_background_style = array();
		
		$boxed_page_background_color = vakker_eltd_get_meta_field_intersect( 'page_background_color_in_box', $page_id );
		if ( ! empty( $boxed_page_background_color ) ) {
			$boxed_background_style['background-color'] = $boxed_page_background_color;
		}
		
		$boxed_page_background_image = vakker_eltd_get_meta_field_intersect( 'boxed_background_image', $page_id );
		if ( ! empty( $boxed_page_background_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_image ) . ')';
			$boxed_background_style['background-position'] = 'center 0px';
			$boxed_background_style['background-repeat']   = 'no-repeat';
		}
		
		$boxed_page_background_pattern_image = vakker_eltd_get_meta_field_intersect( 'boxed_pattern_background_image', $page_id );
		if ( ! empty( $boxed_page_background_pattern_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_pattern_image ) . ')';
			$boxed_background_style['background-position'] = '0px 0px';
			$boxed_background_style['background-repeat']   = 'repeat';
		}
		
		$boxed_page_background_attachment = vakker_eltd_get_meta_field_intersect( 'boxed_background_image_attachment', $page_id );
		if ( ! empty( $boxed_page_background_attachment ) ) {
			$boxed_background_style['background-attachment'] = $boxed_page_background_attachment;
		}
		
		$boxed_background_selector = $class_prefix . '.eltd-boxed .eltd-wrapper';
		
		if ( ! empty( $boxed_background_style ) ) {
			$current_style .= vakker_eltd_dynamic_css( $boxed_background_selector, $boxed_background_style );
		}
		
		$paspartu_style     = array();
		$paspartu_res_style = array();
		$paspartu_res_start = '@media only screen and (max-width: 1024px) {';
		$paspartu_res_end   = '}';
		
		$paspartu_color = vakker_eltd_get_meta_field_intersect( 'paspartu_color', $page_id );
		if ( ! empty( $paspartu_color ) ) {
			$paspartu_style['background-color'] = $paspartu_color;
		}
		
		$paspartu_width = vakker_eltd_get_meta_field_intersect( 'paspartu_width', $page_id );
		if ( $paspartu_width !== '' ) {
			if ( vakker_eltd_string_ends_with( $paspartu_width, '%' ) || vakker_eltd_string_ends_with( $paspartu_width, 'px' ) ) {
				$paspartu_style['padding'] = $paspartu_width;
			} else {
				$paspartu_style['padding'] = $paspartu_width . 'px';
			}
		}
		
		$paspartu_selector = $class_prefix . '.eltd-paspartu-enabled .eltd-wrapper';
		
		if ( ! empty( $paspartu_style ) ) {
			$current_style .= vakker_eltd_dynamic_css( $paspartu_selector, $paspartu_style );
		}
		
		$paspartu_responsive_width = vakker_eltd_get_meta_field_intersect( 'paspartu_responsive_width', $page_id );
		if ( $paspartu_responsive_width !== '' ) {
			if ( vakker_eltd_string_ends_with( $paspartu_responsive_width, '%' ) || vakker_eltd_string_ends_with( $paspartu_responsive_width, 'px' ) ) {
				$paspartu_res_style['padding'] = $paspartu_responsive_width;
			} else {
				$paspartu_res_style['padding'] = $paspartu_responsive_width . 'px';
			}
		}
		
		if ( ! empty( $paspartu_res_style ) ) {
			$current_style .= $paspartu_res_start . vakker_eltd_dynamic_css( $paspartu_selector, $paspartu_res_style ) . $paspartu_res_end;
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'vakker_eltd_add_page_custom_style', 'vakker_eltd_page_general_style' );
}