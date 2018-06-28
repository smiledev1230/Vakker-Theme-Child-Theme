<?php

if ( vakker_eltd_contact_form_7_installed() ) {
	include_once ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/widgets/contact-form-7/contact-form-7.php';
	
	add_filter( 'vakker_eltd_register_widgets', 'vakker_eltd_register_cf7_widget' );
}

if ( ! function_exists( 'vakker_eltd_register_cf7_widget' ) ) {
	/**
	 * Function that register cf7 widget
	 */
	function vakker_eltd_register_cf7_widget( $widgets ) {
		$widgets[] = 'VakkerElatedContactForm7Widget';
		
		return $widgets;
	}
}