<?php
    /* Template Name: FAQs Template */
    get_header();
?>

    <?php if( have_rows('faqs') ) : while( have_rows('faqs') ) : the_row(); ?>
        <section class="faq-top" style="background:url('/wp-content/uploads/2024/04/faq-top.jpg') no-repeat center center / cover;">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 offset-lg-3" data-aos="fade-up">
                        <div class="white-box">
                            <?php if( get_sub_field('alternative_title') ) : ?>
                                <h1><?=get_sub_field('alternative_title');?></h1>
                            <?php else : ?>
                                <h1><?=the_title();?></h1>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="faqs black-grad-bg">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-10 offset-lg-1">
                        <div class="accordion-wrap" data-aos="fade-up" data-aos-delay="300">
                            <?php if( have_rows('faq_quest') ) : $i = 1; while( have_rows('faq_quest') ) : the_row(); ?>
                                <?php
                                    $q = get_sub_field('question');
                                    $a_type = get_sub_field('answer_type');
                                    $a_text = get_sub_field('answer_text');
                                    $vid_img = get_sub_field('vid_img');
                                    $vid_url = get_sub_field('vid_url');
                                ?>
                                <div class="single-question">
                                    <button class="btn btn-link btn-block text-left heading<?=$i;?> <?php if($i!=1){echo 'collapsed';} ?>" type="button" data-toggle="collapse" data-target="#collapse<?=$i;?>" aria-expanded="<?php if($i==1){echo 'true';} else { echo 'false'; } ?>" aria-controls="collapse<?=$i;?>"><h5><?=$q;?></h5></button>
                                    <div id="collapse<?=$i;?>" class="collapse <?php if($i==1){echo 'show';} ?>" aria-labelledby="heading<?=$i;?>" data-parent=".accordion-wrap">
                                        <?php if( $a_type == 'video' ) : ?>
                                            <div class="row">
                                                <div class="col-12 col-lg-3">
                                                    <img src="<?=$vid_img['url'];?>" alt="<?=$vid_img['alt'];?>" class="img-fluid">
                                                </div>
                                                <div class="col-12 col-lg-9">
                                                    <div class="text-wrap">
                                                        <?=$a_text;?>
                                                    </div>
                                                    <div class="button-wrapper">
                                                        <a data-toggle="modal" data-target=".vid-modal-<?=$i;?>" target="_blank" class="siteCTA white">Watch video</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade vid-modal vid-modal-<?=$i;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="row">
                                                            <div class="col-12 video-wrapper">
                                                                <div class="close" data-dismiss="modal">&#10005;</div>
                                                                <iframe src="<?=$vid_url;?>" frameborder="0" allowfullscreen></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php else : ?>
                                            <div class="row">
                                                <div class="col-12">
                                                    <?=$a_text;?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php $i++; ?>
                            <?php endwhile; endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php endwhile; endif; ?>

<?php get_footer(); ?>