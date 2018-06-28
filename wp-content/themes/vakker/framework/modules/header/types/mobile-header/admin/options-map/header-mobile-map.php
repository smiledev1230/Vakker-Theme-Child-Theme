<?php

if ( ! function_exists( 'vakker_eltd_mobile_header_options_map' ) ) {
	function vakker_eltd_mobile_header_options_map() {
		
		$panel_mobile_header = vakker_eltd_add_admin_panel(
			array(
				'title' => esc_html__( 'Mobile Header', 'vakker' ),
				'name'  => 'panel_mobile_header',
				'page'  => '_header_page'
			)
		);
		
		$mobile_header_group = vakker_eltd_add_admin_group(
			array(
				'parent' => $panel_mobile_header,
				'name'   => 'mobile_header_group',
				'title'  => esc_html__( 'Mobile Header Styles', 'vakker' )
			)
		);
		
		$mobile_header_row1 = vakker_eltd_add_admin_row(
			array(
				'parent' => $mobile_header_group,
				'name'   => 'mobile_header_row1'
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'   => 'mobile_header_height',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Height', 'vakker' ),
				'parent' => $mobile_header_row1,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'   => 'mobile_header_background_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Background Color', 'vakker' ),
				'parent' => $mobile_header_row1
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'   => 'mobile_header_border_bottom_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Border Bottom Color', 'vakker' ),
				'parent' => $mobile_header_row1
			)
		);
		
		$mobile_menu_group = vakker_eltd_add_admin_group(
			array(
				'parent' => $panel_mobile_header,
				'name'   => 'mobile_menu_group',
				'title'  => esc_html__( 'Mobile Menu Styles', 'vakker' )
			)
		);
		
		$mobile_menu_row1 = vakker_eltd_add_admin_row(
			array(
				'parent' => $mobile_menu_group,
				'name'   => 'mobile_menu_row1'
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'   => 'mobile_menu_background_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Background Color', 'vakker' ),
				'parent' => $mobile_menu_row1
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'   => 'mobile_menu_border_bottom_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Border Bottom Color', 'vakker' ),
				'parent' => $mobile_menu_row1
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'   => 'mobile_menu_separator_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Menu Item Separator Color', 'vakker' ),
				'parent' => $mobile_menu_row1
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'        => 'mobile_logo_height',
				'type'        => 'text',
				'label'       => esc_html__( 'Logo Height For Mobile Header', 'vakker' ),
				'description' => esc_html__( 'Define logo height for screen size smaller than 1024px', 'vakker' ),
				'parent'      => $panel_mobile_header,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'        => 'mobile_logo_height_phones',
				'type'        => 'text',
				'label'       => esc_html__( 'Logo Height For Mobile Devices', 'vakker' ),
				'description' => esc_html__( 'Define logo height for screen size smaller than 480px', 'vakker' ),
				'parent'      => $panel_mobile_header,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		vakker_eltd_add_admin_section_title(
			array(
				'parent' => $panel_mobile_header,
				'name'   => 'mobile_header_fonts_title',
				'title'  => esc_html__( 'Typography', 'vakker' )
			)
		);
		
		$first_level_group = vakker_eltd_add_admin_group(
			array(
				'parent'      => $panel_mobile_header,
				'name'        => 'first_level_group',
				'title'       => esc_html__( '1st Level Menu', 'vakker' ),
				'description' => esc_html__( 'Define styles for 1st level in Mobile Menu Navigation', 'vakker' )
			)
		);
		
		$first_level_row1 = vakker_eltd_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row1'
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'   => 'mobile_text_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Text Color', 'vakker' ),
				'parent' => $first_level_row1
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'   => 'mobile_text_hover_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Hover/Active Text Color', 'vakker' ),
				'parent' => $first_level_row1
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'   => 'mobile_text_google_fonts',
				'type'   => 'fontsimple',
				'label'  => esc_html__( 'Font Family', 'vakker' ),
				'parent' => $first_level_row1
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'   => 'mobile_text_font_size',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Font Size', 'vakker' ),
				'parent' => $first_level_row1,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		$first_level_row2 = vakker_eltd_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row2'
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'   => 'mobile_text_line_height',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Line Height', 'vakker' ),
				'parent' => $first_level_row2,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'    => 'mobile_text_text_transform',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Text Transform', 'vakker' ),
				'parent'  => $first_level_row2,
				'options' => vakker_eltd_get_text_transform_array()
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'    => 'mobile_text_font_style',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Style', 'vakker' ),
				'parent'  => $first_level_row2,
				'options' => vakker_eltd_get_font_style_array()
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'    => 'mobile_text_font_weight',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Weight', 'vakker' ),
				'parent'  => $first_level_row2,
				'options' => vakker_eltd_get_font_weight_array()
			)
		);
		
		$first_level_row3 = vakker_eltd_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row3'
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'mobile_text_letter_spacing',
				'label'         => esc_html__( 'Letter Spacing', 'vakker' ),
				'default_value' => '',
				'parent'        => $first_level_row3,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$second_level_group = vakker_eltd_add_admin_group(
			array(
				'parent'      => $panel_mobile_header,
				'name'        => 'second_level_group',
				'title'       => esc_html__( 'Dropdown Menu', 'vakker' ),
				'description' => esc_html__( 'Define styles for drop down menu items in Mobile Menu Navigation', 'vakker' )
			)
		);
		
		$second_level_row1 = vakker_eltd_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row1'
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Text Color', 'vakker' ),
				'parent' => $second_level_row1
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_hover_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Hover/Active Text Color', 'vakker' ),
				'parent' => $second_level_row1
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_google_fonts',
				'type'   => 'fontsimple',
				'label'  => esc_html__( 'Font Family', 'vakker' ),
				'parent' => $second_level_row1
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_font_size',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Font Size', 'vakker' ),
				'parent' => $second_level_row1,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		$second_level_row2 = vakker_eltd_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row2'
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'   => 'mobile_dropdown_text_line_height',
				'type'   => 'textsimple',
				'label'  => esc_html__( 'Line Height', 'vakker' ),
				'parent' => $second_level_row2,
				'args'   => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'    => 'mobile_dropdown_text_text_transform',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Text Transform', 'vakker' ),
				'parent'  => $second_level_row2,
				'options' => vakker_eltd_get_text_transform_array()
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'    => 'mobile_dropdown_text_font_style',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Style', 'vakker' ),
				'parent'  => $second_level_row2,
				'options' => vakker_eltd_get_font_style_array()
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'    => 'mobile_dropdown_text_font_weight',
				'type'    => 'selectsimple',
				'label'   => esc_html__( 'Font Weight', 'vakker' ),
				'parent'  => $second_level_row2,
				'options' => vakker_eltd_get_font_weight_array()
			)
		);
		
		$second_level_row3 = vakker_eltd_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row3'
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'type'          => 'textsimple',
				'name'          => 'mobile_dropdown_text_letter_spacing',
				'label'         => esc_html__( 'Letter Spacing', 'vakker' ),
				'default_value' => '',
				'parent'        => $second_level_row3,
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		vakker_eltd_add_admin_section_title(
			array(
				'name'   => 'mobile_opener_panel',
				'parent' => $panel_mobile_header,
				'title'  => esc_html__( 'Mobile Menu Opener', 'vakker' )
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'        => 'mobile_menu_title',
				'type'        => 'text',
				'label'       => esc_html__( 'Mobile Navigation Title', 'vakker' ),
				'description' => esc_html__( 'Enter title for mobile menu navigation', 'vakker' ),
				'parent'      => $panel_mobile_header,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'   => 'mobile_icon_color',
				'type'   => 'color',
				'label'  => esc_html__( 'Mobile Navigation Icon Color', 'vakker' ),
				'parent' => $panel_mobile_header
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'   => 'mobile_icon_hover_color',
				'type'   => 'color',
				'label'  => esc_html__( 'Mobile Navigation Icon Hover Color', 'vakker' ),
				'parent' => $panel_mobile_header
			)
		);
	}
	
	add_action( 'vakker_eltd_mobile_header_options_map', 'vakker_eltd_mobile_header_options_map', 10 );
}