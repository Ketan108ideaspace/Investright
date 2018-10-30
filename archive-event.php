<?php
get_header();

$paged = get_query_var('paged') ? get_query_var('paged') : 1;
if($_GET['category']!='' && $_GET['category']>=0){
	$args_cat = array(
		'post_type' => 'event',
		'taxonomy' => $_GET['category'],
		'paged' => $paged,
	);
} else {
	$cur_cat_id = get_cat_id( single_cat_title("",false) );
	$args_cat = array(
		'post_type' => 'event',
		'taxonomy' => $cur_cat_id,
		'paged' => $paged,	
	);
}
if($_GET['month']!='' || $_GET['month']!=0){
	$args_cat['monthnum'] = $_GET['month'];
} else {
	$args_cat['monthnum'] = $_GET['month'];
}
if($_GET['yea']!='' || $_GET['yea']!=0){
	$args_cat['year'] = $_GET['yea'];
}else{
	$args_cat['year'] = $_GET['yea'];  
}

$the_query = new WP_Query( $args_cat );

$nvPaged = get_query_var('paged');
$nvPerPage = get_option('posts_per_page');
$nvPosts = $the_query->found_posts;

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
		  <?php the_archive_title(); ?>
		</h1>
		<div class="editor-content">
		<?php if($nvPosts>$nvPerPage) { ?>
		  <h2>Events <?php echo $start; ?> - <?php echo $end;?> of <?php echo $nvPosts; ?></h2>
		<?php }?>
		  <?php wp_pagenavi(array( 'query' => $the_query )); ?>
		  <div class="clear"></div>
		  <div class="select-group">
			<div class="row">
			<input type="hidden" name="archivepagelink" id="archivepagelink" value="<?php echo get_post_type_archive_link("event"); ?>">
			  
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
			  <button class="gotoCalDate-btn event_filter_articles_go">GO</button>
			  <div class="select-wrap">
				<?php
				if($_GET['category']==''){
					$cur_cat_id = get_cat_id( single_cat_title("",false) );
				}else{
					$cur_cat_id = $_GET['category'];
				}
				 $args = array(
						  'show_option_all'    => '',
						  'show_option_none' => __( 'All Categories' ),
						  'option_none_value'  => '-1',
						   'orderby'            => 'ID',
						   'order'              => 'DESC',
						   'show_count'         => 0,
						   'hide_empty'         => 1,
						   'child_of'           => 0,
						   'exclude'            => '',
						   'include'            => '',
						   'echo'               => 1,
						   'selected'           => $cur_cat_id,
						   'hierarchical'       => 0,
						   'name'               => 'cat',
						   'id'                 => '',
						   'class'              => 'postform event_filter_articles',
						   'depth'              => 0,
						   'tab_index'          => 0,
						   'taxonomy'           => 'event_category',
						   'hide_if_empty'      => false,
						   'value_field'	     => 'term_id',
						); ?>
				<?php wp_dropdown_categories( $args ); ?>
			  </div>
			  
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
				<div class="news-img"><a href="<?php the_permalink()?>">
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
					<?php echo the_time( 'M d, Y g:i a' ); ?>
				  </p>
				  <?php the_excerpt();?>
				</div>
			  </div>
			</div>
			<?php endwhile;?>
		  </div>
		  <!--articles_content--> 
		</div>
		<div class="row">
		  <?php wp_pagenavi( array( 'query' => $the_query ) );
		wp_reset_postdata(); ?>
		</div>
		<?php  else: ?>
		<h1>
		  <?php echo of_get_option( 'event_not_found_msg' ); ?>
		</h1>
		<?php endif; ?>
	  </article>
	</div>
  </div>
  <?php 
function get_all_posted_month()
{
$args_my=array(
    'post_type' => 'event',
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
 return $results;
}
?>
  <?php get_footer();?>
