<?php
/* Template Name: Personalities(New) Template*/
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
        <h1 class="page-title"><?php the_title(); ?></h1>
        <div class="editor-content">
          <div class="main prsonlt-wrap">
			
			<?php
				if( have_posts() ) :
					while( have_posts() ) : the_post();
						$nvImage = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
					?>
						<div class="row featured-row">
							<div class="col-md-3 equalHeight">
								<table class="pq-result-imgThumb"><tr><td><img src="<?php echo $nvImage[0]; ?>" alt="<?php echo get_the_title(); ?>"></td></tr></table>
							</div>
							<div class="col-md-9 equalHeight">
								<div class="well-personality">
								<?php the_content();?>
								<p><a class="btn btn-coolblue" href="<?php echo get_field('take_quiz_link'); ?>">Take the Quiz</a></p>
								</div>
							</div>
						</div>
					<?php
					endwhile;
				endif;
			?>
			<h2>PERSONALITIES</h2>
			<?php
				if( have_rows('personalities') ) {
					while ( have_rows('personalities') ) : the_row(); ?>
						<div class="row" id="<?php echo strtolower(get_sub_field('title')); ?>">
						  <div class="col-md-3 equalHeight"><table class="pq-result-imgThumb"><tr><td><img class="" src="<?php echo get_sub_field('image'); ?>" alt="" /></td></tr></table></div>
						  <div class="col-md-9 equalHeight">
							<div class="well-personality">
							<h3><?php echo get_sub_field('title'); ?></h3>
							<?php echo get_sub_field('description'); ?>
							</div>
						  </div>
						</div>
					<?php endwhile;
				}
			?>
			
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
            
            <!--div class="btn-container"></div-->
        </div>
      </article>
    </div>
  </div>
</div>
<?php get_footer(); ?>
