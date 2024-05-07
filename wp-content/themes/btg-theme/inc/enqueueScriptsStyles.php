<?php 
    if(!function_exists('mwnEnqueueStyles')){
        function mwnEnqueueStyles(){
            wp_enqueue_style('slick', get_template_directory_uri().'/assets/css/slick.min.css');
            wp_enqueue_style('slickTheme', get_template_directory_uri().'/assets/css/slick-theme.min.css');
            wp_enqueue_style('themeMainStyles', get_template_directory_uri().'/assets/css/main.min.css');

            //JS files
            wp_enqueue_script('jqueryMainScript', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), '3.6.0', true);
            wp_enqueue_script('bootstrapScript', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js', array(), '4.6.0', true);
            wp_enqueue_script('slickJS', get_template_directory_uri().'/assets/js/slick.min.js', array(), '4.6.0', true);
            wp_enqueue_script('mwnCustomScript', get_template_directory_uri().'/assets/js/main.js', array(), '2.0', true);
        }
    }
    add_action('wp_enqueue_scripts', 'mwnEnqueueStyles');
?>