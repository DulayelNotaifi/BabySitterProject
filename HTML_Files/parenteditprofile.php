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
            <form action="../PHP_Files/editparentproccess.php"method="POST" enctype="multipart/form-data">
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
                <label for="firstname">First Name:</label>
                <input type="text" class="inputing-text" id="firstname" name="firstname"placeholder="Enter your first name"
                value="<?php echo $row['firstName']; ?>">
                <label for="lastname">Last Name:</label>
                <input type="text" class="inputing-text" id="lastname" name="lastname"placeholder="Enter your last name"
                value="<?php echo $row['lastName']; ?>">
                <label for="eMail">Email:</label>
                <input type="email" class="inputing-text" id="eMail" name="eMail"placeholder="Enter your new email"
                value="<?php echo $row['email']; ?>">
                <!--<label for="city">City:</label>
                <input type="text" class="inputing-text" id="city" name="city"placeholder="Enter your new city">-->
                <label >Address:</label><br>
                    <input type="text" class="inputing-text" id="loc" name= "City" placeholder= "City"
                    value="<?php echo $row['City']; ?>">
                    <input type="text" class="inputing-text" id="loc" name="District"placeholder="District"
                    value="<?php echo $row['District']; ?>">
                    <input type="text" class="inputing-text" id="loc" name="Street"placeholder="Street"
                    value="<?php echo $row['Street']; ?>">
                    <input type="text" class="inputing-text" id="loc" name="BuildingNumber"placeholder="Building number"
                    value="<?php echo $row['BuildingNumber']; ?>"> 
                    <input type="text" class="inputing-text" id="loc" name="PostalCode"placeholder="Postal code"
                    value="<?php echo $row['PostalCode']; ?>">
                    <input type="text" class="inputing-text"id="loc" name="SecondaryNumber"placeholder="Secondary number"
                    value="<?php echo $row['SecondaryNumber']; ?>">
                
                <label for="password">Password:</label>
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