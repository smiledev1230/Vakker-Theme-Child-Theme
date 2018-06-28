<?php

if ( ! function_exists( 'vakker_eltd_vertical_sliding_menu_styles' ) ) {
	function vakker_eltd_vertical_sliding_menu_styles() {
		$vertical_header_styles = array();
		
		$vertical_header_selectors = array(
			'.eltd-header-vertical-sliding .eltd-vertical-menu-area .eltd-vertical-area-background'
		);
		
		$vertical_background_color = vakker_eltd_options()->getOptionValue( 'vertical_header_background_color' );
		$vertical_background_image = vakker_eltd_options()->getOptionValue( 'vertical_header_background_image' );
		$vertical_shadow_enabled   = vakker_eltd_options()->getOptionValue( 'vertical_header_shadow' );
		$vertical_border_enabled   = vakker_eltd_options()->getOptionValue( 'vertical_header_border' );
		
		if ( ! empty( $vertical_background_color ) ) {
			$vertical_header_styles['background-color'] = $vertical_background_color;
		}
		
		if ( ! empty( $vertical_background_image ) ) {
			$vertical_header_styles['background-image'] = 'url(' . esc_url( $vertical_background_image ) . ')';
		}
		
		if ( $vertical_shadow_enabled === 'yes' ) {
			$vertical_header_styles['box-shadow'] = '1px 0 3px rgba(0, 0, 0, 0.05)';
		}
		
		if ( $vertical_border_enabled === 'yes' ) {
			$header_border_color = vakker_eltd_options()->getOptionValue( 'vertical_header_border_color' );
			
			if ( ! empty( $header_border_color ) ) {
				$vertical_header_styles['border-right'] = '1px solid ' . $header_border_color;
			}
		}
		
		echo vakker_eltd_dynamic_css( $vertical_header_selectors, $vertical_header_styles );
	}
	
	add_action( 'vakker_eltd_style_dynamic', 'vakker_eltd_vertical_sliding_menu_styles' );
}

if ( ! function_exists( 'vakker_eltd_vertical_sliding_main_menu_styles' ) ) {
	/**
	 * Generates styles for vertical main main menu
	 */
	function vakker_eltd_vertical_sliding_main_menu_styles() {
		$logo_section_styles = array();
		$widget_section_styles = array();

		$menu_top_margin    = vakker_eltd_options()->getOptionValue( 'vertical_menu_top_margin' );
		$menu_bottom_margin = vakker_eltd_options()->getOptionValue( 'vertical_menu_bottom_margin' );
		
		if ( ! empty( $menu_top_margin ) ) {
            $logo_section_styles['padding-top'] = vakker_eltd_filter_px( $menu_top_margin ) . 'px';
		}
		if ( ! empty( $menu_bottom_margin ) ) {
            $widget_section_styles['bottom'] = vakker_eltd_filter_px( $menu_bottom_margin ) . 'px';
		}

        $logo_section_selector = array(
			'.eltd-header-vertical-sliding .eltd-logo-wrapper'
		);
        $widget_section_selector = array(
            '.eltd-header-vertical-sliding .eltd-vertical-area-widget-holder'
        );
		
		echo vakker_eltd_dynamic_css( $logo_section_selector, $logo_section_styles );
		echo vakker_eltd_dynamic_css( $widget_section_selector, $widget_section_styles );

		// vertical menu 1st level style
		
		$first_level_styles = vakker_eltd_get_typography_styles( 'vertical_menu_1st' );
		
		$first_level_selector = array(
                '.eltd-header-vertical-sliding nav.eltd-fullscreen-menu > ul > li > a'
		);
		
		echo vakker_eltd_dynamic_css( $first_level_selector, $first_level_styles );
		
		$first_level_hover_styles = array();
		
		$first_level_hover_color = vakker_eltd_options()->getOptionValue( 'vertical_menu_1st_hover_color' );
		if ( ! empty( $first_level_hover_color ) ) {
			$first_level_hover_styles['color'] = $first_level_hover_color;
		}
		
		$first_level_hover_selector = array(
			'.eltd-header-vertical-sliding nav.eltd-fullscreen-menu > ul > li > a:hover',
			'.eltd-header-vertical-sliding nav.eltd-fullscreen-menu > ul > li > a.eltd-active-item',
			'.eltd-header-vertical-sliding nav.eltd-fullscreen-menu > ul > li > a.current-menu-ancestor'
		);
		
		echo vakker_eltd_dynamic_css( $first_level_hover_selector, $first_level_hover_styles );
		
		// vertical menu 2nd level style
		
		$second_level_styles = vakker_eltd_get_typography_styles( 'vertical_menu_2nd' );
		
		$second_level_selector = array(
			'.eltd-header-vertical-sliding nav.eltd-fullscreen-menu ul li ul li a'
		);
		
		echo vakker_eltd_dynamic_css( $second_level_selector, $second_level_styles );
		
		$second_level_hover_styles = array();
		
		$second_level_hover_color = vakker_eltd_options()->getOptionValue( 'vertical_menu_2nd_hover_color' );
		if ( ! empty( $second_level_hover_color ) ) {
			$second_level_hover_styles['color'] = $second_level_hover_color;
		}
		
		$second_level_hover_selector = array(
            '.eltd-header-vertical-sliding nav.eltd-fullscreen-menu ul li ul li a:hover',
            '.eltd-header-vertical-sliding nav.eltd-fullscreen-menu ul li ul li.current-menu-ancestor > a',
            '.eltd-header-vertical-sliding nav.eltd-fullscreen-menu ul li ul li.current-menu-item > a'
		);
		
		echo vakker_eltd_dynamic_css( $second_level_hover_selector, $second_level_hover_styles );
		
		// vertical menu 3rd level style
		
		$third_level_styles = vakker_eltd_get_typography_styles( 'vertical_menu_3rd' );
		
		$third_level_selector = array(
			'.eltd-header-vertical-sliding nav.eltd-fullscreen-menu ul li ul li ul li a'
		);
		
		echo vakker_eltd_dynamic_css( $third_level_selector, $third_level_styles );
		
		
		$third_level_hover_styles = array();
		
		$third_level_hover_color = vakker_eltd_options()->getOptionValue( 'vertical_menu_3rd_hover_color' );
		if ( ! empty( $third_level_hover_color ) ) {
			$third_level_hover_styles['color'] = $third_level_hover_color;
		}
		
		$third_level_hover_selector = array(
            '.eltd-header-vertical-sliding nav.eltd-fullscreen-menu ul li ul li ul li a:hover',
            '.eltd-header-vertical-sliding nav.eltd-fullscreen-menu ul li ul li ul li.current-menu-ancestor > a',
            '.eltd-header-vertical-sliding nav.eltd-fullscreen-menu ul li ul li ul li.current-menu-item > a'
		);
		
		echo vakker_eltd_dynamic_css( $third_level_hover_selector, $third_level_hover_styles );
	}
	
	add_action( 'vakker_eltd_style_dynamic', 'vakker_eltd_vertical_sliding_main_menu_styles' );
}