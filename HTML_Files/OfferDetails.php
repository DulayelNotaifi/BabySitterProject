<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../CSS_Files/jobRequestStyle.css">
    <link rel="stylesheet" href="../CSS_Files/menustyle.css">
    <script src="https://kit.fontawesome.com/b8b24b0649.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS_Files/footer.css">
    <title>Offer Details</title>
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


    <!--Page Content-->

    <?php
    include('../PHP_Files/connect_db.php');
   if(isset($_GET['id'])){
   // echo("set");
      $id = mysqli_real_escape_string($connection,$_GET['id']);

       $sql = "SELECT `babySitterName` ,`TypeOfServese`,`startDate`,`startTime`,`endTime`,`comments`, `price` ,`expireDate`  FROM `kids` INNER JOIN `offers` WHERE `offers`.`RequestID` = $id AND `kids`.`ID` = $id";

       $result = mysqli_query($connection,  $sql);
    //  $offers = mysqli_fetch_all($result, MYSQLI_ASSOC);
       $valu = mysqli_num_rows($result);
   }

    ?>


<h2 id="offerH2">Request Offers</h2>

<?php print_r($offers);?>

    


 <?php 

 if($valu > 0 ){

$x = 0;
while($x< $valu  ){

 $row = mysqli_fetch_row($result);

  $babySitterName = key($row);
   next($row);


   $TypeOfServese = key($row);
   next($row);

   $startDate = key($row);
   next($row);

   $startTime = key($row);
   next($row);

   $endTime = key($row);
   next($row);

   $comments = key($row);
   next($row);

   $price = key($row);
   next($row);

   $expireDate = key($row);
   next($row);

?> 
        <div class="container">

        <img src="female.png" id="sitterPic" alt="babystter picture">

        <p class="SitterInfo">
        <label class="nameLabel">Babysitter Name: </label>
       <label class="Name"><?php echo(($row[$babySitterName]))?></label><br>
       <a href="../HTML_Files/BabySitterProfile.html">View babystter Profile</a>  <!-- will be modified later -->
       <hr>
       </p>

         

            <!-- <img src="female.png" id="sitterPic" alt="babystter picture">
            <p class="SitterInfo">
                <label class="nameLabel">Babysitter Name: </label>
                <label class="Name">sara</label><br>
    
                <a href="../HTML_Files/BabySitterProfile.html">View babystter Profile</a>
                <hr>

            </p> -->

 <p class="RequestInfo"> 

<label class="serviceLabel">Type Of Service: </label>
<label class="service"><?php echo(($row[$TypeOfServese]))?></label><br><br>

<label class="dayLabel">Day: </label>
<label class="day"><?php echo(($row[$startDate]))?> </label><br><br>

<label class="timeLabel">Time: </label>
<label class="time"><?php echo(($row[$startTime])) ?> - <?php echo(($row[$endTime]))?></label>
<br><br>

<label class="commentsLabel">Comments: </label>
<label class="comments"><?php echo(($row[$comments]))?> </label>
<br><br>


 <label class="PriceLabel">Offered price/hr: </label>
 <label class="Price"><?php echo(($row[$price]))?> SAR</label> <br><br>
 <label class="Expirelabel">Offer expire date: </label>
 <label class="expireDate"><?php echo(($row[$expireDate]))?></label><br><br>

 <button class="Accept" onclick="location.href ='../HTML_Files/parenthome.html'">Accept</button>
 <button class="Reject"onclick="location.href ='../HTML_Files/parenthome.html'">Reject</button>


</p>
</div> 
 <?php } 
}//end if
else{
?>

<div class="container">
    <h2>Offers are cooming soon!</h2></div>
<?php } ?>
        <!-- <p class="RequestInfo"> 

            <label class="serviceLabel">Type Of Service: </label>
            <label class="service">Child care</label><br><br>
    
            <label class="dayLabel">Day: </label>
            <label class="day">1/10/2022 </label><br><br>
    
            <label class="timeLabel">Time: </label>
            <label class="time">7:00PM - 9:00PM </label>
            <br><br>
        
            <label class="commentsLabel">Comments: </label>
            <label class="comments">No comment added </label>
            <br><br>


             <label class="PriceLabel">Offered price/hr: </label>
             <label class="Price">50 SAR</label> <br><br>
             <label class="Expirelabel">Offer expire date: </label>
             <label class="expireDate">30/9/2022</label><br><br>

             <button class="Accept" onclick="location.href ='../HTML_Files/parenthome.html'">Accept</button>
             <button class="Reject"onclick="location.href ='../HTML_Files/parenthome.html'">Reject</button>

           
        </p>
    </div> -->
<!-- 
    <div class="container">
   

        <img src="female.png" id="sitterPic" alt="babystter picture">
        <p class="SitterInfo">
            <label class="nameLabel">Babysitter Name: </label>
            <label class="Name">maha</label><br>

            <a href="#">View babystter Profile</a>
            <hr>
        </p>

    <p class="RequestInfo"> 

        <label class="serviceLabel">Type Of Service: </label>
        <label class="service">Child care</label><br><br>

        <label class="dayLabel">Day: </label>
        <label class="day">1/10/2022 </label><br><br>

        <label class="timeLabel">Time: </label>
        <label class="time">7:00PM - 9:00PM </label>
        <br><br>
    
        <label class="commentsLabel">Comments: </label>
        <label class="comments">No comment added </label>
        <br><br>


         <label class="PriceLabel">Offered price/hr: </label>
         <label class="Price">80 SAR</label> <br><br>
         <label class="Expirelabel">Offer expire date: </label>
         <label class="expireDate">30/9/2022</label><br><br>

         <button class="Accept" onclick="location.href ='../HTML_Files/parenthome.html'">Accept</button>
         <button class="Reject"onclick="location.href ='../HTML_Files/parenthome.html'">Reject</button>

       
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

   
</body>
</html>