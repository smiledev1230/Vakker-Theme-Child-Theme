<?php
if(!function_exists('vakker_eltd_get_scrollable_widget')){

    function vakker_eltd_get_scrollable_widget(){

        $show_scrollable_widget = vakker_eltd_get_meta_field_intersect('enable_scrollable_widget') === 'yes' ? true : false;
        $skin = vakker_eltd_get_meta_field_intersect('scrollable_widget_light');
        $skin_class = $skin === 'yes' ? 'eltd-scrollable-widget-light' : '';



        $parameters = array(
            'show_scrollable_widget' => $show_scrollable_widget,
            'skin' => $skin_class
        );

        vakker_eltd_get_module_template_part('templates/scrollable-widget', 'scrollablewidget', '', $parameters);
    }
    add_action('vakker_eltd_after_wrapper_inner', 'vakker_eltd_get_scrollable_widget', 11);

}

if ( ! function_exists( 'vakker_eltd_register_scrollable_widget_area' ) ) {
    function vakker_eltd_register_scrollable_widget_area(){

        register_sidebar(
            array(
                'id'            => 'scrollable_widget_area',
                'name'          => esc_html__( 'Scrollable Widget Area', 'vakker' ),
                'description'   => esc_html__( 'Widgets added here will appear in the right side of the screen', 'vakker' ),
                'before_widget' => '<div id="%1$s" class="widget eltd-scrollable-widget-area %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<div class="eltd-widget-title-holder"><h5 class="eltd-widget-title">',
                'after_title'   => '</h5></div>'
            )
        );
    }

    add_action( 'widgets_init', 'vakker_eltd_register_scrollable_widget_area' );
}