<?php
/* Template Name: Personalities Template*/
get_header();
?>

<!-- Body Content -->

<div class="container-innerpage">
  <div class="row">
    <article class="content-wrap fullwidth">
      <div class="breadcrumb"> <strong>You are here:</strong>
        <?php
			if(function_exists('bcn_display')) {
				bcn_display();
			}
       ?>
      </div>
      <?php
		if( have_posts() ) :
			while( have_posts() ) : the_post();
			?>
      <h1 class="page-title">
        <?php the_title(); ?>
      </h1>
      <?php
			endwhile;
		endif;
		?>
      <div class="editor-content no-padding">
		<div class="share-icon">SHARE&nbsp;&nbsp;
			<span class='st_facebook_large' displayText='Facebook'></span>
			<span class='st_twitter_large' displayText='Tweet'></span>
			<span class='st_sharethis_large' displayText='ShareThis'></span>
			
			<!--div class="addthis_inline_share_toolbox"></div-->
			</div>
        <div class="main">
			<?php
				if( have_posts() ) :
					while( have_posts() ) : the_post();
						$nvImage = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
					?>
						<div class="row">
							<div class="col-md-4">
								<img src="<?php echo $nvImage[0]; ?>" alt="<?php echo get_the_title(); ?>">
							</div>
							<div class="col-md-8">
								<div class="well-personality">
								<?php the_content();?>
								</div>
							</div>
						</div>
					<?php
					endwhile;
				endif;
			?>
          <!--div class="row">
		    <div class="col-md-12">
              <div class="temp-prsonalt">
                <div class="tp-img-thumb-wrap">
					<?php
						if( have_rows('personalities_items') ) {
							while ( have_rows('personalities_items') ) : the_row(); ?>
								<div class="tp-img-col"><p><?php echo get_sub_field('title'); ?></p><img src="<?php echo get_sub_field('image'); ?>" alt=""> </div>
							<?php endwhile;
						}
					?>
                </div>
                <div class="tp-content">
                  <p class="btn-container"><a class="btn btn-coolblue" href="<?php echo get_field('take_the_quiz_link'); ?>"><?php echo get_field('take_the_quiz'); ?></a></p>
                  <?php echo get_field('personality_description_box_one'); ?>
                </div>
              </div>
            </div>
          </div-->
          <hr class="grnBrd8">
          <div class="row">
            <div class="well-about tp-content">
              <div class="row">
                <div class="col-md-7">
				<?php echo get_field('personality_description_box_two'); ?>
                </div>
                <div class="col-md-5">
                  <div class="well-chart text-center">
                    <p><img class="aligncenter wp-image-136 size-full" src="<?php echo get_field('personality_graph_image'); ?>" alt="piechart" width="296" height="162" /></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </article>
  </div>
</div>
<?php get_footer(); ?>
