<?php

if ( ! function_exists( 'vakker_eltd_side_area_slide_from_right_type_style' ) ) {
	function vakker_eltd_side_area_slide_from_right_type_style() {
		$width = vakker_eltd_options()->getOptionValue( 'side_area_width' );
		
		if ( $width !== '' ) {
			echo vakker_eltd_dynamic_css( '.eltd-side-menu-slide-from-right .eltd-side-menu', array(
				'right' => '-' . vakker_eltd_filter_px( $width ) . 'px',
				'width' => vakker_eltd_filter_px( $width ) . 'px'
			) );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic', 'vakker_eltd_side_area_slide_from_right_type_style' );
}

if ( ! function_exists( 'vakker_eltd_side_area_icon_color_styles' ) ) {
	function vakker_eltd_side_area_icon_color_styles() {
		$icon_color             = vakker_eltd_options()->getOptionValue( 'side_area_icon_color' );
		$icon_hover_color       = vakker_eltd_options()->getOptionValue( 'side_area_icon_hover_color' );
		$close_icon_color       = vakker_eltd_options()->getOptionValue( 'side_area_close_icon_color' );
		$close_icon_hover_color = vakker_eltd_options()->getOptionValue( 'side_area_close_icon_hover_color' );
		
		$icon_hover_selector = array(
			'.eltd-side-menu-button-opener:hover',
			'.eltd-side-menu-button-opener.opened'
		);
		
		if ( ! empty( $icon_color ) ) {
			echo vakker_eltd_dynamic_css( '.eltd-side-menu-button-opener', array(
				'color' => $icon_color
			) );
		}
		
		if ( ! empty( $icon_hover_color ) ) {
			echo vakker_eltd_dynamic_css( $icon_hover_selector, array(
				'color' => $icon_hover_color . '!important'
			) );
		}
		
		if ( ! empty( $close_icon_color ) ) {
			echo vakker_eltd_dynamic_css( '.eltd-side-menu a.eltd-close-side-menu', array(
				'color' => $close_icon_color
			) );
		}
		
		if ( ! empty( $close_icon_hover_color ) ) {
			echo vakker_eltd_dynamic_css( '.eltd-side-menu a.eltd-close-side-menu:hover', array(
				'color' => $close_icon_hover_color
			) );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic', 'vakker_eltd_side_area_icon_color_styles' );
}

if ( ! function_exists( 'vakker_eltd_side_area_styles' ) ) {
	function vakker_eltd_side_area_styles() {
		$side_area_styles = array();
		$background_color = vakker_eltd_options()->getOptionValue( 'side_area_background_color' );
		$padding          = vakker_eltd_options()->getOptionValue( 'side_area_padding' );
		$text_alignment   = vakker_eltd_options()->getOptionValue( 'side_area_aligment' );
		
		if ( ! empty( $background_color ) ) {
			$side_area_styles['background-color'] = $background_color;
		}
		
		if ( ! empty( $padding ) ) {
			$side_area_styles['padding'] = esc_attr( $padding );
		}
		
		if ( ! empty( $text_alignment ) ) {
			$side_area_styles['text-align'] = $text_alignment;
		}
		
		if ( ! empty( $side_area_styles ) ) {
			echo vakker_eltd_dynamic_css( '.eltd-side-menu', $side_area_styles );
		}
		
		if ( $text_alignment === 'center' ) {
			echo vakker_eltd_dynamic_css( '.eltd-side-menu .widget img', array(
				'margin' => '0 auto'
			) );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic', 'vakker_eltd_side_area_styles' );
}