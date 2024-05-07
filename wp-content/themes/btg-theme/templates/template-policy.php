<?php 
    /* Template Name: Policy Template */
    get_header();
?>

    <section class="policy">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title">
                        <h1><?=the_title();?></h1>
                    </div>
                </div>
                <div class="col-12">
                    <?=the_content();?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>