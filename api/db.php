<?php
//PDO
function dbStart($address, $login, $password)
{
	try {
		$db = new PDO($address, $login, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	} catch (PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}

	return $db;
}

function prepareDbStatement(
	$db,
	&$insertplanestmt,
	&$selectAllplanestmt,
	&$selectplaneViaIdStmt,
	&$updateplanestmt,
	&$deleteplanestmt
) {
	try {
		$insertplanestmt = $db->prepare("INSERT INTO planes(model, manufacturer, manufacturedAt, trips) 
                                               VALUES (:model, :manufacturer, :manufacturedAt, :trips)");

		$selectAllplanestmt = $db->prepare('SELECT *
											      FROM planes											      
												  ORDER BY planeid ASC');

		$selectplaneViaIdStmt = $db->prepare('SELECT *
													FROM planes
													WHERE planeid = :planeid');

		$updateplanestmt = $db->prepare('UPDATE planes
                 							   SET model = :model,
												trips = :trips												
                 							   WHERE planeid = :planeid');



		$deleteplanestmt = $db->prepare('DELETE 
							                   FROM planes
							                   WHERE planeid = :planeid');
	} catch (PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}
}

$address = 'mysql:host=localhost;dbname=planes;charset=utf8';
$login = "root";
$password = "";
$db = null;
$db = dbStart(
	$address,
	$login,
	$password
);

$insertplanestmt = null;
$selectAllplanestmt = null;
$selectplaneViaIdStmt = null;
$updateplanestmt = null;

$deleteplanestmt = null;




prepareDbStatement(
	$db,
	$insertplanestmt,
	$selectAllplanestmt,
	$selectplaneViaIdStmt,
	$updateplanestmt,

	$deleteplanestmt
);
