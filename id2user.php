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
	  <strong>xat User ID:</strong><br>
	  <input type="text" name="value" placeholder="E.g: 70509693"><br>
	  <input type="submit" name="submit" value="Submit">
	</form>
	<br>
	<?php
	if(isset($_POST['submit']) && $_POST['submit'] == 'Submit') {
		if(empty($_POST['value'])) {
			echo '<font color=red>Complete all fields required.</font>';
		} else {
			$getResult = core::getPage('id2user', $_POST['value']);
			if(!$getResult) {
				echo '<font color=red>Something is wrong please check if it\'s working..</font>';
			} else {
				$text = 'Regname of (' . $_POST['value'] . ') is: ';
				$text = $getResult['status'] == 'OK' ? $text : 'Error: ';
				echo $text . $getResult['message'];
			}
		}
	}
	?>
</body>
</html>