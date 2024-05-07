<?php 
    function mwn_theme_customizer($wp_customize){
        //remove unrequired stuff
        $wp_customize->remove_section('static_front_page');
        $wp_customize->remove_section('custom_css');

        //Create Sections
        //Contact details
        $wp_customize->add_section(
            'contact_settings', array(
                'title' => 'Contact Details',
                'description' => 'Set / change contact details which are displayed throughout the site',
                'priority' => 37,
            )
        );
        //Social media links
        $wp_customize->add_section(
            'social_media_settings', array(
                'title' => 'Social Media Settings',
                'description' => 'Set / change the social media icon links displayed throughout the site.',
                'priority' => 38,
            )
        );

        //Create settings and controls 
        //Contact stuff
        $wp_customize->add_setting('email_address', array());
        $wp_customize->add_control(
            'email_address', array(
                'label' => 'Email Address',
                'description' => 'Add or change email address',
                'section' => 'contact_settings',
                'type' => 'text',
            )
        );
        $wp_customize->add_setting('telno', array());
        $wp_customize->add_control(
            'telno', array(
                'label' => 'Telephone number',
                'description' => 'Add or change telephone number, do not add international code',
                'section' => 'contact_settings',
                'type' => 'text',
            )
        );

        //Social Links
        $wp_customize->add_setting('fb_link', array());
        $wp_customize->add_control(
            'fb_link', array(
                'label' => 'Facebook link',
                'description' => 'Set / change facebook link',
                'section' => 'social_media_settings',
                'type' => 'text',
            )
        );
        $wp_customize->add_setting('google_link', array());
        $wp_customize->add_control(
            'google_link', array(
                'label' => 'Google link',
                'description' => 'set / change Google Business link',
                'section' => 'social_media_settings',
                'type' => 'text',
            )
        );
        $wp_customize->add_setting('instagram_link', array());
        $wp_customize->add_control(
            'instagram_link', array(
                'label' => 'Instagram link',
                'description' => 'set / change Instagram link',
                'section' => 'social_media_settings',
                'type' => 'text',
            )
        );
        $wp_customize->add_setting('linkedin_link', array());
        $wp_customize->add_control(
            'linkedin_link', array(
                'label' => 'Linkedin link',
                'description' => 'set / change Linkedin link',
                'section' => 'social_media_settings',
                'type' => 'text',
            )
        );
        $wp_customize->add_setting('twitter_link', array());
        $wp_customize->add_control(
            'twitter_link', array(
                'label' => 'Twitter link',
                'description' => 'Set / change twitter link',
                'section' => 'social_media_settings',
                'type' => 'text',
            )
        );
        $wp_customize->add_setting('youtube_link', array());
        $wp_customize->add_control(
            'youtube_link', array(
                'label' => 'Youtube link',
                'description' => 'Set / change youtube link',
                'section' => 'social_media_settings',
                'type' => 'text',
            )
        );
    }
    add_action('customize_register', 'mwn_theme_customizer');