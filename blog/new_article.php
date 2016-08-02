<?php

include_once 'php/global.php';

$message = "";

if (isset($_POST['article_name'])) {
	$article_name = $_POST['article_name'];
	$article_text = $_POST['article_text'];

	try {
		$STH = $connection->prepare("INSERT INTO articles(article_name, article_text) values (:name, :body)");

		$STH->bindValue(':name', $article_name);
		$STH->bindValue(':body', $article_text);

		$STH->execute();
	}
	catch(PDOException $e) {
		echo $e->getMessage();
	}

	$article_id = mysql_insert_id();
	$message = "New article was successfully created!";

	// header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="message"><?php print($message) ?></div>
	<form action="new_article.php" method="POST">
		<input type="text" name="article_name" placeholder="Name">
		<input type="text" name="article_text" placeholder="Text">
		<input type="submit">
	</form>
</body>
</html>