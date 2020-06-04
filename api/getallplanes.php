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



try {
   $selectAllplanestmt->execute();

   $row_count = $selectAllplanestmt->rowCount();

   if ($row_count) {
      $data = array();

      while ($row = $selectAllplanestmt->fetch(PDO::FETCH_ASSOC)) {
         $planes = new plane();
         $planes->planeid = $row['planeid'];
         $planes->manufacturedAt = $row['manufacturedAt'];
         $planes->manufacturer = $row['manufacturer'];
         $planes->model = $row['model'];
         $planes->trips = $row['trips'];
         array_push($data, $planes);
      }

      echo json_encode($data);
      exit;
   } else {
      $data = array();
      echo json_encode($data);
      exit;
   }
} catch (PDOException $e) {
   die('ERROR: ' . $e->getMessage());
}
