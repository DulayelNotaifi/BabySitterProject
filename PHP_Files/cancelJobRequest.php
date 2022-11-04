<?php 
  include('../PHP_Files/connect_db.php');

 if(isset($_GET['id'])){
    $id=  $_GET['id'];
    $sql = "DELETE FROM `kids` WHERE `ID` = $id";
    $result = mysqli_query($connection,$sql);
    $Message = urlencode("Delete done");
   // header("Location:index.php?Message={$Message}");
    header("Location: http://localhost/BabySitterProject/HTML_Files/cancelingJobRequest.php?Message=".$Message);

 }