<?php get_header(); ?>

<?php if( have_rows('podcast_top', 'option') ) : while( have_rows('podcast_top', 'option') ) : the_row(); ?>
<section class="ra-top pod-top"
    style="background: url('<?=get_sub_field('pod_bg');?>') no-repeat bottom center / cover;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1" data-aos="fade-up">
                <div class="text-wrapper text-center">
                    <?php if( get_sub_field('pod_top_cont') ) : ?>
                    <?=get_sub_field('pod_top_cont');?>
                    <?php else : ?>
                    <h1>Podcast Archive</h1>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endwhile; endif; ?>

<section class="podcast-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pods">
                    <?php 
                    $args = array(
                        'post_type' => 'podcasts',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'posts_per_page' => 2,
                    );
                    $custom_loop = new WP_Query($args);
                    if ( $custom_loop->have_posts() ) :
                        while ( $custom_loop->have_posts() ) : $custom_loop->the_post(); 
                            get_template_part('components/content', 'podcasts');
                        endwhile;
                        wp_reset_postdata(); 
                    else :
                        echo '<p>No podcasts found.</p>';
                    endif;
                    ?>
                </div>
                <div class="mt-4 text-center">
                    <button class="loadPosts siteCTA purple outline" data-post-type="podcasts">Load More</button>
                </div>
            </div>
        </div>
    </div>
</section>


<?php if( have_rows('podcast_lower', 'option') ) : while( have_rows('podcast_lower', 'option') ) : the_row(); ?>
<section class="more-podcasts">
    <div class="container alt-black-grad-bg">
        <div class="row">
            <div class="col-12 col-lg-6">
                <?php if( get_sub_field('subscribe_title') ) : ?>
                <h3><?=get_sub_field('subscribe_title');?></h3>
                <?php else : ?>
                <h3>Subscribe to the Breakthrough Podcast, get more from Breakthrough Leaders</h3>
                <?php endif; ?>
            </div>
            <div class="col-12 col-lg-6">
                <div class="white-underlined">
                    <?=get_sub_field('pc_sign_up_form');?>
                </div>
            </div>
            <div class="col-12">
                <div class="pod-slider">
                    <?php 
                                $pod_slides = get_sub_field('podcast_selection');
                                foreach( $pod_slides as $post ) : setup_postdata( $post );
                            ?>
                    <div class="item">
                        <div class="single-pod">
                            <div class="inner">
                                <div class="image-wrapper">
                                    <img src="<?=get_the_post_thumbnail_url();?>" class="img-fluid">
                                </div>
                                <div class="content">
                                    <h3><?=the_title();?></h3>
                                    <?php if( have_rows('podcast_top_row') ): while( have_rows('podcast_top_row') ) : the_row(); ?>
                                    <p><?=strip_tags(wp_trim_words(get_sub_field('intro'), 17, '...'));?></p>
                                    <?php endwhile; endif; ?>
                                </div>
                                <div class="read-more">
                                    <a href="<?=get_the_permalink();?>" class="arrow-btn">Listen Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; wp_reset_postdata(); ?>
                </div>
                <div class="ps-nav">
                    <div class="prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25.573" height="12.27"
                            viewBox="0 0 25.573 12.27">
                            <g id="Icon_feather-arrow-left" data-name="Icon feather-arrow-left"
                                transform="translate(32.573 19.07) rotate(180)">
                                <path id="Path_1039" data-name="Path 1039" d="M32.073,18H7.5"
                                    transform="translate(0 -5.065)" fill="none" stroke="#fff" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="1" />
                                <path id="Path_1040" data-name="Path 1040" d="M14.814,18.37,7.5,12.935,14.814,7.5"
                                    transform="translate(0 0)" fill="none" stroke="#fff" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="1" />
                            </g>
                        </svg>
                    </div>
                    <div class="next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25.573" height="12.27"
                            viewBox="0 0 25.573 12.27">
                            <g id="Icon_feather-arrow-left" data-name="Icon feather-arrow-left"
                                transform="translate(32.573 19.07) rotate(180)">
                                <path id="Path_1039" data-name="Path 1039" d="M32.073,18H7.5"
                                    transform="translate(0 -5.065)" fill="none" stroke="#fff" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="1" />
                                <path id="Path_1040" data-name="Path 1040" d="M14.814,18.37,7.5,12.935,14.814,7.5"
                                    transform="translate(180deg 0)" fill="none" stroke="#fff" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="1" />
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endwhile; endif; ?>

<?php get_footer(); ?>