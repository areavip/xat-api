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
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	  <strong>Chat name:</strong><br>
	  <input type="text" name="value" placeholder="E.g: xat_test"><br>
	  <input type="submit" name="submit" value="Submit">
	</form>
	<br>
	<?php
	if(isset($_POST['submit']) && $_POST['submit'] == 'Submit') {
		if(empty($_POST['value'])) {
			echo '<font color=red>Complete all fields required.</font>';
		} else {
			$getResult = core::getPage('chatinfo', $_POST['value']);
			if(!$getResult) {
				echo '<font color=red>Something is wrong please check if it\'s working..</font>';
			} else {
				if($getResult['status'] == 'OK') {
					echo '<strong>Chat ID</strong>: ' . $getResult['chatid'] . '<br>';
					echo '<strong>Chat name</strong>: ' . $getResult['name'] . '<br>';
					echo '<strong>Description</strong>: ' . $getResult['desc'] . '<br>';
					echo '<strong>Chat type</strong>: ' . $getResult['chatType'] . '<br>';
					echo '<strong>Status</strong>: ' . $getResult['chatStatus'] . '<br>';
					echo '<strong>Background</strong>: ' . $getResult['background'] . '<br>';
					echo '<strong>Tabbed Chat</strong>: ' . $getResult['tabbedChatName'] . ' [' . $getResult['tabbedChatId'] . ']<br>';
					echo '<strong>Default language</strong>: ' . $getResult['language'] . '<br>';
					echo '<strong>Radio IP/port</strong>: ' . $getResult['radio'] . '<br>';
					echo '<strong>Buttons color</strong>: <span color="' . $getResult['buttons'] . '">' . $getResult['buttons'] . '</span><br>';
					echo '<strong>Bot ID</strong>: ' . $getResult['botid'] . '<br>';
					echo '<strong>Flags</strong>: ' . $getResult['flags'] . '<br>';
					echo '<strong>Connection IP</strong>: ' . $getResult['connIP'] . '<br>';
					echo '<strong>Connection port</strong>: ' . $getResult['connPort'];
				} else {
					echo 'Error: ' . $getResult['message'];
				}
			}
		}
	}
	?>
</body>
</html>