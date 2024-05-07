<?php
    /* Template Name: Homepage Template */
    get_header();
?>

    <?php if( have_rows('top_row') ) : while( have_rows('top_row') ) : the_row(); ?>
        <section class="home-top position-relative" style="background: url('<?=get_sub_field('background_image');?>') no-repeat center center / cover;">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 offset-lg-3" data-aos="fade-up">
                        <div class="text-wrapper">
                            <?=get_sub_field('content');?>
                        </div>
                        <div class="button-wrapper">
                            <?php if( have_rows('header_buttons') ) : $bc = 1;  while( have_rows('header_buttons') ) : the_row(); ?>
                                <?php 
                                    $header_btn = get_sub_field('h_button');
                                    if ($bc % 2 == 0) {
                                        $style = "outline";
                                    } else {
                                        $style = "solid";
                                    }
                                    if( $header_btn ) :
                                        $btn_txt = $header_btn['title'];
                                        $btn_url = $header_btn['url'];
                                        $btn_trgt = $header_btn['target'] ? $header_btn['target'] : '_self';

                                ?>
                                    <a href="<?=$btn_url;?>" target="<?=$btn_trgt;?>" class="siteCTA <?=$style;?>"><?=$btn_txt;?></a>
                                    <?php $bc++; ?>
                                <?php endif; ?>
                            <?php endwhile; endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="scroll-down" data-aos="fade-up">
                <a href="#vid-row">
                    <img src="/wp-content/uploads/2024/04/ScrollDown.svg" alt="Scroll Arrow" class="img-fluid" width="30" height="30">
                </a>
            </div>
        </section>
    <?php endwhile; endif; ?>

    <?php if( have_rows('video_row') ) : while( have_rows('video_row') ) : the_row(); ?>
        <section id="vid-row" class="video-row">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 offset-lg-3">
                        <div class="text-wrapper" data-aos="fade-left">
                            <?=get_sub_field('intro_text');?>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="video-img" data-aos="fade-right">
                            <?php $vid_img = get_sub_field('video_placeholder');?>
                            <img src="<?=$vid_img['url'];?>" alt="<?=$vid_img['alt'];?>" class="img-fluid">
                            <div class="vid-btn">
                                <a data-toggle="modal" data-target=".vid-modal"><img src="/wp-content/uploads/2024/04/play-btn-1.svg" alt="Play Button" class="img-fluid"></a>
                            </div>
                        </div>
                        <div class="modal fade vid-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="row">
                                        <div class="col-12 video-wrapper">
                                            <div class="close" data-dismiss="modal">&#10005;</div>
                                            <iframe src="<?=get_sub_field('video_embed_url');?>" frameborder="0" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; endif; ?>

    <?php if( have_rows('partners') ) : while( have_rows('partners') ) : the_row(); ?>
        <section class="our-partners">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <div class="title-wrapper text-center">
                            <h3><?=get_sub_field('part_title');?></h3>
                        </div>
                        <div class="partner-slider">
                            <?php 
                                $part_gal = get_sub_field('partner_gallery');
                                foreach( $part_gal as $pg ) :
                            ?>
                                <div class="item">
                                    <img src="<?=$pg['url'];?>" alt="<?=$pg['alt'];?>" class="img-fluid">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; endif; ?>

    <?php if( have_rows('clients_choose_us') ) : while( have_rows('clients_choose_us') ) : the_row(); ?>
        <section class="clients-choose" style="background:url('<?=get_sub_field('background_image');?>') no-repeat top right / cover;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="title-wrapper text-center" data-aos="fade-up">
                            <h3><?=get_sub_field('ccu_title');?></h3>
                        </div>
                    </div>
                </div>
                <div class="row reason-row justify-content-center">
                    <?php if( have_rows('reasons') ) : $delay = 300; while( have_rows('reasons') ) : the_row(); ?>
                        <?php 
                            $img = get_sub_field('icon');
                            $title = get_sub_field('reason_title');
                            $cont = get_sub_field('reason_content');
                        ?>
                        <div class="col-12 col-lg-4">
                            <div class="ci" data-aos="fade-right" data-aos-delay="<?=$delay;?>">
                                <div class="img-wrapper">
                                    <img class="img-fluid" src="<?=$img['url'];?>" alt="<?=$img['alt'];?>">
                                </div>
                                <div class="content">
                                    <h6><?=$title;?></h6>
                                    <p><?=$cont;?></p>
                                </div>
                            </div>
                        </div>
                        <?php $delay = $delay + 300; ?>
                    <?php endwhile; endif; ?>
                </div>
                <div class="row focused">
                    <div class="col-12 col-lg-8 offset-lg-2">
                        <h2><?=get_sub_field('focused_title');?></h2>
                        <?php 
                            $focus_btn = get_sub_field('focused_button');
                            if( $focus_btn ) :
                                $btn_txt = $focus_btn['title'];
                                $btn_url = $focus_btn['title'];
                                $btn_trgt = $focus_btn['target'] ? $focus_btn['target'] : '_self';

                        ?>
                            <a href="<?=$btn_url;?>" target="<?=$btn_trgt;?>" class="siteCTA <?=$style;?>"><?=$btn_txt;?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; endif; ?>

    <?php if( have_rows('case_studies') ) : while( have_rows('case_studies') ) : the_row(); ?>
    <section class="case-studies">
        <div class="container black-grad-bg">
            <div class="row">
                <div class="col-12 col-lg-5" data-aos="fade-right">
                    <div class="cs-images">
                        <?php 
                            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                            $args = array(
                                'post_type' => 'results',
                                'orderby' => 'published_date',
                                'order' => 'DESC',
                                'posts_per_page' => 3
                            );
                            $custom_loop = new WP_Query($args);
                            while ( $custom_loop->have_posts() ) : $custom_loop->the_post(); 
                        ?>
                            <div class="cs-img">
                                <img src="<?=get_the_post_thumbnail_url();?>" alt="<?=the_title();?>" class="img-fluid">
                            </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>
                <div class="col-12 col-lg-7" data-aos="fade-left">
                    <div class="title-wrapper">
                        <h3><?=get_sub_field('cs_title');?></h3>
                    </div>
                    <div class="cs-slider">
                        <?php 
                            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                            $args = array(
                                'post_type' => 'results',
                                'orderby' => 'published_date',
                                'order' => 'DESC',
                                'posts_per_page' => 3
                            );
                            $custom_loop = new WP_Query($args);
                            while ( $custom_loop->have_posts() ) : $custom_loop->the_post(); 
                        ?>
                            <div class="csi">
                                <h4><?=the_title();?></h4>
                                <p><?=get_field('excerpt');?></p>
                            </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                    <div class="slider-nav">
                        <div class="prev">
                            <img src="/wp-content/uploads/2024/04/arrow-left.png" alt="Left Arrow" class="img-fluid">
                        </div>
                        <div class="next">
                            <img src="/wp-content/uploads/2024/04/arrow-right.png" alt="Right Arrow" class="img-fluid">
                        </div>
                    </div>
                    <div class="more-btn">
                        <a href="/results" class="siteCTA outline">Read more case studies</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endwhile; endif; ?>

    <?php if( have_rows('testimonials') ) : while( have_rows('testimonials') ) : the_row(); ?>
        <section class="testimonials">
            <div class="container">
                <div class="row">
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
    
    <?php if( have_rows('unique_approach') ) : while( have_rows('unique_approach') ) : the_row(); ?>
        <section class="our-approach purple-grad-bg">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="text-wrapper">
                            <?=get_sub_field('content');?>
                        </div>
                        <div class="button-wrapper">
                            <?php 
                                $oa_btn = get_sub_field('button');
                                if( $oa_btn ) : 
                                    $btn_txt = $oa_btn['title'];
                                    $btn_url = $oa_btn['url'];
                                    $btn_trgt = $oa_btn['target'] ? $oa_btn['target'] : '_self';
                            ?>
                                <a href="<?=$btn_url;?>" class="siteCTA outline" target="<?=$btn_trgt;?>"><?=$btn_txt;?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="float-img">
                <?php $r_img = get_sub_field('right_image'); ?>
                <img class="img-fluid" src="<?=$r_img['url'];?>" alt="<?=$r_img['alt'];?>">
            </div>
        </section>
    <?php endwhile; endif; ?>

    <?php if( have_rows('featured_in') ) : while( have_rows('featured_in') ) : the_row(); ?>
        <section class="featured-in">
            <div class="container">
                <div class="row">
                    <div class="col-12 title-wrapper text-center">
                        <?php if( get_sub_field('fi_title') ) : ?>
                            <h3><?=get_sub_field('fi_title');?></h3>
                        <?php else : ?>
                            <h3>As featured in:</h3>
                        <?php endif; ?>
                    </div>
                    <div class="col-12 featured-gal">
                        <?php 
                            $feat_gal = get_sub_field('featured_gallery');
                            foreach( $feat_gal as $fg ) : 
                        ?>
                            <img src="<?=$fg['url'];?>" alt="<?=$fg['alt'];?>" class="img-fluid">
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; endif; ?>

    <?php if( have_rows('bt_news') ) : while( have_rows('bt_news') ) : the_row(); ?>
        <?php if( get_sub_field('show_news_row') ) : ?>
            <section class="bt-news">
                <div class="container">
                    <div class="row">
                        <div class="col-12 title-wrapper">
                            <h3><?=get_sub_field('btn_title');?></h3>
                        </div>
                        <div class="col-12 col-lg-6">
                            <?php if( have_rows('left_blog') ) : while( have_rows('left_blog') ) : the_row(); ?>
                                <div class="single-blog">
                                    <?php 
                                        $lb_img = get_sub_field('blog_image');
                                        $pub_date = get_sub_field('publish_date');
                                        $title = get_sub_field('blog_title');
                                        $exc = get_sub_field('blog_excerpt');
                                        $url = get_sub_field('blog_url');
                                    ?>
                                    <div class="img-wrapper">
                                        <img src="<?=$lb_img['url'];?>" alt="<?=$lb_img['alt'];?>" class="img-fluid">
                                    </div>
                                    <div class="content">
                                        <p class="date"><?=$pub_date;?></p>
                                        <h4><?=$title;?></h4>
                                        <p class="excerpt"><?=$exc;?></p>
                                    </div>
                                    <div class="read-more">
                                        <a href="<?=$url;?>" target="_blank" class="arrow-btn">Read more</a>
                                    </div>
                                </div>
                            <?php endwhile; endif; ?>
                        </div>
                        <div class="col-12 col-lg-6">
                            <?php if( have_rows('right_blogs') ) : while( have_rows('right_blogs') ) : the_row(); ?>
                                <div class="single-blog">
                                    <?php 
                                        $pub_date = get_sub_field('publish_date');
                                        $title = get_sub_field('blog_title');
                                        $exc = get_sub_field('blog_excerpt');
                                        $url = get_sub_field('blog_url');
                                    ?>
                                    <div class="content">
                                        <p class="date"><?=$pub_date;?></p>
                                        <h4><?=$title;?></h4>
                                        <p class="excerpt"><?=$exc;?></p>
                                    </div>
                                    <div class="read-more">
                                        <a href="<?=$url;?>" target="_blank" class="arrow-btn">Read more</a>
                                    </div>
                                </div>
                            <?php endwhile; endif; ?>
                            <div class="see-more mt-5">
                                <a href="#" class="siteCTA purple outline">See more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
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