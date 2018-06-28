<?php

if ( ! function_exists( 'vakker_eltd_breadcrumbs_title_area_typography_style' ) ) {
	function vakker_eltd_breadcrumbs_title_area_typography_style() {
		
		$item_styles = vakker_eltd_get_typography_styles( 'page_breadcrumb' );
		
		$item_selector = array(
			'.eltd-title-holder .eltd-title-wrapper .eltd-breadcrumbs'
		);
		
		echo vakker_eltd_dynamic_css( $item_selector, $item_styles );
		
		
		$breadcrumb_hover_color = vakker_eltd_options()->getOptionValue( 'page_breadcrumb_hovercolor' );
		
		$breadcrumb_hover_styles = array();
		if ( ! empty( $breadcrumb_hover_color ) ) {
			$breadcrumb_hover_styles['color'] = $breadcrumb_hover_color;
		}
		
		$breadcrumb_hover_selector = array(
			'.eltd-title-holder .eltd-title-wrapper .eltd-breadcrumbs a:hover'
		);
		
		echo vakker_eltd_dynamic_css( $breadcrumb_hover_selector, $breadcrumb_hover_styles );
	}
	
	add_action( 'vakker_eltd_style_dynamic', 'vakker_eltd_breadcrumbs_title_area_typography_style' );
}