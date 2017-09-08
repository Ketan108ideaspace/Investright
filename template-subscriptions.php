<?php 
/* Template Name: Subscriptions Template*/
get_header();
?>

 <!-- Body Content -->
  <div class="container-innerpage">
    <div class="row">
      <?php get_sidebar();?>
      <article class="content-wrap">
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
			SHARE&nbsp;&nbsp;<!--a href="http://www.facebook.com/sharer.php?u=<?php the_permalink()?>" target="_blank"><img src="<?php bloginfo('template_url')?>/images/icon/facebook.png" alt="share on facebook"></a>
			<a href="https://twitter.com/share?url=<?php the_permalink()?>&amp;text=Investright&amp;hashtags=Investright" target="_blank"><img src="<?php bloginfo('template_url')?>/images/icon/twitter.png" alt="share on twitter"></a>
			<a href="http://vkontakte.ru/share.php?url=<?php the_permalink();?>" target="_blank"><img src="<?php bloginfo('template_url')?>/images/icon/share.png" alt="share"></a-->
			<span class='st_facebook_large' displayText='Facebook'></span>
			<span class='st_twitter_large' displayText='Tweet'></span>
			<span class='st_sharethis_large' displayText='ShareThis'></span>
			</div>
			<?php the_content();?>
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
			/*// check if the repeater field has rows of data
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
		
		<div class="rc-inner blue-box"> <a href="<?php echo $repeater_url; ?>" style="color:#000;" title="<?php echo $repeater_title; ?>">
					<?php
						
						if($repeater_thumbnail['url']=="") {
							$nvImage = esc_url(get_template_directory_uri())."/images/no-image.jpg";
						}else{
							$nvImage = $repeater_thumbnail['url'];
						}
					?>
					<img src="<?php echo $nvImage; ?>" alt="<?php echo $repeater_title; ?>">	
					<p>
					  <?php
						if(strlen($repeater_title)<25) {
							echo substr($repeater_title, 0, 30);
						} else {
							echo substr($repeater_title, 0, 30)."...";
						}
						 ?>
					</p>
					</a>
					</div>
		
<?php endwhile; ?>
     </div>
            </div>
<?php endif; */?>
           
            
            
           
					
            <!--relateds Ends here -->
		
      </article>

    </div>
  </div>


<?php get_footer(); ?>