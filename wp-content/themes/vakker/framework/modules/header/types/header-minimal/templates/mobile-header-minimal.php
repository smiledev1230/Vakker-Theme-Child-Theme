<?php do_action('vakker_eltd_before_mobile_header'); ?>

<header class="eltd-mobile-header">
	<?php do_action('vakker_eltd_after_mobile_header_html_open'); ?>
	
	<div class="eltd-mobile-header-inner">
		<div class="eltd-mobile-header-holder">
			<div class="eltd-grid">
				<div class="eltd-vertical-align-containers">
					<div class="eltd-position-left">
						<div class="eltd-position-left-inner">
							<?php vakker_eltd_get_mobile_logo(); ?>
						</div>
					</div>
					<div class="eltd-position-right">
						<div class="eltd-position-right-inner">
							<a href="javascript:void(0)" class="eltd-fullscreen-menu-opener">
							<span class="eltd-fm-lines">
								<span class="eltd-fm-line eltd-line-1"></span>
								<span class="eltd-fm-line eltd-line-2"></span>
								<span class="eltd-fm-line eltd-line-3"></span>
							</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php do_action('vakker_eltd_before_mobile_header_html_close'); ?>
</header>

<?php do_action('vakker_eltd_after_mobile_header'); ?>