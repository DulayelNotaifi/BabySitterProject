<?php
        include('../PHP_Files/connect_db.php');\

$select = "SELECT `ID` FROM requests              
           WHERE created_at < DATE_SUB( NOW() , INTERVAL 1 HOUR ) 
           AND `status` = 'unserved'";

$result = mysqli_query($connection,  $select);

$valu = mysqli_num_rows($result);

if($valu > 0 ){
    
    $x = 0;
    while($x< $valu  ){

        $id = key($row);
        next($row);

        $sql = "DELETE FROM `offers` WHERE `RequestID` = $row[$id]";
        $query = mysqli_query($connection,$sql);
        if( $query ){
          echo 'done0';
        $sql = "DELETE FROM `kids` WHERE `ID` = $row[$id]";
        $query = mysqli_query($connection,$sql);
        if( $query ){
          echo 'done1';
          $sql = "DELETE FROM `requests` WHERE `ID` = $row[$id]";
          $query = mysqli_query($connection,$sql); 
          if( $query ){
             echo 'done2';
          }
      }}
      else{
          echo 'fail';
          }
    }

}
?>