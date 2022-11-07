<?php
session_start();
require("../PHP_Files/query.php");
$rates = get_rates($_SESSION["email"]);
?>

<?php include("bbystrheader.php"); ?>


<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b8b24b0649.js" crossorigin="anonymous"></script>
    <title>ViewRateAndReviews</title>
    <link rel="stylesheet" href="../CSS_Files/style.css">
    <link rel="stylesheet" href="../CSS_Files/menustyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- <div class="topofpage">
        <img src="thenewlogo.jpg" alt="a logo for A Watchful Eye website" class="logo-small">
        <p class="andname">A Watchful Eye</p>
    </div>
    <div class="uppermenu" style="top:46px">
        <div class="tab0">
            <a href="babysitterhome.html">Home</a>
        </div>
        <div class="tab1">
            <a href="">Manage Profile </a>
            <div class="dropdown-content">
                <a href="viewbbystr.html">View</a>
                <a href="babysittereditprofile.html">Edit</a>
                <a class="last" href="deletebbystracc.html">Delete</a>
            </div>
        </div>
        <div class="tab2">
            <a href="viewJobRequestList.html">Job Request List </a>

        </div>

        <div class="tab3 need-more">
            <a href="viewJobs.html">Jobs </a>
            <div class="dropdown-content">
                <a href="viewcurrentjobs.html">Current Job</a>
                <a href="viewPreviousJobs.html">Previous Jobs</a>
            </div>
        </div>


        <div class="tab4">
            <a href="ViewOffersWithTheirStatus.html">My Offers</a>
        </div>
        <div class="tab4">
            <a href="ViewRate.html">Rates and Reviews
            </a>
        </div>

        <div class="logout">
            <a href="LoginPage.html">Logout</a>
        </div>
    </div>
-->

    <h2 class="Rate" style="margin-top:70px;"> Rate and Reviews </h2>
    <div class="outerDiv">
        <?php
        while ($row = mysqli_fetch_assoc($rates)) {
            
            // dd($row);
            echo '
                    <div class="SubDiv">
                        <div class="innerDiv">
                            <img class="userImg" src="../public/userImages/' . $row["img"] . '">
                            <Strong class="Reviewers">' . $row["firstName"] . " " . $row["lastName"] . '</Strong><br>
                            <p class="date">' . $row["time"] . " " . $row["date"] . '</p>
                            ';
            for ($i = 1; $i <= $row["rate"]; $i++) {
                echo '<span class="fa fa-star checked"></span>';
            }
            echo '<p> ' . $row["feedback"] . ' </p>
                        </div>
                    </div>
                ';
        }
        ?>


    </div>


    <footer class="offerFooter">
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
</body>

</html>
