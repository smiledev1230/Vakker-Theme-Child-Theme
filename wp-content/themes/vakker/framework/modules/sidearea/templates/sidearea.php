<section class="eltd-side-menu">
	<div class="eltd-close-side-menu-holder">
		<a class="eltd-close-side-menu" href="#" target="_self">
			<?php echo vakker_eltd_icon_collections()->renderIcon( 'lnr-cross', 'linear_icons' ); ?>
		</a>
	</div>
	<?php if ( is_active_sidebar( 'sidearea' ) ) {
		dynamic_sidebar( 'sidearea' );
	} ?>
</section>