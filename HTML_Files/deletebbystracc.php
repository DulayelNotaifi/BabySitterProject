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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete baby sitter account</title>
    <link href="http://fonts.cdnfonts.com/css/prettier-script" rel="stylesheet">
    <link rel="stylesheet" href="../CSS_Files/menustyle.css">
    <link rel="stylesheet" href="../CSS_Files/editstyle.css">
    <script src="https://kit.fontawesome.com/b8b24b0649.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS_Files/footer.css">

</head>

<body>
<?php include("bbystrheader.php");?>
    <div class="down-more-cont">
        <div class="backy">
        <form action="http://localhost/BabySitterProject/PHP_Files/deletebbystraccprosses.php" method="POST" enctype="multipart/form-data">
            
            <label for="password">Please enter your password to delete your account:</label>
            <?php
if(isset($_GET['error'])){

if($_GET['error'] == 'failToDelete'){
    ?>
    
    <span style="color:red;">
    please enter correct password
</span>
    
<?php
}
elseif($_GET['error'] == 'acceptedOffer'){
    ?>
    
    <span style="color:red;">
    <br>
    you have an accepted offer that has not came yet you are unable to delete your account
</span>
    
<?php

}}
?>
            
            <input type="password" class="inputing-text" id="password" name="uPassword" placeholder="Enter your password" required>
            <p id="onlyDelNow"class="more-space-on-bottom"></p>

            <input class="botton-bigger" type="submit" onclick="return confirm('Are you sure you want to delete your account ?')" name="submit" value="delete account" />
        </form>
    </div>
    </div>
    <footer class="acad"> 
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