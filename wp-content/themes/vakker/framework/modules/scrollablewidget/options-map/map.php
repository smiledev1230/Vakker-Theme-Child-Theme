<?php
if(!function_exists('vakker_eltd_scrollable_widget_options')){

	function vakker_eltd_scrollable_widget_options(){

		/**
		 * Enable Scrollable Widget
		 */
		$sidebar_panel = vakker_eltd_add_admin_panel(
			array(
				'title' => esc_html__('Scrollable Widget', 'vakker'),
				'name' => 'scrollable_widget',
				'page' => '_page_page'
			)
		);

        vakker_eltd_add_admin_field(array(
			'type' => 'yesno',
			'name' => 'enable_scrollable_widget',
			'default_value' => 'no',
			'label' => esc_html__('Enable Scrollable Widget', 'vakker'),
			'description' => esc_html__('Enabling this option will show scrollable widget area', 'vakker'),
			'args' => array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#eltd_panel_scrollable_widget_skin'
			),
			'parent' => $sidebar_panel
		));

		$scrollable_widget_skin = vakker_eltd_add_admin_container(array(
			'name' => 'panel_scrollable_widget_skin',
			'hidden_property' => 'enable_scrollable_widget',
			'hidden_value' => 'no',
			'parent' => $sidebar_panel
		));

        vakker_eltd_add_admin_field(
			array(
				'name' => 'scrollable_widget_light',
				'type' => 'select',
				'default_value' => 'no',
				'label' => esc_html__('Light Scrollable Widget Skin', 'vakker'),
				'description' => esc_html__('Enabling this option will show light scrollable widget', 'vakker'),
				'parent' => $scrollable_widget_skin,
				'options' => vakker_eltd_get_yes_no_select_array(false)
			)
		);

	}
	add_action('vakker_eltd_additional_page_options_map', 'vakker_eltd_scrollable_widget_options');

}