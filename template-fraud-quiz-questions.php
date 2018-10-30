<?php
/* Template Name: Fraud Quiz Question */
get_header();
?>
<!-- Body Content -->

<div class="container-fraud-steps">
  <div class="report-nav"><a onclick="ga('send','event',{'eventCategory':'ReportConcern','eventAction':'click', 'eventLabel':'ReportConcernTop'});" href="https://ca.research.net/r/bcsc-complaint-form" target="_blank" title="Report a Concern">Report a Concern<span class="icon iconset icon-arrowRight"></span></a></div>
  <div class="fraud-main-img">
    <div class="fraud-top-content" id="fstep1">
      <h1><?php echo get_field("fraud_title"); ?></h1>
      <img src="<?php echo get_field("fraud_image"); ?>" alt="<?php echo get_field("fraud_title"); ?>" class="fraud-txt-img"> <?php echo get_field("fraud_text"); ?><span class="icon-scroll-down" id="fstep1"></span></div>
    <img src="<?php echo $template_url; ?>/images/fraud-quiz-bg-img.jpg" alt=""></div>
  <div id="fraudStep" class="fraud-steps-wrap">
    <ul id="fstep" class="fraud-step-list">
      <li class="active stepactcls stepactcls1" id="fstep1"><a>Step 1 - recognize</a></li>
      <li class="stepactcls stepactcls2" id="fstep2"><a>Step 2 - reject</a></li>
      <li class="stepactcls stepactcls3" id="fstep3"><a>Step 3 - report</a></li>
      <li class="stepactcls stepactcls4" id="fstep4"><a>Step 4 - review</a></li>
    </ul>
    <div class="clear"></div>
    <div class="fraud-step-content" id="jsstep1"><a name="#fstep1"></a>
      <div class="fstep-inner">
        <div class="row">
          <h2>RECOGNIZE<span class="icon-sprite fstep1"></span></h2>
          <h3><?php echo get_field("recognize_text"); ?></h3>
          <p><?php echo get_field("recognize_small_text"); ?></p>
        </div>
        <div class="white-space"></div>
		<a name="#takeaquiz"></a>
        <div class="fstep-quiz-wrap" id="ans-colors"> <span class="fstep-take-quiz centerscrollbtn" id="takeaquiz" onclick="ga('send','event',{'eventCategory':'FPM18','eventAction':'click', 'eventLabel':'FPM18-Quiz'});">TAKE THE QUIZ</span>
		
			<div class="commondivcls">
				<div class="row quiz-jscode">
					<?php
						if( have_rows('quiz_question') ):
							$nvNo = 1;
							while ( have_rows('quiz_question') ) : the_row();
							$nvSty = 'style="display: none;"';
							$nvFq = "";
							if($nvNo==1) { $nvSty = 'style="display: block;"'; $nvFq = "first-ques"; }
							?>
					<div class="fstep-ques <?php echo $nvFq; ?>" <?php echo $nvSty; ?> id="<?php echo $nvNo; ?>"><?php echo $nvNo; ?>. <?php echo get_sub_field("quesion"); ?></div>
					<?php
							$nvNo++;
							endwhile;
						endif;
					?>
					<div class="fstep-ans"> <span class="fstep-ans-btn fstep-ans-btn-jscode" id="Yes">YES</span> <span class="fstep-ans-btn fstep-ans-btn-jscode" id="No">NO</span> <span class="fstep-ans-btn fstep-ans-btn-jscode" id="NotSure">NOT SURE</span> </div>
					<div class="que_progressbar_percentage"> <span class="quizposition">1 of 6</span> <span class="box quizbox1 active current"></span> <span class="box quizbox2"></span> <span class="box quizbox3"></span> <span class="box quizbox4"></span> <span class="box quizbox5"></span> <span class="box quizbox6"></span> </div>
				</div>
				<div class="fquiz-result-wrap">
					<div class="fstep-result-inner">
					  <div id="fresult-box1" class="hideboxcls">
						<div class="icon-wrap"> <span class="caps">Result:</span> <?php echo get_field("red_result_title"); ?> </div>
						<div class="fresult-content">
							<?php echo get_field("red_result_description"); ?>
							<!--p class="stepactcls" id="fstep3"><?php echo get_field("red_result_submit_a_tip_link"); ?></p-->
							<p><?php echo get_field("red_result_submit_a_tip_link"); ?></p>
						</div>
					  </div>
					  <div id="fresult-box2" class="hideboxcls">
						<div class="icon-wrap"> <span class="caps">Result:</span> <?php echo get_field("green_result_title"); ?> </div>
						<div class="fresult-content"> <?php echo get_field("green_result_description"); ?> </div>
					  </div>
					  <div id="fresult-box3" class="hideboxcls">
						<div class="icon-wrap"> <span class="caps">Result:</span> <?php echo get_field("orange_result_title"); ?> </div>
						<div class="fresult-content"> <?php echo get_field("orange_result_description"); ?>
						<p><?php echo get_field("orange_result_submit_a_tip_link"); ?></p>
						</div>
					  </div>
					  <div class="fquiz-result-btn"> <span class="fstep-ans-btn fstep-ans-btn-retake">RETAKE QUIZ</span> <a href="http://www.facebook.com/sharer.php?u=<?php echo get_field("social_sharing_url"); ?>" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;"><span class="fstep-ans-btn fb"></span></a> <a href="https://twitter.com/intent/tweet?text=<?php echo get_field("twitter_social_sharing_url"); ?>." target="_blank"><span class="fstep-ans-btn tw"></span></a></div>
					</div>
				</div>
			</div>
		</div>
      </div>
    </div>
    <div id="jsstep2" class="fraud-step-content"><a name="#fstep2"></a>
      <div class="fstep-inner">
        <div class="row">
          <h2>REJECT<span class="icon-sprite fstep2"></span></h2>
          <h3><?php echo get_field("reject_text"); ?></h3>
          <div class="fstep-linktxt"><a href="<?php echo get_field("reject_registration_link"); ?>" target="_blank" onclick="ga('send','event',{'eventCategory':'FPM18','eventAction':'click', 'eventLabel':'FPM18-Registration'});">Search registration now<span class="icon-sprite search-reg"></span></a></div>
          <!--p><?php //echo get_field("reject_text_2"); ?></p-->
        </div>
      </div>
    </div>
    <div id="jsstep3" class="fraud-step-content"><a name="#fstep3"></a>
      <div class="fstep-inner">
        <div class="row">
          <h2>REPORT<span class="icon-sprite fstep3"></span></h2>
          <h3><?php echo get_field("report_text"); ?></h3>
          <div class="fstep-contact"><span class="size28">Don’t assume. Contact us today.</span> <span class="size34"><?php echo get_field("report_number"); ?></span> <span class="size28">OR</span></div>
        </div>
        <div class="white-space"></div><a name="#submitatip"></a>
        <div class="fstep-submit-tip-wrap"> <span class="fstep-submit-tip centerscrollbtn" id="submitatip">SUBMIT A TIP/COMPLAINT</span>
          <div class="row"> <img src="<?php echo $template_url; ?>/images/sample-img.png" alt="">
            <?php echo get_field("report_submit_text"); ?>
            <div class="submit-tip-note">
				<?php echo get_field("report_submit_tip_note_text"); ?>
            </div>
          <div class="fstep-submit-btn">
          <a href="<?php echo get_field("report_link"); ?>" target="_blank" class="btn-tip" onclick="ga('send','event',{'eventCategory':'FPM18','eventAction':'click', 'eventLabel':'FPM18-TipComplaint'});">submit a tip</a>
          <a href="<?php echo get_field("report_link"); ?>" target="_blank" class="btn-report" onclick="ga('send','event',{'eventCategory':'FPM18','eventAction':'click', 'eventLabel':'FPM18-TipComplaint'});">Report a complaint about a company or individual</a>
          </div>
          </div>
        </div>
      </div>
    </div>
    <div id="jsstep4" class="fraud-step-content"><a name="#fstep4"></a>
      <div class="fstep-inner">
        <div class="row">
          <h2>REVIEW<span class="icon-sprite fstep4"></span></h2>
          <h3><?php echo get_field("review_text"); ?></h3>
          <div class="fstep-linktxt"><a href="<?php echo get_field("review_link"); ?>" target="_blank" onclick="ga('send','event',{'eventCategory':'FPM18','eventAction':'click', 'eventLabel':'FPM18-FraudAwareness'});"><?php echo get_field("review_link_text"); ?><span class="icon-sprite search-reg"></span></a></div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
