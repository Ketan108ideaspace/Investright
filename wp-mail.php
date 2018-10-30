<?php
$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
require_once( $parse_uri[0] . 'wp-load.php' );
header('Access-Control-Allow-Origin: *');
header("Content-Type: text/html");
// Multiple recipients
$to = 'ketan@108ideaspace.com, communications@bcsc.bc.ca'; // note the comma
// Subject
$subject = 'New Comment recvice from Investright Website';

$nvMsg = $_POST["txtcommentid"];
//$nvMsg = "This is the testing mail by developer.";
// Message
$message = '<html>
<head>
  <title>New Comment</title>
</head>
<body>
  <p><strong>Here is user new comment:</strong></p>
  <table>
    <tr>
      <p>'.$nvMsg.'</p>
    </tr>
  </table>
</body>
</html>';

// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

// Additional headers
$headers[] = 'From: New Comment <noreply@bcsc.bc.ca>';

// Mail it
mail($to, $subject, $message, implode("\r\n", $headers));
echo "Send";
?>