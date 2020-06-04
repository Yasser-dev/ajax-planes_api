<?php
ini_set("date.timezone", "Asia/Kuala_Lumpur");
require_once('db.php');

class Plane
{
   var $planeid;
   var $model;
   var $manufacturer;
   var $trips;
   var $manufacturedAt;
}


function time_elapsed_string($datetime, $full = false)
{

   if ($datetime == '0000-00-00 00:00:00')
      return "none";

   if ($datetime == '0000-00-00')
      return "none";

   $now = new DateTime;
   $ago = new DateTime($datetime);
   $diff = $now->diff($ago);

   $diff->w = floor($diff->d / 7);
   $diff->d -= $diff->w * 7;

   $string = array(
      'y' => 'year',
      'm' => 'month',
      'w' => 'week',
      'd' => 'day',
      'h' => 'hour',
      'i' => 'minute',
      's' => 'second',
   );

   foreach ($string as $k => &$v) {
      if ($diff->$k) {
         $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
      } else {
         unset($string[$k]);
      }
   }

   if (!$full) $string = array_slice($string, 0, 1);
   return $string ? implode(', ', $string) . ' ago' : 'just now';
}

$id = $_GET["planeid"];

try {
   $selectplaneViaIdStmt->execute(array(
      "planeid" => "$id"
   ));

   $row_count = $selectplaneViaIdStmt->rowCount();

   if ($row_count) {
      $plane = new Plane();

      while ($row = $selectplaneViaIdStmt->fetch(PDO::FETCH_ASSOC)) {
         $plane->planeid = $row['planeid'];
         $plane->model = $row['model'];
         $plane->manufacturer = $row['manufacturer'];
         $plane->manufacturedAt = $row['manufacturedAt'];
         $plane->trips = $row['trips'];
      }

      echo json_encode($plane);
      exit;
   } else {
      $data = array();
      echo json_encode($data);
      exit;
   }
} catch (PDOException $e) {
   die('ERROR: ' . $e->getMessage());
}
