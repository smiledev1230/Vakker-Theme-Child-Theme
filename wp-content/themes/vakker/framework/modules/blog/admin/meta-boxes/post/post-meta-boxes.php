<?php

/*** Post Settings ***/

if ( ! function_exists( 'vakker_eltd_map_post_meta' ) ) {
	function vakker_eltd_map_post_meta() {
		
		$post_meta_box = vakker_eltd_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Post', 'vakker' ),
				'name'  => 'post-meta'
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'          => 'eltd_blog_single_sidebar_layout_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'vakker' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog single page', 'vakker' ),
				'default_value' => '',
				'parent'        => $post_meta_box,
                'options'       => vakker_eltd_get_custom_sidebars_options( true )
			)
		);
		
		$vakker_custom_sidebars = vakker_eltd_get_custom_sidebars();
		if ( count( $vakker_custom_sidebars ) > 0 ) {
			vakker_eltd_add_meta_box_field( array(
				'name'        => 'eltd_blog_single_custom_sidebar_area_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'vakker' ),
				'description' => esc_html__( 'Choose a sidebar to display on Blog single page. Default sidebar is "Sidebar"', 'vakker' ),
				'parent'      => $post_meta_box,
				'options'     => vakker_eltd_get_custom_sidebars(),
				'args' => array(
					'select2' => true
				)
			) );
		}
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_blog_list_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Blog List Image', 'vakker' ),
				'description' => esc_html__( 'Choose an Image for displaying in blog list. If not uploaded, featured image will be shown.', 'vakker' ),
				'parent'      => $post_meta_box
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'          => 'eltd_blog_masonry_gallery_fixed_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Fixed Proportion', 'vakker' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in fixed proportion', 'vakker' ),
				'default_value' => 'default',
				'parent'        => $post_meta_box,
				'options'       => array(
					'default'            => esc_html__( 'Default', 'vakker' ),
					'large-width'        => esc_html__( 'Large Width', 'vakker' ),
					'large-height'       => esc_html__( 'Large Height', 'vakker' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'vakker' )
				)
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'          => 'eltd_blog_masonry_gallery_original_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Original Proportion', 'vakker' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in original proportion', 'vakker' ),
				'default_value' => 'default',
				'parent'        => $post_meta_box,
				'options'       => array(
					'default'     => esc_html__( 'Default', 'vakker' ),
					'large-width' => esc_html__( 'Large Width', 'vakker' )
				)
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'          => 'eltd_show_title_area_blog_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'vakker' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single post page', 'vakker' ),
				'parent'        => $post_meta_box,
				'options'       => vakker_eltd_get_yes_no_select_array()
			)
		);

		do_action('vakker_eltd_blog_post_meta', $post_meta_box);
	}
	
	add_action( 'vakker_eltd_meta_boxes_map', 'vakker_eltd_map_post_meta', 20 );
}
