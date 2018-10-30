<?php 
/* Template Name: Personalities Quiz Template*/
get_header();
?>

 <!-- Body Content -->
  <div class="container-innerpage">
    <div class="row">
      
        <div class="breadcrumb"> <strong>You are here:</strong> 
		<?php
			if(function_exists('bcn_display')) {
				bcn_display();
			}
       ?>
		</div>

		<div class="editor-content">
		<?php
		if( have_posts() ) : 
			while( have_posts() ) : the_post();
			?>
				<h1 class="page-title"><?php the_title(); ?></h1>
				<div class="pquiz-grn-box"><p><?php echo get_the_content(); ?></p></div>
			<?php
			endwhile;
		endif;		  

		if( have_rows('personality_quiz_items') ) { ?>
        <div class="pquiz-content">
        <div class="pquiz-progressbar-wrap">
			<div class="gf_progressbar_title">Step 1 of 10</div>
			<div class="gf_progressbar">
				<div class="gf_progressbar_percentage percentbar_blue" style="width:10%;"><span></span></div>
			</div>
        </div>
			<ul class="personalities-quiz-ul">
			<?php
				$nvNo = 1;
				while ( have_rows('personality_quiz_items') ) : the_row();
				$nvShowHideCls = "quizquesionhide";
				if($nvNo==1) {
					$nvShowHideCls = "quizquesionshow";
				}
				?>
					<li class="quizquesionshowhide <?php echo $nvShowHideCls; ?>" id="<?php echo $nvNo; ?>">
                        <div class="pq-radio-questions">
                        <label class="pq-label">Question <?php echo $nvNo; ?> :</label> 
						<div class="pq-description">
                        “<?php echo get_sub_field('question'); ?>”
                        </div>
						<?php
							if( have_rows('answer_list') ) {
								echo '<div class="pq-radio-answers"><ul class="pq-radio-input">';
								while ( have_rows('answer_list') ) : the_row();
									echo '<li><input type="radio" value="'.get_sub_field('answer_value').'" name="input_'.$nvNo.'" id="input_'.$nvNo.'"><label>'.get_sub_field('answer_text').'</label></li>';
								endwhile;
								echo '</ul></div>';
							}
						?>
                        </div>
					</li>
				<?php
				$nvNo++;
				endwhile;
			?>
			</ul>
            <div class="pq-btn-wrap">
			<div class="fieldreqerr">Please provide an answer to move on.</div>
			<div class="progressgif"><img src="<?php echo get_template_directory_uri(); ?>/images/ajax-loader.gif" alt="Progress"></div>
			<button class="prevquesionbtn">Previous</button>
            <button class="nextquesionbtn">Next Question</button>
            <button class="resquesionbtn">Show My Results</button>
			<input type="hidden" value="<?php echo get_field('confident_link'); ?>" name="confident_link" id="confident_link">
			<input type="hidden" value="<?php echo get_field('diligent_link'); ?>" name="diligent_link" id="diligent_link">
			<input type="hidden" value="<?php echo get_field('reserved_link'); ?>" name="reserved_link" id="reserved_link">
			<input type="hidden" value="<?php echo get_field('impulsive_link'); ?>" name="impulsive_link" id="impulsive_link">
			<input type="hidden" value="<?php echo get_field('tumultuous_link'); ?>" name="tumultuous_link" id="tumultuous_link">
            </div>
            </div>
		<?php } ?> 
    </div>
  </div>
</div>

<?php get_footer(); ?>
