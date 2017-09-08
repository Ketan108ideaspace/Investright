<?php
get_header();
global $wpdb,$template_url;
global $post;
$args = array(
  'post_parent' =>  215,
  'post_type'   => 'page', 
  'numberposts' => -1,
  'post_status' => 'publish',
  'order'       =>'DESC',
  'orderby'     =>'menu_order'
); 

$children_pages = get_children( $args );

$paged = get_query_var('paged') ? get_query_var('paged') : 1;
if($_GET['category']!='' && $_GET['category']>0){
	$cur_cat_id = $_GET['category'];
	$args_cat = array(
		'cat' => $cur_cat_id ,
		'paged' => $paged,
	);
}else{
	if($_GET['category']=='-1' && $_GET['category']!=""){
		$args_cat = array(
			'paged' => $paged,
			
		);
	} else {
		$cur_cat_id = get_cat_id( single_cat_title("",false) );
		$args_cat = array(
			'cat' => $cur_cat_id ,
			'paged' => $paged,
		);
	}
}
if($_GET['month']!='' || $_GET['month']!=0){
	$args_cat['monthnum'] = $_GET['month'];
}
if($_GET['yea']!='' || $_GET['yea']!=0){
	$args_cat['year'] = $_GET['yea'];
}

//wp_reset_query();
$the_query = new WP_Query( $args_cat );

/*if($nvPaged==0) {
	$nvStart = 1;
	$nvEnd = $nvPerPage;
} else {
	$nvStart = $nvPerPage + 1;
	$nvEnd = $nvPosts;	
} */
$nvPaged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$nvPerPage = get_query_var('posts_per_page');
$end = $nvPerPage * $nvPaged;
$start = $end - $nvPerPage + 1;
$nvPosts = $the_query->found_posts;
if($end>$nvPosts) {
	$end = $nvPosts;
}
?>
  <!-- Main Menu -->
  
  <!-- Body Content -->
  
  <div class="container-innerpage">
	<div class="row">
	  <?php get_sidebar();?>
	  <article class="content-wrap">
		<div class="breadcrumb"> <strong>You are here:</strong>
		  <?php if(function_exists('bcn_display'))
		{
			bcn_display();
		}?>
		</div>
		<h1 class="page-title">
			Investor News<?php //echo get_cat_name( $cur_cat_id ); ?>
		</h1>
		<div class="editor-content">
		
		  <h2>Articles <?php echo $start; ?> - <?php echo $end;?> of <?php echo $nvPosts; ?></h2>
		
		  <?php wp_pagenavi( array( 'query' => $the_query ) ); ?>
		  <div class="clear"></div>
		  <div class="select-group">
			<div class="row">
			<div class="sg-label">Filter by date</div>
			<?php 
				global $wp;
				$current_url = home_url(add_query_arg(array(),$wp->request));
			?>
			<input type="hidden" name="templatelink" id="templatelink" value="<?php echo $template_url; ?>">
			<input type="hidden" name="pagelink" id="pagelink" value="<?php echo $site_url; ?>">
			  <div class="select-wrap">
				<select name="archive-dropdown" id="monthly">
				  <option value="0"><?php echo esc_attr( __( 'Month' ) ); ?></option>
                  
				  <?php //wp_get_archives( 'type=monthly&format=option&show_post_count=0' );
					$res = get_all_posted_month();
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
				  $res = get_all_posted_month();
				  foreach(array_unique($res['year']) as $yea){ ?>
					 <option value="<?php echo $yea; ?>" <?php if($_GET['yea']== $yea) {?> selected="selected" <?php } ?> ><?php echo $yea;   ?></option> 
				  <?php } ?>
				</select>
			  </div>
			  <button class="gotoCalDate-btn filter_articles_go">GO</button>
			</div>
		  </div>
		  <div class="select-group">
			<div class="row">
				<div class="sg-label">Filter by category</div>
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
						   'selected'           => $cur_cat_id,
						   'hierarchical'       => 0,
						   'name'               => 'cat',
						   'id'                 => '',
						   'class'              => 'postform',
						   'depth'              => 0,
						   'tab_index'          => 0,
						   'taxonomy'           => 'category',
						   'hide_if_empty'      => false,
						   'value_field'	     => 'term_id',
						); ?>
				<?php wp_dropdown_categories( $args ); ?>
				
				</div>
				<button class="gotoCalDate-btn filter_articles_cate_go">GO</button>
			</div>
		  </div>
		  <div id="articles_content">
			
			<?php
			   if ($the_query->have_posts()) : 
				while ( $the_query->have_posts() ) : $the_query->the_post();
					$nvImage = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' );
			?>
			<div class="news-wrap">
			  <div class="row">
				<div class="news-img"><a href="<?php the_permalink()?>" title="<?php the_title(); ?>">
				<?php
					$nvImage = $nvImage[0];
					if($nvImage[0]=="") {
						$nvImage = esc_url(get_template_directory_uri())."/images/no-image.jpg";
					}
				?>
				<img src="<?php echo $nvImage; ?>" alt="<?php the_title(); ?>">
				  </a></div>
				<div class="news-content">
				  <h3><a href="<?php the_permalink()?>" title="<?php the_title(); ?>">
					<?php the_title();?>
					</a></h3>
				  <p class="date">
					<?php echo the_time( 'M d, Y g:i a' ); ?> | Author: <?php the_author(); ?>
				  </p>
					<?php 
					//the_excerpt();	
                                        echo wp_trim_words( get_the_content(), 35, '...' );
					?>
				</div>
			  </div>
			</div>
			<?php endwhile;?>
		  </div>
		  <!--articles_content--> 
		</div>
		<div class="row">
		  <?php wp_pagenavi( array( 'query' => $the_query ) ); ?>
		</div>
		<?php  else: ?>
		<h1>
		  <?php echo of_get_option( 'category_not_found_msg' ); ?>
		</h1>
		<?php endif; ?>
		
		
		<div class="editor-content no-padding">
		<?php
			wp_reset_query();
			
			$nvPostId = 339;
			
			$count=1;
			$key=0;
			$classname=array('dark-blue-box','light-blue-box','grn-box');
			query_posts('post_type=page&post_parent='.$nvPostId.'&post_status=publish&showposts=-1&orderby=menu_order&order=ASC');
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
		  
		  <?php 
			/*$nvPostId1 = get_post_meta(212,'investright_content1',true);
			$nvPostId2 = get_post_meta(212,'investright_content2',true);
			$nvPostId3 = get_post_meta(212,'investright_content3',true);
			$nvPostId4 = get_post_meta(212,'investright_content4',true);
			wp_reset_query();
			
			$newsAry = array(
				'post_status' => 'publish', 
				'showposts' => 4,
				'post__in' => array($nvPostId1,$nvPostId2,$nvPostId3,$nvPostId4),
				'orderby' => 'post__in',
				'post_type' => 'event'
			);
			
			query_posts($newsAry);
			if (have_posts()) : ?>
			
			<div class="related-content-wrap">
			  <h3><?php _e( "Related Events", "investright" ); ?></h3>
			  <div class="row">
				 <?php while (have_posts()) : the_post();
					$nvImage = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' );
				 ?>

				<div class="rc-inner">
          		<?php
					$nvImage = $nvImage[0];
					if($nvImage[0]=="") {
						$nvImage = esc_url(get_template_directory_uri())."/images/no-image.jpg";
					}
				?>
				<img src="<?php echo $nvImage; ?>" alt="<?php the_title(); ?>">
				  <p><a href="<?php the_permalink()?>" style="color:#000;">
					<?php
					if(strlen($post->post_title)<30) {
						echo substr($post->post_title, 0, 30);
					} else {
						echo substr($post->post_title, 0, 30)."...";
					}
					?>
				  </a></p>
				</div>
				 <?php endwhile;?>
			   
			  </div>
			</div>
			<?php endif; wp_reset_query();*/
			?>
		</div>
		
	  </article>
	</div>
  </div>
  <?php 
function get_all_posted_month()
{
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
 wp_reset_query();
 $results['month'] = $month;
 $results['year'] = $year;
 return $results;
}
?>
  <?php get_footer();?>
