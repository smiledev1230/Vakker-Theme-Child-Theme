<?php

if ( ! function_exists( 'vakker_eltd_get_search_types_options' ) ) {
    function vakker_eltd_get_search_types_options() {
        $search_type_options = apply_filters( 'vakker_eltd_search_type_global_option', $search_type_options = array() );

        return $search_type_options;
    }
}

if ( ! function_exists( 'vakker_eltd_search_options_map' ) ) {
	function vakker_eltd_search_options_map() {
		
		vakker_eltd_add_admin_page(
			array(
				'slug'  => '_search_page',
				'title' => esc_html__( 'Search', 'vakker' ),
				'icon'  => 'fa fa-search'
			)
		);
		
		$search_page_panel = vakker_eltd_add_admin_panel(
			array(
				'title' => esc_html__( 'Search Page', 'vakker' ),
				'name'  => 'search_template',
				'page'  => '_search_page'
			)
		);
		
		vakker_eltd_add_admin_field( array(
			'name'          => 'search_page_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Layout', 'vakker' ),
			'default_value' => 'in-grid',
			'description'   => esc_html__( 'Set layout. Default is in grid.', 'vakker' ),
			'parent'        => $search_page_panel,
			'options'       => array(
				'in-grid'    => esc_html__( 'In Grid', 'vakker' ),
				'full-width' => esc_html__( 'Full Width', 'vakker' )
			)
		) );
		
		vakker_eltd_add_admin_field( array(
			'name'          => 'search_page_sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Sidebar Layout', 'vakker' ),
			'description'   => esc_html__( "Choose a sidebar layout for search page", 'vakker' ),
			'default_value' => 'no-sidebar',
			'options'       => vakker_eltd_get_custom_sidebars_options(),
			'parent'        => $search_page_panel
		) );
		
		$vakker_custom_sidebars = vakker_eltd_get_custom_sidebars();
		if ( count( $vakker_custom_sidebars ) > 0 ) {
			vakker_eltd_add_admin_field( array(
				'name'        => 'search_custom_sidebar_area',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'vakker' ),
				'description' => esc_html__( 'Choose a sidebar to display on search page. Default sidebar is "Sidebar"', 'vakker' ),
				'parent'      => $search_page_panel,
				'options'     => $vakker_custom_sidebars,
				'args'        => array(
					'select2' => true
				)
			) );
		}
		
		$search_panel = vakker_eltd_add_admin_panel(
			array(
				'title' => esc_html__( 'Search', 'vakker' ),
				'name'  => 'search',
				'page'  => '_search_page'
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'select',
				'name'          => 'search_icon_pack',
				'default_value' => 'font_elegant',
				'label'         => esc_html__( 'Search Icon Pack', 'vakker' ),
				'description'   => esc_html__( 'Choose icon pack for search icon', 'vakker' ),
				'options'       => vakker_eltd_icon_collections()->getIconCollectionsExclude( array( 'linea_icons' ) )
			)
		);

        vakker_eltd_add_admin_field(
            array(
                'type'          => 'select',
                'name'          => 'search_sidebar_columns',
                'parent'        => $search_panel,
                'default_value' => '3',
                'label'         => esc_html__( 'Search Sidebar Columns', 'vakker' ),
                'description'   => esc_html__( 'Choose number of columns for FullScreen search sidebar area', 'vakker' ),
                'options'       => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                )
            )
        );
		
		vakker_eltd_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'yesno',
				'name'          => 'search_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Enable Grid Layout', 'vakker' ),
				'description'   => esc_html__( 'Set search area to be in grid. (Applied for Search covers header and Slide from Window Top types.', 'vakker' ),
			)
		);
		
		vakker_eltd_add_admin_section_title(
			array(
				'parent' => $search_panel,
				'name'   => 'initial_header_icon_title',
				'title'  => esc_html__( 'Initial Search Icon in Header', 'vakker' )
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'text',
				'name'          => 'header_search_icon_size',
				'default_value' => '',
				'label'         => esc_html__( 'Icon Size', 'vakker' ),
				'description'   => esc_html__( 'Set size for icon', 'vakker' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		$search_icon_color_group = vakker_eltd_add_admin_group(
			array(
				'parent'      => $search_panel,
				'title'       => esc_html__( 'Icon Colors', 'vakker' ),
				'description' => esc_html__( 'Define color style for icon', 'vakker' ),
				'name'        => 'search_icon_color_group'
			)
		);
		
		$search_icon_color_row = vakker_eltd_add_admin_row(
			array(
				'parent' => $search_icon_color_group,
				'name'   => 'search_icon_color_row'
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'   => 'colorsimple',
				'name'   => 'header_search_icon_color',
				'label'  => esc_html__( 'Color', 'vakker' )
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'   => 'colorsimple',
				'name'   => 'header_search_icon_hover_color',
				'label'  => esc_html__( 'Hover Color', 'vakker' )
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'parent'        => $search_panel,
				'type'          => 'yesno',
				'name'          => 'enable_search_icon_text',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Search Icon Text', 'vakker' ),
				'description'   => esc_html__( "Enable this option to show 'Search' text next to search icon in header", 'vakker' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltd_enable_search_icon_text_container'
				)
			)
		);
		
		$enable_search_icon_text_container = vakker_eltd_add_admin_container(
			array(
				'parent'          => $search_panel,
				'name'            => 'enable_search_icon_text_container',
				'hidden_property' => 'enable_search_icon_text',
				'hidden_value'    => 'no'
			)
		);
		
		$enable_search_icon_text_group = vakker_eltd_add_admin_group(
			array(
				'parent'      => $enable_search_icon_text_container,
				'title'       => esc_html__( 'Search Icon Text', 'vakker' ),
				'name'        => 'enable_search_icon_text_group',
				'description' => esc_html__( 'Define style for search icon text', 'vakker' )
			)
		);
		
		$enable_search_icon_text_row = vakker_eltd_add_admin_row(
			array(
				'parent' => $enable_search_icon_text_group,
				'name'   => 'enable_search_icon_text_row'
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'parent' => $enable_search_icon_text_row,
				'type'   => 'colorsimple',
				'name'   => 'search_icon_text_color',
				'label'  => esc_html__( 'Text Color', 'vakker' )
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'parent' => $enable_search_icon_text_row,
				'type'   => 'colorsimple',
				'name'   => 'search_icon_text_color_hover',
				'label'  => esc_html__( 'Text Hover Color', 'vakker' )
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row,
				'type'          => 'textsimple',
				'name'          => 'search_icon_text_font_size',
				'label'         => esc_html__( 'Font Size', 'vakker' ),
				'default_value' => '',
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row,
				'type'          => 'textsimple',
				'name'          => 'search_icon_text_line_height',
				'label'         => esc_html__( 'Line Height', 'vakker' ),
				'default_value' => '',
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$enable_search_icon_text_row2 = vakker_eltd_add_admin_row(
			array(
				'parent' => $enable_search_icon_text_group,
				'name'   => 'enable_search_icon_text_row2',
				'next'   => true
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'selectblanksimple',
				'name'          => 'search_icon_text_text_transform',
				'label'         => esc_html__( 'Text Transform', 'vakker' ),
				'default_value' => '',
				'options'       => vakker_eltd_get_text_transform_array()
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'fontsimple',
				'name'          => 'search_icon_text_google_fonts',
				'label'         => esc_html__( 'Font Family', 'vakker' ),
				'default_value' => '-1',
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'selectblanksimple',
				'name'          => 'search_icon_text_font_style',
				'label'         => esc_html__( 'Font Style', 'vakker' ),
				'default_value' => '',
				'options'       => vakker_eltd_get_font_style_array(),
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row2,
				'type'          => 'selectblanksimple',
				'name'          => 'search_icon_text_font_weight',
				'label'         => esc_html__( 'Font Weight', 'vakker' ),
				'default_value' => '',
				'options'       => vakker_eltd_get_font_weight_array(),
			)
		);
		
		$enable_search_icon_text_row3 = vakker_eltd_add_admin_row(
			array(
				'parent' => $enable_search_icon_text_group,
				'name'   => 'enable_search_icon_text_row3',
				'next'   => true
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'parent'        => $enable_search_icon_text_row3,
				'type'          => 'textsimple',
				'name'          => 'search_icon_text_letter_spacing',
				'label'         => esc_html__( 'Letter Spacing', 'vakker' ),
				'default_value' => '',
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
	}
	
	add_action( 'vakker_eltd_options_map', 'vakker_eltd_search_options_map', 7 );
}