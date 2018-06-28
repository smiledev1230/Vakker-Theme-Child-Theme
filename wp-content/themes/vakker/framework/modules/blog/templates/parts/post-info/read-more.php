<?php if ( ! vakker_eltd_post_has_read_more() && ! post_password_required() ) { ?>
	<div class="eltd-post-read-more-button">
		<?php
			$button_params = array(
				'type'         => 'simple',
				'link'         => get_the_permalink(),
				'text'         => esc_html__( 'Read More', 'vakker' ),
				'custom_class' => 'eltd-blog-list-button'
			);
			
			echo vakker_eltd_return_button_html( $button_params );
		?>
	</div>
<?php } ?>