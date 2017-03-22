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
	  <strong>Power name:</strong><br>
	  <input type="text" name="value" placeholder="E.g: purple"><br>
	  <input type="submit" name="submit" value="Submit">
	</form>
	<br>
	<?php
	if(isset($_POST['submit']) && $_POST['submit'] == 'Submit') {
		if(empty($_POST['value'])) {
			echo '<font color=red>Complete all fields required.</font>';
		} else {
			$getResult = core::getPage('powerinfo', $_POST['value']);
			if(!$getResult) {
				echo '<font color=red>Something is wrong please check if it\'s working..</font>';
			} else {
				if($getResult['status'] == 'OK') {
					echo '<strong>Power ID</strong>: ' . $getResult['id'] . '<br>';
					echo '<strong>Power name</strong>: ' . $getResult['name'] . '<br>';
					echo '<strong>Sub description</strong>: ' . $getResult['subdesc'] . '<br>';
					echo '<strong>Description</strong>: ' . $getResult['desc'] . '<br>';
					echo '<strong>Price</strong>: ' . $getResult['price'] . '<br>';
					echo '<strong>Status</strong>: ' . $getResult['pStatus'] . '<br>';
					/* Note: &#10004; == Yes, &#10006; == No */
					echo '<strong>Allpowers</strong>: ' . ($getResult['allpowers'] == false ? '&#10006;' : '&#10004;') . '<br>';
					echo '<strong>Epic</strong>: ' . ($getResult['epic'] == false ? '&#10006;' : '&#10004;') . '<br>';
					echo '<strong>Game</strong>: ' . ($getResult['game'] == false ? '&#10006;' : '&#10004;') . '<br>';
					echo '<strong>Group</strong>: ' . ($getResult['group'] == false ? '&#10006;' : '&#10004;') . '<br>';
					echo '<strong>New power</strong>: ' . ($getResult['newpower'] == false ? '&#10006;' : '&#10004;');
				} else {
					echo 'Error: ' . $getResult['message'];
				}
			}
		}
	}
	?>
</body>
</html>