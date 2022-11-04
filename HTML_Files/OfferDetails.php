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

       $sql = "SELECT `babySitterName` ,`TypeOfServese`,`startDate`,`startTime`,`endTime`,`comments`, `price` ,`expireDate`,`offerstatus`  FROM `requests` INNER JOIN `offers` WHERE `offers`.`RequestID` = $id AND `requests`.`ID` = $id";

       $result = mysqli_query($connection,  $sql);
    //  $offers = mysqli_fetch_all($result, MYSQLI_ASSOC);
       $valu = mysqli_num_rows($result);
   }// end if set

    ?>


<h2 id="offerH2">Request Offers</h2>



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

   $offstatus = key($row);
   next($row);

   if($row[$offstatus] == "Rejected") continue;

?> 
        <div class="container">

        <img src="female.png" id="sitterPic" alt="babystter picture">

        <p class="SitterInfo">
        <label class="nameLabel">Babysitter Name: </label>
       <label class="Name"><?php echo(($row[$babySitterName]))?></label><br>
       <a href="../HTML_Files/BabySitterProfile.html">View babystter Profile</a>  <!-- will be modified later -->
       <hr>
       </p>


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
 <label class="expireDate"><?php echo(($row[$expireDate]))?></label><br>

 <div id="chose">
 <button class ="Accept" onclick="return checkAcce()"
  style="  position: absolute;
    height: 30px;
    margin-left: 30500px;
    border-style: solid;
    background-color: white; 
    font-weight: bold; 
    border: 1px solid black;    width:110px;
    background-color: white; 
    font-weight: bold; 
    margin-left: 190px;
    color: rgb(39, 141,7);">
    <a style="  color: rgb(39, 141,7);
    text-decoration: none;" href='../PHP_Files/addrecord.php?id=<?php echo($id)?>&name=<?php echo($row[$babySitterName]) ?>'>Accept</a></button>
 <button class="Reject" onclick="return checkDelet()"
 style="position: realative;
    height: 30px;
    margin-left: 30500px;
    border-style: solid;
    background-color: white; 
    font-weight: bold; 
    border: 1px solid black;    width:110px;
    margin-left: 330px; margin-bottom:1px;
    color: rgb(254, 9,9);">
    <a style=" color: rgb(254, 9,9);
    text-decoration: none;"href='../PHP_Files/deletrecord.php?id=<?php echo($id) ?>&name=<?php echo($row[$babySitterName]) ?>'>Reject</a></button>
</div>



</p>
</div> <!-- End container -->

<?php


 $x++;  
}//end while loop 
}//end if
else{

?>

<div class="container" >
    <h2 >Offers are cooming soon!</h2>
</div>
 <?php }//close else ?>

 <script>

 function checkDelet(){
    return confirm("Are you sure you want to Reject offer?");
}

function checkAcce(){
    return confirm("Are you sure you want to Accept offer?");
}

</script>





<!-- footer-->
<div class="detailspage">
<footer> 
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

</div>
</body>
</html>