<?php
class VakkerElatedStickySidebar extends VakkerElatedWidget {
	public function __construct() {
		parent::__construct(
			'eltd_sticky_sidebar',
			esc_html__('Elated Sticky Sidebar Widget', 'vakker'),
			array( 'description' => esc_html__( 'Use this widget to make the sidebar sticky. Drag it into the sidebar above the widget which you want to be the first element in the sticky sidebar.', 'vakker'))
		);
		
		$this->setParams();
	}
	
	protected function setParams() {}
	
	public function widget( $args, $instance ) {
		echo '<div class="widget eltd-widget-sticky-sidebar"></div>';
	}
}
