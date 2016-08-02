<?php 

include_once 'php/global.php';

$message = '';
$table = 'comments';

if(isset($_POST['name'])) {

	$name = $_POST['name'];
	$text = $_POST['text'];
	$article_id = $_POST['article_id'];

	try {
		$STH = $connection->prepare("INSERT INTO comments(name, text, article_id) values(:name, :text, :id)");

		$STH->bindValue(':name', $name);
		$STH->bindValue(':text', $text);
		$STH->bindValue(':id', $article_id);

		$STH->execute();
	} catch(PDOException $e) {
		echo $e->getMessage();
	}

	$message = "New comment was successfully created!";

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>New comment</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h2>Write new comment</h2>
	<p class="message"><?php echo $message; ?></p>
	<form action="new_comment.php" method="POST">
		<input type="text" name="name" placeholder="Name">
		<input type="text" name="text" placeholder="Text">
		<input type="number" name="article_id" placeholder="Article id">
		<input type="submit">
	</form>
</body>
</html>