<?php
/*
* Template Name: Investor News
*/
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
	if($_GET['category']=='0' && $_GET['category']!=""){
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
if($_GET['yea']!='' || $_GET['yea']!=0){
	$args_cat['year'] = $_GET['yea'];
} else if($_GET['yea']=='' || $_GET['yea']==0) {
	$args_cat['year'] = date('Y');
} else {
}

//wp_reset_query();
$the_query = new WP_Query( $args_cat );
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
	  <?php //get_sidebar();?>
	  <article class="content-wrap fullwidth">
		<div class="breadcrumb"> <strong>You are here:</strong>
		  <?php if(function_exists('bcn_display'))
		{
			bcn_display();
		}?>
		</div>
		<h1 class="page-title">
			Blog<?php //echo get_cat_name( $cur_cat_id ); ?>
		</h1>
		<div class="editor-content archive-wrap">
		  <h2 style="display:none">Articles <?php echo $start; ?> - <?php echo $end;?> of <?php echo $nvPosts; ?></h2>
		  <?php //wp_pagenavi( array( 'query' => $the_query ) ); ?>
		  <div class="clear"></div>
          <div class="select-group">
			<div class="row">
			<div class="sg-label" style="display:none">Filter by date</div>
			<?php 
				global $wp;
				$current_url = home_url(add_query_arg(array(),$wp->request));
			?>
			<!--input type="hidden" name="templatelink" id="templatelink" value="<?php echo $template_url; ?>">
			<input type="hidden" name="pagelink" id="pagelink" value="<?php echo $site_url; ?>"-->
			<input type="hidden" name="currentpagelink" id="currentpagelink" value="<?php echo $current_url; ?>">
			  <?php $nvGetCurrentYear = date('Y'); ?>
			  <div class="select-wrap">
				<select id="year" class="year">
				  <option value="<?php echo $nvGetCurrentYear; ?>">Year</option>
				  <?php
					//wp_get_archives( 'type=yearly&format=option&show_post_count=0' ); 
					$res = get_all_posted_month();
					foreach(array_unique($res['year']) as $yea){
						if($_GET['yea']==$yea) {
							$nvSelYear = ' selected="selected"';
						} else if($yea==$nvGetCurrentYear) {
							$nvSelYear = ' selected="selected"';
						} else {
							$nvSelYear = "";
						}
					  ?>
					 <option value="<?php echo $yea; ?>"<?php echo $nvSelYear; ?>><?php echo $yea; ?></option> 
				  <?php } ?>
				</select>
			  </div>
			  <button style="display:none" class="gotoCalDate-btn filter_articles_go">GO</button>
				<div class="sg-label" style="display:none">Filter by category</div>
				<div class="select-wrap">
				<?php
					$args1 = array(
						'orderby' => 'id',
						'hide_empty'=> 0,
						'child_of' => 0,
						'exclude' => '',
						'include' => '',
						'orderby' => 'cat',
					);
					
					$categories = get_categories($args1);
					echo '<select name="cat" id="cat" class="postform"><option value="0">All Categories</option>';
					foreach ($categories as $cat) {
						$nvSel = "";
						if($cur_cat_id==$cat->term_id) { $nvSel = 'selected'; }
						?>
						<option value="<?php echo $cat->term_id; ?>" data-cat-slug="<?php echo $cat->slug; ?>" <?php echo $nvSel; ?>><?php echo $cat->name; ?></option>
					<?php } ?>
					</select>
				</div>
				<button class="gotoCalDate-btn filter_articles_cate_go">GO</button>
			</div>
		  </div>
		  <div id="articles_content">
			<?php
				if ($the_query->have_posts()) {
					$nvNo = 0;
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
								echo wp_trim_words( preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', get_the_content()), 15, '...' );
							?>
						</div>
					</div>
				</div>
				<?php
					$nvNo++;
					endwhile;
				?>
		  </div>
		  <!--articles_content--> 
		</div>
			<?php
				if($nvNo>5) { ?>
					<a class="newsloadmore" href="javascript:void(null)">Load More</a>
				<?php }
			} else {
				echo of_get_option( 'category_not_found_msg' );
			}
		?>
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
<script>
	var txtpageno = 1;
	var isWorking = 0;
	$(function(){
		$(window).scroll(function(event){
			if(isWorking==0)  
			{
				var nvNewslm = isVisible($(".newsloadmore"));
				if(nvNewslm==true) {
					isWorking = 1;
					var txtcat = $("#cat").val();
					var txtyear = $("#year").val();
					txtpageno++;
					var params = { action : 'investor_news_action', txtcat:txtcat, txtyear:txtyear, txtpageno:txtpageno };
					jQuery.ajax({
						method: 'POST',
						// async: false,
						dataType: 'html',
						url: ajax_news_url,
						data: params,
						success: function(response) {
							//alert(response);
							if(response!=""){
								jQuery("#articles_content").append(response);
								setTimeout(function(){
									equalheight('.news-wrap>.row');
									isWorking = 0;
								}, 1000);
							} else{
								jQuery(".newsloadmore").html("");
							}
						}
					});
					return false;
				}
			}
			return false;
		});
	});
</script>
<?php get_footer();?>
