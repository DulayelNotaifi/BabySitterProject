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
    <title>view baby sitter profile</title>
    <link href="http://fonts.cdnfonts.com/css/prettier-script" rel="stylesheet">
    <link rel="stylesheet" href="../CSS_Files/menustyle.css">
    <link rel="stylesheet" href="../CSS_Files/editstyle.css">
    <script src="https://kit.fontawesome.com/b8b24b0649.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS_Files/footer.css">

</head>

<body>
<?php include("bbystrheader.php");?>

    <h2>My profile:</h2>
    <div class="cont need-bottom-space">
        <div class="contentedit">
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


            <p class="needs-container"> First Name: <span class="par"><?php echo $row['firstName']; ?></span>
            </p>
            <p class="more-space-on-bottom"></p>
            <p class="needs-container">
                Last Name:
                <span class="par"> <?php echo $row['lastName']; ?></span>
            </p>
            <p class="more-space-on-bottom"></p>
            <p class="needs-container"> Gender: <span class="par"><?php echo $row['gender']; ?></span>
            </p>
            <p class="more-space-on-bottom"></p>
            <p class="needs-container"> ID:
                <span class="par"><?php echo $row['ID']; ?></span>
            </p>
            <p class="more-space-on-bottom"></p>
            <p class="needs-container"> Age:
                <span class="par"><?php echo $row['age']; ?></span>
            </p>
            <p class="more-space-on-bottom"></p>
            <p class="needs-container"> Email:
                <span class="par"><?php echo $row['email']; ?></span>
            </p>
            <p class="more-space-on-bottom"></p>
            <p class="needs-container"> City:
                <span class="par"><?php echo $row['city']; ?></span>
            </p>
            <p class="more-space-on-bottom"></p>
            <p class="needs-container"> Phone:
                <span class="par"><?php echo $row['phone']; ?></span>
            </p>
            <p class="more-space-on-bottom"></p>
            <p class="bio-par"> Bio:
                <span class="par">
                <?php echo $row['bio']; ?>
                </span>
            </p>

        </div>
        <div class="forthepic">
        <img src="../public/userImages/<?php echo $row['img']; ?>" alt="profile picture"/> 
        </div>
    </div>
    <?php
}}}  ?>
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