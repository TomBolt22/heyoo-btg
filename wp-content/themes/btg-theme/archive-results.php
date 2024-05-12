<?php get_header(); ?>

<?php if( have_rows('result_top_row', 'option') ) : while( have_rows('result_top_row', 'option') ) : the_row(); ?>
<section class="ra-top"
    style="background: url('<?=get_sub_field('background_image');?>') no-repeat bottom center / cover;">
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

        <div class="filter-container flex flex-row">

            <label for="filter-industry">Search by Industry - </label>
            <select id="filter-industry">
                <option value="">All</option>
                <?php 
                $industry_terms = get_terms(array(
                    'taxonomy' => 'industry_taxonomy', 
                    'hide_empty' => false,
                ));
                if ($industry_terms && !is_wp_error($industry_terms)) :
                    foreach ($industry_terms as $term) : ?>
                <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
                <?php endforeach;
                endif; ?>
            </select>

            <label for="filter-tags">Problem Solved - </label>
            <select id="filter-tags">
                <option value="">All</option>
                <?php 
                $terms = get_terms(array(
                    'taxonomy' => 'result_tag',
                    'hide_empty' => false,
                ));
                if ($terms && !is_wp_error($terms)) :
                    foreach ($terms as $term) : ?>
                <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
                <?php endforeach;
                endif; ?>
            </select>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="results">
                    <?php 
                    $args = array(
                        'post_type' => 'results',
                        'orderby' => 'date', 
                        'order' => 'DESC',
                        'posts_per_page' => 2,
                    );
                    $custom_loop = new WP_Query($args);
                     if ( $custom_loop->have_posts() ) :
                        while ( $custom_loop->have_posts() ) : $custom_loop->the_post(); 
                            get_template_part('components/content', 'results'); 
                        endwhile;
                        wp_reset_postdata(); 
                    else :
                      echo '<p>No results found.</p>'; 
                    endif;
                    ?>
                </div>
                <div class="mt-4 text-center " data-aos="fade-up" data-aos-delay="400">
                    <button class="loadPosts siteCTA purple outline" data-post-type="results">Load More</button>
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
                        <a data-toggle="modal" data-target=".vid-modal"><img class="play-btn"
                                src="/wp-content/uploads/2024/04/play-btn-1.svg" alt="Play Button"
                                class="img-fluid"></a>
                    </div>
                </div>
                <div class="modal fade vid-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="row">
                                <div class="col-12 video-wrapper">
                                    <div class="close" data-dismiss="modal">&#10005;</div>
                                    <iframe src="<?=get_sub_field('embed_url');?>" frameborder="0"
                                        allowfullscreen></iframe>
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
                    <a href="<?=$btn_url;?>" class="siteCTA white <?=$btn_style;?>"
                        target="<?=$btn_trgt;?>"><?=$btn_txt;?></a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endwhile; endif; ?>

<?php get_footer(); ?>