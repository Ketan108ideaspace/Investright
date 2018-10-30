<?php 
/*
* Template Name: Advisor Check
*/
get_header();
?>
<!-- Body Content -->

<div class="container-innerpage">
  <div class="row">
    <?php
		//get_sidebar();
		$nvDfCls = "";
		//$ndLng = ICL_LANGUAGE_CODE;
		$ndLng = "";
		if($ndLng!="en") {
			//$nvDfCls = "fullwidth";
			$nvDfCls = "";
		}
	?>
    <article class="content-wrap fullwidth <?php echo $nvDfCls; ?>">
      <div class="breadcrumb"> <strong>You are here:</strong>
        <?php
					if(function_exists('bcn_display')) {
						bcn_display();
					}
				?>
      </div>
      <?php while (have_posts()) : the_post(); ?>
      <h1 class="page-title">
        <?php the_title();?>
      </h1>
      <div class="editor-content">
        <div class="share-icon"> SHARE&nbsp;&nbsp; <span class='st_facebook_large' displayText='Facebook'></span> <span class='st_twitter_large' displayText='Tweet'></span> <span class='st_sharethis_large' displayText='ShareThis'></span> 
          <!--div class="addthis_inline_share_toolbox"></div--> 
        </div>
        <?php //the_content(); ?>
        
		<div class="adv-chk-wrap">
          
		  <p><?php echo get_the_content(); ?></p>
		  
		  
		  <?php 
			// check if the repeater field has rows of data
			if( have_rows('step_layout_row') ):
				$nvStep = 1;
				echo '<div class="step-wrap">';
				while ( have_rows('step_layout_row') ) : the_row();
					// display a sub field value
					$step_title = get_sub_field('step_title');
					$step_description = get_sub_field('step_description');
					if($step_title!="") {
						echo '<h3 class="step-title"><span>STEP '.$nvStep.'</span> '.$step_title.'</h3>';
						echo $step_description;
					}
					if( have_rows('step_box_items') ):
						echo '<div class="step-col-wrap">';
						while ( have_rows('step_box_items') ) : the_row();
							$box_title = get_sub_field('box_title');
							$box_description = get_sub_field('box_description');
							$box_url = get_sub_field('box_url');
							if($box_title!="") {
								echo '<div class="step-col" onClick="window.open('."'".$box_url."'".')"><h4>'.$box_title.'</h4><div class="step-col-inner"><p>'.$box_description.'</p></div></div>';
							}
						endwhile;
						echo '</div>';
					endif;
					$step_question = get_sub_field('step_question');
					$step_answer = get_sub_field('step_answer');
					if($step_question!="") {
						echo '<div class="adv-chk-ques"><div class="ques-wrap"><span>?</span>'.$step_question.'</div><div class="ans-wrap" style="display:none">'.$step_answer.'</div></div>';
					}
				$nvStep++;
				endwhile;
				echo '</div>';
			endif; ?>
		  
        </div>
		<!--div class="widget-newsletter">
          <h3>Sign up to receive emails and updates from BCSC InvestRight</h3>
          <div class="widget-newsletter-inner">
            
			<div id="nvkEmbedc5e37272495728df0ca5a4fee5514ab8" class="nvkEmbed">
              <link href="https://e1.envoke.com/css/nvk-content.min.css" rel="stylesheet" type="text/css">
              <style id="editor-styles" type="text/css">
.nvkContent {background-color: #FFFFFF;color: #000000;}.nvkContent a {color: #0000EE;}#ee9c1845daa24e3d536a18d188d1c108 .nvkSubmitButton {text-align: center;}#ee9c1845daa24e3d536a18d188d1c108 .nvkSubmitButton button {width: 100%;}
</style>
              <div class="nvkContent">
                <div class="container-fluid outer-sortable ui-sortable"> 
                  <div class="block-outer" style="position: relative;" id="e77a2bd5fef5283b3315f4d1b1935a16">
                    <div class="col-md-12 inner-sortable ui-sortable">
                      <div class="block-inner" style="position: relative;" id="ee9c1845daa24e3d536a18d188d1c108">
                        <div class="content-edit form-edit" rel="#form-overlay"> 
                          <div class="nvkForm" id="nvkFormc5e37272495728df0ca5a4fee5514ab8">
                            <div data-reactroot="" class="nvkFormStep1 row">
                              <style>
    .nvkValidationMessage { background-color:#992222; -webkit-border-radius: 3px 3px 3px 3px; border-radius: 3px 3px 3px 3px; margin-top: 10px; margin-bottom: 20px; }.nvkValidationMessage p { color:#ffffff; font-size:15px; margin:0px; text-align: center; padding: 10px; }.nvkValidationError { background-color: #fdf5f1 !Important; border: 1px solid #992222 !Important; }.nvkValidationError.nvkCheckboxInputGroup { margin-left: -10px; padding-left: 10px; margin-right: -10px; padding-right: 10px; }.nvkValidationError.nvkRadioInputGroup { margin-left: -10px; padding-left: 10px; margin-right: -10px; padding-right: 10px; }
</style>
                              <div class="col-md-6">
                                <input type="hidden" id="e219236701f58c67e28ffc4588ad8edd" value="4567">
                                <div id="e2a3299f99801b91d295a4fee5521019" class="nvkFormItem nvkTextInput form-group">
                                  <label for="e2a3299f99801b91d295a4fee5521019_input" class="nvkFormLabel">First Name</label>
                                  <input type="text" id="e2a3299f99801b91d295a4fee5521019_input" name="fname" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div id="eeb73721bc6f68d7c565a4fee5520fdb" class="nvkFormItem nvkTextInput form-group">
                                  <label for="eeb73721bc6f68d7c565a4fee5520fdb_input" class="nvkFormLabel">Email</label>
                                  <input type="email" id="eeb73721bc6f68d7c565a4fee5520fdb_input" name="email" class="form-control">
                                </div>
                                </div>
                              <div class="col-md-12">
                                <div class="nvkFormItem nvkSubmitButton">
                                  <button type="button" class="btn btn-default">Subscribe</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          </div>
                      </div>
                    </div>
                  </div>
                  </div>
              </div>
            </div>
			
          </div>
        </div-->
		
        <!--div style="height:50px;"></div-->
		
        <!--div class="two-widget-wrap">
			<div class="row">
				<div class="colL">
					<div class="img-widget"> <img src="<?php echo $template_url; ?>/images/widget-image.jpg"> <span>CSA: BINARY OPTIONS FRAUD</span> </div>
				</div>
				
				<div class="colR">
              
					<div class="widget-newsletter">
						<h3>Subscribe to our Emails</h3>
						<div class="widget-newsletter-inner">
						
							<div id="nvkEmbedc5e37272495728df0ca5a4fee5514ab8" class="nvkEmbed">
								<link href="https://e1.envoke.com/css/nvk-content.min.css" rel="stylesheet" type="text/css">
								<style id="editor-styles" type="text/css">
								.nvkContent {background-color: #FFFFFF;color: #000000;}.nvkContent a {color: #0000EE;}#ee9c1845daa24e3d536a18d188d1c108 .nvkSubmitButton {text-align: center;}#ee9c1845daa24e3d536a18d188d1c108 .nvkSubmitButton button {width: 100%;}
								</style>
								<div class="nvkContent">
								  <div class="container-fluid outer-sortable ui-sortable">
									<div class="block-outer" style="position: relative;" id="e77a2bd5fef5283b3315f4d1b1935a16">
									  <div class="col-md-12 inner-sortable ui-sortable">
										<div class="block-inner" style="position: relative;" id="ee9c1845daa24e3d536a18d188d1c108">
										  <div class="content-edit form-edit" rel="#form-overlay">
											<div class="nvkForm" id="nvkFormc5e37272495728df0ca5a4fee5514ab8">
											  <div data-reactroot="" class="nvkFormStep1 row">
												<style>
								.nvkValidationMessage { background-color:#992222; -webkit-border-radius: 3px 3px 3px 3px; border-radius: 3px 3px 3px 3px; margin-top: 10px; margin-bottom: 20px; }.nvkValidationMessage p { color:#ffffff; font-size:15px; margin:0px; text-align: center; padding: 10px; }.nvkValidationError { background-color: #fdf5f1 !Important; border: 1px solid #992222 !Important; }.nvkValidationError.nvkCheckboxInputGroup { margin-left: -10px; padding-left: 10px; margin-right: -10px; padding-right: 10px; }.nvkValidationError.nvkRadioInputGroup { margin-left: -10px; padding-left: 10px; margin-right: -10px; padding-right: 10px; }
								</style>
												<div class="col-md-6">
												  <input type="hidden" id="e219236701f58c67e28ffc4588ad8edd" value="4567">
												  <div id="e2a3299f99801b91d295a4fee5521019" class="nvkFormItem nvkTextInput form-group">
													<label for="e2a3299f99801b91d295a4fee5521019_input" class="nvkFormLabel">First Name</label>
													<input type="text" id="e2a3299f99801b91d295a4fee5521019_input" name="fname" class="form-control">
												  </div>
												</div>
												<div class="col-md-6">
												  <div id="eeb73721bc6f68d7c565a4fee5520fdb" class="nvkFormItem nvkTextInput form-group">
													<label for="eeb73721bc6f68d7c565a4fee5520fdb_input" class="nvkFormLabel">Email</label>
													<input type="email" id="eeb73721bc6f68d7c565a4fee5520fdb_input" name="email" class="form-control">
												  </div>
												  </div>
												<div class="col-md-12">
												  <div class="nvkFormItem nvkSubmitButton">
													<button type="button" class="btn btn-default">Subscribe</button>
												  </div>
												</div>
											  </div>
											</div>
											</div>
										</div>
									  </div>
									</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				
				</div>
				
          </div>
        </div-->
		
        <!--div style="height:50px;"></div-->
		
        <!--div class="widget-ques">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua?</p>
          <div class="widget-ques-inner">
            <form>
              <textarea rows="4">Share your thoughts here.</textarea>
              <div class="nvkSubmitButton">
                <button type="button" class="btn btn-default">Submit</button>
              </div>
            </form>
          </div>
        </div-->
		
        <!--div style="height:50px;"></div-->
		
        <!--div class="widget-poll">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua?</p>
          <div class="widget-poll-inner">
            <ul>
              <li><input type="radio"> Lorem ipsum dolor sit amet</li>
              <li><input type="radio"> Consectetur adipiscing elit sed do eiusmod</li>
              <li><input type="radio"> Tempor incididunt ut labore et dolore magna aliqua</li>
            </ul>
            <div class="nvkSubmitButton">
              <button type="button" class="btn btn-default">Submit</button>
            </div>
          </div>
        </div-->

        <!--div style="height:50px;"></div-->
		
        <!--div class="two-widget-wrap">
          <div class="row">
            <div class="colL">
              <div class="img-widget"> <img src="<?php echo $template_url; ?>/images/widget-image.jpg"> <span>CSA: BINARY OPTIONS FRAUD</span> </div>
            </div>
            <div class="colR">
              <div class="widget-poll">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua?</p>
          <div class="widget-poll-inner">
            <ul>
              <li><input type="radio"> Lorem ipsum dolor sit amet</li>
              <li><input type="radio"> Consectetur adipiscing elit sed do eiusmod</li>
              <li><input type="radio"> Tempor incididunt ut labore et dolore magna aliqua</li>
            </ul>
            <div class="nvkSubmitButton">
              <button type="button" class="btn btn-default">Submit</button>
            </div>
          </div>
        </div>
            </div>
          </div>
        </div-->
        
        <!--div style="height:50px;"></div-->
      </div>
      <?php endwhile;?>
      <?php
			$args = array(
				'post_type'      => 'page',
				'post_parent'    => $post->ID,
				'order'          => 'ASC',
				'orderby'        => 'menu_order'
			 );
			$parent = new WP_Query( $args );

			if ( $parent->have_posts() ) : ?>
      <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
      <div id="parent-<?php the_ID(); ?>" class="parent-page">
        <h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
          <?php the_title(); ?>
          </a></h1>
        <p>
          <?php //the_advanced_excerpt(); ?>
        </p>
      </div>
      <?php endwhile; ?>
      <?php endif; wp_reset_query(); ?>
      <!--related-->
      <?php 
			// check if the repeater field has rows of data
			if( have_rows('related_items_for_low_level_template') ): ?>
      <div class="related-content-wrap">
        <h3>Related Items</h3>
        <div class="row">
          <?php // loop through the rows of data
				while ( have_rows('related_items_for_low_level_template') ) : the_row();
					// display a sub field value
					$repeater_title = get_sub_field('related_title');
					$repeater_url = get_sub_field('related_url');
					$repeater_thumbnail = get_sub_field('related_thumbnail');
					?>
          <div class="rc-inner"> <a class="bg-none" href="<?php echo $repeater_url; ?>"  title="<?php echo $repeater_title; ?>">
            <?php
							if($repeater_thumbnail['url']=="") {
								$nvImage = esc_url(get_template_directory_uri())."/images/no-image.jpg";
							}else{
								$nvImage = $repeater_thumbnail['url'];
							}
						?>
            <img src="<?php echo $nvImage; ?>" alt="<?php echo $repeater_title; ?>"> </a>
            <p> <a href="<?php echo $repeater_url; ?>" title="<?php echo $repeater_title; ?>"> <?php echo $repeater_title;	?> </a> </p>
          </div>
          <?php endwhile; ?>
        </div>
      </div>
      <?php endif; ?>
      <!--relateds Ends here --> 
    </article>
  </div>
</div>
<?php get_footer(); ?>
