<?php 
    if(!function_exists('mwnSetup')){
        function mwnSetup(){
            //Add theme support for title tags
            add_theme_support('title-tag');

            //Add theme support for thumbnails
            add_theme_support('post-thumbnails');

            //Add HTML5 Support
            add_theme_support('html5', array('caption', 'comment-form', 'comment-list', 'gallery', 'search-form'));

            //Register navbars
            register_nav_menus(array(
                'primary' => __('Primary Menu (header)', 'mwn'),
                'legalMenu' => __('Legal Menu', 'mwn'),
                'QuickLinks' => __('Quick Links / Services / Products (Footer)', 'mwn'),

            ));
        }
    }
    add_action('after_setup_theme', 'mwnSetup');
?>