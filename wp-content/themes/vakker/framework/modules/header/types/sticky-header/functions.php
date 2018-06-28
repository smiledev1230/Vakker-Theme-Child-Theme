<?php

if ( ! function_exists( 'vakker_eltd_sticky_header_global_js_var' ) ) {
	function vakker_eltd_sticky_header_global_js_var( $global_variables ) {
		$global_variables['eltdStickyHeaderHeight']             = vakker_eltd_get_sticky_header_height();
		$global_variables['eltdStickyHeaderTransparencyHeight'] = vakker_eltd_get_sticky_header_height_of_complete_transparency();
		
		return $global_variables;
	}
	
	add_filter( 'vakker_eltd_js_global_variables', 'vakker_eltd_sticky_header_global_js_var' );
}

if ( ! function_exists( 'vakker_eltd_sticky_header_per_page_js_var' ) ) {
	function vakker_eltd_sticky_header_per_page_js_var( $perPageVars ) {
		$perPageVars['eltdStickyScrollAmount'] = vakker_eltd_get_sticky_scroll_amount();
		
		return $perPageVars;
	}
	
	add_filter( 'vakker_eltd_per_page_js_vars', 'vakker_eltd_sticky_header_per_page_js_var' );
}

if ( ! function_exists( 'vakker_eltd_register_sticky_header_areas' ) ) {
	/**
	 * Registers widget area for sticky header
	 */
	function vakker_eltd_register_sticky_header_areas() {
		register_sidebar(
			array(
				'id'            => 'eltd-sticky-right',
				'name'          => esc_html__( 'Sticky Header Widget Area', 'vakker' ),
				'description'   => esc_html__( 'Widgets added here will appear on the right hand side from the sticky menu', 'vakker' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s eltd-sticky-right">',
				'after_widget'  => '</div>'
			)
		);
	}
	
	add_action( 'widgets_init', 'vakker_eltd_register_sticky_header_areas' );
}

if ( ! function_exists( 'vakker_eltd_get_sticky_menu' ) ) {
	/**
	 * Loads sticky menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function vakker_eltd_get_sticky_menu( $additional_class = 'eltd-default-nav' ) {
		vakker_eltd_get_module_template_part( 'templates/sticky-navigation', 'header/types/sticky-header', '', array( 'additional_class' => $additional_class ) );
	}
}

if ( ! function_exists( 'vakker_eltd_get_sticky_header' ) ) {
	/**
	 * Loads sticky header behavior HTML
	 */
	function vakker_eltd_get_sticky_header( $slug = '', $module = '' ) {
        $page_id             = vakker_eltd_get_page_id();
		$sticky_in_grid      = vakker_eltd_options()->getOptionValue( 'sticky_header_in_grid' ) == 'yes' ? true : false;
		$header_in_grid_meta = get_post_meta( $page_id, 'eltd_menu_area_in_grid_meta', true);
		$hide_widget_area    = get_post_meta($page_id, 'eltd_disable_sticky_header_widget_menu_area_meta', true) == 'yes' ? true : false;
		
		if ( $header_in_grid_meta === 'yes' && ! $sticky_in_grid ) {
			$sticky_in_grid = true;
		} else if ( $header_in_grid_meta === 'no' && $sticky_in_grid ) {
			$sticky_in_grid = false;
		}
		
		$parameters = array(
			'hide_logo'             => vakker_eltd_options()->getOptionValue( 'hide_logo' ) == 'yes' ? true : false,
			'sticky_header_in_grid' => $sticky_in_grid,
			'hide_widget_area'      => $hide_widget_area,
            'menu_area_position'    => vakker_eltd_get_meta_field_intersect( 'set_menu_area_position', $page_id )

		);
		
		$module = ! empty( $module ) ? $module : 'header/types/sticky-header';
		
		vakker_eltd_get_module_template_part( 'templates/sticky-header', $module, $slug, $parameters );
	}
}

if ( ! function_exists( 'vakker_eltd_get_sticky_header_height' ) ) {
	/**
	 * Returns top sticky header height
	 *
	 * @return bool|int|void
	 */
	function vakker_eltd_get_sticky_header_height() {
		$allow_sticky_behavior = true;
		$allow_sticky_behavior = apply_filters( 'vakker_eltd_allow_sticky_header_behavior', $allow_sticky_behavior );
		$header_behaviour      = vakker_eltd_get_meta_field_intersect( 'header_behaviour' );
		
		//sticky menu height, needed only for sticky header on scroll up
		if ( $allow_sticky_behavior && in_array( $header_behaviour, array( 'sticky-header-on-scroll-up' ) ) ) {
			$sticky_header_height = vakker_eltd_filter_px( vakker_eltd_options()->getOptionValue( 'sticky_header_height' ) );
			
			return $sticky_header_height !== '' ? intval( $sticky_header_height ) : 90;
		} else {
			return 0;
		}
	}
}

if ( ! function_exists( 'vakker_eltd_get_sticky_header_height_of_complete_transparency' ) ) {
	/**
	 * Returns top sticky header height it is fully transparent. used in anchor logic
	 *
	 * @return bool|int|void
	 */
	function vakker_eltd_get_sticky_header_height_of_complete_transparency() {
		$allow_sticky_behavior = true;
		$allow_sticky_behavior = apply_filters( 'vakker_eltd_allow_sticky_header_behavior', $allow_sticky_behavior );
		
		if ( $allow_sticky_behavior ) {
			$stickyHeaderTransparent = vakker_eltd_options()->getOptionValue( 'sticky_header_background_color' ) !== '' && vakker_eltd_options()->getOptionValue( 'sticky_header_transparency' ) === '0';
			
			if ( $stickyHeaderTransparent ) {
				return 0;
			} else {
				$sticky_header_height = vakker_eltd_filter_px( vakker_eltd_options()->getOptionValue( 'sticky_header_height' ) );
				
				return $sticky_header_height !== '' ? intval( $sticky_header_height ) : 90;
			}
		} else {
			return 0;
		}
	}
}

if ( ! function_exists( 'vakker_eltd_get_sticky_scroll_amount' ) ) {
	/**
	 * Returns top sticky scroll amount
	 *
	 * @return bool|int|void
	 */
	function vakker_eltd_get_sticky_scroll_amount() {
		$allow_sticky_behavior = true;
		$allow_sticky_behavior = apply_filters( 'vakker_eltd_allow_sticky_header_behavior', $allow_sticky_behavior );
		$header_behaviour      = vakker_eltd_get_meta_field_intersect( 'header_behaviour' );
		
		//sticky menu scroll amount
		if ( $allow_sticky_behavior && in_array( $header_behaviour, array( 'sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up' ) ) ) {
			$sticky_scroll_amount = vakker_eltd_filter_px( vakker_eltd_get_meta_field_intersect( 'scroll_amount_for_sticky' ) );
			
			return $sticky_scroll_amount !== '' ? intval( $sticky_scroll_amount ) : 0;
		} else {
			return 0;
		}
	}
}

if ( ! function_exists( 'vakker_eltd_sticky_header_area_style' ) ) {
    /**
     * Function that return styles for header area
     */
    function vakker_eltd_sticky_header_area_style($style)
    {

        $page_id      = vakker_eltd_get_page_id();
        $class_prefix = vakker_eltd_get_unique_page_class( $page_id, true );

        $current_style = '';

        $menu_area_style              = array();
        $menu_area_enable_border      = vakker_eltd_get_meta_field_intersect('menu_area_border', $page_id);

        $menu_area_selector      = array( $class_prefix . ' .eltd-page-header .eltd-sticky-header' );

        if ( $menu_area_enable_border ) {
            $header_border_color = vakker_eltd_get_meta_field_intersect( 'menu_area_border_color', $page_id);

            if ( $header_border_color !== '' ) {
                $menu_area_style['border-bottom'] = '1px solid ' . $header_border_color;
            }
        }

        $current_style .= vakker_eltd_dynamic_css( $menu_area_selector, $menu_area_style );

        return $current_style . $style;
    }

    add_filter( 'vakker_eltd_add_page_custom_style', 'vakker_eltd_sticky_header_area_style' );
}