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
	  <input type="text" name="value" placeholder="E.g: gold"><br>
	  <input type="submit" name="submit" value="Submit">
	</form>
	<br>
	<?php
	if(isset($_POST['submit']) && $_POST['submit'] == 'Submit') {
		if(empty($_POST['value'])) {
			echo '<font color=red>Complete all fields required.</font>';
		} else {
			$getResult = core::getPage('listsmilies', $_POST['value']);
			if(!$getResult) {
				echo '<font color=red>Something is wrong please check if it\'s working..</font>';
			} else {
				if($getResult['status'] == 'OK') {
					if(strpos($getResult['message'], 'maybe') !== false) {
						preg_match('/maybe\((.*?)\)/', $getResult['message'], $getName);
						$finalMsg = str_replace("maybe({$getName[1]}):", '', $getResult['message']);
						echo 'Did you mean <strong>' . $getName[1] . '</strong> smilies are: ' . $finalMsg . '<br>';
					} else {
						echo '<strong>Smilies:</strong> ' . $getResult['message'] . '<br>';
					}
				} else {
					echo 'Error: ' . $getResult['message'];
				}
			}
		}
	}
	?>
</body>
</html>