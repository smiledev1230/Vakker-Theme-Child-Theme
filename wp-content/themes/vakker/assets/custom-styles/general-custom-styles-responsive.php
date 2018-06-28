<?php

if ( ! function_exists( 'vakker_eltd_content_responsive_styles' ) ) {
	/**
	 * Generates content responsive custom styles
	 */
	function vakker_eltd_content_responsive_styles() {
		$content_style = array();
		
		$padding_top_mobile = vakker_eltd_options()->getOptionValue( 'content_top_padding_mobile' );
		if ( $padding_top_mobile !== '' ) {
			$content_style['padding-top'] = vakker_eltd_filter_px( $padding_top_mobile ) . 'px!important';
		}
		
		$content_selector = array(
			'.eltd-content .eltd-content-inner > .eltd-container > .eltd-container-inner',
			'.eltd-content .eltd-content-inner > .eltd-full-width > .eltd-full-width-inner',
		);
		
		echo vakker_eltd_dynamic_css( $content_selector, $content_style );
	}
	
	add_action( 'vakker_eltd_style_dynamic_responsive_1024', 'vakker_eltd_content_responsive_styles' );
}

if ( ! function_exists( 'vakker_eltd_h1_responsive_styles3' ) ) {
	function vakker_eltd_h1_responsive_styles3() {
		$selector = array(
			'h1'
		);
		
		$styles = vakker_eltd_get_responsive_typography_styles( 'h1_responsive', '_3' );
		
		if ( ! empty( $styles ) ) {
			echo vakker_eltd_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic_responsive_768_1024', 'vakker_eltd_h1_responsive_styles3' );
}

if ( ! function_exists( 'vakker_eltd_h2_responsive_styles3' ) ) {
	function vakker_eltd_h2_responsive_styles3() {
		$selector = array(
			'h2'
		);
		
		$styles = vakker_eltd_get_responsive_typography_styles( 'h2_responsive', '_3' );
		
		if ( ! empty( $styles ) ) {
			echo vakker_eltd_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic_responsive_768_1024', 'vakker_eltd_h2_responsive_styles3' );
}

if ( ! function_exists( 'vakker_eltd_h3_responsive_styles3' ) ) {
	function vakker_eltd_h3_responsive_styles3() {
		$selector = array(
			'h3'
		);
		
		$styles = vakker_eltd_get_responsive_typography_styles( 'h3_responsive', '_3' );
		
		if ( ! empty( $styles ) ) {
			echo vakker_eltd_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic_responsive_768_1024', 'vakker_eltd_h3_responsive_styles3' );
}

if ( ! function_exists( 'vakker_eltd_h4_responsive_styles3' ) ) {
	function vakker_eltd_h4_responsive_styles3() {
		$selector = array(
			'h4'
		);
		
		$styles = vakker_eltd_get_responsive_typography_styles( 'h4_responsive', '_3' );
		
		if ( ! empty( $styles ) ) {
			echo vakker_eltd_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic_responsive_768_1024', 'vakker_eltd_h4_responsive_styles3' );
}

if ( ! function_exists( 'vakker_eltd_h5_responsive_styles3' ) ) {
	function vakker_eltd_h5_responsive_styles3() {
		$selector = array(
			'h5'
		);
		
		$styles = vakker_eltd_get_responsive_typography_styles( 'h5_responsive', '_3' );
		
		if ( ! empty( $styles ) ) {
			echo vakker_eltd_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic_responsive_768_1024', 'vakker_eltd_h5_responsive_styles3' );
}

if ( ! function_exists( 'vakker_eltd_h6_responsive_styles3' ) ) {
	function vakker_eltd_h6_responsive_styles3() {
		$selector = array(
			'h6'
		);
		
		$styles = vakker_eltd_get_responsive_typography_styles( 'h6_responsive', '_3' );
		
		if ( ! empty( $styles ) ) {
			echo vakker_eltd_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic_responsive_768_1024', 'vakker_eltd_h6_responsive_styles3' );
}

if ( ! function_exists( 'vakker_eltd_h1_responsive_styles' ) ) {
	function vakker_eltd_h1_responsive_styles() {
		$selector = array(
			'h1'
		);
		
		$styles = vakker_eltd_get_responsive_typography_styles( 'h1_responsive' );
		
		if ( ! empty( $styles ) ) {
			echo vakker_eltd_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic_responsive_680_768', 'vakker_eltd_h1_responsive_styles' );
}

if ( ! function_exists( 'vakker_eltd_h2_responsive_styles' ) ) {
	function vakker_eltd_h2_responsive_styles() {
		$selector = array(
			'h2'
		);
		
		$styles = vakker_eltd_get_responsive_typography_styles( 'h2_responsive' );
		
		if ( ! empty( $styles ) ) {
			echo vakker_eltd_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic_responsive_680_768', 'vakker_eltd_h2_responsive_styles' );
}

if ( ! function_exists( 'vakker_eltd_h3_responsive_styles' ) ) {
	function vakker_eltd_h3_responsive_styles() {
		$selector = array(
			'h3'
		);
		
		$styles = vakker_eltd_get_responsive_typography_styles( 'h3_responsive' );
		
		if ( ! empty( $styles ) ) {
			echo vakker_eltd_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic_responsive_680_768', 'vakker_eltd_h3_responsive_styles' );
}

if ( ! function_exists( 'vakker_eltd_h4_responsive_styles' ) ) {
	function vakker_eltd_h4_responsive_styles() {
		$selector = array(
			'h4'
		);
		
		$styles = vakker_eltd_get_responsive_typography_styles( 'h4_responsive' );
		
		if ( ! empty( $styles ) ) {
			echo vakker_eltd_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic_responsive_680_768', 'vakker_eltd_h4_responsive_styles' );
}

if ( ! function_exists( 'vakker_eltd_h5_responsive_styles' ) ) {
	function vakker_eltd_h5_responsive_styles() {
		$selector = array(
			'h5'
		);
		
		$styles = vakker_eltd_get_responsive_typography_styles( 'h5_responsive' );
		
		if ( ! empty( $styles ) ) {
			echo vakker_eltd_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic_responsive_680_768', 'vakker_eltd_h5_responsive_styles' );
}

if ( ! function_exists( 'vakker_eltd_h6_responsive_styles' ) ) {
	function vakker_eltd_h6_responsive_styles() {
		$selector = array(
			'h6'
		);
		
		$styles = vakker_eltd_get_responsive_typography_styles( 'h6_responsive' );
		
		if ( ! empty( $styles ) ) {
			echo vakker_eltd_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic_responsive_680_768', 'vakker_eltd_h6_responsive_styles' );
}

if ( ! function_exists( 'vakker_eltd_text_responsive_styles' ) ) {
	function vakker_eltd_text_responsive_styles() {
		$selector = array(
			'body',
			'p'
		);
		
		$styles = vakker_eltd_get_responsive_typography_styles( 'text', '_res1' );
		
		if ( ! empty( $styles ) ) {
			echo vakker_eltd_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic_responsive_680_768', 'vakker_eltd_text_responsive_styles' );
}

if ( ! function_exists( 'vakker_eltd_h1_responsive_styles2' ) ) {
	function vakker_eltd_h1_responsive_styles2() {
		$selector = array(
			'h1'
		);
		
		$styles = vakker_eltd_get_responsive_typography_styles( 'h1_responsive', '_2' );
		
		if ( ! empty( $styles ) ) {
			echo vakker_eltd_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic_responsive_680', 'vakker_eltd_h1_responsive_styles2' );
}

if ( ! function_exists( 'vakker_eltd_h2_responsive_styles2' ) ) {
	function vakker_eltd_h2_responsive_styles2() {
		$selector = array(
			'h2'
		);
		
		$styles = vakker_eltd_get_responsive_typography_styles( 'h2_responsive', '_2' );
		
		if ( ! empty( $styles ) ) {
			echo vakker_eltd_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic_responsive_680', 'vakker_eltd_h2_responsive_styles2' );
}

if ( ! function_exists( 'vakker_eltd_h3_responsive_styles2' ) ) {
	function vakker_eltd_h3_responsive_styles2() {
		$selector = array(
			'h3'
		);
		
		$styles = vakker_eltd_get_responsive_typography_styles( 'h3_responsive', '_2' );
		
		if ( ! empty( $styles ) ) {
			echo vakker_eltd_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic_responsive_680', 'vakker_eltd_h3_responsive_styles2' );
}

if ( ! function_exists( 'vakker_eltd_h4_responsive_styles2' ) ) {
	function vakker_eltd_h4_responsive_styles2() {
		$selector = array(
			'h4'
		);
		
		$styles = vakker_eltd_get_responsive_typography_styles( 'h4_responsive', '_2' );
		
		if ( ! empty( $styles ) ) {
			echo vakker_eltd_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic_responsive_680', 'vakker_eltd_h4_responsive_styles2' );
}

if ( ! function_exists( 'vakker_eltd_h5_responsive_styles2' ) ) {
	function vakker_eltd_h5_responsive_styles2() {
		$selector = array(
			'h5'
		);
		
		$styles = vakker_eltd_get_responsive_typography_styles( 'h5_responsive', '_2' );
		
		if ( ! empty( $styles ) ) {
			echo vakker_eltd_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic_responsive_680', 'vakker_eltd_h5_responsive_styles2' );
}

if ( ! function_exists( 'vakker_eltd_h6_responsive_styles2' ) ) {
	function vakker_eltd_h6_responsive_styles2() {
		$selector = array(
			'h6'
		);
		
		$styles = vakker_eltd_get_responsive_typography_styles( 'h6_responsive', '_2' );
		
		if ( ! empty( $styles ) ) {
			echo vakker_eltd_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic_responsive_680', 'vakker_eltd_h6_responsive_styles2' );
}

if ( ! function_exists( 'vakker_eltd_text_responsive_styles2' ) ) {
	function vakker_eltd_text_responsive_styles2() {
		$selector = array(
			'body',
			'p'
		);
		
		$styles = vakker_eltd_get_responsive_typography_styles( 'text', '_res2' );
		
		if ( ! empty( $styles ) ) {
			echo vakker_eltd_dynamic_css( $selector, $styles );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic_responsive_680', 'vakker_eltd_text_responsive_styles2' );
}