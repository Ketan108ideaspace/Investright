<!-- Footer Section -->
<footer>
  <div class="footer-top">
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
            <!--        <li><a href="<?php echo of_get_option( 'itunesstore_url' ); ?>" target="_blank" title="BE FRAUD AWARE APP">
          <span class="icon iconset icon-appstore"></span>
          <?php _e( "BE FRAUD AWARE APP", "investright" ); ?></a></li>
        <li><a href="<?php echo of_get_option( 'playstore_url' ); ?>" target="_blank" title="BE FRAUD AWARE APP">
          <span class="icon iconset icon-gplay"></span>
          <?php _e( "BE FRAUD AWARE APP", "investright" ); ?></a></li>-->
            <li><a onclick="ga('send','event',{'eventCategory':'ReportConcern','eventAction':'click', 'eventLabel':'ReportConcernBottom'});" href="<?php echo of_get_option( 'footer_report_a_concern_link' ); ?>" target="_blank" title="REPORT A CONCERN"> <span class="icon iconset icon-report"></span>
              <?php _e( "REPORT", "investright" ); ?>
              <br>
              <?php _e( "A CONCERN", "investright" ); ?>
              <br>
              </a></li>
          </ul>
          <div class="footer-subscribe-wrap">
            <div class="row">
            <p class="greyTxt">
              <?php _e( "SUBSCRIBE TO OUR EMAILS", "investright" ); ?>
            </p>
              <!-- Embed Envoke Engagement -->
              <div id="nvkEmbed24a6ef6afb851b6fb845a79d28d1d08a" class="nvkEmbed"></div>
              <script async src="https://subscribe.investright.org/ext/embed/engagements/24a6ef6afb851b6fb845a79d28d1d08a.js"></script> 
              <!-- End Embed Envoke Engagement --> 
            </div>
          </div>
        </div>
      </div>
      <!-- Foooter Address Section -->
      <div class="address-wrap">
        <p class="greyTxt">
          <?php _e( "OUR OFFICE", "investright" ); ?>
        </p>
        <div class="whtTxt tel-wrap">
          <!--p>
            <?php _e( "Reception", "investright" ); ?>
            : <a href="tel:<?php echo of_get_option( 'reception_number' ); ?>" title="Reception"><?php echo of_get_option( 'reception_number' ); ?></a></p>
          <p>
            <?php _e( "Fax", "investright" ); ?>
            : <a href="tel:<?php echo of_get_option( 'fax_number' ); ?>" title="Fax"><?php echo of_get_option( 'fax_number' ); ?></a></p-->
			<p><?php echo apply_filters('the_content', of_get_option( 'footer_address' ) ); ?></p>
        </div>
        <!--div class="whtTxt address"> <?php echo apply_filters('the_content', of_get_option( 'footer_address' ) ); ?> </div-->
      </div>
      <!-- Foooter Quick Links Section -->
      <div class="footer-quick-links">
        <p class="greyTxt">
          <?php _e( "QUICK LINKS", "investright" ); ?>
        </p>
        <?php
			$footer_menu = array('theme_location' => 'Footer_Menu', 'menu' => 'Footer Menu', 'container' => '', 'menu_class' => '', 'menu_id' => '');                      
			wp_nav_menu( $footer_menu );
		?>
      </div>
      <!-- Footer Copy Wrap -->
      <div class="copywrap">&copy;
        <?php _e( "COPYRIGHT", "investright" ); ?>
        <?php echo date('Y'); ?> <?php echo of_get_option( 'copyright_text' ); ?></div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</div>
<?php if ( is_page_template('template-glossary.php') ) { ?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/semantic.min.js"></script> 
<script type="text/javascript" src="<?php echo get_template_directory_uri().'/js/jQuery.highlight.js'; ?>"></script> 
<script>
		var option = {
			color: "black",
			background: "yellow",
			bold: false,
			class: "high",
			ignoreCase: true,
			wholeWord: false
		}
	</script>
<?php } ?>
<script src="//cdn.trackduck.com/toolbar/prod/td.js" async data-trackduck-id="5ba1104815200a1b365dd8db"></script>
</body></html>