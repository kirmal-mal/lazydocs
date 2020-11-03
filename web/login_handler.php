<?php
session_start();
$_SESSION['errors'] = array();
require_once "Dao.php";

$_SESSION['isValid']['email'] = true;
if (isset($_POST['email'])) {
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errors'][] = "Invalid email.";
        $_SESSION['isValid']['email'] = false;
    }
} else {
    $_SESSION['errors'][] = "No email provided in request";
    $_SESSION['isValid']['email'] = false;
}
$_SESSION['repopulate']['email'] = $_POST['email'];

$_SESSION['isValid']['passw'] = true;
if (isset($_POST['passw'])) {
    if (!(strlen($_POST['passw']) > 0)) {
        $_SESSION['errors'][] = "Password is empty.";
        $_SESSION['isValid']['passw'] = false;
    }
} else {
    $_SESSION['errors'][] = "No password provided in request";
    $_SESSION['isValid']['passw'] = false;
}

if (count($_SESSION['errors'])) {
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}

$dao = new Dao();
$res = $dao->verifyUser($_POST['email'], $_POST['passw']);
if ($res) {
    $_SESSION['auth'] = true;
    $_SESSION['userId'] = $res['id'];
    $_SESSION['username'] = $res['username'];
    header("Location: /workspace.php");
    exit();
} else {
    $_SESSION['errors'][] = "Combination of email and password is wrong.";
    $_SESSION['auth'] = false;
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}
