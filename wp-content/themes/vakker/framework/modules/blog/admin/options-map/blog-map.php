<?php

if ( ! function_exists( 'vakker_eltd_get_blog_list_types_options' ) ) {
	function vakker_eltd_get_blog_list_types_options() {
		$blog_list_type_options = apply_filters( 'vakker_eltd_blog_list_type_global_option', $blog_list_type_options = array() );
		
		return $blog_list_type_options;
	}
}

if ( ! function_exists( 'vakker_eltd_blog_options_map' ) ) {
	function vakker_eltd_blog_options_map() {
		$blog_list_type_options = vakker_eltd_get_blog_list_types_options();
		
		vakker_eltd_add_admin_page(
			array(
				'slug'  => '_blog_page',
				'title' => esc_html__( 'Blog', 'vakker' ),
				'icon'  => 'fa fa-files-o'
			)
		);
		
		/**
		 * Blog Lists
		 */
		$panel_blog_lists = vakker_eltd_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_lists',
				'title' => esc_html__( 'Blog Lists', 'vakker' )
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'          => 'blog_list_type',
				'type'          => 'select',
				'label'         => esc_html__( 'Blog Layout for Archive Pages', 'vakker' ),
				'description'   => esc_html__( 'Choose a default blog layout for archived blog post lists', 'vakker' ),
				'default_value' => 'standard',
				'parent'        => $panel_blog_lists,
				'options'       => $blog_list_type_options
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'          => 'archive_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout for Archive Pages', 'vakker' ),
				'description'   => esc_html__( 'Choose a sidebar layout for archived blog post lists', 'vakker' ),
				'default_value' => '',
				'parent'        => $panel_blog_lists,
                'options'       => vakker_eltd_get_custom_sidebars_options(),
			)
		);
		
		$vakker_custom_sidebars = vakker_eltd_get_custom_sidebars();
		if ( count( $vakker_custom_sidebars ) > 0 ) {
			vakker_eltd_add_admin_field(
				array(
					'name'        => 'archive_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display for Archive Pages', 'vakker' ),
					'description' => esc_html__( 'Choose a sidebar to display on archived blog post lists. Default sidebar is "Sidebar Page"', 'vakker' ),
					'parent'      => $panel_blog_lists,
					'options'     => vakker_eltd_get_custom_sidebars(),
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		vakker_eltd_add_admin_field(
			array(
				'name'          => 'blog_masonry_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Layout', 'vakker' ),
				'default_value' => 'in-grid',
				'description'   => esc_html__( 'Set masonry layout. Default is in grid.', 'vakker' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'in-grid'    => esc_html__( 'In Grid', 'vakker' ),
					'full-width' => esc_html__( 'Full Width', 'vakker' )
				)
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'          => 'blog_masonry_number_of_columns',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Number of Columns', 'vakker' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for your masonry blog lists. Default value is 4 columns', 'vakker' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'two'   => esc_html__( '2 Columns', 'vakker' ),
					'three' => esc_html__( '3 Columns', 'vakker' ),
					'four'  => esc_html__( '4 Columns', 'vakker' ),
					'five'  => esc_html__( '5 Columns', 'vakker' )
				)
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'          => 'blog_masonry_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Space Between Items', 'vakker' ),
				'description'   => esc_html__( 'Set space size between posts for your masonry blog lists. Default value is normal', 'vakker' ),
				'default_value' => 'normal',
				'options'       => vakker_eltd_get_space_between_items_array(),
				'parent'        => $panel_blog_lists
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'          => 'blog_list_featured_image_proportion',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Featured Image Proportion', 'vakker' ),
				'default_value' => 'fixed',
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on masonry blog lists', 'vakker' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'fixed'    => esc_html__( 'Fixed', 'vakker' ),
					'original' => esc_html__( 'Original', 'vakker' )
				)
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'          => 'blog_pagination_type',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'vakker' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'vakker' ),
				'parent'        => $panel_blog_lists,
				'default_value' => 'standard',
				'options'       => array(
					'standard'        => esc_html__( 'Standard', 'vakker' ),
					'load-more'       => esc_html__( 'Load More', 'vakker' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'vakker' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'vakker' )
				)
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'number_of_chars',
				'default_value' => '40',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'vakker' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'vakker' ),
				'parent'        => $panel_blog_lists,
				'args'          => array(
					'col_width' => 3
				)
			)
		);

        vakker_eltd_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'date_separated',
                'default_value' => 'no',
                'label'         => esc_html__( 'Show Separated Date?', 'vakker' ),
                'description'   => esc_html__( 'Show separated date on blog list and shortcodes', 'vakker' ),
                'parent'        => $panel_blog_lists,
                'args'          => array(
                    'col_width' => 3
                )
            )
        );
		
		/**
		 * Blog Single
		 */
		$panel_blog_single = vakker_eltd_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_single',
				'title' => esc_html__( 'Blog Single', 'vakker' )
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'          => 'blog_single_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'vakker' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog Single pages', 'vakker' ),
				'default_value' => '',
				'parent'        => $panel_blog_single,
                'options'       => vakker_eltd_get_custom_sidebars_options()
			)
		);
		
		if ( count( $vakker_custom_sidebars ) > 0 ) {
			vakker_eltd_add_admin_field(
				array(
					'name'        => 'blog_single_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display', 'vakker' ),
					'description' => esc_html__( 'Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"', 'vakker' ),
					'parent'      => $panel_blog_single,
					'options'     => vakker_eltd_get_custom_sidebars(),
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		vakker_eltd_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_blog',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'vakker' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single post pages', 'vakker' ),
				'parent'        => $panel_blog_single,
				'options'       => vakker_eltd_get_yes_no_select_array(),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'          => 'blog_single_title_in_title_area',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Post Title in Title Area', 'vakker' ),
				'description'   => esc_html__( 'Enabling this option will show post title in title area on single post pages', 'vakker' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'no'
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'          => 'blog_single_related_posts',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Related Posts', 'vakker' ),
				'description'   => esc_html__( 'Enabling this option will show related posts on single post pages', 'vakker' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'no'
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'name'          => 'blog_single_comments',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Comments Form', 'vakker' ),
				'description'   => esc_html__( 'Enabling this option will show comments form on single post pages', 'vakker' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'yes'
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_navigation',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Enable Prev/Next Single Post Navigation Links', 'vakker' ),
				'description'   => esc_html__( 'Enable navigation links through the blog posts (left and right arrows will appear)', 'vakker' ),
				'parent'        => $panel_blog_single,
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltd_eltd_blog_single_navigation_container'
				)
			)
		);
		
		$blog_single_navigation_container = vakker_eltd_add_admin_container(
			array(
				'name'            => 'eltd_blog_single_navigation_container',
				'hidden_property' => 'blog_single_navigation',
				'hidden_value'    => 'no',
				'parent'          => $panel_blog_single,
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_navigation_through_same_category',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Navigation Only in Current Category', 'vakker' ),
				'description'   => esc_html__( 'Limit your navigation only through current category', 'vakker' ),
				'parent'        => $blog_single_navigation_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Author Info Box', 'vakker' ),
				'description'   => esc_html__( 'Enabling this option will display author name and descriptions on single post pages', 'vakker' ),
				'parent'        => $panel_blog_single,
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltd_eltd_blog_single_author_info_container'
				)
			)
		);
		
		$blog_single_author_info_container = vakker_eltd_add_admin_container(
			array(
				'name'            => 'eltd_blog_single_author_info_container',
				'hidden_property' => 'blog_author_info',
				'hidden_value'    => 'no',
				'parent'          => $panel_blog_single,
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info_email',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show Author Email', 'vakker' ),
				'description'   => esc_html__( 'Enabling this option will show author email', 'vakker' ),
				'parent'        => $blog_single_author_info_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		vakker_eltd_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_author_social',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Author Social Icons', 'vakker' ),
				'description'   => esc_html__( 'Enabling this option will show author social icons on single post pages', 'vakker' ),
				'parent'        => $blog_single_author_info_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		do_action( 'vakker_eltd_blog_single_options_map', $panel_blog_single );
	}
	
	add_action( 'vakker_eltd_options_map', 'vakker_eltd_blog_options_map', 11 );
}