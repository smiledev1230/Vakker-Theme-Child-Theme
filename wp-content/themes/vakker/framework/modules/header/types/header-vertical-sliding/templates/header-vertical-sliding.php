<?php do_action('vakker_eltd_before_page_header'); ?>
<aside class="eltd-vertical-menu-area <?php echo esc_html($holder_class); ?>">
    <div class="eltd-vertical-menu-area-inner">
        <div class="eltd-vertical-area-background"></div>
        <div class="eltd-vertical-menu-nav-holder-outer">
            <div class="eltd-vertical-menu-nav-holder">
                <div class="eltd-vertical-menu-holder-nav-inner">
                    <?php vakker_eltd_get_header_vertical_sliding_main_menu(); ?>
                </div>
            </div>
        </div>
        <?php if(!$hide_logo) {
            vakker_eltd_get_logo();
        } ?>
        <div class="eltd-vertical-menu-holder">
            <div class="eltd-vertical-menu-table">
                <div class="eltd-vertical-menu-table-cell">
                    <div class="eltd-vertical-menu-opener">
                        <a href="#">
                            <span class="eltd-fm-text"><?php echo esc_html__('Menu', 'vakker')?></span>
							<span class="eltd-fm-lines">
								<span class="eltd-fm-line eltd-line-1"></span>
								<span class="eltd-fm-line eltd-line-2"></span>
								<span class="eltd-fm-line eltd-line-3"></span>
							</span>
                        </a>
                    </div>
                    <div class="eltd-vertical-area-widget-holder">
                        <?php vakker_eltd_get_header_vertical_sliding_widget_areas(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>

<?php do_action('vakker_eltd_after_page_header'); ?>
