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

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"

            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"

            crossorigin="anonymous"></script>





    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"

            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"

            crossorigin="anonymous"></script>



    <script src="rating.js"></script>
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

        $id_offer = $_GET['id_offer'];

        $parentEmail = $_SESSION['email'];


        $sql_email = "select count(*) as cunt from review where parentEmail ='$parentEmail' and offer_id ='$id_offer'";
        //$result = $userFound = mysqli_query($connection,$sql_email );



       $result = $connection->query($sql_email);
        while ($row = $result->fetch_assoc()) {

        if ($row['cunt'] > 0) {?>

            <div style=" text-align:center; color:red; font-size: 17px"> <?php echo "BabySitter already Reviewed\n"; ?> </div>

        <?php } else {



            if (isset($_POST['add'])) {



                $feedBack = addslashes($_POST['feedBack']);

                $Rate = addslashes($_POST['Rate']);

                $Date_ = date('Y-m-d');

                $time_ = date('H:i');

                $babySitterEmail = $_GET['babySitterEmail'];

                $id_offer = $_GET['id_offer'];

                $parentEmail = $_SESSION['email'];



                $sql = "INSERT INTO review " . "(feedBack, Rate, Date,time ,babySitterEmail,parentEmail,offer_id

                   ) " . "VALUES('$feedBack','$Rate','$Date_','$time_','$babySitterEmail','$parentEmail','$id_offer')";



                if ($connection->query($sql) === TRUE) { ?>

                    <div style="text-align: center;color: green;font-size: 20px !important;"> <?php echo "Entered data successfully\n"; ?> </div>

                <?php } else {

                    echo "Error: " . $sql . "<br>" . $connection->error;

                }





                ?>



                <?php

            }

            }

        }?>

    



            <form method = "post"  action = "<?php $_PHP_SELF ?>" name="myform" id="myform" onsubmit="return validateform()">

                <?php

                $id=$_GET['babySitterEmail'];

                $sql_view = "SELECT * FROM `offers`   INNER JOIN babysitter

        ON babysitter.email = offers.babySitterEmail  where offers.id='$id'";

        

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





          <label >Give Your Feedback:</label><span id="feedabk_val" style="display: none; color: red">* must enter Feedback</span><br>

          <textarea  placeholder="Write something.." name="feedBack"></textarea>

      <br>





          <input type="submit" value="Submit" name="add" >

      



        </form>





    </div>



    <footer class="rev"> 

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









    



<script>

    function validateform(){

        var feedBack=document.myform.feedBack.value;



        if(feedBack == null || feedBack == ""){

            $('#feedabk_val').show();

            return false;

        } else {

            $('#feedabk_val').hide();

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