<?php
    /* Template Name: About Template */
    get_header();
?>

    <?php if( have_rows('ab_top_row') ) : while( have_rows('ab_top_row') ) : the_row(); ?>
        <section class="about-top" style="background:url('<?=get_sub_field('background_image');?>') no-repeat center center / cover;">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 offset-lg-3" data-aos="fade-up">
                        <div class="text-wrapper text-center">
                            <?php if( get_sub_field('ab_content') ) : ?>
                                <?=get_sub_field('ab_content');?>
                            <?php else : ?>
                                <?=the_title();?>
                            <?php endif; ?>
                        </div>
                        <div class="button-wrapper text-center">
                            <?php
                                $ab_btn = get_sub_field('ab_button');
                                if( $ab_btn ) : 
                                    $btn_txt = $ab_btn['title'];
                                    $btn_url = $ab_btn['url'];
                                    $btn_trgt = $ab_btn['target'] ? $ab_btn['target'] : '_self';
                            ?>
                                <a href="<?=$btn_url;?>" target="<?=$btn_trgt;?>" class="siteCTA purple solid"><?=$btn_txt;?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; endif; ?>

    <?php if( have_rows('testimonials') ) : while( have_rows('testimonials') ) : the_row(); ?>
        <section class="testimonials">
            <div class="container">
                <div class="row" data-aos="fade-right">
                    <div class="col-12">
                        <div class="testimonial-slider">
                            <?php if( have_rows('testimonial_repeater') ) : while( have_rows('testimonial_repeater') ) : the_row(); ?>
                                <div class="test-item">
                                    <h3><?=get_sub_field('testimonial_text');?></h3>
                                    <p><strong><?=get_sub_field('name');?><?php if( get_sub_field('job_title') ) { echo ", " . get_sub_field('job_title'); } ?></strong></p>
                                    <p><?=get_sub_field('company');?></p>
                                </div>
                            <?php endwhile; endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; endif; ?>

    <?php if( have_rows('result_focused') ) : while( have_rows('result_focused') ) : the_row(); ?>
        <section class="result-focused" style="background: url('<?=get_sub_field('rf_background_image');?>') no-repeat center center / cover;">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8 offset-lg-2">
                        <div class="focus-content text-center" data-aos="fade-right">
                            <h3><?=get_sub_field('title');?></h3>
                            <?=get_sub_field('rf_content');?>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="result-points">
                            <?php if( have_rows('statistics') ) : $delay = 300; while( have_rows('statistics') ) : the_row(); ?>
                            <?php 
                                $img = get_sub_field('icon');
                                $cont = get_sub_field('text');
                            ?>
                                <div class="rp" data-aos="fade-right" data-aos-delay="<?=$delay;?>">
                                    <img src="<?=$img['url'];?>" alt="<?=$img['alt'];?>" class="img-fluid">
                                    <p class="title"><?=$cont;?></p>
                                </div>
                                <?php $delay = $delay + 300; ?>
                            <?php endwhile; endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; endif; ?>

    <?php if( have_rows('how_we_work') ) : while( have_rows('how_we_work') ) : the_row(); ?>
        <section class="how-we-work">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="text-wrapper" data-aos="fade-up">
                            <?=get_sub_field('introduction');?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php if( have_rows('points') ) : $delay = 300; while( have_rows('points') ) : the_row(); ?>
                        <div class="col-12 col-lg-3">
                            <div class="single-point" data-aos="fade-up" data-aos-delay="<?=$delay;?>">
                                <?php 
                                    $p_img = get_sub_field('icon');
                                    $p_cont = get_sub_field('sp_content');
                                ?>
                                <img src="<?=$p_img['url'];?>" alt="<?=$p_img['alt'];?>" class="img-fluid">
                                <?=$p_cont;?>
                            </div>
                        </div>
                        <?php $delay = $delay + 300; ?>
                    <?php endwhile; endif; ?>
                </div>
            </div>
        </section>
    <?php endwhile; endif; ?>

    <?php if( have_rows('experience') ) : while( have_rows('experience') ) : the_row(); ?>
        <section class="experience-row">
            <div class="container">
                <div class="row" data-aos="fade-up">
                    <div class="col-12">
                        <div class="def-wrap" data-aos="fade-right" data-aos-delay="300">
                            <?=get_sub_field('ex_content');?>
                        </div>
                    </div>
                </div>
                <?php if( get_sub_field('show_black_mark') ) : ?>
                    <div class="ex-mark">
                        <img src="/wp-content/uploads/2024/04/black-splash.svg" alt="Black Splash" class="img-fluid">
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <?php if( get_sub_field('full_width_image') ) : ?>
            <section class="fw-img" data-aos="fade-down">
                <div class="container-fluid px-0">
                    <?php $fw_img = get_sub_field('full_width_image'); ?>
                    <img src="<?=$fw_img['url'];?>" alt="<?=$fw_img['alt'];?>" class="img-fluid">
                </div>
            </section>
        <?php endif; ?>

    <?php endwhile; endif; ?>

    <?php if( have_rows('sec_testimonials') ) : while( have_rows('sec_testimonials') ) : the_row(); ?>
        <section class="testimonials">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="testimonial-slider" data-aos="fade-up">
                            <?php if( have_rows('testimonial_repeater') ) : while( have_rows('testimonial_repeater') ) : the_row(); ?>
                                <div class="test-item">
                                    <?php 
                                        $test_img = get_sub_field('image');
                                        if( $test_img ) : 
                                    ?>
                                        <div class="test-img">
                                            <img src="<?=$test_img['url'];?>" alt="<?=$test_img['alt'];?>">
                                        </div>
                                    <?php endif; ?>
                                    <h3><?=get_sub_field('testimonial_text');?></h3>
                                    <p><strong><?=get_sub_field('name');?><?php if( get_sub_field('job_title') ) { echo ", " . get_sub_field('job_title'); } ?></strong></p>
                                    <p><?=get_sub_field('company');?></p>
                                </div>
                            <?php endwhile; endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; endif; ?>

    <?php if( have_rows('contact_row') ) : while( have_rows('contact_row') ) : the_row(); ?>
        <section class="contact-row">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="contact-title">
                            <h3><?=get_sub_field('cont_title');?></h3>
                        </div>
                        <div class="contact-form">
                        <?php 
                            $form = get_sub_field('contact_form_embed');
                            $bare_form = str_replace(array('<p>','</p>'),'',$form);
                        ?>
                            <?=$bare_form;?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; endif; ?>

<?php get_footer(); ?>