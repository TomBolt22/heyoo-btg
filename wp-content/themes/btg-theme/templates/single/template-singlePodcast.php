<div class="overall-bg black-grad-bg">
    <?php if( have_rows('podcast_top_row') ) : while( have_rows('podcast_top_row') ) : the_row(); ?>
        <section class="pod-top">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6" data-aos="fade-right">
                        <div class="back-btn">
                            <p>
                                <img src="/wp-content/uploads/2024/04/arrow-left-black.png" alt="Previous Arrow" class="img-fluid">
                                <a href="#">Insights</a>
                                / 
                                <a href="/podcasts">Podcasts</a>
                                / <?=the_title();?>
                            </p>
                        </div>
                        <div class="title">
                            <h1><?=the_title();?>
                        </div>
                        <div class="listen">
                            <a href="<?=get_sub_field('listen_link');?>" class="siteCTA white outline">Listen Now</a>
                        </div>
                        <div class="meta">
                            <p class="date">
                                <strong>Date:</strong>
                                <?=get_sub_field('release_date');?>
                            </p>
                            <p class="length">
                                <strong>Length:</strong>
                                <?=get_sub_field('length');?> mins
                            </p>
                            <div class="share">
                                <p><strong>Share:</strong></p>
                                <?php $url = get_the_permalink(); ?>
                                <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?=$url;?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.75" height="18.75" viewBox="0 0 18.75 18.75">
                                        <path id="Icon_awesome-linkedin-in" data-name="Icon awesome-linkedin-in" d="M4.2,18.75H.31V6.232H4.2ZM2.251,4.525A2.262,2.262,0,1,1,4.5,2.252,2.27,2.27,0,0,1,2.251,4.525ZM18.746,18.75H14.867V12.657c0-1.452-.029-3.315-2.021-3.315-2.021,0-2.331,1.578-2.331,3.21v6.2H6.632V6.232H10.36V7.94h.054a4.085,4.085,0,0,1,3.678-2.022c3.934,0,4.657,2.591,4.657,5.956V18.75Z" transform="translate(0 -0.001)" fill="#ffffff"/>
                                    </svg>
                                    </a>
                                    <a href="http://www.facebook.com/share.php?u=<?=$url;?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.042" height="18.75" viewBox="0 0 10.042 18.75">
                                        <path id="Icon_awesome-facebook-f" data-name="Icon awesome-facebook-f" d="M10.994,10.547l.521-3.393H8.258v-2.2a1.7,1.7,0,0,1,1.913-1.833h1.48V.229A18.051,18.051,0,0,0,9.024,0C6.343,0,4.59,1.625,4.59,4.567V7.154H1.609v3.393H4.59v8.2H8.258v-8.2Z" transform="translate(-1.609)" fill="#ffffff"/>
                                    </svg>
                                    </a>
                                    <a href="mailto:?body=<?=$url;?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21.749" height="14.681" viewBox="0 0 21.749 14.681">
                                        <path id="Icon_zocial-email" data-name="Icon zocial-email" d="M.072,17.449V5.368q0-.021.063-.4l7.11,6.082L.156,17.868a1.777,1.777,0,0,1-.084-.419ZM1.016,4.131a.9.9,0,0,1,.357-.063H20.52a1.188,1.188,0,0,1,.378.063l-7.131,6.1-.944.755L10.957,12.52,9.09,10.989l-.944-.755Zm.021,14.555,7.152-6.858,2.768,2.244,2.768-2.244,7.152,6.858a1.007,1.007,0,0,1-.357.063H1.372a.95.95,0,0,1-.336-.063Zm13.632-7.634L21.758,4.97a1.252,1.252,0,0,1,.063.4v12.08a1.608,1.608,0,0,1-.063.419Z" transform="translate(-0.072 -4.068)" fill="#ffffff"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="intro">
                            <?=get_sub_field('intro');?>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6" data-aos="fade-left">
                        <div class="pod-img">
                            <img src="<?=get_the_post_thumbnail_url();?>" alt="<?=the_title();?> Podcast Image" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; endif; ?>
    <?php if( have_rows('podcast_meta') ) : while( have_rows('podcast_meta') ) : the_row(); ?>
        <section class="pod-meta">
            <div class="container">
                <div class="row" data-aos="fade-up">
                    <div class="col-12 col-lg-4">
                        <div class="lessons">
                            <p class="title"><strong>Lessons:</strong></p>
                            <?php if( have_rows('lessons') ) : while( have_rows('lessons') ) : the_row(); ?>
                                <p><?=get_sub_field('lesson_text');?></p>
                            <?php endwhile; endif; ?>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="listen-on">
                            <p class="title"><strong>Listen on:</strong></p>
                            <?php
                                $listen_on = get_sub_field('listen_on');
                                if( $listen_on && in_array('spotify', $listen_on) ) {
                                    echo '<a href="'.get_sub_field('spotify_link').'"><span class="d-none">Listen on Spotify</span><img class="img-fluid" src="/wp-content/uploads/2024/04/Spotify_logo_with_text.svg" alt="Spotify Logo"></a>';
                                } 
                                if( $listen_on && in_array('apple-music', $listen_on) ) {
                                    echo '<a href="'.get_sub_field('ap_link').'"><span class="d-none">Listen on Apple Podcasts</span><img class="img-fluid" src="/wp-content/uploads/2024/04/apple-podcast.svg" alt="Apple Podcasts Logo"></a>';
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="also-like">
                            <p class="title"><strong>If you like this episode, you’ll also like…</strong></p>
                            <div class="ymal-wrap">
                                <?php 
                                    $pod_slides = get_sub_field('more_similar_episodes');
                                    foreach( $pod_slides as $post ) : setup_postdata( $post );
                                ?>
                                    <div class="small-pod">
                                        <a href="<?=get_the_permalink();?>" class="absolute-link"><span class="d-none">Listen Now</span></a>
                                        <div class="inner">
                                            <div class="image-wrapper">
                                                <img src="<?=get_the_post_thumbnail_url( $post, 'thumbnail' );?>" class="img-fluid">
                                            </div>
                                            <div class="content">
                                                <p><strong><?=the_title();?></strong></p>
                                                <?php if( have_rows('podcast_top_row') ): while( have_rows('podcast_top_row') ) : the_row(); ?>
                                                    <p><?=strip_tags(wp_trim_words(get_sub_field('intro'), 7, '...'));?></p>
                                                <?php endwhile; endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; endif; ?>
    <section class="pod-lower">
        <div class="container">
            <div class="row" data-aos="fade-up">
                <div class="col-12">
                    <div class="transcript">
                        <a data-toggle="collapse" href="#transcriptCollapse" class="collapsed" role="button" aria-expanded="false" aria-controls="transcriptCollapse">
                            <h3>
                                View episode transcript
                                <svg xmlns="http://www.w3.org/2000/svg" width="23.619" height="13.503" viewBox="0 0 23.619 13.503">
                                    <path id="Icon_ionic-ios-arrow-back" data-name="Icon ionic-ios-arrow-back" d="M15.321,18l8.937-8.93a1.688,1.688,0,0,0-2.391-2.384L11.742,16.8a1.685,1.685,0,0,0-.049,2.327L21.86,29.32a1.688,1.688,0,0,0,2.391-2.384Z" transform="translate(29.813 -11.251) rotate(90)" fill="#fff"/>
                                </svg>
                            </h3>
                        </a>
                        <div class="collapse" id="transcriptCollapse">
                            <?=get_field('pod_trans');?>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <h3>More episodes</h3>
                    <div class="pod-slider">
                        <?php 
                            $pod_slider = get_field('more_episodes');
                            foreach( $pod_slider as $post ) : setup_postdata( $post );
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="25.573" height="12.27" viewBox="0 0 25.573 12.27">
                            <g id="Icon_feather-arrow-left" data-name="Icon feather-arrow-left" transform="translate(32.573 19.07) rotate(180)">
                                <path id="Path_1039" data-name="Path 1039" d="M32.073,18H7.5" transform="translate(0 -5.065)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                                <path id="Path_1040" data-name="Path 1040" d="M14.814,18.37,7.5,12.935,14.814,7.5" transform="translate(0 0)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                            </g>
                            </svg>
                        </div>
                        <div class="next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25.573" height="12.27" viewBox="0 0 25.573 12.27">
                            <g id="Icon_feather-arrow-left" data-name="Icon feather-arrow-left" transform="translate(32.573 19.07) rotate(180)">
                                <path id="Path_1039" data-name="Path 1039" d="M32.073,18H7.5" transform="translate(0 -5.065)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                                <path id="Path_1040" data-name="Path 1040" d="M14.814,18.37,7.5,12.935,14.814,7.5" transform="translate(180deg 0)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                            </g>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="pod-next-prev">
                        <?php if ( get_previous_post() !== '' && get_next_post() !== '' ) : ?>
                        <?php // Logic required for prev & next ?>
                            <div class="prev">
                                <a href="<?=get_the_permalink( get_previous_post() );?>" class="nav-btn"><img src="/wp-content/uploads/2024/04/arrow-left-black.png" alt="Previous Arrow" class="img-fluid">Previous</a>
                            </div>
                            <div class="next">
                                <a href="<?=get_the_permalink( get_next_post() );?>" class="nav-btn">Next<img src="/wp-content/uploads/2024/04/arrow-right-black.png" alt="Next Arrow" class="img-fluid"></a>
                            </div>
                        <?php elseif ( get_previous_post() === '' && get_next_post() !== '' ) : ?>
                        <?php // Logic required for next ?>
                            <div class="next">
                                <a href="<?=get_the_permalink( get_next_post() );?>" class="nav-btn">Next<img src="/wp-content/uploads/2024/04/arrow-right-black.png" alt="Next Arrow" class="img-fluid"></a>
                            </div>
                        <?php elseif ( get_previous_post() !== '' && get_next_post() === '' ) : ?>
                        <?php // Logic required for prev ?>
                            <div class="prev">
                                <a href="<?=get_the_permalink( get_previous_post() );?>" class="nav-btn"><img src="/wp-content/uploads/2024/04/arrow-left-black.png" alt="Previous Arrow" class="img-fluid">Previous</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>