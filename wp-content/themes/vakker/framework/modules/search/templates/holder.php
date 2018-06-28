<div class="eltd-grid-row">
	<div <?php echo vakker_eltd_get_content_sidebar_class(); ?>>
		<div class="eltd-search-page-holder">
			<?php vakker_eltd_get_search_page_layout(); ?>
		</div>
		<?php do_action( 'vakker_eltd_page_after_content' ); ?>
	</div>
	<?php if ( $sidebar_layout !== 'no-sidebar' ) { ?>
		<div <?php echo vakker_eltd_get_sidebar_holder_class(); ?>>
			<?php get_sidebar(); ?>
		</div>
	<?php } ?>
</div>