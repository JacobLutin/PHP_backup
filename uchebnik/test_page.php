<?php

	$message = "";

	$message = $_POST['message'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>test page</title>
</head>
<body>

	<form action="test_page.php" method="POST">
		<input type="text" name="message" placeholder="type a message...">
		<input type="submit">
	</form>
	<h1><?php print($message) ?></h1>
</body>
</html>