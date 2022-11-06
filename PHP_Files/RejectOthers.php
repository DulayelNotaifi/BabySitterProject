<?php 
 include('../PHP_Files/connect_db.php');

if(isset($_GET['id'])){
   $id=  $_GET['id'];
   $name = $_GET['name'];


   $sql = "UPDATE `offers` SET `offerstatus`= 'rejected' WHERE `RequestID` = $id  AND `babySitterName` <> '$name'";
   $result = mysqli_query($connection,$sql);
   header("Location: http://localhost/BabySitterProject/HTML_Files/ViewOfferList.php");
   
}