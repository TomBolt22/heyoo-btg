  <div class="single-pod" data-aos="fade-up" data-aos-delay="200">
      <div class="inner">
          <div class="image-wrapper">
              <img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?= get_the_title(); ?>" class="img-fluid">
          </div>
          <div class="content">
              <h3><?= get_the_title(); ?></h3>
              <?php if( have_rows('podcast_top_row') ): while( have_rows('podcast_top_row') ) : the_row(); ?>
              <p><?= strip_tags(wp_trim_words(get_sub_field('intro'), 17, '...')); ?></p>
              <?php endwhile; endif; ?>
          </div>
          <div class="read-more">
              <a href="<?= get_the_permalink(); ?>" class="arrow-btn">Listen Now</a>
          </div>
      </div>
  </div>