<?php do_action('vakker_eltd_before_top_navigation'); ?>
<nav class="eltd-fullscreen-menu">
    <?php
    wp_nav_menu(array(
        'theme_location'  => 'vertical-navigation',
        'container'       => '',
        'container_class' => '',
        'menu_class'      => '',
        'menu_id'         => '',
        'fallback_cb'     => 'top_navigation_fallback',
        'link_before'     => '<span>',
        'link_after'      => '</span>',
        'walker'          => new VakkerElatedFullscreenNavigationWalker()
    ));
    ?>
</nav>
<?php do_action('vakker_eltd_after_top_navigation'); ?>