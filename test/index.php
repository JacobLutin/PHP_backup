<?php include_once "connect.php";

$query = mysql_query("SELECT * FROM my_table") or die("Could not select table from database");

$message = "";

$message = mysql_query("SELECT DISTINCT password FROM my_table");

if(isset($_GET["username"])) {
	$username = $_GET["username"];
	$password = $_GET["password"];

	$username = preg_replace("#[^0-9a-z]#i", "", $username);
	$password = preg_replace("#[^0-9a-z]#i", "", $password);

	$count = mysql_num_rows($query);
	$id = $count + 1;

	$query = mysql_query("INSERT INTO my_table(id, username, password)VALUES($id, $username, $password)") or die("Could not insert your data {$id} {$username} {$password}");
}

// $username = $_GET["username"];
// $password = $_GET["password"];





?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Test page</title>
</head>
<body>
	<form action="" method="get">
		<input type="text" name="username">
		<input type="text" name="password">
		<input type="submit">
	</form>
	<h1><?php echo $username . " " . $password ?></h1>
	<p><?php echo $message ?></p>
</body>
</html>