<?php
if ( ! function_exists( 'vakker_eltd_register_side_area_sidebar' ) ) {
	/**
	 * Register side area sidebar
	 */
	function vakker_eltd_register_side_area_sidebar() {
		register_sidebar(
			array(
				'id'            => 'sidearea',
				'name'          => esc_html__( 'Side Area', 'vakker' ),
				'description'   => esc_html__( 'Side Area', 'vakker' ),
				'before_widget' => '<div id="%1$s" class="widget eltd-sidearea %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="eltd-widget-title-holder"><h4 class="eltd-widget-title">',
				'after_title'   => '</h4></div>'
			)
		);
	}
	
	add_action( 'widgets_init', 'vakker_eltd_register_side_area_sidebar' );
}

if ( ! function_exists( 'vakker_eltd_side_menu_body_class' ) ) {
	/**
	 * Function that adds body classes for different side menu styles
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function vakker_eltd_side_menu_body_class( $classes ) {
		
		if ( is_active_widget( false, false, 'eltd_side_area_opener' ) ) {
			
			$classes[] = 'eltd-side-menu-slide-from-right';
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'vakker_eltd_side_menu_body_class' );
}

if ( ! function_exists( 'vakker_eltd_get_side_area' ) ) {
	/**
	 * Loads side area HTML
	 */
	function vakker_eltd_get_side_area() {
		
		if ( is_active_widget( false, false, 'eltd_side_area_opener' ) ) {
			
			vakker_eltd_get_module_template_part( 'templates/sidearea', 'sidearea' );
		}
	}
	
	add_action( 'vakker_eltd_after_body_tag', 'vakker_eltd_get_side_area', 10 );
}