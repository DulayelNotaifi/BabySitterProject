<?php
session_start();


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


    if(!empty($_POST['uEmail']) && !empty($_POST['uPassword'])){

        $userEmail = mysqli_real_escape_string($connection,strip_tags($_POST['uEmail']));
        $userPassword = mysqli_real_escape_string($connection,$_POST['uPassword']);

        $sql = "SELECT * FROM `babysitter` WHERE email='$userEmail'";
        // AND password='$userPassword'
        $userFound = mysqli_query($connection,$sql);
        
        if($userFound){

            if(mysqli_num_rows($userFound) > 0){
                
                while($row = mysqli_fetch_assoc($userFound)){
                    //password_verify($userPassword,$row['password']//////////////////////////////////////////////////////////////////
                    if($userPassword==$row['password']){
                        
                        $_SESSION['user_name'] = $row['user_name'];
                        header('Location:/BabySitterProject/HTML_Files/babysitterhome.html');
                        exit;
                    }
                }
                      //  $_SESSION['user_name'] = $userEmail;
                        
            }
            
            
        }
        $sql = "SELECT * FROM `parent` WHERE email='$userEmail'AND password='$userPassword'";
        // AND password='$userPassword'
        $userFound = mysqli_query($connection,$sql);
        
        if($userFound){

            if(mysqli_num_rows($userFound) > 0){
                
                    while($row = mysqli_fetch_assoc($userFound)){
                        /////////////////////////////////////////////////////////////////////////////////////////////////
                        if($userPassword==$row['password']){
                            $_SESSION['user_name'] = $row['user_name'];
                            header('Location:/BabySitterProject/HTML_Files/parenthome.html');
                        exit;
                        }
                    }
                
                       // $_SESSION['user_name'] = $userEmail;
                        
            }
            
            
        }
        
        header('Location:/BabySitterProject/HTML_Files/LoginPage.php?error=failToLogIn');
        
        
    }

}?>