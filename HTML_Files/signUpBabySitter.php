<?php
require("../PHP_Files/query.php");
$fname_err = $lname_err = $gender_err = $id_err = $age_err = $email_err = $city_err = $phone_err = $password_err =  $msg_err = $notification = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname_err = $lname_err = $gender_err = $id_err = $age_err = $email_err = $city_err = $phone_err = $password_err =  $msg_err = $notification = "";

    $fname = validate($_POST["fname"]);
    $lname = validate($_POST["lname"]);
    if (isset($_POST["gender"]))
        $gender = $_POST["gender"];
    else
        $gender = "";
    $id = validate($_POST["id"]);
    $age = validate($_POST["age"]);
    $email = validate($_POST["email"]);
    $city = validate($_POST["city"]);
    $phone = validate($_POST["phone"]);
    $password = validate($_POST["password"]);
    $confirmpassword= validate($_POST["confirmpassword"]);
    $msg = validate($_POST["bio"]);

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
     
    if ($password == "") {
        $password_err = " please enter a valid password!";
        $valid = false;
    }
    if($confirmpassword!==$password){
        $password_err = " please enter the same password!";
        $valid = false;
    }
    if (strlen($password) < 6) {
        $password_err = " password needs to be at least 6 characters!";
        $valid = false;
    }
    if ($city == "" || !ctype_alpha(str_replace(" ", "", $city))) {
        $city_err = " please enter a valid city!";
        $valid = false;
    }
    if ($gender == "") {
        $gender_err = " please select a gender!";
        $valid = false;
    }
    if ($age == "") {
        $age_err = " please enter a valid age number!";
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
    if ($id == "") {
        $id_err = " please enter a valid id!";
        $valid = false;
    }

    if (get_babysitter_email($email) > 0) {
        $email_err = " this email is already registered, please enter a different email!";
        $valid = false;
    }
    
     if (get_parent_email($email) > 0) {
        $email_err = " this email is already registered, please enter a different email!";
        $valid = false;
    }
    
    // dd();
    if ($valid) {
        $userImage = $_FILES['img'];
        $imageName = $userImage['name'];
        if ($imageName == "")
            $imageName = "defultpico.jpg";

        if (babysitter_signup_handler($email, $password, $fname, $lname, $gender, $id, $age, $city, $phone, $msg, $imageName)) {
            $notification = 'Registration successful!';
            $_POST["fname"] = $_POST["confirmpassword"] = $_POST["lname"] = $_POST["email"] = $_POST["password"] = $_POST["city"] = $_POST["district"] = $_POST["street"] = $_POST["bldg_number"] = $_POST["postal_code"] = $_POST["_2nd_number"] = "";

//            $target_dir = "../public/userImages/";
//            $target_file = $target_dir . basename($_FILES["img"]["name"]);
//            move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);

            $fileTmpName = $userImage['tmp_name'];
            $fileNewName = "../public/userImages/".$imageName;
            $uploaded = move_uploaded_file($fileTmpName,$fileNewName);


            $_POST["fname"] =$_POST["confirmpassword"]= $_POST["lname"] = $_POST["gender"] = $_POST["age"] = $_POST["id"] = $_POST["email"] = $_POST["password"] = $_POST["city"] = $_POST["phone"] = $_POST["bio"] = "";
            echo '<script>alert("Registration successful!");window.location.href="LoginPage.php";</script>';

        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up</title>
    <script src="https://kit.fontawesome.com/b8b24b0649.js" crossorigin="anonymous"></script>
    <link href="http://fonts.cdnfonts.com/css/prettier-script" rel="stylesheet">
    <link rel="stylesheet" href="../CSS_Files/menustyle.css">
    <link rel="stylesheet" href="../CSS_Files/style.css">
    <script src="https://kit.fontawesome.com/a71707a89a.js" crossorigin="anonymous"></script>
    <style>
        #popUpBox {
            width: 500px;
            overflow: hidden;
            background: #fff59d;
            box-shadow: 0 0 10px black;
            border-radius: 10px;
            position: absolute;
            top: 25%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
            padding: 33px;
            text-align: center;
            display: none;
        }
    </style>

</head>

<body>
    <div class="topofpage">
        <img src="thenewlogo.jpg" alt="a logo for A Watchful Eye website" class="logo-small">
        <p class="andname">A Watchful Eye</p>
    </div>

    <div class="cont">
        <h2 class="signTitle">Sign up</h2>
        <div class="content-container">
            <div class="contentedit">
                <div id="popUpOverlay"></div>
                <div id="popUpBox">
                    <div id="box">
                        <i class="fas fa-check-circle fa-5x"></i>
                        <h1><?php echo $notification; ?></h1>
                        <div id="closeModal"></div>
                    </div>
                </div>
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
                    <p style="font-size:18px"><span style="color:red"> * </span>Mandatory field</p>
                    <label class="SLabel">First Name:<span style="color:red"> * </span><span class="errspan" style="color:red;font-size: 15px;"><?php echo $fname_err; ?></span></label>
                    <input required type="text" class="inputing-text cleardata" id="firstname" placeholder="Enter your first name, example: Aliyah" name="fname" value="<?php if (isset($_POST["fname"])) echo $_POST["fname"]; ?>">

                    <label class="SLabel">Last Name:<span style="color:red"> * </span><span style="color:red;font-size: 15px;"><?php echo $lname_err; ?></span></label>
                    <input required type="text" class="inputing-text cleardata" id="lastname" placeholder="Enter your last name, example: Alabdulkarim" name="lname" value="<?php if (isset($_POST["lname"])) echo $_POST["lname"]; ?>">
                    <p class="more-space-on-bottom"></p>
                    <label class="SLabel  less-botoom-space">Gender:<span style="color:red"> * </span><span class="errspan" style="color:red;font-size: 15px;"><?php echo $gender_err; ?></span></label><br>

                    <input required type="radio" name="gender" value="male" <?php if (isset($_POST["gender"]) && $_POST["gender"] == "male") echo "checked"; ?>> Male

                    <input required type="radio" name="gender" value="female" <?php if (isset($_POST["gender"]) && $_POST["gender"] == "female") echo "checked"; ?>> Female
                    <p class="more-space-on-bottom"></p>

                    <label class="SLabel">ID:<span style="color:red"> * </span><span class="errspan" style="color:red;font-size: 15px;"><?php echo $id_err; ?></span></label>
                    <input required type="tel" class="inputing-text cleardata" id="id" placeholder="Enter your ID number, example: 1126354857" pattern="[0-9]{10}" name="id" value="<?php if (isset($_POST["id"])) echo $_POST["id"]; ?>">

                    <label class="SLabel">Age:<span style="color:red"> * </span><span class="errspan" style="color:red;font-size: 15px;"><?php echo $age_err; ?></span></label>
                    <input required type="number" min="18" max="120" class="inputing-text cleardata" id="age" placeholder="Enter your age, example: 35" name="age" value="<?php if (isset($_POST["age"])) echo $_POST["age"]; ?>">

                    <label class="SLabel">Email:<span style="color:red"> * </span><span class="errspan" style="color:red;font-size: 15px;"><?php echo $email_err; ?></span></label>
                    <input required type="email" class="inputing-text cleardata" id="eMail" placeholder="Enter your email, example: aliyah@gmail.com" name="email" value="<?php if (isset($_POST["email"])) echo $_POST["email"]; ?>">

                    <label class="SLabel">City:<span style="color:red"> * </span><span class="errspan" style="color:red;font-size: 15px;"><?php echo $city_err; ?></span></label>
                    <input required type="text" class="inputing-text cleardata" id="city" placeholder="Enter your city, example: riyadh" name="city" value="<?php if (isset($_POST["city"])) echo $_POST["city"]; ?>">

                    <label class="SLabel">Phone:<span style="color:red"> * </span><span class="errspan" style="color:red;font-size: 15px;"><?php echo $phone_err; ?></span></label>
                    <input required type="tel" class="inputing-text cleardata" id="phone" placeholder="Enter your phone number, example: 0532635486" pattern="[0-9]{10}" name="phone" value="<?php if (isset($_POST["phone"])) echo $_POST["phone"]; ?>">

                    <label class="SLabel">Password:<span style="color:red"> * </span><span class="errspan" style="color:red;font-size: 15px;"><?php echo $password_err; ?></span></label>
                    <input required type="password" class="inputing-text cleardata" id="password" placeholder="Enter your password, it must be at least 6 characters" name="password" value="<?php if (isset($_POST["password"])) echo $_POST["password"]; ?>">

                    <label class="SLabel">Confirm Password:<span style="color:red"> * </span></label>
<!--                        <span style="color:red;font-size: 15px;">--><?php //echo $password_err; ?><!--</span></label>-->
                    <input required type="password" class="inputing-text cleardata" id="confirmpassword" placeholder="Confirm your password, it must match your password" name="confirmpassword" value="<?php if (isset($_POST["confirmpassword"])) echo $_POST["confirmpassword"]; ?>">


                    <label class="SLabel less-botoom-space">Bio:<span style="color:red"> * </span><span class="errspan" style="color:red;font-size: 15px;"><?php echo $msg_err; ?></span></label>
                    <p class="more-space-on-bottom"></p>
                    <textarea name="bio" class="cleardata" id="bio" rows="10" placeholder=" Enter your bio, such as: years of experience, education, languages spoken, skills, etc" required><?php if (isset($_POST["bio"])) echo $_POST["bio"]; ?></textarea>

                    <p class="more-space-on-bottom"></p>
                    <input class="submit-btn" type="submit" value="Sign Up" /><br>

                    <input class="button" type="reset" id="resetbtn" value="Reset">

                    <a href="LoginPage.php">
                        <input class="cancel-btn " type="button" value="Cancel">
                    </a>

            </div>
            <div class="forthepic bbystr">
                <img src="defultpico.jpg" id="showimg" alt="a default picture of a user">
                <p>Upload a photo:</p>

                <input type="file" id="imgfile" accept="image/*" name="img">

            </div>
        </div>
    </div>
    </form>


    <footer>
        <table class="tableF">
            <tr>
                <th><a href="aboutUs.html"> About Us </a></th>
                <th><a href="FAQ.html"> FAQs </a></th>
                <th><a href="ContactUs.php"> Contact Us </a></th>
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
<script src="jquery-3.6.1.min.js"></script>
    <script>
        $(document).ready(function(){

            imgfile.onchange = evt => {
                const [file] = imgfile.files
                if (file) {
                    showimg.src = URL.createObjectURL(file);
                }
            }

            $('#resetbtn').click(function (){
               $('#showimg').attr('src','defultpico.jpg');
               $('.errspan').html('');
            });

        });
    </script>

</body>

</html>
