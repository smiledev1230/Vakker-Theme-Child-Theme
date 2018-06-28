<div class="eltd-grid-row <?php echo esc_attr($holder_classes); ?>">
	<div <?php echo vakker_eltd_get_content_sidebar_class(); ?>>
		<div class="eltd-blog-holder eltd-blog-single <?php echo esc_attr($blog_single_classes); ?>">
			<?php vakker_eltd_get_blog_single_type($blog_single_type); ?>
		</div>
	</div>
	<?php if($sidebar_layout !== 'no-sidebar') { ?>
		<div <?php echo vakker_eltd_get_sidebar_holder_class(); ?>>
			<?php get_sidebar(); ?>
		</div>
	<?php } ?>
</div>