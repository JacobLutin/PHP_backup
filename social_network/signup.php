<?php
session_start();
require_once('php/global.php');
?>

<?php require_once('php/header.php') ?>
<div class="container">

<?php

if (isset($_POST['submit'])) {

	$data = $_POST;
	unset($data['submit']);

	$user = new User($data);

	if ($user->save()) {
		echo "Success!";
	}

} else {

	// $data = ["First Name", "Last Name", "Email", "Password"];

	$data = [
		'First Name' => 'firstname',
		'Last Name' => 'lastname',
		'Email' => 'email',
		'Password' => 'pass',
	];

	form_for($data);
}

?>

</div>

<?php require_once('php/footer.php') ?>
