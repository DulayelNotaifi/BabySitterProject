<?php
session_start();
require("../PHP_Files/query.php");
$requests = get_requests($_SESSION['email']);

?>

<?php include("bbystrheader.php"); ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/b8b24b0649.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../CSS_Files/style.css">
  <link rel="stylesheet" href="../CSS_Files/menustyle.css">

  <title>ViewMyOffers</title>
</head>

<body>
  <!--<div class="topofpage">
    <img src="thenewlogo.jpg" alt="a logo for A Watchful Eye website" class="logo-small">
    <p class="andname">A Watchful Eye</p>
  </div>
  <div class="uppermenu">
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
      <a href="ViewOffers.php">My Offers</a>
    </div>
    <div class="tab4">
      <a href="ViewRate.php">Rates and Reviews
      </a>
    </div>

    <div class="logout">
      <a href="LoginPage.html">Logout</a>
    </div>
  </div>
-->

  <h2 class="Offers"> My Offers </h2>
  <table class="tableR">
    <thead>
      <tr>
        <th>#</th>
        <th>Date</th>
        <th>Time</th>
        <th>Type of Service</th>
        <th>Kid/s Name</th>
        <th>Kid/s Ages(year)</th>
        <th>Price(per hour)</th>
        <th>offerstatus</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $count = 1;
      while ($row = mysqli_fetch_assoc($requests)) {
        echo '
            <tr>
              <td>' . $count . '</td>
              <td>' . $row["startDate"] . '</td>
              <td>' . $row["startTime"] . " - " . $row["endTime"] . '</td>
              <td>' . $row["TypeOfServese"] . '</td>
              <td>' . $row["kidName"] . '</td>
              <td>' . $row["kidAge"] . '</td>
              <td> ' . $row["price"] . '</td>';
        if (strtolower($row["offerstatus"]) == "accepted")
          echo '<td class="Green">' . $row["offerstatus"] . '</td>';
        else if (strtolower($row["offerstatus"]) == "pending")
          echo '<td class="Gray">' . $row["offerstatus"] . '</td>';
        else if (strtolower($row["offerstatus"]) == "rejected")
          echo '<td class="Red">' . $row["offerstatus"] . '</td>';
        echo '</tr>';
      }
      ?>


    </tbody>

  </table>



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