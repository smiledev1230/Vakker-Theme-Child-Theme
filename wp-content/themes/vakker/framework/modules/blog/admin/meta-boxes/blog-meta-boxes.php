<?php

foreach ( glob( ELATED_FRAMEWORK_MODULES_ROOT_DIR . '/blog/admin/meta-boxes/*/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'vakker_eltd_map_blog_meta' ) ) {
	function vakker_eltd_map_blog_meta() {
		$eltd_blog_categories = array();
		$categories           = get_categories();
		foreach ( $categories as $category ) {
			$eltd_blog_categories[ $category->slug ] = $category->name;
		}
		
		$blog_meta_box = vakker_eltd_add_meta_box(
			array(
				'scope' => array( 'page' ),
				'title' => esc_html__( 'Blog', 'vakker' ),
				'name'  => 'blog_meta'
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_blog_category_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Blog Category', 'vakker' ),
				'description' => esc_html__( 'Choose category of posts to display (leave empty to display all categories)', 'vakker' ),
				'parent'      => $blog_meta_box,
				'options'     => $eltd_blog_categories
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_show_posts_per_page_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Posts', 'vakker' ),
				'description' => esc_html__( 'Enter the number of posts to display', 'vakker' ),
				'parent'      => $blog_meta_box,
				'options'     => $eltd_blog_categories,
				'args'        => array( "col_width" => 3 )
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_blog_masonry_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Layout', 'vakker' ),
				'description' => esc_html__( 'Set masonry layout. Default is in grid.', 'vakker' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''           => esc_html__( 'Default', 'vakker' ),
					'in-grid'    => esc_html__( 'In Grid', 'vakker' ),
					'full-width' => esc_html__( 'Full Width', 'vakker' )
				)
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_blog_masonry_number_of_columns_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Number of Columns', 'vakker' ),
				'description' => esc_html__( 'Set number of columns for your masonry blog lists', 'vakker' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''      => esc_html__( 'Default', 'vakker' ),
					'two'   => esc_html__( '2 Columns', 'vakker' ),
					'three' => esc_html__( '3 Columns', 'vakker' ),
					'four'  => esc_html__( '4 Columns', 'vakker' ),
					'five'  => esc_html__( '5 Columns', 'vakker' )
				)
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_blog_masonry_space_between_items_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Space Between Items', 'vakker' ),
				'description' => esc_html__( 'Set space size between posts for your masonry blog lists', 'vakker' ),
				'options'     => vakker_eltd_get_space_between_items_array( true ),
				'parent'      => $blog_meta_box
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'          => 'eltd_blog_list_featured_image_proportion_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Featured Image Proportion', 'vakker' ),
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on masonry blog lists', 'vakker' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''         => esc_html__( 'Default', 'vakker' ),
					'fixed'    => esc_html__( 'Fixed', 'vakker' ),
					'original' => esc_html__( 'Original', 'vakker' )
				)
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'          => 'eltd_blog_pagination_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'vakker' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'vakker' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''                => esc_html__( 'Default', 'vakker' ),
					'standard'        => esc_html__( 'Standard', 'vakker' ),
					'load-more'       => esc_html__( 'Load More', 'vakker' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'vakker' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'vakker' )
				)
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'type'          => 'text',
				'name'          => 'eltd_number_of_chars_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'vakker' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'vakker' ),
				'parent'        => $blog_meta_box,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'vakker_eltd_meta_boxes_map', 'vakker_eltd_map_blog_meta', 30 );
}