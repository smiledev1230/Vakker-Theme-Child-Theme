<?php if($max_num_pages > 1) { ?>
	<div class="eltd-blog-pag-loading">
		<div class="eltd-blog-pag-bounce1"></div>
		<div class="eltd-blog-pag-bounce2"></div>
		<div class="eltd-blog-pag-bounce3"></div>
	</div>
	<div class="eltd-blog-pag-load-more">
		<?php
			$button_params = array(
				'link' => 'javascript: void(0)',
				'size' => 'large',
				'type' => 'outline',
				'text' => esc_html__( 'Load More', 'vakker' )
			);
			
			echo vakker_eltd_return_button_html( $button_params );
		?>
	</div>
<?php }