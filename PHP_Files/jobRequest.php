<?php
session_start();

if(isset($_POST['post_submit'])){

$servername= "localhost";
$username= "root" ;
$password= "";
$dbname= "381project" ;

if (!$connection= mysqli_connect($servername,$username,$password)) 
die("Connection failed: " . mysqli_connect_error());

if(!$database= mysqli_select_db($connection, $dbname))
die("Could not open database failed: " . mysqli_connect_error());
print_r($_POST);
if(isset($_POST['kidsname']) && isset($_POST['kidsages']) && isset($_POST['service']) && isset($_POST['form_day']) && isset($_POST['to_day']) && isset($_POST['from_time']) && isset($_POST['to_time'])){
$kidsname = $_POST['kidsname'];  echo $kidsname;
$kidsages = $_POST['kidsages']; 
$service = $_POST['service'];
$form_day = $_POST['form_day'];
$to_day = $_POST['to_day'];
$from_time = $_POST['from_time'];
$to_time = $_POST['to_time'];

$sql = "INSERT INTO `kids` (`kidsName`, `age`, `TypeOfServese`, `startTime`, `endTime`, `startDate`, `endDate`, `comments`, `parentName`, `ID`, `status`, `ParentEmail`) VALUES ('Basmah', '4', 'care', '13:00', '15:00', '2022-11-01', '2022-11-01', 'none', 'Mona', NULL, 'non', 'parent1@gmail.com')";
//$sql = "INSERT INTO 'kids' (`kidsName`, `age`, `TypeOfServese`, `startTime`, `endTime`, `startDate`, `endDate` ) VALUES ('$kidsname', '$kidsages','$service','$from_time','$to_time','$form_day','$to_day')";
$query = mysqli_query($connection,$sql);
//INSERT INTO `kids` (`kidsName`, `age`, `TypeOfServese`, `startTime`, `endTime`, `startDate`, `endDate`, `comments`, `parentName`, `ID`, `status`, `ParentEmail`) VALUES ('Lena', '3', 'care', '13:00', '15:00', '2022-10-31', '2022-10-31', 'none', 'Mona', NULL, 'set', 'parent1@gmail.com');
//INSERT INTO `kids` (`kidsName`, `age`, `TypeOfServese`, `startTime`, `endTime`, `startDate`, `endDate`, `comments`, `parentName`, `ID`, `status`, `ParentEmail`) VALUES ('Basmah', '4', 'care', '13:00', '15:00', '2022-11-01', '2022-11-01', 'none', 'Mona', NULL, 'non', 'parent1@gmail.com');
if( $query ){
    echo 'done';
}
else{
    echo 'fail';
    }
}
}



?> 