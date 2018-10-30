<?php 
/*
Template Name: Video Template
*/
get_header();
?>
<!-- Body Content -->
	<div class="container-innerpage">
    <div class="row">
		<article class="content-wrap fullwidth videw-temp">
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
				<div class="editor-content no-padding">
					<div class="share-icon">
					SHARE&nbsp;&nbsp;
					<span class='st_facebook_large' displayText='Facebook'></span>
					<span class='st_twitter_large' displayText='Tweet'></span>
					<span class='st_sharethis_large' displayText='ShareThis'></span>
					
					<!--div class="addthis_inline_share_toolbox"></div-->
					</div>
					<div class="video-temp-top row">
                    <?php the_content();?>
                    <div id="feature-video-wrap">					
						<div class="feature-video-wrap row">
							<div class="col-md-4">
							<h3>Featured Video</h3>
							<p><?php echo get_field("featured_video_title"); ?></p>
							</div>
							<div class="col-md-8">
								<?php echo '<a class="html5lightbox home-video-thumb" href="https://www.youtube.com/embed/'.get_field("featured_video_id").'" data-width="480" data-height="320"><img src="https://img.youtube.com/vi/'.get_field("featured_video_id").'/0.jpg" /></a>'; ?>
							</div>
						</div>
                    </div>
                    </div>
				</div>
			<?php endwhile;?>
			
			<?php
				if( have_rows('video_items') ):
					while ( have_rows('video_items') ) : the_row();
						echo '<div class="video-wrap"><h3>'.get_sub_field("video_category_name").'</h3><div class="row">';
						if( have_rows('video_list') ):
							$nvNoV = 1;
							while ( have_rows('video_list') ) : the_row();
								$nvCstCls = "";
								if($nvNoV==3){ $nvCstCls = " third-vcol"; $nvNoV = 0;}
								echo '<div class="video-col"><h3 class="video-title"><a class="html5lightbox" href="https://www.youtube.com/embed/'.get_sub_field("youtube_id").'" data-width="480" data-height="320">'.get_sub_field("video_title").'</a></h3><a class="html5lightbox home-video-thumb" href="https://www.youtube.com/embed/'.get_sub_field("youtube_id").'" data-width="480" data-height="320"><img src="https://img.youtube.com/vi/'.get_sub_field("youtube_id").'/0.jpg" /></a></div>';
								$nvNoV++;
							endwhile;
						endif;
						echo '</div></div>';
					endwhile;
				endif;
			?>
			
		</article>
	</div>
</div>
<?php get_footer(); ?>