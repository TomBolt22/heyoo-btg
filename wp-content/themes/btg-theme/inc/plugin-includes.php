<?php
    require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

    add_action( 'tgmpa_register', 'mwnPluginIncludes_register_required_plugins' );

    function mwnPluginIncludes_register_required_plugins() {
        $plugins = array(
            array(
                'name'      => 'Advanced Custom Fields',
                'slug'      => 'advanced-custom-fields',
                'required'  => true,
            ),
             array(
                 'name'               => 'Advanced Custom Fields Pro',
                 'slug'               => 'acf-pro',
                 'source'             => get_template_directory() . '/inc/plugins/advanced-custom-fields-pro.zip',
                 'required'           => false,
                 'version'            => '5.8.8',
                 'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                 'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
             ),
            array(
                'name' => 'Advanced Custom Fields for Yoast SEO',
                'slug' => 'acf-content-analysis-for-yoast-seo',
                'required' => false,
            ),
            array(
                'name' => 'Classic Editor',
                'slug' => 'classic-editor',
                'required' => true,
            ),
            array(
                'name' => 'Contact form 7',
                'slug' => 'contact-form-7',
                'required' => true,
            ),
            array(
                'name' => 'Custom Post Type UI',
                'slug' => 'custom-post-type-ui',
                'required' => true,
            ),
            array(
                'name' => 'GDPR Cookie Consent',
                'slug' => 'cookie-law-info',
                'required' => false,
            ),
            array(
                'name' => 'SiteKit by Google',
                'slug' => 'google-site-kit',
                'required' => false,
            ),
            array(
                'name' => 'Smush',
                'slug' => 'wp-smushit',
                'required' => false,
            ),
        );
        tgmpa( $plugins );
    };
?>
