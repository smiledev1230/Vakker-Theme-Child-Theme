<?php

if ( ! function_exists( 'vakker_eltd_reset_options_map' ) ) {
	/**
	 * Reset options panel
	 */
	function vakker_eltd_reset_options_map() {
		
		vakker_eltd_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__( 'Reset', 'vakker' ),
				'icon'  => 'fa fa-retweet'
			)
		);
		
		$panel_reset = vakker_eltd_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__( 'Reset', 'vakker' )
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'reset_to_defaults',
				'default_value' => 'no',
				'label'         => esc_html__( 'Reset to Defaults', 'vakker' ),
				'description'   => esc_html__( 'This option will reset all Select Options values to defaults', 'vakker' ),
				'parent'        => $panel_reset
			)
		);
	}
	
	add_action( 'vakker_eltd_options_map', 'vakker_eltd_reset_options_map', 100 );
}