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

   if(isset($_GET['OfferPrice']) && isset($_GET['id'])){

        $OfferPrice = $_GET['OfferPrice'];;
        $id =  $_GET['id'];
        echo $id;

        //INSERT INTO `offers`(`id`, `price`, `babySitterName`, `RequestID`, `offerstatus`, `babySitterEmail`) VALUES ( NULL ,'$OfferPrice','Nora','$id','pending','sitter1@gmail.com')
    $sql = "INSERT INTO `offers`(`id`, `price`, `babySitterName`, `RequestID`, `offerstatus`, `babySitterEmail`) VALUES ( NULL ,'$OfferPrice','Nora','$id','pending','sitter1@gmail.com')";
$query = mysqli_query($connection,$sql);
//print_r($_GET);
if( $query ){
    echo 'done';
}
else{
    echo 'fail';
    }
}
}
?>


