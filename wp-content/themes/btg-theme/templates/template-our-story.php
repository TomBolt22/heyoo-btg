<?php
    /* Template Name: Our Story Template */
    get_header();
?>

    <div class="bg-wrap" style="background: url('/wp-content/uploads/2024/04/story-bg-scaled.webp') no-repeat center center / cover;">
        <section class="out-story-top">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 offset-lg-3">
                        <div class="text-wrapper" data-aos="fade-up">
                            <?=get_field('title');?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php if( have_rows('start_row') ) : while( have_rows('start_row') ) : the_row(); ?>
            <section class="about-first">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-5" data-aos="fade-right">
                            <div class="text-wrapper">
                                <?=get_sub_field('content');?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                    $r_img = get_sub_field('right_image');
                ?>
                <div class="float-img" data-aos="fade-left">
                    <img src="<?=$r_img['url'];?>" class="img-fluid" alt="<?=$r_img['alt'];?>">
                </div>
            </section>
        <?php endwhile; endif; ?>
        <?php if( have_rows('quote_process') ) : while( have_rows('quote_process') ) : the_row(); ?>
            <section class="os-quote">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-6 offset-lg-3" data-aos="fade-up">
                            <div class="quote-wrapper text-center">
                                <h4><?=get_sub_field('quote_text');?></h4>
                                <p>- <?=get_sub_field('quote_auth');?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="btg-process">
                <?php 
                    $proc_img = get_sub_field('process_image');
                    if( $proc_img ) : 
                ?>
                    <div class="float-img" data-aos="fade-right">
                        <img src="<?=$proc_img['url'];?>" class="img-fluid" alt="<?=$proc_img['alt'];?>">
                    </div>
                <?php endif; ?>
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-5 offset-lg-7" data-aos="fade-left">
                            <div class="text-wrapper">
                                <?=get_sub_field('process_content');?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endwhile; endif; ?>
        <?php if( have_rows('values_people') ) : while( have_rows('values_people') ) : the_row(); ?>
            <section class="about-values">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-6 offset-lg-3">
                            <div class="text-wrapper" data-aos="fade-down">
                                <?=get_sub_field('purpose_intro');?>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-12 col-lg-8 offset-lg-2">
                            <div class="values-wrap">
                                <?php if( have_rows('purpose_items') ) : $d = 200; while( have_rows('purpose_items') ) : the_row(); ?>
                                    <?php
                                        $img = get_sub_field('purpose_image');
                                        $txt = get_sub_field('purpose_text');
                                    ?>
                                    <div class="single-value" data-aos="fade-left" data-aos-delay="<?=$d;?>">
                                        <img src="<?=$img['url'];?>" alt="<?=$img['alt'];?>" class="img-fluid">
                                        <p><?=$txt;?></p>
                                    </div>
                                    <?php $d = $d + 200; ?>
                                <?php endwhile; endif; ?>
                            </div> 
                        </div>
                    </div>
                </div>
            </section>
            <section class="our-people">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-6 offset-lg-3">
                            <div class="text-wrapper" data-aos="fade-up">
                                <?=get_sub_field('our_people_cont');?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endwhile; endif; ?>

        <?php if( have_rows('our_logo_story') ) : while( have_rows('our_logo_story') ) : the_row(); ?>
            <?php
                $ul = get_sub_field('upper_left_content');
                $ur = get_sub_field('upper_right_icon');
                $ll = get_sub_field('lower_left_logo_image');
                $lr = get_sub_field('lower_right_content');
            ?>
            <section class="our-logo" style="background: url('/wp-content/uploads/2024/04/logo-story-bg.webp') no-repeat bottom center / cover;">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-5 intro" data-aos="fade-right">
                            <div class="text-wrapper">
                                <?=$ul;?>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 offset-lg-1 icon" data-aos="fade-left" data-aos-delay="300">
                            <img src="<?=$ur['url'];?>" alt="<?=$ur['alt'];?>" class="img-fluid">
                        </div>
                        <div class="col-12 col-lg-5 logo" data-aos="fade-right">
                            <img src="<?=$ll['url'];?>" alt="<?=$ll['alt'];?>" class="img-fluid">
                        </div>
                        <div class="col-12 col-lg-6 offset-lg-1 logo-text" data-aos="fade-left" data-aos-delay="300">
                            <div class="text-wrapper">
                                <?=$lr;?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endwhile; endif; ?>
    </div>

<?php get_footer(); ?>