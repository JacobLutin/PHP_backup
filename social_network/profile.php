<?php
session_start();
require_once('php/global.php');

$alert_message = '';
$alert_status = '';

$user = new User;

$current_user = new User;
$current_user->get_by_id($_SESSION['user_id']);

$is_current_user = false;

if (isset($_GET['user_id'])) {

	$user->get_by_id($_GET['user_id']);



	if ($user->id == $current_user->id) {
		$link = "profile.php?user_id=" . $_GET['user_id'] . "?" . "friend=true";
		$is_current_user = true;
	}

	if (isset($_POST['add_friend'])) {
		if ($current_user->add_friend($user->id)) {
			$alert_status = 'success';
			$alert_message = "Friend added successfully!";
		} else {
			$alert_status = 'danger';
			$alert_message = 'Could not add friend :(';
		}
	}

	if (isset($_POST['text']) and $_POST['text']) {
		$data = $_POST;
		unset($data['submit']);
		$data['user_id'] = $current_user->id;
		$data['send_to_id'] = $user->id;
		$message = new Message($data);
		if ($message->save()) {
			$alert_status = 'success';
			$alert_message = "Message is sent successfully!";
		} else {
			$alert_status = 'danger';
			$alert_message = "Could not send a message :(";
		}
	}


} else {
	$user = $current_user;
}

$data = [
	'Text' => 'text'
];


?>

<?php require_once('php/header.php') ?>
<div class="container">
	<p><?= $user->firstname . ' ' . $user->lastname ?></p>
	<?php if (!$is_current_user): ?>
	<div class="form" >
		<form action="<?= $location ?>" method="POST">
			<input type="submit" name="add_friend" value="Add friend" class="btn btn-success">
		</form>
	</div>
	<?php form_for($data); ?>
	<div class="alert alert-<?= $alert_status?>"><?= $alert_message?></div>
	<?php endif ?>

</div>

<?php require_once('php/footer.php') ?>
