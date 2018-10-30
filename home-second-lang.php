<?php
/* 
* Template Name: Second Language Home Page Template
*/
get_header();

if ($post->ancestors) { 
	$pageId = end($post->ancestors); 
} else { 
	$pageId = $post->ID; 
}

if($pageId==9093) {
	$nvLngMetaQry = "pa";
} else if($pageId==9117) {
	$nvLngMetaQry = "zh";
} else {
	$nvLngMetaQry = "en";
}

$newsAry = array( 'post_type' => 'banner', 
	'post_status' => 'publish', 
	'order' => 'ASC',
	'orderby' => 'post_date',
	'meta_query' => array(
		array(
			'key' => 'banner_language_setting',
			'value' => $nvLngMetaQry,
			'compare' => '='
		)
	),
);

	$wp_query = new WP_Query($newsAry);
	if($wp_query->have_posts()) : ?>
		<div class="banner-main-wrap">
			<div class="row">
				<div class="banner-wrap full-width">
					<div class="banner-slider">
						<div class="flexslider">
							<ul class="slides">
							<?php
								while ($wp_query->have_posts()) : $wp_query->the_post();
									$nvImage = wp_get_attachment_image_src( get_post_thumbnail_id( $data->ID ), 'large' );
									$nvBannerLink = get_post_meta( get_the_ID(), 'url_featured_image', true );
									$nvOpen = get_post_meta( get_the_ID(), 'new_featured_image', true );
									
									if($nvBannerLink=="") {
										$nvBannerLink = "#";
									}
									$nvTarget = '';
									if($nvOpen==1) {
										$nvTarget = 'target="_blank"';
									}
									$nvImage = $nvImage[0];
									if($nvImage!="") {
									?>    
										<li>
											<img src="<?php echo $nvImage; ?>" alt="<?php the_title(); ?>">
											<div class="banner-content-box">
											<h1><?php the_title(); ?></h1>
											<a href="<?php echo $nvBannerLink;?>" class="link-more" <?php echo $nvTarget; ?> title="<?php the_title(); ?>">
											<?php
											$nvTxtBtn = get_post_meta( get_the_ID(), 'banner_button', true );
											if($nvTxtBtn!="") {
												echo $nvTxtBtn;
											}
											?>
											</a>
											</div>
										 </li>
									<?php
									}
								endwhile;
							?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	endif;
wp_reset_query();
?>

<!-- Body Content -->
<div class="container"> 
  
	<!-- Two Column Wrap -->
	<?php
		
		$nvLink = get_field("right_box_button_link");
		$nvOpen = get_field("right_box_open_to_new_window");
		$nvTarget = '';
		if($nvOpen==true && $nvLink!="") {
			$nvTarget = 'target="_blank"';
		}
	?>
	<div class="row be-wrap">
	
		<div class="be-colL">
			<div class="be-colL-inner">
				<div class="be-content-wrap ">
					<a href="<?php echo $nvLink; ?>" <?php echo $nvTarget; ?>>
					<h3><?php echo get_field("right_box_title"); ?></h3>
					<p><?php echo get_field("right_box_description"); ?></p>
                    </a>
					<a href="<?php echo $nvLink; ?>" class="link-more" title="<?php echo get_field("right_box_title"); ?>" <?php echo $nvTarget; ?>><?php echo get_field("right_box_button_text"); ?></a>
				</div>
			</div>
		</div>

	<?php
		$nvLink = get_field("left_box_button_link");
		$nvOpen = get_field("left_box_open_to_new_window");
		$nvTarget = '';
		if($nvOpen==true && $nvLink!="") {
			$nvTarget = 'target="_blank"';
		}
	?>
	
		<div class="be-colR">
			<div class="be-colR-inner">
				<div class="be-content-wrap left">
					<a href="<?php echo $nvLink; ?>" <?php echo $nvTarget; ?>>
					<h3><?php echo get_field("left_box_title"); ?></h3>
					<p><?php echo get_field("left_box_description"); ?></p>
                    </a>
					<a href="<?php echo $nvLink; ?>" class="link-more" title="<?php echo get_field("left_box_title"); ?>" <?php echo $nvTarget; ?>><?php echo get_field("left_box_button_text"); ?></a>
				</div>
			</div>
		</div>
	
  </div>
  
	<?php
		$nvLink = get_field("video_box_button_link");
		$nvOpen = get_field("video_box_open_to_new_window");
		$nvTarget = '';
		if($nvOpen==true && $nvLink!="") {
			$nvTarget = 'target="_blank"';
		}
	?>
	<!-- Fraudster Exposed Section -->
	<div class="row fraudster-wrap">
		<div class="fraudster-inner">
			<div class="fraudster-colL">
				<h3><?php echo get_field("video_box_title"); ?></h3>
				<p><?php echo get_field("video_box_description"); ?></p>
				<a href="<?php echo $nvLink; ?>" class="link-more" title="<?php echo get_field("video_box_title"); ?>" <?php echo $nvTarget; ?>><?php echo get_field("video_box_button_text"); ?></a>
			</div>		
			<div class="fraudster-colR">
			<?php
				$video = get_field("video_box_url");
				$nvImage = get_field("video_box_image");
				if($nvImage=="") {
					$nvImage = esc_url(get_template_directory_uri())."/images/video_no-image.jpg";
				}
		
				if (!filter_var($video, FILTER_VALIDATE_URL) === false) {  ?>
					<a class="html5lightbox home-video-thumb" href="<?php  echo get_field("video_box_url"); ?>" data-width="480" data-height="320">
					<span class="watch-btn-wrap">
						<span class="watch-video-btn"><?php echo get_field("video_box_watch_title_text"); ?> <img src="<?php echo $template_url;?>/images/icon/arrow-white-right.png" alt="Watch Now"></span>
					</span>
					<img src="<?php echo $nvImage; ?>" alt="<?php echo get_field("video_box_title"); ?>" />
					</a>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>