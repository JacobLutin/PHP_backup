<?php
session_start();

require_once('php/global.php');

if ($_SESSION != []) {
	redirect_to('index');
}

?>

<?php require_once('php/header.php') ?>
<div class="container">
	<h1>Log in</h1>

	<?php

	if ($_POST) {

		$data = $_POST;
		$_POST['id']
		unset($data['submit']);

		$user = new User;
		if ($user->login($data)){
			// redirect_to('login');
		}

	} else {

		// $data = [
		// 	'labels' => ['Email', 'Password'],
		// 	'columns' => ['email', 'pass']
		// ];

		$data = [
			'Email' => 'email',
			'Password' => 'pass'
		];

		form_for($data);
	}



	?>

</div>

<?php require_once('php/footer.php') ?>
