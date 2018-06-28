<?php
get_header();
vakker_eltd_get_title();
get_template_part( 'slider' );
do_action('vakker_eltd_before_main_content');

if ( have_posts() ) : while ( have_posts() ) : the_post();
	//Get blog single type and load proper helper
	vakker_eltd_include_blog_helper_functions( 'singles', 'standard' );
	
	//Action added for applying module specific filters that couldn't be applied on init
	do_action( 'vakker_eltd_blog_single_loaded' );
	
	//Get classes for holder and holder inner
	$eltd_holder_params = vakker_eltd_get_holder_params_blog();
	?>
	
	<div class="<?php echo esc_attr( $eltd_holder_params['holder'] ); ?>">
		<?php do_action( 'vakker_eltd_after_container_open' ); ?>
		
		<div class="<?php echo esc_attr( $eltd_holder_params['inner'] ); ?>">
			<?php vakker_eltd_get_blog_single( 'standard' ); ?>
		</div>
		
		<?php do_action( 'vakker_eltd_before_container_close' ); ?>
	</div>
<?php endwhile; endif;

get_footer(); ?>