<?php 
    get_header();

    if(is_page('home')){
        get_template_part("templates/template", "homepage");
    }
    else {
        get_template_part("templates/template", 'generalTemplate');
    }

    get_footer();
?>