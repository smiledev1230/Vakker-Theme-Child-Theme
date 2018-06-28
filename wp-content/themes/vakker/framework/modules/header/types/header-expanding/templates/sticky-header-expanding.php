<?php do_action('vakker_eltd_after_sticky_header'); ?>

<div class="eltd-sticky-header">
    <?php do_action('vakker_eltd_after_sticky_menu_html_open'); ?>
    <div class="eltd-sticky-holder">
    <?php if ($sticky_header_in_grid) : ?>
        <div class="eltd-grid">
    <?php endif; ?>
            <div class=" eltd-vertical-align-containers">
                <div class="eltd-position-left">
	                <div class="eltd-position-left-inner">
		                <?php if(!$hide_logo) {
			                vakker_eltd_get_logo('sticky');
		                } ?>
	                </div>
                </div>
                <div class="eltd-position-right">
	                <div class="eltd-position-right-inner">
			            <?php vakker_eltd_get_sticky_menu('eltd-sticky-nav'); ?>
		                <?php if(is_active_sidebar('eltd-sticky-right') && !$hide_widget_area) : ?>
			                <?php dynamic_sidebar('eltd-sticky-right'); ?>
		                <?php endif; ?>
		                <a href="javascript:void(0)" class="eltd-expanding-menu-opener">
							<span class="eltd-fm-text"><?php echo esc_html__('Menu', 'vakker')?></span>
							<span class="eltd-fm-lines">
								<span class="eltd-fm-line eltd-line-1"></span>
								<span class="eltd-fm-line eltd-line-2"></span>
								<span class="eltd-fm-line eltd-line-3"></span>
							</span>
		                </a>
	                </div>
                </div>
            </div>
    		<?php if ($sticky_header_in_grid) : ?>
        </div>
    <?php endif; ?>
    </div>
</div>

<?php do_action('vakker_eltd_after_sticky_header'); ?>