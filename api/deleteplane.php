<?php
require_once('db.php');
$id = $_GET["planeid"];

try {
	$deleteplanestmt->execute(array(
		"planeid" => "$id"
	));

	echo json_encode(array(
		"deleteStatus" => true
	));

	exit;
} catch (PDOException $e) {
	$error = $e->getMessage();
	echo json_encode(array(
		"deleteStatus" => false,
		"error" => $error
	));

	exit;
}
