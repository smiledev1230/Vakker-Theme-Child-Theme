<?php

if ( ! function_exists( 'vakker_eltd_set_header_top_enabled_class' ) ) {
    function vakker_eltd_set_header_top_enabled_class( $classes ) {

        if ( vakker_eltd_is_top_bar_enabled() ) {
            $classes[] = 'eltd-header-top-enabled';
        }

        return $classes;
    }

    add_filter( 'body_class', 'vakker_eltd_set_header_top_enabled_class' );
}

if ( ! function_exists( 'vakker_eltd_top_header_global_js_var' ) ) {
	function vakker_eltd_top_header_global_js_var( $global_variables ) {
		$global_variables['eltdTopBarHeight'] = vakker_eltd_get_top_bar_height();
		
		return $global_variables;
	}
	
	add_filter( 'vakker_eltd_js_global_variables', 'vakker_eltd_top_header_global_js_var' );
}

if ( ! function_exists( 'vakker_eltd_get_header_top' ) ) {
	/**
	 * Loads header top HTML and sets parameters for it
	 */
	function vakker_eltd_get_header_top() {
		$params = array(
			'show_header_top'                => vakker_eltd_is_top_bar_enabled(),
			'show_header_top_background_div' => vakker_eltd_get_meta_field_intersect( 'header_type' ) == 'header-box' ? true : false,
			'top_bar_in_grid'                => vakker_eltd_get_meta_field_intersect( 'top_bar_in_grid' ) == 'yes' ? true : false,
		);
		
		$params = apply_filters( 'vakker_eltd_header_top_params', $params );
		
		vakker_eltd_get_module_template_part( 'templates/top-header', 'header/types/top-header', '', $params );
	}
	
	add_action( 'vakker_eltd_before_page_header', 'vakker_eltd_get_header_top' );
}

if ( ! function_exists( 'vakker_eltd_is_top_bar_enabled' ) ) {
	/**
	 * Returns is top header area enabled
	 *
	 * @return bool
	 */
	function vakker_eltd_is_top_bar_enabled() {
		$top_bar_enabled = vakker_eltd_get_meta_field_intersect( 'top_bar' ) === 'yes' ? true : false;
		
		if ( is_404() ) {
			$top_bar_enabled = false;
		}
		
		return apply_filters( 'vakker_eltd_enabled_top_bar', $top_bar_enabled );
	}
}

if ( ! function_exists( 'vakker_eltd_get_top_bar_height' ) ) {
	/**
	 * Returns top header area height
	 *
	 * @return bool|int|void
	 */
	function vakker_eltd_get_top_bar_height() {
		if ( vakker_eltd_is_top_bar_enabled() ) {
			$top_bar_height_meta = vakker_eltd_filter_px( vakker_eltd_options()->getOptionValue( 'top_bar_height' ) );
			$top_bar_height      = ! empty( $top_bar_height_meta ) ? $top_bar_height_meta : 50;
			
			return $top_bar_height;
		} else {
			return 0;
		}
	}
}

if ( ! function_exists( 'vakker_eltd_get_top_bar_background_height' ) ) {
	/**
	 * Returns top header area background height
	 *
	 * @return bool|int|void
	 */
	function vakker_eltd_get_top_bar_background_height() {
		$top_bar_height_meta = vakker_eltd_filter_px( vakker_eltd_options()->getOptionValue( 'top_bar_height' ) );
		$header_height_meta  = vakker_eltd_filter_px( vakker_eltd_options()->getOptionValue( 'menu_area_height' ) );
		
		$top_bar_height = ! empty( $top_bar_height_meta ) ? $top_bar_height_meta : 50;
		$header_height  = ! empty( $header_height_meta ) ? $header_height_meta : 110;
		
		$top_bar_background_height = round( $top_bar_height ) + round( $header_height / 2 );
		
		return $top_bar_background_height;
	}
}

if ( ! function_exists( 'vakker_eltd_is_top_bar_transparent' ) ) {
	/**
	 * Checks if top header area is transparent or not
	 *
	 * @return bool
	 */
	function vakker_eltd_is_top_bar_transparent() {
		$top_bar_enabled      = vakker_eltd_is_top_bar_enabled();
		$top_bar_bg_color     = vakker_eltd_options()->getOptionValue( 'top_bar_background_color' );
		$top_bar_transparency = vakker_eltd_options()->getOptionValue( 'top_bar_background_transparency' );
		
		if ( $top_bar_enabled && $top_bar_bg_color !== '' && $top_bar_transparency !== '' ) {
			return $top_bar_transparency >= 0 && $top_bar_transparency < 1;
		} else {
			return false;
		}
	}
}

if ( ! function_exists( 'vakker_eltd_is_top_bar_completely_transparent' ) ) {
	/**
	 * Checks is top header area completely transparent
	 *
	 * @return bool
	 */
	function vakker_eltd_is_top_bar_completely_transparent() {
		$top_bar_enabled      = vakker_eltd_is_top_bar_enabled();
		$top_bar_bg_color     = vakker_eltd_options()->getOptionValue( 'top_bar_background_color' );
		$top_bar_transparency = vakker_eltd_options()->getOptionValue( 'top_bar_background_transparency' );
		
		if ( $top_bar_enabled && $top_bar_bg_color !== '' && $top_bar_transparency !== '' ) {
			return $top_bar_transparency === '0';
		} else {
			return false;
		}
	}
}

if ( ! function_exists( 'vakker_eltd_register_top_header_areas' ) ) {
	/**
	 * Registers widget areas for top header bar when it is enabled
	 */
	function vakker_eltd_register_top_header_areas() {
		register_sidebar(
			array(
				'id'            => 'eltd-top-bar-left',
				'name'          => esc_html__( 'Header Top Bar Left Column', 'vakker' ),
				'description'   => esc_html__( 'Widgets added here will appear on the left side in top bar header', 'vakker' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s eltd-top-bar-widget">',
				'after_widget'  => '</div>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'eltd-top-bar-right',
				'name'          => esc_html__( 'Header Top Bar Right Column', 'vakker' ),
				'description'   => esc_html__( 'Widgets added here will appear on the right side in top bar header', 'vakker' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s eltd-top-bar-widget">',
				'after_widget'  => '</div>'
			)
		);
	}
	
	add_action( 'widgets_init', 'vakker_eltd_register_top_header_areas' );
}

if ( ! function_exists( 'vakker_eltd_top_bar_grid_class' ) ) {
	/**
	 * @param $classes
	 *
	 * @return array
	 */
	function vakker_eltd_top_bar_grid_class( $classes ) {
		if ( vakker_eltd_get_meta_field_intersect( 'top_bar_in_grid', vakker_eltd_get_page_id() ) == 'yes' &&
		     vakker_eltd_options()->getOptionValue( 'top_bar_grid_background_color' ) !== '' &&
		     vakker_eltd_options()->getOptionValue( 'top_bar_grid_background_transparency' ) !== '0'
		) {
			$classes[] = 'eltd-top-bar-in-grid-padding';
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'vakker_eltd_top_bar_grid_class' );
}

if ( ! function_exists( 'vakker_eltd_get_top_bar_styles' ) ) {
	/**
	 * Sets per page styles for header top bar
	 *
	 * @param $styles
	 *
	 * @return array
	 */
	function vakker_eltd_get_top_bar_styles( $styles ) {
		$page_id      = vakker_eltd_get_page_id();
		$class_prefix = vakker_eltd_get_unique_page_class( $page_id, true );
		
		$top_bar_style = array();
		
		$top_bar_bg_color     = get_post_meta( $page_id, 'eltd_top_bar_background_color_meta', true );
		$top_bar_border       = get_post_meta( $page_id, 'eltd_top_bar_border_meta', true );
		$top_bar_border_color = get_post_meta( $page_id, 'eltd_top_bar_border_color_meta', true );
		
		$current_style = '';
		
		$top_bar_selector = array(
			$class_prefix . ' .eltd-top-bar'
		);
		
		if ( $top_bar_bg_color !== '' ) {
			$top_bar_transparency = get_post_meta( $page_id, 'eltd_top_bar_background_transparency_meta', true );
			if ( $top_bar_transparency === '' ) {
				$top_bar_transparency = 1;
			}
			$top_bar_style['background-color'] = vakker_eltd_rgba_color( $top_bar_bg_color, $top_bar_transparency );
		}
		
		if ( $top_bar_border == 'yes' ) {
			$top_bar_style['border-bottom'] = '1px solid ' . $top_bar_border_color;
		} elseif ( $top_bar_border == 'no' ) {
			$top_bar_style['border-bottom'] = '0';
		}
		
		$current_style .= vakker_eltd_dynamic_css( $top_bar_selector, $top_bar_style );
		
		$current_style = $current_style . $styles;
		
		return $current_style;
	}
	
	add_filter( 'vakker_eltd_add_page_custom_style', 'vakker_eltd_get_top_bar_styles' );
}