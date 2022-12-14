<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b8b24b0649.js" crossorigin="anonymous"></script>
    <title>Login</title>
    <link href="http://fonts.cdnfonts.com/css/prettier-script" rel="stylesheet">
    <link rel="stylesheet" href="../CSS_Files/style.css">

<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">-->
</head>

<body>
   
    <div class="topofpage">
        <img src="thenewlogo.jpg" alt="a logo for A Watchful Eye website" class="logo-small">
        <p class="andname">A Watchful Eye</p>
    </div>


    <!--<div class="uppermenu">
        <img class="logo" src="babypic.png" alt="a baby pic"> 
    </div>-->
    <div class="container">
        <div class="section">
            <div class="subSection1">
                <div class="textdescription">
                    <p class="p1">A Watchful Eye</p>
                    <p class="p3">Loving and caring eye on your child</p>
                    <p class="p4">Connect with top babysitters in your area, select the best for your rest!</p>
                    <p class="p2">baby care</p>
                    <div class="logopic">
                        <img src="babypico.png" alt="a baby carrige">
                    </div>
                </div>

                <!-- <div class="logopic">
                    <img src="logo.png" alt="a baby carrige"> 
                </div> -->
            </div>

            <div class="subSection2">
                <div class="Form-login">
                    <h2 class="logHead"> Login </h2>

                    <form action="../PHP_Files/loginprossses.php" method="post">
                        <?php
if(isset($_GET['error'])){

if($_GET['error'] == 'failToLogIn'){
    ?>
    <div class="alert alert-danger" role="alert">
    Wrong email/password, please enter a correct one!
</div>
    <!--<small class="in-log-in">Please Enter correct email and password</small>-->
    
<?php
}}

?>
                        <label class="FLabel"> Email: </label>
                        <input type="email" name="uEmail" placeholder="Enter your Email" required>

                        <label class="FLabel"> Password: </label>
                        <input class="Buttons" type="Password" name="uPassword" placeholder="Enter your password" required><br>

                        <input class="submit-btn" type="submit" name="submit"
                            value="Login" />
                        <input type="reset" value="Reset">
                        <a href="">
                            <input class="cancel-btn" type="button" value="Cancel">
                        </a>
                        <div class="or">
                            <hr>
                            <span>OR</span>
                        </div>
                        <br>
                        <div class="moveAcc">
                        <p class="first-para">Don't have an account yet?</p>
                        <p class="second-para">Join us as a parent now! <a href="signUpParents.php">Sign Up</a></p>
                        <p class="second-para">Join us as a babysitter now! <a href="signUpBabySitter.php">Sign Up</a></p>
                       </div>
                        <hr>
                        <br>
                        
                    </form>

                </div>
            </div>
        </div>

        <footer>
            <table class="tableF">
                <tr>
                    <th><a href="aboutUs.html"> About Us </a></th>
                    <th><a href="FAQ.html"> FAQs </a></th>
                    <th><a href="ContactUs.php"> Contact Us </a></th>
                </tr>
            </table>
            <div id="shareWeb">
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

