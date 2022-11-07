<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../CSS_Files/jobRequestStyle.css">
    <link rel="stylesheet" href="../CSS_Files/menustyle.css">
    <script src="https://kit.fontawesome.com/b8b24b0649.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS_Files/footer.css">
    <title>Offer Details</title>
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

    <!--Upper Menue-->
    <?php include("parentheader.php"); ?>


    <!--Page Content-->

    <?php
    include('../PHP_Files/connect_db.php');

   if(isset($_GET['id'])){
      $id = $_GET['id'];
     $sql1 = "SELECT `babySitterName`,`price` ,`babySitterEmail` 
      FROM `requests` INNER JOIN `offers` WHERE `offers`.`RequestID` = $id 
      AND `requests`.`ID` = $id AND `offers`.`offerstatus` != 'rejected' ";

$sql2 = "SELECT `TypeOfServese`,`startDate`,`startTime`,`endTime`,`comments`
FROM `requests` 
WHERE `requests`.`ID` = $id ";

 $Offresult = mysqli_query($connection,  $sql1);
 $Reqresult = mysqli_query($connection,  $sql2);
 $valu = mysqli_num_rows($Offresult);
   }// end if set

    ?>

<h2 id="offerH2">Request Offers</h2>

 <?php 

$kidss = "SELECT `kidName`,`kidAge` FROM `kids` WHERE `kids`.`ID` = $id";
$res = mysqli_query($connection, $kidss);

 $requ = mysqli_fetch_row($Reqresult);
 $serv = key($requ);
   next($requ);

   $stdate = key($requ);
   next($requ);

   $sttime = key($requ);
   next($requ);

   $etime = key($requ);
   next($requ);

   $com = key($requ);
   next($requ);
?>
<div class="Requestcontainer" style="    background-color: white;
    position: relative;
    border-style: solid;
    border-radius: 30px;
    width: 75%;
    margin: auto;
    margin-top: 10px;
    padding: 20px;">
    <label class="serviceLabel">Your Request: </label><br><br>

    <label class="serviceLabel" >Type Of Service: </label>
<label class="service"><?php echo(($requ[$serv]))?></label>

<label class="dayLabel">, Day: </label>
<label class="day"><?php echo(($requ[$stdate]))?> </label>

<label class="timeLabel">, Time: </label>
<label class="time"><?php echo(($requ[$sttime])) ?> - <?php echo(($requ[$etime]))?></label>

<label class="commentsLabel">, Comments: </label>
<label class="comments"><?php echo(($requ[$com]))?> </label>
<label class="commentsLabel">, Kid/s: </label>
<?php while($kidrow = mysqli_fetch_row($res)){
    $kname = key($kidrow);
    next($kidrow);

    $kAge = key($kidrow);
    next($kidrow);
    echo $kidrow[$kname].": ".$kidrow[$kAge]." Years. "; }?>
       


</div>

<?php
 if($valu > 0 ){

$x = 0;
while($x< $valu  ){
$x++;
 $row = mysqli_fetch_row($Offresult);

  $babySitterName = key($row);
   next($row);

   $price = key($row);
   next($row);

 $sitterEm = key($row);
 next($row);
 
 $sql3 = "SELECT `img` FROM `babysitter` WHERE `email` = '$row[$sitterEm]' ";
 $result2 = mysqli_query($connection,  $sql3);
 $row2 = mysqli_fetch_row($result2);
 $sitterPic = key($row2);

?> 
        <div class="container" style="display: inline-block; margin-left: 45px; margin-top: 20px;">

        <img src="<?php echo(($row2[$sitterPic])); ?>" id="sitterPic" alt="babystter picture">

        <p class="SitterInfo">
        <label class="nameLabel">Babysitter Name: </label> 
       <label class="Name"><?php echo(($row[$babySitterName])); ?></label><br><br>
       <a class="sitterProfile"href="http://localhost/BabySitterProject/HTML_Files/BabySitterProfile.php?id=<?php echo($id) ?>&em=<?php echo( $row[$sitterEm]) ?>">View babystter Profile</a>  
    
      
     
       </p>

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
    text-decoration: none;" href='http://localhost/BabySitterProject/PHP_Files/setAccepted.php?id=<?php echo($id)?>&name=<?php echo($row[$babySitterName]) ?>'>Accept</a></button>
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
    text-decoration: none;"href='http://localhost/BabySitterProject/PHP_Files/setRejected.php?id=<?php echo($id) ?>&name=<?php echo($row[$babySitterName]) ?>'>Reject</a></button>
</div>



</p>
</div> <!-- End container -->

<?php

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
<br><br>
 <footer> 
        <table class="tableF">
            <tr>
                <th><a href="aboutUs.html"> About Us </a></th>
                <th><a href="FAQ.html"> FAQs </a></th>
                <th><a href="ContactUs.html"> Contact Us </a></th>
            </tr>
        </table>
        <div class="shareProfile">
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
