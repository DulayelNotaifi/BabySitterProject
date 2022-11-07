<!DOCTYPE html>
<html>

    <head>
        <title>Edit Job Request</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../CSS_Files/jobRequestStyle.css">
        <link rel="stylesheet" href="../CSS_Files/menustyle.css">
        <link rel="stylesheet" href="../CSS_Files/footer.css">
        <script src="https://kit.fontawesome.com/b8b24b0649.js" crossorigin="anonymous"></script>
    </head>
    
    <body>
        
         <!--Upper Menue-->
    <?php include("parentheader.php"); ?>


<?php
        if(isset($_GET['Message'])){
            echo $_GET['Message'];
        }
        include('../PHP_Files/connect_db.php');
        //SELECT `TypeOfServese`,`startDate`,`startTime` ,`endTime`,`ID`,`status` FROM `parent` INNER JOIN `requests` WHERE `parent`.`email` = `requests`.`ParentEmail` 
        //SELECT `TypeOfServese`, `startTime`, `endTime`, `startDate`, `ID` FROM  `requests` WHERE `status` = 'unserved' AND `requests`.`ParentEmail`= '$_SESSION['email']'
           $sql = "SELECT `TypeOfServese`, `startTime`, `endTime`, `startDate`, `comments`, `ID` FROM  `requests` WHERE `status` = 'unserved' AND `requests`.`ParentEmail`= 'parent1@gmail.com'";

           $result = mysqli_query($connection,  $sql);
        //  $offers = mysqli_fetch_all($result, MYSQLI_ASSOC);
           $valu = mysqli_num_rows($result);
    
           //$sql2 = "SELECT `ID`, `kidName`, `kidAge` FROM `kids` WHERE `requests`.`ID` = `kids`.`ID`";
           //$result2 = mysqli_query($connection,  $sql2);
           //$valu2 = mysqli_num_rows($result2);
        ?>
                <div class="editingPage">
            <h2>Edit Job Request</h2>

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

        <label class="serviceLabel">Type Of Service: </label>
        <label class="service"><?php echo(($row[$TypeOfServese]))?></label><br><br>

        <label class="dayLabel">Date: </label>
        <label class="day"><?php echo(($row[$startDate]))?></label><br><br>

        <label class="timeLabel">Time: </label>
        <label class="time"><?php echo(($row[$startTime])) ?> - <?php echo(($row[$endTime]))?></label>
        <br><br>
    
        <label class="commentsLabel">Comments: </label>
        <label class="comments"><?php echo(($row[$comments]))?></label> <br><br><br><br>

   <!-- <input type="button" class="Bottons cancelBotton" value="Cancel Job Request" name="cancel_submit"/> -->
    <button class="Bottons editBotton" ><a href='../HTML_Files/editingJobRequest.php?id=<?php echo($row[$id])?>'>Edit Job Request</a></button>
    </p>

</div> <!-- end container -->
    
     <?php
     $x++; } 
    }//end if
    else{
    ?>
    
    <div >
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