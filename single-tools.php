<?php get_header();?>
  <!-- Body Content -->
  <div class="container-innerpage">
    <div class="row">
        <?php get_sidebar();?>
      <article class="content-wrap">
  	  <div class="breadcrumb"> <strong>You are here:</strong>  
  	  <?php if(function_exists('bcn_display'))
       {
        bcn_display();
        }
       ?> 
      </div>
       <?php while (have_posts()) : the_post(); ?>
        <h1 class="page-title"><?php the_title();?></h1>
        <div class="editor-content">
          <!--div class="share-icon"> SHARE&nbsp;&nbsp;<a href="#"><img src="images/icon/facebook.png" alt="share on facebook"></a> <a href="#"><img src="images/icon/twitter.png" alt="share on twitter"></a> <a href="#"><img src="images/icon/share.png" alt="share"></a> </div-->
          
          <?php the_content();?>

         
        </div>
        <?php endwhile;?>
        <?php 
		$cats=wp_get_post_categories( get_the_ID());
		$cat_ID=$cats[0]; 
		wp_reset_query();
		
		$newsAry = array(
			'post_type' => 'tools', 
			'post_status' => 'publish', 
			'showposts' => 4, 
			'post__not_in' => array(get_the_ID()),
			'order' => 'ASC', 
			'orderby' => 'rand',
			'cat' => $cat_ID
		);
		
        query_posts($newsAry);
        if (have_posts()) : ?>

        <div class="related-content-wrap">
          <h3>Related Content</h3>
          <div class="row">
          	 <?php while (have_posts()) : the_post();
			 $nvImage = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' );
			 ?>
            <div class="rc-inner"> <a href="<?php the_permalink()?>">
			<?php
				$nvImage = $nvImage[0];
				if($nvImage[0]=="") {
					$nvImage = esc_url(get_template_directory_uri())."/images/no-image.jpg";
				}
			?>
			<img src="<?php echo $nvImage; ?>" alt="<?php the_title(); ?>">
              <p><?php the_title();?></p></a>
            </div>
             <?php endwhile;?>
           
          </div>
        </div>
    <?php endif; wp_reset_query();?>
      </article>
    </div>
  </div>
  
<?php get_footer();?>