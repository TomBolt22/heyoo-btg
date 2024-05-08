       <div class="single-result" data-aos="fade-up" data-aos-delay="200">
           <div class="inner">
               <div class="prob">
                   <p>Problem solved</p>
               </div>
               <div class="logo">
                   <?php $img = get_field('logo'); ?>
                   <img src="<?php echo wp_get_attachment_image_url($img, ''); ?>" class="img-fluid">
               </div>
               <div class="content">
                   <h3><?php echo get_field('title'); ?></h3>
                   <p><?php echo wp_trim_words(get_field('excerpt'), 17); ?></p>
               </div>
               <div class="read-more">
                   <a href="<?php the_permalink(); ?>" class="arrow-btn">Read More</a>
               </div>
           </div>
       </div>