<?php
get_header();
$nvCateSlug = get_the_category();
$res = get_all_posted_month();
?>
  <!-- Body Content -->
  <div class="container-innerpage">
    <div class="row">
        <?php get_sidebar();?>
      <article class="content-wrap">
  	  <div class="breadcrumb"> <strong>You are here:</strong>  
		<?php if(function_exists('bcn_display')) {
				bcn_display();
			}
		?>
      </div>
       <?php
		wp_reset_postdata();
		$newsAry = array( 'post_type' => 'post', 
			'order' => 'ASC', 
			'page_id' => get_the_ID()
		);
		  
		$wp_query = new WP_Query($newsAry);
		if($wp_query->have_posts()) :
			while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
				<h1 class="page-title"><?php the_title();?></h1>
				<div class="editor-content">
                <div class="row">
					<div class="post-date">
						<?php echo the_time( 'F d, Y g:i a' ); ?> | Author: <?php the_author(); ?>
					</div>
					<div class="share-icon">
					SHARE&nbsp;&nbsp;<!--<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink()?>" target="_blank"><img src="<?php bloginfo('template_url')?>/images/icon/facebook.png" alt="share on facebook"></a>
					<a href="https://twitter.com/share?url=<?php the_permalink()?>&amp;text=Investright&amp;hashtags=Investright" target="_blank"><img src="<?php bloginfo('template_url')?>/images/icon/twitter.png" alt="share on twitter"></a>
					<a href="http://vkontakte.ru/share.php?url=<?php the_permalink();?>" target="_blank"><img src="<?php bloginfo('template_url')?>/images/icon/share.png" alt="share"></a>-->
					<span class='st_facebook_large' displayText='Facebook'></span>
					<span class='st_twitter_large' displayText='Tweet'></span>
					<span class='st_sharethis_large' displayText='ShareThis'></span>
					<!--div class="addthis_inline_share_toolbox"></div-->
					</div>
					<div class="select-group">
					<div class="row">
					<input type="hidden" name="templatelink" id="templatelink" value="<?php echo $template_url; ?>">
					<input type="hidden" name="pagelink" id="pagelink" value="<?php echo $site_url; ?>">
						
						<div class="select-wrap">
							<select name="archive-dropdown" id="monthly">
								<option value="0"><?php echo esc_attr( __( 'Month' ) ); ?></option>
								<?php
									$nvArUi = array_unique($res['month']);
									function compare_func($a, $b) {
										return ($t1 - $t2);
									}
									usort($nvArUi, "compare_func");
									natsort($nvArUi);
									//rsort($nvArUi);
									foreach($nvArUi as $mon){ ?>
									<option value="<?php echo $mon; ?>" <?php if($_GET['month']== $mon) {?> selected="selected" <?php } ?> ><?php  $monthNum = $mon; $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));  echo $monthName; // Output: May  echo $mon; ?></option> 
								<?php } ?>
							</select>
						</div>
						<div class="select-wrap">
							<select id="year" class="year">
							  <option value="0">Year</option>
							  <?php 
							  
							  //wp_get_archives( 'type=yearly&format=option&show_post_count=0' ); 
							  //$res = get_all_posted_month();
							  foreach(array_unique($res['year']) as $yea){ ?>
								 <option value="<?php echo $yea; ?>" <?php if($_GET['yea']== $yea) {?> selected="selected" <?php } ?> ><?php echo $yea;   ?></option> 
							  <?php } ?>
							</select>
						  </div>
						  <button class="gotoCalDate-btn filter_articles_go">GO</button>
						  <div class="select-wrap">
							<?php
							 $args = array(
								'show_option_all'    => '',
								'show_option_none' => __( 'All Categories' ),
								'option_none_value'  => '-1',
								'orderby'            => 'cat',
								'order'              => 'ASC',
								'show_count'         => 0,
								'hide_empty'         => 0,
								'child_of'           => 0,
								'exclude'            => '',
								'include'            => '',
								'echo'               => 1,
								'hierarchical'       => 0,
								'name'               => 'cat',
								'id'                 => '',
								'class'              => 'postform filter_articles',
								'depth'              => 0,
								'tab_index'          => 0,
								'taxonomy'           => 'category',
								'hide_if_empty'      => false,
								'value_field'	     => 'term_id',
								);
							wp_dropdown_categories( $args );
							?>
						</div>
						  
						  
					</div>
					</div>
						<?php
							if(has_post_thumbnail()){ ?>
																	
									<?php  
										$nvImage = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
										$nvImage = $nvImage[0];
										if($nvImage[0]=="") {
											$nvImage = esc_url(get_template_directory_uri())."/images/no-image.jpg";
										}
										//the_post_thumbnail('medium_large'); 
										$nvUrl = get_post_meta( get_the_ID(), 'url_featured_image', true );
										$nvOpen = get_post_meta( get_the_ID(), 'new_featured_image', true );
										$nvTrg = '';
										if($nvOpen==1) {
											$nvTrg = 'target="_blank"';
										}
										if($nvUrl!="") {
											echo '<a href="'.$nvUrl.'" '.$nvTrg.'>';
										}
										
									?>
										<img src="<?php echo $nvImage; ?>" alt="<?php the_title(); ?>" class="featured-img alignright">
									<?php
										if($nvUrl!="") {
											echo '</a>';
										}
								the_content();
						} else {
							the_content();
						}?>
                        </div>
                        </div>
        <?php
			endwhile;
		endif;
		wp_reset_query();
		
		$cats=wp_get_post_categories( get_the_ID());
		$cat_ID=$cats[0]; 
		
			$newsAry = array(
				'post_type' => 'post',
				'post_status' => 'publish', 
				'showposts' => 4, 
				'post__not_in' => array(get_the_ID()),
				'order' => 'DESC', 
				//'orderby' => 'rand',
				'cat' => $cat_ID
			);
		
			query_posts($newsAry);
			if (have_posts()) :
			?>
				<div class="related-content-wrap">
				  <h3>Related News</h3>
				  <div class="row">
					 <?php while (have_posts()) : the_post();
						$nvImage = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' );
					 ?>
					<div class="rc-inner"> <a href="<?php the_permalink()?>" style="color:#000;" title="<?php the_title(); ?>">
					<?php
						$nvImage = $nvImage[0];
						if($nvImage[0]=="") {
							$nvImage = esc_url(get_template_directory_uri())."/images/no-image.jpg";
						}
					?>
					<img src="<?php echo $nvImage; ?>" alt="<?php the_title(); ?>">	
					<p>
					  <?php
					  echo $post->post_title;
						/*if(strlen($post->post_title)<25) {
							echo substr($post->post_title, 0, 30);
						} else {
							echo substr($post->post_title, 0, 30)."...";
						}*/
						 ?>
					</p>
					</a>
					</div>
					 <?php endwhile;?>
				   
				  </div>
				</div>
			<?php
			endif;
			wp_reset_query();
			?>
      </article>
    </div>
  </div>
  <?php
  function get_all_posted_month() {
wp_reset_query();
$args_my=array(
    'post_type' => 'post',
	'posts_per_page' => -1, /*no limit, how?*/
    'orderby' => 'date',
    'order' => 'DESC',
);
query_posts($args_my);
$month = array();
$year = array();
$results = array();
while (have_posts()) : the_post();
	$month[] = get_the_date( 'm', get_the_ID() );
	$year[] = get_the_date( 'Y', get_the_ID() );
endwhile;
wp_reset_postdata();
$results['month'] = $month;
$results['year'] = $year;
wp_reset_query();
return $results;
}
  ?>
<?php 
get_footer();
?>
