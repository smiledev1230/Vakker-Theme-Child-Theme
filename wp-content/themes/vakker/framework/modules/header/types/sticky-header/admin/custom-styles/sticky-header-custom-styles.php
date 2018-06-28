<?php

if ( ! function_exists( 'vakker_eltd_sticky_header_styles' ) ) {
	/**
	 * Generates styles for sticky haeder
	 */
	function vakker_eltd_sticky_header_styles() {
		$background_color        = vakker_eltd_options()->getOptionValue( 'sticky_header_background_color' );
		$background_transparency = vakker_eltd_options()->getOptionValue( 'sticky_header_transparency' );
		$border_color            = vakker_eltd_options()->getOptionValue( 'sticky_header_border_color' );
		$header_height           = vakker_eltd_options()->getOptionValue( 'sticky_header_height' );
		
		if ( ! empty( $background_color ) ) {
			$header_background_color              = $background_color;
			$header_background_color_transparency = 1;
			
			if ( $background_transparency !== '' ) {
				$header_background_color_transparency = $background_transparency;
			}
			
			echo vakker_eltd_dynamic_css( '.eltd-page-header .eltd-sticky-header .eltd-sticky-holder', array( 'background-color' => vakker_eltd_rgba_color( $header_background_color, $header_background_color_transparency ) ) );
		}
		
		if ( ! empty( $border_color ) ) {
			echo vakker_eltd_dynamic_css( '.eltd-page-header .eltd-sticky-header .eltd-sticky-holder', array( 'border-color' => $border_color ) );
		}
		
		if ( ! empty( $header_height ) ) {
			$height = vakker_eltd_filter_px( $header_height ) . 'px';
			
			echo vakker_eltd_dynamic_css( '.eltd-page-header .eltd-sticky-header', array( 'height' => $height ) );
			echo vakker_eltd_dynamic_css( '.eltd-page-header .eltd-sticky-header .eltd-logo-wrapper a', array( 'max-height' => $height ) );
		}
		
		// sticky menu style
		
		$menu_item_styles = vakker_eltd_get_typography_styles( 'sticky' );
		
		$menu_item_selector = array(
			'.eltd-main-menu.eltd-sticky-nav > ul > li > a'
		);
		
		echo vakker_eltd_dynamic_css( $menu_item_selector, $menu_item_styles );
		
		
		$hover_color = vakker_eltd_options()->getOptionValue( 'sticky_hovercolor' );
		
		$menu_item_hover_styles = array();
		if ( ! empty( $hover_color ) ) {
			$menu_item_hover_styles['color'] = $hover_color;
		}
		
		$menu_item_hover_selector = array(
			'.eltd-main-menu.eltd-sticky-nav > ul > li:hover > a',
			'.eltd-main-menu.eltd-sticky-nav > ul > li.eltd-active-item > a'
		);
		
		echo vakker_eltd_dynamic_css( $menu_item_hover_selector, $menu_item_hover_styles );
	}
	
	add_action( 'vakker_eltd_style_dynamic', 'vakker_eltd_sticky_header_styles' );
}