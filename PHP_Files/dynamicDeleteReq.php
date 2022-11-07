<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
        include('../PHP_Files/connect_db.php');

$select = "SELECT * FROM `requests` WHERE created_at < (NOW() - INTERVAL 1 HOUR)  AND `status` = 'unserved'";
$q = mysqli_query($connection, $select);

if(mysqli_num_rows($q) > 0){
  while($req = mysqli_fetch_array($q)){
      $offer = "UPDATE `offers` SET `offerstatus`='expired' WHERE `RequestID` = ".$req['ID']."";
      mysqli_query($connection, $offer);
  }
}

$query = "UPDATE `requests` SET `status` =  'expired' WHERE createdAt < (NOW() - INTERVAL 1 HOUR) AND `status` = 'unserved'";
$result = mysqli_query($connection, $query);

?>
