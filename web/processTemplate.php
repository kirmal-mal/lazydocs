<?php
session_start();
require_once "authorize.php";
require __DIR__ . '/../vendor/autoload.php';
$replace = json_decode($_POST['replace'], true);
$response = new \stdClass();
if (!isset($_SESSION['template'])) {
	$response->isSuccess = false;
	$response->message = "<div class='bad'> No template. Please upload your template</div>";
	echo json_encode($response, true);
	exit();
}
$templateName = $_SESSION['template'];
$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($templateName);
foreach ($replace as $key => $value) {
	if ($key !== 'filename') {
		$templateProcessor->setValue($key, $value);
	}
}
$basename = $replace['filename'] . ".docx";
$filename = "./send/" . $basename;
$templateProcessor->saveAs($filename);

$response->isSuccess = true;
$response->filename = $basename;
$response->message = "success";
echo json_encode($response, true);
