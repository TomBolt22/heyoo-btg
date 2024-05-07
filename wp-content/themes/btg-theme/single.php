<?php 
    get_header();

    $fields = get_fields();

    $postType = get_post_type();

    if($postType == 'results') {
        get_template_part('templates/single/template', 'singleResult');
    }
    elseif($postType == 'podcasts') {
        get_template_part('templates/single/template', 'singlePodcast');
    }
    elseif(have_posts()) {
        get_template_part('templates/single/template', 'singleBlog');
    }
    else {
        get_template_part("templates/single/template", 'singleGeneral');
    }

    get_footer();
?>