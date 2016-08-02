<?php include_once "php/global.php";
if($logged == 0) {
	header("Location: index.php");
	exit();
}
if ($logged == 1) {
	$message = "Your name is $name";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Membership Home</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="wrapper">
		<h1>Welcome to membership homepage</h1>
		<p><?php print($message); ?></p>
		<a href="logout.php">Click here to log out</a>
	</div>
</body>
</html>