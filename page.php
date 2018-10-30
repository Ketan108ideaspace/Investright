<?php 
get_header();
?>
<!-- Body Content -->
	<div class="container-innerpage">
    <div class="row">
	<?php
		get_sidebar();
		$nvDfCls = "";
		//$ndLng = ICL_LANGUAGE_CODE;
		$ndLng = "";
		if($ndLng!="en") {
			//$nvDfCls = "fullwidth";
			$nvDfCls = "";
		}
	?>
		<article class="content-wrap <?php echo $nvDfCls; ?>">
			<div class="breadcrumb"> 
				<strong>You are here:</strong> 
				<?php
					if(function_exists('bcn_display')) {
						bcn_display();
					}
				?>
			</div>
			<?php while (have_posts()) : the_post(); ?>
				<h1 class="page-title"><?php the_title();?></h1>
				<div class="editor-content">
					<div class="share-icon">
					SHARE&nbsp;&nbsp;
					<span class='st_facebook_large' displayText='Facebook'></span>
					<span class='st_twitter_large' displayText='Tweet'></span>
					<span class='st_sharethis_large' displayText='ShareThis'></span>
					
					<!--div class="addthis_inline_share_toolbox"></div-->
					</div>
					<?php the_content();?>
					
					<?php 
					// check if the repeater field has rows of data
					if( have_rows('widget_layout') ):
						while ( have_rows('widget_layout') ) : the_row();
							// display a sub field value
							$widget_type = get_sub_field('widget_type');
							if($widget_type=="singlewidget") {
								$widget_content_type = get_sub_field('widget_content_type');
								$widget_title = get_sub_field('widget_title');
								$widget_description = get_sub_field('widget_description');
								
								if($widget_content_type=="subscribe") {
									if($widget_title!="") {
										echo '<div class="widget-newsletter"><h3>'.$widget_title.'</h3><div class="widget-newsletter-inner">'.$widget_description.'</div></div>';
									}
								} else if($widget_content_type=="comment") {
									if($widget_title!="") {
										echo '<div class="widget-ques"><p>'.$widget_title.'</p><div class="widget-ques-inner" id="thankcmtid"><form><textarea rows="4" id="txtcommentid"></textarea><div class="nvkSubmitButton"><button type="button" class="btn btn-default" id="commentsubmitbtn">Submit</button></div></form></div></div>';
									}
								} else if($widget_content_type=="poll") {
									if($widget_title!="") {
										echo '<div class="widget-poll"><p>'.$widget_title.'</p><div class="widget-poll-inner">'.$widget_description.'</div></div>';
									}
								} else {}
							} else {
								$widget_content_type = get_sub_field('widget_content_type');
								
								$widget_title = get_sub_field('widget_title');
								$widget_report_option_image = get_sub_field('widget_report_option_image');
								$widget_report_option_link = get_sub_field('widget_report_option_link');
								$second_widget_title = get_sub_field('second_widget_title');
								$widget_description = get_sub_field('widget_description');
								if($widget_content_type=="poll") {
									echo '<div class="two-widget-wrap">
										<div class="row">
											<div class="colL">
												<div class="img-widget"><a href="'.widget_report_option_link.'" target="_blank"> <img src="'.$widget_report_option_image.'"></a><span>'.$widget_title.'</span></div>
											</div>
											<div class="colR">
												<div class="widget-poll">
													<p>'.$second_widget_title.'</p>
													<div class="widget-poll-inner">'.$widget_description.'</div>
												</div>
											</div>
										</div>
									</div>';
								} else {
									echo '<div class="two-widget-wrap">
										<div class="row">
											<div class="colL">
												<div class="img-widget"><a href="'.widget_report_option_link.'" target="_blank"> <img src="'.$widget_report_option_image.'"></a><span>'.$widget_title.'</span></div>
											</div>
											<div class="colR">
												<div class="widget-newsletter">
													<h3>'.$second_widget_title.'</h3>
													<div class="widget-newsletter-inner">'.$widget_description.'</div>
												</div>
											</div>
										</div>
									</div>';
								}
							}
							echo '<div style="height:50px;"></div>';
						endwhile;
					endif; ?>
					
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

							<h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>

							<p><?php //the_advanced_excerpt(); ?></p>

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
					<div class="rc-inner"> 
						<a class="bg-none" href="<?php echo $repeater_url; ?>"  title="<?php echo $repeater_title; ?>">
						<?php
							if($repeater_thumbnail['url']=="") {
								$nvImage = esc_url(get_template_directory_uri())."/images/no-image.jpg";
							}else{
								$nvImage = $repeater_thumbnail['url'];
							}
						?>
						<img src="<?php echo $nvImage; ?>" alt="<?php echo $repeater_title; ?>">
						</a>
						<p>
							<a href="<?php echo $repeater_url; ?>" title="<?php echo $repeater_title; ?>">
								<?php echo $repeater_title;	?>
							</a>
						</p>
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