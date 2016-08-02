<?php

require_once('sql_constructor.php');
require_once('form_controller.php');

$models = ['active_record_base', 'user', 'message', 'database'];

foreach ($models as $model) {
	$path = 'models/' . $model . '.php';
	require_once($path);
}

require_once('connect.php');

function redirect_to($new_location) {
	header("Location: " . $new_location . ".php");
}

?>
