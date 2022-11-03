<!DOCTYPE html>
<html>

    <head>
        <title>Cancel Job Request</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../CSS_Files/jobRequestStyle.css">
        <link rel="stylesheet" href="../CSS_Files/menustyle.css">
        <link rel="stylesheet" href="../CSS_Files/footer.css">
        <script src="https://kit.fontawesome.com/b8b24b0649.js" crossorigin="anonymous"></script>
    </head>
    
    <body>
        
         <!--menu-->
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
                <a href="../HTML_Files/ViewOfferList.html">View offer list</a>
            </div>
            <div class="logout">
                <a href="../HTML_Files/LoginPage.html">Logout</a>
            </div>
        </div>
        <!--end menu-->

        <?php
        include('../PHP_Files/connect_db.php');
           $sql = "SELECT `kidsName`, `age`, `TypeOfServese`, `startTime`, `endTime`, `startDate`, `endDate`, `comments` FROM `kids`";

           $result = mysqli_query($connection,  $sql);
        //  $offers = mysqli_fetch_all($result, MYSQLI_ASSOC);
           $valu = mysqli_num_rows($result);
    
        ?>
            <div class="cancelPage">
            <h2>Cancel Job Request</h2>

     <?php 
    
     if($valu > 0 ){
    
    $x = 0;
    while($x< $valu  ){
    
     $row = mysqli_fetch_row($result);
    
     $kidsName = key($row);
     next($row);
     
     
     $age = key($row);
     next($row);
     
     $TypeOfServese = key($row);
     next($row);
     
     $startTime = key($row);
     next($row);
     
     $endTime = key($row);
     next($row);
     
     $startDate = key($row);
     next($row);
     
     $endDate = key($row);
     next($row);
     
     $comments = key($row);
     next($row);
     
    ?> 

        <div class="container">

<form action="#" method="post">

    <p class="canceledInfo">
        <label class="nameLabel">Kid/s Name: </label>
        <label class="name"><?php echo(($row[$kidsName]))?></label><br><br>
        
        <label class="ageLabel">Kid/s Age: </label>
        <label class="age"><?php echo(($row[$age]))?></label><br><br>

        <label class="serviceLabel">Type Of Service: </label>
        <label class="service"><?php echo(($row[$TypeOfServese]))?></label><br><br>

        <label class="dayLabel">Date: </label>
        <label class="day"><?php echo(($row[$startDate]))?> - <?php echo(($row[$endDate]))?></label><br><br>

        <label class="timeLabel">Time: </label>
        <label class="time"><?php echo(($row[$startTime])) ?> - <?php echo(($row[$endTime]))?></label>
        <br><br>
    
        <label class="commentsLabel">Comments: </label>
        <label class="comments"><?php echo(($row[$comments]))?></label> <br><br><br><br>

    <input type="submit" class="Bottons cancelBotton" value="Cancel Job Request" name="cancel_submit"/>

    </p>
</form>
</div> <!-- end container -->
    
     <?php } 
    }//end if
    else{
    ?>
    
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