<?php

class VakkerElatedSearchOpener extends VakkerElatedWidget {
    public function __construct() {
        parent::__construct(
            'eltd_search_opener',
            esc_html__( 'Elated Search Opener', 'vakker' ),
            array( 'description' => esc_html__( 'Display a "search" icon that opens the search form', 'vakker' ) )
        );

        $this->setParams();
    }

    protected function setParams() {
        $this->params = array(
            array(
                'type'        => 'dropdown',
                'name'        => 'layout',
                'title'       => esc_html__( 'Search Layout', 'vakker' ),
                'options'     => array(
                    'standard'   => esc_html__( 'Standard', 'vakker' ),
                    'expanding'  => esc_html__( 'Expanding', 'vakker' ),
                )
            ),
            array(
                'type'        => 'dropdown',
                'name'        => 'direction',
                'title'       => esc_html__( 'Direction Of The Search Field', 'vakker' ),
                'description' => esc_html__( 'Show search field left or right from icon', 'vakker' ),
                'options'     => array(
                    'right'  => esc_html__( 'Right', 'vakker' ),
                    'left'   => esc_html__( 'Left', 'vakker' ),
                )
            ),
            array(
                'type'        => 'textfield',
                'name'        => 'search_icon_size',
                'title'       => esc_html__( 'Icon Size (px)', 'vakker' ),
                'description' => esc_html__( 'Define size for search icon', 'vakker' )
            ),
            array(
                'type'        => 'textfield',
                'name'        => 'search_icon_color',
                'title'       => esc_html__( 'Icon Color', 'vakker' ),
                'description' => esc_html__( 'Define color for search icon', 'vakker' )
            ),
            array(
                'type'        => 'textfield',
                'name'        => 'search_icon_hover_color',
                'title'       => esc_html__( 'Icon Hover Color', 'vakker' ),
                'description' => esc_html__( 'Define hover color for search icon', 'vakker' )
            ),
            array(
                'type'        => 'textfield',
                'name'        => 'search_icon_margin',
                'title'       => esc_html__( 'Icon Margin', 'vakker' ),
                'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'vakker' )
            )
        );
    }

    public function widget( $args, $instance ) {
        global $vakker_eltd_options, $vakker_eltd_IconCollections;

        $search_type_class     = 'eltd-search-opener eltd-icon-has-hover';
        $styles                = array();
        $class                 = array( 'eltd-search-widget-holder', 'eltd-search-' . $instance['direction'] );
        $class[]               = 'eltd-search-' . $instance['layout'];

        if ( ! empty( $instance['search_icon_size'] ) ) {
            $styles[] = 'font-size: ' . intval( $instance['search_icon_size'] ) . 'px';
        }

        if ( ! empty( $instance['search_icon_color'] ) ) {
            $styles[] = 'color: ' . $instance['search_icon_color'] . ';';
        }

        if ( ! empty( $instance['search_icon_margin'] ) ) {
            $styles[] = 'margin: ' . $instance['search_icon_margin'] . ';';
        }

        ?>

        <div <?php vakker_eltd_class_attribute( $class ); ?>>
            <form action="<?php echo esc_url(home_url('/')); ?>" method="get">
                <button <?php vakker_eltd_class_attribute( $search_type_class ); ?> type="submit" <?php vakker_eltd_inline_attr( $instance['search_icon_hover_color'], 'data-hover-color' ); ?> <?php vakker_eltd_inline_style( $styles ); ?>>
                    <?php if ( isset( $vakker_eltd_options['search_icon_pack'] ) ) {
                        $vakker_eltd_IconCollections->getSearchIcon( $vakker_eltd_options['search_icon_pack'], false );
                    } ?>
                    <?php if($instance['layout'] == 'expanding'){ ?>
                        <i class="eltd-search-close eltd-icon-linear-icons lnr lnr-cross "></i>
                    <?php } ?>
                </button>
                <div class="eltd-search-opener-field">
                    <input type="text" placeholder="<?php esc_attr_e('Search', 'vakker'); ?>" name="s" class="eltd-search-field" autocomplete="off" />
                    <?php if($instance['layout'] == 'expanding'){ ?>
                        <button name="submit" class="eltd-search-submit"><i class="eltd-icon-font-elegant icon_search "></i></button>
                    <?php } ?>
                </div>
            </form>
        </div>
    <?php }
}