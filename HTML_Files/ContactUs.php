<?php
require("../PHP_Files/query.php");
$name_err = $email_err = $msg_err = $notification = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name_err = $email_err = $msg_err = $notification = "";
    $name = validate($_POST["name"]);
    $email = validate($_POST["email"]);
    $msg = validate($_POST["bio"]);
    
    $valid = true;

    if ($name == ""|| !ctype_alpha($name)) {
        $name_err = " please enter a valid name";
        $valid = false;
    }
    if ($email == ""|| !filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $email_err = " please enter a valid email";
        $valid = false;
    }
    if ($msg == "") {
        $msg_err = " please enter a valid message";
        $valid = false;
    }


    if ($valid && contact_us_handler($name, $email, $msg)) {
//        $notification = 'Your message has been successfully received';
        $_POST["name"] = $_POST["email"] = $_POST["bio"] = "";
        echo '<script>alert("Your message has been sent successfully!");window.location.href="ContactUs.php";</script>';


    }
}
?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b8b24b0649.js" crossorigin="anonymous"></script>
    <title> ContactUs</title>
    <link rel="stylesheet" href="../CSS_Files/style.css">
    <link rel="stylesheet" href="../CSS_Files/menustyle.css">
    <script src="https://kit.fontawesome.com/a71707a89a.js" crossorigin="anonymous"></script>
    <style>
        #popUpBox {
            width: 500px;
            overflow: hidden;
            background: #fff59d;
            box-shadow: 0 0 10px black;
            border-radius: 10px;
            position: absolute;
            top: 50%;
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

    <div class="Form">


        <h2 class="conttitle"> Contact Us </h2>
        <h3 class="conttitle"> Please feel free to contact us with feedback, questions and suggestions! </h3>

        <div id="popUpOverlay"></div>
        <div id="popUpBox">
            <div id="box">
                <i class="fas fa-check-circle fa-5x"></i>
                <h1><?php echo $notification; ?></h1>
                <div id="closeModal"></div>
            </div>
        </div>
        <form action=" <?php echo $_SERVER["PHP_SELF"]; ?>" method="post">

            <label class="FLabel"> Name: <span style="color:red;font-size: 15px;"> <?php echo $name_err; ?></span></label>
            <input type="text" placeholder="Enter your name" name="name" required value="<?php if (isset($_POST["name"])) echo $_POST["name"]; ?>">


            <label class="FLabel"> Email: <span style="color:red;font-size: 15px;"> <?php echo $email_err; ?></span></label>
            <input type="email" placeholder="Enter your email" name="email" required value="<?php if (isset($_POST["name"])) echo $_POST["email"]; ?>" />


            <label class=" FLabel"> Message:<span style="color:red;font-size: 15px;"><?php echo $msg_err; ?></span></label><textarea name="bio" class="bio" style="font-weight: normal !important;" rows="15" placeholder=" Enter your message" cols="30" required><?php if (isset($_POST["bio"])) echo $_POST["bio"]; ?></textarea><br>

            <input class="submit-btn" type="submit" value="Send" name="contactus" style="margin-top:0;">

            <a href="LoginPage.php">
                <input class="cancelspec" type="button" value="Cancel">
            </a>




        </form>

    </div>


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

</body>

</html>