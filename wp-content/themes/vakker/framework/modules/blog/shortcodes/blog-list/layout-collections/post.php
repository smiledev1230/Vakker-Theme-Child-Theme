<li class="eltd-bl-item eltd-item-space clearfix">
	<div class="eltd-bli-inner">
		<?php if ( $post_info_date == 'yes' && vakker_eltd_options()->getOptionValue('date_separated') == 'yes') {
			vakker_eltd_get_module_template_part( 'templates/parts/post-info/date-separated', 'blog', '', $params );
		} ?>
		<?php if ( $post_info_image == 'yes' ) {
			vakker_eltd_get_module_template_part( 'templates/parts/media', 'blog', '', $params );
		} ?>
        <div class="eltd-bli-content">
			<?php vakker_eltd_get_module_template_part( 'templates/parts/title', 'blog', '', $params ); ?>
            <?php if ($post_info_section == 'yes') { ?>
                <div class="eltd-bli-info">
	                <?php
		                if ( $post_info_author == 'yes' ) {
			                vakker_eltd_get_module_template_part( 'templates/parts/post-info/author', 'blog', '', $params );
		                }
		                if ( $post_info_comments == 'yes' ) {
			                vakker_eltd_get_module_template_part( 'templates/parts/post-info/comments', 'blog', '', $params );
		                }
		                if ( $post_info_like == 'yes' ) {
			                vakker_eltd_get_module_template_part( 'templates/parts/post-info/like', 'blog', '', $params );
		                }
						if ( $post_info_category == 'yes' ) {
							vakker_eltd_get_module_template_part( 'templates/parts/post-info/category', 'blog', '', $params );
						}
	                ?>
                </div>
            <?php } ?>
	        <div class="eltd-bli-excerpt">
		        <?php vakker_eltd_get_module_template_part( 'templates/parts/excerpt', 'blog', '', $params ); ?>
		        <?php vakker_eltd_get_module_template_part( 'templates/parts/post-info/read-more', 'blog', '', $params ); ?>
				<?php
				if ( $post_info_share == 'yes' ) {
					vakker_eltd_get_module_template_part( 'templates/parts/post-info/share', 'blog', '', $params );
				}
				?>
	        </div>
        </div>
	</div>
</li>