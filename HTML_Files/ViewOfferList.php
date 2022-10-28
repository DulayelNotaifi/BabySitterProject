
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Offer List</title>
    <link rel="stylesheet" type="text/css" href="../CSS_Files/viewOfferListStyle.css">
    <link rel="stylesheet" href="../CSS_Files/menustyle.css">
    <link rel="stylesheet" href="../CSS_Files/footer.css">
    <script src="https://kit.fontawesome.com/b8b24b0649.js" crossorigin="anonymous"></script>
</head>

<body>


    <!--Upper Menue-->
    <div class="topofpage">
        <img src="thenewlogo.jpg" alt="a logo for A Watchful Eye website" class="logo-small">
        <p class="andname">A Watchful Eye</p>
    </div>
    <div class="uppermenu">
        <div class="tab0">
            <a href="parenthome.html">Home</a>
        </div>
        <div class="tab1">
            <a href="">Manage profile </a>
            <div class="dropdown-content">
                <a href="viewparent.html">View</a>
                <a href="parenteditprofile.html">Edit</a>
                <a class="last" href="deleteparent.html">delete</a>
            </div>
        </div>
        <div class="tab2">
            <a href="#">Job request </a>
            <div class="dropdown-content">
                <a href="postingJobRequest.html">Post request </a>
                <a href="editingJobRequest.html">Edit request</a>
                <a class="last" href="cancelingJobRequest.html">Cancel request</a>
            </div>
        </div>

        <div class="tab3 need-more">
            <a href="viewbookings.html">View booking </a>
            <div class="dropdown-content">
                <a href="viewCurrentBookings.html">View current bookings </a>
                <a class="last" href="viewPreviousBookings.html">View previous bookings
                </a>
            </div>
        </div>
        <div class="tab4">
            <a href="../HTML_Files/ViewOfferList.php">View offer list</a>
        </div>
        <div class="logout">
            <a href="../HTML_Files/LoginPage.html">Logout</a>
        </div>

    </div>

    <h2>Choose a Request to display offers</h2>
    

    <!-- Requests template Example-->
    <div id="content">


 <?php

 // connect to db
$servername= "localhost";
$username= "root" ;
$password= "";
$dbname= "381project" ;
$connection= mysqli_connect($servername,$username,$password,$dbname);
$database= mysqli_select_db($connection, $dbname);
// Check the connection
if (!$connection) 
die("Connection failed: ".mysqli_connect_error());


$val1 = "SELECT `TypeOfServese`,`KidsName`,`age`,`startDate`,`startTime`  FROM `parent` INNER JOIN `kids` WHERE `parent`.`email` = `kids`.`ParentEmail`";


$result = mysqli_query($connection, $val1);

// if(! $result )
// echo("wrong");
// else
// echo("correct");
$valu = mysqli_num_rows($result);
// echo($valu);
// echo($row['TypeOfServese']);
// mysql_close($connection);
?>


<?php

$x = 0;
while($x< $valu  ){

 $row = mysqli_fetch_row($result);

  $service = key($row);
   next($row);

   $kids = key($row);
   next($row);

   $ages = key($row);
   next($row);

   $day = key($row);
   next($row);

   $time = key($row);
   next($row);

echo("<div> 
<p class='req'>
<label class='serviceLabel'>Type Of Service: </label>
<label class='service'>$row[$service]</label><br>
<label class='nameLabel'>Kid/s Name: </label>
<label class='name'>$row[$kids]</label><br>

<label class='ageLabel'>Kid/s Age: </label>
<label class='age'>$row[$ages]</label><br>

<label class='dayLabel'>Day: </label>
<label class='day'>$row[$day] </label><br>

<label class='timeLabel'>Time: </label>
<label class='time'>$row[$time]</label>
<br><br>
<a href='../HTML_Files/OfferDetails.html'> Offers </a>

</p>

</div>");
$x++;  
        }
        
    

    ?>
     </div>

        <!-- <div> 
            <p class="req">
            <label class="serviceLabel">Type Of Service: </label>
            <label class="service">Child care</label><br>
            <label class="nameLabel">Kid/s Name: </label>
            <label class="name">Abdullah</label><br>
            
            <label class="ageLabel">Kid/s Age: </label>
            <label class="age">5</label><br>
    
            <label class="dayLabel">Day: </label>
            <label class="day">3/10/2022 </label><br>
    
            <label class="timeLabel">Time: </label>
            <label class="time">5:00PM - 9:00PM </label>
            <br><br>
         <a href="../HTML_Files/OfferDetails.html"> Offers </a>

        </p>
    
         </div> -->

    <!-- <div> 
        <p class="req">
            <label class="serviceLabel">Type Of Service: </label>
            <label class="service">Child care</label><br>
            <label class="nameLabel">Kid/s Name: </label>
            <label class="name">Ahmed</label><br>
            
            <label class="ageLabel">Kid/s Age: </label>
            <label class="age">12</label><br>
    
            <label class="dayLabel">Day: </label>
            <label class="day">3/11/2022 </label><br>
    
            <label class="timeLabel">Time: </label>
            <label class="time">5:00PM - 9:00PM </label><br><br>
            
         <a href="../HTML_Files/OfferDetails.html"> Offers </a>

        </p> -->
    <!-- </div> -->
          

<!-- End of offers list-->



    <!-- footer-->

    <footer class="OfferListFooter"> 
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
