<?php
session_start();

session_destroy();

if(isset($_COOKIE['id_cookie'])) {
	setcookie('id_cookie', '', time()-50000, '/');
	setcookie('pass_cookie', '', time()-50000, '/');
}

if(!array_key_exists( 'username', $_SESSION )) {
	echo("Could not log out, please try again");
	exit();
} else {
	header("Location: index.php");
}
?>