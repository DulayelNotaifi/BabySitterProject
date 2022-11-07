<?php
session_start();



if(isset($_POST['edit_submit'])){

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

    //if( isset($_POST['service']) && isset($_POST['form_day']) && isset($_POST['from_time']) && isset($_POST['to_time']) && isset($_POST['id']) ){
        
        //$kidsname = $_POST['kidsname'];
        //$kidsages = $_POST['kidsages']; 
        $id =  $_POST['idReq'];
        $service = $_POST['service'];
        $form_day = $_POST['form_day'];
       // $to_day = $_POST['to_day'];
        $from_time = $_POST['from_time'];
        $to_time = $_POST['to_time'];

        echo $id ;
        echo $service ;
        echo $form_day ;
        echo $from_time ;
        echo $to_time ;



        if(!empty($_POST['comments']))
        $comments = $_POST['comments'];
        else
        $comments = "no comment added";

        $name = $_SESSION['firstName'];
        $city = $_SESSION['City'];
        $district = $_SESSION['District'];
        $pemail =  $_SESSION['email'];
        //,`comments`='$comments'
        $sql = "UPDATE `requests` SET `TypeOfServese`='$service',`startTime`='$from_time',`endTime`='$to_time',`startDate`='$form_day' WHERE `ID` = '$id'";
        //$sql = "INSERT INTO `requests` (`TypeOfServese`, `startTime`, `endTime`, `startDate`, `comments`, `parentName`, `ID`, `status`, `ParentEmail`, `created_at`, `city`, `District`) VALUES ('$service', '$from_time', '$to_time', '$form_day', '$comments','$name', NULL, 'unserved', '$pemail', '2022-11-04 00:00:00', '$city' , '$district' )";
        //$sql = "INSERT INTO `requests` (`TypeOfServese`, `startTime`, `endTime`, `startDate`, `comments`, `parentName`, `ID`, `status`, `ParentEmail`, `expireDate`, `city`, `District`) VALUES ('$service', '$from_time', '$to_time', '$form_day', '$comments','Mona', NULL, 'unserved', 'parent1@gmail.com', '2022-11-04', 'Riyadh' , 'aldreya')";
        echo 'done0';
        $query = mysqli_query($connection,$sql);
        echo 'done01';
       // isset($_POST['kidsname']) && isset($_POST['kidsages']) &&
     
       if( $query ){
        echo 'done1';
        print_r($_POST);
        /*//remove kids
        $sql = "DELETE FROM `kids` WHERE `ID` = $id";
        $query = mysqli_query($connection,$sql);
        if( $query ){
            echo 'done1';

        //add kids
        $count = count($_POST["kidsname"]);
        print("count: ". $count ."\n");
        for($x =0 ; $x < $count ; $x++) {
           $kidName = $_POST["kidsname"]["$x"];
           $kidAge = $_POST["kidsage"]["$x"];
            $sql = "INSERT INTO `kids` (`ID`, `kidName`, `kidAge`) VALUES ('$id', '$kidName', '$kidAge')";
            $query = mysqli_query($connection,$sql);
          }*/
        
    //header("Location: http://localhost/BabySitterProject/HTML_Files/editJobRequest.php");
    }}
    else{
        echo 'fail';
        }
   // }
//}

?> 