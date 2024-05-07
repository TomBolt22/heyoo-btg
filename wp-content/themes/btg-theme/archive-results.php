<?php get_header(); ?>

    <?php if( have_rows('result_top_row', 'option') ) : while( have_rows('result_top_row', 'option') ) : the_row(); ?>
        <section class="ra-top" style="background: url('<?=get_sub_field('background_image');?>') no-repeat bottom center / cover;">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8 offset-lg-2" data-aos="fade-up">
                        <div class="text-wrapper text-center">
                            <?php if( get_sub_field('rt_content') ) : ?>
                                <?=get_sub_field('rt_content');?>
                            <?php else : ?>
                                <h1>Results Archive</h1>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; endif; wp_reset_postdata(); ?>

    <section class="results-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="results">
                        <?php 
                            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                            $args = array(
                                'post_type' => 'results',
                                'orderby' => 'published_date',
                                'order' => 'DESC',
                                'posts_per_page' => 2,
                                'paged' => $paged
                            );
                            $custom_loop = new WP_Query($args);
                            while ( $custom_loop->have_posts() ) : $custom_loop->the_post(); 
                        ?>
                                <div class="single-result" data-aos="fade-up" data-aos-delay="200">
                                    <div class="inner">
                                        <div class="prob">
                                            <p>Problem solved</p>
                                        </div>
                                        <div class="logo">
                                            <?php $img = get_field('logo'); ?>
                                            <img src="<?=wp_get_attachment_image_url( $img, '' );?>" class="img-fluid">
                                        </div>
                                        <div class="content">
                                            <?php if( get_field('title') ) : ?>
                                                <h3><?=get_field('title');?></h3>
                                            <?php else : ?>
                                                <h3><?=the_title();?></h3>
                                            <?php endif; ?>
                                            <?php if( get_field('excerpt') ) : ?>
                                                <p><?=get_field('excerpt');?></p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="read-more">
                                            <a href="<?=get_the_permalink();?>" class="arrow-btn">Read More</a>
                                        </div>
                                    </div>
                                </div>
                    <?php endwhile;?>
                    <?php 
                        global $wp_query;
                        $big = 999999999; // need an unlikely integer
                        echo paginate_links( array(
                            'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                            'format' => '?paged=%#%',
                            'current' => max( 1, get_query_var('paged') ),
                            'total' => $custom_loop->max_num_pages
                        ) );
                    ?>
                    </div>
                    <div class="result-pagination"> 
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if( have_rows('video_row', 'option') ) : while( have_rows('video_row', 'option') ) : the_row(); ?>
        <section class="result-video alt-black-grad-bg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="vid-title text-center" data-aos="fade-left">
                            <h3><?=get_sub_field('video_title');?></h3>
                        </div>
                        <div class="video-img" data-aos="fade-right">
                            <?php $vid_img = get_sub_field('vid_ph');?>
                            <img src="<?=$vid_img['url'];?>" alt="<?=$vid_img['alt'];?>" class="img-fluid">
                            <div class="vid-btn">
                                <a data-toggle="modal" data-target=".vid-modal"><img class="play-btn" src="/wp-content/uploads/2024/04/play-btn-1.svg" alt="Play Button" class="img-fluid"></a>
                            </div>
                        </div>
                        <div class="modal fade vid-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="row">
                                        <div class="col-12 video-wrapper">
                                            <div class="close" data-dismiss="modal">&#10005;</div>
                                            <iframe src="<?=get_sub_field('embed_url');?>" frameborder="0" allowfullscreen></iframe>
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

    <?php if( have_rows('cta_row', 'option') ) : while( have_rows('cta_row', 'option') ) : the_row(); ?>
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

<?php get_footer(); ?>