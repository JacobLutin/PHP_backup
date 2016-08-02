<?php include_once "php/global.php";
if($logged == 0){
	echo "You need to be logged in to see your profile";
	exit();
}

if(isset($_GET['id'])){
	$id = $_GET['id'];
	$id = preg_replace("#[^0-9]#", "", $id);
} else {
	$id = $_SESSION['id'];
}

//collect member information
$query = mysql_query("SELECT * FROM members WHERE id='$id' LIMIT 1") or die("Could not collect member information");
$count_mem = mysql_num_rows($query);
if($count_mem == 0) {
	echo "User does not exist";
	exit();
}
while($row = mysql_fetch_array($count_mem)) {
	echo "counting...";
	$username = $row['username'];
	$fname = $row['fname'];
	$lname = $row['lname'];
	$email = $row['email'];
	$profile_id = $row['id'];

	if($id == $profile_id) {
		$owner = true;
	} else {
		$owner = false;
	}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php $message = "$fname $lname"; print($message); ?>'profile</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="wrapper">
		<h1><?php print("$username"); ?></h1>

		<?php
		if($owner == true) {
		?>
			<a href="#">edit profile</a><br>
			<a href="#">account settings</a><br>
		<?php
		} else {
		?>
			<a href="#">send message</a><br>
			<a href="#">add friend</a><br>
		<?php
		}
		?>
	</div>
</body>
</html>