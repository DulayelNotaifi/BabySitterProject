<!DOCTYPE html>
<html>

    <head>
        <title>Cancel Job Request</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../CSS_Files/jobRequestStyle.css">
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
        
    <!--Upper Menue-->
    <?php include("parentheader.php");
            include('../PHP_Files/connect_db.php');
        
            //error_reporting(E_ERROR | E_WARNING | E_PARSE);
                  //  include 'connect_db.php';
          /*  echo "HI";
            $select = "SELECT * FROM requests WHERE created_at < (NOW() - INTERVAL 1 HOUR)  AND `status` = 'unserved'";
            $q = mysqli_query($connection, $select);
            if($q)
            echo "done1" ;
            
            if(mysqli_num_rows($q) > 0){
              while($req = mysqli_fetch_array($q)){
                  $offer = "UPDATE offers SET offerstatus ='expired' WHERE RequestID = ".$req['ID']."";
                 $q2 =  mysqli_query($connection, $offer);
                 if($q2)
                 echo "done2" ;
              }
            }*/
            
            $query = "UPDATE requests SET `status` =  'expired' WHERE created_at < (NOW() - INTERVAL 1 HOUR) AND `status` = 'unserved'";
            $q3 = $result = mysqli_query($connection, $query);
            if($q3)
            echo "done3" ;
            ?>


        <?php
        session_start();

        $pemail =  $_SESSION['email'];
        echo "$pemail" ;
        //SELECT `TypeOfServese`,`startDate`,`startTime` ,`endTime`,`ID`,`status` FROM `parent` INNER JOIN `requests` WHERE `parent`.`email` = `requests`.`ParentEmail` 
        //SELECT `TypeOfServese`, `startTime`, `endTime`, `startDate`, `ID` FROM  `requests` WHERE `status` = 'unserved' AND `requests`.`ParentEmail`= '$_SESSION['email']'$pemail parent1@gmail.com
           $sql = "SELECT `TypeOfServese`, `startTime`, `endTime`, `startDate`, `comments`, `ID` FROM  `requests` WHERE `status` = 'unserved' AND `ParentEmail`= '$pemail'";

           $result = mysqli_query($connection,  $sql);
        //  $offers = mysqli_fetch_all($result, MYSQLI_ASSOC);
           $valu = mysqli_num_rows($result);
    
           //$sql2 = "SELECT `ID`, `kidName`, `kidAge` FROM `kids` WHERE `requests`.`ID` = `kids`.`ID`";
           //$result2 = mysqli_query($connection,  $sql2);
           //$valu2 = mysqli_num_rows($result2);
        ?>
            <div class="cancelPage">
            <h2>Cancel Job Request</h2>

     <?php 
    
     if($valu > 0 ){
    
    $x = 0;
    while($x< $valu  ){
    
     $row = mysqli_fetch_row($result);
     
     $TypeOfServese = key($row);
     next($row);
     
     $startTime = key($row);
     next($row);
     
     $endTime = key($row);
     next($row);
     
     $startDate = key($row);
     next($row);
     
     $comments = key($row);
     next($row);

     $id = key($row);
     next($row);
     
     $kidss = "SELECT `kidName`,`kidAge` FROM `kids` WHERE `kids`.`ID` = $row[$id]";
     $result2 = mysqli_query($connection, $kidss);
    ?> 

        <div class="container">


    <p class="canceledInfo">
    <label class="nameLabel">Kid/s : </label> <br>
<label class="Name"><?php 
while($kidrow = mysqli_fetch_row($result2)){
    $kname = key($kidrow);
    next($kidrow);

    $kAge = key($kidrow);
    next($kidrow);

    //$ages[] = $kidrow[$kAge];

     echo $kidrow[$kname].": ".$kidrow[$kAge]." Years<br>";
}
?></label> <!-- <br><br> --> 

<!--<label class="ageLabel">Kid/s Ages: </label>
<label class="age"><?php echo(($row[$age]))?></label><br><br> -->

        <br><label class="serviceLabel">Type Of Service: </label>
        <label class="service"><?php echo(($row[$TypeOfServese]))?></label><br><br>

        <label class="dayLabel">Date: </label>
        <label class="day"><?php echo(($row[$startDate]))?></label><br><br>

        <label class="timeLabel">Time: </label>
        <label class="time"><?php echo(($row[$startTime])) ?> - <?php echo(($row[$endTime]))?></label>
        <br><br>
    
        <label class="commentsLabel">Comments: </label>
        <label class="comments"><?php echo(($row[$comments]))?></label> <br><br><br><br>

   <!-- <input type="button" class="Bottons cancelBotton" value="Cancel Job Request" name="cancel_submit"/> -->
    <button class="Bottons cancelBotton" onclick="return checkDelet()" ><a href='../PHP_Files/cancelJobRequest.php?id=<?php echo($row[$id])?>'>Cancel Job Request</a></button>
    </p>

</div> <!-- end container -->
    
     <?php
     $x++; } 
    }//end if
    else{
    ?>
    
    <div >
    <div class="container">
        <h2>No posted job request yet </h2></div>
    <?php } ?>
    <!-- end copy -->
       <!-- <div class="cancelPage">
            <h2>Cancel Job Request</h2>

            <div class="container">

            <form action="#" method="post">

                <p class="canceledInfo">
                    <label class="nameLabel">Kid/s Name: </label>
                    <label class="name">Abdullah</label><br><br>
                    
                    <label class="ageLabel">Kid/s Age: </label>
                    <label class="age">5</label><br><br>
            
                    <label class="serviceLabel">Type Of Service: </label>
                    <label class="service">Child care</label><br><br>
            
                    <label class="dayLabel">Day: </label>
                    <label class="day">1/10/2022 </label><br><br>
            
                    <label class="timeLabel">Time: </label>
                    <label class="time">7:00PM - 9:00PM </label>
                    <br><br>
                
                    <label class="commentsLabel">Comments: </label>
                    <label class="comments">No comment added </label> <br><br><br><br>

                <input type="button" class="Bottons cancelBotton" value="Cancel Job Request"/>

                </p>
            </form> -->
            </div> <!-- end container -->
        </div> <!-- end postingPage -->

        <script>

function checkDelet(){
   return confirm("Are you sure you want to cancel Job Request?");
}

</script>

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