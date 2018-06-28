<?php

if ( ! function_exists( 'vakker_eltd_map_post_audio_meta' ) ) {
	function vakker_eltd_map_post_audio_meta() {
		$audio_post_format_meta_box = vakker_eltd_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Audio Post Format', 'vakker' ),
				'name'  => 'post_format_audio_meta'
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'          => 'eltd_audio_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Audio Type', 'vakker' ),
				'description'   => esc_html__( 'Choose audio type', 'vakker' ),
				'parent'        => $audio_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Audio Service', 'vakker' ),
					'self'            => esc_html__( 'Self Hosted', 'vakker' )
				),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						'social_networks' => '#eltd_eltd_audio_self_hosted_container',
						'self'            => '#eltd_eltd_audio_embedded_container'
					),
					'show'       => array(
						'social_networks' => '#eltd_eltd_audio_embedded_container',
						'self'            => '#eltd_eltd_audio_self_hosted_container'
					)
				)
			)
		);
		
		$eltd_audio_embedded_container = vakker_eltd_add_admin_container(
			array(
				'parent'          => $audio_post_format_meta_box,
				'name'            => 'eltd_audio_embedded_container',
				'hidden_property' => 'eltd_audio_type_meta',
				'hidden_value'    => 'self'
			)
		);
		
		$eltd_audio_self_hosted_container = vakker_eltd_add_admin_container(
			array(
				'parent'          => $audio_post_format_meta_box,
				'name'            => 'eltd_audio_self_hosted_container',
				'hidden_property' => 'eltd_audio_type_meta',
				'hidden_value'    => 'social_networks'
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_post_audio_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio URL', 'vakker' ),
				'description' => esc_html__( 'Enter audio URL', 'vakker' ),
				'parent'      => $eltd_audio_embedded_container,
			)
		);
		
		vakker_eltd_add_meta_box_field(
			array(
				'name'        => 'eltd_post_audio_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio Link', 'vakker' ),
				'description' => esc_html__( 'Enter audio link', 'vakker' ),
				'parent'      => $eltd_audio_self_hosted_container,
			)
		);
	}
	
	add_action( 'vakker_eltd_meta_boxes_map', 'vakker_eltd_map_post_audio_meta', 23 );
}