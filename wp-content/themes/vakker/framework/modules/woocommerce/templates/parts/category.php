<?php

if($display_category === 'yes') {
	$product            = vakker_eltd_return_woocommerce_global_variable();
	$product_categories = wc_get_product_category_list( $product->get_id(), ', ' );
	
	if (!empty($product_categories)) { ?>
		<h6 class="eltd-<?php echo esc_attr($class_name); ?>-category"><?php echo wp_kses_post($product_categories); ?></h6>
	<?php } ?>
<?php } ?>