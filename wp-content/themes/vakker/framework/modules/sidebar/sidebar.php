<?php

if ( ! function_exists( 'vakker_eltd_register_sidebars' ) ) {
	/**
	 * Function that registers theme's sidebars
	 */
	function vakker_eltd_register_sidebars() {
		
		register_sidebar(
			array(
				'id'            => 'sidebar',
				'name'          => esc_html__( 'Sidebar', 'vakker' ),
				'description'   => esc_html__( 'Default Sidebar', 'vakker' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="eltd-widget-title-holder"><h3 class="eltd-widget-title">',
				'after_title'   => '</h3></div>'
			)
		);
	}
	
	add_action( 'widgets_init', 'vakker_eltd_register_sidebars', 1 );
}

if ( ! function_exists( 'vakker_eltd_add_support_custom_sidebar' ) ) {
	/**
	 * Function that adds theme support for custom sidebars. It also creates VakkerElatedSidebar object
	 */
	function vakker_eltd_add_support_custom_sidebar() {
		add_theme_support( 'VakkerElatedSidebar' );
		
		if ( get_theme_support( 'VakkerElatedSidebar' ) ) {
			new VakkerElatedSidebar();
		}
	}
	
	add_action( 'after_setup_theme', 'vakker_eltd_add_support_custom_sidebar' );
}