<li class="eltd-bl-item eltd-item-space clearfix">
	<div class="eltd-bli-inner">
		<?php if ( $post_info_image == 'yes' ) {
			vakker_eltd_get_module_template_part( 'templates/parts/media', 'blog', '', $params );
		} ?>
		<div class="eltd-bli-content">
			<?php vakker_eltd_get_module_template_part( 'templates/parts/title', 'blog', '', $params ); ?>
			<?php vakker_eltd_get_module_template_part( 'templates/parts/post-info/date', 'blog', '', $params ); ?>
		</div>
	</div>
</li>