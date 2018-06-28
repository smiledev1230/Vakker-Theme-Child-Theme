<?php

if ( ! function_exists( 'vakker_eltd_include_woocommerce_shortcodes' ) ) {
	function vakker_eltd_include_woocommerce_shortcodes() {
		foreach ( glob( ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/woocommerce/shortcodes/*/load.php' ) as $shortcode_load ) {
			include_once $shortcode_load;
		}
	}
	
	if ( vakker_eltd_core_plugin_installed() ) {
		add_action( 'eltd_core_action_include_shortcodes_file', 'vakker_eltd_include_woocommerce_shortcodes' );
	}
}

if ( ! function_exists( 'vakker_eltd_set_product_list_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for product shortcodes to set our icon for Visual Composer shortcodes panel
	 */
	function vakker_eltd_set_product_list_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-product-category';
		$shortcodes_icon_class_array[] = '.icon-wpb-product-list';
		
		return $shortcodes_icon_class_array;
	}
	
	if ( vakker_eltd_core_plugin_installed() ) {
		add_filter( 'eltd_core_filter_add_vc_shortcodes_custom_icon_class', 'vakker_eltd_set_product_list_icon_class_name_for_vc_shortcodes' );
	}
}