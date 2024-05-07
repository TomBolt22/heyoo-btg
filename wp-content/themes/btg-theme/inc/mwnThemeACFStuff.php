<?php 
    if(function_exists('acf_add_options_page')){
        acf_add_options_page(array(

            'menu_title' => 'Theme Options',
            'menu_slug' => 'theme-options',
            'capability' => 'edit_posts',
            'icon_url' => 'dashicons-admin-settings',
            'position' => '60',
            'redirect' => true,
        ));

        acf_add_options_sub_page(array(
            'page_title' => 'Theme Settings',
            'menu_title' => 'Theme Settings',
            'menu_slug' => 'theme-settings',
            'capability' => 'edit_posts',
            'parent_slug' => 'theme-options',
            'redirect' => false,
        ));
        acf_add_options_sub_page(array(
            'page_title' => 'Header Settings',
            'menu_title' => 'Header Settings',
            'menu_slug' => 'header-settings',
            'capability' => 'edit_posts',
            'parent_slug' => 'theme-options',
            'redirect' => false,
        ));
        acf_add_options_sub_page(array(
            'page_title' => 'Contact Details',
            'menu_title' => 'Contact Details',
            'menu_slug' => 'contact-details',
            'capability' => 'edit_posts',
            'parent_slug' => 'theme-options',
            'redirect' => false,
        ));
        acf_add_options_sub_page(array(
            'page_title' => 'Social Media Settings',
            'menu_title' => 'Social Media Settings',
            'menu_slug' => 'social-medi-settings',
            'capability' => 'edit_posts',
            'parent_slug' => 'theme-options',
            'redirect' => false,
        ));
        acf_add_options_sub_page(array(
            'page_title' => 'Footer Settings',
            'menu_title' => 'Footer Settings',
            'menu_slug' => 'footer-settings',
            'capability' => 'edit_posts',
            'parent_slug' => 'theme-options',
            'redirect' => false,
        ));
        acf_add_options_sub_page(array(
            'page_title' => 'Results Archive',
            'menu_title' => 'Results Archive',
            'menu_slug' => 'results-archive',
            'capability' => 'edit_posts',
            'parent_slug' => 'theme-options',
            'redirect' => false,
        ));
        acf_add_options_sub_page(array(
            'page_title' => 'Podcast Archive',
            'menu_title' => 'Podcast Archive',
            'menu_slug' => 'podcast-archive',
            'capability' => 'edit_posts',
            'parent_slug' => 'theme-options',
            'redirect' => false,
        ));
    }