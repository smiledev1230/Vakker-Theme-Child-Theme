<?php

if(!function_exists('vakker_eltd_register_required_plugins')) {
    /**
     * Registers theme required and optional plugins. Hooks to tgmpa_register hook
     */
    function vakker_eltd_register_required_plugins() {
        $plugins = array(
            array(
                'name'               => esc_html__('WPBakery Visual Composer', 'vakker'),
                'slug'               => 'js_composer',
                'source'             => get_template_directory().'/includes/plugins/js_composer.zip',
                'version'            => '5.4.5',
                'required'           => true,
                'force_activation'   => false,
                'force_deactivation' => false
            ),
            array(
                'name'               => esc_html__('Revolution Slider', 'vakker'),
                'slug'               => 'revslider',
                'source'             => get_template_directory().'/includes/plugins/revslider.zip',
                'version'            => '5.4.7.1',
                'required'           => true,
                'force_activation'   => false,
                'force_deactivation' => false
            ),
            array(
                'name'               => esc_html__('Elated Core', 'vakker'),
                'slug'               => 'eltd-core',
                'source'             => get_template_directory().'/includes/plugins/eltd-core.zip',
                'version'            => '1.1',
                'required'           => true,
                'force_activation'   => false,
                'force_deactivation' => false
            ),
            array(
                'name'               => esc_html__('Elated Instagram Feed', 'vakker'),
                'slug'               => 'eltd-instagram-feed',
                'source'             => get_template_directory().'/includes/plugins/eltd-instagram-feed.zip',
                'version'            => '1.0',
                'required'           => true,
                'force_activation'   => false,
                'force_deactivation' => false
            ),
            array(
                'name'               => esc_html__('Elated Twitter Feed', 'vakker'),
                'slug'               => 'eltd-twitter-feed',
                'source'             => get_template_directory().'/includes/plugins/eltd-twitter-feed.zip',
                'version'            => '1.0',
                'required'           => true,
                'force_activation'   => false,
                'force_deactivation' => false
            ),
	        array(
		        'name'     => esc_html__( 'WooCommerce', 'vakker' ),
		        'slug'     => 'woocommerce',
		        'required' => false
	        ),
	        array(
		        'name'     => esc_html__( 'Contact Form 7', 'vakker' ),
		        'slug'     => 'contact-form-7',
		        'required' => false
	        ),
            array(
                'name'               => esc_html__('Envato Market', 'vakker'),
                'slug'               => 'envato-market',
                'source'             => get_template_directory().'/includes/plugins/envato-market.zip',
                'version'            => '1.0.0-RC2',
                'required'           => true,
                'force_activation'   => false,
                'force_deactivation' => false
            )
        );

        $config = array(
            'domain'           => 'vakker',
            'default_path'     => '',
            'parent_slug' 	   => 'themes.php',
            'capability' 	   => 'edit_theme_options',
            'menu'             => 'install-required-plugins',
            'has_notices'      => true,
            'is_automatic'     => false,
            'message'          => '',
            'strings'          => array(
                'page_title'                      => esc_html__('Install Required Plugins', 'vakker'),
                'menu_title'                      => esc_html__('Install Plugins', 'vakker'),
                'installing'                      => esc_html__('Installing Plugin: %s', 'vakker'),
                'oops'                            => esc_html__('Something went wrong with the plugin API.', 'vakker'),
                'notice_can_install_required'     => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'vakker'),
                'notice_can_install_recommended'  => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'vakker'),
                'notice_cannot_install'           => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'vakker'),
                'notice_can_activate_required'    => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'vakker'),
                'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'vakker'),
                'notice_cannot_activate'          => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'vakker'),
                'notice_ask_to_update'            => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'vakker'),
                'notice_cannot_update'            => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'vakker'),
                'install_link'                    => _n_noop('Begin installing plugin', 'Begin installing plugins', 'vakker'),
                'activate_link'                   => _n_noop('Activate installed plugin', 'Activate installed plugins', 'vakker'),
                'return'                          => esc_html__('Return to Required Plugins Installer', 'vakker'),
                'plugin_activated'                => esc_html__('Plugin activated successfully.', 'vakker'),
                'complete'                        => esc_html__('All plugins installed and activated successfully. %s', 'vakker'),
                'nag_type'                        => 'updated'
            )
        );

        tgmpa($plugins, $config);
    }

    add_action('tgmpa_register', 'vakker_eltd_register_required_plugins');
}