<!-- Footer Section -->
<footer>
  <div class="row">
	<!-- Foooter Social Links Section -->
    <div class="footer-social-links">
      <ul>
        <li><a href="<?php echo of_get_option( 'facebook_url' ); ?>" target="_blank" title="CONNECT WITH US ON FACEBOOK">
          <span class="icon iconset icon-fb"></span>
          <?php _e( "CONNECT WITH US", "investright" ); ?><br>
		  <?php _e( "ON FACEBOOK", "investright" ); ?><br>
          </a></li>
        <li><a href="<?php echo of_get_option( 'twitter_url' ); ?>" target="_blank" title="FOLLOW US ON TWITTER">
          <span class="icon iconset icon-tw"></span>
          <?php _e( "FOLLOW US ON", "investright" ); ?><br>
		  <?php _e( "TWITTER", "investright" ); ?><br>
          </a></li>
        <li><a href="<?php echo of_get_option( 'youtube_url' ); ?>" target="_blank" title="FOLLOW US ON YOUTUBE">
          <span class="icon iconset icon-utube"></span>
          <?php _e( "FOLLOW US", "investright" ); ?><br>
		  <?php _e( "ON YOUTUBE", "investright" ); ?><br>
          </a></li>
<!--        <li><a href="<?php echo of_get_option( 'itunesstore_url' ); ?>" target="_blank" title="BE FRAUD AWARE APP">
          <span class="icon iconset icon-appstore"></span>
          <?php _e( "BE FRAUD AWARE APP", "investright" ); ?></a></li>
        <li><a href="<?php echo of_get_option( 'playstore_url' ); ?>" target="_blank" title="BE FRAUD AWARE APP">
          <span class="icon iconset icon-gplay"></span>
          <?php _e( "BE FRAUD AWARE APP", "investright" ); ?></a></li>-->
        <li><a onclick="ga('send','event',{'eventCategory':'ReportConcernBottom','eventAction':'click', 'eventLabel':'ReportConcernBottom'});" href="<?php echo of_get_option( 'footer_report_a_concern_link' ); ?>" target="_blank" title="REPORT A CONCERN">
          <span class="icon iconset icon-report"></span>
		  <?php _e( "REPORT", "investright" ); ?><br>
		  <?php _e( "A CONCERN", "investright" ); ?><br>
          </a></li>
      </ul>
    </div>
  
  
    <!-- Foooter Address Section -->
    <div class="address-wrap">
      <p class="greyTxt"><?php _e( "OUR OFFICE", "investright" ); ?></p>
      <div class="whtTxt tel-wrap">
        <p><?php _e( "Reception", "investright" ); ?>: <a href="tel:<?php echo of_get_option( 'reception_number' ); ?>" title="Reception"><?php echo of_get_option( 'reception_number' ); ?></a></p>
        <p><?php _e( "Fax", "investright" ); ?>: <a href="tel:<?php echo of_get_option( 'fax_number' ); ?>" title="Fax"><?php echo of_get_option( 'fax_number' ); ?></a></p>
      </div>
      <div class="whtTxt address">
        <?php echo apply_filters('the_content', of_get_option( 'footer_address' ) ); ?>
      </div>
      <p class="whtTxt"><?php _e( "Reception and Deliveries", "investright" ); ?> - <?php echo of_get_option( 'reception_deliveries' ); ?></p>
    </div>
    
    <!-- Foooter Quick Links Section -->
	
    <div class="footer-quick-links">
      <p class="greyTxt"><?php _e( "QUICK LINKS", "investright" ); ?></p>
		<?php
			$footer_menu = array('theme_location' => 'Footer_Menu', 'menu' => 'Footer Menu', 'container' => '', 'menu_class' => '', 'menu_id' => '');                      
			wp_nav_menu( $footer_menu );
		?>
    </div>
    
    <!-- Footer Copy Wrap -->
    <div class="copywrap">&copy; <?php _e( "COPYRIGHT", "investright" ); ?> <?php echo date('Y'); ?> <?php echo of_get_option( 'copyright_text' ); ?></div>
  </div>
</footer>
<?php wp_footer(); ?>
</div>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<!--script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-57ff53ff8e87ad76"></script-->

<?php
	if ( is_page_template('template-subscriptions.php') ) {
		?>
			<script type="text/javascript">
				var widgetId1;
				var onloadCallback = function() {
				// Renders the HTML element with id 'example1' as a reCAPTCHA widget.
				// The id of the reCAPTCHA widget is assigned to 'widgetId1'.
				widgetId1 = grecaptcha.render('example1', {
					'sitekey' : '6LcRtggUAAAAAEtGK-9r7_Dsh58j_RL_c9Psl-lP',
					'theme' : 'light'
				});
			  };
			</script>
			<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"></script>
		<?php
	}
?>
</body>
</html>