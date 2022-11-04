
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
include('../PHP_Files/connect_db.php');
$val1 = "SELECT `TypeOfServese`,`startDate`,`startTime` ,`endTime`,`ID`,`status` FROM `parent` INNER JOIN `requests` WHERE `parent`.`email` = `requests`.`ParentEmail` " ;
//$kidss = "SELECT `kidName`,`kidAge` FROM `kids` INNER JOIN `requests` WHERE `kids`.`ID` = `requests`.`ID`";

$result1 = mysqli_query($connection, $val1);
//$result2 = mysqli_query($connection, $kidss);

$valu = mysqli_num_rows($result1);
?>


<?php


// $currentDate = mktime(0, 0, 0, date("d")+1, date("m"), date("Y")); 

$x = 0;
$y=0;

while($x< $valu  ){

 $x++;  
 $row = mysqli_fetch_row($result1);

  $service = key($row);
   next($row);

//    $kids = key($row);
//    next($row);

//    $ages = key($row);
//    next($row);

   $day = key($row);
   next($row);

   $stime = key($row);
   next($row);

   $etime = key($row);
   next($row);

   $id = key($row);
   next($row);

   $status = key($row);
   next($row);

   


   if($row[$status] == "unserved") {$y=-1; } 
   if($row[$status] == "served") continue;

$kidss = "SELECT `kidName`,`kidAge` FROM `kids` WHERE `kids`.`ID` = $row[$id]";
$result2 = mysqli_query($connection, $kidss);
?>

<div> 
<p class='req'>
<label class='serviceLabel'>Type Of Service: </label>
<label class='service'><?php echo($row[$service])?></label><br>
<label class='nameLabel'>Kid/s : </label><br>
<label class='name'><?php

while($kidrow = mysqli_fetch_row($result2)){
    $kname = key($kidrow);
    next($kidrow);

    $kAge = key($kidrow);
    next($kidrow);

    //$ages[] = $kidrow[$kAge];

     echo $kidrow[$kname].": ".$kidrow[$kAge]." Years<br>";
       
}

?></label>



<label class='dayLabel'>Day: </label>
<label class='day'><?php echo($row[$day])?></label><br>

<label class='timeLabel'>Time: </label>
<label class='time'><?php echo($row[$stime])?> - <?php echo($row[$etime])?></label>
<br><br>
<a href='../HTML_Files/OfferDetails.php?id=<?php echo($row[$id])?>'> Offers </a>
</p>

</div>

<?php
// $x++;  
 }//end while
 ?>

</div>

 <?php 

      if($y == 0){
 ?>
   
   <div class="container" >
    <h2 >YOU DO NOT HAVE ANY REQUESTS</h2>
</div>
<?php } ?>
     

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
