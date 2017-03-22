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
	$latest = core::loadPage('http://api.mundosmilies.com/promoted.php');
	$getJson = json_decode($latest, true);
	if(empty($latest)) {
		echo '<font color=red>[1] Something is wrong please check if it\'s working..</font>';
	} else if(is_null($getJson)) {
		echo '<font color=red>[2] Something is wrong please check if it\'s working..</font>';
	} else {
		foreach($getJson as $lang => $chats) {
			echo '<h1>' . $lang . ':</h1>';
			foreach($chats as $cname => $v) {
				echo '<strong>Chat id</strong>: ' . $v['chatid'] . '<br>';
				echo '<strong>Chat name</strong>: ' . $cname . '<br>';
				echo '<strong>Remaining</strong>: ' . $v['remaining'] . '<br><br>';
			}
		}
	}
	?>
</body>
</html>