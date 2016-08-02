<?php
session_start();
include_once "connect.php";
$name = "";
if(isset($_SESSION['username'])) {
	$session_username = $_SESSION['username'];
	$session_pass = $_SESSION['pass'];
	$session_id = $_SESSION['id'];
	$name = $_SESSION['username'];

	//check if members exist
	$query = mysql_query("SELECT * FROM members WHERE id='$session_id' AND password='$session_pass' LIMIT 1") or die("Could not check member");
	$count_count = mysql_num_rows($query);
	if($count_count > 0) {
		//logged in stuff here
		$logged = 1;
	} else {
		header("Location: logout.php");
		exit();
	}
} else if(isset($_COOKIE['id_cookie'])) {
	$session_id = $_COOKIE['id_cookie'];
	$session_pass = $_COOKIE['pass_cookie'];

	//check if members exist
	$query = mysql_query("SELECT * FROM members WHERE id='$session_id' AND password='$session_pass' LIMIT 1") or die("Could not check member");
	$count_count = mysql_num_rows($query);
	if($count_count > 0) {
		while($row = mysql_fetch_array($query)) {
			$session_username = $row['username'];
		}
		//create session
		$_SESSION['username'] = $session_username;
		$_SESSION['pass'] = $session_pass;
		$_SESSION['id'] = $session_id;

		//logged in stuff here
		$logged = 1;
	} else {
		header("Location: logout.php");
		exit();
	}
} else {
	//if the user isn't logged
	$logged = 0;
}
?>