<?php
session_start();
// Report all PHP errors
error_reporting(E_ALL);

if(isset($_POST['submit'])){
    
$servername= "localhost";
$username= "root" ;
$password= "";
$dbname= "381project" ;
$connection= mysqli_connect($servername,$username,$password,$dbname);
$database= mysqli_select_db($connection, $dbname);
// Check the connection
if (!$connection) 
die("Connection failed: " . mysqli_connect_error());
//print_r($_POST);

$firstname  =    $_POST['firstname'];
$lastname =    $_POST['lastname'];
$City =    $_POST['City'];
$District =    $_POST['District'];
$Street =    $_POST['Street'];
$eMail =    $_POST['eMail'];
$BuildingNumber =    $_POST['BuildingNumber'];
$PostalCode =    $_POST['PostalCode'];
$SecondaryNumber =    $_POST['SecondaryNumber'];


//if(isset($_POST['password']) && $_POST['password']!= "")
//$userPassword = password_hash(mysqli_real_escape_string($connection,$_POST['password']), PASSWORD_DEFAULT,array("cost" => 10)); 


$loggedInUser = $_SESSION['email'];
if($_FILES['img']['name']!=""){
    //print_r($_FILES['img']);
    $userImage    =   $_FILES['img'];   
    $imageName = $userImage ['name'];
    $fileType  = $userImage['type'];
    $fileSize  = $userImage['size'];
    $fileTmpName = $userImage['tmp_name'];
    $fileError = $userImage['error'];
    
    $fileImageData = explode('/',$fileType);
    $fileExtension = $fileImageData[count($fileImageData)-1];
    
    //echo  $fileExtension;
    if($fileExtension == 'jpg' || $fileExtension == 'png' || $fileExtension == 'jpeg'){
        //Process Image
        
        if($fileSize < 6161400){
            //var_dump(basename($imageName));
    
            $fileNewName = "../public/userImages/".$imageName;
            
            $uploaded = move_uploaded_file($fileTmpName,$fileNewName);
            
            if($uploaded){
                

if(isset($_POST['password']) && $_POST['password']!= ""){
//$userPassword = password_hash(mysqli_real_escape_string($connection,$_POST['password']), PASSWORD_DEFAULT);
$userPassword =mysqli_real_escape_string($connection,$_POST['password']);
$sql = "UPDATE `parent` SET `email` = '$eMail', `firstName` = '$firstname', `lastName` = '$lastname',
 `City` = '$City', `District` = '$District', `Street` = '$Street', `BuildingNumber` = '$BuildingNumber', `PostalCode` = '$PostalCode',
  `SecondaryNumber` = '$SecondaryNumber', `img` = '$imageName' WHERE email = '$loggedInUser'";
//pass also/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}else{
    $sql = "UPDATE `parent` SET `email` = '$eMail', `firstName` = '$firstname', `lastName` = '$lastname',
 `City` = '$City', `District` = '$District', `Street` = '$Street', `BuildingNumber` = '$BuildingNumber', `PostalCode` = '$PostalCode',
  `SecondaryNumber` = '$SecondaryNumber', `img` = '$imageName' WHERE email = '$loggedInUser'";
}
    print($imageName);
                $results = mysqli_query($connection,$sql);
    
                header('Location:/BabySitterProject/HTML_Files/parenteditprofile.php');
            exit;
            }
    
    
        }}}

        if(isset($_POST['password']) && $_POST['password']!= ""){
            //$userPassword = password_hash(mysqli_real_escape_string($connection,$_POST['password']), PASSWORD_DEFAULT);
            $sql = "UPDATE `parent` SET `email` = '$eMail', `firstName` = '$firstname', `lastName` = '$lastname',
 `City` = '$City', `District` = '$District', `Street` = '$Street', `BuildingNumber` = '$BuildingNumber', `PostalCode` = '$PostalCode',
  `SecondaryNumber` = '$SecondaryNumber' WHERE email = '$loggedInUser'";
            //$sql = "UPDATE `babysitter` SET firstName = '$firstname',lastName= '$lastname', email ='$eMail'
            //,gender='$gender',ID='$id',age='$age',city='$city',phone='$phone',bio='$bio',password ='$userPassword' WHERE email = '$loggedInUser'";
            $results = mysqli_query($connection,$sql);
            header('Location:/BabySitterProject/HTML_Files/parenteditprofile.php');
            exit;
            }else{
                $sql = "UPDATE `parent` SET `email` = '$eMail', `firstName` = '$firstname', `lastName` = '$lastname',
 `City` = '$City', `District` = '$District', `Street` = '$Street', `BuildingNumber` = '$BuildingNumber', `PostalCode` = '$PostalCode',
  `SecondaryNumber` = '$SecondaryNumber' WHERE email = '$loggedInUser'";
               $results = mysqli_query($connection,$sql);
            header('Location:/BabySitterProject/HTML_Files/parenteditprofile.php');
            exit; 
            }
            
            $sql = "UPDATE `parent` SET `email` = '$eMail', `firstName` = '$firstname', `lastName` = '$lastname',
            `City` = '$City', `District` = '$District', `Street` = '$Street', `BuildingNumber` = '$BuildingNumber', `PostalCode` = '$PostalCode',
             `SecondaryNumber` = '$SecondaryNumber' WHERE email = '$loggedInUser'";
                           
                       
            $results = mysqli_query($connection,$sql);
            header('Location:/BabySitterProject/HTML_Files/parenteditprofile.php');
            exit;

}

