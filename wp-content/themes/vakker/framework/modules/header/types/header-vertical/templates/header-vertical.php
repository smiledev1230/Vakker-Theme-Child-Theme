<?php do_action('vakker_eltd_before_page_header'); ?>

<aside class="eltd-vertical-menu-area eltd-with-scroll <?php echo esc_html($holder_class); ?>">
	<div class="eltd-vertical-menu-area-inner">
		<div class="eltd-vertical-area-background"></div>
		<?php if(!$hide_logo) {
			vakker_eltd_get_logo();
		} ?>
		<?php vakker_eltd_get_header_vertical_main_menu(); ?>
		<div class="eltd-vertical-area-widget-holder">
			<?php vakker_eltd_get_header_vertical_widget_areas(); ?>
		</div>
	</div>
</aside>

<?php do_action('vakker_eltd_after_page_header'); ?>