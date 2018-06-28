<?php do_action('vakker_eltd_before_page_header'); ?>

	<header class="eltd-page-header">
		<?php if($show_fixed_wrapper) : ?>
		<div class="eltd-fixed-wrapper">
			<?php endif; ?>
			<div class="eltd-menu-area">
				<?php do_action( 'vakker_eltd_action_after_header_menu_area_html_open' )?>
				<?php if($menu_area_in_grid) : ?>
				<div class="eltd-grid">
					<?php endif; ?>
					<div class="eltd-vertical-align-containers">
						<div class="eltd-position-left">
							<div class="eltd-position-left-inner">
								<?php if(!$hide_logo) {
									vakker_eltd_get_logo();
								} ?>
							</div>
						</div>
						<div class="eltd-position-right">
							<div class="eltd-position-right-inner">
								<?php vakker_eltd_get_main_menu(); ?>
								<a href="javascript:void(0)" class="eltd-expanding-menu-opener">
									<span class="eltd-fm-text"><?php echo esc_html__('Menu', 'vakker')?></span>
									<span class="eltd-fm-lines">
										<span class="eltd-fm-line eltd-line-1"></span>
										<span class="eltd-fm-line eltd-line-2"></span>
										<span class="eltd-fm-line eltd-line-3"></span>
									</span>
								</a>
                                <?php vakker_eltd_get_header_widget_menu_area(); ?>
							</div>
						</div>
					</div>
					<?php if($menu_area_in_grid) : ?>
				</div>
			<?php endif; ?>
			</div>
			<?php if($show_fixed_wrapper) { ?>
			<?php do_action('vakker_eltd_action_end_of_page_header_html'); ?>
		</div>
	<?php } else {
		do_action('vakker_eltd_action_end_of_page_header_html');
	} ?>
		<?php if($show_sticky) {
			vakker_eltd_get_sticky_header('expanding', 'header/types/header-expanding');
		} ?>
	</header>

<?php do_action('vakker_eltd_after_page_header'); ?>