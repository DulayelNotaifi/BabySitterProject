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
    <?php include("parentheader.php"); ?>


    <!--Page Content-->

    <?php
    include('../PHP_Files/connect_db.php');

   if(isset($_GET['id'])){
      $id = $_GET['id'];
     $sql = "SELECT `babySitterName` ,`TypeOfServese`,`startDate`,`startTime`,`endTime`,`comments`,`price` ,`offerstatus`,`babySitterEmail`  FROM `requests` INNER JOIN `offers` WHERE `offers`.`RequestID` = $id AND `requests`.`ID` = $id";
     $result = mysqli_query($connection,  $sql);
    $valu = mysqli_num_rows($result);
    echo( "ffff");
   }// end if set

    ?>

<h2 id="offerH2">Request Offers</h2>

 <?php 

 if($valu > 0 ){

$x = 0; $test=0 ; $rr=0;
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

   $offstatus = key($row);
   next($row);

 $sitterEm = key($row);
 next($row);
 
 $sql2 = "SELECT `img` FROM `babysitter` WHERE `email` = '$row[$sitterEm]' ";
 $result2 = mysqli_query($connection,  $sql2);
 $row2 = mysqli_fetch_row($result2);
 $sitterPic = key($row2);

   if($row[$offstatus] == "Rejected") {  $x++;  $test--; continue; }

?> 
        <div class="container">



        <?php if($row2[$sitterPic] == "")  echo("<img src='female.png' id='sitterPic' alt='babystter picture'>");?>
     
        <img src="<?php echo(($row2[$sitterPic])); ?>" id="sitterPic" alt="babystter picture">

        <p class="SitterInfo">
        <label class="nameLabel">Babysitter Name: </label> 
       <label class="Name"><?php echo(($row[$babySitterName])); ?></label><br>
       <a href="http://localhost/BabySitterProject/HTML_Files/BabySitterProfile.php?id=<?php echo($id) ?>&em=<?php echo( $row[$sitterEm]) ?>">View babystter Profile</a>  
    
       <hr>
       <label class="serviceLabel" style=" margin-top:15px;position: absolute;">Your Request: </label><br>
       </p>


 <p class="RequestInfo"> 
<label class="serviceLabel" >Type Of Service: </label>
<label class="service"><?php echo(($row[$TypeOfServese]))?></label><br><br>

<label class="dayLabel">Day: </label>
<label class="day"><?php echo(($row[$startDate]))?> </label><br><br>

<label class="timeLabel">Time: </label>
<label class="time"><?php echo(($row[$startTime])) ?> - <?php echo(($row[$endTime]))?></label>
<br><br>

<label class="commentsLabel">Comments: </label>
<label class="comments"><?php echo(($row[$comments]))?> </label>
<br><br>
<label class="commentsLabel">Kid/s: </label><br>
<?php 
$kidss = "SELECT `kidName`,`kidAge` FROM `kids` WHERE `kids`.`ID` = $id";
$res = mysqli_query($connection, $kidss);
 while($kidrow = mysqli_fetch_row($res)){
    $kname = key($kidrow);
    next($kidrow);

    $kAge = key($kidrow);
    next($kidrow);
    echo $kidrow[$kname].": ".$kidrow[$kAge]." Years<br>";
       
}
?>

<hr>
 <br><label class="PriceLabel">Offered price/hr: </label>
 <label class="Price"><?php echo(($row[$price]))?> SAR</label> <br><br>


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
 $rr++; 
}//end while loop 
}//end if
else{
?>

<div style="    background-color: rgb(248, 250, 219);
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
    margin-top: 35px; ">Offers are cooming soon!</h2> <?php echo($test); ?>
</div>
 <?php }//close else
 
?>

 <script>

 function checkDelet(){
    return confirm("Are you sure you want to Reject offer?");
}

function checkAcce(){
   
    return confirm("Are you sure you want to Accept offer?");
}

</script>




<!-- footer-->
<div id="DetailsFooter">
<footer > 
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
