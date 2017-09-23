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
	  <strong>Smiley combination:</strong><br>
	  <input type="text" name="value" placeholder="E.g: cool#flip#y"><br>
	  <input type="submit" name="submit" value="Submit">
	</form>
	<br>
	<?php
	if(isset($_POST['submit']) && $_POST['submit'] == 'Submit') {
		if(empty($_POST['value'])) {
			echo '<font color=red>Complete all fields required.</font>';
		} else {
			$getResult = core::getPage('findpowers', $_POST['value']);
			if(!$getResult) {
				echo '<font color=red>Something is wrong please check if it\'s working..</font>';
			} else {
				if($getResult['status'] == 'OK') {
					echo '<strong>Power/s required:</strong> ' . $getResult['powers'] . '<br>';
				} else {
					echo 'Error: ' . $getResult['message'];
				}
			}
		}
	}
	?>
</body>
</html>