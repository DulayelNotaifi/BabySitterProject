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

    <style>
        html, body {
    height: 100%;
    width: 100%;
    margin: 0;
    display: table;
}

footer {
    
    display: table-row;
}
        </style>
</head>

<body>

      <!--menu-->
      <?php include("bbystrheader.php");?>
    <!--end menu-->


        <h2>Job Request List</h2>
        <div id="content">


<?php
session_start();
// connect to db
include('../PHP_Files/connect_db.php');
//`TypeOfServese`, `startTime`, `endTime`, `startDate`, `comments`, `parentName`, `ID`, `status`, `ParentEmail`, `expireDate`, `city`, `District` 
//SELECT * FROM `requests` WHERE `status` = 'unserved' ;
$val1 = "SELECT `TypeOfServese`, `startTime`, `endTime`, `startDate`, `ID` FROM  `requests` WHERE `status` = 'unserved'";
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

  $start_time = key($row);
  next($row);

  $end_time = key($row);
  next($row);

  $start_day = key($row);
  next($row);

  $id = key($row);
  next($row);

$kidss = "SELECT `kidName`,`kidAge` FROM `kids` WHERE `kids`.`ID` = $row[$id]";
$result2 = mysqli_query($connection, $kidss);
?>
<div> 
<p class='req'>
<label class='serviceLabel'>Type Of Service: </label>
<label class='service'><?php echo($row[$service])?></label><br>
<!--<label class='nameLabel'>Kid/s Name: </label>
<label class='name'><?php echo($row[$kids])?></label><br>
<label class='ageLabel'>Kid/s Age: </label>
<label class='age'><?php echo($row[$ages])?></label><br> -->
<label class='nameLabel'>No. Kid/s : </label>
<label class='name'><?php
$numOfKids = mysqli_num_rows($result2);
echo($numOfKids );
// while($kidrow = mysqli_fetch_row($result2)){
//     $kname = key($kidrow);
//     next($kidrow);

//     $kAge = key($kidrow);
//     next($kidrow);
//     echo $kidrow[$kname].": ".$kidrow[$kAge]." Years<br>";
       
// }
?></label><br>
<label class='dayLabel'>Date: </label>
<label class='day'><?php echo($row[$start_day])?></label><br>

<label class='timeLabel'>Time: </label>
<label class='time'><?php echo($row[$start_time] .' - ' . $row[ $end_time])?></label><br>

<a href='../HTML_Files/viewJobRequestDetails1.php?id=<?php echo($row[$id])?>'>View Job Request Details</a>
<form action="../PHP_Files/sendOffer.php" method="GET">
<label class="OfferPrice">Set Offer:  
                <input  style="   
                 position: absolute;
   height: 20px;
   margin-left: 6px;
   border-style: solid;
   background-color: white; 
   font-weight: bold; 
   border: 1px solid black;" id="offerP" name="OfferPrice" type="number" min="0" max="99999"><span
   style=" position: absolute;
   margin-left: 60px;
   color: #000;
    padding:5px;
    padding-left: 10px;">SAR/hr</span>
                </label> <br><br>
           <input  name="id" type="hidden" value="<?php echo($row[$id])?>"/>
           <input  name="day" type="hidden" value="<?php echo($row[$start_day])?>"/>
           <input  name="fromTime" type="hidden" value="<?php echo($row[$start_time])?>"/>
           <input  name="toTime" type="hidden" value="<?php echo($row[$end_time])?>"/>
            <input type="submit" class="sendOffer" name="offer_submit" value="Send"/> 


</form>
</p>

</div>
<?php
$x++;  
       }


   ?>

<?php 
if(isset($_SESSION['ERROR2'])){
   
    echo '<script>alert("can\'t send offer because there is a conflect!");</script>';
unset($_SESSION['ERROR2']);
}
?>


<?php 
if(isset($_SESSION['Correct'])){
   
    echo '<script>alert(" done send offer successful!!");</script>';
    unset($_SESSION['Correct']);
}

?>

   
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
