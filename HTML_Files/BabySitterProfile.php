<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>BabySitterProfile</title>
    <script src="https://kit.fontawesome.com/b8b24b0649.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS_Files/menustyle.css">
    <link rel="stylesheet" href="../CSS_Files/SitterProfileStyle.css">
    <link rel="stylesheet" href="../CSS_Files/footer.css">
    
</head>

<body>

    <!--Upper Menue-->


  <?php

  include("parentheader.php");
 if(!isset($_POST['SitterEmail'])) {
    header('Location:/BabySitterProject/HTML_Files/offerDetails.php');
    exit;
} 

include('../PHP_Files/connect_db.php');
 $email = $_POST['SitterEmail']; 
$sql = "SELECT `img`,`firstName`,`lastName`,`age`,`city`,`bio` FROM `babysitter` WHERE `email` = '$email' ";
$result = mysqli_query($connection,  $sql);
$row = mysqli_fetch_row($result);

$image = key($row);
next($row);

$fname = key($row);
next($row);

$lname = key($row);
next($row);

$age = key($row);
next($row);

$city = key($row);
next($row);

$bio = key($row);
next($row);
  ?>  
 

    <!--Content Of the page-->
    

    <div id="picBar">

        <!-- <video width="200px" height="100px" controls>
            <source src="ShortFilm.mp4" type="video/mp4">
        </video> -->
        <img src="<?php echo($row[$image ]);?>" id="sitterPic" alt="babystter picture">

        <label><?php echo($row[$fname])?>  <?php echo($row[$lname]) ?></label><br>
        <label class="sitterage"> <?php echo($row[$age])?> Years Old, <?php echo($row[$city])?></label><br>

       
    </div>
    <hr>

    <div id="Discription">
        <p>
  <?php  
  echo( $email);
    echo($row[$bio])
    ?>

        </p>

    </div>
    <!--End of Discription-->
    

    <!-- <div id="Experience">

        <i class="fa-solid fa-person-breastfeeding"></i> 
        <label class="headText">Experience with babysitting</label><br>
        <label class="subHeadText">> 12years</label><br>

        <i class="fa-brands fa-pagelines"></i> <label class="headText">Experience with age(s)</label><br>
        <label class="subHeadText">Baby . Toddler . Preschooler . Teenager</label> -->

    <!-- </div>  -->
    <!--End of Experience-->
  
<!-- 
    <div id="AboutMe">
        <h2>About Me</h2>

       <i class="fa-regular fa-id-card"></i> <label class="headText">Driver's license</label>
        <label class="subHeadText">Yes</label> -->
        <!-- <i class="fa-solid fa-person-breastfeeding"></i>  -->
        <!-- <label class="headText">Experience with babysitting</label><br>
        <label class="subHeadText">> 12years</label><br>

        <i class="fa-solid fa-school"></i> <label class="headText">Education</label>
        <label class="subHeadText" >Bachelor's Degree/High Schoole Degree</label>

        <i class="fa-solid fa-language"></i><label class="headText">Languages that I speak</label>
        <label class="subHeadText">Arabic/English</label>


    </div>  -->
    <!--End of AboutMe-->
  

   

    <!-- <div id="Skills">
        <h2>Skills</h2>
        <i class="fa-solid fa-scissors"></i> <label class="headText">Crafting</label>
        <i class="fa-solid fa-pen"></i><label class="headText">Drawing</label>
        <i class="fa-solid fa-book"></i> <label class="headText">Reading</label>
        <i class="fa-solid fa-gamepad"></i><label class="headText">Games</label>
    </div> -->
    <!--End of Skills-->
    <hr>

    <div id="Review">
        <h2>Reviews</h2>
    

      <?php 

      $q2 = "SELECT `feedBack`,`Rate` FROM `review` WHERE `babySitterEmail` = '$email'";
      $result2 = mysqli_query($connection,  $q2);

      $total5s = 0;
      $total4s = 0;
      $total3s = 0;
      $total2s = 0;
      $total1s = 0;
      $totalnumOfRates = 0;
    
      while(  $row2 = mysqli_fetch_row($result2) ){
        $review = key($row2);
        next($row2);

        $sitterRate = key($row2);
        next($row2);
      
      
      ?>

    <div class="commentDiv">
            <p>
                <?php 
                 $totalnumOfRates++;

                 switch($row2[$sitterRate]){
                    case 5: $total5s++; break;
                    case 4: $total4s++; break;
                    case 3: $total3s++; break;
                    case 2: $total2s++; break;
                    case 1: $total1s++; break;
                 }
                echo($row2[$review]);
                ?>

            </p>
        </div>
        <?php } // close while loop ?> 


    </div>
    <!--End of Reviews-->
    <hr>

    <div id="Rate">
        <h2>Rating</h2>
        <?php 
        $rateSum = (5*$total5s)+(4*$total4s)+(3*$total3s)+(2*$total2s)+(1*$total1s);
        $finalRate = $rateSum/$totalnumOfRates;
        settype($finalRate ,"integer");

        $count = 0;

        while($count < $finalRate){
            echo("<i class='fa-solid fa-star fa-2x'></i>");
            $count++;
        }
        ?>

        </div>

 
    <!--End of Rate-->
    <hr>





    <div id="shareProfile">
        <h2>Share this profile</h2>

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

    </div>
    <!--End of Share Profile-->


    <div id="ContactBar">

    <?php 
    
    $reqID = $_GET['id'];
    $q3 = "SELECT  `price`  FROM  `offers` WHERE `babySitterEmail` = '$email' AND `RequestID` =$reqID ";
    $result3 = mysqli_query($connection,  $q3);
    $row3 = mysqli_fetch_row($result3);
    $pr = key($row3);
    ?>

        <label><?php echo($row3[$pr])?> SAR/hr</label>
        <a href="mailto: babysitter@example.com"><button type="button">Contact <?php echo($row[$fname]) ?></button></a>


    </div>

    <!--Footer-->
    <footer class="rsitterProfile"> 
        <table class="tableF">
            <tr>
                <th><a href="aboutUs.html"> About Us </a></th>
                <th><a href="FAQ.html"> FAQs </a></th>
                <th><a href="ContactUs.html"> Contact Us </a></th>
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