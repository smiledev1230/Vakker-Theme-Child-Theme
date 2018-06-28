<?php

if(!function_exists('vakker_eltd_design_styles')) {
    /**
     * Generates general custom styles
     */
    function vakker_eltd_design_styles() {
	    $font_family = vakker_eltd_options()->getOptionValue( 'google_fonts' );
	    if ( ! empty( $font_family ) && vakker_eltd_is_font_option_valid( $font_family ) ) {
		    $font_family_selector = array(
			    'body'
		    );
		    echo vakker_eltd_dynamic_css( $font_family_selector, array( 'font-family' => vakker_eltd_get_font_option_val( $font_family ) ) );
	    }

		$first_main_color = vakker_eltd_options()->getOptionValue('first_color');
        if(!empty($first_main_color)) {
            $color_selector = array(
                'a:hover',
                'h1 a:hover',
                'h2 a:hover',
                'h3 a:hover',
                'h4 a:hover',
                'h5 a:hover',
                'h6 a:hover',
                'p a:hover',
                'blockquote:before',
                'footer .widget a:hover',
                'footer .widget ul li:not(.eltd-bl-item) a:hover',
                'footer .widget #wp-calendar tfoot a:hover',
                'footer .widget.widget_search .input-holder button:hover',
                '.eltd-fullscreen-sidebar .widget a:hover',
                '.eltd-fullscreen-sidebar .widget ul li:not(.eltd-bl-item) a:hover',
                '.eltd-fullscreen-sidebar .widget #wp-calendar tfoot a:hover',
                '.eltd-fullscreen-sidebar .widget.widget_search .input-holder button:hover',
                '.eltd-side-menu .widget a:hover',
                '.eltd-side-menu .widget ul li:not(.eltd-bl-item) a:hover',
                '.eltd-side-menu .widget #wp-calendar tfoot a:hover',
                '.eltd-side-menu .widget.widget_search .input-holder button:hover',
                '.wpb_widgetised_column .widget a:hover',
                'aside.eltd-sidebar .widget a:hover',
                '.wpb_widgetised_column .widget ul li:not(.eltd-bl-item) a:hover',
                'aside.eltd-sidebar .widget ul li:not(.eltd-bl-item) a:hover',
                '.wpb_widgetised_column .widget #wp-calendar tfoot a:hover',
                'aside.eltd-sidebar .widget #wp-calendar tfoot a:hover',
                '.wpb_widgetised_column .widget.widget_search .input-holder button:hover',
                'aside.eltd-sidebar .widget.widget_search .input-holder button:hover',
                '.wpb_widgetised_column .widget.widget_nav_menu ul.menu>li>a:hover',
                '.wpb_widgetised_column .widget.widget_nav_menu ul.menu>li>ul.sub-menu>li.current_page_item a',
                '.wpb_widgetised_column .widget.widget_nav_menu ul.menu>li>ul.sub-menu>li>a:hover',
                'aside.eltd-sidebar .widget.widget_nav_menu ul.menu>li>a:hover',
                'aside.eltd-sidebar .widget.widget_nav_menu ul.menu>li>ul.sub-menu>li.current_page_item a',
                'aside.eltd-sidebar .widget.widget_nav_menu ul.menu>li>ul.sub-menu>li>a:hover',
                '.widget.widget_rss .eltd-widget-title .rsswidget:hover',
                '.widget.widget_search button:hover',
                '.widget.widget_tag_cloud a:hover',
                '.eltd-page-footer .widget.widget_rss .eltd-footer-widget-title .rsswidget:hover',
                '.eltd-side-menu .widget.widget_rss .eltd-footer-widget-title .rsswidget:hover',
                '.eltd-page-footer .widget.widget_search button:hover',
                '.eltd-side-menu .widget.widget_search button:hover',
                '.eltd-top-bar a:hover',
                '.widget.widget_eltd_twitter_widget .eltd-twitter-widget.eltd-twitter-standard li .eltd-twitter-icon',
                '.widget a:hover',
                '.widget ul li:not(.eltd-bl-item) a:hover',
                '.widget #wp-calendar tfoot a:hover',
                '.widget.widget_search .input-holder button:hover',
                '.widget.widget_eltd_twitter_widget .eltd-twitter-widget.eltd-twitter-slider li .eltd-tweet-text a',
                '.widget.widget_eltd_twitter_widget .eltd-twitter-widget.eltd-twitter-slider li .eltd-tweet-text span',
                '.widget.widget_eltd_twitter_widget .eltd-twitter-widget.eltd-twitter-standard li .eltd-tweet-text a:hover',
                '.widget.widget_eltd_twitter_widget .eltd-twitter-widget.eltd-twitter-slider li .eltd-twitter-icon i',
                '.eltd-blog-holder article.sticky .eltd-post-title a',
                '.eltd-blog-holder article .eltd-post-info-top>div a:hover',
                '.eltd-blog-holder article.format-link .eltd-post-mark .eltd-link-mark',
                '.eltd-blog-holder article.format-quote .eltd-post-mark .eltd-quote-mark',
                '.eltd-blog-pagination ul li a.eltd-pag-active',
                '.eltd-bl-standard-pagination ul li.eltd-bl-pag-active a',
                '.eltd-author-description .eltd-author-description-text-holder .eltd-author-name a:hover',
                '.eltd-author-description .eltd-author-description-text-holder .eltd-author-social-icons a:hover',
                '.eltd-blog-list-holder .eltd-bli-info>div a:hover',
                '.eltd-main-menu ul li a:hover',
                'nav.eltd-fullscreen-menu ul li ul li.current-menu-ancestor>a',
                'nav.eltd-fullscreen-menu ul li ul li.current-menu-item>a',
                'nav.eltd-fullscreen-menu>ul>li.eltd-active-item>a',
                '.eltd-header-vertical .eltd-vertical-menu ul li a:hover',
                '.eltd-mobile-header .eltd-mobile-menu-opener.eltd-mobile-menu-opened a',
                '.eltd-mobile-header .eltd-mobile-nav .eltd-grid>ul>li.eltd-active-item>a',
                '.eltd-mobile-header .eltd-mobile-nav .eltd-grid>ul>li.eltd-active-item>h6',
                '.eltd-mobile-header .eltd-mobile-nav ul li a:hover',
                '.eltd-mobile-header .eltd-mobile-nav ul li h6:hover',
                '.eltd-mobile-header .eltd-mobile-nav ul ul li.current-menu-ancestor>a',
                '.eltd-mobile-header .eltd-mobile-nav ul ul li.current-menu-ancestor>h6',
                '.eltd-mobile-header .eltd-mobile-nav ul ul li.current-menu-item>a',
                '.eltd-mobile-header .eltd-mobile-nav ul ul li.current-menu-item>h6',
                '.eltd-page-header .eltd-search-widget-holder .eltd-search-opener:hover',
                '.eltd-search-widget-holder .eltd-search-opener:hover',
                '.eltd-search-page-holder article.sticky .eltd-post-title a',
                '.eltd-side-menu-button-opener.opened',
                '.eltd-side-menu-button-opener:hover',
                '.eltd-pl-filter-holder ul li.eltd-pl-current span',
                '.eltd-pl-filter-holder ul li:hover span',
                '.eltd-pl-standard-pagination ul li.eltd-pl-pag-active a',
                '.eltd-team-single-holder .eltd-ts-info-row .eltd-ts-bio-icon',
                '.eltd-team.info-bellow .eltd-team-image .eltd-team-hover',
                '.eltd-team.info-bellow .eltd-team-name:hover',
                '.eltd-testimonials-holder.eltd-testimonials-standard .eltd-testimonial-content .eltd-testimonial-mark',
                '.eltd-banner-holder .eltd-banner-link-text .eltd-banner-link-hover span',
                '.eltd-price-table .eltd-pt-inner ul li.eltd-pt-prices .eltd-pt-price',
                '.eltd-social-share-holder.eltd-dropdown .eltd-social-share-dropdown-opener:hover',
                '.eltd-twitter-list-holder .eltd-twitter-icon',
                '.eltd-twitter-list-holder .eltd-tweet-text a:hover',
                '.eltd-twitter-list-holder .eltd-twitter-profile a:hover'
            );

            $woo_color_selector = array();
            if(vakker_eltd_is_woocommerce_installed()) {
                $woo_color_selector = array(
                    '.eltd-pl-holder .eltd-pli .eltd-pli-rating',
                    '.eltd-woo-single-page .woocommerce-tabs #reviews .comment-respond .stars a.active:after',
                    '.eltd-woo-single-page .woocommerce-tabs #reviews .comment-respond .stars a:before',
                    '.woocommerce .star-rating',
                    '.woocommerce-pagination .page-numbers li a.current',
                    '.woocommerce-pagination .page-numbers li a:hover',
                    '.woocommerce-pagination .page-numbers li span.current',
                    '.woocommerce-pagination .page-numbers li span:hover',
                    '.woocommerce-page .eltd-content .eltd-quantity-buttons .eltd-quantity-minus:hover',
                    '.woocommerce-page .eltd-content .eltd-quantity-buttons .eltd-quantity-plus:hover',
                    'div.woocommerce .eltd-quantity-buttons .eltd-quantity-minus:hover',
                    'div.woocommerce .eltd-quantity-buttons .eltd-quantity-plus:hover',
                    '.eltd-woo-single-page .eltd-single-product-summary .product_meta>span a:hover',
                    '.widget.woocommerce.widget_layered_nav ul li.chosen a'
                );
            }

            $color_selector = array_merge($color_selector, $woo_color_selector);

	        $color_important_selector = array(
                '.eltd-header-vertical-sliding .eltd-vertical-menu-nav-holder-outer .eltd-vertical-menu-nav-holder nav.eltd-fullscreen-menu ul li a:hover',
                '.eltd-light-header .eltd-page-header>div:not(.eltd-sticky-header):not(.fixed) .eltd-search-opener:hover',
                '.eltd-light-header .eltd-top-bar .eltd-search-opener:hover',
                '.eltd-dark-header .eltd-page-header>div:not(.eltd-sticky-header):not(.fixed) .eltd-search-opener:hover',
                '.eltd-dark-header .eltd-top-bar .eltd-search-opener:hover'
	        );

            $background_color_selector = array(
                '.eltd-st-loader .pulse',
                '.eltd-st-loader .double_pulse .double-bounce1',
                '.eltd-st-loader .double_pulse .double-bounce2',
                '.eltd-st-loader .cube',
                '.eltd-st-loader .rotating_cubes .cube1',
                '.eltd-st-loader .rotating_cubes .cube2',
                '.eltd-st-loader .stripes>div',
                '.eltd-st-loader .wave>div',
                '.eltd-st-loader .two_rotating_circles .dot1',
                '.eltd-st-loader .two_rotating_circles .dot2',
                '.eltd-st-loader .five_rotating_circles .container1>div',
                '.eltd-st-loader .five_rotating_circles .container2>div',
                '.eltd-st-loader .five_rotating_circles .container3>div',
                '.eltd-st-loader .atom .ball-1:before',
                '.eltd-st-loader .atom .ball-2:before',
                '.eltd-st-loader .atom .ball-3:before',
                '.eltd-st-loader .atom .ball-4:before',
                '.eltd-st-loader .clock .ball:before',
                '.eltd-st-loader .mitosis .ball',
                '.eltd-st-loader .lines .line1',
                '.eltd-st-loader .lines .line2',
                '.eltd-st-loader .lines .line3',
                '.eltd-st-loader .lines .line4',
                '.eltd-st-loader .fussion .ball',
                '.eltd-st-loader .fussion .ball-1',
                '.eltd-st-loader .fussion .ball-2',
                '.eltd-st-loader .fussion .ball-3',
                '.eltd-st-loader .fussion .ball-4',
                '.eltd-st-loader .wave_circles .ball',
                '.eltd-st-loader .pulse_circles .ball',
                '.eltd-comment-holder .eltd-comment-text .comment-edit-link:after',
                '.eltd-comment-holder .eltd-comment-text .comment-reply-link:after',
                '.eltd-comment-holder .eltd-comment-text .replay:after',
                '.eltd-comment-holder .eltd-comment-text #cancel-comment-reply-link:after',
                '#submit_comment:hover',
                '.post-password-form input[type=submit]:hover',
                'input.wpcf7-form-control.wpcf7-submit:hover',
                'footer .widget.widget_tag_cloud a',
                '.eltd-fullscreen-sidebar .widget.widget_tag_cloud a',
                '.eltd-side-menu .widget.widget_tag_cloud a',
                '.wpb_widgetised_column .widget.widget_tag_cloud a',
                'aside.eltd-sidebar .widget.widget_tag_cloud a',
                '.widget.widget_tag_cloud a',
                '.eltd-author-widget .eltd-author-image-holder .eltd-author-title',
                '.eltd-social-icons-group-widget.eltd-square-icons .eltd-social-icon-widget-holder:hover',
                '.eltd-social-icons-group-widget.eltd-square-icons.eltd-light-skin .eltd-social-icon-widget-holder:hover',
                '.eltd-blog-holder article .eltd-post-month',
                '.eltd-blog-holder article.format-audio .eltd-blog-audio-holder .mejs-container .mejs-controls>.mejs-time-rail .mejs-time-total .mejs-time-current',
                '.eltd-blog-holder article.format-audio .eltd-blog-audio-holder .mejs-container .mejs-controls>a.mejs-horizontal-volume-slider .mejs-horizontal-volume-current',
                '.eltd-blog-holder.eltd-blog-single article .eltd-tags-holder .eltd-tags a',
                '.eltd-blog-list-holder .eltd-post-month',
                '.eltd-main-menu>ul>li>a>span.item_outer .item_text:after',
                '.eltd-main-menu>ul>li>a>span.item_outer .item_text:before',
                '.eltd-header-vertical-sliding .eltd-vertical-menu-nav-holder-outer .eltd-vertical-menu-nav-holder nav.eltd-fullscreen-menu>ul>li>a span:after',
                '.eltd-header-vertical-sliding .eltd-vertical-menu-nav-holder-outer .eltd-vertical-menu-nav-holder nav.eltd-fullscreen-menu>ul>li>a span:before',
                '.eltd-header-vertical .eltd-vertical-menu>ul>li>a span.item_text:after',
                '.eltd-header-vertical .eltd-vertical-menu>ul>li>a span.item_text:before',
                '.eltd-portfolio-single-holder .eltd-ps-info-holder .eltd-ps-info-item.eltd-ps-tags a',
                '.eltd-accordion-holder.eltd-ac-boxed .eltd-accordion-title.ui-state-active',
                '.eltd-accordion-holder.eltd-ac-boxed .eltd-accordion-title.ui-state-hover',
                '.eltd-btn.eltd-btn-solid .eltd-btn-cover',
                '.eltd-icon-shortcode.eltd-circle',
                '.eltd-icon-shortcode.eltd-dropcaps.eltd-circle',
                '.eltd-icon-shortcode.eltd-square',
                '.eltd-progress-bar .eltd-pb-content-holder .eltd-pb-content',
                '.eltd-tabs.eltd-tabs-standard .eltd-tabs-nav li.ui-state-active a',
                '.eltd-tabs.eltd-tabs-standard .eltd-tabs-nav li.ui-state-hover a',
                '.eltd-tabs.eltd-tabs-boxed .eltd-tabs-nav li.ui-state-active a',
                '.eltd-tabs.eltd-tabs-boxed .eltd-tabs-nav li.ui-state-hover a',
                '.eltd-tabs.eltd-tabs-simple .eltd-tabs-nav li a:after',
                '.eltd-tabs.eltd-tabs-simple .eltd-tabs-nav li.ui-state-active a:after',
                '.eltd-tabs.eltd-tabs-simple .eltd-tabs-nav li.ui-state-hover a:after',
                '.eltd-tabs.eltd-tabs-vertical .eltd-tabs-nav li a:after'
            );

            $woo_background_color_selector = array();
            if(vakker_eltd_is_woocommerce_installed()) {
                $woo_background_color_selector = array(
                    '.woocommerce-page .eltd-content .wc-forward:not(.added_to_cart):not(.checkout-button) .eltd-btn-cover',
                    '.woocommerce-page .eltd-content a.added_to_cart .eltd-btn-cover',
                    '.woocommerce-page .eltd-content a.button .eltd-btn-cover',
                    '.woocommerce-page .eltd-content button[type=submit]:not(.eltd-woo-search-widget-button) .eltd-btn-cover',
                    '.woocommerce-page .eltd-content input[type=submit] .eltd-btn-cover',
                    'div.woocommerce .wc-forward:not(.added_to_cart):not(.checkout-button) .eltd-btn-cover',
                    'div.woocommerce a.added_to_cart .eltd-btn-cover',
                    'div.woocommerce a.button .eltd-btn-cover',
                    'div.woocommerce button[type=submit]:not(.eltd-woo-search-widget-button) .eltd-btn-cover',
                    'div.woocommerce input[type=submit] .eltd-btn-cover',
                    '.woocommerce-page .eltd-content .wc-forward:not(.added_to_cart):not(.checkout-button):hover',
                    '.woocommerce-page .eltd-content a.added_to_cart:hover',
                    '.woocommerce-page .eltd-content a.button:hover',
                    '.woocommerce-page .eltd-content button[type=submit]:not(.eltd-woo-search-widget-button):hover',
                    '.woocommerce-page .eltd-content input[type=submit]:hover',
                    'div.woocommerce .wc-forward:not(.added_to_cart):not(.checkout-button):hover',
                    'div.woocommerce a.added_to_cart:hover',
                    'div.woocommerce a.button:hover',
                    'div.woocommerce button[type=submit]:not(.eltd-woo-search-widget-button):hover',
                    'div.woocommerce input[type=submit]:hover',
                    '.woocommerce .eltd-onsale',
                    '.woocommerce .eltd-out-of-stock',
                    'ul.products>.product .added_to_cart:after',
                    'ul.products>.product .button:after',
                    '.eltd-woo-single-page .woocommerce-tabs ul.tabs>li a:after',
                    '.eltd-woo-single-page .woocommerce-tabs ul.tabs>li.active a:after',
                    '.eltd-woo-single-page .woocommerce-tabs ul.tabs>li:hover a:after',
                    '.eltd-shopping-cart-holder .eltd-header-cart .eltd-cart-icon .eltd-cart-number',
                    '.widget.woocommerce.widget_price_filter .price_slider_wrapper .ui-widget-content .ui-slider-handle',
                    '.widget.woocommerce.widget_product_tag_cloud .tagcloud a',
                    '.eltd-pl-holder .eltd-pli .eltd-pli-onsale',
                    '.eltd-pl-holder .eltd-pli .eltd-pli-out-of-stock',
                    '.eltd-pl-holder .eltd-pli-inner .eltd-pli-text-inner .added_to_cart:after',
                    '.eltd-pl-holder .eltd-pli-inner .eltd-pli-text-inner .button:after'
                );
            }

            $background_color_selector = array_merge($background_color_selector, $woo_background_color_selector);

            $border_color_selector = array(
                '.eltd-st-loader .pulse_circles .ball',
                '#eltd-back-to-top',
                'footer .widget.widget_tag_cloud a',
                '.eltd-fullscreen-sidebar .widget.widget_tag_cloud a',
                '.eltd-side-menu .widget.widget_tag_cloud a',
                '.wpb_widgetised_column .widget.widget_tag_cloud a',
                'aside.eltd-sidebar .widget.widget_tag_cloud a',
                '.widget.widget_tag_cloud a',
                '.eltd-blog-holder.eltd-blog-single article .eltd-tags-holder .eltd-tags a',
                '.eltd-scrollable-widget-holder .widget.eltd-scroll-text-widget #eltd-back-to-top',
                '.eltd-search-widget-holder .eltd-search-field:focus',
                '.eltd-portfolio-single-holder .eltd-ps-info-holder .eltd-ps-info-item.eltd-ps-tags a',
                '.widget.woocommerce.widget_product_tag_cloud .tagcloud a'
            );

            echo vakker_eltd_dynamic_css($color_selector, array('color' => $first_main_color));
	        echo vakker_eltd_dynamic_css($color_important_selector, array('color' => $first_main_color.'!important'));
	        echo vakker_eltd_dynamic_css($background_color_selector, array('background-color' => $first_main_color));
	        echo vakker_eltd_dynamic_css($border_color_selector, array('border-color' => $first_main_color));
        }
	
	    $page_background_color = vakker_eltd_options()->getOptionValue( 'page_background_color' );
	    if ( ! empty( $page_background_color ) ) {
		    $background_color_selector = array(
			    'body',
			    '.eltd-content'
		    );
		    echo vakker_eltd_dynamic_css( $background_color_selector, array( 'background-color' => $page_background_color ) );
	    }
	
	    $selection_color = vakker_eltd_options()->getOptionValue( 'selection_color' );
	    if ( ! empty( $selection_color ) ) {
		    echo vakker_eltd_dynamic_css( '::selection', array( 'background' => $selection_color ) );
		    echo vakker_eltd_dynamic_css( '::-moz-selection', array( 'background' => $selection_color ) );
	    }
	
	    $preload_background_styles = array();
	
	    if ( vakker_eltd_options()->getOptionValue( 'preload_pattern_image' ) !== "" ) {
		    $preload_background_styles['background-image'] = 'url(' . vakker_eltd_options()->getOptionValue( 'preload_pattern_image' ) . ') !important';
	    }
	
	    echo vakker_eltd_dynamic_css( '.eltd-preload-background', $preload_background_styles );
    }

    add_action('vakker_eltd_style_dynamic', 'vakker_eltd_design_styles');
}

if ( ! function_exists( 'vakker_eltd_content_styles' ) ) {
	function vakker_eltd_content_styles() {
		$content_style = array();
		
		$padding_top = vakker_eltd_options()->getOptionValue( 'content_top_padding' );
		if ( $padding_top !== '' ) {
			$content_style['padding-top'] = vakker_eltd_filter_px( $padding_top ) . 'px';
		}
		
		$content_selector = array(
			'.eltd-content .eltd-content-inner > .eltd-full-width > .eltd-full-width-inner',
		);
		
		echo vakker_eltd_dynamic_css( $content_selector, $content_style );
		
		$content_style_in_grid = array();
		
		$padding_top_in_grid = vakker_eltd_options()->getOptionValue( 'content_top_padding_in_grid' );
		if ( $padding_top_in_grid !== '' ) {
			$content_style_in_grid['padding-top'] = vakker_eltd_filter_px( $padding_top_in_grid ) . 'px';
		}
		
		$content_selector_in_grid = array(
			'.eltd-content .eltd-content-inner > .eltd-container > .eltd-container-inner',
		);
		
		echo vakker_eltd_dynamic_css( $content_selector_in_grid, $content_style_in_grid );
	}
	
	add_action( 'vakker_eltd_style_dynamic', 'vakker_eltd_content_styles' );
}

if ( ! function_exists( 'vakker_eltd_h1_styles' ) ) {
	function vakker_eltd_h1_styles() {
		$margin_top    = vakker_eltd_options()->getOptionValue( 'h1_margin_top' );
		$margin_bottom = vakker_eltd_options()->getOptionValue( 'h1_margin_bottom' );
		
		$item_styles = vakker_eltd_get_typography_styles( 'h1' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = vakker_eltd_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = vakker_eltd_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h1'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo vakker_eltd_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic', 'vakker_eltd_h1_styles' );
}

if ( ! function_exists( 'vakker_eltd_h2_styles' ) ) {
	function vakker_eltd_h2_styles() {
		$margin_top    = vakker_eltd_options()->getOptionValue( 'h2_margin_top' );
		$margin_bottom = vakker_eltd_options()->getOptionValue( 'h2_margin_bottom' );
		
		$item_styles = vakker_eltd_get_typography_styles( 'h2' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = vakker_eltd_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = vakker_eltd_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h2'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo vakker_eltd_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic', 'vakker_eltd_h2_styles' );
}

if ( ! function_exists( 'vakker_eltd_h3_styles' ) ) {
	function vakker_eltd_h3_styles() {
		$margin_top    = vakker_eltd_options()->getOptionValue( 'h3_margin_top' );
		$margin_bottom = vakker_eltd_options()->getOptionValue( 'h3_margin_bottom' );
		
		$item_styles = vakker_eltd_get_typography_styles( 'h3' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = vakker_eltd_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = vakker_eltd_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h3'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo vakker_eltd_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic', 'vakker_eltd_h3_styles' );
}

if ( ! function_exists( 'vakker_eltd_h4_styles' ) ) {
	function vakker_eltd_h4_styles() {
		$margin_top    = vakker_eltd_options()->getOptionValue( 'h4_margin_top' );
		$margin_bottom = vakker_eltd_options()->getOptionValue( 'h4_margin_bottom' );
		
		$item_styles = vakker_eltd_get_typography_styles( 'h4' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = vakker_eltd_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = vakker_eltd_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h4'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo vakker_eltd_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic', 'vakker_eltd_h4_styles' );
}

if ( ! function_exists( 'vakker_eltd_h5_styles' ) ) {
	function vakker_eltd_h5_styles() {
		$margin_top    = vakker_eltd_options()->getOptionValue( 'h5_margin_top' );
		$margin_bottom = vakker_eltd_options()->getOptionValue( 'h5_margin_bottom' );
		
		$item_styles = vakker_eltd_get_typography_styles( 'h5' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = vakker_eltd_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = vakker_eltd_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h5'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo vakker_eltd_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic', 'vakker_eltd_h5_styles' );
}

if ( ! function_exists( 'vakker_eltd_h6_styles' ) ) {
	function vakker_eltd_h6_styles() {
		$margin_top    = vakker_eltd_options()->getOptionValue( 'h6_margin_top' );
		$margin_bottom = vakker_eltd_options()->getOptionValue( 'h6_margin_bottom' );
		
		$item_styles = vakker_eltd_get_typography_styles( 'h6' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = vakker_eltd_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = vakker_eltd_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h6'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo vakker_eltd_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic', 'vakker_eltd_h6_styles' );
}

if ( ! function_exists( 'vakker_eltd_text_styles' ) ) {
	function vakker_eltd_text_styles() {
		$item_styles = vakker_eltd_get_typography_styles( 'text' );
		
		$item_selector = array(
			'p'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo vakker_eltd_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic', 'vakker_eltd_text_styles' );
}

if ( ! function_exists( 'vakker_eltd_link_styles' ) ) {
	function vakker_eltd_link_styles() {
		$link_styles      = array();
		$link_color       = vakker_eltd_options()->getOptionValue( 'link_color' );
		$link_font_style  = vakker_eltd_options()->getOptionValue( 'link_fontstyle' );
		$link_font_weight = vakker_eltd_options()->getOptionValue( 'link_fontweight' );
		$link_decoration  = vakker_eltd_options()->getOptionValue( 'link_fontdecoration' );
		
		if ( ! empty( $link_color ) ) {
			$link_styles['color'] = $link_color;
		}
		if ( ! empty( $link_font_style ) ) {
			$link_styles['font-style'] = $link_font_style;
		}
		if ( ! empty( $link_font_weight ) ) {
			$link_styles['font-weight'] = $link_font_weight;
		}
		if ( ! empty( $link_decoration ) ) {
			$link_styles['text-decoration'] = $link_decoration;
		}
		
		$link_selector = array(
			'a',
			'p a'
		);
		
		if ( ! empty( $link_styles ) ) {
			echo vakker_eltd_dynamic_css( $link_selector, $link_styles );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic', 'vakker_eltd_link_styles' );
}

if ( ! function_exists( 'vakker_eltd_link_hover_styles' ) ) {
	function vakker_eltd_link_hover_styles() {
		$link_hover_styles     = array();
		$link_hover_color      = vakker_eltd_options()->getOptionValue( 'link_hovercolor' );
		$link_hover_decoration = vakker_eltd_options()->getOptionValue( 'link_hover_fontdecoration' );
		
		if ( ! empty( $link_hover_color ) ) {
			$link_hover_styles['color'] = $link_hover_color;
		}
		if ( ! empty( $link_hover_decoration ) ) {
			$link_hover_styles['text-decoration'] = $link_hover_decoration;
		}
		
		$link_hover_selector = array(
			'a:hover',
			'p a:hover'
		);
		
		if ( ! empty( $link_hover_styles ) ) {
			echo vakker_eltd_dynamic_css( $link_hover_selector, $link_hover_styles );
		}
		
		$link_heading_hover_styles = array();
		
		if ( ! empty( $link_hover_color ) ) {
			$link_heading_hover_styles['color'] = $link_hover_color;
		}
		
		$link_heading_hover_selector = array(
			'h1 a:hover',
			'h2 a:hover',
			'h3 a:hover',
			'h4 a:hover',
			'h5 a:hover',
			'h6 a:hover'
		);
		
		if ( ! empty( $link_heading_hover_styles ) ) {
			echo vakker_eltd_dynamic_css( $link_heading_hover_selector, $link_heading_hover_styles );
		}
	}
	
	add_action( 'vakker_eltd_style_dynamic', 'vakker_eltd_link_hover_styles' );
}

if ( ! function_exists( 'vakker_eltd_smooth_page_transition_styles' ) ) {
	function vakker_eltd_smooth_page_transition_styles( $style ) {
		$id            = vakker_eltd_get_page_id();
		$loader_style  = array();
		$current_style = '';
		
		$background_color = vakker_eltd_get_meta_field_intersect( 'smooth_pt_bgnd_color', $id );
		if ( ! empty( $background_color ) ) {
			$loader_style['background-color'] = $background_color;
		}
		
		$loader_selector = array(
			'.eltd-smooth-transition-loader'
		);
		
		if ( ! empty( $loader_style ) ) {
			$current_style .= vakker_eltd_dynamic_css( $loader_selector, $loader_style );
		}
		
		$spinner_style = array();
		$spinner_color = vakker_eltd_get_meta_field_intersect( 'smooth_pt_spinner_color', $id );
		if ( ! empty( $spinner_color ) ) {
			$spinner_style['background-color'] = $spinner_color;
		}
		
		$spinner_selectors = array(
			'.eltd-st-loader .eltd-rotate-circles > div',
			'.eltd-st-loader .pulse',
			'.eltd-st-loader .double_pulse .double-bounce1',
			'.eltd-st-loader .double_pulse .double-bounce2',
			'.eltd-st-loader .cube',
			'.eltd-st-loader .rotating_cubes .cube1',
			'.eltd-st-loader .rotating_cubes .cube2',
			'.eltd-st-loader .stripes > div',
			'.eltd-st-loader .wave > div',
			'.eltd-st-loader .two_rotating_circles .dot1',
			'.eltd-st-loader .two_rotating_circles .dot2',
			'.eltd-st-loader .five_rotating_circles .container1 > div',
			'.eltd-st-loader .five_rotating_circles .container2 > div',
			'.eltd-st-loader .five_rotating_circles .container3 > div',
			'.eltd-st-loader .atom .ball-1:before',
			'.eltd-st-loader .atom .ball-2:before',
			'.eltd-st-loader .atom .ball-3:before',
			'.eltd-st-loader .atom .ball-4:before',
			'.eltd-st-loader .clock .ball:before',
			'.eltd-st-loader .mitosis .ball',
			'.eltd-st-loader .lines .line1',
			'.eltd-st-loader .lines .line2',
			'.eltd-st-loader .lines .line3',
			'.eltd-st-loader .lines .line4',
			'.eltd-st-loader .fussion .ball',
			'.eltd-st-loader .fussion .ball-1',
			'.eltd-st-loader .fussion .ball-2',
			'.eltd-st-loader .fussion .ball-3',
			'.eltd-st-loader .fussion .ball-4',
			'.eltd-st-loader .wave_circles .ball',
			'.eltd-st-loader .pulse_circles .ball'
		);
		
		if ( ! empty( $spinner_style ) ) {
			$current_style .= vakker_eltd_dynamic_css( $spinner_selectors, $spinner_style );
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'vakker_eltd_add_page_custom_style', 'vakker_eltd_smooth_page_transition_styles' );
}