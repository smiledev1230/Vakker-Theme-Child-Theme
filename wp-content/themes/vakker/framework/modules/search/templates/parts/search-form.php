<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="eltd-search-page-form" method="get">
	<h2 class="eltd-search-title"><?php esc_html_e( 'New search:', 'vakker' ); ?></h2>
	<div class="eltd-form-holder">
		<div class="eltd-column-left">
			<input type="text" name="s" class="eltd-search-field" autocomplete="off" value="" placeholder="<?php esc_attr_e( 'Type here', 'vakker' ); ?>"/>
		</div>
		<div class="eltd-column-right">
			<button type="submit" class="eltd-search-submit"><span class="icon_search"></span></button>
		</div>
	</div>
	<div class="eltd-search-label">
		<?php esc_html_e( 'If you are not happy with the results below please do another search', 'vakker' ); ?>
	</div>
</form>