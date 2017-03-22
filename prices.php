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
	$latest = core::loadPage('http://api.mundosmilies.com/prices.php');
	$getJson = json_decode($latest, true);
	if(empty($latest)) {
		echo '<font color=red>[1] Something is wrong please check if it\'s working..</font>';
	} else if(is_null($getJson)) {
		echo '<font color=red>[2] Something is wrong please check if it\'s working..</font>';
	} else {
		foreach($getJson as $i => $v) {
			echo '<strong>Power ID</strong>: ' . $i . '<br>';
			echo '<strong>Power name</strong>: ' . $v['name'] . '<br>';
			echo '<strong>Sub description</strong>: ' . $v['subdesc'] . '<br>';
			echo '<strong>Description</strong>: ' . core::wikiSanatize($v['desc']) . '<br>';
			echo '<strong>Price</strong>: ' . $v['price'] . '<br>';
			echo '<strong>Status</strong>: ' . $v['pStatus'] . '<br>';
			/* Note: &#10004; == Yes, &#10006; == No */
			echo '<strong>Allpowers</strong>: ' . ($v['allpowers'] == false ? '&#10006;' : '&#10004;') . '<br>';
			echo '<strong>Epic</strong>: ' . ($v['epic'] == false ? '&#10006;' : '&#10004;') . '<br>';
			echo '<strong>Game</strong>: ' . ($v['game'] == false ? '&#10006;' : '&#10004;') . '<br>';
			echo '<strong>Group</strong>: ' . ($v['group'] == false ? '&#10006;' : '&#10004;') . '<br>';
			echo '<strong>New power</strong>: ' . ($v['newpower'] == false ? '&#10006;' : '&#10004;') . '<br>';
			if($i != 1) { // will add if the power id isn't 1
				echo '<br><br>';
			}
		}
	}
	?>
</body>
</html>