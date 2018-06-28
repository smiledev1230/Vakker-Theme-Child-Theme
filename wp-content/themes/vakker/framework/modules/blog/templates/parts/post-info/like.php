<?php if(vakker_eltd_core_plugin_installed()) { ?>
    <div class="eltd-blog-like">
        <?php if( function_exists('vakker_eltd_get_like') ) vakker_eltd_get_like(); ?>
    </div>
<?php } ?>