<?php

namespace ElatedCore\CPT\Shortcodes\ProductList;

use ElatedCore\Lib;

class ProductList implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'eltd_product_list';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Elated Product List', 'vakker' ),
					'base'                      => $this->base,
					'icon'                      => 'icon-wpb-product-list extended-custom-icon',
					'category'                  => esc_html__( 'by ELATED', 'vakker' ),
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'       => 'textfield',
							'param_name' => 'number_of_posts',
							'heading'    => esc_html__( 'Number of Products', 'vakker' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'number_of_columns',
							'heading'     => esc_html__( 'Number of Columns', 'vakker' ),
							'value'       => array(
								esc_html__( 'One', 'vakker' )   => '1',
								esc_html__( 'Two', 'vakker' )   => '2',
								esc_html__( 'Three', 'vakker' ) => '3',
								esc_html__( 'Four', 'vakker' )  => '4',
								esc_html__( 'Five', 'vakker' )  => '5',
								esc_html__( 'Six', 'vakker' )   => '6'
							),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'space_between_items',
							'heading'     => esc_html__( 'Space Between Items', 'vakker' ),
							'value'       => array_flip( vakker_eltd_get_space_between_items_array() ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'orderby',
							'heading'     => esc_html__( 'Order By', 'vakker' ),
							'value'       => array_flip( vakker_eltd_get_query_order_by_array( false, array( 'on-sale' => esc_html__( 'On Sale', 'vakker' ) ) ) ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'order',
							'heading'     => esc_html__( 'Order', 'vakker' ),
							'value'       => array_flip( vakker_eltd_get_query_order_array() ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'taxonomy_to_display',
							'heading'     => esc_html__( 'Choose Sorting Taxonomy', 'vakker' ),
							'value'       => array(
								esc_html__( 'Category', 'vakker' ) => 'category',
								esc_html__( 'Tag', 'vakker' )      => 'tag',
								esc_html__( 'Id', 'vakker' )       => 'id'
							),
							'save_always' => true,
							'description' => esc_html__( 'If you would like to display only certain products, this is where you can select the criteria by which you would like to choose which products to display', 'vakker' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'taxonomy_values',
							'heading'     => esc_html__( 'Enter Taxonomy Values', 'vakker' ),
							'description' => esc_html__( 'Separate values (category slugs, tags, or post IDs) with a comma', 'vakker' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'image_size',
							'heading'    => esc_html__( 'Image Proportions', 'vakker' ),
							'value'      => array(
								esc_html__( 'Default', 'vakker' )        => '',
								esc_html__( 'Original', 'vakker' )       => 'full',
								esc_html__( 'Square', 'vakker' )         => 'square',
								esc_html__( 'Landscape', 'vakker' )      => 'landscape',
								esc_html__( 'Portrait', 'vakker' )       => 'portrait',
								esc_html__( 'Medium', 'vakker' )         => 'medium',
								esc_html__( 'Large', 'vakker' )          => 'large',
								esc_html__( 'Shop Catalog', 'vakker' )   => 'shop_catalog',
								esc_html__( 'Shop Single', 'vakker' )    => 'shop_single',
								esc_html__( 'Shop Thumbnail', 'vakker' ) => 'shop_thumbnail'
							),
							'save_always' => true
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_title',
							'heading'    => esc_html__( 'Display Title', 'vakker' ),
							'value'      => array_flip( vakker_eltd_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'vakker' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'title_tag',
							'heading'    => esc_html__( 'Title Tag', 'vakker' ),
							'value'      => array_flip( vakker_eltd_get_title_tag( true ) ),
							'dependency' => array( 'element' => 'display_title', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Product Info Style', 'vakker' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'title_transform',
							'heading'    => esc_html__( 'Title Text Transform', 'vakker' ),
							'value'      => array_flip( vakker_eltd_get_text_transform_array( true ) ),
							'dependency' => array( 'element' => 'display_title', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Product Info Style', 'vakker' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_category',
							'heading'    => esc_html__( 'Display Category', 'vakker' ),
							'value'      => array_flip( vakker_eltd_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'vakker' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_excerpt',
							'heading'    => esc_html__( 'Display Excerpt', 'vakker' ),
							'value'      => array_flip( vakker_eltd_get_yes_no_select_array( false ) ),
							'group'      => esc_html__( 'Product Info', 'vakker' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'excerpt_length',
							'heading'     => esc_html__( 'Excerpt Length', 'vakker' ),
							'description' => esc_html__( 'Number of characters', 'vakker' ),
							'dependency'  => array( 'element' => 'display_excerpt', 'value' => array( 'yes' ) ),
							'group'       => esc_html__( 'Product Info Style', 'vakker' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_rating',
							'heading'    => esc_html__( 'Display Rating', 'vakker' ),
							'value'      => array_flip( vakker_eltd_get_yes_no_select_array( false ) ),
							'group'      => esc_html__( 'Product Info', 'vakker' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_price',
							'heading'    => esc_html__( 'Display Price', 'vakker' ),
							'value'      => array_flip( vakker_eltd_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'vakker' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_button',
							'heading'    => esc_html__( 'Display Button', 'vakker' ),
							'value'      => array_flip( vakker_eltd_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'vakker' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'info_bottom_text_align',
							'heading'    => esc_html__( 'Product Info Text Alignment', 'vakker' ),
							'value'      => array(
								esc_html__( 'Default', 'vakker' ) => '',
								esc_html__( 'Left', 'vakker' )    => 'left',
								esc_html__( 'Center', 'vakker' )  => 'center',
								esc_html__( 'Right', 'vakker' )   => 'right'
							),
							'group'      => esc_html__( 'Product Info Style', 'vakker' )
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__( 'Product Info Bottom Margin (px)', 'vakker' ),
							'group'      => esc_html__( 'Product Info Style', 'vakker' )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$default_atts = array(
			'type'                    => 'standard',
			'info_position'           => 'info-below-image',
			'number_of_posts'         => '8',
			'number_of_columns'       => '4',
			'space_between_items'     => 'normal',
			'orderby'                 => 'date',
			'order'                   => 'ASC',
			'taxonomy_to_display'     => 'category',
			'taxonomy_values'         => '',
			'image_size'              => 'full',
			'display_title'           => 'yes',
			'title_tag'               => 'h4',
			'title_transform'         => '',
			'display_category'        => 'yes',
			'display_excerpt'         => 'no',
			'excerpt_length'          => '20',
			'display_rating'          => 'no',
			'display_price'           => 'yes',
			'display_button'          => 'yes',
			'info_bottom_text_align'  => '',
		);
		$params       = shortcode_atts( $default_atts, $atts );
		
		$params['class_name']     = 'pli';
		$params['type']           = ! empty( $params['type'] ) ? $params['type'] : $default_atts['type'];
		$params['title_tag']      = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $default_atts['title_tag'];
		
		$additional_params                   = array();
		$additional_params['holder_classes'] = $this->getHolderClasses( $params, $default_atts );
		
		$queryArray                        = $this->generateProductQueryArray( $params );
		$query_result                      = new \WP_Query( $queryArray );
		$additional_params['query_result'] = $query_result;
		
		$params['this_object'] = $this;
		
		$html = vakker_eltd_get_woo_shortcode_module_template_part( 'templates/product-list', 'product-list', $params['type'], $params, $additional_params );
		
		return $html;
	}
	
	private function getHolderClasses( $params, $default_atts ) {
		$holderClasses   = array();
		$holderClasses[] = ! empty( $params['type'] ) ? 'eltd-' . $params['type'] . '-layout' : 'eltd-' . $default_atts['type'] . '-layout';
		$holderClasses[] = ! empty( $params['space_between_items'] ) ? 'eltd-' . $params['space_between_items'] . '-space' : 'eltd-' . $default_atts['space_between_items'] . '-space';
		$holderClasses[] = $this->getColumnNumberClass( $params );
		$holderClasses[] = 'eltd-' . $params['info_position'];

		return implode( ' ', $holderClasses );
	}
	
	private function getColumnNumberClass( $params ) {
		$columnsNumber = '';
		$columns       = $params['number_of_columns'];
		
		switch ( $columns ) {
			case 1:
				$columnsNumber = 'eltd-one-column';
				break;
			case 2:
				$columnsNumber = 'eltd-two-columns';
				break;
			case 3:
				$columnsNumber = 'eltd-three-columns';
				break;
			case 4:
				$columnsNumber = 'eltd-four-columns';
				break;
			case 5:
				$columnsNumber = 'eltd-five-columns';
				break;
			case 6:
				$columnsNumber = 'eltd-six-columns';
				break;
			default:
				$columnsNumber = 'eltd-four-columns';
				break;
		}
		
		return $columnsNumber;
	}
	
	private function generateProductQueryArray( $params ) {
		$queryArray = array(
			'post_status'         => 'publish',
			'post_type'           => 'product',
			'ignore_sticky_posts' => 1,
			'posts_per_page'      => $params['number_of_posts'],
			'orderby'             => $params['orderby'],
			'order'               => $params['order']
		);
		
		if ( $params['orderby'] === 'on-sale' ) {
			$queryArray['no_found_rows'] = 1;
			$queryArray['post__in']      = array_merge( array( 0 ), wc_get_product_ids_on_sale() );
		}
		
		if ( $params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'category' ) {
			$queryArray['product_cat'] = $params['taxonomy_values'];
		}
		
		if ( $params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'tag' ) {
			$queryArray['product_tag'] = $params['taxonomy_values'];
		}
		
		if ( $params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'id' ) {
			$idArray                = $params['taxonomy_values'];
			$ids                    = explode( ',', $idArray );
			$queryArray['post__in'] = $ids;
		}
		
		return $queryArray;
	}
	
	public function getItemClasses( $params ) {
		$itemClasses = array();
		
		$image_size_meta = get_post_meta( get_the_ID(), 'eltd_product_featured_image_size', true );
		if ( ! empty( $image_size_meta ) ) {
			$itemClasses[] = $image_size_meta;
		}
		
		return implode( ' ', $itemClasses );
	}
	
	public function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_transform'] ) ) {
			$styles[] = 'text-transform: ' . $params['title_transform'];
		}
		
		return implode( ';', $styles );
	}
	
	public function getTextWrapperStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['info_bottom_text_align'] ) ) {
			$styles[] = 'text-align: ' . $params['info_bottom_text_align'];
		}
		
		return implode( ';', $styles );
	}
}