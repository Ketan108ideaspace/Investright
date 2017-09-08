<?php 
/*
Template Name: Your Result
*/
get_header();
?><head>
<meta charset="utf-8">
<title>Investment Fee Quiz</title>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">

<!-- Additional Stylesheet for Quiz page -->
<link href="<?php bloginfo( 'stylesheet_directory' ); ?>/result/css/take-the-quiz.css" rel="stylesheet" type="text/css">
</head>
<!-- Body Content -->
  
<div class="container-innerpage">
    <div class="row">
      <article class="content-wrap">
        <h1 class="page-title">Investment Fee Quiz</h1>
        <div class="editor-content">
        <div class="quiz-result">
        <div class="row">
        <!--<h2>CONGRATULATIONS!</h2>
        <h3>You have completed the Take a Look at Fees Quiz.</h3>-->
        <div class="quiz-result-wrap">
        <?php
          if(isset($_GET['result'])){
             $result=$_GET['result'];
          }
        ?>
		
		<?php
		 if($result <= 3){
			 ?>
			 <img src="<?php the_field('result_background_image_1'); ?>" alt="">
			<?php
		}
		 if($result >= 4 && $result<=6){
			 ?>
			 <img src="<?php the_field('result_background_image_2'); ?>" alt="">
			<?php		
		}
		 if($result == 7){
			 ?>
			 <img src="<?php the_field('result_background_image_3'); ?>" alt="">
			<?php		
		}
		?>
		
        
        <div class="quiz-result-blueWrap">

        <div class="result-outof"><?php echo $result; ?> OUT OF 7</div>
		<?php
		 if($result <= 3){
			 ?>
			 <p class="result-txt">Yikes! Looks like fees are a bit of a blind spot for you. We can help with that.</p>
			<?php
			$nvSub = of_get_option( 'email_subject_1' );
			$nvBody = of_get_option( 'email_body_msg_1' );
			$nvTW = of_get_option( 'twitter_share_msg_1' );
		}
		?>
		<?php
		 if($result >= 4 && $result<=6){
			 ?>
			 <p class="result-txt">Not bad! You have a few blind spots, but we can help with that.</p>
			<?php
			$nvSub = of_get_option( 'email_subject_4' );
			$nvBody = of_get_option( 'email_body_msg_4' );
			$nvTW = of_get_option( 'twitter_share_msg_4' );
		}
		?>
		<?php
		 if($result == 7){
			 ?>
			 <p class="result-txt">Well done! Looks like you are very aware of investment fees.</p>
			<?php		
			$nvSub = of_get_option( 'email_subject_7' );
			$nvBody = of_get_option( 'email_body_msg_7' );
			$nvTW = of_get_option( 'twitter_share_msg_7' );
		}
		?>
        <p>Whether you know a lot about how to evaluate your fees, or very little, there’s always more to learn. We’re here to help you understand the fees you pay and how they impact your investment returns.</p>
        <a href="<?php echo home_url(); ?>/take-the-quiz" class="retake-quiz">RETAKE THE QUIZ</a>
        <div class="share-wrap">Share <a href="mailto:?subject=<?php echo $nvSub; ?>&body=<?php echo $nvBody; ?>" target="_top"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/result/images/take-the-quiz/icon-mail.png" alt="mail"></a>
		<a href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink();?>?result=<?php echo $result; ?>" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/result/images/take-the-quiz/icon-fb.png" alt="facebook"></a>
		<a href="https://twitter.com/intent/tweet?text=<?php echo $nvTW; ?>&amp;via=BCSCInvestRight" target="_blank"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/result/images/take-the-quiz/icon-tw.png" alt="twitter"></a>
        </div>
        </div>
        </div>
        <div class="tool-wrap">
        <div class="tool-grn-wrap">
        <h2>TOOLS TO HELP YOU UNDERSTAND INVESTMENT FEES</h2>
        </div>
        <div class="tool-col">
        <a href="<?php echo $site_url.'/investing-101/investment-fee-calculator';?>"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/result/images/take-the-quiz/calc.png" alt="Fee Calculator">
        <h3>Fee Calculator</h3></a>
        </div>
        <div class="tool-col">
        <a href="<?php the_field('fee_guide'); ?>" target="_blank" class="bgnone"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/result/images/take-the-quiz/fee-guide.png" alt="Fee Guide">
        </a>
		<h3><a href="<?php the_field('fee_guide'); ?>" target="_blank">Fee Guide</a></h3>
        </div>
        <div class="tool-col">
        <a href="<?php the_field('video_link'); ?>" class="wplightbox" title="" data-width="640" data-height="360">
        <img src="<?php the_field('video_image'); ?>" alt="Fee Videos">
		</a>
		<a href="<?php the_field('fee_videos'); ?>" target="_blank">
        <h3>Fee Videos</h3>
        </a>
        </div>        
        </div>
        </div>
        </div>
        </div>
      </article>
    </div>
  </div>
<?php get_footer(); ?>