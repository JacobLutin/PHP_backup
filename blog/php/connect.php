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

?>