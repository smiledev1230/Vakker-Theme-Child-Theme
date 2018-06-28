<?php

if ( ! function_exists( 'vakker_eltd_map_post_video_meta' ) ) {
	function vakker_eltd_map_post_video_meta() {
		$video_post_format_meta_box = vakker_eltd_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Video Post Format', 'vakker' ),
				'name'  => 'post_format_video_meta'
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'          => 'eltd_video_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Video Type', 'vakker' ),
				'description'   => esc_html__( 'Choose video type', 'vakker' ),
				'parent'        => $video_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Video Service', 'vakker' ),
					'self'            => esc_html__( 'Self Hosted', 'vakker' )
				),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						'social_networks' => '#eltd_eltd_video_self_hosted_container',
						'self'            => '#eltd_eltd_video_embedded_container'
					),
					'show'       => array(
						'social_networks' => '#eltd_eltd_video_embedded_container',
						'self'            => '#eltd_eltd_video_self_hosted_container'
					)
				)
			)
		);
		
		$eltd_video_embedded_container = vakker_eltd_add_admin_container(
			array(
				'parent'          => $video_post_format_meta_box,
				'name'            => 'eltd_video_embedded_container',
				'hidden_property' => 'eltd_video_type_meta',
				'hidden_value'    => 'self'
			)
		);
		
		$eltd_video_self_hosted_container = vakker_eltd_add_admin_container(
			array(
				'parent'          => $video_post_format_meta_box,
				'name'            => 'eltd_video_self_hosted_container',
				'hidden_property' => 'eltd_video_type_meta',
				'hidden_value'    => 'social_networks'
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_post_video_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video URL', 'vakker' ),
				'description' => esc_html__( 'Enter Video URL', 'vakker' ),
				'parent'      => $eltd_video_embedded_container,
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_post_video_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video MP4', 'vakker' ),
				'description' => esc_html__( 'Enter video URL for MP4 format', 'vakker' ),
				'parent'      => $eltd_video_self_hosted_container,
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_post_video_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Video Image', 'vakker' ),
				'description' => esc_html__( 'Enter video image', 'vakker' ),
				'parent'      => $eltd_video_self_hosted_container,
			)
		);
	}
	
	add_action( 'vakker_eltd_meta_boxes_map', 'vakker_eltd_map_post_video_meta', 22 );
}