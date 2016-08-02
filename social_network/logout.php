<?php
session_start();


require ('php/global.php');

$user = new User;
$user->logout();

// print_r($_SESSION);
redirect_to('index');

?>