<?php

if ( ! function_exists( 'vakker_eltd_fixed_header_styles' ) ) {
	/**
	 * Generates styles for fixed haeder
	 */
	function vakker_eltd_fixed_header_styles() {
		$background_color        = vakker_eltd_options()->getOptionValue( 'fixed_header_background_color' );
		$background_transparency = vakker_eltd_options()->getOptionValue( 'fixed_header_transparency' );
		$border_color            = vakker_eltd_options()->getOptionValue( 'fixed_header_border_bottom_color' );
		
		$fixed_area_styles = array();
		if ( ! empty( $background_color ) ) {
			$fixed_header_background_color              = $background_color;
			$fixed_header_background_color_transparency = 1;
			
			if ( $background_transparency !== '' ) {
				$fixed_header_background_color_transparency = $background_transparency;
			}
			
			$fixed_area_styles['background-color'] = vakker_eltd_rgba_color( $fixed_header_background_color, $fixed_header_background_color_transparency ) . '!important';
		}
		
		if ( empty( $background_color ) && $background_transparency !== '' ) {
			$fixed_header_background_color              = '#fff';
			$fixed_header_background_color_transparency = $background_transparency;
			
			$fixed_area_styles['background-color'] = vakker_eltd_rgba_color( $fixed_header_background_color, $fixed_header_background_color_transparency ) . '!important';
		}
		
		$selector = array(
			'.eltd-page-header .eltd-fixed-wrapper.fixed .eltd-menu-area'
		);
		
		echo vakker_eltd_dynamic_css( $selector, $fixed_area_styles );
		
		$fixed_area_holder_styles = array();
		
		if ( ! empty( $border_color ) ) {
			$fixed_area_holder_styles['border-bottom-color'] = $border_color;
		}
		
		$selector_holder = array(
			'.eltd-page-header .eltd-fixed-wrapper.fixed'
		);
		
		echo vakker_eltd_dynamic_css( $selector_holder, $fixed_area_holder_styles );
		
		// fixed menu style
		
		$menu_item_styles = vakker_eltd_get_typography_styles( 'fixed' );
		
		$menu_item_selector = array(
			'.eltd-fixed-wrapper.fixed .eltd-main-menu > ul > li > a'
		);
		
		echo vakker_eltd_dynamic_css( $menu_item_selector, $menu_item_styles );
		
		
		$hover_color = vakker_eltd_options()->getOptionValue( 'fixed_hovercolor' );
		
		$menu_item_hover_styles = array();
		if ( ! empty( $hover_color ) ) {
			$menu_item_hover_styles['color'] = $hover_color;
		}
		
		$menu_item_hover_selector = array(
			'.eltd-fixed-wrapper.fixed .eltd-main-menu > ul > li:hover > a',
			'.eltd-fixed-wrapper.fixed .eltd-main-menu > ul > li.eltd-active-item > a'
		);
		
		echo vakker_eltd_dynamic_css( $menu_item_hover_selector, $menu_item_hover_styles );
	}
	
	add_action( 'vakker_eltd_style_dynamic', 'vakker_eltd_fixed_header_styles' );
}