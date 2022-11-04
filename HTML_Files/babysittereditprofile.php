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
    <title>baby sitter edit profile</title>
    <link href="http://fonts.cdnfonts.com/css/prettier-script" rel="stylesheet">
    <link rel="stylesheet" href="../CSS_Files/menustyle.css">
    <link rel="stylesheet" href="../CSS_Files/editstyle.css">
    <script src="https://kit.fontawesome.com/b8b24b0649.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS_Files/footer.css">
</head>

<body>
<?php include("bbystrheader.php");?>
    <h2>Edit profile:</h2>
    <div class="cont need-bottom-space">
        <div class="contentedit">

            <form action="http://localhost/BabySitterProject/PHP_Files/editbbystrproccess.php" method="POST" enctype="multipart/form-data">
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
                                
                <label for="firstname">First Name:</label>
                <input type="text" class="inputing-text" id="firstname" name="firstname" placeholder="Enter your first name"
                value="<?php echo $row['firstName']; ?>">
                <label for="lastname">Last Name:</label>
                <input type="text" class="inputing-text" id="lastname" name="lastname" placeholder="Enter your last name"
                value="<?php echo $row['lastName']; ?>">
                <p class="more-space-on-bottom"></p>
                <label>Gender:</label>
                <p class="more-space-on-bottom"></p>
                <input type="radio" name="gender" value="male"<?php if (isset($row['gender']) && strtolower($row['gender'])=="male") echo "checked";?>> Male
                <input type="radio" name="gender" value="female"<?php if (isset($row['gender']) && strtolower($row['gender'])=="female") echo "checked";?>> Female
                <p class="more-space-on-bottom"></p>
                <label for="id">ID:</label>
                <input type="text" class="inputing-text" id="id" name="id" placeholder="Enter your ID"
                value="<?php echo $row['ID']; ?>">
                <label for="age">Age:</label>
                <input type="text" class="inputing-text" id="age" name="age" placeholder="Enter your age"
                value="<?php echo $row['age']; ?>">

                <label for="eMail">Email:</label>
                <input type="email" class="inputing-text" id="eMail" name="eMail" placeholder="Enter your new email"
                value="<?php echo $row['email']; ?>">
                <label for="city">City:</label>
                <input type="text" class="inputing-text" id="city" name="city" placeholder="Enter your new city"
                value="<?php echo $row['city']; ?>">
                <label for="phone">Phone:</label>
                <input type="text" class="inputing-text" id="phone" name="phone" placeholder="Enter your new phone"
                value="<?php echo $row['phone']; ?>">
                <label for="password">Password:</label>
                <input type="password" class="inputing-text" id="password" name="password" placeholder="Enter your new password">
                <label for="bio">Bio:</label>
                <p class="more-space-on-bottom"></p>
                <textarea name="biotextbox" id="bio" name="bio" rows="10" placeholder=" Enter the bio, such as: years of experience, education, languages spoken, skills, etc">
                <?php echo $row['bio']; ?>
                </textarea>
                <p class="more-space-on-bottom"></p>
                <input class="botton-bigger" type="submit" name="submit" value="Update" />

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
