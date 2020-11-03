<?php
session_start();
$_SESSION['errors'] = array();
$_SESSION['repopulate'] = array();
require_once "Dao.php";
$dao = new Dao();
$_SESSION['isValid']['name'] = true;
if (isset($_POST['name'])) {
    if (!preg_match('/^[a-zA-Z][a-zA-Z0-9]{4,}$/', $_POST['name'])) {
        $_SESSION['errors'][] = "Username should be minimum 5 characters long. Should only contain letters and numbers. It should start with the letter.";
        $_SESSION['isValid']['name'] = false;
    }
} else {
    $_SESSION['errors'][] = "No username provided in request";
    $_SESSION['isValid']['name'] = false;
}
$_SESSION['repopulate']['name'] = $_POST['name'];

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
if (isset($_POST['passw']) && isset($_POST['confPassw'])) {
    if (strlen($_POST['passw']) > 0) {
        if (!($_POST['passw'] == $_POST['confPassw'])) {
            $_SESSION['errors'][] = "Password and confirmation do not match.";
            $_SESSION['isValid']['passw'] = false;
        }
    } else {
        $_SESSION['errors'][] = "Password is empty.";
        $_SESSION['isValid']['passw'] = false;
    }
} else {
    $_SESSION['errors'][] = "No password or password confirmation provided in request";
    $_SESSION['isValid']['passw'] = false;
}

if (count($_SESSION['errors'])) {
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}

$res = $dao->addUser($_POST['name'], $_POST['email'], $_POST['passw']);
if ($res) {
    $_SESSION['auth'] = true;
    $_SESSION['username'] = $_POST['name'];
    $_SESSION['id'] = $res;
    $_SESSION['repopulate'] = array();
    header("Location: /workspace.php");
} else {
    $_SESSION['auth'] = false;
    header("Location: {$_SERVER['HTTP_REFERER']}");
}
exit();