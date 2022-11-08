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
    //echo $email;
    $city = $_POST["city"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    //$confirmpassword= $_POST["confirmpassword"];
    $msg = $_POST["biotextbox"];
    
    $valid = true;
    if ($fname == "" || !ctype_alpha(str_replace(" ", "", $fname))) {
        $fname_err = " please enter a valid name!";
        $valid = false;
    }
    if ($lname == "" || !ctype_alpha(str_replace(" ", "", $lname))) {
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
    if ($city == "" || !ctype_alpha(str_replace(" ", "", $city))) {
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
    
    if (!preg_match("/^\\d+$/", $id)) {
        $id_err = " please enter a valid id!";
        $valid = false;
    }
    
    
     
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
    //print($imageName);
                $results = mysqli_query($connection,$sql);
                echo '<script>alert("Your edits has been sent successfully!");window.location.href="babysittereditprofile.php";</script>';
                //header('Location:/BabySitterProject/HTML_Files/babysittereditprofile.php');
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
            echo '<script>alert("Your edits has been sent successfully!");window.location.href="babysittereditprofile.php";</script>';
            //header('Location:/BabySitterProject/HTML_Files/babysittereditprofile.php');
            exit;

}}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>baby sitter edit profile</title>
    <link href="http://fonts.cdnfonts.com/css/prettier-script" rel="stylesheet">
    <link rel="stylesheet" href="../CSS_Files/menustyle.css">
    <link rel="stylesheet" href="../CSS_Files/editstyle.css">
    <script src="https://kit.fontawesome.com/b8b24b0649.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS_Files/footer.css">
    <style>
        label{
            margin-right:5px;
        }
    </style>
</head>

<body>
    
    
<?php include("bbystrheader.php");?>
    <h2>Edit profile:</h2>
    <div class="cont need-bottom-space">
        <div class="contentedit">

        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
                <?php
                
                        $currentUser = $_SESSION['email'];
                        //print($_SESSION['email']);
                        $sql = "SELECT * FROM `babysitter` WHERE email ='$currentUser'";

                        $gotResuslts = mysqli_query($connection,$sql);

                        if($gotResuslts){
                            if(mysqli_num_rows($gotResuslts)>0){
                                while($row = mysqli_fetch_array($gotResuslts)){
                                    //print_r("ygbyb8yn".$row['email']);
                                ?>
                                
                <label for="firstname">First Name:</label><span style="color:red;"><?php echo $fname_err; ?>  </span>
                <input type="text" class="inputing-text" id="firstname" name="firstname" placeholder="Enter your first name, example: Aliyah"
                value="<?php echo $row['firstName']; ?>">
                <label for="lastname">Last Name:</label><span style="color:red;"> <?php echo $lname_err; ?> </span>
                <input type="text" class="inputing-text" id="lastname" name="lastname" placeholder="Enter your last name, example: Alabdulkarim"
                value="<?php echo $row['lastName']; ?>">
                <p class="more-space-on-bottom"></p>
                <label>Gender:</label>
                <p class="more-space-on-bottom"></p>
                <input type="radio" name="gender" value="male"<?php if (isset($row['gender']) && strtolower($row['gender'])=="male") echo "checked";?>> Male
                <input type="radio" name="gender" value="female"<?php if (isset($row['gender']) && strtolower($row['gender'])=="female") echo "checked";?>> Female
                <p class="more-space-on-bottom"></p>
                <label for="id">ID:</label><span style="color:red;"> <?php echo $id_err; ?> </span>
                <input type="text" class="inputing-text" id="id" name="id" placeholder="Enter your ID number, example: 1126354857"
                value="<?php echo $row['ID']; ?>">
                <label for="age">Age:</label><span style="color:red;">  </span>
                <input type="text" class="inputing-text" id="age" name="age" placeholder="Enter your age, example: 35"
                value="<?php echo $row['age']; ?>">

                <label for="eMail">Email:</label><span style="color:red;"> <?php echo $email_err; ?> </span>
                
                <?php
if(isset($_GET['error'])){

if($_GET['error'] == 'emailDup'){
    ?>
    <span style="color:red;">
    
    the email you entered was already registered, please enter a different email!
</span>
    <!--<small class="in-log-in">Please Enter correct email and password</small>-->
    
<?php
}}

?>
<input type="email" class="inputing-text" id="eMail" name="eMail" placeholder="Enter your email, example: aliyah@gmail.com"
                value="<?php echo $row['email']; ?>">
                <label for="city">City:</label><span style="color:red;"> <?php echo $city_err; ?> </span>
                <input type="text" class="inputing-text" id="city" name="city" pplaceholder="Enter your city, example: riyadh"
                value="<?php echo $row['city']; ?>">
                <label for="phone">Phone:</label><span style="color:red;"> <?php echo $phone_err; ?> </span><!--<span id="redfff"style="color:red;"></span>-->
                <input type="text" class="inputing-text" id="phone" name="phone" placeholder="Enter your phone number, example: 0532635486"
                onblur="myFunction()"
                value="<?php echo $row['phone']; ?>">
                
               

<script>
   var errordet=false;
function myFunction() {
    var phoneno =/^05\d{8}$/;
  if(!document.getElementById("phone").value.match(phoneno))

        {
            alert("gjnkfd");global errordet=true;
            var x = document.getElementById("redfff");
  x.innerHTML="invalid phone number";
        }else{
            global errordet=false;
            var x = document.getElementById("redfff");
  x.innerHTML="";

        }
  
}
fuction geterrdet(){
    c=global errordet;
    return c;
}
</script>
                <label for="password"> password:</label><span style="color:red;"> <?php echo $password_err; ?> </span>
                <input type="password" class="inputing-text" id="password" name="password" placeholder="Enter your password, it must be at least 6 characters">
                <label for="bio">Bio:</label><span style="color:red;"> <?php echo $msg_err; ?></span> </span>
                <p class="more-space-on-bottom"></p>
                <textarea name="biotextbox" id="bio" name="bio" rows="10" placeholder=" Enter your bio, such as: years of experience, education, languages spoken, skills, etc">
                <?php echo $row['bio']; ?>
                </textarea>
                <p class="more-space-on-bottom"></p>
                <input class="botton-bigger" type="submit" name="submit" onclick="return geterrdet()" value="Update" />

        </div>
        <div class="forthepic bbystr">
        <img src="../public/userImages/<?php echo $row['img']; ?>" alt="profile picture" /> 
            <!--"data:image/jpg;charset=utf8;base64,<?php 
            //echo base64_encode($row['img']); 
            ?>" -->
            

            <p>Upload a different photo:</p>
<p id="hh"></p>
            <input id="uploadImg"type="file" name="img" accept="image/*">
            <!--<script>
                const uploadInput = document.getElementById("uploadImg");
                uploadInput.addEventListener("change",gogo,false);
                function gogo(){
                    
                    if(uploadInput.files[0].size>616140){
                    alert("the image you chose is very large please try another one");
                    uploadInput.value="";
                }
                }
            </script>-->
        </div>
    </div>
    <?php
}}}  ?>
    </form>
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
