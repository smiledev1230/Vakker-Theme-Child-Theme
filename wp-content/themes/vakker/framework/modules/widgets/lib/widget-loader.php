<?php

if ( ! function_exists( 'vakker_eltd_register_widgets' ) ) {
	function vakker_eltd_register_widgets() {
		$widgets = apply_filters( 'vakker_eltd_register_widgets', $widgets = array() );
		
		foreach ( $widgets as $widget ) {
			register_widget( $widget );
		}
	}
	
	add_action( 'widgets_init', 'vakker_eltd_register_widgets' );
}