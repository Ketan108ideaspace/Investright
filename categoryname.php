<?php
require_once("../../../wp-load.php");
$nvPostId = $_POST["cateid"];
$category = get_category($nvPostId);
if($category->slug!="") {
	echo $category->slug;
} else {
	echo "investor-news";
}
?>