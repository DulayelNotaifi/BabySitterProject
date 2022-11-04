<?php 
 include('../PHP_Files/connect_db.php');

if(isset($_GET['id'])){
   $id=  $_GET['id'];

   $sql = "UPDATE `requests` SET `status`= 'Accepted' WHERE `ID` = $id ";
   $result = mysqli_query($connection,$sql);
   header("Location: http://localhost/BabySitterProject/HTML_Files/OfferDetails.php?id=$id");
   
}