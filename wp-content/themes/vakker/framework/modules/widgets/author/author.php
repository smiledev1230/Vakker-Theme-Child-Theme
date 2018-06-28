<?php

class VakkerElatedAuthorWidget extends VakkerElatedWidget {
    public function __construct() {
        parent::__construct(
            'eltd_author_widget',
            esc_html__('Elated Author Widget', 'vakker'),
            array( 'description' => esc_html__( 'Display author image and bio', 'vakker'))
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'type'  => 'textfield',
                'name'  => 'widget_title',
                'title' => esc_html__( 'Widget Title', 'vakker' )
            ),
            array(
                'type'  => 'textfield',
                'name'  => 'image_src',
                'title' => esc_html__('Image Source', 'vakker')
            ),
            array(
                'type'  => 'textfield',
                'name'  => 'author_title',
                'title' => esc_html__( 'Author Title', 'vakker' )
            ),
            array(
                'type'  => 'textfield',
                'name'  => 'author_name',
                'title' => esc_html__( 'Author Name', 'vakker' )
            ),
            array(
                'type'  => 'textfield',
                'name'  => 'author_position',
                'title' => esc_html__( 'Author Position', 'vakker' )
            ),
            array(
                'type'  => 'textarea',
                'name'  => 'bio',
                'title' => esc_html__('Author Bio', 'vakker')
            )
        );
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {
        if (!is_array($instance)) { $instance = array(); }

        // Filter out all empty params
        $instance = array_filter($instance, function($array_value) { return trim($array_value) != ''; });


        $html = '';
        $html .= '<div class="widget eltd-author-widget">';
        if(!empty($instance['widget_title'])) {
            print $args['before_title'].$instance['widget_title'].$args['after_title'];
        }

        $html .= '<div class="eltd-author-image-holder">';
        $html .= '<img src="'.$instance['image_src'].'" alt="author-image"/>';
        $html .= '<div class="eltd-author-title">'.$instance['author_title'].'</div>';
        $html .= '</div>';
        $html .= '<h4 class="eltd-author-name">'.$instance['author_name'].'</h4>';
        $html .= '<h6 class="eltd-author-position">'.$instance['author_position'].'</h6>';
        $html .= '<div class="eltd-author-bio-holder">';
        $html .= '<p>'.$instance['bio'].'</p>';
        $html .= '</div>';
        $html .= '</div>';

        print $html;
    }
}