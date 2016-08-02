<?php

$location = "$_SERVER[REQUEST_URI]";

if (isset($_SESSION['user_id'])) {
	$is_user_logged_in = 1;

	$logged_in_user = new User();
	$logged_in_user->get_by_id(($_SESSION['user_id']));
} else {
	$is_user_logged_in = 0;
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<a href="#" class="navbar-brand">Social Network</a>
		</div>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="index.php">Home</a></li>
			<?php if (!$is_user_logged_in): ?>
				<li><a href="signup.php">Sign up</a></li>
				<li><a href="login.php">Log in</a></li>
			<?php else: ?>
				<li><a href="friend_list.php">Friends</a></li>
				<li><a href="messages.php">New messages <span class="badge">
					<?= $logged_in_user->unread_messages() ?>
				</span></a></li>
				<li><a href="logout.php">Log out</a></li>
			<?php endif; ?>
		</ul>
	</div>
</nav>
