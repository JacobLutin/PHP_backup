<?php
session_start();
require_once('php/global.php');
?>

<?php require_once('php/header.php') ?>
<?php 

$message = new Message;
$messages = $message->get(['send_to_id' => $user->id]);

$users = [];

foreach ($messages as $message) {
	$user = new User;
	$user->get_by_id($message['user_id']);

	if (!in_array($user, $users))
		array_push($users, $user);	
}
?>
<div class="container">
	<?php foreach($users as $user): ?>
		<a href="#"><div class="thumbnail">
			<?= $user->firstname . " " . $user->lastname ?>
			<?php $message = new Message; ?>
			<?php $messages = $message->get(['send_to_id' => $user->id])?>
			<?php foreach($messages as $message): ?>
			<div class="thumbnail">
				<?= $messages ?>
			</div>
			<?php endforeach; ?>
 		</div></a>
	<?php endforeach; ?>
</div>

<?php require_once('php/footer.php') ?>
