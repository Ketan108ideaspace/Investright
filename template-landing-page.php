<?php
/*
* Template Name: Landing Page
*/
global $wpdb,$template_url;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
<title>
<?php the_title();?>
</title>
<link rel="icon" href="<?php echo $template_url; ?>/new-fav.png" type="image/x-icon" />

<!--Google Analytics Tracking Code-->
<script>
	(function (i, s, o, g, r, a, m) {
		i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
			(i[r].q = i[r].q || []).push(arguments)
		}, i[r].l = 1 * new Date(); a = s.createElement(o),
		m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
	})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

	ga('create', 'UA-44764829-1', 'investright.org');
	ga('send', 'pageview');

</script>
<!--END Google Analytics Tracking Code-->

<!-- Hotjar Tracking Code for www.investright.org -->
<script>
		(function(h,o,t,j,a,r){
			h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
			h._hjSettings={hjid:673860,hjsv:6};
			a=o.getElementsByTagName('head')[0];
			r=o.createElement('script');r.async=1;
			r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
			a.appendChild(r);
		})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
	</script>
<!-- End Hotjar Tracking Code for www.investright.org -->
<link rel="stylesheet" href="<?php echo $template_url; ?>/fonts/font-style.css">
<link rel="stylesheet" href="<?php echo $template_url; ?>/css/landing-page.css?v=1.1">
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript>
<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KTZX4W" height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="main">
  <?php 
	// check if the header section has rows of data
	if( have_rows('lp_header_section') ):
	 ?>
  <?php // loop through the rows of data
        while ( have_rows('lp_header_section') ) : the_row();
		$lp_bg_img = get_sub_field('lp_background_image');
		echo "<span style='display:none'>" . $lp_bg_img . "</span>";
		 ?>
  <div class="header-wrap pos-rel" style="background:url(<?php echo get_sub_field('lp_background_image'); ?>) no-repeat center top;background-size:cover;">
  <div class="header-inner-wrap"> <a href="<?php echo home_url() ?>"><img class="logo" src="<?php echo $template_url; ?>/images/logo-lrg.png" alt="<?php _e( "Logo - InvestRight", "investright" ); ?>"></a>
    <h1 class="scroll-down"><?php the_title();?></h1>
    <!--img src="<?php //echo get_sub_field('lp_background_image'); ?>" alt="" class="lp-bg-img"-->
    <div class="lp-content scroll-down"><?php echo get_sub_field('lp_content'); ?></div>
    <img src="<?php echo $template_url; ?>/images/down-arrow.png" alt="" class="lp-dwn-arrow scroll-down">
    <div class="header-sticky-box pos-abs">
      <h4><?php echo get_sub_field('lp_sticky_box_title'); ?></h4>
      <a href="<?php echo get_sub_field('lp_sticky_link_url'); ?>" <?php echo get_sub_field('ip_sticky_google_ga_code'); ?> target="_blank"><?php echo get_sub_field('lp_sticky_link_text'); ?> <img src="<?php echo $template_url; ?>/images/download-icon.png" alt="" class="lp-dwnload"></a> </div>
      </div>
  </div>
  <?php endwhile;  
	endif;
	?>
  <div class="content-wrap">
    <?php 
	// check if the video section has rows of data
	if( have_rows('lp_video_section') ) :
		while ( have_rows('lp_video_section') ) : the_row();
		$nvVideoThm = get_sub_field('lp_video_thumb_image');
		if($nvVideoThm=="") {
			$nvVideoThm = 'https://img.youtube.com/vi/'.get_sub_field('lp_youtube_video_id').'/0.jpg';  
		}
		?>
    <div class="video-section" style="background:<?php echo get_sub_field('lp_background_color');?>">
      <div class="row">
        <div class="video-wrap"><a class="html5lightbox lp-video-thumb" <?php echo get_sub_field('ip_video_google_ga_code'); ?> href="https://www.youtube.com/embed/<?php echo get_sub_field('lp_youtube_video_id');?>" data-width="560" data-height="360">
        <span class="video-title"><?php echo get_sub_field('lp_youtube_video_title');?></span>
        <img src="<?php echo $nvVideoThm; ?>" /></a>
		</div>
        <div class="video-content"><?php echo get_sub_field('lp_video_content');?></div>
      </div>
    </div>
    <?php endwhile;        
	endif; ?>
  </div>
  <div class="bottom-wrap">
    <div class="row">
      <?php 
	// check if the report section has rows of data
	if( have_rows('lp_report_section') ) :
      while ( have_rows('lp_report_section') ) : the_row(); ?>
      <div class="bottom-col pos-rel"> <img src="<?php echo get_sub_field('image'); ?>" alt="" class="lp-report-img">
        <div class="lp-report-btn-wrap pos-abs">
          <h3><?php echo get_sub_field('heading'); ?></h3>
          <a href="<?php echo get_sub_field('button_link'); ?>" <?php echo get_sub_field('rp_google_ga_code'); ?> target="_blank"><?php echo get_sub_field('button_text'); ?> <img src="<?php echo $template_url; ?>/images/arrow-right.png" alt="" class="btn-arrow-img"></a> </div>
      </div>
      <?php endwhile;        
	endif;

	// check if the newsletter section has rows of data
	if( have_rows('lp_newsletter_section') ) :
      while ( have_rows('lp_newsletter_section') ) : the_row(); ?>
      <div class="bottom-col lp-newsletter" style="background:url(<?php echo get_sub_field('background_image'); ?>) no-repeat center">
        <h3><?php echo get_sub_field('heading'); ?></h3>
        <?php echo get_sub_field('form_content'); ?> </div>
    </div>
    <?php endwhile;        
	endif; ?>
  </div>
  <div class="footer-top">
    <div class="row"> 
      <!-- Foooter Address Section -->
      <div class="footer-social-links">
        <div class="row">
          <ul>
            <li><a href="<?php echo of_get_option( 'facebook_url' ); ?>" target="_blank" title="CONNECT WITH US ON FACEBOOK"> <span class="icon iconset icon-fb"></span>
              <?php _e( "CONNECT WITH US", "investright" ); ?>
              <br>
              <?php _e( "ON FACEBOOK", "investright" ); ?>
              <br>
              </a></li>
            <li><a href="<?php echo of_get_option( 'twitter_url' ); ?>" target="_blank" title="FOLLOW US ON TWITTER"> <span class="icon iconset icon-tw"></span>
              <?php _e( "FOLLOW US ON", "investright" ); ?>
              <br>
              <?php _e( "TWITTER", "investright" ); ?>
              <br>
              </a></li>
            <li><a href="<?php echo of_get_option( 'youtube_url' ); ?>" target="_blank" title="FOLLOW US ON YOUTUBE"> <span class="icon iconset icon-utube"></span>
              <?php _e( "FOLLOW US", "investright" ); ?>
              <br>
              <?php _e( "ON YOUTUBE", "investright" ); ?>
              <br>
              </a></li>
            <li><a onclick="ga('send','event',{'eventCategory':'ReportConcern','eventAction':'click', 'eventLabel':'ReportConcernBottom'});" href="<?php echo of_get_option( 'footer_report_a_concern_link' ); ?>" target="_blank" title="REPORT A CONCERN"> <span class="icon iconset icon-report"></span>
              <?php _e( "REPORT", "investright" ); ?>
              <br>
              <?php _e( "A CONCERN", "investright" ); ?>
              <br>
              </a></li>
          </ul>
        </div>
      </div>
      <div class="address-wrap">
        <div class="whtTxt tel-wrap">
          <p>BCSC Inquiries: <a href="tel:604-899-6854">604-899-6854</a></p>
          <p>Toll free: <a href="tel:1-800-373-6393">1-800-373-6393</a></p>
          <p>Email: <a href="mailto:inquiries@bcsc.bc.ca">inquiries@bcsc.bc.ca</a></p>
          <p>Fax: <a href="tel:604-899-6506">604-899-6506</a></p>
        </div>
      </div>
      <!-- Footer Copy Wrap -->
      <div class="copywrap">&copy; COPYRIGHT 2018 BRITISH COLUMBIA SECURITIES COMMISSION</div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script> 
<script src="<?php echo $template_url; ?>/js/jquery.min.js"></script> 
<script src="<?php echo $template_url; ?>/js/landing-page.js?v=1.1"></script> 
<script src="<?php echo $template_url; ?>/html5lightbox.js"></script>
</body>
</html>
