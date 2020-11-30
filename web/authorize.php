<?php
if (!isset($_SESSION['auth'])) {
	header("Location: /login.php");
	$_SESSION['errors'][] = "You have to be authorised.";
	exit();
} else if (!$_SESSION['auth']) {
	header("Location: /login.php");
	$_SESSION['errors'][] = "You have to be authorised.";
	exit();
}
