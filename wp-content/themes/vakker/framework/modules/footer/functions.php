<?php

if ( ! function_exists( 'vakker_eltd_register_footer_sidebar' ) ) {
	function vakker_eltd_register_footer_sidebar() {
		
		$show_footer_top    = vakker_eltd_options()->getOptionValue( 'show_footer_top' ) !== 'yes' ? false : true;
		$show_footer_bottom = vakker_eltd_options()->getOptionValue( 'show_footer_bottom' ) !== 'yes' ? false : true;
		
		if ( $show_footer_top ) {
			
			register_sidebar(
				array(
					'id'            => 'footer_top_column_1',
					'name'          => esc_html__( 'Footer Top Column 1', 'vakker' ),
					'description'   => esc_html__( 'Widgets added here will appear in the first column of top footer area', 'vakker' ),
					'before_widget' => '<div id="%1$s" class="widget eltd-footer-column-1 %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="eltd-widget-title-holder"><h4 class="eltd-widget-title">',
					'after_title'   => '</h4></div>'
				)
			);
			
			register_sidebar(
				array(
					'id'            => 'footer_top_column_2',
					'name'          => esc_html__( 'Footer Top Column 2', 'vakker' ),
					'description'   => esc_html__( 'Widgets added here will appear in the second column of top footer area', 'vakker' ),
					'before_widget' => '<div id="%1$s" class="widget eltd-footer-column-2 %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="eltd-widget-title-holder"><h4 class="eltd-widget-title">',
					'after_title'   => '</h4></div>'
				)
			);
			
			register_sidebar(
				array(
					'id'            => 'footer_top_column_3',
					'name'          => esc_html__( 'Footer Top Column 3', 'vakker' ),
					'description'   => esc_html__( 'Widgets added here will appear in the third column of top footer area', 'vakker' ),
					'before_widget' => '<div id="%1$s" class="widget eltd-footer-column-3 %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="eltd-widget-title-holder"><h4 class="eltd-widget-title">',
					'after_title'   => '</h4></div>'
				)
			);
			
			register_sidebar(
				array(
					'id'            => 'footer_top_column_4',
					'name'          => esc_html__( 'Footer Top Column 4', 'vakker' ),
					'description'   => esc_html__( 'Widgets added here will appear in the fourth column of top footer area', 'vakker' ),
					'before_widget' => '<div id="%1$s" class="widget eltd-footer-column-4 %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="eltd-widget-title-holder"><h4 class="eltd-widget-title">',
					'after_title'   => '</h4></div>'
				)
			);
		}
		
		if ( $show_footer_bottom ) {
			
			register_sidebar(
				array(
					'id'            => 'footer_bottom_column_1',
					'name'          => esc_html__( 'Footer Bottom Column 1', 'vakker' ),
					'description'   => esc_html__( 'Widgets added here will appear in the first column of bottom footer area', 'vakker' ),
					'before_widget' => '<div id="%1$s" class="widget eltd-footer-bottom-column-1 %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="eltd-widget-title-holder"><h4 class="eltd-widget-title">',
					'after_title'   => '</h4></div>'
				)
			);
			
			register_sidebar(
				array(
					'id'            => 'footer_bottom_column_2',
					'name'          => esc_html__( 'Footer Bottom Column 2', 'vakker' ),
					'description'   => esc_html__( 'Widgets added here will appear in the second column of bottom footer area', 'vakker' ),
					'before_widget' => '<div id="%1$s" class="widget eltd-footer-bottom-column-2 %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="eltd-widget-title-holder"><h4 class="eltd-widget-title">',
					'after_title'   => '</h4></div>'
				)
			);
			
			register_sidebar(
				array(
					'id'            => 'footer_bottom_column_3',
					'name'          => esc_html__( 'Footer Bottom Column 3', 'vakker' ),
					'description'   => esc_html__( 'Widgets added here will appear in the third column of bottom footer area', 'vakker' ),
					'before_widget' => '<div id="%1$s" class="widget eltd-footer-bottom-column-3 %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="eltd-widget-title-holder"><h4 class="eltd-widget-title">',
					'after_title'   => '</h4></div>'
				)
			);
		}
	}
	
	add_action( 'widgets_init', 'vakker_eltd_register_footer_sidebar' );
}

if ( ! function_exists( 'vakker_eltd_get_footer' ) ) {
	/**
	 * Loads footer HTML
	 */
	function vakker_eltd_get_footer() {
		$parameters          = array();
		$page_id             = vakker_eltd_get_page_id();
		$disable_footer_meta = get_post_meta( $page_id, 'eltd_disable_footer_meta', true );
		
		$parameters['display_footer']        = $disable_footer_meta === 'yes' ? false : true;
		$parameters['display_footer_top']    = vakker_eltd_show_footer_top();
		$parameters['display_footer_bottom'] = vakker_eltd_show_footer_bottom();
		
		vakker_eltd_get_module_template_part( 'templates/footer', 'footer', '', $parameters );
	}
	
	add_action( 'vakker_eltd_get_footer_template', 'vakker_eltd_get_footer' );
}

if ( ! function_exists( 'vakker_eltd_show_footer_top' ) ) {
	/**
	 * Check footer top showing
	 * Function check value from options and checks if footer columns are empty.
	 * return bool
	 */
	function vakker_eltd_show_footer_top() {
		$footer_top_flag = false;
		
		//check value from options and meta field on current page
		$option_flag = ( vakker_eltd_get_meta_field_intersect( 'show_footer_top' ) === 'yes' ) ? true : false;
		
		//check footer columns.If they are empty, disable footer top
		$columns_flag = false;
		for ( $i = 1; $i <= 4; $i ++ ) {
			$footer_columns_id = 'footer_top_column_' . $i;
			if ( is_active_sidebar( $footer_columns_id ) ) {
				$columns_flag = true;
				break;
			}
		}
		
		if ( $option_flag && $columns_flag ) {
			$footer_top_flag = true;
		}
		
		return $footer_top_flag;
	}
}

if ( ! function_exists( 'vakker_eltd_show_footer_bottom' ) ) {
	/**
	 * Check footer bottom showing
	 * Function check value from options and checks if footer columns are empty.
	 * return bool
	 */
	function vakker_eltd_show_footer_bottom() {
		$footer_bottom_flag = false;
		
		//check value from options and meta field on current page
		$option_flag = ( vakker_eltd_get_meta_field_intersect( 'show_footer_bottom' ) === 'yes' ) ? true : false;
		
		//check footer columns.If they are empty, disable footer bottom
		$columns_flag = false;
		for ( $i = 1; $i <= 3; $i ++ ) {
			$footer_columns_id = 'footer_bottom_column_' . $i;
			if ( is_active_sidebar( $footer_columns_id ) ) {
				$columns_flag = true;
				break;
			}
		}
		
		if ( $option_flag && $columns_flag ) {
			$footer_bottom_flag = true;
		}
		
		return $footer_bottom_flag;
	}
}

if ( ! function_exists( 'vakker_eltd_get_content_bottom_area' ) ) {
	/**
	 * Loads content bottom area HTML with all needed parameters
	 */
	function vakker_eltd_get_content_bottom_area() {
		$parameters = array();
		
		//Current page id
		$id = vakker_eltd_get_page_id();
		
		//is content bottom area enabled for current page?
		$parameters['content_bottom_area'] = vakker_eltd_get_meta_field_intersect( 'enable_content_bottom_area', $id );
		
		if ( $parameters['content_bottom_area'] === 'yes' ) {
			
			//Sidebar for content bottom area
			$parameters['content_bottom_area_sidebar'] = vakker_eltd_get_meta_field_intersect( 'content_bottom_sidebar_custom_display', $id );
			//Content bottom area in grid
			$parameters['grid_class'] = ( vakker_eltd_get_meta_field_intersect( 'content_bottom_in_grid', $id ) ) === 'yes' ? 'eltd-grid' : 'eltd-full-width';
			
			$parameters['content_bottom_style'] = array();
			
			//Content bottom area background color
			$background_color = vakker_eltd_get_meta_field_intersect( 'content_bottom_background_color', $id );
			if ( $background_color !== '' ) {
				$parameters['content_bottom_style'][] = 'background-color: ' . $background_color . ';';
			}
			
			if ( is_active_sidebar( $parameters['content_bottom_area_sidebar'] ) ) {
				vakker_eltd_get_module_template_part( 'templates/parts/content-bottom-area', 'footer', '', $parameters );
			}
		}
	}
}

if ( ! function_exists( 'vakker_eltd_get_footer_top' ) ) {
	/**
	 * Return footer top HTML
	 */
	function vakker_eltd_get_footer_top() {
		$parameters = array();
		
		//get number of top footer columns
		$parameters['footer_top_columns'] = vakker_eltd_options()->getOptionValue( 'footer_top_columns' );
		
		//get footer top grid/full width class
		$parameters['footer_top_grid_class'] = vakker_eltd_options()->getOptionValue( 'footer_in_grid' ) === 'yes' ? 'eltd-grid' : 'eltd-full-width';
		
		//get footer top other classes
		$footer_top_classes = array();
		
		//footer alignment
		$footer_top_alignment = vakker_eltd_options()->getOptionValue( 'footer_top_columns_alignment' );
		$footer_top_classes[] = ! empty( $footer_top_alignment ) ? 'eltd-footer-top-alignment-' . esc_attr( $footer_top_alignment ) : '';
		
		$footer_top_classes = apply_filters( 'vakker_eltd_footer_top_classes', $footer_top_classes );
		
		$parameters['footer_top_classes'] = implode( ' ', $footer_top_classes );
		
		vakker_eltd_get_module_template_part( 'templates/parts/footer-top', 'footer', '', $parameters );
	}
}

if ( ! function_exists( 'vakker_eltd_get_footer_bottom' ) ) {
	/**
	 * Return footer bottom HTML
	 */
	function vakker_eltd_get_footer_bottom() {
		$parameters = array();
		
		//get number of bottom footer columns
		$parameters['footer_bottom_columns'] = vakker_eltd_options()->getOptionValue( 'footer_bottom_columns' );
		
		//get footer top grid/full width class
		$parameters['footer_bottom_grid_class'] = vakker_eltd_options()->getOptionValue( 'footer_in_grid' ) === 'yes' ? 'eltd-grid' : 'eltd-full-width';
		
		//get footer top other classes
		$footer_bottom_classes = array();
		$footer_bottom_classes = apply_filters( 'vakker_eltd_footer_bottom_classes', $footer_bottom_classes );
		
		$parameters['footer_bottom_classes'] = implode( ' ', $footer_bottom_classes );
		
		vakker_eltd_get_module_template_part( 'templates/parts/footer-bottom', 'footer', '', $parameters );
	}
}