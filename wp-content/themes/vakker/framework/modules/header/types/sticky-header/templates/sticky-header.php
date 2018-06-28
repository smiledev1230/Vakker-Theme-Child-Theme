<?php do_action('vakker_eltd_before_sticky_header'); ?>

<div class="eltd-sticky-header">
    <?php do_action( 'vakker_eltd_after_sticky_menu_html_open' ); ?>
    <div class="eltd-sticky-holder">
        <?php if($sticky_header_in_grid) : ?>
        <div class="eltd-grid">
            <?php endif; ?>
            <div class="eltd-vertical-align-containers">
                <div class="eltd-position-left">
                    <div class="eltd-position-left-inner">
                        <?php if(!$hide_logo) {
                            vakker_eltd_get_logo('sticky');
                        } ?>
                        <?php if($menu_area_position === 'left') : ?>
                            <?php vakker_eltd_get_sticky_menu('eltd-sticky-nav'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if($menu_area_position === 'center') : ?>
                    <div class="eltd-position-center">
                        <div class="eltd-position-center-inner">
                            <?php vakker_eltd_get_sticky_menu('eltd-sticky-nav'); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="eltd-position-right">
                    <div class="eltd-position-right-inner">
                        <?php if($menu_area_position === 'right') : ?>
                            <?php vakker_eltd_get_sticky_menu('eltd-sticky-nav'); ?>
                        <?php endif; ?>
                        <?php if(is_active_sidebar('eltd-sticky-right') && !$hide_widget_area) : ?>
                            <?php dynamic_sidebar('eltd-sticky-right'); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if($sticky_header_in_grid) : ?>
        </div>
        <?php endif; ?>
    </div>
	<?php do_action( 'vakker_eltd_before_sticky_menu_html_close' ); ?>
</div>

<?php do_action('vakker_eltd_after_sticky_header'); ?>