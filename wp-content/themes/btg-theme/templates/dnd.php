<?php
    /* Template Name: test Template */
    get_header();
?>

    <div class="bg-wrap">
        <section class="out-story-top">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 offset-lg-3">
                        <div class="text-wrapper">
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
                        <div class="col-12 col-lg-4">
                            <div class="text-wrapper">
                                <?=get_sub_field('content');?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                    $row_img = get_sub_field('row_img');
                    if( $row_img ) : 
                ?>
                    <div class="float-img">
                        <img src="<?=$row_img['url'];?>" class="img-fluid" alt="<?=$row_img['alt'];?>">
                    </div>
                <?php endif; ?>
            </section>
        <?php endwhile; endif; ?>
        <?php if( have_rows('quote_process') ) : while( have_rows('quote_process') ) : the_row(); ?>
            <section class="os-quote">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-6 offset-lg-3">
                            <div class="quote-wrapper">
                                <h4><?=get_sub_field('');?></h4>
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
                    <div class="float-img">
                        <img src="<?=$proc_img['url'];?>" class="img-fluid" alt="<?=$proc_img['alt'];?>">
                    </div>
                <?php endif; ?>
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-4 offset-lg-8">
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
                            <div class="text-wrapper">
                                <?=get_sub_field('purpose_intro');?>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-12 col-lg-8 offset-lg-2">
                            <div class="values-wrap">
                                <?php if( have_rows('purpose_items') ) : while( have_rows('purpose_items') ) : the_row(); ?>
                                    <?php
                                        $img = get_sub_field('purpose_image');
                                        $txt = get_sub_field('purpose_text');
                                    ?>
                                    <div class="single-value">
                                        <img src="<?=$img['url'];?>" alt="<?=$img['alt'];?>" class="img-fluid">
                                        <p><?=$txt;?></p>
                                    </div>
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
                            <div class="text-wrapper">
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
            <section class="our-logo" style="background: url('/wp-content/uploads/2024/04/logo-story-bg.webp') no-repeat center center /">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-5">
                            <div class="text-wrapper">
                                <?=$ul;?>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 offset-lg-1">
                            <img src="<?=$ur['url'];?>" alt="<?=$ur['alt'];?>" class="img-fluid">
                        </div>
                        <div class="col-12 col-lg-5">
                            <img src="<?=$ll['url'];?>" alt="<?=$ll['alt'];?>" class="img-fluid">
                        </div>
                        <div class="col-12 col-lg-6 offset-lg-1">
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