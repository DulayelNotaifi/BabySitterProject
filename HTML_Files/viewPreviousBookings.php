<?php session_start();?>
<!doctype html>
<html> 

<head>
    <meta charset="UTF-8">
    <title>viewpreviousbookings</title>
    <link href="../CSS_Files/viewOfferListStyle.css" type="text/css" rel="stylesheet">
    <link href="../CSS_Files/menustyle.css" type="text/css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b8b24b0649.js" crossorigin="anonymous"></script>
    <link href="../CSS_Files/nuha'sfooter.css" type="text/css" rel="stylesheet">

 
</head>

<body>




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
            <a href="LoginPage.html">Log out</a>
        </div>
</div>











    <h2> <strong>Previous Bookings</strong></h2>





    <div id="content"> 






        <?php

        $servername= "localhost";
        $username= "root" ;
        $password= "";
        $dbname= "381project" ;
        $connection= mysqli_connect($servername,$username,$password,$dbname);
        $database= mysqli_select_db($connection, $dbname);
        if (!$connection)
            die("Connection failed: " . mysqli_connect_error());
        $session_email= $_SESSION['email'];
        $sql = "SELECT * FROM `offers`  INNER JOIN requests
ON requests.ID = offers.RequestID INNER JOIN babysitter
ON babysitter.firstName = offers.babySitterName  where requests.ParentEmail='$session_email'";

        $userFound = mysqli_query($connection,$sql);
        if($userFound){

        if(mysqli_num_rows($userFound) > 0) {

        while ($row = mysqli_fetch_assoc($userFound)) {
        if (date('Y-m-d') >$row['startDate']) {
        ?>
    
    
        <div class="finished">

            
            <img src="../public/userImages/<?php echo $row['img']; ?>" id="sitterPic" alt="babystter picture">
            <p>
    
             
            <label class="NameLabel">Babystter Name: </label>
            <label class="Name"><?php echo $row['babySitterName']; ?></label><br>
     
            <label class="PriceLabel"> Price/hr: </label>
             <label class="Price"><?php echo $row['price']; ?> SAR</label> <br>
    
             <label class="StartDateLabel"> Date: </label>
             <label class="StartDate"><?php echo $row['startDate']; ?> </label>
    
             <br>
            
            <label class="timeslotslabel"> From: </label>
            <label class="timeslots"> <?php echo $row['startTime']; ?>AM</label> 

            <label class="timeslotslabel2"> To: </label>
            <label class="timeslots2"> <?php echo $row['endTime']; ?>AM</label> <br>
        </p>
            <a href="mailto:<?php echo $row['email']; ?>"><input  type="submit" class="email" value="contact" ></a>
            <a href="../HTML_Files/review&rate.html">  <input  type="submit" class="review" value="review" ></a>
         
    
    
    </div>


    <?php }
}
}
} ?>




    </div>

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



    </body></html>
