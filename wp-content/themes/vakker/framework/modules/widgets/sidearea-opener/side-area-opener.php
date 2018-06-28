<?php

class VakkerElatedSideAreaOpener extends VakkerElatedWidget {
	public function __construct() {
		parent::__construct(
			'eltd_side_area_opener',
			esc_html__( 'Elated Side Area Opener', 'vakker' ),
			array( 'description' => esc_html__( 'Display a "hamburger" icon that opens the side area', 'vakker' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'        => 'textfield',
				'name'        => 'widget_margin',
				'title'       => esc_html__( 'Side Area Opener Margin', 'vakker' ),
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'vakker' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'widget_title',
				'title' => esc_html__( 'Side Area Opener Title', 'vakker' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$holder_styles = array();
		
		if ( ! empty( $instance['icon_color'] ) ) {
			$holder_styles[] = 'color: ' . $instance['icon_color'] . ';';
		}
		if ( ! empty( $instance['widget_margin'] ) ) {
			$holder_styles[] = 'margin: ' . $instance['widget_margin'];
		}
		?>
		
		<a class="eltd-side-menu-button-opener eltd-icon-has-hover" href="javascript:void(0)" <?php vakker_eltd_inline_style( $holder_styles ); ?>>
			<?php if ( ! empty( $instance['widget_title'] ) ) { ?>
				<h5 class="eltd-side-menu-title"><?php echo esc_html( $instance['widget_title'] ); ?></h5>
			<?php } ?>
			<span class="eltd-side-menu-icon">
        		<span class="eltd-fm-lines">
                    <span class="eltd-fm-line eltd-line-1"></span>
                    <span class="eltd-fm-line eltd-line-2"></span>
                    <span class="eltd-fm-line eltd-line-3"></span>
                </span>
        	</span>
		</a>
	<?php }
}