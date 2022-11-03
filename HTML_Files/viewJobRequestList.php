<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Job Request List</title>
    <link rel="stylesheet" type="text/css" href="../CSS_Files/viewOfferListStyle.css">
    <!-- <link rel="stylesheet" type="text/css" href="../CSS_Files/viewJobRequestListStyle.css"> -->
    <link rel="stylesheet" href="../CSS_Files/menustyle.css">
    <link rel="stylesheet" href="../CSS_Files/footer.css">
    <script src="https://kit.fontawesome.com/b8b24b0649.js" crossorigin="anonymous"></script>
</head>

<body>

      <!--menu-->
      <div class="topofpage">
        <img src="thenewlogo.jpg" alt="a logo for A Watchful Eye website" class="logo-small">
        <p class="andname">A Watchful Eye</p>
    </div>
    <div class="uppermenu">
        <div class="tab0">
            <a href="babysitterhome.html">Home</a>
        </div>
        <div class="tab1">
            <a href="">Manage Profile </a>
            <div class="dropdown-content">
                <a href="viewbbystr.html">View</a>
                <a href="babysittereditprofile.html">Edit</a>
                <a class="last" href="deletebbystracc.html">Delete</a>
            </div>
        </div>
        <div class="tab2">
            <a href="viewJobRequestList.html">Job Request List </a>
 
        </div>

        <div class="tab3 need-more">
            <a href="viewJobs.html">Jobs </a>
            <div class="dropdown-content">
                <a href="viewcurrentjobs.html">Current Job</a>
                <a href="viewPreviousJobs.html">Previous Jobs</a>
            </div>
        </div>


        <div class="tab4">
            <a href="ViewOffersWithTheirStatus.html">My Offers with Their Status</a>
        </div>
        <div class="tab4">
            <a href="ViewRate.html">Rates and Reviews
            </a>
        </div>
        
        <div class="logout">
            <a href="../HTML_Files/LoginPage.html">Logout</a>
        </div>
    </div>
    <!--end menu-->


        <h2>Job Request List</h2>
        <div id="content">


<?php

// connect to db
include('../PHP_Files/connect_db.php');

$val1 = "SELECT `TypeOfServese`,`startDate`, `endDate` ,`startTime` ,`endTime`,`ID`  FROM `parent` INNER JOIN `kids` WHERE `parent`.`email` = `kids`.`ParentEmail`";
$result = mysqli_query($connection, $val1);
//`kidsName`, `age`, `TypeOfServese`, `startTime`, `endTime`, `startDate`, `endDate`, `comments`, `parentName`, `ID`, `status`, `ParentEmail`)
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

  $start_day = key($row);
  next($row);

  $end_day = key($row);
  next($row);

  $start_time = key($row);
  next($row);

  $end_time = key($row);
  next($row);

  $id = key($row);
  next($row);
?>
<div> 
<p class='req'>
<label class='serviceLabel'>Type Of Service: </label>
<label class='service'><?php echo($row[$service])?></label><br>
<!--<label class='nameLabel'>Kid/s Name: </label>
<label class='name'><?php echo($row[$kids])?></label><br>

<label class='ageLabel'>Kid/s Age: </label>
<label class='age'><?php echo($row[$ages])?></label><br> -->

<label class='dayLabel'>Day/s: </label>
<label class='day'><?php echo($row[$start_day] .' - ' . $row[ $end_day] )?></label><br>

<label class='timeLabel'>Time: </label>
<label class='time'><?php echo($row[$start_time] .' - ' . $row[ $end_time])?></label>
<br>
<a href='../HTML_Files/viewJobRequestDetails1.php?id=<?php echo($row[$id])?>'>View Job Request Details</a>
<form action="../PHP_Files/sendOffer.php" method="POST">
<label class="OfferPrice">Set Offer: 
                <input  name="OfferPrice" type="number" min="0" max="99999"> <span>SAR/hr</span>
            </label> <br><br>

            <input type="submit" class="sendOffer" name="offerL_submit" value="Send"/>
</form>
</p>

</div>
<?php
$x++;  
       }


   ?>
    </div>


            <!-- aaaaaaaaaaaa-->
        <!--
    <div class="jobRequestListPage">
        <h2>Job Request List</h2>
        
        <div class="jobReq1"> 
            
          <p>
            <label class="nameLabel">Kid/s Name: </label>
            <label class="Name">Norah</label><br>
            
            <label class="ageLabel">Kid/s Ages: </label>
            <label class="age">3</label><br>
    
            <label class="serviceLabel">Type Of Service: </label>
            <label class="service">Child care</label><br>
    
            <label class="dayLabel">Day: </label>
            <label class="day">3/10/2022 </label><br>
    
            <label class="timeLabel">Time: </label>
            <label class="time">5:00PM - 9:00PM </label>
            <br>
    
             <a href="viewJobRequestDetails1.html">View Job Request Details</a> <br> 
    
          </p>
    
            
            <label class="OfferPrice">Set Offer: 
                <input  name="OfferPrice" type="number" min="0" max="99999"> <span>SAR/hr</span>
            </label> <br><br>

            <button class="sendOffer" onclick="location.href ='#'">Send Offer</button>
        

        </div>

        <div class="jobReq2"> 
          <p>
            <label class="nameLabel">Kid/s Name: </label>
            <label class="Name">Sara</label><br>
        
            <label class="ageLabel">Kid/s Ages: </label>
            <label class="age">4</label><br>

            <label class="serviceLabel">Type Of Service: </label>
            <label class="service">Child care</label><br>

            <label class="dayLabel">Day: </label>
            <label class="day">1/10/2022 </label><br>

            <label class="timeLabel">Time: </label>
            <label class="time">7:00PM - 9:00PM </label>
            <br>

            <a href="#">View Job Request Details</a> <br> 

          </p>

        
            <label class="OfferPrice">Set Offer: 
                <input name="OfferPrice" type="number" min="0" max="99999"> <span>SAR/hr</span>
            </label> <br><br>

            <button class="sendOffer" onclick="location.href ='#'">Send Offer</button>
     
        </div> -->

    </div> 

    <footer> <!-- footer -->
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
        </footer> <!-- end footer -->
</body>
</html>