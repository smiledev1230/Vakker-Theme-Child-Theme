<div class="eltd-footer-top-holder">
	<div class="eltd-footer-top-inner <?php echo esc_attr($footer_top_grid_class); ?>">
        <span class="eltd-frame top-right-v"></span>
        <span class="eltd-frame top-left-v"></span>
        <span class="eltd-frame bottom-left-v"></span>
        <span class="eltd-frame bottom-right-v"></span>
        <span class="eltd-frame top-right-h"></span>
        <span class="eltd-frame top-left-h"></span>
        <span class="eltd-frame bottom-left-h"></span>
        <span class="eltd-frame bottom-right-h"></span>
		<div class="eltd-grid-row <?php echo esc_attr($footer_top_classes); ?>">
			<?php for($i = 1; $i <= $footer_top_columns; $i++) { ?>
				<div class="eltd-column-content eltd-grid-col-<?php echo esc_attr(12 / $footer_top_columns); ?>">
					<?php
						if(is_active_sidebar('footer_top_column_'.$i)) {
							dynamic_sidebar('footer_top_column_'.$i);
						}
					?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>