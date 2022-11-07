
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
   <?php include("parentheader.php"); ?>

    <h2>Choose a Request to display offers</h2>
    
<div id="content">

 <?php
 
include('../PHP_Files/connect_db.php');
$val1 = "SELECT `TypeOfServese`,`startDate`,`startTime` ,`endTime`,`ID`,`status` FROM `parent` INNER JOIN `requests` WHERE `parent`.`email` = `requests`.`ParentEmail` " ;
$result1 = mysqli_query($connection, $val1);
$valu = mysqli_num_rows($result1);
?>


<?php

$x = 0;
$y=0;

while($x< $valu  ){

 $x++;  
 $row = mysqli_fetch_row($result1);

  $service = key($row);
   next($row);

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
<label class='nameLabel'>No. Kid/s : </label>
<label class='name'><?php
$numOfKids = mysqli_num_rows($result2);
echo($numOfKids );
?></label><br>



<label class='dayLabel'>Day: </label>
<label class='day'><?php echo($row[$day])?></label><br>

<label class='timeLabel'>Time: </label>
<label class='time'><?php echo($row[$stime])?> - <?php echo($row[$etime])?></label>
<br><br>
<a style=" font-size: medium;
    text-decoration:underline;
    color: #2f06e9;" href='http://localhost/BabySitterProject/HTML_Files/OfferDetails.php?id=<?php echo($row[$id])?>'> Offers </a>
</p>

</div>

<?php
 }//end while
 ?>

</div>

 <?php 

      if($y == 0){
 ?>
   
   <div class="noReq" style="    background-color: rgb(248, 250, 219);
    position: relative;
    border-style: solid;
    border-radius: 30px;
    width: 500px;
    height: 100px;
    margin: auto;
    margin-top: 100px;
    padding: 10px;" >
    <h2 style="   height: 30px;
    color: black;
    text-align: center;
    margin-top: 35px; ">YOU DO NOT HAVE ANY REQUESTS!</h2>
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
