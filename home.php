<?php
/* 
* Template Name: Home Page Template
*/
get_header();
?>

<!-- Banner Section -->
<div class="banner-main-wrap">
	<div class="row">
		<?php
			$nvFullCls = "";
			$ndGetLng = $_GET["lang"];
			if($ndGetLng=="pa") {
				$ndLng = "pa";
			} else if($ndGetLng=="zh") {
				$ndLng = "zh";
			} else {
				$ndLng = "en";
			}
			if($ndLng!="en") {
				$nvFullCls = "full-width";
				//$nvFullCls = "";
			}
		?>
		<div class="banner-wrap <?php echo $nvFullCls; ?>">
			<div class="banner-slider">
				<div class="flexslider">
					<ul class="slides">   
					<?php
						wp_reset_postdata();
						$bannerAry = array( 'post_type' => 'banner', 
							'post_status' => 'publish', 
							'order' => 'ASC',
							'orderby' => 'post_date',
							'meta_query' => array(
								array(
									'key' => 'banner_language_setting',
									'value' => 'en',
									'compare' => '='
								)
							),
						);
						  
						$wp_query = new WP_Query($bannerAry);
						if($wp_query->have_posts()) :
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
										} else {
											_e( "Learn More", "investright" );
										}
										?>
										</a>
										</div>
									 </li>
								<?php
								}
							endwhile;
							wp_reset_postdata();
						endif;
					  ?>
					</ul>
				</div>
			</div>
		</div>
		<?php
			$ndGetLng = $_GET["lang"];
			if($ndGetLng=="pa") {
				$ndLng = "pa";
			} else if($ndGetLng=="zh") {
				$ndLng = "zh";
			} else {
				$ndLng = "en";
			}
			if($ndLng=="en") { ?>
			<div class="latest-news-wrap">
			  <div class="latest-news-inner">
			  <h3><a href="<?php echo $site_url;?>/investor-news/" title="Latest News"><?php _e( "Latest News", "investright" ); ?></a> <!--a href="<?php echo $site_url;?>/feed/?post_type=post" target="_blank" title="Latest News Feed"><span class="icon iconset icon-feed"></span></a--></h3>
				<?php
					echo wpb_latest_sticky();
				?>
			  </div>
			</div>
		<?php } ?>
  </div>
</div>

<!-- Body Content -->
<div class="container"> 
  
	<!-- Two Column Wrap -->
	<?php
		//$ndLng = ICL_LANGUAGE_CODE;
		$ndGetLng = $_GET["lang"];
		if($ndGetLng=="pa") {
			$ndLng = "pa";
		} else if($ndGetLng=="zh") {
			$ndLng = "zh-hant";
		} else {
			$ndLng = "en";
		}
		
		$nvLink = of_get_option( 'rightblocklink_'.$ndLng );
		$nvOpen = of_get_option( 'rightblockcheckbox_'.$ndLng );
		$nvTarget = '';
		if($nvOpen==1 && $nvLink!="") {
			$nvTarget = 'target="_blank"';
		}
		if($nvLink=="") {
			$nvLink = "#";
		}
	?>
	<div class="row be-wrap">
	
		<div class="be-colL">
			<div class="be-colL-inner">
				<div class="be-content-wrap ">
<a href="<?php echo $nvLink; ?>" <?php echo $nvTarget; ?>>
<h3><?php echo of_get_option( 'rightblocktitle_'.$ndLng ); ?></h3>
					<p><?php echo of_get_option( 'rightblocktxt_'.$ndLng ); ?></p>
                    </a>
					<a href="<?php echo $nvLink; ?>" class="link-more" title="<?php echo of_get_option( 'rightblocktitle_'.$ndLng ); ?>" <?php echo $nvTarget; ?>><?php _e( "Learn More", "investright" ); ?></a>
				</div>
			</div>
		</div>

	<?php
		$nvLink = of_get_option( 'leftblocklink_'.$ndLng );
		$nvOpen = of_get_option( 'leftblockcheckbox_'.$ndLng );
		$nvTarget = '';
		if($nvOpen==1 && $nvLink!="") {
			$nvTarget = 'target="_blank"';
		}
		if($nvLink=="") {
			$nvLink = "#";
		}

	?>
	
		<div class="be-colR">
			<div class="be-colR-inner">
				<div class="be-content-wrap left">
	<a href="<?php echo $nvLink; ?>" <?php echo $nvTarget; ?>>
					<h3><?php echo of_get_option( 'leftblocktitle_'.$ndLng ); ?></h3>
					<p><?php echo of_get_option( 'leftblocktxt_'.$ndLng ); ?></p>
                    </a>
					<a href="<?php echo $nvLink; ?>" class="link-more" title="<?php echo of_get_option( 'leftblocktitle_'.$ndLng ); ?>" <?php echo $nvTarget; ?>><?php _e( "Learn More", "investright" ); ?></a>
				</div>
			</div>
		</div>
	
  </div>
  
	<?php
		$nvLink = of_get_option( 'videoblocklink_'.$ndLng );
		$nvOpen = of_get_option( 'videoblockcheckbox_'.$ndLng );
		$nvTarget = '';
		if($nvOpen==1 && $nvLink!="") {
			$nvTarget = 'target="_blank"';
		}
		if($nvLink=="") {
			$nvLink = "#";
		}
	?>
  <!-- Fraudster Exposed Section -->
  <div class="row fraudster-wrap">
    <div class="fraudster-inner">
		<div class="fraudster-colL">
			<h3><?php echo of_get_option( 'videoblocktitle_'.$ndLng ); ?></h3>
			<p><?php echo of_get_option( 'videoblocktxt_'.$ndLng ); ?></p>
			<a href="<?php echo $nvLink; ?>" class="link-more" title="<?php echo of_get_option( 'videoblocktitle_'.$ndLng ); ?>" <?php echo $nvTarget; ?>><?php _e( "See More Videos", "investright" ); ?></a>
		</div>		
		<div class="fraudster-colR"><?php
		$video = of_get_option( 'videoblockembeds_'.$ndLng );
		$nvImage = of_get_option( 'homepage_video_thumb_'.$ndLng );
		if($nvImage=="") {
			$nvImage = esc_url(get_template_directory_uri())."/images/video_no-image.jpg";
		}
		
		 if (!filter_var($video, FILTER_VALIDATE_URL) === false) {  ?>
		 <!--iframe width="560" height="315" src="<?php  echo of_get_option( 'videoblockembeds' ); ?>" frameborder="0" allowfullscreen></iframe-->
		 <a class="html5lightbox home-video-thumb" href="<?php  echo of_get_option( 'videoblockembeds_'.$ndLng ); ?>" data-width="480" data-height="320">
         <span class="watch-btn-wrap">
         	<span class="watch-video-btn"><?php _e( "Watch Now", "investright" ); ?> <img src="<?php echo $template_url;?>/images/icon/arrow-white-right.png" alt="Watch Now"></span>
         </span>
         <img src="<?php echo $nvImage; ?>" alt="<?php echo of_get_option( 'videoblocktitle_'.$ndLng ); ?>" />
         </a>
		 <?php }else{ echo $video; }?></div>
    </div>
  </div>
</div>

<?php get_footer(); ?>