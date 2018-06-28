<?php

if ( ! function_exists( 'vakker_eltd_register_woocommerce_dropdown_cart_widget' ) ) {
	/**
	 * Function that register image gallery widget
	 */
	function vakker_eltd_register_woocommerce_dropdown_cart_widget( $widgets ) {
		$widgets[] = 'VakkerElatedWoocommerceDropdownCart';
		
		return $widgets;
	}
	
	add_filter( 'vakker_eltd_register_widgets', 'vakker_eltd_register_woocommerce_dropdown_cart_widget' );
}