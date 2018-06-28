<?php

class VakkerElatedWoocommerceDropdownCart extends VakkerElatedWidget
{
    public function __construct() {
        parent::__construct(
            'eltd_woocommerce_dropdown_cart',
            esc_html__('Elated WooCommerce Dropdown Cart', 'vakker'),
            array('description' => esc_html__('Display a shop cart icon with a dropdown that shows products that are in the cart', 'vakker'),)
        );

        $this->setParams();
    }

    protected function setParams() {

        $this->params = array(
            array(
                'type'        => 'textfield',
                'name'        => 'woocommerce_dropdown_cart_margin',
                'title'       => esc_html__('Icon Margin', 'vakker'),
                'description' => esc_html__('Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'vakker')
            )
        );
    }

    public function widget($args, $instance) {
        extract($args);

        global $woocommerce;

        $icon_styles = array();

        if ($instance['woocommerce_dropdown_cart_margin'] !== '') {
            $icon_styles[] = 'padding: ' . $instance['woocommerce_dropdown_cart_margin'];
        }

        $cart_is_empty = sizeof($woocommerce->cart->get_cart()) <= 0;
        ?>
        <div class="eltd-shopping-cart-holder" <?php vakker_eltd_inline_style($icon_styles) ?>>
            <div class="eltd-shopping-cart-inner">
                <a itemprop="url" class="eltd-header-cart"
                   href="<?php echo esc_url(wc_get_cart_url()); ?>">
                    <span class="eltd-cart-icon icon_cart_alt">
                        <span class="eltd-cart-number"><?php echo sprintf(_n('%d', '%d', WC()->cart->cart_contents_count, 'vakker'), WC()->cart->cart_contents_count); ?></span>
                    </span>
                </a>
                <div class="eltd-shopping-cart-dropdown">
                    <ul>
                        <?php if (!$cart_is_empty) : ?>
                            <?php foreach ($woocommerce->cart->get_cart() as $cart_item_key => $cart_item) :
                                $_product = $cart_item['data'];
                                // Only display if allowed
                                if (!$_product->exists() || $cart_item['quantity'] == 0) {
                                    continue;
                                }
                                // Get price
                                $product_price = get_option('woocommerce_tax_display_cart') == 'excl' ? wc_get_price_excluding_tax($_product) : wc_get_price_including_tax($_product);
                                ?>
                                <li>
                                    <div class="eltd-item-image-holder">
                                        <a itemprop="url" href="<?php echo esc_url(get_permalink($cart_item['product_id'])); ?>">
                                            <?php echo wp_kses($_product->get_image(), array(
                                                'img' => array(
                                                    'src'    => true,
                                                    'width'  => true,
                                                    'height' => true,
                                                    'class'  => true,
                                                    'alt'    => true,
                                                    'title'  => true,
                                                    'id'     => true
                                                )
                                            )); ?>
                                        </a>
                                    </div>
                                    <div class="eltd-item-info-holder">
                                        <h4 itemprop="name" class="eltd-product-title">
	                                        <a itemprop="url" href="<?php echo esc_url(get_permalink($cart_item['product_id'])); ?>"><?php echo apply_filters('vakker_eltd_woo_widget_cart_product_title', $_product->get_name(), $_product); ?></a>
                                        </h4>
                                        <span class="eltd-quantity"><?php esc_html_e('Quantity: ', 'vakker'); echo esc_html($cart_item['quantity']); ?></span>
                                        <?php echo apply_filters('vakker_eltd_woo_cart_item_price_html', wc_price($product_price), $cart_item, $cart_item_key); ?>
                                        <?php echo apply_filters('vakker_eltd_woo_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s"><span class="icon-arrows-remove"></span></a>', esc_url($woocommerce->cart->get_remove_url($cart_item_key)), esc_html__('Remove this item', 'vakker')), $cart_item_key); ?>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                            <li class="eltd-cart-bottom">
                                <div class="eltd-subtotal-holder clearfix">
                                    <h4 class="eltd-total"><?php esc_html_e('Total', 'vakker'); ?></h4>
                                    <h4 class="eltd-total-amount">
										<?php echo wp_kses($woocommerce->cart->get_cart_subtotal(), array(
                                            'span' => array(
                                                'class' => true,
                                                'id'    => true
                                            )
                                        )); ?>
									</h4>
                                </div>
                                <div class="eltd-btn-holder clearfix">
                                    <a itemprop="url" href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" class="eltd-view-cart eltd-btn eltd-btn-outline" data-title="<?php esc_attr_e('VIEW CART','vakker'); ?>"><span class="eltd-btn-cover"></span><span class="eltd-btn-text"><?php esc_html_e('VIEW CART','vakker'); ?></span><span class="eltd-btn-background"></span></a>
                                </div>
                                <div class="eltd-btn-holder clearfix">
                                    <a itemprop="url" href="<?php echo esc_url($woocommerce->cart->get_checkout_url()); ?>" class="eltd-view-checkout eltd-btn eltd-btn-outline" data-title="<?php esc_attr_e('CHECKOUT','vakker'); ?>"><span class="eltd-btn-cover"></span><span class="eltd-btn-text"><?php esc_html_e('CHECKOUT','vakker'); ?></span><span class="eltd-btn-background"></span></a>
                                </div>
                            </li>
                        <?php else : ?>
                            <li class="eltd-empty-cart"><?php esc_html_e('No products in the cart.', 'vakker'); ?></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php
    }
}

add_filter('woocommerce_add_to_cart_fragments', 'vakker_eltd_woocommerce_header_add_to_cart_fragment');

function vakker_eltd_woocommerce_header_add_to_cart_fragment($fragments) {
    global $woocommerce;

    ob_start();

    $cart_is_empty = sizeof($woocommerce->cart->get_cart()) <= 0;
    ?>
    <div class="eltd-shopping-cart-inner">
        <a itemprop="url" class="eltd-header-cart" href="<?php echo esc_url(wc_get_cart_url()); ?>">
            <span class="eltd-cart-icon icon_cart_alt">
                <span class="eltd-cart-number"><?php echo sprintf(_n('%d', '%d', WC()->cart->cart_contents_count, 'vakker'), WC()->cart->cart_contents_count); ?></span>
            </span>
        </a>
        <div class="eltd-shopping-cart-dropdown">
            <ul>
                <?php if (!$cart_is_empty) : ?>
                    <?php foreach ($woocommerce->cart->get_cart() as $cart_item_key => $cart_item) :
                        $_product = $cart_item['data'];
                        // Only display if allowed
                        if (!$_product->exists() || $cart_item['quantity'] == 0) {
                            continue;
                        }
                        // Get price
                        $product_price = get_option('woocommerce_tax_display_cart') == 'excl' ? wc_get_price_excluding_tax($_product) : wc_get_price_including_tax($_product);
                        ?>
                        <li>
                            <div class="eltd-item-image-holder">
                                <a itemprop="url" href="<?php echo esc_url(get_permalink($cart_item['product_id'])); ?>">
                                    <?php echo wp_kses($_product->get_image(), array(
                                        'img' => array(
                                            'src'    => true,
                                            'width'  => true,
                                            'height' => true,
                                            'class'  => true,
                                            'alt'    => true,
                                            'title'  => true,
                                            'id'     => true
                                        )
                                    )); ?>
                                </a>
                            </div>
                            <div class="eltd-item-info-holder">
                                <h4 itemprop="name" class="eltd-product-title">
	                                <a itemprop="url" href="<?php echo esc_url(get_permalink($cart_item['product_id'])); ?>"><?php echo apply_filters('vakker_eltd_woo_widget_cart_product_title', $_product->get_name(), $_product); ?></a>
                                </h4>
                                <span class="eltd-quantity"><?php esc_html_e('Quantity: ', 'vakker'); echo esc_html($cart_item['quantity']); ?></span>
                                <?php echo apply_filters('vakker_eltd_woo_cart_item_price_html', wc_price($product_price), $cart_item, $cart_item_key); ?>
                                <?php echo apply_filters('vakker_eltd_woo_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s"><span class="icon-arrows-remove"></span></a>', esc_url($woocommerce->cart->get_remove_url($cart_item_key)), esc_html__('Remove this item', 'vakker')), $cart_item_key); ?>
                            </div>
                        </li>
                    <?php endforeach; ?>
                    <li class="eltd-cart-bottom">
                        <div class="eltd-subtotal-holder clearfix">
                            <h4 class="eltd-total"><?php esc_html_e('Total', 'vakker'); ?></h4>
                            <h4 class="eltd-total-amount">
								<?php echo wp_kses($woocommerce->cart->get_cart_subtotal(), array(
                                    'span' => array(
                                        'class' => true,
                                        'id'    => true
                                    )
                                )); ?>
							</h4>
                        </div>
                        <div class="eltd-btn-holder clearfix">
                            <a itemprop="url" href="<?php echo esc_url($woocommerce->cart->get_cart_url()); ?>" class="eltd-view-cart eltd-btn eltd-btn-outline" data-title="<?php esc_attr_e('VIEW CART','vakker'); ?>"><span class="eltd-btn-cover"></span><span class="eltd-btn-text"><?php esc_html_e('VIEW CART','vakker'); ?></span><span class="eltd-btn-background"></span></a>
                        </div>
                        <div class="eltd-btn-holder clearfix">
                            <a itemprop="url" href="<?php echo esc_url($woocommerce->cart->get_checkout_url()); ?>" class="eltd-view-checkout eltd-btn eltd-btn-outline" data-title="<?php esc_attr_e('CHECKOUT','vakker'); ?>"><span class="eltd-btn-cover"></span><span class="eltd-btn-text"><?php esc_html_e('CHECKOUT','vakker'); ?></span><span class="eltd-btn-background"></span></a>
                        </div>
                    </li>
                <?php else : ?>
                    <li class="eltd-empty-cart"><?php esc_html_e('No products in the cart.', 'vakker'); ?></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    <?php
    $fragments['div.eltd-shopping-cart-inner'] = ob_get_clean();

    return $fragments;
}

?>