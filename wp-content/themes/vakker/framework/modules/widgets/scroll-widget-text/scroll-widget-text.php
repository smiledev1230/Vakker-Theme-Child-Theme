<?php

class VakkerElatedScrollTextWidget extends VakkerElatedWidget {
	public function __construct() {
		parent::__construct(
			'eltd_scroll_text_widget',
			esc_html__( 'Elated Scroll Text Widget', 'vakker' ),
			array( 'description' => esc_html__( 'Display a scroll text widget text and back to top', 'vakker' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'  => 'textfield',
				'name'  => 'scroll_text',
				'title' => esc_html__( 'Scroll Text', 'vakker' )
			),
		);
	}
	
	public function widget( $args, $instance ) {
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		// Filter out all empty params
		$instance         = array_filter( $instance, function ( $array_value ) {
			return trim( $array_value ) != '';
		} );

		$params = '';
		//generate shortcode params
		foreach ( $instance as $key => $value ) {
			$params .= " $key='$value' ";
		}


		echo '<div class="widget eltd-scroll-text-widget">';
        echo '<div class="eltd-scroll-text-holder" >';
        echo '<span class="eltd-icon-shortcode eltd-normal" ><i aria-hidden="true" class="lnr lnr-arrow-left"></i></span>';
        echo '<span class="eltd-widget-text">'. esc_html( $instance['scroll_text'] ) .'</span>';


			
		echo '</div>';
		echo '</div>';
	}
}