<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="<?php bloginfo('charset');?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content='ie=edge'>
        <link rel='pingback' href='<?php bloginfo('pingback_url');?>'>

        <?php wp_head();?>

        <!-- link AOS -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <!-- Font - Montserrat -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

        <!-- Start of HubSpot Embed Code -->
        <script type="text/javascript" id="hs-script-loader" async defer src="//js-eu1.hs-scripts.com/143594092.js"></script>
        <!-- End of HubSpot Embed Code -->

        <!-- HubSpot Form Script -->
        <script charset="utf-8" type="text/javascript" src="//js-eu1.hsforms.net/forms/embed/v2.js"></script>

    </head>
    <body <?php body_class();?>>
        <?php get_template_part("components/content", "header"); ?>
        <main>
            