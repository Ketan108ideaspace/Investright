<?php
/*
* Template Name: Fraud Course Landing Page
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
<link rel="stylesheet" href="<?php echo $template_url; ?>/fonts/font-style.css">
<link rel="stylesheet" href="<?php echo $template_url; ?>/css/fc-landing-page.css">
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
</head>
<body>
<div class="main">
  <div class="header-wrap"> <img src="<?php echo $template_url; ?>/images/logo-lrg.png" alt="Logo - BCSC Investright"> </div>
  <div class="content-wrap">
    <div class="content-inner">
    <img src="<?php echo get_field('fraud_email_images_for_large_screen'); ?>" class="fraud-txt lrg-screen" alt="">
    <img src="<?php echo get_field('fraud_email_images_for_desktop'); ?>" class="fraud-txt desktop" alt="">
    <img src="<?php echo get_field('fraud_email_images_for_mobile'); ?>" class="fraud-txt mobile" alt="">
      <div class="content-para">
		<?php echo get_post_field('post_content', $post->ID); ?>
        <!-- Embed Envoke Engagement -->
        <div id="nvkEmbedac15e8a808537b8ddda5ba4080d51cc0" class="nvkEmbed"></div>
        <script async src="https://subscribe.investright.org/ext/embed/engagements/ac15e8a808537b8ddda5ba4080d51cc0.js"></script>
        <!-- End Embed Envoke Engagement -->
      </div>
      <img src="<?php echo get_field('fraud_email_background_images_for_large_screen'); ?>" class="img-collage lrg-screen" alt="">
      <img src="<?php echo get_field('fraud_email_background_images_for_desktop'); ?>" class="img-collage desktop" alt="">
      <img src="<?php echo get_field('fraud_email_background_images_for_mobile'); ?>" class="img-collage mobile" alt="">
      </div>
    <div class="down-ractangle">
    <div class="in-course">What's in <span>the course?</span></div>
    <img src="<?php echo $template_url; ?>/images/down-ractangle-lrg.png" class="lrg-screen" alt="">
    <img src="<?php echo $template_url; ?>/images/down-ractangle.png" class="desktop" alt="">
    <img src="<?php echo $template_url; ?>/images/down-ractangle-sml.png" class="mobile" alt="">
    </div>  
  </div>
  <div class="chiclet-wrap">
    <div class="row">
		<?php // loop through the rows of data
		if( have_rows('fraud_email_chiclet') ):
			while ( have_rows('fraud_email_chiclet') ) : the_row();
				$chiclets_images = get_sub_field('chiclets_images');
				$chiclets_text = get_sub_field('chiclets_text');
				?>
					<div class="chiclet-col"> <img src="<?php echo $chiclets_images; ?>" alt="">
						<h3><?php echo $chiclets_text; ?></h3>
					</div>
				<?php
			endwhile;  
		endif;
		?>
    </div>    
  </div>
  <div class="sign-wrap">
  <div class="row">
  <?php echo get_field('fraud_email_sign_up_text'); ?> <a href="<?php echo get_field('fraud_email_sign_up_link'); ?>" target="_blank" class="btn-enroll">ENROLL NOW</a>
  </div>
  </div>
</div>
</body>
</html>
