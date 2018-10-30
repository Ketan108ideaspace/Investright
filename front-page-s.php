<?php get_header(); ?>

<!-- Banner Section -->
<div class="banner-wrap">
  <div class="row">
    <div class="banner-img-wrap">
    <div class="banner-content-box">
    <h1>Recognize, reject, and report investment fraud</h1>
    <a href="#" class="link-more">Learn More</a>
    </div>
    <img src="<?php echo $template_url; ?>/images/banner-img.jpg" alt=""></div>
    <div class="latest-news-wrap">
      <div class="latest-news-inner">
      <h3><?php _e( "Latest News", "investright" ); ?> <icon class="iconset icon-feed"></icon></h3>
		<?php
			wp_reset_postdata();
			$newsAry = array( 'post_type' => 'post', 
				'post_status' => 'publish', 
                'posts_per_page' => 4, 
                'order' => 'ASC', 
                'orderby' => 'post_date' 
			);
              
              $wp_query = new WP_Query($newsAry);
              if($wp_query->have_posts()) :
				while ($wp_query->have_posts()) : $wp_query->the_post();
					?>
						<div class="latest-news-container alert">
						  <h3><?php the_title(); ?></h3>
						  <p><?php the_excerpt(); ?></p>
						  <p><?php echo date( 'F d, Y', strtotime( get_the_date() ) ); ?></p>
						</div>
					<?php
				endwhile;
			wp_reset_postdata();
			endif;
          ?>
      </div>
    </div>
  </div>
</div>

<!-- Body Content -->
<div class="container"> 
  
  <!-- Two Column Wrap -->
  <div class="row be-wrap">
    <div class="be-colL">
      <div class="be-colL-inner">
        <div class="be-content-wrap right">
          <h3>Be fraud aware</h3>
          <p>Every year, British Columbians are affected by investment fraud. Follow Be Fraud Aware and help combat it.</p>
          <a href="#" class="link-more">Learn More</a> </div>
      </div>
    </div>
    <div class="be-colR">
      <div class="be-colR-inner">
        <div class="be-content-wrap left">
          <h3>Be an informed investor</h3>
          <p>Every year, British Columbians are affected by investment fraud. Follow Be Fraud Aware and help combat it.</p>
          <a href="#" class="link-more">Learn More</a> </div>
      </div>
    </div>
  </div>
  
  <!-- Fraudster Exposed Section -->
  <div class="row fraudster-wrap">
    <div class="fraudster-inner">
      <div class="fraudster-colL">
        <h3>Fraudster exposed</h3>
        <p>Watch as we expose a fraudster for who he really is. Every year, British Columbians are affected by investment fraud. Follow Be Fraud Aware and help combat it.</p>
        <p>Watch as we expose a fraudster for who he really is. Every year, British Columbians are affected by investment fraud. Follow Be Fraud Aware and help combat it.</p>
        <a href="#" class="link-more">See More Videos</a> </div>
      <div class="fraudster-colR"><img src="<?php echo $template_url; ?>/images/fraudster-video-thumb.jpg" alt=""></div>
    </div>
  </div>
</div>

<?php get_footer(); ?>