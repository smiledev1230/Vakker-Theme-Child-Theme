<?php

if ( ! function_exists( 'vakker_eltd_footer_top_general_styles' ) ) {
	/**
	 * Generates general custom styles for footer top area
	 */
	function vakker_eltd_footer_top_general_styles() {
		$item_styles      = array();
		$background_color = vakker_eltd_options()->getOptionValue( 'footer_top_background_color' );
		
		if ( ! empty( $background_color ) ) {
			$item_styles['background-color'] = $background_color;
		}
		
		echo vakker_eltd_dynamic_css( '.eltd-page-footer .eltd-footer-top-holder', $item_styles );
	}
	
	add_action( 'vakker_eltd_style_dynamic', 'vakker_eltd_footer_top_general_styles' );
}

if ( ! function_exists( 'vakker_eltd_footer_bottom_general_styles' ) ) {
	/**
	 * Generates general custom styles for footer bottom area
	 */
	function vakker_eltd_footer_bottom_general_styles() {
		$item_styles      = array();
		$background_color = vakker_eltd_options()->getOptionValue( 'footer_bottom_background_color' );
		
		if ( ! empty( $background_color ) ) {
			$item_styles['background-color'] = $background_color;
		}
		
		echo vakker_eltd_dynamic_css( '.eltd-page-footer .eltd-footer-bottom-holder', $item_styles );
	}
	
	add_action( 'vakker_eltd_style_dynamic', 'vakker_eltd_footer_bottom_general_styles' );
}