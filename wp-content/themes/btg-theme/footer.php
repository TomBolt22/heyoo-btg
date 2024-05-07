        </main>
        <footer>
            <div class="footer-main">
                <div class="container">
                    <div class="footer-logo">
                        <?php $footer_logo = get_field('footer_logo', 'option'); ?>
                        <img src="<?=$footer_logo['url'];?>" alt="<?=$footer_logo['alt'];?>" class="img-fluid">
                    </div>
                    <?php if( have_rows('footer_main', 'option') ) : while( have_rows('footer_main', 'option') ) : the_row(); ?>
                        <div class="row">
                            <div class="col-12 col-lg-2 quick-links">
                                <?=get_sub_field('links');?>
                            </div>
                            <div class="col-12 col-lg-5">
                                <div class="email ge">
                                    <p><strong>Have a general enquiry?</strong></p>
                                    <a href="mailto:<?=get_sub_field('ge_email');?>"><?=get_sub_field('ge_email');?></a>
                                </div>
                                <div class="email part">
                                    <p><strong>Want to partner with us?</strong></p>
                                    <a href="mailto:<?=get_sub_field('part_email');?>"><?=get_sub_field('part_email');?></a>
                                </div>
                                <div class="locations">
                                    <?php if( get_sub_field('location_1') ) : ?>
                                        <div class="loc">
                                            <?=get_sub_field('location_1');?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if( get_sub_field('location_2') ) : ?>
                                        <div class="loc">
                                            <?=get_sub_field('location_2');?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4 offset-lg-1">
                                <div class="newsletter white-underlined">
                                    <p><strong><?=get_sub_field('newsletter_title');?></strong></p>
                                    <script>
                                    hbspt.forms.create({
                                        region: "eu1",
                                        portalId: "143594092",
                                        formId: "2602692f-f778-4678-bc00-7d51fa4a20dc"
                                    });
                                    </script>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; endif; ?>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <p>Breakthrough Global is a trading name for The Breakthrough Group Ltd</p>
                </div>
            </div>
        </footer>
        <?php wp_footer();?>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init({
                duration: 1000,
                once: true,
            });
        </script>
    </body>
</html>