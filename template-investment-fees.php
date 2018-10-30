<?php
/* Template Name: Investment Fees Template */
get_header();
?>
<!-- Body Content -->

<div class="container-innerpage invest-fees">
  <div class="row">
    <div class="invest-fee-banner">
      <div class="fee-banner-inner">
        <h1 class="page-title lp-dwnload">
		<?php
			the_title();
			$nvGEvent = "";
			if(get_field('fees_calculator_google_event_code')!="") {
				$nvGEvent = 'onclick="'.get_field('fees_calculator_google_event_code').'"';
			}
		?>
        </h1>
        <div class="row">
          <div class="colL"> <a href="<?php echo get_field('fees_calculator_link'); ?>" <?php echo $nvGEvent; ?>><?php echo get_field('fees_calculator_description'); ?> </a><a href="<?php echo get_field('fees_calculator_link'); ?>" class="link-more" <?php echo $nvGEvent; ?>><?php echo get_field('fees_calculator_button'); ?></a> </div>
          <a href="<?php echo get_field('fees_calculator_link'); ?>" <?php echo $nvGEvent; ?>><img src="<?php echo get_field('fees_calculator_image'); ?>" alt="calculate your fees"></a></div>
        <img src="<?php echo $template_url; ?>/images/down-arrow.png" alt="" class="lp-dwnload"> </div>
    </div>
    <article class="content-wrap fullwidth">
    <div class="editor-content">
      <div class="res-wrapper">
        <?php
				if( have_rows('myths_about_questions') ) {
					while ( have_rows('myths_about_questions') ) : the_row(); ?>
        <div class="investfee-qa-wrap">
          <h3><?php echo get_sub_field('heading_title'); ?></h3>
          <?php
						if( have_rows('question_answer') ) {
							echo '<div class="reiqa-accordion">';
							$nvWhileCount = 1;
							while ( have_rows('question_answer') ) : the_row();
							$nvShow = "";
							$nvopened = "";
							$nvDisplay = '';
							if($nvWhileCount==1) {
								$nvShow = "show";
								$nvopened = "opened";
								$nvDisplay = 'style="display: block;"';
							}
							?>
          <h5 id="<?php echo $nvWhileCount ?>" class="showhideaccordion <?php echo $nvShow; ?>"><?php echo get_sub_field('question'); ?></h5>
          <div id="accordion<?php echo $nvWhileCount ?>" class="showhideaccordiondata <?php echo $nvopened; ?>" <?php echo $nvDisplay; ?>><?php echo get_sub_field('answer'); ?></div>
          <?php
							$nvWhileCount++;
							endwhile; 
						echo '</div>'; }
					echo "</div>";
				endwhile; }
			?>
          <?php
				if( have_rows('chiclets_boxs') ) {
					$i = 1;
					$nvRno = 1;
					echo '<div class="mf-wrap" id="quiz">';
					while ( have_rows('chiclets_boxs') ) : the_row();
					
					if($i%2 != 0) {
						$class = 'class="left"';
						$nvClrCls = 'grn-box';
					} else {
						$class = 'class="right"';
						$nvClrCls = 'dark-blue-box';
					}
					$nvGEvent = "";
					if(get_sub_field('google_event')!="") {
						$nvGEvent = 'onclick="'.get_sub_field('google_event').'"';
					}
					if($nvRno==1) {
						echo '<div class="row">';
					}
					?>
						<div <?php echo $class; ?>>
							<div class="<?php echo $nvClrCls; ?> equalHeight">
							<h3><?php echo get_sub_field('title'); ?></h3>
							<p><?php echo get_sub_field('description'); ?></p>
							<?php
							if(get_sub_field('is_it_video_link')!=true) { ?>
								<a href="<?php echo get_sub_field('link'); ?>" class="link-more" title="<?php echo get_sub_field('title'); ?>" <?php echo $nvGEvent; ?>><?php echo get_sub_field('button_text'); ?></a>
							<?php } else { ?>
								<a class="html5lightbox link-more" href="<?php echo get_sub_field('link');?>" data-width="560" data-height="360" <?php echo $nvGEvent; ?>><?php echo get_sub_field('button_text'); ?></a>
							<?php } ?>
							</div>
						</div>
					<?php
					$i++;
					
					if($nvRno==2) { 
						echo '</div>';
						$nvRno = 1;
					} else {
						$nvRno++;
					}
					endwhile;
					if($nvRno==2) { 
						echo '</div>';
					}
					echo '</div>';
				}
			?>
          <div class="fees-subscribe-wrap" id="subscribe">
            <div class="row">
              <h3><?php echo get_field('subscribe_title'); ?></h3>
              <!-- Embed Envoke Engagement -->
              <div id="nvkEmbedc5e37272495728df0ca5a4fee5514ab8" class="nvkEmbed"></div>
              <script async src="https://subscribe.investright.org/ext/embed/engagements/c5e37272495728df0ca5a4fee5514ab8.js"></script> 
              <!-- End Embed Envoke Engagement -->
              <?php //es_subbox( $namefield = "YES", $desc = "", $group = "" ); ?>
              <p class="size11"><?php echo get_field('subscribe_description'); ?></p>
            </div>
          </div>
        </div>
      </article>
    </div>
    <?php include_once("footer-landing.php"); ?>
  </div>
  <?php wp_footer(); ?>
</div>
<script>
jQuery(document).ready(function() {
	jQuery(".lp-dwnload").click(function(){
		jQuery('html,body').animate({
			scrollTop: $(".mf-wrap").offset().top - 30},
			'slow');
	});

});
</script>