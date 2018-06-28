<?php

namespace ElatedCore\CPT\Shortcodes\ProductCategory;

use ElatedCore\Lib;

class ProductCategory implements Lib\ShortcodeInterface
{
    private $base;

    function __construct()
    {
        $this->base = 'eltd_product_category';

        add_action('vc_before_init', array($this, 'vcMap'));

        //Product id filter
        add_filter('vc_autocomplete_eltd_product_category_category_callback', array(&$this, 'productCategoryAutocompleteSuggester',), 10, 1);

        //Product id render
        add_filter('vc_autocomplete_eltd_product_category_category_render', array(&$this, 'productCategoryAutocompleteRender',), 10, 1);
    }

    public function getBase()
    {
        return $this->base;
    }

    public function vcMap()
    {
        if (function_exists('vc_map')) {
            vc_map(
                array(
                    'name' => esc_html__('Elated Product Category', 'vakker'),
                    'base' => $this->getBase(),
                    'category' => esc_html__('by ELATED', 'vakker'),
                    'icon' => 'icon-wpb-product-info extended-custom-icon',
                    'allowed_container_element' => 'vc_row',
                    'params' => array(
                        array(
                            'type' => 'autocomplete',
                            'param_name' => 'category',
                            'heading' => esc_html__('Selected Product Category', 'vakker'),
                            'settings' => array(
                                'sortable' => true,
                                'unique_values' => true
                            ),
                            'admin_label' => true,
                            'save_always' => true,
                            'description' => esc_html__('If you left this field empty then product ID will be of the current page', 'vakker')
                        ),
                        array(
                            'type' => 'attach_image',
                            'param_name' => 'category_image',
                            'heading' => esc_html__('Category Image', 'vakker')
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'title_tag',
                            'heading' => esc_html__('Title Tag', 'vakker'),
                            'value' => array_flip(vakker_eltd_get_title_tag(true, array('p' => 'p'))),
                            'description' => esc_html__('Set title tag for category title element', 'vakker'),
                        ),
                        array(
                            'type' => 'textfield',
                            'param_name' => 'additional_text',
                            'heading' => esc_html__('Additional Text Tag', 'vakker'),
                        ),
                        array(
                            'type' => 'dropdown',
                            'param_name' => 'skin',
                            'heading' => esc_html__('Category Info Skin', 'vakker'),
                            'value'   => array(
                                esc_html__('Default', 'vakker') => '',
                                esc_html__('Light', 'vakker') => 'light-skin',
                            )
                        )
                    )
                )
            );
        }
    }

    /**
     * Renders shortcodes HTML
     *
     * @param $atts array of shortcode params
     * @param $content string shortcode content
     * @return string
     */
    public function render($atts, $content = null)
    {
        $args = array(
            'category' => '',
            'category_image' => '',
            'skin' => '',
            'title_tag' => 'h4',
            'additional_text' => ''
        );

        $params = shortcode_atts($args, $atts);
        extract($params);


        $params['title_tag'] = !empty($params['title_tag']) ? $params['title_tag'] : $args['title_tag'];

        $html = $html = vakker_eltd_get_woo_shortcode_module_template_part( 'templates/product-category', 'product-category', '', $params );

        return $html;
    }

    /**
     * Filter product category
     *
     * @param $query
     *
     * @return array
     */
    public function productCategoryAutocompleteSuggester($query)
    {
        global $wpdb;

        $post_meta_infos = $wpdb->get_results($wpdb->prepare("SELECT a.slug AS slug, a.name AS product_category_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'product_cat' AND a.name LIKE '%%%s%%'", stripslashes($query)), ARRAY_A);

        $results = array();
        if (is_array($post_meta_infos) && !empty($post_meta_infos)) {
            foreach ($post_meta_infos as $value) {
                $data = array();
                $data['value'] = $value['slug'];
                $data['label'] = ((strlen($value['product_category_title']) > 0) ? esc_html__('Category', 'vakker') . ': ' . $value['product_category_title'] : '');
                $results[] = $data;
            }
        }

        return $results;

    }

    /**
     * Find product category
     * @since 4.4
     *
     * @param $query
     *
     * @return bool|array
     */
    public function productCategoryAutocompleteRender($query)
    {
        $query = trim($query['value']); // get value from requested
        if (!empty($query)) {

            $product_category = get_term_by('slug', $query, 'product_cat');
            if (is_object($product_category)) {

                $product_category_slug = $product_category->slug;
                $product_category_title = $product_category->name;

                $product_category_title_display = '';
                if (!empty($product_category_title)) {
                    $product_category_title_display = esc_html__('Category', 'vakker') . ': ' . $product_category_title;
                }

                $data = array();
                $data['value'] = $product_category_slug;
                $data['label'] = $product_category_title_display;

                return !empty($data) ? $data : false;
            }

            return false;
        }

        return false;
    }
}