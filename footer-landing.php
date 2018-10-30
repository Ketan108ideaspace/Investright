<div id="custom-footer" class="footer-top">
  <div class="row"> 
	<!-- Foooter Social Links Section -->
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
	<!-- Foooter Address Section -->
	<div class="address-wrap">
	  <div class="whtTxt tel-wrap">
		<p>BCSC Inquiries: <a href="tel:604-899-6854">604-899-6854</a></p>
		<p>Toll free: <a href="tel:1-800-373-6393">1-800-373-6393</a></p>
		<p>Email: <a href="mailto:inquiries@bcsc.bc.ca">inquiries@bcsc.bc.ca</a></p>
		<p>Fax: <a href="tel:604-899-6506">604-899-6506</a></p>
	  </div>
	</div>
	<!-- Footer Copy Wrap -->
	<div class="copywrap">&copy;
	  <?php _e( "COPYRIGHT", "investright" ); ?>
	  <?php echo date('Y'); ?> <?php echo of_get_option( 'copyright_text' ); ?></div>
  </div>
</div>