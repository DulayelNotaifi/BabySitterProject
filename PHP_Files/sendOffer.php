<?php
session_start();
//
print_r($_GET);



if(isset($_GET['offer_submit'])){

 $servername= "localhost";
    $username= "root" ;
    $password= "";
    $dbname= "381project" ;
    
    if (!$connection= mysqli_connect($servername,$username,$password)) 
    die("Connection failed: " . mysqli_connect_error());
    
    if(!$database= mysqli_select_db($connection, $dbname))
    die("Could not open database failed: " . mysqli_connect_error());

   if(isset($_GET['OfferPrice']) && isset($_GET['id']) && isset($_GET['day'])&& isset($_GET['fromTime'])&& isset($_GET['toTime'])){

        $OfferPrice = $_GET['OfferPrice'];;
        $id =  $_GET['id'];
        $oDay = $_GET['day'];
        $oTime1 = $_GET['fromTime'];
        $oTime2 = $_GET['toTime']; 
        //echo $oTime1;

        //chech conflect

        $conflect = false;
        $sql = "SELECT `startTime` , `endTime` FROM `offers` WHERE `babySitterEmail` = 'sitter1@gmail.com' AND NOT `offerstatus` = 'rejected'";
        $query = mysqli_query($connection,$sql);
        if( $query ){
        while($row = mysqli_fetch_row($query)){
    $sTime = key($row);
    next($row);

    $eTime = key($row);
    next($row);

     //echo $row[$eTime].": ".$row[$sTime]."<br>";

     $time="00:05:00"; //5 minutes
     if( (strtotime($oTime1) >= strtotime($row[$sTime]) && strtotime($oTime1) <= strtotime($row[$eTime])) ||
         (strtotime($oTime2) >= strtotime($row[$sTime]) && strtotime($oTime2) <= strtotime($row[$eTime])) ||
         (strtotime($row[$sTime]) >= strtotime($oTime1) && strtotime($row[$sTime]) <= strtotime($oTime2)) ||
         (strtotime($row[$eTime]) >= strtotime($oTime1) && strtotime($row[$eTime]) <= strtotime($oTime2))) {
      $conflect = true; 
      echo "conflect";
      exit;
     } 
        }
//if no conflect 
$bbyname = $_SESSION['firstName'];
$bbyemail =  $_SESSION['email'] ;
$sql = "INSERT INTO `offers`(`id`, `price`, `babySitterName`, `RequestID`, `offerstatus`, `babySitterEmail`, `startTime`, `endTime`, `startDate`) VALUES ( NULL ,'$OfferPrice','$bbyname','$id','pending','$bbyemail','$oTime1' , '$oTime2' , '$oDay' )";
$query = mysqli_query($connection,$sql);
//print_r($_GET);
if( $query ){
    echo 'done send offer';

    //header("Location: http://localhost/BabySitterProject/HTML_Files/viewJobRequestList.php");
}
else{
    echo 'fail';
    }

    }
}
}
?>


