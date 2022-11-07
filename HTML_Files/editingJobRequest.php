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


 <!--Page Content-->
 <?php
 include('../PHP_Files/connect_db.php');
if(isset($_GET['id'])){
// echo("set");
   $id = mysqli_real_escape_string($connection,$_GET['id']);
   //$val1 = "SELECT `TypeOfServese`, `startTime`, `endTime`, `startDate`, `comments`, `parentName`, `ID`, `status`, `expireDate`, `city`, `District` FROM  `requests` WHERE
   $sql = "SELECT `TypeOfServese`, `startTime`, `endTime`, `startDate`, `comments` `ID` FROM `requests` WHERE `requests`.`ID` = '$id'";
    $result = mysqli_query($connection,  $sql);
 //  $jobReq = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $valu = mysqli_num_rows($result);
}

 ?>

<div class="editingPage">
            <h2>Edit Job Request</h2>

<!--<?php print_r($jobReq);?>-->

<?php 

if($valu > 0 ){

//$x = 0;
//while($x< $valu  ){

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

$kidss = "SELECT `kidName`,`kidAge` FROM `kids` WHERE `kids`.`ID` = '$row[$id]'";
$result2 = mysqli_query($connection, $kidss);
?> 
     
            <div class="container">

            <form action="#" method="post">
                <p id="formInfo">

                <div id="kids_info">
                    <label class="nameLabel"> Kid/s Name:
                        <input class="inputName" name="kidsname[]" type="text" placeholder="Enter Kid Name" required> 
                    </label>
                    
                    <label class="ageLabel"> Kid/s Age: 
                        <input class="inputAge" name="kidsage[]" type="number" min="0" max="17" placeholder="Enter Kid Age" required>
                    </label>
               

                <?php 
while($kidrow = mysqli_fetch_row($result2)){
    $kname = key($kidrow);
    next($kidrow);

    $kAge = key($kidrow);
    next($kidrow);

?>
<script type="text/javascript">
   var Kname = "<?php echo $kidrow[$kname]; ?>";
   var kAge = "<?php echo  $kidrow[$kAge] ?>";

var kids_info = document.getElementById('kids_info');

  var nameField = document.createElement('input');
  var ageField = document.createElement('input');

  nameField.setAttribute('type','text');
  nameField.setAttribute('name','kidsname[]');
  nameField.setAttribute('class','inputExtraName');
  nameField.setAttribute('size',50);
  nameField.setAttribute('placeholder','Enter Kid/s name');
  //nameField.setAttribute('value','Kname');
  kids_info.appendChild(nameField);


  ageField.setAttribute('type','number');
  ageField.setAttribute('name','kidsage[]');
  ageField.setAttribute('class','inputExtraAge');
  ageField.setAttribute('size',50);
  ageField.setAttribute('placeholder','Enter Kid/s age');
  ageField.setAttribute('min',0);
  ageField.setAttribute('max',17);
  //ageField.setAttribute('value','kAge');
  kids_info.appendChild(ageField);

</script>

<div class="controls">
                          <a href="#" id="add_more_fields" size="50"><i class="fa fa-plus"></i></a>
                          <a href="#" id="remove_fields"><i class="fa fa-minus"></i></a>
                        </div>
<?php }
?>


</div>
                <label class="serviceLabel"> Type Of Service: 
                    <input class="inptService" name="service" type="text" value="<?php echo(($row[$TypeOfServese]))?>" required> 
                </label>
                
                <label class="durationLabel"> Duration: <br>
                    Day:<input class="inputDay" name="day" type="date" value="<?php echo(($row[$startDate]))?>"required > </label>
                <label class="durationLabel"> From: <input class="inputFromTime" name="from_time" type="time" value="<?php echo(($row[$startTime]))?>" required > </label>
                <label class="durationLabel"> To: <input class="inpuToTime" name="to_time" type="time" value="<?php echo(($row[$endTime]))?>" required> </label>
                <br><br>
                <label class="commentsLabel"> Add Comments: (optional)
                    <textarea class="commentsArea" name="comments" cols="72" rows="6" value="<?php echo(($row[$comments]))?>"></textarea>
                </label>
                <br>
                 
                <input class="Bottons resetBotton" type="button" onclick="location.href ='editJobRequest.php';" value="go back" >

                <input type="submit" class="Bottons editBotton" value="Edit" name="edit_submit"/>
                
                </p>
            </form>
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
            <?php ////} 
}//end if
?>
    </body>

</html>