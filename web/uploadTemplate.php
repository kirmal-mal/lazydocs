<?php
session_start();
require_once "authorize.php";

$target_dir = "./templates/";
$file_name = $_SESSION['username'] . "_template.docx";//$_FILES["fileToUpload"]["name"];
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
echo $target_file;
$tmp = explode(".", $_FILES["fileToUpload"]["name"]);
$extension 	= end($tmp);
$type = $_FILES["fileToUpload"]["type"];
if ( ! ( $extension == "docx") ) {
	die('Please provide another file type .');
}

$uploadOk = 1;
move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_file);
$_SESSION['template'] = $target_file;
header("Location: {$_SERVER['HTTP_REFERER']}");
exit();

