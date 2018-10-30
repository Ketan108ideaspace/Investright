<?php
// Include/require wp-load.php
$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
require_once( $parse_uri[0] . 'wp-load.php' );
header('Access-Control-Allow-Origin: *');

global $wpdb,$page;
$nvWpQry = new WP_Query(array('s'=>$_POST['txtglossary'], 'post_status' => 'publish', 'order'=>'DESC', 'posts_per_page'=> -1, 'post_type'=> array('glossary')));    
$nvGlrData = "";
if($nvWpQry->found_posts!=0 && $_POST['txtglossary']!="") {
	if ($nvWpQry->have_posts()) {
		$nvGlrData .= '<table>';
		while ($nvWpQry->have_posts()) : $nvWpQry->the_post();
			$nvGlrData .= '<tr><td class="textbox gls-dt">'.ucfirst(get_the_title()).'</td><td class="textbox1 gls-dd">'.get_the_content().'</td></tr>';
		endwhile;
		$nvGlrData .= '</table>';
	}
} else {
	$nvGlrData .= "No result found.";
}
echo $nvGlrData;
exit();
?>