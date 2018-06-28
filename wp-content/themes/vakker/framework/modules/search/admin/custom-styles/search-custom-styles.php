<?php

if ( ! function_exists( 'vakker_eltd_search_opener_icon_size' ) ) {
	function vakker_eltd_search_opener_icon_size() {
		$icon_size = vakker_eltd_options()->getOptionValue( 'header_search_icon_size' );
		
		if ( ! empty( $icon_size ) ) {
			echo vakker_eltd_dynamic_css( '.eltd-search-opener', array(
				'font-size' => vakker_eltd_filter_px( $icon_size ) . 'px'
			) );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic', 'vakker_eltd_search_opener_icon_size' );
}

if ( ! function_exists( 'vakker_eltd_search_opener_icon_colors' ) ) {
	function vakker_eltd_search_opener_icon_colors() {
		$icon_color       = vakker_eltd_options()->getOptionValue( 'header_search_icon_color' );
		$icon_hover_color = vakker_eltd_options()->getOptionValue( 'header_search_icon_hover_color' );
		
		if ( ! empty( $icon_color ) ) {
			echo vakker_eltd_dynamic_css( '.eltd-search-opener', array(
				'color' => $icon_color
			) );
		}
		
		if ( ! empty( $icon_hover_color ) ) {
			echo vakker_eltd_dynamic_css( '.eltd-search-opener:hover', array(
				'color' => $icon_hover_color
			) );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic', 'vakker_eltd_search_opener_icon_colors' );
}

if ( ! function_exists( 'vakker_eltd_search_opener_text_styles' ) ) {
	function vakker_eltd_search_opener_text_styles() {
		$item_styles = vakker_eltd_get_typography_styles( 'search_icon_text' );
		
		$item_selector = array(
			'.eltd-search-icon-text'
		);
		
		echo vakker_eltd_dynamic_css( $item_selector, $item_styles );
		
		$text_hover_color = vakker_eltd_options()->getOptionValue( 'search_icon_text_color_hover' );
		
		if ( ! empty( $text_hover_color ) ) {
			echo vakker_eltd_dynamic_css( '.eltd-search-opener:hover .eltd-search-icon-text', array(
				'color' => $text_hover_color
			) );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic', 'vakker_eltd_search_opener_text_styles' );
}