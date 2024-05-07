<?php
    /* Template Name: Contact Template */
    get_header();
?>

    <section class="contact" style="background: url('<?=get_field('cont_bg');?>') no-repeat bottom center / cover;">
        <div class="container">
            <div class="row upper">
                <?php if( have_rows('top_row') ) : while( have_rows('top_row') ) : the_row(); ?>
                    <div class="col-12 col-lg-7">
                        <div class="title-wrapper" data-aos="fade-up">
                            <?php if( get_sub_field('title') ) : ?>
                                <h1><?=get_sub_field('title');?></h1>
                            <?php else : ?>
                                <h1>Contact us</h1>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-12 col-lg-6" data-aos="fade-right">
                        <div class="text-wrapper">
                            <?=get_sub_field('form_intro');?>
                        </div>
                    </div>
                    <div class="col-12 col-lg-9 form-col" data-aos="fade-right">
                        <div class="form-wrap white-underlined">
                            <?php 
                                $form = get_sub_field('form_embed');
                                $bare_form = str_replace(array('<p>','</p>'),'',$form);
                            ?>
                            <?=$bare_form;?>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
            </div>
            <div class="row lower">
                <?php if( have_rows('gen_enq') ) : $delay = 300; while( have_rows('gen_enq') ) : the_row(); ?>
                    <?php 
                        $title = get_sub_field('title');
                        $block_intro = get_sub_field('block_intro');
                        $links_intro = get_sub_field('links_intro');
                        $phone = get_sub_field('phone_num');
                        $email = get_sub_field('email');
                    ?>
                    <div class="col-12 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="contact-box">
                            <div class="upper">
                                <h3><?=$title;?></h3>
                                <p><strong><?=$block_intro;?></strong></p>
                            </div>
                            <div class="lower">
                                <p><?=$links_intro;?></p>
                                <?php if( $phone ) : ?>
                                    <?php $simp_phone = str_replace(array(' ','(0)'),'',$phone); ?>
                                    <a href="tel:<?=$simp_phone;?>" class="phone"><?=$phone;?></a>
                                <?php endif; ?>
                                <?php if( $email ) : ?>
                                    <a href="mailto:<?=$email;?>" class="email"><?=$email;?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
                <?php if( have_rows('new_part') ) : while( have_rows('new_part') ) : the_row(); ?>
                    <?php 
                        $title = get_sub_field('title');
                        $block_intro = get_sub_field('block_intro');
                        $links_intro = get_sub_field('links_intro');
                        $phone = get_sub_field('phone_num');
                        $email = get_sub_field('email');
                    ?>
                    <div class="col-12 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="contact-box">
                            <div class="upper">
                                <h3><?=$title;?></h3>
                                <p><strong><?=$block_intro;?></strong></p>
                            </div>
                            <div class="lower">
                                <p><?=$links_intro;?></p>
                                <?php if( $phone ) : ?>
                                    <?php $simp_phone = str_replace(array(' ','(0)'),'',$phone); ?>
                                    <a href="tel:<?=$simp_phone;?>" class="phone"><?=$phone;?></a>
                                <?php endif; ?>
                                <?php if( $email ) : ?>
                                    <a href="mailto:<?=$email;?>" class="email"><?=$email;?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
                <?php if( have_rows('call_us') ) : while( have_rows('call_us') ) : the_row(); ?>
                    <?php 
                        $title = get_sub_field('title');
                        $block_intro = get_sub_field('block_intro');
                        $links_intro = get_sub_field('links_intro');
                        $phone = get_sub_field('phone_num');
                        $email = get_sub_field('email');
                    ?>
                    <div class="col-12 col-lg-4" data-aos="fade-up" data-aos-delay="600">
                        <div class="contact-box">
                            <div class="upper">
                                <h3><?=$title;?></h3>
                                <p><strong><?=$block_intro;?></strong></p>
                            </div>
                            <div class="lower">
                                <p><?=$links_intro;?></p>
                                <?php if( $phone ) : ?>
                                    <?php $simp_phone = str_replace(array(' ','(0)'),'',$phone); ?>
                                    <a href="tel:<?=$simp_phone;?>" class="phone"><?=$phone;?></a>
                                <?php endif; ?>
                                <?php if( $email ) : ?>
                                    <a href="mailto:<?=$email;?>" class="email"><?=$email;?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>