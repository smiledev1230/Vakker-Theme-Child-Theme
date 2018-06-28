<?php do_action('vakker_eltd_before_page_header'); ?>

<header class="eltd-page-header">
	<?php do_action('vakker_eltd_after_page_header_html_open'); ?>
	
    <div class="eltd-logo-area">
	    <?php do_action( 'vakker_eltd_after_header_logo_area_html_open' ); ?>
	    
        <?php if($logo_area_in_grid) : ?>
            <div class="eltd-grid">
        <?php endif; ?>
			
            <div class="eltd-vertical-align-containers">
                <div class="eltd-position-center">
                    <div class="eltd-position-center-inner">
                        <?php if(!$hide_logo) {
                            vakker_eltd_get_logo();
                        } ?>
                    </div>
                </div>
            </div>
	            
        <?php if($logo_area_in_grid) : ?>
            </div>
        <?php endif; ?>
    </div>
	
    <?php if($show_fixed_wrapper) : ?>
        <div class="eltd-fixed-wrapper">
    <?php endif; ?>
	        
    <div class="eltd-menu-area">
	    <?php do_action( 'vakker_eltd_after_header_menu_area_html_open' ); ?>
	    
        <?php if($menu_area_in_grid) : ?>
            <div class="eltd-grid">
        <?php endif; ?>
	            
            <div class="eltd-vertical-align-containers">
                <div class="eltd-position-center">
                    <div class="eltd-position-center-inner">
                        <?php vakker_eltd_get_main_menu(); ?>
                    </div>
                </div>
            </div>
	            
        <?php if($menu_area_in_grid) : ?>
            </div>
        <?php endif; ?>
    </div>
	
    <?php if($show_fixed_wrapper) { ?>
        </div>
	<?php } ?>
	
	<?php if($show_sticky) {
		vakker_eltd_get_sticky_header('centered', 'header/types/header-centered');
	} ?>
	
	<?php do_action('vakker_eltd_before_page_header_html_close'); ?>
</header>

<?php do_action('vakker_eltd_after_page_header'); ?>