<?php
// Include/require wp-load.php
$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
require_once( $parse_uri[0] . 'wp-load.php' );
header('Access-Control-Allow-Origin: *');
header("Content-Type: text/html");
global $wpdb,$page;

$page = (isset($_POST['txtpageno'])) ? $_POST['txtpageno'] : 0;

$args = array(
	'suppress_filters' => true,
	'post_type' => 'post',
	//'posts_per_page' => 6,
	//'cat' => 8,
	'paged' => $page,
);

if($_POST['txtcat']!="" || $_POST['txtcat']!="0"){
	$cur_cat_id = $_POST['txtcat'];
	$args['cat'] = $cur_cat_id;
}

if($_POST['txtyear']!="" && $_POST['txtyear']!="0"){
	$args['year'] = $_POST['txtyear'];
}

$loop = new WP_Query($args);

$out = '';

if ($loop -> have_posts()) {
	while ($loop -> have_posts()) { $loop -> the_post();
		$nvImage = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'medium' );
		$nvImage = $nvImage[0];
		if($nvImage[0]=="") {
			$nvImage = esc_url(get_template_directory_uri())."/images/no-image.jpg";
		}
		
		$out .= '<div class="news-wrap">
				<div class="row">
					<div class="news-img"><a href="'.get_the_permalink().'" title="'.get_the_title().'">
						<img src="'.$nvImage.'" alt="'.get_the_title().'"></a>
					</div>
					<div class="news-content">
						<h3><a href="'.get_the_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></h3>
						<p class="date">'.get_the_time( 'M d, Y g:i a' ).' | Author: '.get_the_author().'</p>'.wp_trim_words( preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', get_the_content()), 15, '...' ).'
					</div>
				</div>
			</div>';
		
	};
} else {
	$out = "";
}
wp_reset_postdata();
die($out);
exit();
?>