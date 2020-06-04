<?php
require_once('db.php');

$id = $_GET["planeid"];
$model = $_POST["model"];
$trips = $_POST["trips"];


//insert into database
try {
	$updateplanestmt->execute(array(
		"model" => "$model",
		"trips" => "$trips",
		"planeid" => "$id"
	));
} catch (PDOException $e) {
	$errorMessage = $e->getMessage();
	$data = array(
		"updateStatus" => false,
		"errorMessage" => $errorMessage
	);
	echo json_encode($data);
	exit;
}

$data = array(
	"updateStatus" => true,
	"model" => $model,
	"trips" => $trips,

);

echo json_encode($data);
