<?php
// Include/require wp-load.php
$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
require_once( $parse_uri[0] . 'wp-load.php' );
header('Access-Control-Allow-Origin: *');

global $wpdb;
$nvtxtanswer = $_POST['txtanswer'];

$insert = $wpdb->insert($wpdb->prefix."quiz_result", array(
	'quiz_results' => addslashes($nvtxtanswer),
));

$nvLastId = $wpdb->insert_id;

if($nvLastId!="") {
	echo "success";
} else {
	echo "error";
}

exit();
?>