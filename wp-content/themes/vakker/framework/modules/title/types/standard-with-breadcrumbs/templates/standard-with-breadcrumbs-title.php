<?php do_action('vakker_eltd_before_page_title'); ?>

<div class="eltd-title-holder <?php echo esc_attr($holder_classes); ?>" <?php vakker_eltd_inline_style($holder_styles); ?> <?php echo vakker_eltd_get_inline_attrs($holder_data); ?>>
	<?php if(!empty($title_image)) { ?>
		<div class="eltd-title-image">
			<img itemprop="image" src="<?php echo esc_url($title_image['src']); ?>" alt="<?php echo esc_attr($title_image['alt']); ?>" />
		</div>
	<?php } ?>
	<div class="eltd-title-wrapper" <?php vakker_eltd_inline_style($wrapper_styles); ?>>
		<div class="eltd-title-inner">
			<div class="eltd-grid">
				<div class="eltd-title-info">
					<?php if(!empty($title)) { ?>
						<<?php echo esc_attr($title_tag); ?> class="eltd-page-title entry-title" <?php vakker_eltd_inline_style($title_styles); ?>><?php echo esc_html($title); ?></<?php echo esc_attr($title_tag); ?>>
					<?php } ?>
					<?php if(!empty($subtitle)){ ?>
						<<?php echo esc_attr($subtitle_tag); ?> class="eltd-page-subtitle" <?php vakker_eltd_inline_style($subtitle_styles); ?>><?php echo esc_html($subtitle); ?></<?php echo esc_attr($subtitle_tag); ?>>
					<?php } ?>
				</div>
				<div class="eltd-breadcrumbs-info">
					<?php vakker_eltd_custom_breadcrumbs(); ?>
				</div>
			</div>
	    </div>
	</div>
</div>

<?php do_action('vakker_eltd_after_page_title'); ?>
