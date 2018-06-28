<?php

if(!function_exists('vakker_eltd_map_woocommerce_meta')) {
    function vakker_eltd_map_woocommerce_meta() {
        $woocommerce_meta_box = vakker_eltd_add_meta_box(
            array(
                'scope' => array('product'),
                'title' => esc_html__('Product Meta', 'vakker'),
                'name' => 'woo_product_meta'
            )
        );

        vakker_eltd_add_meta_box_field(array(
            'name'        => 'eltd_product_featured_image_size',
            'type'        => 'select',
            'label'       => esc_html__('Dimensions for Product List Shortcode', 'vakker'),
            'description' => esc_html__('Choose image layout when it appears in Elated Product List - Masonry layout shortcode', 'vakker'),
            'parent'      => $woocommerce_meta_box,
            'options'     => array(
                'eltd-woo-image-normal-width' => esc_html__('Default', 'vakker'),
                'eltd-woo-image-large-width'  => esc_html__('Large Width', 'vakker')
            )
        ));

        vakker_eltd_add_meta_box_field(
            array(
                'name'          => 'eltd_show_title_area_woo_meta',
                'type'          => 'select',
                'default_value' => '',
                'label'         => esc_html__('Show Title Area', 'vakker'),
                'description'   => esc_html__('Disabling this option will turn off page title area', 'vakker'),
                'parent'        => $woocommerce_meta_box,
                'options'       => vakker_eltd_get_yes_no_select_array()
            )
        );
    }
	
    add_action('vakker_eltd_meta_boxes_map', 'vakker_eltd_map_woocommerce_meta', 99);
}