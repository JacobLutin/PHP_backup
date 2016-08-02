<?php
session_start();

require_once('php/global.php');

$user = new User;

$users = $user->get();
?>

<?php require_once('php/header.php') ?>
<div class="container">
	<ul>
	<?php foreach ($users as $user): ?>
		<li><?= $user['firstname'] ?> <?= $user['lastname'] ?> <a href="profile.php?user_id=<?= $user['id'] ?>">-></a></li>
	<?php endforeach ?>
	</ul>
	<?php if ($_SESSION != []): ?>
		<p><?php echo "Current user id is " . $_SESSION['user_id'] ?></p>
	<?php endif ?>
</div>

<?php require_once('php/footer.php') ?>
