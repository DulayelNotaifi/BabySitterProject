<?php session_start();?>

<!doctype html>
<html> 

<head>
    <meta charset="UTF-8">
    <title>raview&rate</title>
    <link href="../CSS_Files/review&rateStyle.css" type="text/css" rel="stylesheet">
    <link href="../CSS_Files/menustyle.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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


<h2><strong> Review & Rate </strong></h2>








    <div class="container">

        <?php
        $servername= "localhost";
        $username= "root" ;
        $password= "";
        $dbname= "381project" ;
        $connection= mysqli_connect($servername,$username,$password,$dbname);
        $database= mysqli_select_db($connection, $dbname);
        if (!$connection)
            die("Connection failed: " . mysqli_connect_error());



            if(isset($_POST['add'])) {

                $feedBack = addslashes($_POST['feedBack']);
                $Rate = addslashes($_POST['Rate']);
                $Date_ = date('Y-m-d');
                $time_ = date('H:i:s');
                $id=$_GET['id'];
    
    
                $sql = "INSERT INTO review " . "(feedBack, Rate, Date,time ,offer_id
                   ) " . "VALUES('$feedBack','$Rate','$Date_','$time_','$id')";
    
    
    
    
                ?>
                <div style="text-align: center;color: red;font-size: 20px !important;"> <?php echo "Entered data successfully\n"; ?> </div>
                <?php
    
            } ?>
    

            <form method = "post"  action = "<?php $_PHP_SELF ?>" name="myform" id="myform" onsubmit="return validateform()">
                <?php
                $id=$_GET['id'];
                $sql_view = "SELECT * FROM `offers`   INNER JOIN babysitter
        ON babysitter.firstName = offers.babySitterName  where offers.id='$id'";
        
                $userFound = mysqli_query($connection,$sql_view);
                if($userFound) {
        
                    if (mysqli_num_rows($userFound) > 0) {
        
                        while ($row1 = mysqli_fetch_assoc($userFound)) {
        
        
                        ?>
                           <img src="../public/userImages/<?php echo $row['img']; ?>" id="sitterPic"
                             alt="babystter picture">
                    <?php }
                }
        } ?>
        <br>

     <label>Rate:</label>

  <!--     <span class="fa fa-star checked"></span>-->
<!--     <span class="fa fa-star checked"></span>-->
<!--     <span class="fa fa-star checked"></span>-->
<!--     <span class="fa fa-star"></span>-->
<!--     <span class="fa fa-star"></span>-->

<span id="review"></span>
<input type="hidden" readonly id="starsInput" name="Rate" class="form-control form-control-sm">

<br>


          <label >Give Your Feedback:</label><br>
          <textarea  placeholder="Write something.." > </textarea>
      <br>


          <input type="submit" value="Submit" name="add" >
      

        </form>


    </div>

    <footer class="rev"> 
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




    

<script>
    function validateform(){
        var feedBack=document.myform.feedBack.value;

        if(feedBack == null || feedBack == ""){

            alert("feedBack can't be blank");
            return false;
        }

    }
</script>




<script>
    $("#review").rating({
        "value": 2,
        "click": function (e) {
            console.log(e);
            $("#starsInput").val(e.stars);
        }
    });


</script>