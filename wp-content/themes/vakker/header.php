<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php
	/**
	 * vakker_eltd_header_meta hook
	 *
	 * @see vakker_eltd_header_meta() - hooked with 10
	 * @see vakker_eltd_user_scalable_meta - hooked with 10
	 * @see eltd_core_set_open_graph_meta - hooked with 10
	 */
	do_action( 'vakker_eltd_header_meta' );
	
	wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
	<?php
	/**
	 * vakker_eltd_after_body_tag hook
	 *
	 * @see vakker_eltd_get_side_area() - hooked with 10
	 * @see vakker_eltd_smooth_page_transitions() - hooked with 10
	 */
	do_action( 'vakker_eltd_after_body_tag' ); ?>

    <div class="eltd-wrapper">
        <div class="eltd-wrapper-inner">
            <?php
            /**
             * vakker_eltd_after_wrapper_inner hook
             *
             * @see vakker_eltd_get_header() - hooked with 10
             * @see vakker_eltd_get_mobile_header() - hooked with 20
             * @see vakker_eltd_back_to_top_button() - hooked with 30
             * @see vakker_eltd_get_header_minimal_full_screen_menu() - hooked with 40
             * @see vakker_eltd_get_header_bottom_navigation() - hooked with 40
             */
            do_action( 'vakker_eltd_after_wrapper_inner' ); ?>
	        
            <div class="eltd-content" <?php vakker_eltd_content_elem_style_attr(); ?>>
                <div class="eltd-content-inner">