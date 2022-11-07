<?php
session_start();
// Report all PHP errors
error_reporting(E_ALL);
$servername= "localhost";
$username= "root" ;
$password= "";
$dbname= "381project" ;
$connection= mysqli_connect($servername,$username,$password,$dbname);
$database= mysqli_select_db($connection, $dbname);
// Check the connection
if (!$connection) 
die("Connection failed: " . mysqli_connect_error());
$fname_err = $lname_err = $gender_err = $id_err = $age_err = $email_err = $city_err = $phone_err = $password_err =  $msg_err = $notification = "";
if(isset($_POST['submit'])){
    

//print_r($_POST);
$loggedInUser = $_SESSION['email'];
$firstname  =    $_POST['firstname'];

$lastname =    $_POST['lastname'];
$gender =    $_POST['gender'];
$id =    $_POST['id'];
$age =    $_POST['age'];
$eMail =    $_POST['eMail'];
$city =    $_POST['city'];
$phone =    $_POST['phone'];
$bio =    $_POST['biotextbox'];

$userPassword =mysqli_real_escape_string($connection,$_POST['password']);

    /*$sql = "SELECT email FROM `babysitter` WHERE email = '$eMail'";
    $result = mysqli_query($connection, $sql);
    if(mysqli_num_rows($result)){
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
        $sql = "UPDATE `babysitter` SET firstName = '$firstname',lastName= '$lastname'
        ,gender='$gender',ID='$id',age='$age',city='$city',phone='$phone',bio='$bio', img='$imageName',password ='$userPassword' WHERE email = '$loggedInUser'";
        }else{
            $sql = "UPDATE `babysitter` SET firstName = '$firstname',lastName= '$lastname'
            ,gender='$gender',ID='$id',age='$age',city='$city',phone='$phone',bio='$bio', img='$imageName' WHERE email = '$loggedInUser'";
        }
            print($imageName);
                        $results = mysqli_query($connection,$sql);
            
                        header('Location:/BabySitterProject/HTML_Files/babysittereditprofile.php?error=emailDup');
                    exit;
                    }
            
            
                }}}
        
                if(isset($_POST['password']) && $_POST['password']!= ""){
                   // $userPassword = password_hash(mysqli_real_escape_string($connection,$_POST['password']), PASSWORD_DEFAULT);
                    $sql = "UPDATE `babysitter` SET firstName = '$firstname',lastName= '$lastname'
                    ,gender='$gender',ID='$id',age='$age',city='$city',phone='$phone',bio='$bio',password ='$userPassword' WHERE email = '$loggedInUser'";
        
                    }else{
                        $sql = "UPDATE `babysitter` SET firstName = '$firstname',lastName= '$lastname'
                        ,gender='$gender',ID='$id',age='$age',city='$city',phone='$phone',bio='$bio' WHERE email = '$loggedInUser'";
                        
                    }
                    $results = mysqli_query($connection,$sql);
                    header('Location:/BabySitterProject/HTML_Files/babysittereditprofile.php?error=emailDup');
                    exit;
        
        }
    
    

*/
//if(isset($_POST['password']) && $_POST['password']!= "")
//$userPassword = password_hash(mysqli_real_escape_string($connection,$_POST['password']), PASSWORD_DEFAULT,array("cost" => 10)); 


$fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    if (isset($_POST["gender"]))
        $gender = $_POST["gender"];
    
    $id = $_POST["id"];
    $age = $_POST["age"];
    $email = $_POST["eMail"];
    echo $email;
    $city = $_POST["city"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    //$confirmpassword= $_POST["confirmpassword"];
    $msg = $_POST["biotextbox"];
    
    $valid = true;
    if ($fname == "" || !ctype_alpha($fname)) {
        $fname_err = " please enter a valid name!";
        $valid = false;
    }
    if ($lname == "" || !ctype_alpha($lname)) {
        $lname_err = " please enter a valid name!";
        $valid = false;
    }
    if ($email == "" || !filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $email_err = " please enter a valid email!";
        $valid = false;
    }

    if ($password!=""&&strlen($password) < 6) {
        $password_err = " password needs to be at least 6 characters!";
        $valid = false;
    }
    if ($city == "" || !ctype_alpha($city)) {
        $city_err = " please enter a valid city!";
        $valid = false;
    }

    if(!preg_match("/[a-zA-Z]/i", $msg)){
        $msg_err = " please enter a valid bio (must contain letters)!";
        $valid = false;
    }
    if (!preg_match("/^05\d{8}$/", $phone)) {
        $phone_err = " please enter a valid phone number (must start with 05)!";
        $valid = false;
    }
    if($email!=$_SESSION['email']){
    $sql = "SELECT email FROM `babysitter` WHERE email = '$email'";
    $result = mysqli_query($connection, $sql);
    $nummy=mysqli_num_rows($result);
    
    if ($nummy > 0) {
        $email_err = " this email is already registered, please enter a different email!";
        $valid = false;
    }}
    if (!preg_match("/[^0-9]/", $id)) {
        $id_err = " please enter a valid id!";
        $valid = false;
    }
   // $fname_err = $lname_err = $gender_err = $id_err = $age_err = $email_err = $city_err = $phone_err = $password_err =  $msg_err = $notification = "";
    
     
if ($valid) {
    $_SESSION['email']=$eMail;
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
$sql = "UPDATE `babysitter` SET firstName = '$firstname',lastName= '$lastname', email ='$eMail'
,gender='$gender',ID='$id',age='$age',city='$city',phone='$phone',bio='$bio', img='$imageName',password ='$userPassword' WHERE email = '$loggedInUser'";
}else{
    $sql = "UPDATE `babysitter` SET firstName = '$firstname',lastName= '$lastname', email ='$eMail'
    ,gender='$gender',ID='$id',age='$age',city='$city',phone='$phone',bio='$bio', img='$imageName' WHERE email = '$loggedInUser'";
}
    print($imageName);
                $results = mysqli_query($connection,$sql);
    
                header('Location:/BabySitterProject/HTML_Files/babysittereditprofile.php');
            exit;
            }
    
    
        }}}

        if(isset($_POST['password']) && $_POST['password']!= ""){
           // $userPassword = password_hash(mysqli_real_escape_string($connection,$_POST['password']), PASSWORD_DEFAULT);
            $sql = "UPDATE `babysitter` SET firstName = '$firstname',lastName= '$lastname', email ='$eMail'
            ,gender='$gender',ID='$id',age='$age',city='$city',phone='$phone',bio='$bio',password ='$userPassword' WHERE email = '$loggedInUser'";

            }else{
                $sql = "UPDATE `babysitter` SET firstName = '$firstname',lastName= '$lastname', email ='$eMail'
                ,gender='$gender',ID='$id',age='$age',city='$city',phone='$phone',bio='$bio' WHERE email = '$loggedInUser'";
                
            }
            $results = mysqli_query($connection,$sql);
            header('Location:/BabySitterProject/HTML_Files/babysittereditprofile.php');
            exit;

}
else{
    header('Location:/BabySitterProject/HTML_Files/babysittereditprofile.php');
    exit;
}}

?>