<?php include_once "php/global.php";
if($logged == 1) {
	header("Location: home.php");
	exit();
}
$message = "";
if(isset($_POST["email"])) {
	$email = $_POST["email"];
	$pass = $_POST["pass"];
	$remember = $_POST["remember"];

	//error handeling
	if((!$email)||(!$pass)) {
		$message = "Please, insert both fields.";
	} else {
		//secure data
		$email = mysql_real_escape_string($email);
		$pass = sha1($pass);
		$query = mysql_query("SELECT * FROM members WHERE email='$email' AND password='$pass' LIMIT 1") or die("Could not connect to query");
		$count_query = mysql_num_rows($query);
		if($count_query == 0) {
			$message = "Your email or password is incorrect.";
		} else {
			//start the session
			$_SESSION['pass'] = $pass;
			while($row = mysql_fetch_array($query)) {
				$username = $row['username'];
				$id = $row['id'];
			}

			$_SESSION['username'] = $username;
			$_SESSION['id'] = $id;

			if($remember == "yes") {
				//create the cookies
				setcookie("id_cookie", $id, time()+60*60*24*100, "/");
				setcookie("pass_cookie", $pass, time()+60*60*24*100, "/");
			}

			header("Location: home.php");
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Membership</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="wrapper">
		<h1>Login to Membership website!</h1>
		<p><?php print($message); ?></p>
		<form action="login.php" method="post">
			<input type="text" name="email" placeholder="Email Address"><br>
			<input type="text" name="pass" placeholder="Password"><br>
			<input type="checkbox" name="remember" value="yes" checked>Remember me?<br>
			<input type="submit" value="Login">
		</form>
	</div>
</body>
</html>