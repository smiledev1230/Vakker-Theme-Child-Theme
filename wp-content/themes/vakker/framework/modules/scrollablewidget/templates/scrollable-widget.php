<?php
if($show_scrollable_widget){ ?>

    <div class="eltd-scrollable-widget-holder <?php echo esc_attr($skin)?>">
        <?php
        if(is_active_sidebar('scrollable_widget_area')) {
            dynamic_sidebar('scrollable_widget_area');
        }
        ?>
    </div>

<?php }