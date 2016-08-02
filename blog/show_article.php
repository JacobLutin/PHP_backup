<?php 

include_once 'php/global.php';
include_once 'php/article.php';


$sql = 'SELECT * FROM articles WHERE id = 1';

$result = $connection->query($sql);

$row = $result->fetch(PDO::FETCH_ASSOC);

$article = new Article();

$article->id = $row['id'];
$article->name = $row['article_name'];
$article->text = $row['article_text'];

print_r($article);

?>