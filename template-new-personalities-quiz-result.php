<?php 
/* Template Name: New personalities quiz result Page Template*/
get_header();
?>

<!-- Body Content -->

<div class="container-innerpage">
  <div class="row">
    <div class="breadcrumb"> <strong>You are here: </strong>
		<?php
			if(function_exists('bcn_display')) {
				bcn_display();
			}
       ?>
	</div>
    <h1 class="page-title">Personality Quiz Results</h1>
    <div class="editor-content no-padding">
      <div class="main pq-result-wrap">
        <div class="row pq-result-topwrap">
          <div class="col-md-3 equalHeight">
          <table class="pq-result-imgThumb"><tr><td>
                <?php
			if (have_posts()) :
				while ( have_posts() ) : the_post();
					if(has_post_thumbnail()){
						$nvImage = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
						echo '<img src="'.$nvImage[0].'" alt="'.get_the_title().'">';
					}
				endwhile;
			endif;
			?>
            </td></tr></table>
          </div>
          <div class="col-md-9 equalHeight">
            <div class="pq-grn-box">
              <?php
			if (have_posts()) :
				while ( have_posts() ) : the_post();
					echo '<h3>YOU ARE <span>'.get_the_title().'</span></h3>';
					echo apply_filters('the_content', get_post_field('post_content', get_the_ID()));
				endwhile;
			endif;
			?>
            <div class="row center-align">
                <div class="pq-retake-btn"><a class="btn btn-coolblue" href="<?php echo get_field('retake_the_quiz_link'); ?>">Retake the Quiz</a></div>
                <div class="pq-share-icons"> Share <a href="mailto:?subject=Smarter Investor Quiz&body=<?php echo get_field('mail_text'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-mail-20.png" alt="mail"></a> <a href="javascript:void(0);" onclick="window.open('http://www.facebook.com/share.php?u=<?php echo get_permalink($post->ID); ?>', 'fbwindow', 'width=600,height=411,scrollbars=yes');"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-fb-20.png" alt="facebook"></a> <a href="javascript:void(0);" onclick="window.open('http://twitter.com/intent/tweet?status=<?php echo get_field('twitter_text'); ?>', 'fbwindow', 'width=600,height=411,scrollbars=yes');"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-tw-20.png" alt="twitter"></a> </div>
            </div>
            </div>
          </div>
        </div>
        <div class="row pq-two-col">
          <div class="col-md-7"><div class="pq-blue-box equalHeight"> <?php echo get_field('blue_box_two'); ?> </div></div>
          <div class="col-md-5"><div class="pq-blue-box dark equalHeight"> <?php echo get_field('blue_box_one'); ?> </div></div>
        </div>
        <div class="pq-result-chiklet">
          <div class="innerwrap"><?php echo get_field('personality_type_text'); ?>
            <div class="pq-chiklet-img">
              <?php
					if( have_rows('personality_type_items') ) {
						while ( have_rows('personality_type_items') ) : the_row(); ?>
              <div class="pq-chiklet-img-col"> <a href="<?php echo get_sub_field('link'); ?>">
                <p><?php echo get_sub_field('title'); ?></p>
                <img src="<?php echo get_sub_field('image'); ?>"></a> </div>
              <?php endwhile;
					}
				?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
