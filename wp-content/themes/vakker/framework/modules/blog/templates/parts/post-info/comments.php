<?php if(comments_open()) { ?>
	<div class="eltd-post-info-comments-holder">
		<a itemprop="url" class="eltd-post-info-comments" href="<?php comments_link(); ?>" target="_self">
			<?php comments_number('0 ' . esc_html__('Comments','vakker'), '1 '.esc_html__('Comment','vakker'), '% '.esc_html__('Comments','vakker') ); ?>
		</a>
	</div>
<?php } ?>