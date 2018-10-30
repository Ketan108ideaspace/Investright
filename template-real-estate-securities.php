<?php
/* Template Name: Real Estate Securities Template */
get_header();
?>

<!-- Body Content -->
<div class="container-innerpage">
	<div class="row">
		<article class="content-wrap fullwidth">
			<div class="breadcrumb no-border"> <strong>You are here:</strong>
			  <?php
						if(function_exists('bcn_display')) {
							bcn_display();
						}
				   ?>
			</div>
			<h1 class="page-title bg-dark-blue">
			  <?php the_title(); ?>
			</h1>
			<div class="editor-content">
				<div class="share-icon">
					SHARE&nbsp;&nbsp;
					<span class='st_facebook_large' displayText='Facebook'></span>
					<span class='st_twitter_large' displayText='Tweet'></span>
					<span class='st_sharethis_large' displayText='ShareThis'></span>
				</div>
				<div class="main res-wrapper">
					<?php
						if( have_rows('how_do_you_know') ) {
							while ( have_rows('how_do_you_know') ) : the_row(); ?>
								<div class="res-wrap">
								<div class="res-sec-heading"><?php echo get_sub_field('section_heading'); ?></div>
								<?php
									if( have_rows('section_block') ) {
										echo '<div class="row">';
										while ( have_rows('section_block') ) : the_row(); ?>
											<div class="res-col-wrap"><?php echo get_sub_field('text_definition'); ?></div> 
										<?php
										endwhile;
									echo "</div>"; }
								echo "</div>";
							endwhile; }

						if( have_rows('blogs_list') ) {
							echo '<div class="res-blog-wrap row"><h2>From our Blog <span class="hrz-line"></span></h2>';
							while ( have_rows('blogs_list') ) : the_row();
							$nvBloxLink = get_sub_field('blogs_item');
							$nvImage = wp_get_attachment_image_src( get_post_thumbnail_id( $nvBloxLink->ID ), 'medium' );
							$nvImage = $nvImage[0];
							if($nvImage=="") {
								$nvImage = esc_url(get_template_directory_uri())."/images/no-image.jpg";
							}
							?>
							<div class="news-wrap">
							  <div class="row">
								<div class="news-img"> <a href="<?php echo get_the_permalink($nvBloxLink->ID); ?>" title="<?php echo $nvBloxLink->post_title; ?>"> <img src="<?php echo $nvImage; ?>" alt="<?php echo $nvBloxLink->post_title; ?>"> </a>
								<div class="news-short-info">
								  <h3><a href="<?php echo get_the_permalink($nvBloxLink->ID); ?>" title="<?php echo $nvBloxLink->post_title; ?>"> <?php echo $nvBloxLink->post_title; ?></a></h3>
								  <p class="date"><?php echo get_the_time( 'M d, Y g:i a', $nvBloxLink->ID ); ?> | Author:
									<?php echo get_the_author_meta('user_firstname',$nvBloxLink->post_author); ?>
								  </p>                    
								</div>
								</div>
								<div class="news-content">
								  <?php echo wp_trim_words( $nvBloxLink->post_content, 35, '...' ); ?> </div>
							  </div>
							</div>
							<?php
							endwhile;
							echo '</div>';
						}

						if( have_rows('qrei_question_items') ) { ?>
								<div class="res-qa-wrap">
								<h3><?php echo get_field('qrei_question_heading'); ?></h3>
									<?php
										if( have_rows('qrei_question_items') ) {
											echo '<div class="reiqa-accordion">';
											$nvWhileCount = 1;
											while ( have_rows('qrei_question_items') ) : the_row();
											$nvShow = "";
											$nvopened = "";
											$nvDisplay = '';
											if($nvWhileCount==1) {
												$nvShow = "show";
												$nvopened = "opened";
												$nvDisplay = 'style="display: block;"';
											}
										?>
										<h5 id="<?php echo $nvWhileCount ?>" class="showhideaccordion <?php echo $nvShow; ?>"><?php echo get_sub_field('rei_question'); ?></h5>
										<div id="accordion<?php echo $nvWhileCount ?>" class="showhideaccordiondata <?php echo $nvopened; ?>" <?php echo $nvDisplay; ?>><?php echo get_sub_field('rei_answer'); ?></div>
									<?php $nvWhileCount++;
									endwhile;								
								echo '</div>'; }
							echo "</div>";
						}
						
						if( have_rows('chiclets_box') ) {
							$i = 1;
							echo '<div class="mf-wrap"><div class="row">';
							while ( have_rows('chiclets_box') ) : the_row();
							
							if($i%2 != 0) {
								$class = 'class="left"';
								$nvClrCls = 'dark-blue-box';
							} else {
								$class = 'class="right"';
								$nvClrCls = 'light-blue-box';
							}
							$chiclets_item = get_sub_field('chiclets_item');
							?>
							<div <?php echo $class; ?>>
								<div class="<?php echo $nvClrCls; ?> equalHeight">
								<h3><?php echo get_sub_field('title'); ?></h3>
								<p><?php echo get_sub_field('description'); ?></p>
								<a href="<?php echo get_sub_field('link'); ?>" class="link-more" title="<?php echo get_sub_field('title'); ?>"><?php echo get_sub_field('button_text'); ?></a> </div>
							</div>
							<?php
							$i++;
							endwhile;
							echo '</div></div>';
						}
					?>
					<div class="widget-newsletter">
                        <h3><?php echo get_field('pre_subscribe_title'); ?></h3>
						<div class="widget-newsletter-inner">
							<?php echo get_field('pre_subscribe_editor'); ?>
						</div>
					</div>
				</div>
			</div>
		</article>	
	</div>
	
</div>
<?php include_once("footer-landing.php"); ?>
<?php wp_footer(); ?>
</div>