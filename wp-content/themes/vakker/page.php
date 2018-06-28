<?php
$eltd_sidebar_layout = vakker_eltd_sidebar_layout();

get_header();
vakker_eltd_get_title();
get_template_part( 'slider' );
do_action('vakker_eltd_before_main_content');
?>

<div class="eltd-container eltd-default-page-template">
	<?php do_action( 'vakker_eltd_after_container_open' ); ?>
	
	<div class="eltd-container-inner clearfix">
        <?php do_action( 'vakker_eltd_after_container_inner_open' ); ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="eltd-grid-row">
				<div <?php echo vakker_eltd_get_content_sidebar_class(); ?>>
					<?php
						the_content();
						do_action( 'vakker_eltd_page_after_content' );
					?>
				</div>
				<?php if ( $eltd_sidebar_layout !== 'no-sidebar' ) { ?>
					<div <?php echo vakker_eltd_get_sidebar_holder_class(); ?>>
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div>
		<?php endwhile; endif; ?>
        <?php do_action( 'vakker_eltd_before_container_inner_close' ); ?>
	</div>
	
	<?php do_action( 'vakker_eltd_before_container_close' ); ?>
</div>

<?php get_footer(); ?>