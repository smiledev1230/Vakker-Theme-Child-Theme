<?php

class VakkerElatedSeparatorWidget extends VakkerElatedWidget {
	public function __construct() {
		parent::__construct(
			'eltd_separator_widget',
			esc_html__( 'Elated Separator Widget', 'vakker' ),
			array( 'description' => esc_html__( 'Add a separator element to your widget areas', 'vakker' ) )
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
					'normal'     => esc_html__( 'Normal', 'vakker' ),
					'full-width' => esc_html__( 'Full Width', 'vakker' )
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'position',
				'title'   => esc_html__( 'Position', 'vakker' ),
				'options' => array(
					'center' => esc_html__( 'Center', 'vakker' ),
					'left'   => esc_html__( 'Left', 'vakker' ),
					'right'  => esc_html__( 'Right', 'vakker' )
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'border_style',
				'title'   => esc_html__( 'Style', 'vakker' ),
				'options' => array(
					'solid'  => esc_html__( 'Solid', 'vakker' ),
					'dashed' => esc_html__( 'Dashed', 'vakker' ),
					'dotted' => esc_html__( 'Dotted', 'vakker' )
				)
			),
			array(
				'type'  => 'colorpicker',
				'name'  => 'color',
				'title' => esc_html__( 'Color', 'vakker' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'width',
				'title' => esc_html__( 'Width (px or %)', 'vakker' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'thickness',
				'title' => esc_html__( 'Thickness (px)', 'vakker' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'top_margin',
				'title' => esc_html__( 'Top Margin (px or %)', 'vakker' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'bottom_margin',
				'title' => esc_html__( 'Bottom Margin (px or %)', 'vakker' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		//prepare variables
		$params = '';
		
		//is instance empty?
		if ( is_array( $instance ) && count( $instance ) ) {
			//generate shortcode params
			foreach ( $instance as $key => $value ) {
				$params .= " $key='$value' ";
			}
		}
		
		echo '<div class="widget eltd-separator-widget">';
			echo do_shortcode( "[eltd_separator $params]" ); // XSS OK
		echo '</div>';
	}
}