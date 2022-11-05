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

    //$ID = mysqli_insert_id($connection);
    //echo "$ID";

    if( isset($_POST['service']) && isset($_POST['form_day']) && isset($_POST['from_time']) && isset($_POST['to_time'])){
        //$kidsname = $_POST['kidsname'];
        //$kidsages = $_POST['kidsages']; 
        $service = $_POST['service'];
        $form_day = $_POST['form_day'];
       // $to_day = $_POST['to_day'];
        $from_time = $_POST['from_time'];
        $to_time = $_POST['to_time'];

        
        if(isset($_POST['comments']))
        $comments = $_POST['comments'];
        else
        $comments = "no comment added";
        print_r($_POST);
        //"INSERT INTO `requests` (`TypeOfServese`, `startTime`, `endTime`, `startDate`, `comments`, `parentName`, `ID`, `status`, `ParentEmail`, `expireDate`) VALUES ('$service', '$from_time', '$to_time', '$form_day', '$comments','$_SESSION['firstName']', NULL, 'unserved', '$_SESSION['email']', '2022-11-04', '$_SESSION['City']' , '$_SESSION['District']' )";
        $sql = "INSERT INTO `requests` (`TypeOfServese`, `startTime`, `endTime`, `startDate`, `comments`, `parentName`, `ID`, `status`, `ParentEmail`, `expireDate`, `city`, `District`) VALUES ('$service', '$from_time', '$to_time', '$form_day', '$comments','Mona', NULL, 'unserved', 'parent1@gmail.com', '2022-11-04', 'Riyadh' , 'aldreya')";
        $query = mysqli_query($connection,$sql);
        
       // isset($_POST['kidsname']) && isset($_POST['kidsages']) &&
       if( $query ){
        echo 'done1';
        
        //Insert ID
       $id = mysqli_insert_id($connection);
       print("Insert ID: ".$id ."\n");
        $count = count($_POST["kidsname"]);
        print("count: ". $count ."\n");
        for($x =0 ; $x < $count ; $x++) {
           $kidName = $_POST["kidsname"]["$x"];
           $kidAge = $_POST["kidsage"]["$x"];
            $sql = "INSERT INTO `kids` (`ID`, `kidName`, `kidAge`) VALUES ('$id', '$kidName', '$kidAge')";
            $query = mysqli_query($connection,$sql);
          }
         
    header("Location: http://localhost/BabySitterProject/HTML_Files/postingJobRequest.html");
    }
    else{
        echo 'fail';
        }
    }
}

?> 