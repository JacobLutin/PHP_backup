<?php

$host = 'localhost';
$db_name = 'blog_db';
$user = 'root';
$pass = 'root';

try {
	$connection = new PDO("mysql:host=$host;dbname=$db_name", $user, $pass);

	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	echo $e->getMessage();
}

include_once 'user.php';

$sql = 'SELECT * FROM users WHERE id = 1';

$result = $connection->query($sql);

$row = $result->fetch(PDO::FETCH_ASSOC);

$user = new User();
$user->id = $row['id'];
$user->name = $row['name'];
$user->email = $row['email'];
$user->password = $row['password'];

print_r($user);

?>