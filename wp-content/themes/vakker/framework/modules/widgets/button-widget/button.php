<?php

class VakkerElatedButtonWidget extends VakkerElatedWidget {
	public function __construct() {
		parent::__construct(
			'eltd_button_widget',
			esc_html__( 'Elated Button Widget', 'vakker' ),
			array( 'description' => esc_html__( 'Add button element to widget areas', 'vakker' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'    => 'dropdown',
				'name'    => 'type',
				'title'   => esc_html__( 'Type', 'vakker' ),
				'options' => array(
					'solid'   => esc_html__( 'Solid', 'vakker' ),
					'outline' => esc_html__( 'Outline', 'vakker' ),
					'simple'  => esc_html__( 'Simple', 'vakker' )
				)
			),
			array(
				'type'        => 'dropdown',
				'name'        => 'size',
				'title'       => esc_html__( 'Size', 'vakker' ),
				'options'     => array(
					'small'  => esc_html__( 'Small', 'vakker' ),
					'medium' => esc_html__( 'Medium', 'vakker' ),
					'large'  => esc_html__( 'Large', 'vakker' ),
					'huge'   => esc_html__( 'Huge', 'vakker' )
				),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'vakker' )
			),
			array(
				'type'    => 'textfield',
				'name'    => 'text',
				'title'   => esc_html__( 'Text', 'vakker' ),
				'default' => esc_html__( 'Button Text', 'vakker' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'link',
				'title' => esc_html__( 'Link', 'vakker' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'target',
				'title'   => esc_html__( 'Link Target', 'vakker' ),
				'options' => vakker_eltd_get_link_target_array()
			),
			array(
				'type'  => 'colorpicker',
				'name'  => 'color',
				'title' => esc_html__( 'Color', 'vakker' )
			),
			array(
				'type'  => 'colorpicker',
				'name'  => 'hover_color',
				'title' => esc_html__( 'Hover Color', 'vakker' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'background_color',
				'title'       => esc_html__( 'Background Color', 'vakker' ),
				'description' => esc_html__( 'This option is only available for solid button type', 'vakker' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'hover_background_color',
				'title'       => esc_html__( 'Hover Background Color', 'vakker' ),
				'description' => esc_html__( 'This option is only available for solid button type', 'vakker' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'border_color',
				'title'       => esc_html__( 'Border Color', 'vakker' ),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'vakker' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'hover_border_color',
				'title'       => esc_html__( 'Hover Border Color', 'vakker' ),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'vakker' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'margin',
				'title'       => esc_html__( 'Margin', 'vakker' ),
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'vakker' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$params = '';
		
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		// Filter out all empty params
		$instance = array_filter( $instance, function ( $array_value ) {
			return trim( $array_value ) != '';
		} );
		
		// Default values
		if ( ! isset( $instance['text'] ) ) {
			$instance['text'] = 'Button Text';
		}
		
		// Generate shortcode params
		foreach ( $instance as $key => $value ) {
			$params .= " $key='$value' ";
		}
		
		echo '<div class="widget eltd-button-widget">';
			echo do_shortcode( "[eltd_button $params]" ); // XSS OK
		echo '</div>';
	}
}