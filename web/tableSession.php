<?php
session_start();
if (isset($_POST['reset'])) {
	unset($_SESSION['table']);
	http_response_code(201);
	echo "reset";
} else {
	if (isset($_POST['session'])) {
		$_SESSION['table'] = $_POST['session'];
		http_response_code(201);
	} else {
		http_response_code(503);
	}
	echo "session saved";
}
exit();
