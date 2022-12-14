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

    <style> 
html, body{
    height:100%;
    width: 100%; 
    margin: 0; 
    display: table;
}
footer{display:table-row;}

</style>
</head>

<body>


<?php include("parentheader.php");?>

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
ON requests.ID = offers.RequestID  INNER JOIN babysitter
ON babysitter.email  = offers.babySitterEmail   where requests.ParentEmail='$session_email' and offers.offerstatus='accepted'";

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
            <label class="timeslots"> <?php echo $row['startTime']; ?></label> 

            <label class="timeslotslabel2"> To: </label>
            <label class="timeslots2"> <?php echo $row['endTime']; ?></label> <br>
        </p>
            <a href="tel:<?php echo($row['phone']);?>"><input  type="submit" class="email" value="contact" ></a>

            <?php
            $id_offer = $row['id'];
            $parentEmail = $_SESSION['email'];
            $sql_email = "select count(*) as cunt from review where parentEmail ='$parentEmail' and offer_id ='$id_offer'";

            $resultt = $connection->query($sql_email);
            while ($roww = $resultt->fetch_assoc()) {
                if ($roww['cunt'] == 0) { ?>

              <a href='../HTML_Files/review&rate.php?babySitterEmail=<?php echo($row['babySitterEmail']) ?>&id_offer=<?php echo($id_offer); ?>'>
                        <input type="submit" class="review" value="review"></a>
                <?php }
            } ?>
    
    
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
                <th><a href="ContactUs.php"> Contact Us </a></th>
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