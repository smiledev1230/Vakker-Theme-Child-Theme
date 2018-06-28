<?php

if ( ! function_exists( 'vakker_eltd_like' ) ) {
	/**
	 * Returns VakkerElatedLike instance
	 *
	 * @return VakkerElatedLike
	 */
	function vakker_eltd_like() {
		return VakkerElatedLike::get_instance();
	}
}

function vakker_eltd_get_like() {
	
	echo wp_kses( vakker_eltd_like()->add_like(), array(
		'span' => array(
			'class'       => true,
			'aria-hidden' => true,
			'style'       => true,
			'id'          => true
		),
		'i'    => array(
			'class' => true,
			'style' => true,
			'id'    => true
		),
		'a'    => array(
			'href'  => true,
			'class' => true,
			'id'    => true,
			'title' => true,
			'style' => true
		)
	) );
}