<?php
    /* Template Name: Why Us Template */
    get_header();
?>
    <?php if( have_rows('top_row') ) : while( have_rows('top_row') ) : the_row(); ?>
        <section class="why-top" style="background: url('<?=get_sub_field('background_image');?>') no-repeat top center / cover;">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 offset-lg-3">
                        <div class="text-wrapper" data-aos="fade-up">
                            <?=get_sub_field('content');?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; endif; ?>

    <?php if( have_rows('programme_distinctions') ) : while( have_rows('programme_distinctions') ) : the_row(); ?>
        <section class="distinction">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="title-wrapper text-center" data-aos="fade-down">
                            <h3><?=get_sub_field('pd_title');?>
                        </div>
                    </div>
                    <?php if( have_rows('distinctions') ) : $d=200; while( have_rows('distinctions') ) : the_row(); ?>
                        <div class="col-12 col-lg-4">
                            <div class="single-dist" data-aos="fade-right" data-aos-delay="<?=$d;?>">
                                <?php $img = get_sub_field('image'); ?>
                                <img src="<?=$img['url'];?>" alt="<?=$img['alt'];?>" class="img-fluid">
                                <p><?=get_sub_field('point_text');?>
                            </div>
                        </div>  
                        <?php $d = $d + 200; ?>
                    <?php endwhile; endif; ?>
                </div>
            </div>
        </section>
    <?php endwhile; endif; ?>

    <?php if( have_rows('model') ) : while( have_rows('model') ) : the_row(); ?>
        <section class="tested-model">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-5">
                        <div class="text-wrapper" data-aos="fade-right">
                            <?=get_sub_field('left_content');?>
                        </div>
                    </div>
                    <?php $r_graph = get_sub_field('right_graphic'); ?>
                    <?php if( $r_graph ) : ?>
                        <div class="col-12 col-lg-6 offset-lg-1">
                            <div class="text-center" data-aos="fade-left">
                                <img src="<?=$r_graph['url'];?>" alt="<?=$r_graph['alt'];?>" class="img-fluid">
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php if( have_rows('waves') ) : $i = 1; $d = 350; ?>
                <div class="container-fluid waves">
                    <div class="row">
                        <div class="col-12 px-0">
                            <?php while( have_rows('waves') ) : the_row(); ?>
                                <div class="single-wave wave-<?=$i;?>" data-aos="fade-left" data-aos-delay="<?=$d;?>">
                                    <div class="inner">
                                        <div class="wave-no">
                                            <h3>Wave <?=$i;?></h3>
                                        </div>
                                        <div class="wave-content">
                                            <?=get_sub_field('wave_text');?>
                                        </div>
                                    </div>
                                </div>
                                <?php $i++; $d = $d + 350; ?>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </section>
    <?php endwhile; endif; ?>

    <?php if( have_rows('cta_row') ) : while( have_rows('cta_row') ) : the_row(); ?>
        <section class="red-cta-bar">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-4" data-aos="fade-up">
                        <div class="text-wrapper">
                            <?=get_sub_field('cta_content');?>
                        </div>
                        <?php 
                            $r_btn = get_sub_field('button');
                            if( $r_btn ) :
                                $btn_txt = $r_btn['title'];
                                $btn_url = $r_btn['url'];
                                $btn_trgt = $r_btn['target'] ? $r_btn['target'] : '_self';
                                $btn_style = get_sub_field('button_style');
                        ?>
                            <div class="button-wrapper">
                                <a href="<?=$btn_url;?>" class="siteCTA white <?=$btn_style;?>" target="<?=$btn_trgt;?>"><?=$btn_txt;?></a>
                            </div>
                        <?php endif; ?>
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