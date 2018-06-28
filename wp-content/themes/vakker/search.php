<?php
$eltd_search_holder_params = vakker_eltd_get_holder_params_search();
?>
<?php get_header(); ?>
<?php vakker_eltd_get_title(); ?>
<?php do_action('vakker_eltd_before_main_content'); ?>
	<div class="<?php echo esc_attr( $eltd_search_holder_params['holder'] ); ?>">
		<?php do_action( 'vakker_eltd_after_container_open' ); ?>
		<div class="<?php echo esc_attr( $eltd_search_holder_params['inner'] ); ?>">
			<?php vakker_eltd_get_search_page(); ?>
		</div>
		<?php do_action( 'vakker_eltd_before_container_close' ); ?>
	</div>
<?php get_footer(); ?>