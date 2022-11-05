
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
<label class='nameLabel'>Kid/s : </label><br>
<label class='name'><?php

while($kidrow = mysqli_fetch_row($result2)){
    $kname = key($kidrow);
    next($kidrow);

    $kAge = key($kidrow);
    next($kidrow);
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
