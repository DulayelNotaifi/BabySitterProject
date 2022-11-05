<?php
session_start();

//print_r($_POST);
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

$loggedInUser = $_SESSION['email'];

    if(!empty($_POST['uPassword'])){
        $userPassword = mysqli_real_escape_string($connection,$_POST['uPassword']);
        
        $sql = "SELECT * FROM `babysitter` WHERE email='$loggedInUser'";
        // AND password='$userPassword'
        $userFound = mysqli_query($connection,$sql);
        //echo $password_encrypted;
        if($userFound){

            if(mysqli_num_rows($userFound) > 0){
                
                while($row = mysqli_fetch_assoc($userFound)){
                    //if(password_verify($userPassword,$row['password'])){
                     if($userPassword==$row['password']){   
                        $sql2="DELETE FROM `babysitter` WHERE email='$loggedInUser'";
                        $userFound = mysqli_query($connection,$sql2);
                        header('Location:/BabySitterProject/HTML_Files/LoginPage.php');
                        exit;
                    }
                }
                      //  $_SESSION['user_name'] = $userEmail;
                        
            }
            
            
        }
        
        
        header('Location:/BabySitterProject/HTML_Files/deletebbystracc.php?error=failToDelete');
        
        
    }
}?>