<?php

if ( ! function_exists( 'vakker_eltd_register_image_gallery_widget' ) ) {
	/**
	 * Function that register image gallery widget
	 */
	function vakker_eltd_register_image_gallery_widget( $widgets ) {
		$widgets[] = 'VakkerElatedImageGalleryWidget';
		
		return $widgets;
	}
	
	add_filter( 'vakker_eltd_register_widgets', 'vakker_eltd_register_image_gallery_widget' );
}