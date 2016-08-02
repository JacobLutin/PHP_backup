<?php include_once "php/global.php";
if($logged == 1) {
	header("Location: home.php");
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Membership</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="wrapper">
		<h1>Welcome to membership!</h1>
		<a href="login.php">Login</a> | <a href="register.php">Register</a>
	</div>
</body>
</html>