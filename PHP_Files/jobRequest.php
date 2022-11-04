<?php
session_start();
print_r($_POST);



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

    if( isset($_POST['service']) && isset($_POST['form_day']) && isset($_POST['to_day']) && isset($_POST['from_time']) && isset($_POST['to_time'])){
        //$kidsname = $_POST['kidsname'];
        //$kidsages = $_POST['kidsages']; 
        $service = $_POST['service'];
        $form_day = $_POST['form_day'];
        $to_day = $_POST['to_day'];
        $from_time = $_POST['from_time'];
        $to_time = $_POST['to_time'];

        
        if(isset($_POST['comments']))
        $comments = $_POST['comments'];
        else
        $comments = "no comment added";

        $sql = "INSERT INTO `kids` (`kidsName`, `age`, `TypeOfServese`, `startTime`, `endTime`, `startDate`, `endDate`, `comments`, `ID`, `status`, `ParentEmail`) VALUES ('tryMulty', '0', '$service', '$from_time', '$to_time', '$form_day', '$to_day', '$comments', NULL, 'sent', 'parent1@gmail.com')";
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
            $sql = "INSERT INTO `kidsNameAge` (`ID`, `kidName`, `kidAge`) VALUES ('$id', '$kidName', '$kidAge')";
            $query = mysqli_query($connection,$sql);
          }
    }
    else{
        echo 'fail';
        }
    }
}

?> 