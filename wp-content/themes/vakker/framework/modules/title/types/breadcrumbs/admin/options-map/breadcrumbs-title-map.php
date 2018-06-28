<?php

if ( ! function_exists('vakker_eltd_breadcrumbs_title_type_options_map') ) {
	function vakker_eltd_breadcrumbs_title_type_options_map($panel_typography) {
		
		vakker_eltd_add_admin_section_title(
			array(
				'name'   => 'type_section_breadcrumbs',
				'title'  => esc_html__( 'Breadcrumbs', 'vakker' ),
				'parent' => $panel_typography
			)
		);
	
		$group_page_breadcrumbs_styles = vakker_eltd_add_admin_group(
			array(
				'name'        => 'group_page_breadcrumbs_styles',
				'title'       => esc_html__( 'Breadcrumbs', 'vakker' ),
				'description' => esc_html__( 'Define styles for page breadcrumbs', 'vakker' ),
				'parent'      => $panel_typography
			)
		);
	
			$row_page_breadcrumbs_styles_1 = vakker_eltd_add_admin_row(
				array(
					'name'   => 'row_page_breadcrumbs_styles_1',
					'parent' => $group_page_breadcrumbs_styles
				)
			);
	
				vakker_eltd_add_admin_field(
					array(
						'type'          => 'colorsimple',
						'name'          => 'page_breadcrumb_color',
						'default_value' => '',
						'label'         => esc_html__( 'Text Color', 'vakker' ),
						'parent'        => $row_page_breadcrumbs_styles_1
					)
				);
				
				vakker_eltd_add_admin_field(
					array(
						'type'          => 'textsimple',
						'name'          => 'page_breadcrumb_font_size',
						'default_value' => '',
						'label'         => esc_html__( 'Font Size', 'vakker' ),
						'args'          => array(
							'suffix' => 'px'
						),
						'parent'        => $row_page_breadcrumbs_styles_1
					)
				);
				
				vakker_eltd_add_admin_field(
					array(
						'type'          => 'textsimple',
						'name'          => 'page_breadcrumb_line_height',
						'default_value' => '',
						'label'         => esc_html__( 'Line Height', 'vakker' ),
						'args'          => array(
							'suffix' => 'px'
						),
						'parent'        => $row_page_breadcrumbs_styles_1
					)
				);
				
				vakker_eltd_add_admin_field(
					array(
						'type'          => 'selectblanksimple',
						'name'          => 'page_breadcrumb_text_transform',
						'default_value' => '',
						'label'         => esc_html__( 'Text Transform', 'vakker' ),
						'options'       => vakker_eltd_get_text_transform_array(),
						'parent'        => $row_page_breadcrumbs_styles_1
					)
				);
	
			$row_page_breadcrumbs_styles_2 = vakker_eltd_add_admin_row(
				array(
					'name'   => 'row_page_breadcrumbs_styles_2',
					'parent' => $group_page_breadcrumbs_styles,
					'next'   => true
				)
			);
	
				vakker_eltd_add_admin_field(
					array(
						'type'          => 'fontsimple',
						'name'          => 'page_breadcrumb_google_fonts',
						'default_value' => '-1',
						'label'         => esc_html__( 'Font Family', 'vakker' ),
						'parent'        => $row_page_breadcrumbs_styles_2
					)
				);
				
				vakker_eltd_add_admin_field(
					array(
						'type'          => 'selectblanksimple',
						'name'          => 'page_breadcrumb_font_style',
						'default_value' => '',
						'label'         => esc_html__( 'Font Style', 'vakker' ),
						'options'       => vakker_eltd_get_font_style_array(),
						'parent'        => $row_page_breadcrumbs_styles_2
					)
				);
				
				vakker_eltd_add_admin_field(
					array(
						'type'          => 'selectblanksimple',
						'name'          => 'page_breadcrumb_font_weight',
						'default_value' => '',
						'label'         => esc_html__( 'Font Weight', 'vakker' ),
						'options'       => vakker_eltd_get_font_weight_array(),
						'parent'        => $row_page_breadcrumbs_styles_2
					)
				);
				
				vakker_eltd_add_admin_field(
					array(
						'type'          => 'textsimple',
						'name'          => 'page_breadcrumb_letter_spacing',
						'default_value' => '',
						'label'         => esc_html__( 'Letter Spacing', 'vakker' ),
						'args'          => array(
							'suffix' => 'px'
						),
						'parent'        => $row_page_breadcrumbs_styles_2
					)
				);
	
			$row_page_breadcrumbs_styles_3 = vakker_eltd_add_admin_row(
				array(
					'name'   => 'row_page_breadcrumbs_styles_3',
					'parent' => $group_page_breadcrumbs_styles,
					'next'   => true
				)
			);
	
				vakker_eltd_add_admin_field(
					array(
						'type'          => 'colorsimple',
						'name'          => 'page_breadcrumb_hovercolor',
						'default_value' => '',
						'label'         => esc_html__( 'Hover/Active Text Color', 'vakker' ),
						'parent'        => $row_page_breadcrumbs_styles_3
					)
				);
    }

	add_action( 'vakker_eltd_additional_title_typography_options_map', 'vakker_eltd_breadcrumbs_title_type_options_map');
}