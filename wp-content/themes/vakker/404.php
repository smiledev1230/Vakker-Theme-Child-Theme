<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php
	/**
	 * vakker_eltd_header_meta hook
	 *
	 * @see vakker_eltd_header_meta() - hooked with 10
	 * @see vakker_eltd_user_scalable_meta - hooked with 10
	 * @see eltd_core_set_open_graph_meta - hooked with 10
	 */
	do_action( 'vakker_eltd_header_meta' );
	
	wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
	<?php
	/**
	 * vakker_eltd_after_body_tag hook
	 *
	 * @see vakker_eltd_get_side_area() - hooked with 10
	 * @see vakker_eltd_smooth_page_transitions() - hooked with 10
	 */
	do_action( 'vakker_eltd_after_body_tag' ); ?>
	
	<div class="eltd-wrapper eltd-404-page">
		<div class="eltd-wrapper-inner">
            <?php
            /**
             * vakker_eltd_after_wrapper_inner hook
             *
             * @see vakker_eltd_get_header() - hooked with 10
             * @see vakker_eltd_get_mobile_header() - hooked with 20
             * @see vakker_eltd_back_to_top_button() - hooked with 30
             * @see vakker_eltd_get_header_minimal_full_screen_menu() - hooked with 40
             * @see vakker_eltd_get_header_bottom_navigation() - hooked with 40
             */
            do_action( 'vakker_eltd_after_wrapper_inner' );

            do_action('vakker_eltd_before_main_content'); ?>
			
			<div class="eltd-content" <?php vakker_eltd_content_elem_style_attr(); ?>>
				<div class="eltd-content-inner">
					<div class="eltd-page-not-found">
						<?php
						$eltd_title_image_404 = vakker_eltd_options()->getOptionValue( '404_page_title_image' );
						$eltd_title_404       = vakker_eltd_options()->getOptionValue( '404_title' );
						$eltd_subtitle_404    = vakker_eltd_options()->getOptionValue( '404_subtitle' );
						$eltd_text_404        = vakker_eltd_options()->getOptionValue( '404_text' );
						$eltd_button_label    = vakker_eltd_options()->getOptionValue( '404_back_to_home' );
						$eltd_button_style    = vakker_eltd_options()->getOptionValue( '404_button_style' );
						
						if ( ! empty( $eltd_title_image_404 ) ) { ?>
							<div class="eltd-404-title-image">
								<img src="<?php echo esc_url( $eltd_title_image_404 ); ?>" alt="<?php esc_attr_e( '404 Title Image', 'vakker' ); ?>" />
							</div>
						<?php } ?>
						
						<h1 class="eltd-404-title">
							<?php if ( ! empty( $eltd_title_404 ) ) {
								echo esc_html( $eltd_title_404 );
							} else {
								esc_html_e( '404', 'vakker' );
							} ?>
						</h1>
						
						<h3 class="eltd-404-subtitle">
							<?php if ( ! empty( $eltd_subtitle_404 ) ) {
								echo esc_html( $eltd_subtitle_404 );
							} else {
								esc_html_e( 'Page not found', 'vakker' );
							} ?>
						</h3>
						
						<p class="eltd-404-text">
							<?php if ( ! empty( $eltd_text_404 ) ) {
								echo esc_html( $eltd_text_404 );
							} else {
								esc_html_e( 'Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'vakker' );
							} ?>
						</p>
						
						<?php
							$button_params = array(
								'link' => esc_url( home_url( '/' ) ),
								'text' => ! empty( $eltd_button_label ) ? $eltd_button_label : esc_html__( 'Back to home', 'vakker' )
							);
						
							if ( $eltd_button_style == 'light-style' ) {
								$button_params['custom_class'] = 'eltd-btn-light-style eltd-pattern-light-skin';
							}
							
							echo vakker_eltd_return_button_html( $button_params );
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php wp_footer(); ?>
</body>
</html>