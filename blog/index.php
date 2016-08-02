<?php

include_once 'php/global.php';

$sql = "SELECT * FROM articles";

$STH = $connection->query($sql);

// $STH->setFetchMode(PDO::FETCH_ASSOC);

$comments = '';
$comments = $connection->query("SELECT * FROM comments");
$comments->setFetchMode(PDO::FETCH_ASSOC);

function GetComment($article_id) {
	// try {
	return("lol");
		return $connection->query("SELECT * FROM comments WHERE article_id = $article_id");
	// 	$comments->bindValue(':id', $article_id);
	// 	$comments->execute();
	// } 
	// catch(PDOException $e) {
	// 	echo $e->getMessage();
	// 	return "lol";
	// }
}

$my_comment = GetComment(2);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My blog</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<p class="message"><?= $message ?></p>
	<h1>Articles</h1>
	<ul>
		<?php foreach($STH as $article): ?>
			<li><?= $article['article_name'] . ": " . $article['article_text'] ?></li><br>
			<ul>
				<?#php getComment($article['id']); ?>
				<?#php foreach($comments as $comment): ?>
					<!-- <li><?#= $comment['name'] . ": " . $comment['text'] ?></li><br> -->
				<?#php endforeach; ?>
			</ul>
		<?php endforeach; ?>
	</ul>
	<a href="new_article.php">Create new article</a> |
	<a href="new_comment.php">Create new comment</a>

	<div>
	<?= $comments ?>
	</div>
</body>
</html>