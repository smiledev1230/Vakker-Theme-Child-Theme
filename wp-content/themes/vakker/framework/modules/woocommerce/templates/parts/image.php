<?php

$product_image_size = 'shop_catalog';
if($image_size === 'full') {
	$product_image_size = 'full';
} else if ($image_size === 'square') {
	$product_image_size = 'vakker_eltd_square';
} else if ($image_size === 'landscape') {
	$product_image_size = 'vakker_eltd_landscape';
} else if ($image_size === 'portrait') {
	$product_image_size = 'vakker_eltd_portrait';
} else if ($image_size === 'medium') {
	$product_image_size = 'medium';
} else if ($image_size === 'large') {
	$product_image_size = 'large';
} else if ($image_size === 'shop_thumbnail') {
	$product_image_size = 'shop_thumbnail';
}

if(has_post_thumbnail()) {
	the_post_thumbnail(apply_filters( 'vakker_eltd_product_list_image_size', $product_image_size));
}