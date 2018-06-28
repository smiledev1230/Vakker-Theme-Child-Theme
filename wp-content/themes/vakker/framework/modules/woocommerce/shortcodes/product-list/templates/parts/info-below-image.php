<?php
$product = vakker_eltd_return_woocommerce_global_variable();
$item_classes           = $this_object->getItemClasses( $params );
$text_wrapper_styles    = $this_object->getTextWrapperStyles( $params );
$params['title_styles'] = $this_object->getTitleStyles( $params );
?>
<div class="eltd-pli eltd-item-space <?php echo esc_html( $item_classes ); ?>">
    <?php

    if ($product->is_on_sale()) { ?>
        <span class="eltd-<?php echo esc_attr($class_name); ?>-onsale"><?php esc_html_e('SALE', 'vakker'); ?></span>
    <?php } ?>

    <?php if (!$product->is_in_stock()) { ?>
        <span class="eltd-<?php echo esc_attr($class_name); ?>-out-of-stock"><?php esc_html_e('OUT OF STOCK', 'vakker'); ?></span>
    <?php }
    ?>
	<div class="eltd-pli-inner">
		<div class="eltd-pli-image">
			<?php vakker_eltd_get_module_template_part( 'templates/parts/image', 'woocommerce', '', $params ); ?>
		</div>
		<div class="eltd-pli-text">
			<div class="eltd-pli-text-outer">
				<div class="eltd-pli-text-inner">
					<?php vakker_eltd_get_module_template_part( 'templates/parts/add-to-cart', 'woocommerce', '', $params ); ?>
				</div>
			</div>
		</div>
		<a class="eltd-pli-link" itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
	</div>
	<div class="eltd-pli-text-wrapper" <?php echo vakker_eltd_get_inline_style( $text_wrapper_styles ); ?>>
		<?php vakker_eltd_get_module_template_part( 'templates/parts/title', 'woocommerce', '', $params ); ?>
		
		<?php vakker_eltd_get_module_template_part( 'templates/parts/category', 'woocommerce', '', $params ); ?>
		
		<?php vakker_eltd_get_module_template_part( 'templates/parts/excerpt', 'woocommerce', '', $params ); ?>
		
		<?php vakker_eltd_get_module_template_part( 'templates/parts/rating', 'woocommerce', '', $params ); ?>
		
		<?php vakker_eltd_get_module_template_part( 'templates/parts/price', 'woocommerce', '', $params ); ?>
	</div>
</div>