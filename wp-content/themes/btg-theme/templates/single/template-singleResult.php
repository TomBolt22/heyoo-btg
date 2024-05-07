
<?php $r_id = get_the_ID(); ?>

<?php if( have_rows('result_content') ) : while( have_rows('result_content') ) : the_row(); ?>
    <section class="ri-content">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <div class="back-btn">
                        <a href="/results"><img src="/wp-content/uploads/2024/04/arrow-left-black.png" alt="Left Arrow">Results</a>
                    </div>
                    <div class="title">
                        <?=get_sub_field('result_intro');?>
                    </div>
                </div>
                <div class="col-12 col-lg-6 cont-left" data-aos="fade-right">
                    <?php if( get_sub_field('issue_content') ) : ?>
                        <div class="block issue">
                            <h5>Issue:</h5>
                            <?=get_sub_field('issue_content');?>
                        </div>
                    <?php endif; ?>
                    <?php if( get_sub_field('brief') ) : ?>
                        <div class="block brief">
                            <h5>Brief:</h5>
                            <?=get_sub_field('brief');?>
                        </div>
                    <?php endif; ?>
                    <?php if( get_sub_field('what_we_do') ) : ?>
                        <div class="block wwd">
                            <h5>What we did:</h5>
                            <?=get_sub_field('what_we_do');?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-12 col-lg-6 img-right" data-aos="fade-left">
                    <img src="<?=get_the_post_thumbnail_url();?>" alt="<?=the_title();?>" class="img-fluid">
                </div>
                <div class="col-12" data-aos="fade-up">
                    <?php if( get_sub_field('outcome') ) : ?>
                        <div class="outcome">
                            <h5>Outcome:</h5>
                            <?=get_sub_field('outcome');?>
                        </div>
                    <?php endif; ?>
                    <?php 
                        $fw_img = get_sub_field('banner_image');
                        if( $fw_img ) :
                    ?>
                        <div class="fw-image">
                            <img src="<?=$fw_img['url'];?>" alt="<?=$fw_img['alt'];?>" class="img-fluid">
                        </div>
                    <?php endif; ?>
                    <div class="result-nav">
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

    <section class="see-more">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title">
                        <h3>See More Results</h3>
                    </div>
                    <?=do_shortcode('[result_slider]');?>
                </div>
            </div>
        </div>
    </section>

<?php endwhile; endif; ?>