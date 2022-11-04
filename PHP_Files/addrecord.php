<?php 
 include('../PHP_Files/connect_db.php');

if(isset($_GET['id'])){
   $id=  $_GET['id'];
   $name = $_GET['name'];

   $sql = "UPDATE `requests` SET `status`= 'served' WHERE `ID` = $id ";
   $sq2 = "UPDATE `offers` SET `offerstatus`='Accepted' WHERE `RequestID` = $id AND `babySitterName` = '$name'";
   $result1 = mysqli_query($connection,$sql);
   $result1 = mysqli_query($connection,$sq2);
   header("Location: http://localhost/BabySitterProject/PHP_Files/RejectOthers.php?id=$id&name=$name");
   
}