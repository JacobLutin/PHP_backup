<?php 
include_once "php/global.php";
if($logged == 1) {
	header("Location: home.php");
	exit();
}
$message = "";
if(isset($_POST["username"])) {
	$username = $_POST["username"];
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$email = $_POST["email"];
	$pass1 = $_POST["pass1"];
	$pass2 = $_POST["pass2"];

	//error handling
	if((!$username) || (!$fname) || (!$lname) || (!$email) || (!$pass1) || (!$pass2)) {
		$message = "Please, fill all of fields.";
	} else {
		if($pass1 != $pass2) {
			$message = "Your password doesn't match.";
		} else {
			//securing date
			$username = preg_replace("#[^0-9a-z]#i", "", $username);
			$fname = preg_replace("#[^0-9a-z]#i", "", $fname);
			$lname = preg_replace("#[^0-9a-z]#i", "", $lname);
			$pass1 = sha1($pass1);

			$email = mysql_real_escape_string($email);

			//check for dublicates
			$user_query = mysql_query("SELECT username FROM members WHERE username ='$username' LIMIT 1") or die("Could not connect to query");
			$count_username = mysql_num_rows($user_query);

			$email_query = mysql_query("SELECT email FROM members WHERE email ='$email' LIMIT 1") or die("Could not connect to query");
			$count_email = mysql_num_rows($email_query);

			if($count_username > 0) {
				$message = "Your username is already in use.";
			} else if($count_email > 0) {
				$message = "Your email is already in use.";
			} else {
				//insert members
				$ip_address = $_SERVER['REMOTE_ADDR'];
				$query = mysql_query("INSERT INTO members(username,firstname,lastname,email,password,ip_address,sign_up_date)VALUES('$username','$fname','$lname','$email','$pass1','$ip_address',now())") or die("Could not insert your data");
				$member_id = mysql_insert_id();
				mkdir("users/$member_id",0755);
				$message = "You have now been registered!";
			}
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register to membership</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="wrapper">
		<h1>Register to my site by filling fields</h1>
		<p><?php print("$message"); ?></p>
		<form action="register.php" method="post">
			<input type="text" name="username" placeholder="Username"><br>
			<input type="text" name="fname" placeholder="Firstname"><br>
			<input type="text" name="lname" placeholder="Lastname"><br>
			<input type="text" name="email" placeholder="Email address"><br>
			<input type="password" name="pass1" placeholder="Password"><br>
			<input type="password" name="pass2" placeholder="Validate password"><br>
			<input type="submit" value="Register!">
		</form>
	</div>
</body>
</html>