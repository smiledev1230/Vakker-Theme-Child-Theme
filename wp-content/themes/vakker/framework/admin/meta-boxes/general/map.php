<?php

if ( ! function_exists( 'vakker_eltd_map_general_meta' ) ) {
	function vakker_eltd_map_general_meta() {
		
		$general_meta_box = vakker_eltd_add_meta_box(
			array(
				'scope' => apply_filters( 'vakker_eltd_set_scope_for_meta_boxes', array( 'page', 'post' ), 'general_meta' ),
				'title' => esc_html__( 'General', 'vakker' ),
				'name'  => 'general_meta'
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_page_slider_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Slider Shortcode', 'vakker' ),
				'description' => esc_html__( 'Paste your slider shortcode here', 'vakker' ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		/***************** Content Layout - begin **********************/
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'          => 'eltd_page_content_behind_header_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Always put content behind header', 'vakker' ),
				'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'vakker' ),
				'parent'        => $general_meta_box
			)
		);
		
		$eltd_content_padding_group = vakker_eltd_add_admin_group(
			array(
				'name'        => 'content_padding_group',
				'title'       => esc_html__( 'Content Style', 'vakker' ),
				'description' => esc_html__( 'Define styles for Content area', 'vakker' ),
				'parent'      => $general_meta_box
			)
		);
		
			$eltd_content_padding_row = vakker_eltd_add_admin_row(
				array(
					'name'   => 'eltd_content_padding_row',
					'next'   => true,
					'parent' => $eltd_content_padding_group
				)
			);
		
				vakker_eltd_add_meta_box_field(
					array(
						'name'   => 'eltd_page_content_top_padding',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Content Top Padding', 'vakker' ),
						'parent' => $eltd_content_padding_row,
						'args'   => array(
							'suffix' => 'px'
						)
					)
				);
				
				vakker_eltd_add_meta_box_field(
					array(
						'name'    => 'eltd_page_content_top_padding_mobile',
						'type'    => 'selectsimple',
						'label'   => esc_html__( 'Set this top padding for mobile header', 'vakker' ),
						'parent'  => $eltd_content_padding_row,
						'options' => vakker_eltd_get_yes_no_select_array( false )
					)
				);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_page_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'vakker' ),
				'description' => esc_html__( 'Choose background color for page content', 'vakker' ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Content Layout - end **********************/
		
		/***************** Boxed Layout - begin **********************/
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'    => 'eltd_boxed_meta',
				'type'    => 'select',
				'label'   => esc_html__( 'Boxed Layout', 'vakker' ),
				'parent'  => $general_meta_box,
				'options' => vakker_eltd_get_yes_no_select_array(),
				'args'    => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltd_boxed_container_meta',
						'no'  => '#eltd_boxed_container_meta',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltd_boxed_container_meta'
					)
				)
			)
		);
		
			$boxed_container_meta = vakker_eltd_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'boxed_container_meta',
					'hidden_property' => 'eltd_boxed_meta',
					'hidden_values'   => array(
						'',
						'no'
					)
				)
			);
		
				vakker_eltd_add_meta_box_field(
					array(
						'name'        => 'eltd_page_background_color_in_box_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'vakker' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'vakker' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				vakker_eltd_add_meta_box_field(
					array(
						'name'        => 'eltd_boxed_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'vakker' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'vakker' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				vakker_eltd_add_meta_box_field(
					array(
						'name'        => 'eltd_boxed_pattern_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'vakker' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'vakker' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				vakker_eltd_add_meta_box_field(
					array(
						'name'          => 'eltd_boxed_background_image_attachment_meta',
						'type'          => 'select',
						'default_value' => 'fixed',
						'label'         => esc_html__( 'Background Image Attachment', 'vakker' ),
						'description'   => esc_html__( 'Choose background image attachment', 'vakker' ),
						'parent'        => $boxed_container_meta,
						'options'       => array(
							''       => esc_html__( 'Default', 'vakker' ),
							'fixed'  => esc_html__( 'Fixed', 'vakker' ),
							'scroll' => esc_html__( 'Scroll', 'vakker' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'          => 'eltd_paspartu_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Passepartout', 'vakker' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'vakker' ),
				'parent'        => $general_meta_box,
				'options'       => vakker_eltd_get_yes_no_select_array(),
				'args'    => array(
					'dependence'    => true,
					'hide'          => array(
						''    => '#eltd_eltd_paspartu_container_meta',
						'no'  => '#eltd_eltd_paspartu_container_meta',
						'yes' => ''
					),
					'show'          => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltd_eltd_paspartu_container_meta'
					)
				)
			)
		);
		
			$paspartu_container_meta = vakker_eltd_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'eltd_paspartu_container_meta',
					'hidden_property' => 'eltd_paspartu_meta',
					'hidden_values'   => array(
						'',
						'no'
					)
				)
			);
		
				vakker_eltd_add_meta_box_field(
					array(
						'name'        => 'eltd_paspartu_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'vakker' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'vakker' ),
						'parent'      => $paspartu_container_meta
					)
				);
				
				vakker_eltd_add_meta_box_field(
					array(
						'name'        => 'eltd_paspartu_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'vakker' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'vakker' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				vakker_eltd_add_meta_box_field(
					array(
						'name'        => 'eltd_paspartu_responsive_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'vakker' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'vakker' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				vakker_eltd_add_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'eltd_disable_top_paspartu_meta',
						'label'         => esc_html__( 'Disable Top Passepartout', 'vakker' ),
						'options'       => vakker_eltd_get_yes_no_select_array(),
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Width Layout - begin **********************/
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'          => 'eltd_initial_content_width_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'vakker' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'vakker' ),
				'parent'        => $general_meta_box,
				'options'       => array(
					''                => esc_html__( 'Default', 'vakker' ),
					'eltd-grid-1100' => esc_html__( '1100px', 'vakker' ),
					'eltd-grid-1300' => esc_html__( '1300px', 'vakker' ),
					'eltd-grid-1200' => esc_html__( '1200px', 'vakker' ),
					'eltd-grid-1000' => esc_html__( '1000px', 'vakker' ),
					'eltd-grid-800'  => esc_html__( '800px', 'vakker' )
				)
			)
		);
		
		/***************** Content Width Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'          => 'eltd_smooth_page_transitions_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Smooth Page Transitions', 'vakker' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'vakker' ),
				'parent'        => $general_meta_box,
				'options'       => vakker_eltd_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#eltd_page_transitions_container_meta',
						'no'  => '#eltd_page_transitions_container_meta',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#eltd_page_transitions_container_meta'
					)
				)
			)
		);
		
			$page_transitions_container_meta = vakker_eltd_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'page_transitions_container_meta',
					'hidden_property' => 'eltd_smooth_page_transitions_meta',
					'hidden_values'   => array(
						'',
						'no'
					)
				)
			);
		
				vakker_eltd_add_meta_box_field(
					array(
						'name'        => 'eltd_page_transition_preloader_meta',
						'type'        => 'select',
						'label'       => esc_html__( 'Enable Preloading Animation', 'vakker' ),
						'description' => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'vakker' ),
						'parent'      => $page_transitions_container_meta,
						'options'     => vakker_eltd_get_yes_no_select_array(),
						'args'        => array(
							'dependence' => true,
							'hide'       => array(
								''    => '#eltd_page_transition_preloader_container_meta',
								'no'  => '#eltd_page_transition_preloader_container_meta',
								'yes' => ''
							),
							'show'       => array(
								''    => '',
								'no'  => '',
								'yes' => '#eltd_page_transition_preloader_container_meta'
							)
						)
					)
				);
				
				$page_transition_preloader_container_meta = vakker_eltd_add_admin_container(
					array(
						'parent'          => $page_transitions_container_meta,
						'name'            => 'page_transition_preloader_container_meta',
						'hidden_property' => 'eltd_page_transition_preloader_meta',
						'hidden_values'   => array(
							'',
							'no'
						)
					)
				);
				
					vakker_eltd_add_meta_box_field(
						array(
							'name'   => 'eltd_smooth_pt_bgnd_color_meta',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'vakker' ),
							'parent' => $page_transition_preloader_container_meta
						)
					);
					
					$group_pt_spinner_animation_meta = vakker_eltd_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation_meta',
							'title'       => esc_html__( 'Loader Style', 'vakker' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'vakker' ),
							'parent'      => $page_transition_preloader_container_meta
						)
					);
					
					$row_pt_spinner_animation_meta = vakker_eltd_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation_meta',
							'parent' => $group_pt_spinner_animation_meta
						)
					);
					
					vakker_eltd_add_meta_box_field(
						array(
							'type'    => 'selectsimple',
							'name'    => 'eltd_smooth_pt_spinner_type_meta',
							'label'   => esc_html__( 'Spinner Type', 'vakker' ),
							'parent'  => $row_pt_spinner_animation_meta,
							'options' => array(
								''                      => esc_html__( 'Default', 'vakker' ),
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
					
					vakker_eltd_add_meta_box_field(
						array(
							'type'   => 'colorsimple',
							'name'   => 'eltd_smooth_pt_spinner_color_meta',
							'label'  => esc_html__( 'Spinner Color', 'vakker' ),
							'parent' => $row_pt_spinner_animation_meta
						)
					);
					
					vakker_eltd_add_meta_box_field(
						array(
							'name'        => 'eltd_page_transition_fadeout_meta',
							'type'        => 'select',
							'label'       => esc_html__( 'Enable Fade Out Animation', 'vakker' ),
							'description' => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'vakker' ),
							'options'     => vakker_eltd_get_yes_no_select_array(),
							'parent'      => $page_transitions_container_meta
						
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		/***************** Comments Layout - begin **********************/
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_page_comments_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Show Comments', 'vakker' ),
				'description' => esc_html__( 'Enabling this option will show comments on your page', 'vakker' ),
				'parent'      => $general_meta_box,
				'options'     => vakker_eltd_get_yes_no_select_array()
			)
		);
		
		/***************** Comments Layout - end **********************/

        /***************** Scrollable Widget- start **********************/

        vakker_eltd_add_meta_box_field(
            array(
                'name' => 'eltd_enable_scrollable_widget_meta',
                'type' => 'select',
                'label' => esc_html__('Show Scrollable Widget', 'vakker'),
                'description' => esc_html__('Enabling this option will show scrollable widget on your page', 'vakker'),
                'parent' => $general_meta_box,
                'options' => vakker_eltd_get_yes_no_select_array(),
                'args'          => array(
                    'dependence' => true,
                    'hide'       => array(
                        ''    => '#eltd_scrollable_widget_container',
                        'no'  => '#eltd_scrollable_widget_container',
                        'yes' => ''
                    ),
                    'show'       => array(
                        ''    => '',
                        'no'  => '',
                        'yes' => '#eltd_scrollable_widget_container'
                    )
                )
            )
        );

        $scrollable_widget_container = vakker_eltd_add_admin_container(array(
            'type'            => 'container',
            'name'            => 'scrollable_widget_container',
            'parent'          => $general_meta_box,
            'hidden_property' => 'eltd_enable_scrollable_widget_meta',
            'hidden_value'    => 'no',
            'hidden_values'   => array('', 'no')
        ));

        vakker_eltd_add_meta_box_field(
            array(
                'name' => 'eltd_scrollable_widget_light_meta',
                'type' => 'select',
                'label' => esc_html__('Light Scrollable Widget Skin', 'vakker'),
                'description' => esc_html__('Enabling this option will show light scrollable widget', 'vakker'),
                'parent' => $scrollable_widget_container,
                'options' => vakker_eltd_get_yes_no_select_array(true)
            )
        );
        /***************** Scrollable Widget- end **********************/
	}
	
	add_action( 'vakker_eltd_meta_boxes_map', 'vakker_eltd_map_general_meta', 10 );
}