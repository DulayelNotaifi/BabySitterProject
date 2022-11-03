<?php
session_start();
print_r($_POST);




if(isset($_POST['offer_submit'])){

    $servername= "localhost";
    $username= "root" ;
    $password= "";
    $dbname= "381project" ;
    
    if (!$connection= mysqli_connect($servername,$username,$password)) 
    die("Connection failed: " . mysqli_connect_error());
    
    if(!$database= mysqli_select_db($connection, $dbname))
    die("Could not open database failed: " . mysqli_connect_error());

    print_r($_POST);

    if(isset($_POST['OfferPrice'])){
        $OfferPrice = $_POST['OfferPrice'];
    }
    $sql = " INSERT INTO `offers` (`price`, `babySitterName`, `RequestID`, `expireDate`) VALUES ('$OfferPrice', 'Nora', NULL, '2022-11-01')";
$query = mysqli_query($connection,$sql);

if( $query ){
    echo 'done';
}
else{
    echo 'fail';
    }
}

?>


