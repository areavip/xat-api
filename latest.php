<?php 
require_once('_extra/core.php'); 
?>
<!doctype HTML> 
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<title>xat API by Mundosmilies.com</title>
</head>
<body>
	<?php
	$latest = core::loadPage('http://api.mundosmilies.com/latest.php');
	$getJson = json_decode($latest, true);
	if(empty($latest)) {
		echo '<font color=red>[1] Something is wrong please check if it\'s working..</font>';
	} else if(is_null($getJson)) {
		echo '<font color=red>[2] Something is wrong please check if it\'s working..</font>';
	} else {
		echo '<strong>Power ID</strong>: ' . $getJson['id'] . '<br>';
		echo '<strong>Power name</strong>: ' . $getJson['name'] . '<br>';
		echo '<strong>Price</strong>: ' . $getJson['price'] . '<br>';
		echo '<strong>Status</strong>: ' . $getJson['status'] . '<br>';
		/* Note: &#10004; == Yes, &#10006; == No */
		echo '<strong>Allpowers</strong>: ' . ($getJson['allpowers'] == false ? '&#10006;' : '&#10004;') . '<br>';
		echo '<strong>Epic</strong>: ' . ($getJson['epic'] == false ? '&#10006;' : '&#10004;') . '<br>';
		echo '<strong>Game</strong>: ' . ($getJson['game'] == false ? '&#10006;' : '&#10004;') . '<br>';
		echo '<strong>Group</strong>: ' . ($getJson['group'] == false ? '&#10006;' : '&#10004;') . '<br>';
	}
	?>
</body>
</html>