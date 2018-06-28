<?php
$eltd_blog_type = vakker_eltd_get_archive_blog_list_layout();
vakker_eltd_include_blog_helper_functions( 'lists', $eltd_blog_type );
$eltd_holder_params = vakker_eltd_get_holder_params_blog();

get_header();
vakker_eltd_get_title();
do_action('vakker_eltd_before_main_content');
?>

<div class="<?php echo esc_attr( $eltd_holder_params['holder'] ); ?>">
	<?php do_action( 'vakker_eltd_after_container_open' ); ?>
	
	<div class="<?php echo esc_attr( $eltd_holder_params['inner'] ); ?>">
		<?php vakker_eltd_get_blog( $eltd_blog_type ); ?>
	</div>
	
	<?php do_action( 'vakker_eltd_before_container_close' ); ?>
</div>

<?php do_action( 'vakker_eltd_blog_list_additional_tags' ); ?>
<?php get_footer(); ?>