<?php 
/* Template Name: 2nd Level Index Page Template*/
 get_header();
global $post;
$args = array(
      'post_parent' =>  $post->ID,
      'post_type'   => 'page', 
      'numberposts' => -1,
      'post_status' => 'publish',
      'order'       =>'DESC',
      'orderby'     =>'menu_order'
        ); 

     $children_pages = get_children( $args );
    // foreach($children_pages as $page)
?>

 <!-- Body Content -->
  <div class="container-innerpage">
   <?php while (have_posts()) : the_post(); ?>

    <div class="row">
      <?php get_sidebar();?>
      <article class="content-wrap">
       <div class="breadcrumb"> <strong>You are here:</strong>  
           <?php if( function_exists('bcn_display'))
                 {
                     bcn_display();
                  }
            ?> 
       </div>
        <div class="editor-content no-padding">
          <div class="mf-wrap-top">
            <div class="row">
				<?php
					 $nvVideo = get_post_meta(get_the_ID(), "investright_video_url", true);
					 $nvImage = get_post_meta(get_the_ID(), "investright_videothumb", true);
					 $nvImage = wp_get_attachment_image_src( $nvImage, 'full' );
					 $nvImage = $nvImage[0];
					 if($nvImage=="") {
						$nvImage = esc_url(get_template_directory_uri())."/images/video_no-image.jpg";
					}
					 $nvFtrUrl = get_post_meta(get_the_ID(), "investright_featured_url", true);
					if($nvVideo!="" && !filter_var($nvVideo, FILTER_VALIDATE_URL) === false) { ?>					
						<div class="left">
							<h1 class="page-title"><?php the_title();?></h1>
							<?php the_content();?>
						</div>
						<div class="right img-wrap">
							<!--iframe width="560" height="315" src="<?php echo $nvVideo; ?>" frameborder="0" allowfullscreen></iframe-->
							<a class="html5lightbox" href="<?php echo $nvVideo; ?>" data-width="480" data-height="320"><img src="<?php echo $nvImage; ?>" /></a>
						</div>
					<?php 
					} else if(has_post_thumbnail()){ ?>
						<div class="left">
							<h1 class="page-title"><?php the_title();?></h1>
							<?php the_content();?>
						</div>
						<div class="right img-wrap"><?php
						
							$nvUrl = get_post_meta( get_the_ID(), 'url_featured_image', true );
							$nvOpen = get_post_meta( get_the_ID(), 'new_featured_image', true );
							$nvTrg = '';
							if($nvOpen==1) {
								$nvTrg = 'target="_blank"';
							}
							if($nvUrl!="") {
								echo '<a href="'.$nvUrl.'" '.$nvTrg.'>';
							}
							the_post_thumbnail('full');
							if($nvUrl!="") {
								echo '</a>';
							}
						?></div>
					<?php 
					} else { ?>
						<div>
							<h1 class="page-title"><?php the_title();?></h1>
							<?php the_content();?>
						</div>
					<?php }?>
            </div>
          </div>
        <?php endwhile;?>

          <?php wp_reset_query();$count=1;$key=0;
                $classname=array('dark-blue-box','light-blue-box','grn-box');
                query_posts('post_type=page&post_parent='.$post->ID.'&post_status=publish&showposts=-1&orderby=menu_order&order=ASC');
                if(have_posts()):?>

                <?php while (have_posts()) : the_post(); 
                ?>
                           <?php if($count==1){?>
							<div class="mf-wrap">
								<div class="row">
									<div class="left">
										<div class="<?php echo $classname[$key];?> equalHeight">
											<h3><?php the_title();?></h3>
												<?php the_excerpt();?>
											<a href="<?php the_permalink();?>" class="link-more" title="<?php the_title(); ?>">Learn More</a> 
										</div>
									</div>
                            <?php }?>
                            <?php if($count==2){?>    
									<div class="right">
										<div class="<?php echo $classname[$key];?> equalHeight">
											<h3><?php the_title();?></h3>
												<?php the_excerpt();?>
											<a href="<?php the_permalink();?>" class="link-more" title="<?php the_title(); ?>">Learn More</a> 
										</div>
									</div>    
                                </div>
							</div>
                            <?php }?>
                            <?php if($count==3){?>
							<div class="mf-wrap">
                                <div class="white-box">
                                        <h3><?php the_title();?></h3>
                                            <?php the_excerpt();?>
                                        <a href="<?php the_permalink();?>" class="link-more dark" title="<?php the_title(); ?>">Learn More</a> 
                                </div>
							</div>
                        <?php }
                    if($count==3)
                    {
						$count=1; 
                    }
                    else{
                       $count++;
						if($key==2)
							$key=0;
                        else
							$key++;
					}
				endwhile;
			endif;?>
            
            
            <!--related-->
            
            <?php 
			// check if the repeater field has rows of data
if( have_rows('related_items') ): ?>
<div class="related-content-wrap">
				  <h3>Related Items</h3>
				  <div class="row">

 	<?php // loop through the rows of data
    while ( have_rows('related_items') ) : the_row();

        // display a sub field value
        $repeater_title = get_sub_field('related_title');
		$repeater_url = get_sub_field('related_url');
		$repeater_thumbnail = get_sub_field('related_thumbnail');
		?>
		
		<div class="rc-inner"> <a href="<?php echo $repeater_url; ?>" style="color:#000;" title="<?php echo $repeater_title; ?>">
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
<?php endif; 			?>
           
            
            
           
					
            <!--relateds Ends here -->
            
            
      </article>
    </div>
  </div>
<?php
 get_footer(); ?>