<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Job Request Details</title>
    <link rel="stylesheet" type="text/css" href="../CSS_Files/viewJobRequestListStyle.css">
    <link rel="stylesheet" type="text/css" href="../CSS_Files/jobRequestStyle.css">
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

 <!--Page Content-->
 <?php
 include('../PHP_Files/connect_db.php');
if(isset($_GET['id'])){
// echo("set");
   $id = mysqli_real_escape_string($connection,$_GET['id']);

    $sql = "SELECT `kidsName`, `age`, `TypeOfServese`, `startTime`, `endTime`, `startDate`, `endDate`, `comments` FROM `kids` WHERE `kids`.`ID` = $id";

    $result = mysqli_query($connection,  $sql);
 //  $jobReq = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $valu = mysqli_num_rows($result);
}

 ?>


<h2 id="offerH2">Job Request Details</h2>

<?php print_r($jobReq);?>


<?php 

if($valu > 0 ){

$x = 0;
while($x< $valu  ){

$row = mysqli_fetch_row($result);

$kidsName = key($row);
next($row);


$age = key($row);
next($row);

$TypeOfServese = key($row);
next($row);

$startTime = key($row);
next($row);

$endTime = key($row);
next($row);

$startDate = key($row);
next($row);

$endDate = key($row);
next($row);

$comments = key($row);
next($row);

?> 
<div class="container">

<img src="female.png" id="sitterPic" alt="parent profile picture">
<p class="SitterInfo">
   <label class="nameLabel">Parent Name: </label>
   <label class="Name">Mona</label><br>

   <label class="cityLabel">City: </label>
   <label class="city">Riyadh</label> <br>

   <label class="neighborhoodLabel">District: </label>
   <label class="neighborhood">Alhamra</label> <br>
    <hr>
</p>

<p class="RequestInfo"> 

<label class="nameLabel">Kid/s Name: </label>
<label class="Name"><?php echo(($row[$kidsName]))?></label> <!-- <br><br> --> 

<label class="ageLabel">Kid/s Ages: </label>
<label class="age"><?php echo(($row[$age]))?></label><br><br>

<label class="serviceLabel">Type Of Service: </label>
<label class="service"><?php echo(($row[$TypeOfServese]))?></label><br><br>

<label class="dayLabel">Date: </label>
<label class="day"><?php echo(($row[$startDate]))?> - <?php echo(($row[$endDate])); ?> </label><br><br>

<label class="timeLabel">Time: </label>
<label class="time"><?php echo(($row[$startTime]))?> - <?php echo(($row[$endTime])); ?></label>
<br><br>


<label class="commentsLabel">Comments: </label>
<label class="comments"><?php echo(($row[$comments]))?> </label>
<br><br><br> 

<form action="../PHP_Files/sendOffer.php" method="POST">
<label class="OfferPriceDetails">Set Offer: 
                <input  name="OfferPrice" type="number" min="0" max="99999"> <span>SAR/hr</span>
            </label> <br>

            <input type="submit" class="sendOfferDetails" name="offerL_submit" value="Send Offer"/>
            <input type="button" class="goBack" onclick="location.href ='viewJobRequestList.php';" value="Go Back"/>
</form>
<!--
<label class="OfferPriceDetails" >Set Offer: 
   <input name="OfferPrice" type="number" min="0" max="99999"><span>SAR/hr</span>
</label> <br>

<div>
<br>
   <input type="button" class="sendOfferDetails" onclick="location.href ='#';" value="Send Offer"/>
   <input type="button" class="goBack" onclick="location.href ='viewJobRequestList.php';" value="Go Back"/>

   <form action="../PHP_Files/sendOffer.php" method="POST">
<label class="OfferPriceDetails">Set Offer: 
                <input  name="OfferPrice" type="number" min="0" max="99999"> <span>SAR/hr</span>
            </label> <br>

            <input type="submit" class="sendOfferDetails" name="offerL_submit" value="Send Offer"/>
            <input type="button" class="goBack" onclick="location.href ='viewJobRequestList.php';" value="Go Back"/>
</form>
</div> -->
</p>
</div>





<!-- end copy-->

<!-- <div class="container">

         <img src="female.png" id="sitterPic" alt="parent profile picture">
         <p class="SitterInfo">
            <label class="nameLabel">Parent Name: </label>
            <label class="Name">Mona</label><br>
 
            <label class="cityLabel">City: </label>
            <label class="city">Riyadh</label> <br>

            <label class="neighborhoodLabel">District: </label>
            <label class="neighborhood">Alhamra</label> <br>
             <hr>
         </p>
    
     <p class="RequestInfo"> 

        <label class="nameLabel">Kid/s Name: </label>
        <label class="Name"><?php echo(($row[$kidsName]))?></label><br><br>
        
        <label class="ageLabel">Kid/s Ages: </label>
        <label class="age"><?php echo(($row[$age]))?></label><br><br>

        <label class="serviceLabel">Type Of Service: </label>
        <label class="service"><?php echo(($row[$TypeOfServese]))?></label><br><br>

        <label class="dayLabel">Date: </label>
        <label class="day"><?php echo(($row[$startDate]) . ($row[$endDate]))?></label><br><br>

        <label class="timeLabel">Time: </label>
        <label class="time"><?php echo(($row[$startTime]) . ($row[$endTime]))?> </label>
        <br><br>
    
        <label class="commentsLabel">Comments: </label>
        <label class="comments"><?php echo(($row[$comments]))?></label>
        <br><br><br>
       

        <label class="OfferPriceDetails" >Set Offer: 
            <input name="OfferPrice" type="number" min="0" max="99999"><span>SAR/hr</span>
        </label> <br>
        
        <div>
        <br>
            <input type="button" class="sendOfferDetails" onclick="location.href ='#';" value="Send Offer"/>
            <input type="button" class="goBack" onclick="location.href ='viewJobRequestList.html';" value="Go Back"/>
    

        </div>
     </p>
 </div> -->
 
<!-- footer-->

<footer> 
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

 <?php } 
}//end if
?>
</body>
</html>