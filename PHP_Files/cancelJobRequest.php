<?php 
  include('../PHP_Files/connect_db.php');

 if(isset($_GET['id'])){
    $id=  $_GET['id'];
    $sql = "DELETE FROM `offers` WHERE `RequestID` = $id";
    $query = mysqli_query($connection,$sql);
    if( $query ){
      echo 'done0';
    $sql = "DELETE FROM `kids` WHERE `ID` = $id";
    $query = mysqli_query($connection,$sql);
    if( $query ){
      echo 'done1';
      $sql = "DELETE FROM `requests` WHERE `ID` = $id";
      $query = mysqli_query($connection,$sql); 
      if( $query ){
         echo 'done2';
      }
  }}
  else{
      echo 'fail';
      }
    $Message = urlencode("Delete done");
   // header("Location:index.php?Message={$Message}");
    header("Location: http://localhost/BabySitterProject/HTML_Files/cancelingJobRequest.php?Message=".$Message);

 }