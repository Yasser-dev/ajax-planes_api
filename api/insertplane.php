<?php
ini_set("date.timezone", "Asia/Kuala_Lumpur");

require_once('db.php');

$model = $_POST["model"];
$manufacturer = $_POST["manufacturer"];
$manufacturedAt = $_POST["manufacturedAt"];
$trips = $_POST["trips"];

//insert into table planes
try {
	$insertplanestmt->execute(array(
		"model" => "$model",
		"manufacturer" => "$manufacturer",
		"manufacturedAt" => "$manufacturedAt",
		"trips" => "$trips"
	));
} catch (PDOException $e) {
	$errorMessage = $e->getMessage();
	$data = array(
		"insertStatus" => false,
		"errorMessage" => $errorMessage
	);
	echo json_encode($data);
	exit;
}

$data = array(
	"insertStatus" => true,
	"model" => "$model",
	"manufacturer" => "$manufacturer",
	"manufacturedAt" => "$manufacturedAt",
	"trips" => "$trips"
);

echo json_encode($data);
