<?php
session_start();
    
$servername= "localhost";
$username= "root" ;
$password= "";
$dbname= "381project" ;
$connection= mysqli_connect($servername,$username,$password,$dbname);
$database= mysqli_select_db($connection, $dbname);
// Check the connection
if (!$connection) 
die("Connection failed: " . mysqli_connect_error());
$fname_err = $lname_err = $email_err = $password_err = $city_err = $district_err = $street_err = $bldg_number_err = $postal_code_err = $_2nd_number_err = $notification = "";

if(isset($_POST['submit'])){
    
    $loggedInUser = $_SESSION['email'];
    $firstname  =    $_POST['firstname'];
    $lastname =    $_POST['lastname'];
    $City =    $_POST['City'];
    $District =    $_POST['District'];
    $Street =    $_POST['Street'];
    $eMail =    $_POST['eMail'];
    $BuildingNumber =    $_POST['BuildingNumber'];
    $PostalCode =    $_POST['PostalCode'];
    $SecondaryNumber =    $_POST['SecondaryNumber'];
    $userPassword =mysqli_real_escape_string($connection,$_POST['password']);

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['eMail'];
    $password = $_POST["password"];
    //$confirmpassword= validate($_POST["confirmpassword"]);
    $city = $_POST['City'];
    $district = $_POST['District'];
    $street = $_POST['Street'];
    $bldg_number = $_POST['BuildingNumber'];
    $postal_code = $_POST['PostalCode'];
    $_2nd_number = $_POST['SecondaryNumber'];

    $valid = true;
    if ($fname == "" || !ctype_alpha($fname)) {
        $fname_err = " please enter a valid name!";
        $valid = false;
    }
    if ($lname == "" || !ctype_alpha($lname)) {
        $lname_err = " please enter a valid name!";
        $valid = false;
    }
    if ($email == ""|| !filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $email_err = " please enter a valid email!";
        $valid = false;
    }
    
   
    if ($password!=""&&strlen($password) < 6) {
        $password_err = " password needs to be at least 6 characters! ";
        $valid = false;
    }
    if ($city == "" || !ctype_alpha($city)) {
        $city_err = " please enter a valid city!";
        $valid = false;
    }
    if ($district == "" || !ctype_alpha($district)) {
        $district_err = " please enter a valid district!";
        $valid = false;
    }
    if ($bldg_number == "" || !is_numeric($bldg_number)) {
        $bldg_number_err = " please enter a valid building number!";
        $valid = false;
    }else{
        if(strlen($bldg_number)!=4){
            $bldg_number_err = " building number must be 4 number! ";
            $valid = false;
        }
    }
    if ($street == "" || !ctype_alpha($street)) {
        $street_err = " please enter a valid street!";
        $valid = false;
    }
    if ($postal_code == "" || !is_numeric($postal_code)) {
        $postal_code_err = " please enter a valid postal code!";
        $valid = false;
    }else{
        if(strlen($postal_code)!=5){
            $postal_code_err = " Postal code must be 5 number! ";
            $valid = false;
        }
    }
    if ($_2nd_number == "" || !is_numeric($_2nd_number)) {
        $_2nd_number_err = " please enter a valid secondary number!";
        $valid = false;
    }else{
        if(strlen($_2nd_number)!=4){
            $_2nd_number_err = " Secondary number must be 4 number! ";
            $valid = false;
        }
    }

    
    
    if($email!=$_SESSION['email']){
        $sql = "SELECT email FROM `parent` WHERE email = '$email'";
        $result = mysqli_query($connection, $sql);
        $nummy=mysqli_num_rows($result);
        
        if ($nummy > 0) {
            $email_err = " this email is already registered, please enter a different email!";
            $valid = false;
        }}
    
     
    
    
    //if(isset($_POST['password']) && $_POST['password']!= "")
    //$userPassword = password_hash(mysqli_real_escape_string($connection,$_POST['password']), PASSWORD_DEFAULT,array("cost" => 10)); 
    
    
    if ($valid){
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
    
    $sql = "UPDATE `parent` SET `email` = '$eMail', `firstName` = '$firstname', `lastName` = '$lastname',
     `City` = '$City', `District` = '$District', `Street` = '$Street', `BuildingNumber` = '$BuildingNumber', `PostalCode` = '$PostalCode',
      `SecondaryNumber` = '$SecondaryNumber', `img` = '$imageName' WHERE email = '$loggedInUser'";
    //pass also/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    }else{
        $sql = "UPDATE `parent` SET `email` = '$eMail', `firstName` = '$firstname', `lastName` = '$lastname',
     `City` = '$City', `District` = '$District', `Street` = '$Street', `BuildingNumber` = '$BuildingNumber', `PostalCode` = '$PostalCode',
      `SecondaryNumber` = '$SecondaryNumber', `img` = '$imageName' WHERE email = '$loggedInUser'";
    }
        //print($imageName);
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
    
    }}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>parent edit profile</title>
    <link href="http://fonts.cdnfonts.com/css/prettier-script" rel="stylesheet">
    <link rel="stylesheet" href="../CSS_Files/menustyle.css">
    <link rel="stylesheet" href="../CSS_Files/editstyle.css">
    <script src="https://kit.fontawesome.com/b8b24b0649.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS_Files/footer.css">
</head>

<body>
    <?php include("parentheader.php");?>
    <h2>Edit profile:</h2>
    <div class="cont aaaa">
        <div class="contentedit">
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>"method="POST" enctype="multipart/form-data">
            <?php
                
                $currentUser = $_SESSION['email'];
                //print($_SESSION['email']);
                $sql = "SELECT * FROM `parent` WHERE email ='$currentUser'";

                $gotResuslts = mysqli_query($connection,$sql);

                if($gotResuslts){
                    if(mysqli_num_rows($gotResuslts)>0){
                        while($row = mysqli_fetch_array($gotResuslts)){
                            //print_r("ygbyb8yn".$row['email']);
                        ?>
                <label for="firstname">First Name:</label><span style="color:red"><?php echo $fname_err; ?> </span>
                <input type="text" class="inputing-text" id="firstname" name="firstname"placeholder="Enter your first name"
                value="<?php echo $row['firstName']; ?>">
                <label for="lastname">Last Name:</label><span style="color:red"><?php echo $lname_err; ?> </span>
                <input type="text" class="inputing-text" id="lastname" name="lastname"placeholder="Enter your last name"
                value="<?php echo $row['lastName']; ?>">
                <label for="eMail">Email:</label><span style="color:red"> <?php echo $email_err; ?></span>
                <input type="email" class="inputing-text" id="eMail" name="eMail"placeholder="Enter your new email"
                value="<?php echo $row['email']; ?>">
                <!--<label for="city">City:</label>
                <input type="text" class="inputing-text" id="city" name="city"placeholder="Enter your new city">-->
                <label >Address:</label><br><span style="color:red"> </span><br>
                <label >City:</label><br><span style="color:red"> <?php echo $city_err; ?></span>
                    <input type="text" class="inputing-text" id="loc" name= "City" placeholder= "City"
                    value="<?php echo $row['City']; ?>">
                    <label >District:</label><br><span style="color:red"> <?php echo $district_err; ?></span>
                    <input type="text" class="inputing-text" id="loc" name="District"placeholder="District"
                    value="<?php echo $row['District']; ?>">
                    <label >Street:</label><br><span style="color:red"> <?php echo $street_err; ?></span>
                    <input type="text" class="inputing-text" id="loc" name="Street"placeholder="Street"
                    value="<?php echo $row['Street']; ?>">
                    <label >Building Number:</label><br><span style="color:red"> <?php echo $bldg_number_err; ?></span>
                    <input type="text" class="inputing-text" id="loc" name="BuildingNumber"placeholder="Building number"
                    value="<?php echo $row['BuildingNumber']; ?>"> 
                    <label >Postal Code:</label><br><span style="color:red"> <?php echo $postal_code_err; ?></span>
                    <input type="text" class="inputing-text" id="loc" name="PostalCode"placeholder="Postal code"
                    value="<?php echo $row['PostalCode']; ?>">
                    <label >Secondary Number:</label><br><span style="color:red"><?php echo $_2nd_number_err; ?> </span>
                    <input type="text" class="inputing-text"id="loc" name="SecondaryNumber"placeholder="Secondary number"
                    value="<?php echo $row['SecondaryNumber']; ?>">
                
                <label for="password">Password:</label><span style="color:red"> <?php echo $password_err; ?></span>
                <input type="password" class="inputing-text" id="password" name="password" placeholder="Enter your new password">
                <p class="more-space-on-bottom"></p>
                <input class="botton-bigger" type="submit" name="submit" value="Update" />

        </div>
        
        <div class="forthepic">
        <img src="../public/userImages/<?php echo $row['img']; ?>" alt="profile picture" />
            <p>Upload a different photo:</p>

            <input type="file" accept="image/*" name="img">
        </div>
        <?php
}}}  ?>
        </form>
    </div>
    <footer class="rcad"> 
        <table class="tableF">
            <tr>
                <th><a href="aboutUs.html"> About Us </a></th>
                <th><a href="FAQ.html"> FAQs </a></th>
                <th><a href="ContactUs.html"> Contact Us </a></th>
            </tr>
        </table>
        <div id="shareProfile">
                <h4>Share the website</h4>
            
                <a href="https://facebook.com" target="_blank">
                    <i class="fa-brands fa-facebook fa-2x"></i>
                </a>
        
                <a href="https://twitter.com" target="_blank">
                    <i class="fa-brands fa-twitter fa-2x"></i>
                </a>
        
                <a href="https://linkedin.com" target="_blank">
                    <i class="fa-brands fa-linkedin fa-2x"></i>
                </a>
        
                <a href="https://instagram.com" target="_blank">
                    <i class="fa-brands fa-instagram fa-2x"></i>
                </a>
        
                <a href="https://web.whatsapp.com" target="_blank">
                    <i class="fa-brands fa-whatsapp fa-2x"></i>
                </a>
            </div><br> 
        <div class="footer">
        &copy; A Watchful Eye, 2022
        </div>
        </footer>
</body>

</html>