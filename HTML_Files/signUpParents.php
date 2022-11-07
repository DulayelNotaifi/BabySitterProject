<?php
require("../PHP_Files/query.php");
$fname_err = $lname_err = $email_err = $password_err = $city_err = $district_err = $street_err = $bldg_number_err = $postal_code_err = $_2nd_number_err = $notification = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname_err = $lemail_err = $email_err = $password_err = $city_err = $district_err = $street_err = $bldg_number_err = $_2nd_number_err = $notification = "";

    $fname = validate($_POST["fname"]);
    $lname = validate($_POST["lname"]);
    $email = validate($_POST["email"]);
    $password = validate($_POST["password"]);
    $confirmpassword= validate($_POST["confirmpassword"]);
    $city = validate($_POST["city"]);
    $district = validate($_POST["district"]);
    $street = validate($_POST["street"]);
    $bldg_number = validate($_POST["bldg_number"]);
    $postal_code = validate($_POST["postal_code"]);
    $_2nd_number = validate($_POST["_2nd_number"]);

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
    if ($password == "") {
        $password_err = " please enter a valid password!";
        $valid = false;
    }
    if($confirmpassword!==$password){
        $password_err = " please enter the same password!";
        $valid = false;
    }
    if (strlen($password) < 6) {
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

    
    
    if (get_parent_email($email) > 0) {
        $email_err = " this email is already registered, please enter a different email!";
        $valid = false;
    }
    
     if (get_babysitter_email($email) > 0) {
        $email_err = " this email is already registered, please enter a different email!";
        $valid = false;
    }
    
    // dd($_FILES["img"]);
    if ($valid) {
        $userImage = $_FILES['img'];
        $imageName = $userImage['name'];
        if ($imageName == "")
            $imageName = "BabySitterProject-main\public\userImages\defultpico.jpg";

        if (parent_signup_handler($fname, $lname, $email, $password, $city, $district, $street,  $bldg_number, $postal_code, $_2nd_number, $imageName)) {
//            $notification = 'Registration successful!';
            $_POST["fname"] = $_POST["lname"] = $_POST["email"] = $_POST["password"] = $_POST["city"] =$_POST["confirmpassword"]= $_POST["district"] = $_POST["street"] = $_POST["bldg_number"] = $_POST["postal_code"] = $_POST["_2nd_number"] = "";

            $target_dir = "../public/userImages/";
            $target_file = $target_dir . basename($_FILES["img"]["name"]);
            move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);

            echo '<script>alert("Registration successful!");window.location.href="parenthome.php";</script>';

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
                    <input required type="text" class="inputing-text" id="firstname" placeholder="Enter your first name, example: Aliyah" name="fname" value="<?php if (isset($_POST["fname"])) echo $_POST["fname"]; ?>">

                    <label class=" SLabel">Last Name:<span style="color:red"> * </span><span class="errspan" style="color:red;font-size: 15px;"><?php echo $lname_err; ?></span></label>
                    <input required type="text" class="inputing-text" id="lastname" placeholder="Enter your last name, example: Alabdulkarim" name="lname" value="<?php if (isset($_POST["lname"])) echo $_POST["lname"]; ?>">
                    <p class="more-space-on-bottom"></p>

                    <p class="more-space-on-bottom"></p>
                    <label class="SLabel">Email:<span style="color:red"> * </span><span class="errspan" style="color:red;font-size: 15px;"><?php echo $email_err; ?></span></label>
                    <input required type="email" class="inputing-text" id="eMail" placeholder="Enter your email, example: aliyah@gmail.com" name="email" value="<?php if (isset($_POST["email"])) echo $_POST["email"]; ?>">

                    <label class="SLabel">Password:<span style="color:red"> * </span><span class="errspan" style="color:red;font-size: 15px;"><?php echo $password_err; ?></span></label>
                    <input required type="password" class="inputing-text" id="password" placeholder="Enter your password, it must be at least 6 characters " name="password" value="<?php if (isset($_POST["password"])) echo $_POST["password"]; ?>">

                    <label class="SLabel">Confirm Password:<span style="color:red"> * </span></label>
                    <!--                        <span style="color:red;font-size: 15px;">--><?php //echo $password_err; ?><!--</span></label>-->
                    <input required type="password" class="inputing-text" id="confirmpassword" placeholder="Confirm your password, it must match your password" name="confirmpassword" value="<?php if (isset($_POST["confirmpassword"])) echo $_POST["confirmpassword"]; ?>">


                    <!--<label class="SLabel">City:</label>
                    <input required type="text" class="inputing-text" id="city" placeholder="Enter your city">-->
                                                                                                             
                    <label class="SLabel">Address:<span style="color:red"> * </span></label>

                    <span class="errspan" style=" color:red;font-size: 15px;font-weight:bold"><?php echo $city_err; ?></span><br>
                    <input required type="text" class="secondInputing-text" id="loc" placeholder="Enter your city, example: riyadh" name="city" value="<?php if (isset($_POST["city"])) echo $_POST["city"]; ?>">
                    <br>

                    <span class="errspan" style="color:red;font-size: 15px;font-weight:bold"><?php echo $district_err; ?></span><br>
                    <input required type="text" class="secondInputing-text" id="loc" placeholder="Enter your district , example: alolaya" name="district" value="<?php if (isset($_POST["district"])) echo $_POST["district"]; ?>">
                    <br>

                    <span class="errspan" style="color:red;font-size: 15px;font-weight:bold"><?php echo $street_err; ?></span><br>
                    <input required type="text" class="secondInputing-text" id="loc" placeholder="Enter your street, example: hasan sadiq" name="street" value="<?php if (isset($_POST["street"])) echo $_POST["street"]; ?>"><br>

                    <span class="errspan" style="color:red;font-size: 15px;font-weight:bold"><?php echo $bldg_number_err; ?></span><br>
                    <input required type="text" class="secondInputing-text" id="loc" placeholder="Enter your building number, example: 8621" maxlength="4" name="bldg_number" value="<?php if (isset($_POST["bldg_number"])) echo $_POST["bldg_number"]; ?>"><br>

                    <span class="errspan" style="color:red;font-size: 15px;font-weight:bold"><?php echo $postal_code_err; ?></span><br>
                    <input required type="text" class="secondInputing-text" id="loc" placeholder="Enter your postal code, example: 12471" maxlength="5"  name="postal_code" value="<?php if (isset($_POST["postal_code"])) echo $_POST["postal_code"]; ?>"><br>

                    <span class="errspan" style="color:red;font-size: 15px;font-weight:bold"><?php echo $_2nd_number_err; ?></span><br>
                    <input required type="text" class="secondInputing-text" id="loc" placeholder="Enter your secondary number, example: 4188" maxlength="4"  name="_2nd_number" value="<?php if (isset($_POST["_2nd_number"])) echo $_POST["_2nd_number"]; ?>"><br>

                    <p class="more-space-on-bottom"></p>
                    <input class="submit-btn" type="submit" value="Sign Up" /><br>
                   
                    <input class="button" id="resetbtn" type="reset" value="Reset">
                    <a href="LoginPage.php">
                        <input class="cancel-btn" type="button" value="Cancel">
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