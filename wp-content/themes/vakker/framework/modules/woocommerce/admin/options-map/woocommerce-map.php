<?php

if ( ! function_exists( 'vakker_eltd_woocommerce_options_map' ) ) {
	
	/**
	 * Add Woocommerce options page
	 */
	function vakker_eltd_woocommerce_options_map() {
		
		vakker_eltd_add_admin_page(
			array(
				'slug'  => '_woocommerce_page',
				'title' => esc_html__( 'WooCommerce', 'vakker' ),
				'icon'  => 'fa fa-shopping-cart'
			)
		);
		
		/**
		 * Product List Settings
		 */
		$panel_product_list = vakker_eltd_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_product_list',
				'title' => esc_html__( 'Product List', 'vakker' )
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'eltd_woo_product_list_columns',
				'label'         => esc_html__( 'Product List Columns', 'vakker' ),
				'default_value' => 'eltd-woocommerce-columns-4',
				'description'   => esc_html__( 'Choose number of columns for product listing and related products on single product', 'vakker' ),
				'options'       => array(
					'eltd-woocommerce-columns-3' => esc_html__( '3 Columns', 'vakker' ),
					'eltd-woocommerce-columns-4' => esc_html__( '4 Columns', 'vakker' )
				),
				'parent'        => $panel_product_list,
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'eltd_woo_product_list_columns_space',
				'label'         => esc_html__( 'Space Between Items', 'vakker' ),
				'description'   => esc_html__( 'Select space between items for product listing and related products on single product', 'vakker' ),
				'default_value' => 'normal',
				'options'       => vakker_eltd_get_space_between_items_array(),
				'parent'        => $panel_product_list,
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'eltd_woo_products_per_page',
				'label'         => esc_html__( 'Number of products per page', 'vakker' ),
				'description'   => esc_html__( 'Set number of products on shop page', 'vakker' ),
				'parent'        => $panel_product_list,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'eltd_products_list_title_tag',
				'label'         => esc_html__( 'Products Title Tag', 'vakker' ),
				'default_value' => 'h4',
				'options'       => vakker_eltd_get_title_tag(),
				'parent'        => $panel_product_list,
			)
		);
		
		/**
		 * Single Product Settings
		 */
		$panel_single_product = vakker_eltd_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_single_product',
				'title' => esc_html__( 'Single Product', 'vakker' )
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_woo',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'vakker' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single post pages', 'vakker' ),
				'parent'        => $panel_single_product,
				'options'       => vakker_eltd_get_yes_no_select_array(),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'eltd_single_product_title_tag',
				'default_value' => 'h2',
				'label'         => esc_html__( 'Single Product Title Tag', 'vakker' ),
				'options'       => vakker_eltd_get_title_tag(),
				'parent'        => $panel_single_product,
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_number_of_thumb_images',
				'default_value' => '4',
				'label'         => esc_html__( 'Number of Thumbnail Images per Row', 'vakker' ),
				'options'       => array(
					'4' => esc_html__( 'Four', 'vakker' ),
					'3' => esc_html__( 'Three', 'vakker' ),
					'2' => esc_html__( 'Two', 'vakker' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_set_thumb_images_position',
				'default_value' => 'below-image',
				'label'         => esc_html__( 'Set Thumbnail Images Position', 'vakker' ),
				'options'       => array(
					'below-image'  => esc_html__( 'Below Featured Image', 'vakker' ),
					'on-left-side' => esc_html__( 'On The Left Side Of Featured Image', 'vakker' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_enable_single_product_zoom_image',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Zoom Maginfier', 'vakker' ),
				'description'   => esc_html__( 'Enabling this option will show magnifier image on featured image hover', 'vakker' ),
				'parent'        => $panel_single_product,
				'options'       => vakker_eltd_get_yes_no_select_array( false ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_set_single_images_behavior',
				'default_value' => 'pretty-photo',
				'label'         => esc_html__( 'Set Images Behavior', 'vakker' ),
				'options'       => array(
					'pretty-photo' => esc_html__( 'Pretty Photo Lightbox', 'vakker' ),
					'photo-swipe'  => esc_html__( 'Photo Swipe Lightbox', 'vakker' )
				),
				'parent'        => $panel_single_product
			)
		);
	}
	
	add_action( 'vakker_eltd_options_map', 'vakker_eltd_woocommerce_options_map', 21 );
}