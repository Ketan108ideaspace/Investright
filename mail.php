<?php
// Include/require wp-load.php
$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
require_once( $parse_uri[0] . 'wp-load.php' );
header('Access-Control-Allow-Origin: *');

$to = 'ketan@108ideaspace.com';
$subject = 'The subject';
$body = 'The email body content';
$headers = array('Content-Type: text/html; charset=UTF-8');
 
wp_mail( $to, $subject, $body, $headers );
?>