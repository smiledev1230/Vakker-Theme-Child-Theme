<?php

if ( ! function_exists( 'vakker_eltd_woocommerce_body_class' ) ) {
	function vakker_eltd_woocommerce_body_class( $classes ) {
		if ( vakker_eltd_is_woocommerce_page() ) {
			$classes[] = 'eltd-woocommerce-page';
			
			if ( function_exists( 'is_shop' ) && is_shop() ) {
				$classes[] = 'eltd-woo-main-page';
			}
			
			if ( is_singular( 'product' ) ) {
				$classes[] = 'eltd-woo-single-page';
			}
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'vakker_eltd_woocommerce_body_class' );
}

if ( ! function_exists( 'vakker_eltd_woocommerce_columns_class' ) ) {
	function vakker_eltd_woocommerce_columns_class( $classes ) {
		$classes[] = vakker_eltd_options()->getOptionValue( 'eltd_woo_product_list_columns' );
		
		return $classes;
	}
	
	add_filter( 'body_class', 'vakker_eltd_woocommerce_columns_class' );
}

if ( ! function_exists( 'vakker_eltd_woocommerce_columns_space_class' ) ) {
	function vakker_eltd_woocommerce_columns_space_class( $classes ) {
		$woo_space_between_items = vakker_eltd_options()->getOptionValue( 'eltd_woo_product_list_columns_space' );
		
		if ( ! empty( $woo_space_between_items ) ) {
			$classes[] = 'eltd-woo-' . $woo_space_between_items . '-space';
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'vakker_eltd_woocommerce_columns_space_class' );
}

if ( ! function_exists( 'vakker_eltd_woocommerce_pl_info_position_class' ) ) {
	function vakker_eltd_woocommerce_pl_info_position_class( $classes ) {
		
		$classes[] = 'eltd-woo-pl-info-below-image';
		
		return $classes;
	}
	
	add_filter( 'body_class', 'vakker_eltd_woocommerce_pl_info_position_class' );
}

if ( ! function_exists( 'vakker_eltd_add_woocommerce_shortcode_class' ) ) {
	/**
	 * Function that checks if current page has at least one of WooCommerce shortcodes added
	 * @return string
	 */
	function vakker_eltd_add_woocommerce_shortcode_class( $classes ) {
		$woocommerce_shortcodes = array(
			'woocommerce_order_tracking'
		);
		
		foreach ( $woocommerce_shortcodes as $woocommerce_shortcode ) {
			$has_shortcode = vakker_eltd_has_shortcode( $woocommerce_shortcode );
			
			if ( $has_shortcode ) {
				$classes[] = 'eltd-woocommerce-page woocommerce-account eltd-' . str_replace( '_', '-', $woocommerce_shortcode );
			}
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'vakker_eltd_add_woocommerce_shortcode_class' );
}

if ( ! function_exists( 'vakker_eltd_woo_single_product_thumb_position_class' ) ) {
	function vakker_eltd_woo_single_product_thumb_position_class( $classes ) {
		$product_thumbnail_position = vakker_eltd_get_meta_field_intersect( 'woo_set_thumb_images_position' );
		
		if ( ! empty( $product_thumbnail_position ) ) {
			$classes[] = 'eltd-woo-single-thumb-' . $product_thumbnail_position;
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'vakker_eltd_woo_single_product_thumb_position_class' );
}

if ( ! function_exists( 'vakker_eltd_woo_single_product_has_zoom_class' ) ) {
	function vakker_eltd_woo_single_product_has_zoom_class( $classes ) {
		$zoom_maginifier = vakker_eltd_get_meta_field_intersect( 'woo_enable_single_product_zoom_image' );
		
		if ( $zoom_maginifier === 'yes' ) {
			$classes[] = 'eltd-woo-single-has-zoom';
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'vakker_eltd_woo_single_product_has_zoom_class' );
}

if ( ! function_exists( 'vakker_eltd_woo_single_product_has_zoom_support' ) ) {
	function vakker_eltd_woo_single_product_has_zoom_support() {
		$zoom_maginifier = vakker_eltd_get_meta_field_intersect( 'woo_enable_single_product_zoom_image' );
		
		if ( $zoom_maginifier === 'yes' ) {
			add_theme_support( 'wc-product-gallery-zoom' );
		}
	}
	
	add_action( 'init', 'vakker_eltd_woo_single_product_has_zoom_support' );
}

if ( ! function_exists( 'vakker_eltd_woo_single_product_image_behavior_class' ) ) {
	function vakker_eltd_woo_single_product_image_behavior_class( $classes ) {
		$image_behavior = vakker_eltd_get_meta_field_intersect( 'woo_set_single_images_behavior' );
		
		if ( ! empty( $image_behavior ) ) {
			$classes[] = 'eltd-woo-single-has-' . $image_behavior;
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'vakker_eltd_woo_single_product_image_behavior_class' );
}

if ( ! function_exists( 'vakker_eltd_woo_single_product_photo_swipe_support' ) ) {
	function vakker_eltd_woo_single_product_photo_swipe_support() {
		$image_behavior = vakker_eltd_get_meta_field_intersect( 'woo_set_single_images_behavior' );
		
		if ( $image_behavior === 'photo-swipe' ) {
			add_theme_support( 'wc-product-gallery-lightbox' );
		}
	}
	
	add_action( 'init', 'vakker_eltd_woo_single_product_photo_swipe_support' );
}

if ( ! function_exists( 'vakker_eltd_woocommerce_products_per_page' ) ) {
	/**
	 * Function that sets number of products per page. Default is 9
	 * @return int number of products to be shown per page
	 */
	function vakker_eltd_woocommerce_products_per_page() {
		$products_per_page_meta = vakker_eltd_options()->getOptionValue( 'eltd_woo_products_per_page' );
		$products_per_page      = ! empty( $products_per_page_meta ) ? intval( $products_per_page_meta ) : 12;
		
		if ( isset( $_GET['woo-products-count'] ) && $_GET['woo-products-count'] === 'view-all' ) {
			$products_per_page = 9999;
		}
		
		return $products_per_page;
	}
	
	add_filter('loop_shop_per_page', 'vakker_eltd_woocommerce_products_per_page', 20);
}

if ( ! function_exists( 'vakker_eltd_woocommerce_related_products_args' ) ) {
	/**
	 * Function that sets number of displayed related products. Hooks to woocommerce_output_related_products_args filter
	 *
	 * @param $args array array of args for the query
	 *
	 * @return mixed array of changed args
	 */
	function vakker_eltd_woocommerce_related_products_args( $args ) {
		$related = vakker_eltd_options()->getOptionValue( 'eltd_woo_product_list_columns' );
		
		if ( ! empty( $related ) ) {
			switch ( $related ) {
				case 'eltd-woocommerce-columns-4':
					$args['posts_per_page'] = 4;
					break;
				case 'eltd-woocommerce-columns-3':
					$args['posts_per_page'] = 3;
					break;
				default:
					$args['posts_per_page'] = 3;
			}
		} else {
			$args['posts_per_page'] = 3;
		}
		
		return $args;
	}
	
	add_filter('woocommerce_output_related_products_args', 'vakker_eltd_woocommerce_related_products_args');
}

if ( ! function_exists( 'vakker_eltd_woocommerce_product_thumbnail_column_size' ) ) {
	/**
	 * Function that sets number of thumbnails on single product page per row. Default is 4
	 * @return int number of thumbnails to be shown on single product page per row
	 */
	function vakker_eltd_woocommerce_product_thumbnail_column_size() {
		$thumbs_number_meta = vakker_eltd_options()->getOptionValue( 'woo_number_of_thumb_images' );
		$thumbs_number      = ! empty ( $thumbs_number_meta ) ? intval( $thumbs_number_meta ) : 4;
		
		return apply_filters( 'vakker_eltd_number_of_thumbnails_per_row_single_product', $thumbs_number );
	}
	
	add_filter( 'woocommerce_product_thumbnails_columns', 'vakker_eltd_woocommerce_product_thumbnail_column_size', 10 );
}

if ( ! function_exists( 'vakker_eltd_single_product_show_product_thumbnails' ) ) {
	function vakker_eltd_single_product_show_product_thumbnails() {
		global $product;
		
		$attachment_ids = $product->get_gallery_image_ids();
		
		if ( $attachment_ids && has_post_thumbnail() ) {
			foreach ( $attachment_ids as $attachment_id ) {
				$full_size_image = wp_get_attachment_image_src( $attachment_id, 'full' );
				$thumbnail       = wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' );
				$attributes      = array(
					'title'                   => get_post_field( 'post_title', $attachment_id ),
					'data-caption'            => get_post_field( 'post_excerpt', $attachment_id ),
					'data-src'                => $full_size_image[0],
					'data-large_image'        => $full_size_image[0],
					'data-large_image_width'  => $full_size_image[1],
					'data-large_image_height' => $full_size_image[2],
				);
				
				$html  = '<div data-thumb="' . esc_url( $thumbnail[0] ) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url( $full_size_image[0] ) . '">';
				$html .= wp_get_attachment_image( $attachment_id, 'shop_thumbnail', false, $attributes );
				$html .= '</a></div>';
				
				echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id );
			}
		}
	}
}

if ( ! function_exists( 'vakker_eltd_woocommerce_template_loop_product_title' ) ) {
	/**
	 * Function for overriding product title template in Product List Loop
	 */
	function vakker_eltd_woocommerce_template_loop_product_title() {
		$tag = vakker_eltd_options()->getOptionValue( 'eltd_products_list_title_tag' );
		if ( $tag === '' ) {
			$tag = 'h5';
		}
		
		the_title( '<' . $tag . ' class="eltd-product-list-title"><a href="' . get_the_permalink() . '">', '</a></' . $tag . '>' );
	}
}

if ( ! function_exists( 'vakker_eltd_woocommerce_template_single_title' ) ) {
	/**
	 * Function for overriding product title template in Single Product template
	 */
	function vakker_eltd_woocommerce_template_single_title() {
		$tag = vakker_eltd_options()->getOptionValue( 'eltd_single_product_title_tag' );
		if ( $tag === '' ) {
			$tag = 'h1';
		}
		
		the_title( '<' . $tag . '  itemprop="name" class="eltd-single-product-title">', '</' . $tag . '>' );
	}
}

if ( ! function_exists( 'vakker_eltd_woocommerce_sale_flash' ) ) {
	/**
	 * Function for overriding Sale Flash Template
	 *
	 * @return string
	 */
	function vakker_eltd_woocommerce_sale_flash() {
		return '<span class="eltd-onsale">' . esc_html__( 'SALE', 'vakker' ) . '</span>';
	}
	
	add_filter('woocommerce_sale_flash', 'vakker_eltd_woocommerce_sale_flash');
}

if ( ! function_exists( 'vakker_eltd_woocommerce_product_out_of_stock' ) ) {
	/**
	 * Function for adding Out Of Stock Template
	 *
	 * @return string
	 */
	function vakker_eltd_woocommerce_product_out_of_stock() {
		global $product;
		
		if ( ! $product->is_in_stock() ) {
			print '<span class="eltd-out-of-stock">' . esc_html__( 'OUT OF STOCK', 'vakker' ) . '</span>';
		}
	}
	
	add_filter('woocommerce_product_thumbnails', 'vakker_eltd_woocommerce_product_out_of_stock', 20);
	add_action('woocommerce_before_shop_loop_item_title', 'vakker_eltd_woocommerce_product_out_of_stock', 10);
}

if ( ! function_exists( 'vakker_eltd_woocommerce_view_all_pagination' ) ) {
	/**
	 * Function for adding New WooCommerce Pagination Template
	 *
	 * @return string
	 */
	function vakker_eltd_woocommerce_view_all_pagination() {
		global $wp_query;
		
		if ( $wp_query->max_num_pages <= 1 ) {
			return;
		}
		
		$html    = '';
		$shop_id = vakker_eltd_get_woo_shop_page_id();
		
		if ( ! empty( $shop_id ) && $shop_id !== -1 ) {
			$html .= '<div class="eltd-woo-view-all-pagination">';
			$html .= '<a href="' . get_permalink( $shop_id ) . '?woo-products-count=view-all">' . esc_html__( 'View All', 'vakker' ) . '</a>';
			$html .= '</div>';
		}
		
		echo wp_kses_post( $html );
	}
	
//	add_action('woocommerce_after_shop_loop', 'vakker_eltd_woocommerce_view_all_pagination', 11);
}

if ( ! function_exists( 'vakker_eltd_woo_view_all_pagination_additional_tag_before' ) ) {
	function vakker_eltd_woo_view_all_pagination_additional_tag_before() {
		
		print '<div class="eltd-woo-pagination-holder"><div class="eltd-woo-pagination-inner">';
	}
}

if ( ! function_exists( 'vakker_eltd_woo_view_all_pagination_additional_tag_after' ) ) {
	function vakker_eltd_woo_view_all_pagination_additional_tag_after() {
		
		print '</div></div>';
	}
}

if ( ! function_exists( 'vakker_eltd_single_product_content_additional_tag_before' ) ) {
	function vakker_eltd_single_product_content_additional_tag_before() {
		
		print '<div class="eltd-single-product-content">';
	}
}

if ( ! function_exists( 'vakker_eltd_single_product_content_additional_tag_after' ) ) {
	function vakker_eltd_single_product_content_additional_tag_after() {
		
		print '</div>';
	}
}

if ( ! function_exists( 'vakker_eltd_single_product_summary_additional_tag_before' ) ) {
	function vakker_eltd_single_product_summary_additional_tag_before() {
		
		print '<div class="eltd-single-product-summary">';
	}
}

if ( ! function_exists( 'vakker_eltd_single_product_summary_additional_tag_after' ) ) {
	function vakker_eltd_single_product_summary_additional_tag_after() {
		
		print '</div>';
	}
}

if ( ! function_exists( 'vakker_eltd_pl_holder_additional_tag_before' ) ) {
	function vakker_eltd_pl_holder_additional_tag_before() {
		
		print '<div class="eltd-pl-main-holder">';
	}
}

if ( ! function_exists( 'vakker_eltd_pl_holder_additional_tag_after' ) ) {
	function vakker_eltd_pl_holder_additional_tag_after() {
		
		print '</div>';
	}
}

if ( ! function_exists( 'vakker_eltd_pl_inner_additional_tag_before' ) ) {
	function vakker_eltd_pl_inner_additional_tag_before() {
		
		print '<div class="eltd-pl-inner">';
	}
}

if ( ! function_exists( 'vakker_eltd_pl_inner_additional_tag_after' ) ) {
	function vakker_eltd_pl_inner_additional_tag_after() {
		
		print '</div>';
	}
}

if ( ! function_exists( 'vakker_eltd_pl_image_additional_tag_before' ) ) {
	function vakker_eltd_pl_image_additional_tag_before() {
		
		print '<div class="eltd-pl-image">';
	}
}

if ( ! function_exists( 'vakker_eltd_pl_image_additional_tag_after' ) ) {
	function vakker_eltd_pl_image_additional_tag_after() {
		
		print '</div>';
	}
}

if ( ! function_exists( 'vakker_eltd_pl_inner_text_additional_tag_before' ) ) {
	function vakker_eltd_pl_inner_text_additional_tag_before() {
		
		print '<div class="eltd-pl-text"><div class="eltd-pl-text-outer"><div class="eltd-pl-text-inner">';
	}
}

if ( ! function_exists( 'vakker_eltd_pl_inner_text_additional_tag_after' ) ) {
	function vakker_eltd_pl_inner_text_additional_tag_after() {
		
		print '</div></div></div>';
	}
}

if ( ! function_exists( 'vakker_eltd_pl_text_wrapper_additional_tag_before' ) ) {
	function vakker_eltd_pl_text_wrapper_additional_tag_before() {
		
		print '<div class="eltd-pl-text-wrapper">';
	}
}

if ( ! function_exists( 'vakker_eltd_pl_text_wrapper_additional_tag_after' ) ) {
	function vakker_eltd_pl_text_wrapper_additional_tag_after() {
		
		print '</div>';
	}
}

if ( ! function_exists( 'vakker_eltd_pl_category_additional_tag_before' ) ) {
	function vakker_eltd_pl_category_additional_tag_before() {
		global $product;
		
		if ( get_option( 'woocommerce_enable_review_rating' ) !== 'no' ) {
			$rating_html = wc_get_rating_html( $product->get_average_rating() );
			
			if ( $rating_html !== '' ) {
				print '<div class="eltd-pl-category-holder">';
			}
		}
	}
}

if ( ! function_exists( 'vakker_eltd_pl_category_additional_tag_after' ) ) {
	function vakker_eltd_pl_category_additional_tag_after() {
		global $product;
		
		if ( get_option( 'woocommerce_enable_review_rating' ) !== 'no' ) {
			$rating_html = wc_get_rating_html( $product->get_average_rating() );
			
			if ( $rating_html !== '' ) {
				print '</div>';
			}
		}
	}
}

if (!function_exists('vakker_eltd_woocommerce_shop_loop_categories')) {
    /**
     * Function that prints html with product categories
     */
    function vakker_eltd_woocommerce_shop_loop_categories(){

        global $product;

        $html = '<h6 class="eltd-pl-categories">';
        $html .= wc_get_product_category_list($product->get_id(), ', ');
        $html .= '</h6>';

        print $html;
    }
}

if ( ! function_exists( 'vakker_eltd_woocommerce_share' ) ) {
	/**
	 * Function that social share for product page
	 * Return array array of WooCommerce pages
	 */
	function vakker_eltd_woocommerce_share() {
		if ( vakker_eltd_options()->getOptionValue( 'enable_social_share' ) == 'yes' && vakker_eltd_options()->getOptionValue( 'enable_social_share_on_product' ) == 'yes' ) :
			print '<div class="eltd-woo-social-share-holder">';
			print '<span>' . esc_html__( 'Share:', 'vakker' ) . '</span>';
			echo vakker_eltd_get_social_share_html();
			print '</div>';
		endif;
	}
}

if ( ! function_exists( 'vakker_eltd_woocommerce_single_product_title' ) ) {
	/**
	 * Function that checks option for single product title and overrides it with filter
	 */
	function vakker_eltd_woocommerce_single_product_title( $show_title_area ) {
		if ( is_singular( 'product' ) ) {
			$woo_title_meta = get_post_meta( get_the_ID(), 'eltd_show_title_area_woo_meta', true );
			
			if ( empty( $woo_title_meta ) ) {
				$woo_title_main = vakker_eltd_options()->getOptionValue( 'show_title_area_woo' );
				
				if ( ! empty( $woo_title_main ) ) {
					$show_title_area = $woo_title_main == 'yes' ? true : false;
				}
			} else {
				$show_title_area = $woo_title_meta == 'yes' ? true : false;
			}
		}
		
		return $show_title_area;
	}
	
	add_filter( 'vakker_eltd_show_title_area', 'vakker_eltd_woocommerce_single_product_title' );
}

if ( ! function_exists( 'vakker_eltd_set_title_text_output_for_woocommerce' ) ) {
	function vakker_eltd_set_title_text_output_for_woocommerce( $title ) {
		
		if ( is_product_category() || is_product_tag() ) {
			global $wp_query;
			
			$tax            = $wp_query->get_queried_object();
			$category_title = $tax->name;
			$title          = $category_title;
		} elseif ( vakker_eltd_is_woocommerce_shop() || is_singular( 'product' ) ) {
			$shop_id = vakker_eltd_get_woo_shop_page_id();
			$title   = $shop_id !== -1 ? get_the_title( $shop_id ) : esc_html__( 'Shop', 'vakker' );
		}
		
		return $title;
	}
	
	add_filter( 'vakker_eltd_title_text', 'vakker_eltd_set_title_text_output_for_woocommerce' );
}

if ( ! function_exists( 'vakker_eltd_set_breadcrumbs_output_for_woocommerce' ) ) {
	function vakker_eltd_set_breadcrumbs_output_for_woocommerce( $childContent, $delimiter, $before, $after ) {
		$shop_id = vakker_eltd_get_woo_shop_page_id();
		
		if ( vakker_eltd_is_product_category() ) {
			$childContent = '';
			
			if ( ! empty( $shop_id ) && $shop_id !== -1 ) {
				$childContent .= '<a itemprop="url" href="' . get_permalink( $shop_id ) . '">' . get_the_title( $shop_id ) . '</a>' . $delimiter;
			}
			
			$thisCat = get_category( get_query_var( 'cat' ), false );
			if ( isset( $thisCat->parent ) && $thisCat->parent != 0 ) {
				$childContent .= get_category_parents( $thisCat->parent, true, ' ' . $delimiter );
			}
			
			$childContent .= $before . single_cat_title( '', false ) . $after;
			
		} elseif ( is_singular( 'product' ) ) {
			$childContent = '';
			$product      = wc_get_product( get_the_ID() );
			$categories   = ! empty( $product ) ? wc_get_product_category_list( $product->get_id(), ', ' ) : '';
			
			if ( ! empty( $shop_id ) && $shop_id !== -1 ) {
				$childContent .= '<a itemprop="url" href="' . get_permalink( $shop_id ) . '">' . get_the_title( $shop_id ) . '</a>' . $delimiter;
			}
			
			if ( ! empty( $categories ) ) {
				$childContent .= $categories . $delimiter;
			}
			
			$childContent .= $before . get_the_title() . $after;
			
		} elseif ( vakker_eltd_is_woocommerce_shop() ) {
			$childContent = $before . get_the_title( $shop_id ) . $after;
		}
		
		return $childContent;
	}
	
	add_filter( 'vakker_eltd_breadcrumbs_title_child_output', 'vakker_eltd_set_breadcrumbs_output_for_woocommerce', 10, 4 );
}

if ( ! function_exists( 'vakker_eltd_set_sidebar_layout_for_woocommerce' ) ) {
	function vakker_eltd_set_sidebar_layout_for_woocommerce( $sidebar_layout ) {
		
		if ( is_archive() && ( is_product_category() || is_product_tag() ) ) {
			$sidebar_layout = vakker_eltd_get_meta_field_intersect( 'sidebar_layout', vakker_eltd_get_woo_shop_page_id() );
		}
		
		return $sidebar_layout;
	}
	
	add_filter( 'vakker_eltd_sidebar_layout', 'vakker_eltd_set_sidebar_layout_for_woocommerce' );
}

if ( ! function_exists( 'vakker_eltd_set_sidebar_name_for_woocommerce' ) ) {
	function vakker_eltd_set_sidebar_name_for_woocommerce( $sidebar_name ) {
		
		if ( is_archive() && ( is_product_category() || is_product_tag() ) ) {
			$sidebar_name = vakker_eltd_get_meta_field_intersect( 'custom_sidebar_area', vakker_eltd_get_woo_shop_page_id() );
		}
		
		return $sidebar_name;
	}
	
	add_filter( 'vakker_eltd_sidebar_name', 'vakker_eltd_set_sidebar_name_for_woocommerce' );
}